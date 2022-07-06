<?php

namespace App\Controllers;

class Admin {

   private $is_auth;
   private static $model = [];

   public function __construct() {
      $this->is_auth = \App\Libs\Auth::is_auth();
   }

   public function index() {
      \Core\Engine::set('title_page', 'Inicio');
      \Core\Engine::render();
   }

   public function usuarios() {
      if (\App\Libs\Auth::haveAccess() == false) {
         \Helpers\Usrflash::setFlash('info', 'No cuenta con permisos para accesar a esta seccion');
         \Helpers\Usrflash::sendFlash();
         \Helpers\Helpers::redirect('');
         die();
      }
      $data['usuarios'] = \App\Models\Usuarios::listar();
      $data['provincias'] = \App\Models\Provincias::listar();
      $data['roles'] = \App\Models\Tipousuario::listar();
      \Core\Engine::set('title_page', 'Usuarios');
      \Core\Engine::set('data', $data);
      \Core\Engine::render();
   }

   public function actividad_economica() {
      if (\App\Libs\Auth::haveAccess() == false) {
         \Helpers\Usrflash::setFlash('info', 'No cuenta con permisos para accesar a esta seccion');
         \Helpers\Usrflash::sendFlash();
         \Helpers\Helpers::redirect('');
         die();
      }
      $data = \App\Models\ActividadEconomica::listar();
      \Core\Engine::set('title_page', 'Actividad Economica');
      if ($data['type'] == 'success') {
         \Core\Engine::set('data', $data['data']);
      } else {
         \Core\Engine::set('error', $data);
      }
      \Core\Engine::render();
   }

   public function alta_laboral() {
      if (\App\Libs\Auth::haveAccess() == false) {
         \Helpers\Usrflash::setFlash('info', 'No cuenta con permisos para accesar a esta seccion');
         \Helpers\Usrflash::sendFlash();
         \Helpers\Helpers::redirect('');
         die();
      }
      $data = \App\Models\Altalaboral::listar();
      \Core\Engine::set('title_page', 'Alta Laboral');
      if ($data['type'] == 'success') {
         \Core\Engine::set('data', $data['data']);
      } else {
         \Core\Engine::set('error', $data);
      }
      \Core\Engine::render();
   }

   public function ref_empresas() {
      if (\App\Libs\Auth::haveAccess() == false) {
         \Helpers\Usrflash::setFlash('info', 'No cuenta con permisos para accesar a esta seccion');
         \Helpers\Usrflash::sendFlash();
         \Helpers\Helpers::redirect('');
         die();
      }
      \Core\Engine::set('title_page', 'Referencias Empresas');
      $data = \App\Models\Refempresas::listar();
      if ($data['type'] == 'success') {
         \Core\Engine::set('data', $data['data']);
      } else {
         \Core\Engine::set('error', $data);
      }
      \Core\Engine::render();
   }

   public function tipo_actividad() {
      if (\App\Libs\Auth::haveAccess() == false) {
         \Helpers\Usrflash::setFlash('info', 'No cuenta con permisos para accesar a esta seccion');
         \Helpers\Usrflash::sendFlash();
         \Helpers\Helpers::redirect('');
         die();
      }
      \Core\Engine::set('title_page', 'Tipo Actividad');
      \Core\Engine::render();
   }

   public function tipo_servicio() {
      if (\App\Libs\Auth::haveAccess() == false) {
         \Helpers\Usrflash::setFlash('info', 'No cuenta con permisos para accesar a esta seccion');
         \Helpers\Usrflash::sendFlash();
         \Helpers\Helpers::redirect('');
         die();
      }
      \Core\Engine::set('title_page', 'Tipo Servicio');
      \Core\Engine::render();
   }

   public function servicios() {
      if (\App\Libs\Auth::haveAccess() == false) {
         \Helpers\Usrflash::setFlash('info', 'No cuenta con permisos para accesar a esta seccion');
         \Helpers\Usrflash::sendFlash();
         \Helpers\Helpers::redirect('');
         die();
      }
      \Core\Engine::set('title_page', 'Servicios');
      \Core\Engine::render();
   }

   public function tipo_atencion() {
      if (\App\Libs\Auth::haveAccess() == false) {
         \Helpers\Usrflash::setFlash('info', 'No cuenta con permisos para accesar a esta seccion');
         \Helpers\Usrflash::sendFlash();
         \Helpers\Helpers::redirect('');
         die();
      }
      \Core\Engine::set('title_page', 'Tipo Atencion');
      \Core\Engine::render();
   }

   public function tipo_empresa() {
      if (\App\Libs\Auth::haveAccess() == false) {
         \Helpers\Usrflash::setFlash('info', 'No cuenta con permisos para accesar a esta seccion');
         \Helpers\Usrflash::sendFlash();
         \Helpers\Helpers::redirect('');
         die();
      }
      \Core\Engine::set('title_page', 'Tipo Empresa');
      \Core\Engine::render();
   }

   public function tipo_referencia() {
      if (\App\Libs\Auth::haveAccess() == false) {
         \Helpers\Usrflash::setFlash('info', 'No cuenta con permisos para accesar a esta seccion');
         \Helpers\Usrflash::sendFlash();
         \Helpers\Helpers::redirect('');
         die();
      }
      \Core\Engine::set('title_page', 'Tipo Referencia');
      \Core\Engine::render();
   }

   public function tipo_usuario() {
      if (\App\Libs\Auth::haveAccess() == false) {
         \Helpers\Usrflash::setFlash('info', 'No cuenta con permisos para accesar a esta seccion');
         \Helpers\Usrflash::sendFlash();
         \Helpers\Helpers::redirect('');
         die();
      }
      \Core\Engine::set('title_page', 'Tipo Usuario');
      \Core\Engine::render();
   }

   public function unidades() {
      if (\App\Libs\Auth::haveAccess() == false) {
         \Helpers\Usrflash::setFlash('info', 'No cuenta con permisos para accesar a esta seccion');
         \Helpers\Usrflash::sendFlash();
         \Helpers\Helpers::redirect('');
         die();
      }
      \Core\Engine::set('title_page', 'Unidades');
      \Core\Engine::render();
   }

}
