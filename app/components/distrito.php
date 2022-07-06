<?php 
namespace App\Controllers;
class Distrito{
   private $is_authenticated = true;
   private static $model = [];
   public function __construct() {
      self::$model = [
         "id", "cod_correg", "id_distrito", "desc_correg"
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
         $data = \App\Models\Distritos::insertar($post);
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
         $data = \App\Models\Distritos::listar();
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

   public static function filtrar(int $uid) {
      if ($_SERVER['REQUEST_METHOD'] == 'GET') {
         $data = ["id_provincia" => $uid];
         $data = \App\Models\Distritos::filtrar($data);
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
         $data = \App\Models\Distritos::editar($post);
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
         $data = \App\Models\Distritos::eliminar($filter);
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