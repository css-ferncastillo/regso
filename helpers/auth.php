<?php

namespace Helpers;

class Auth {
   private $_secure_word = 'SECUREDSALT_';
   private $_use_user_agent = true;
   private $_ip_block_length = 4;
   private $_algorithm;
   private $_is_sqlite;
   private $_cookie_name = 'tcUserLogin';
   private $_cookie_expiration_days = 5;

   public function __construct() {
      $this->_session_setup();
   }
   
   protected function encrypt_password($password) {
      $set1 = str_shuffle("!@#$%^&*()_+=-';:,<.>126AaBbJjKkLlSdDsQwWeErqRtTyY");
      $set2 = str_shuffle("1234567890`~ZxzxCcVvBb?[]{}pP");
      $salt1 = '';
      $salt2 = '';
      for ($i = 0; $i < 12; $i++) {
         $salt1 .= $set1[rand() % strlen($set1) - .04];
      }
      for ($i = 0; $i < 10; $i++) {
         $salt2 .= $set2[rand() % strlen($set2) - .07];
      }

      $part[1] = "{salt1}";
      $part[2] = "{salt2}";
      $part[3] = "{pass}";
      $psort   = array_rand($part, 3);
      $pattern = $part[$psort[0]] . "." . $part[$psort[1]] . "." . $part[$psort[2]];

      // Now for pass
      $grep = array("/{salt1}/", "/{salt2}/", "/{pass}/"); // Identify pattern
      $repl = array($salt1, $salt2, $password); // Make pattern real

      // Now replace the pattern with actual values
      $sendpass = preg_replace($grep, $repl, $pattern);

      return array(
         'salt1'    => $salt1,
         'salt2'    => $salt2,
         'password' => sha1($sendpass),
         'pattern'  => $pattern
      );
   }

   protected function validate_password($pass, $encrypt) {
      $grep = array("/{salt1}/", "/{salt2}/", "/{pass}/");        // Identify pattern
      $repl = array($encrypt['salt1'], $encrypt['salt2'], $pass); // Make pattern real
      $pwd  = preg_replace($grep, $repl, $encrypt['pattern']);    // Generate password how it should be.

      if (sha1($pwd) != $encrypt['password']) {
         return false;
      }
      return true;
   }

   public function user_login($username, $password) {
      // Check if user is already logged in and return if so
      if ($this->validate_uniquekey())
         return true;

      // Query database for user details
      // $stmt = $this->prepare("SELECT id, username, password, pattern, salt1, ".
      //                        "salt2 FROM users WHERE username=:username");
      // $stmt->bindParam(':username', $username, PDO::PARAM_STR, 75);
      // $stmt->execute();
      // $result = $stmt->fetch(PDO::FETCH_ASSOC);
      $sql = "SELECT id, username, password, pattern, salt1, salt2 FROM users WHERE username=:username";
      $cn = \Src\Model::getInstance();
      $result = $cn->query($sql, array(':username' => $username));

      // User likely doesn't exist
      if (!$result) {
         if (APP_DEBUG) trigger_error('User `' . $username . '` does not exist!', E_USER_WARNING);
         $this->_destroy();
         return false;
      }

      // Password doesn't match
      if (!$this->validate_password(trim($password), $result)) {
         if (APP_DEBUG) trigger_error('Password for user `' . $username . '` did not validate!', E_USER_WARNING);
         $this->_destroy();
         return false;
      }
      return $this->set_session($result); // User is logged in, add to $_SESSION data
   }

   public function user_logout() {
      $this->_destroy();
   }


   public function is_logged_in() {
      if (!isset($_SESSION['logged_in'], $_SESSION['_UniqueKey']) || $_SESSION['logged_in'] === false)
         return false;

      if ($this->validate_uniquekey())
         return true;
      else
         return false;
   }


   protected function set_session($values) {
      $this->_set_session_uniquekey();

      $_SESSION['uid']       = $values['id'];
      $_SESSION['username']  = htmlspecialchars($values['username']);
      $_SESSION['logged_in'] = true;

      if (!session_id() && APP_DEBUG)
         trigger_error('There is no session id!  Make sure session_start() is being called first!', E_USER_WARNING);

      return true;
   }


   private function _session_setup() {
      if (!isset($_SESSION)) {
         $dir_path = ini_get("session.save_path") . DIRECTORY_SEPARATOR . _SESSION_DIR;
         if (!is_dir($dir_path)) mkdir($dir_path);

         if (ini_get('session.use_trans_sid') == true) {
            ini_set('url_rewriter.tags', '');
            ini_set('session.use_trans_sid', false);
         }

         $lifetime = 60 * 60 * 24 * $this->_cookie_expiration_days;
         ini_set('session.gc_maxlifetime', $lifetime);
         ini_set('session.gc_divisor', '1');
         ini_set('session.gc_probability', '1');
         ini_set('session.cookie_lifetime', '0');
         ini_set('session.save_path', $dir_path);
         session_name(_SESSION_NAME);
         session_start();
      }
      $this->_algorithm = function_exists('hash') && in_array('sha256', hash_algos()) ? 'sha256' : null;
   }


