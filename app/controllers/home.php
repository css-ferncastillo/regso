<?php

namespace App\Controllers;

class Home {
   public function index() {
      \Core\Engine::set('title_page', 'Inicio');
      \Core\Engine::render();
   }

   public function login($e = null) {
      if (isset($e)) {

         $data = [
            "title" => "Error",
            "message" => "Error de Autenticacion",
            "class" => "alert-danger"
         ];
         \Core\Engine::set('error', $data);
      }

      \Core\Engine::render();
   }

   public function prueba() {


      header('Content-Type: appliction/json');
      echo json_encode($_SERVER);

      die();
   }
}
