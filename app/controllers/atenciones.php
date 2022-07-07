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
         // TODO: quitar el guion bajo, se da por un espacio al final en el ajax
         $campo = ['json_diagnosticos', 'json_referencias'];
         if (in_array($nombre_campo, $campo)) {
            $post[":" . $nombre_campo] = json_encode($valor);
         } else {
            $post[":" . $nombre_campo] = $valor;
         }
      }
      // dt_registro, id_usuario
      $post[':dt_registro'] = date('Y-m-d');
      $post[':id_usuario'] = $_SESSION[APP_SESSION_NAME]['user_info']['id'];
      var_dump($post);
      $result = \App\Models\Regatenciones::insertar($post);
      \Helpers\Usrflash::setFlash($result['type'], $result['message']);
      \Helpers\Usrflash::sendFlash();

      echo json_encode($result);
   }

   public function editar($id) {
      if (isset($id)) {
         \Core\Engine::set('title_page', 'Edicion de Atenciones');
         $aten = \App\Models\Regatenciones::listarUno([':id' => $id, 'id_usuario' => $_SESSION[APP_SESSION_NAME]['user_info']['id']]);
         if ($aten['type'] == 'success') {
            $data['id_atencion'] = $id;
            $data['tipo_empresa'] = \App\Models\TipoEmpresa::listar()['data'];
            $data['actividad'] = \App\Models\Actividadeconomica::listar()['data'];
            $data['tamanio_empresa'] = \App\Models\Tamanoempresa::listar()['data'];
            $data['tipo_paciente'] = \App\Models\Tipoasegurado::listar()['data'];
            $data['tipo_atencion'] = \App\Models\Tipoatencion::listar()['data'];
            $data['tipo_consulta'] = \App\Models\Tipoconsulta::listar()['data'];
            $data['provincia'] = \App\Models\Provincias::listar()['data'];
            $data['referencia'] = \App\Models\Tiporeferencia::listar()['data'];
            $data['alta_laboral'] = \App\Models\Altalaboral::listar()['data'];
            $data['atencion'] = $aten['data'];
            $data['correg'] = \App\Models\Corregimientos::filtrar([':id_distrito' => $aten['data'][0]['id_distrito']])['data'];
            $data['dist'] = \App\Models\Distritos::filtrar([':id_provincia' => $aten['data'][0]['id_provincia']])['data'];

            \Core\Engine::set('data', $data);
            \Core\Engine::render();
         } else {
            \Helpers\Usrflash::setFlash($aten['type'], $aten['message']);
            \Helpers\Usrflash::sendFlash();
            \Helpers\Helpers::redirect('hojas/listar');
         }
      }
   }

   public function procesar_editar($id) {
      $post = [];
      foreach ($_POST as $nombre_campo => $valor) {
         $campo = ['json_diagnosticos', 'json_referencias'];
         if (in_array($nombre_campo, $campo)) {
            $post[":" . $nombre_campo] = json_encode($valor);
         } else {
            $post[":" . $nombre_campo] = $valor;
         }
      }
      // dt_registro, id_usuario
      var_dump($post);
      $result = \App\Models\Regatenciones::editar($post);
      \Helpers\Usrflash::setFlash($result['type'], $result['message']);
      \Helpers\Usrflash::sendFlash();

      echo json_encode($result);
   }

   public function eliminar() {
      
   }

}
