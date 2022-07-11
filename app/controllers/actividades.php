<?php

namespace App\Controllers;

class Actividades {

   private $is_auth;
   private static $model = [];

   public function __construct() {
      $this->is_auth = \App\Libs\Auth::is_auth();
      self::$model = ['id', 'id_unidad', 'id_servicio', 'dt_visita', 'htrabajadas', 'nombre_profecional', 'nombre_empresa', 'num_patronal', 'id_actividad_economica', 'id_referencia', 'num_empleados', 'num_hombres', 'num_mujeres', 'num_beneficiados', 'id_corregimiento', 'json_actividades', 'id_usuario', 'dt_creacion'];
   }

   public function index() {
      \Helpers\Helpers::redirect('actividades/listar');
   }

   public function crear() {
      $data = [];
      $data['unidad'] = \App\Models\Unidades::listar()['data'];
      $data['servicio'] = \App\Models\Servicios::listar()['data'];
      $data['referencia'] = \App\Models\Refempresas::listar()['data'];
      $data['provincia'] = \App\Models\Provincias::listar()['data'];
      $data['actividad'] = \App\Models\Actividadeconomica::listar()['data'];
      $data['tipo_actividad'] = \App\Models\Tipoactividad::listar()['data'];
      $data['desc_actividades'] = \App\Models\Actividades::listar()['data'];
      \Core\Engine::set('data', $data);
      \Core\Engine::set('title_page', 'Registrar Actividad');
      \Core\Engine::render();
   }

   public function procesar_crear() {
      $post = [];
      foreach ($_POST as $nombre_campo => $valor) {
         if ($nombre_campo == 'json_actividades') {
            $post[":" . $nombre_campo] = json_encode($valor);
         } else {
            $post[":" . $nombre_campo] = $valor;
         }
      }
      $post[':id_usuario'] = $_SESSION[APP_SESSION_NAME]['user_info']['id'];
      $post[':dt_creacion'] = date('Y-m-d H:i:s');

      $result = \App\Models\Regactividades::insertar($post);
      \Helpers\Usrflash::setFlash($result['type'], $result['message']);
      \Helpers\Usrflash::sendFlash();
      echo json_encode($result);
   }

   public function procesar_editar() {
      $post = [];
      foreach ($_POST as $nombre_campo => $valor) {
         if ($nombre_campo == 'json_actividades') {
            $post[":" . $nombre_campo] = json_encode($valor);
         } else {
            $post[":" . $nombre_campo] = $valor;
         }
      }
      $result = \App\Models\Regactividades::editar($post);
      \Helpers\Usrflash::setFlash($result['type'], $result['message']);
      \Helpers\Usrflash::sendFlash();
      echo json_encode($result);
   }

   public function listar() {
      $data = [];
      $data['actividad'] = \App\Models\Regactividades::filtrarByUsuario([':id_usuario' => $_SESSION[APP_SESSION_NAME]['user_info']['id']])['data'];
      \Core\Engine::set('title_page', 'Listar Actividades');
      \Core\Engine::set('data', $data);
      \Core\Engine::render();
   }

   public function editar($id) {
      $data = [];
      $actividad = \App\Models\Regactividades::filtrarById([':id' => $id])['data'];
      $data['unidad'] = \App\Models\Unidades::listar()['data'];
      $data['servicio'] = \App\Models\Servicios::listar()['data'];
      $data['referencia'] = \App\Models\Refempresas::listar()['data'];
      $data['provincia'] = \App\Models\Provincias::listar()['data'];
      $data['distritos'] = \App\Models\Distritos::filtrar([':id_provincia' => $actividad[0]['cod_prov']])['data'];
      $data['corregimiento'] = \App\Models\Corregimientos::filtrar([':id_distrito' => $actividad[0]['cod_dist']])['data'];
      $data['actividades'] = \App\Models\Actividadeconomica::listar()['data'];
      $data['tipo_actividad'] = \App\Models\Tipoactividad::listar()['data'];
      $data['desc_actividades'] = \App\Models\Actividades::listar()['data'];
      $data['actividad'] = $actividad;
      $data['id'] = $id;
      \Core\Engine::set('data', $data);
      \Core\Engine::set('title_page', 'Editar Actividad');
      \Core\Engine::render();
   }

   public function eliminar($id) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $filter = [":id" => $id];
         $data = \App\Models\Regactividades::eliminar($filter);
         header('Content-Type: appliction/json');
         echo json_encode($data);
         die();
      } else {
         $data = [
             "title" => "Error",
            // "title" => $_SERVER['REQUEST_METHOD'],
             "message" => "Solicitud incorrecta",
             "class" => "alert-danger"
         ];
         header('HTTP/1.1 405 Method Not Allowed');
         header('Content-Type: appliction/json');
         echo json_encode($data);
         die();
      }
   }

   public function detalles($id){
      $actividad = \App\Models\Regactividades::filtrarById([':id' => $id])['data'];
      $data['actividad'] = $actividad;
      \Core\Engine::set('data', $data);
      \Core\Engine::set('title_page', 'Detalles de Actividad');
      \Core\Engine::render();
   }

}
