<?php

namespace App\Libs;

class Auth {
   private static $_secure_word = "1q2w3e4r5t6y7u8i9o0p";
   private static $_use_user_agent = true;
   private static $_ip_block_length = 4;
   private static $_algorithm = 'AES-256-CBC';
   private static $_is_sqlite;
   private static $_cookie_name = 'tcUserLogin';
   private static $_cookie_expiration_days = 5;

   /**
    * Define una sesion
    $_SESSION['session_name'] = [
      'user_info' => [], // Datos del usuario
      'user_alerts' => [], // Alertas del usuario
    ];
    */

   public static function encrypt_password($string) {
      $inivec = openssl_random_pseudo_bytes(openssl_cipher_iv_length(self::$_algorithm));
      $txt_cifrado = openssl_encrypt($string, self::$_algorithm, self::$_secure_word, 0, $inivec);
      return base64_encode($txt_cifrado . "::" . $inivec);
   }

   public static function decrypt_password($string) {
      list($txt_cifrado, $inivec) = explode("::", base64_decode($string), 2);
      return openssl_decrypt($txt_cifrado, self::$_algorithm, self::$_secure_word, 0, $inivec);
   }

   public static function validate_password($key, $password) {
      $key = self::decrypt_password($key);
      if ($key == $password) {
         return true;
      } else {
         return false;
      }
   }

   public static function generate_clave() {
      $txt_base = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!#$%&/()=?¡*+-<>';
      $strength = 9;
      $input_length = strlen($txt_base);
      $random_string = '';
      for ($i = 0; $i < $strength; $i++) {
         $random_character = $txt_base[mt_rand(0, $input_length - 1)];
         $random_string .= $random_character;
      }
      return $random_string;
   }
}
