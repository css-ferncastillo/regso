<?php
namespace App\Controllers;

class Listfilters {
   private $is_auth;
   private static $model = [];

   public function __construct() {
      $this->is_auth = \App\Libs\Auth::is_auth();
   }

   public static function filter_unidad(int $id_provincia) {
      if ($_SERVER['REQUEST_METHOD'] == 'GET') {
         $params = [":id_provincia" => $id_provincia];
         $data = \App\Models\Unidades::filtrar($params);
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

   public static function filter_distrito(int $uid) {
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

   public function filter_corregimiento(int $distrito){
      if ($_SERVER['REQUEST_METHOD'] == 'GET') {
         $params = [':id_distrito' => $distrito];
         $data = \App\Models\Corregimientos::filtrar($params);
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