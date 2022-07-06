<?php

namespace App\Controllers;

class Atenciones {

   private $is_auth;
   private static $model = [];

   public function __construct() {
      $this->is_auth = \App\Libs\Auth::is_auth();
      self::$model = [
          "id", "id_hoja_especialista", "id_sexo", "num_cedula", "edad", "nombre_empresa", "num_patronal", "id_tipo_empresa", "id_actividad_economica", "id_tamano_empresa", "id_tipo_asegurado", "id_tipo_atencion", "id_tipo_consulta", "id_corregimiento", "incapacidad", "dias_incapacidad", "id_referencia", "diagnosticos", "referencias", "id_alta_laboral", "dt_registro", "id_usuario", "estado"
      ];
   }

   public function index() {
      $data = [
          "title" => "Actividades",
          "message" => "Listado de Actividades",
          "class" => "alert-info"
      ];
      header('Content-Type: appliction/json');
      echo json_encode($data);
   }

   public function crear($hoja) {
      if (isset($hoja)) {
         \Core\Engine::set('title_page', 'Registro de Atenciones');
         $data['hoja'] = $hoja;
         $data['tipo_empresa'] = \App\Models\TipoEmpresa::listar()['data'];
         $data['actividad'] = \App\Models\Actividadeconomica::listar()['data'];
         $data['tamanio_empresa'] = \App\Models\Tamanoempresa::listar()['data'];
         $data['tipo_paciente'] = \App\Models\Tipoasegurado::listar()['data'];
         $data['tipo_atencion'] = \App\Models\Tipoatencion::listar()['data'];
         $data['tipo_consulta'] = \App\Models\Tipoconsulta::listar()['data'];
         $data['provincia'] = \App\Models\Provincias::listar()['data'];
         $data['referencia'] = \App\Models\Tiporeferencia::listar()['data'];
         $data['alta_laboral'] = \App\Models\Altalaboral::listar()['data'];
         \Core\Engine::set('data', $data);
         \Core\Engine::render();
      }
   }

   // las atenciones se listan dentro de su hoja de atencion, no se listan individualmente
   // public function listar(){}

   public function proceso_crear() {
      $post = [];
      foreach ($_POST as $nombre_campo => $valor) {
         $post[":" . $nombre_campo] = $valor;
      }
      // dt_registro, id_usuario
      $post[':dt_registro'] = date('Y-m-d');
      $post[':id_usuario'] = $_SESSION[APP_SESSION_NAME]['user_info']['id'];
      $result = \App\Models\Regatenciones::insertar($post);
      if ($result['type'] == 'success') {
         echo json_encode($result);
      } else {
         echo json_encode($post);
      }
   }

   public function editar() {
      
   }

   public function eliminar() {
      
   }

}
