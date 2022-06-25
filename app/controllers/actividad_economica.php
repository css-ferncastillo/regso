<?php

namespace App\Controllers;

class Actividad_economica {
   private $is_authenticated = true;
   public function __construct() {
      $this->actividad_economica = [
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
