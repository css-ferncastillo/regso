<?php

namespace App\Controllers;

class Atenciones {

   private $is_authenticated = true;
   private static $model = [];
   private static $model_atention = [];
   public function __construct() {
      self::$model = [
         "id", "id_unidad", "id_servicio", "dt_atencion", "nombre_profecional", "lugar_atencion", "h_contratadas", "h_trabajadas", "h_administrativas", "num_vacaciones", "num_licencias", "num_permiso","num_incapacidad", "num_fortuitas", "carga_laboral", "cupo_utilizado", "cupo_disponible", "cupo_ausente", "cupo_no_solicitado", "dt_creacion", "id_usuario", "estado"
      ];

      self::$model_atention = [
         "id", "id_hoja_especialista", "id_sexo", "num_cedula", "edad", "nombre_empresa", "num_patronal", "id_tipo_empresa", "id_actividad_economica","id_tamano_empresa", "id_tipo_asegurado", "id_tipo_atencion", "id_tipo_consulta", "id_corregimiento", "incapacidad", "dias_incapacidad", "id_referencia", "diagnosticos", "referencias", "id_alta_laboral", "dt_registro", "id_usuario", "estado"
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


   public function index() {
      $data['atenciones'] = \App\Models\Hojaespecialista::filtrarByUsuario([':id_usuario' => 1]);
      \Core\Engine::set('data', $data);
      \Core\Engine::set('title_page', 'Registro de Atenciones');
      \Core\Engine::render();
   }

   public function nueva_atencion($hoja) {
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

   public function nueva_hoja() {
      \Core\Engine::set('title_page', 'Registro de Atenciones');
      $data = [];
      $data['unidades'] = \App\Models\Unidades::listar()['data'];
      $data['servicios'] = \App\Models\Servicios::listar()['data'];
      
      \Core\Engine::set('data', $data);
      \Core\Engine::render();
   }

   public function guardar_hoja(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $post = [];
         foreach ($_POST as $nombre_campo => $valor) {
            if (in_array($nombre_campo, self::$model)) {
               $post[":" . $nombre_campo] = $valor;
            }
         }
         $post[':dt_creacion'] = date('Y-m-d H:i:s');;
         $post[':id_usuario'] =  1; // $_SESSION['USUARIO']
         $post[':estado'] = 1;
         unset($post[':id']);
         $data = \App\Models\Hojaespecialista::insertar($post);
         
         header('Content-Type: appliction/json');
         \Helpers\Helpers::redirect('/atenciones/nueva_atencion/' . $data['data']);
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

   public function editar_hoja($id){
      $data = [];
      \Core\Engine::set('title_page', 'Editar Hoja ');
      $data['unidades'] = \App\Models\Unidades::listar()['data'];
      $data['servicios'] = \App\Models\Servicios::listar()['data'];
      $data['row'] = \App\Models\Hojaespecialista::filtrarByID([':id' => $id])['data'];
      $data['id'] = $id;
      \Core\Engine::set('data', $data);
      \Core\Engine::render();
   }

   public function update_hoja(){
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
         \Helpers\Helpers::redirect('atenciones');
         
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

   public function eliminar_hoja($id){
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

   public function detalle_hoja($hoja) {
      if (isset($hoja)) {
         $data['hoja'] = \App\Models\Hojaespecialista::filtrarByID([':id' => $hoja])['data'];
         \Core\Engine::set('data', $data);
         \Core\Engine::set('title_page', 'Detalles de Hoja de Atencion');
         \Core\Engine::render();
      }
   }

   public function guardar_atencion(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $post = [];
         foreach ($_POST as $nombre_campo => $valor) {
            if (in_array($nombre_campo, self::$model_atention)) {
               $post[":" . $nombre_campo] = $valor;
            }
         }

         header('Content-Type: appliction/json');
         echo json_encode($post);
      }
   }
}
