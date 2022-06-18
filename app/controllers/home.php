<?php
namespace App\Controllers;

class Home{
      public function index(){
         \Core\Engine::render();
      }

      public function login($e=null){
         if(isset($e)){
            $data = [
               "title" => "Error",
               "message"=> "Error de Autenticacion",
               "class"=> "alert-danger"
            ];
            \Core\Engine::set('error', $data);
         }

         \Core\Engine::render();
      }

      public function autenticar(){
         if (isset($_POST)) {
            $post = [];
            foreach ($_POST as $nombre_campo => $valor) {
               $post[":" . $nombre_campo] = stripslashes(trim($valor));
            }
            $fecha = date("Y-m-d H:i:s");
            $ip = $_SERVER['REMOTE_ADDR'];
            $result = \App\Models\Auth::login($post);
            if($result){
               
            }
         }
      }
      
}