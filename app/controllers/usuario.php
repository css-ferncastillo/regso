<?php

namespace App\Controllers;

class Usuario {

   private $is_auth;
   private static $model = [];

   public function __construct() {
      $this->is_auth = \App\Libs\Auth::is_auth();

      self::$model = [
          "id", "id_unidad", "id_tipo_usuario", "correo", "clave", "nombre1", "apellido1", "creador", "creacion_dt", "estado"
      ];
   }

   public static function crear() {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $post = [];
         foreach ($_POST as $nombre_campo => $valor) {
            if (in_array($nombre_campo, self::$model)) {
               $post[":" . $nombre_campo] = $valor;
            }
         }
         $data = \App\Models\Usuarios::insertar($post);
         header('Content-Type: appliction/json');
         echo json_encode($data);
         die();
      } else {
         $data = [
             "title" => "Error",
             "message" => "Solicitud <?php
            namespace App\Controllers;incorrecta",
             "class" => "alert-danger"
         ];
         header('HTTP/1.1 405 Method Not Allowed');
         header('Content-Type: appliction/json');
         echo json_encode($data);
         die();
      }
   }

   public static function cambiar_clave($id_usuario) {
      if ($_SESSION[APP_SESSION_NAME]['user_info']['id_tipo_usuario'] == 1) {
         $post = [
             ':clave' => \App\Libs\Auth::encrypt_password(DEFAULT_PASS)
         ];

         $control = [
             ':ultimo_acceso' => '1990-01-01'
         ];
         $location = "admin/usuarios";
         $location_success = $location;
      } else {
         $location = "auth/cambiar_clave/" . $id_usuario;
         $location_success = "";

         $clave = $_POST['clave'];
         $clave1 = $_POST['clavea'];
         $clave2 = $_POST['claveb'];

         if ($clave == $clave1) {
            // contraseñas no coinciden
            \Helpers\Usrflash::setFlash('warning', 'La nueva contraseña es igual a la anterior');
            \Helpers\Usrflash::sendFlash();
            \Helpers\Helpers::redirect($location);
         }

         if ($clave1 !== $clave2) {
            // contraseñas no coinciden
            \Helpers\Usrflash::setFlash('warning', 'Contraseñas no coinciden');
            \Helpers\Usrflash::sendFlash();
            \Helpers\Helpers::redirect($location);
         }
         if (strlen($clave1) < 6) {
            \Helpers\Usrflash::setFlash('warning', 'La contraseña debe teber como minimo 6 caracteres');
            \Helpers\Usrflash::sendFlash();
            \Helpers\Helpers::redirect($location);
         }

         $post[':clave'] = \App\Libs\Auth::encrypt_password($clave1);
         $control = [
             ':ultimo_acceso' => date('Y-m-d')
         ];
      }
      $post[':id'] = $id_usuario;
      $control[':id_usuario'] = $id_usuario;
      $control[':ip_acceso'] = $_SERVER['REMOTE_ADDR'];
      $control[':ultimo_update'] = date('Y-m-d');
      $control[':actualizado_por'] = $_SESSION[APP_SESSION_NAME]['user_info']['id'];
      $cc = \App\Models\Usuarios::cambiar_clave($post);
      if ($cc['type'] == 'success') {
         $dd = \App\Models\Controlusuario::editar($control);
         if ($dd['type'] == 'success') {
            // procesos correctos
            \Helpers\Usrflash::setFlash($dd['type'], $dd['message']);
            \Helpers\Usrflash::sendFlash();
            \Helpers\Helpers::redirect($location_success);
         } else {
            // error de actualizacion
            \Helpers\Usrflash::setFlash($dd['type'], $dd['data'] . 'update control acceso');
            \Helpers\Usrflash::sendFlash();
            \Helpers\Helpers::redirect($location);
         }
      } else {
         // error de actualizacion
         \Helpers\Usrflash::setFlash($cc['type'], $cc['message'] . 'update usuario');
         \Helpers\Usrflash::sendFlash();
         \Helpers\Helpers::redirect($location);
      }
   }

   public static function create_or_update() {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

         $post = [];
         foreach ($_POST as $nombre_campo => $valor) {
            if (in_array($nombre_campo, self::$model)) {
               $post[":" . $nombre_campo] = $valor;
            }
         }

         if ($post[":id"] != "" || $post[":id"] != null) {
            $data = \App\Models\Usuarios::editar($post);
            \Helpers\UsrFlash::setFlash($data['type'], strtolower($data['message']));
            \Helpers\UsrFlash::sendFlash();
         } else {
            // TODO: Cambiar el usuario por la sesion
            unset($post[":id"]);
            $post[':creador'] = $_SESSION[APP_SESSION_NAME]['user_info']['id']; //$_SESSION['id'];
            $post[':creacion_dt'] = date('Y-m-d H:i:s');
            $post[':clave'] = \App\Libs\Auth::encrypt_password(DEFAULT_PASS);

            $data = \App\Models\Usuarios::insertar($post);
            if ($data['type'] == 'success') {
               $ui = [
                   ':id_usuario' => intval($data['data']),
                   ':ultimo_acceso' => '1990-01-01',
                   ':ip_acceso' => $_SERVER['REMOTE_ADDR'],
                   ':ultimo_update' => '1990-01-01',
                   ':actualizado_por' => $_SESSION[APP_SESSION_NAME]['user_info']['id']
               ];
               $uinfo = \App\Models\Controlusuario::insertar($ui);
               \Helpers\UsrFlash::setFlash($uinfo['type'], $uinfo['message']);
            }
            \Helpers\UsrFlash::setFlash($data['type'], $data['message']);
            \Helpers\UsrFlash::sendFlash();
         }
         \Helpers\Helpers::redirect('admin/usuarios');
         die();
      } else {
         $data = [
             "title" => "Error",
             "message" => "Solicitud " . $_SERVER['REQUEST_METHOD'] . " incorrecta",
             "class" => "alert-danger"
         ];
         header('HTTP/1.1 405 Method Not Allowed');
         header('Content-Type: appliction/json');
         echo json_encode($data);
         die();
      }
   }

   public static function listar() {
      if ($_SERVER['REQUEST_METHOD'] == 'GET') {
         $data = \App\Models\Usuarios::listar();
         header('Content-Type: appliction/json');
         echo json_encode($data);
         die();
      } else {
         $data = [
             "title" => "Error",
             "message" => "Solicitud incorrecta",
             "class" => "alert-danger"
         ];
         header('HTTP/1.1 405 Method Not Allowed');
         header('Content-Type: appliction/json');
         echo json_encode($data);
         die();
      }
   }

   public static function listar_uno(int $id) {
      if ($_SERVER['REQUEST_METHOD'] == 'GET') {
         $data = \App\Models\Usuarios::listar_uno([":id" => $id]);
         header('Content-Type: appliction/json');
         echo json_encode($data);
         die();
      } else {
         $data = [
             "title" => "Error",
             "message" => "Solicitud incorrecta",
             "class" => "alert-danger"
         ];
         header('HTTP/1.1 405 Method Not Allowed');
         header('Content-Type: appliction/json');
         echo json_encode($data);
         die();
      }
   }

   public static function actualizar() {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $post = [];
         foreach ($_POST as $nombre_campo => $valor) {
            if (in_array($nombre_campo, self::$model)) {
               $post[":" . $nombre_campo] = $valor;
            }
         }
         $data = \App\Models\Usuarios::editar($post);
         header('Content-Type: appliction/json');
         echo json_encode($data);
         die();
      } else {
         $data = [
             "title" => "Error",
             "message" => "Solicitud incorrecta",
             "class" => "alert-danger"
         ];
         header('HTTP/1.1 405 Method Not Allowed');
         header('Content-Type: appliction/json');
         echo json_encode($data);
         die();
      }
   }

   public static function eliminar(int $id) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $filter = ["id" => $id];
         $data = \App\Models\Usuarios::eliminar($filter);
         header('Content-Type: appliction/json');
         echo json_encode($data);
         die();
      } else {
         $data = [
             "title" => "Error",
             "message" => "Solicitud incorrecta",
             "class" => "alert-danger"
         ];
         header('HTTP/1.1 405 Method Not Allowed');
         header('Content-Type: appliction/json');
         echo json_encode($data);
         die();
      }
   }

}