   private function _make_uniquekey() {
      $uniquekey = $this->_secure_word;
      if ($this->_use_user_agent)
         $uniquekey .= $_SERVER['HTTP_USER_AGENT'];

      // Compile and dissect the user's IP address
      $uniquekey .= implode('.', array_slice(explode('.', $_SERVER['REMOTE_ADDR']), 0, $this->_ip_block_length));

      // Fallback to sha1 or md5 if hash() function doesn't exist
      if ($this->_algorithm === null)
         return function_exists('sha1') ? sha1($uniquekey) : md5($uniquekey);

      return hash($this->_algorithm, $uniquekey);
   }


   private function _regenerate_session_id() {
      // I *think* if the parameter is null or false, the session info (such as session filename)
      // can be stored in the database and then restored on successful login.
      session_regenerate_id(true); // Requires PHP => 5.1
   }


   private function _set_session_uniquekey() {
      $this->_regenerate_session_id();
      $_SESSION['_UniqueKey'] = $this->_make_uniquekey();
   }


   protected function validate_uniquekey() {
      $this->_regenerate_session_id();

      if (isset($_SESSION['_UniqueKey']))
         return $_SESSION['_UniqueKey'] === $this->_make_uniquekey();

      if (APP_DEBUG) echo '_UniqueKey is not set!';
      return false;
   }

   private function _destroy() {
      if (isset($_SESSION)) $_SESSION = array();
      if (isset($_COOKIE[session_name()])) setcookie(session_name(), '', time() - 40000);
      @session_destroy();
      return;
   }


   public function create_user($username, $password) {
      $username = trim($username); // Remove any extra whitespace
      $password = trim($password);
      if (strlen($username) < 1 || strlen($password) < 1) return false;

      extract($this->encrypt_password($password));

      try {
         $sql = "INSERT INTO users(username, password, pattern, salt1, salt2) VALUES " .
            "(:username, :password, :pattern, :salt1, :salt2)";
         $stmt = $this->prepare($sql);

         $stmt->bindParam(':username', $username, PDO::PARAM_STR, 75);
         $stmt->bindParam(':password', $password, PDO::PARAM_STR, 40);
         $stmt->bindParam(':pattern', $pattern, PDO::PARAM_STR, 22);
         $stmt->bindParam(':salt1', $salt1, PDO::PARAM_STR, 12);
         $stmt->bindParam(':salt2', $salt2, PDO::PARAM_STR, 10);

         $result = $stmt->execute();
      } catch (PDOException $e) {
         $msg = $e->getMessage();

         if (APP_DEBUG) {
            // Make a pretty message if it's a non-unique error
            if (preg_match('#(not unique)#i', $msg))
               echo 'That username already exists!';
            else
               echo $msg;
         }
         return false;
      }
      return $result;
   }


   protected function check_table_exists($table_name) {
      // First check if the table already exists
      if ($this->_is_sqlite) {
         $sql = "SELECT name FROM sqlite_master WHERE name=:name";
      } else {
         $sql = "SELECT COUNT(*) AS count FROM information_schema tables WHERE " .
            "table_schema = " . DB_NAME . " AND table_name=:name";
      }

      try {
         $stmt  = $this->prepare($sql);
         $stmt->bindParam(':name', $table_name, PDO::PARAM_STR);
         $stmt->execute();
         $count = strlen($stmt->fetchColumn()); // If count fails with MySQL, change this
      } catch (PDOException $e) {
         if (APP_DEBUG) echo $e->getMessage();
         exit('DB Query Failed.');
      }
      return $count > 0;
   }



   public function create_user_table() {
      $existing = array();

      if (!$this->check_table_exists('users')) {
         require_once 'users.sql.php'; // Require SQL file

         try {
            $this->exec($sql1);
         } catch (PDOException $e) {
            if (APP_DEBUG) echo $e->getMessage();
            exit('Create Table Failed.');
         }
      } else {
         $existing[] = 'users';
         //    die('User table already exists!  Please remove the call to the method `create_user_table`.');
      }

      // Here to allow for multiple create tables testing
      if (count($existing) > 0) {
         foreach ($existing as $exists) {
            echo "<pre>Table `{$exists}` already exists!  Please remove the call to the method `create_user_table`.\n</pre>";
         }
         exit();
      }
      return true;
   }
}


