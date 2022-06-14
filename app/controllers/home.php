<?php
namespace App\Controllers;

class Home{
      public function index(){
         \Src\Engine::render();
      }

      public function login($e=null){
         if(isset($e)){
            $data = [
               "title" => "Error",
               "message"=> "Error de Autenticacion",
               "class"=> "alert-danger"
            ];
            \Src\Engine::set('error', $data);
         }

         \Src\Engine::render();
      }

      public function autenticar(){
         if (isset($_POST)) {
            $post = [];
            foreach ($_POST as $nombre_campo => $valor) {
               $post[":" . $nombre_campo] = $valor;
            }
            
         }
      }
      
}