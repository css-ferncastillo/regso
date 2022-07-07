<?php

namespace App\Controllers;

class Hojas {

   private $is_auth;
   private static $model = [];

   public function __construct() {
      $this->is_auth = \App\Libs\Auth::is_auth();

      self::$model = [
          "id", "id_unidad", "id_servicio", "dt_atencion", "nombre_profecional", "lugar_atencion", "h_contratadas", "h_trabajadas", "h_administrativas", "num_vacaciones", "num_licencias", "num_permiso", "num_incapacidad", "num_fortuitas", "carga_laboral", "cupo_utilizado", "cupo_disponible", "cupo_ausente", "cupo_no_solicitado", "dt_creacion", "id_usuario", "estado"
      ];
   }

   public function index() {
      \Helpers\Helpers::redirect('hojas/listar');
   }

   public function listar() {
      $data = [];
      $data['atenciones'] = \App\Models\Hojaespecialista::filtrarByUsuario([':id_usuario' => $_SESSION[APP_SESSION_NAME]['user_info']['id']])['data'];
      \Core\Engine::set('data', $data);
      \Core\Engine::set('title_page', 'Hojas de Atenci&oacute;n');
      \Core\Engine::render();
   }

   public function crear() {
      \Core\Engine::set('title_page', 'Crear Hoja');
      $data = [];
      $data['unidades'] = \App\Models\Unidades::listar()['data'];
      $data['servicios'] = \App\Models\Servicios::listar()['data'];

      \Core\Engine::set('data', $data);
      \Core\Engine::render();
   }

   public function procesar_creacion() {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $post = [];
         foreach ($_POST as $nombre_campo => $valor) {
            if (in_array($nombre_campo, self::$model)) {
               $post[":" . $nombre_campo] = $valor;
            }
         }
         $post[':dt_creacion'] = date('Y-m-d H:i:s');
         ;
         $post[':id_usuario'] = $_SESSION[\APP_SESSION_NAME]['user_info']['id']; // $_SESSION['USUARIO']
         $post[':estado'] = 1;
         unset($post[':id']);
         $data = \App\Models\Hojaespecialista::insertar($post);

         header('Content-Type: appliction/json');
         \Helpers\Helpers::redirect('atenciones/crear/' . $data['data']);
         echo json_encode($data);
         die();
      } else {
         $data = [
             "title" => "Error",
             "message" => "Solicitud incorrecta",
             "class" => "alert-danger",
         ];
         header('HTTP/1.1 405 Method Not Allowed');
         header('Content-Type: appliction/json');
         echo json_encode($data);
         die();
      }
   }

   public function editar($id) {
      $data = [];
      \Core\Engine::set('title_page', 'Editar Hoja ');
      $data['unidades'] = \App\Models\Unidades::listar()['data'];
      $data['servicios'] = \App\Models\Servicios::listar()['data'];
      $data['row'] = \App\Models\Hojaespecialista::filtrarByID([':id' => $id])['data'];
      $data['id'] = $id;
      \Core\Engine::set('data', $data);
      \Core\Engine::render();
   }

   public function procesar_edicion() {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $post = [];
         foreach ($_POST as $nombre_campo => $valor) {
            if (in_array($nombre_campo, self::$model)) {
               $post[":" . $nombre_campo] = $valor;
            }
         }

         // unset($post[':id']);
         $data = \App\Models\Hojaespecialista::editar($post);

         header('Content-Type: appliction/json');
         \Helpers\Helpers::redirect('hojas');

         die();
      } else {
         $data = [
             "title" => "Error",
             "message" => "Solicitud incorrecta",
             "class" => "alert-danger",
         ];
         header('HTTP/1.1 405 Method Not Allowed');
         header('Content-Type: appliction/json');
         echo json_encode($data);
         die();
      }
   }

   public function procesar_eliminar($id) {
      $result = \App\Models\Hojaespecialista::eliminar([':id' => $id]);
      if ($result['status'] == 'success') {
         header('Content-Type: appliction/json');
         $response = [
             "status" => "success",
             "message" => "Hoja eliminada correctamente",
             "class" => "alert-success"
         ];
         echo json_encode($response);
      }
   }

   public function detalles($hoja) {
      $data = [];
      \Core\Engine::set('title_page', 'Detalles Hoja');
      $data['hoja'] = \App\Models\Hojaespecialista::filtrarByID([':id' => $hoja])['data'];
      $data['atenciones'] = \App\Models\Regatenciones::filterByHoja([':id_hoja_especialista' => $hoja])['data'];
      $data['id'] = $hoja;
      \Core\Engine::set('data', $data);
      \Core\Engine::render();
   }

}
