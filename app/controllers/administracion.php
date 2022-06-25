<?php
namespace App\Controllers;

class Administracion {
    
    public function index() {
        \Core\Engine::set('title_page', 'Administración');
        \Core\Engine::render();
    }
   

    public function usuarios() {
        $usuarios = \App\Models\Usuarios::listar();
        // echo '<pre>';
        // print_r($usuarios);
        // echo '</pre>';
        \Core\Engine::set('title_page', 'Usuarios');
        if($usuarios['type'] == 'success'){
            \Core\Engine::set('usuarios', $usuarios['data']);
        } else {
            \Core\Engine::set('error', $usuarios);
        }
        \Core\Engine::render();
    }

    public function actividad_economica() {
        \Core\Engine::set('title_page', 'Actividad Economica');
        \Core\Engine::render();
    }

    public function alta_laboral(){
        \Core\Engine::set('title_page', 'Alta Laboral');
        \Core\Engine::render();
    }

    public function ref_empresas(){
        \Core\Engine::set('title_page', 'Referencias Empresas');
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