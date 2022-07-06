<?php

namespace App\Controllers;

class Home {
   private $is_auth;
   private static $model = [];

   public function __construct() {
      \App\Libs\Auth::is_auth();
   }

   public function index() {
      \Core\Engine::set('title_page', 'Inicio');
      \Core\Engine::render();
   }

   public function auth() {
     \Core\Engine::render();
   }

   public function procesar_auth() {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $files = ["correo", "clave"];
         $post = [];
         foreach ($_POST as $nombre_campo => $valor) {
            if (in_array($nombre_campo, $files)) {
               $post[":" . $nombre_campo] = trim(htmlspecialchars($valor));
            }
         }

         if (count($post) > 0) {
            $data = \App\Models\Usuarios::auth([':correo' => $post[':correo']]);
            if ($data['type'] == "success") {
               if (isset($data['data'][0]['clave'])) {
                  if (\App\Libs\Auth::validate_password($data['data'][0]['clave'], $post[':clave'])) {
                     \App\Libs\Auth::set_session($data['data'][0]);
                     \Helpers\UsrFlash::setFlash($data['type'], $data['message']);
                     \Helpers\Helpers::redirect('/');
                  } else {
                     \Helpers\UsrFlash::setFlash($data['type'], $data['message'] . " - Clave incorrecta");
                     \Helpers\Helpers::redirect('home/auth');
                  }
               } else {
                  // \var_dump($data['data'][0]['clave']);
                  \Helpers\UsrFlash::setFlash($data['type'], $data['message'] . " - Clave no encontrada");
                  \Helpers\Helpers::redirect('home/auth');
               }
            } else {
               \Helpers\UsrFlash::setFlash($data['type'], $data['message'] . " - Correo no encontrado");
               \Helpers\Helpers::redirect('home/auth');
            }
         } else {
            \Helpers\UsrFlash::setFlash('warning', 'No debe ingresar campos vacios');
            \Helpers\Helpers::redirect('home/auth');
         }
      } else {
         \Helpers\UsrFlash::setFlash('warning', 'Solicitud incorrecta');
         \Helpers\Helpers::redirect('home/auth');
      }
   }

   public function logout() {
      \App\Libs\Auth::logout();
      \Helpers\Helpers::redirect('/');
   }
}
