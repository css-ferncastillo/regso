<?php
namespace App\Controllers;

class Actividades {
   
      public function index() {
         \Core\Engine::set('title_page', 'Actividades');
         \Core\Engine::render();
      }
}