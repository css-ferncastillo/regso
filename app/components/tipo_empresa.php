<?php 
namespace App\Controllers;

class Tipo_empresa{
   private $is_authenticated = true;
   private static $model = [];
   public function __construct() {
      self::$model = [
         "id", "tipo_empresa"
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

   public static function crear() {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $post = [];
         foreach ($_POST as $nombre_campo => $valor) {
            if (in_array($nombre_campo, self::$model)) {
               $post[":" . $nombre_campo] = $valor;
            }
         }
         $data = \App\Models\Tipoempresa::insertar($post);
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

   public static function listar() {
      if ($_SERVER['REQUEST_METHOD'] == 'GET') {
         $data = \App\Models\Tipoempresa::listar();
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
         $data = \App\Models\Tipoempresa::editar($post);
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
      if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
         $filter = ["id" => $id];
         $data = \App\Models\Tipoempresa::eliminar($filter);
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