<?php

namespace App\Controllers;

class Actividad_economica {
   
   private $is_authenticated = true;
   private static $model = [];
   public function __construct() {
      self::$model = [
         'id', 'actividad_economica'
      ];

      if ($this->is_authenticated == false) {
         $data = [
            "title" => "Error",
            "message" => "Error de Autenticacion",
            "class" => "alert-danger"
         ];
         header('HTTP/1.1 401 Unauthorized');
         header('Content-Type: appliction/json');
         echo json_encode($data);
         die();
      }
   }

   public function crear() {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $post = [];
         foreach ($_POST as $nombre_campo => $valor) {
            if (in_array($nombre_campo, $this->actividad_economica)) {
               $post[":" . $nombre_campo] = $valor;
            }
         }
         $data = \App\Models\Actividadeconomica::insertar($post);
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
            \Helpers\UsrFlash::setFlash($data['type'], $data['message']);
         } else {
            // TODO: Cambiar el usuario por la sesion
          //  unset($post[":id"]);
            $post[':creador'] = 'ferncastillo';//$_SESSION['id'];
            $post[':creacion_dt'] = date('Y-m-d H:i:s');
            $post[':clave'] = \App\Libs\Auth::encrypt_password($post[':clave']);
            
            $data = \App\Models\Usuarios::insertar($post);
            \Helpers\UsrFlash::setFlash($data['type'], $data['message']);
         }
         header('Content-Type: appliction/json');
         echo json_encode($data);
         \Helpers\Helpers::redirect('administracion/usuarios');
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


   public function listar() {
      if ($_SERVER['REQUEST_METHOD'] == 'GET') {
         $data = \App\Models\Actividadeconomica::listar();
         header('Content-Type: appliction/json');
         echo json_encode($data);
         die();
      } else {
         $data = [
            "title" => "Error",
            "message" => "Solicitud incorrecta",
            "class" => "alert-danger"
         ];
         header('Content-Type: appliction/json');
         echo json_encode($data);
         die();
      }
   }

   public function editar(int $id) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $post = [];
         foreach ($_POST as $nombre_campo => $valor) {
            if (in_array($nombre_campo, $this->actividad_economica)) {
               $post[":" . $nombre_campo] = $valor;
            }
         }
         $post[':id'] = $id;
         $data = \App\Models\Actividadeconomica::editar($post);
         header('Content-Type: appliction/json');
         echo json_encode($data);
         die();
      } else {
         $data = [
            "title" => "Error",
            "message" => "Solicitud incorrecta",
            "class" => "alert-danger"
         ];
         header('Content-Type: appliction/json');
         echo json_encode($data);
         die();
      }
   }

   public function eliminar(int $id) {
      if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
         $filter = ["id" => $id];
         $data = \App\Models\Actividadeconomica::eliminar($filter);
         header('Content-Type: appliction/json');
         echo json_encode($data);
         die();
      } else {
         $data = [
            "title" => "Error",
            "message" => "Solicitud incorrecta",
            "class" => "alert-danger"
         ];
         header('Content-Type: appliction/json');
         echo json_encode($data);
         die();
      }
   }
}
