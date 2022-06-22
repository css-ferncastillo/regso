<?php
namespace App\Controllers;

class Reportes {
   
      public function index() {
         \Core\Engine::set('title_page', 'Reportes');
         \Core\Engine::render();
      }
      
   
}