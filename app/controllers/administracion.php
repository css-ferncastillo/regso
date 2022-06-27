<?php
namespace App\Controllers;

class Administracion {
    
    public function index() {
        \Core\Engine::set('title_page', 'Administración');
        \Core\Engine::render();
    }
   

    public function usuarios() {
        $data = \App\Models\Usuarios::listar();
        \Core\Engine::set('title_page', 'Usuarios');
        if($data['type'] == 'success'){
            \Core\Engine::set('usuarios', $data['data']);
        } else {
            \Core\Engine::set('error', $data);
        }
        \Core\Engine::render();
    }

    public function actividad_economica() {
        $data = \App\Models\ActividadEconomica::listar();
        \Core\Engine::set('title_page', 'Actividad Economica');
        if($data['type'] == 'success'){
            \Core\Engine::set('data', $data['data']);
        } else {
            \Core\Engine::set('error', $data);
        }
        \Core\Engine::render();
    }

    public function alta_laboral(){
        $data = \App\Models\Altalaboral::listar();
        \Core\Engine::set('title_page', 'Alta Laboral');
        if($data['type'] == 'success'){
            \Core\Engine::set('data', $data['data']);
        } else {
            \Core\Engine::set('error', $data);
        }
        \Core\Engine::render();
    }

    public function ref_empresas(){
        \Core\Engine::set('title_page', 'Referencias Empresas');
        $data = \App\Models\Refempresas::listar();
        if($data['type'] == 'success'){
            \Core\Engine::set('data', $data['data']);
        } else {
            \Core\Engine::set('error', $data);
        }
        \Core\Engine::render();
    }

    public function tipo_actividad(){
        \Core\Engine::set('title_page', 'Tipo Actividad');
        \Core\Engine::render();
    }

    public function tipo_servicio(){
        \Core\Engine::set('title_page', 'Tipo Servicio');
        \Core\Engine::render();
    }

    public function servicios(){
        \Core\Engine::set('title_page', 'Servicios');
        \Core\Engine::render();
    }

    public function tipo_atencion(){
        \Core\Engine::set('title_page', 'Tipo Atencion');
        \Core\Engine::render();
    }

    public function tipo_empresa(){
        \Core\Engine::set('title_page', 'Tipo Empresa');
        \Core\Engine::render();
    }

    public function tipo_referencia(){
        \Core\Engine::set('title_page', 'Tipo Referencia');
        \Core\Engine::render();
    }

    public function tipo_usuario(){
        \Core\Engine::set('title_page', 'Tipo Usuario');
        \Core\Engine::render();
    }

    public function unidades(){
        \Core\Engine::set('title_page', 'Unidades');
        \Core\Engine::render();
    }

}