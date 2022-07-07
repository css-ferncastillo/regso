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
         if (in_array($nombre_campo, self::$model)) {
            if ($nombre_campo = 'json_actividades') {
               $post[":" . $nombre_campo] = json_encode($valor);
            }
            $post[":" . $nombre_campo] = trim(htmlspecialchars($valor));
         }
      }
      $post[':id_usuario'] = $_SESSION[\APP_SESSION_NAME]['user_info']['id'];
      $post[':dt_creaciondate'] = ('Y-m-d H:i:s');
      echo json_encode($post);
   }

   public function listar() {
      \Core\Engine::set('title_page', 'Listar Actividades');
      \Core\Engine::render();
   }

   public function editar($param) {
      \Core\Engine::set('title_page', 'Editar Actividad');
      \Core\Engine::render();
   }

   public function eliminar($param) {
      
   }

}
