<?php

namespace App\Controllers;

class Auth {

   private $is_auth;
   private static $model = [];

   public function login() {
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
            var_dump($data);
            if ($data['type'] == "success") {
               if (isset($data['data'][0]['clave'])) {
                  if (\App\Libs\Auth::validate_password($data['data'][0]['clave'], $post[':clave'])) {
                     \App\Libs\Auth::set_session($data['data'][0]);
                     $uparams = ['id_usuario' => $data['data'][0]['id']];
                     $uinfo = \App\Models\Controlusuario::filtrar($uparams);
                     if ($uinfo['type'] == 'success') {
                        $dta = $uinfo['data'][0]['ultimo_acceso'];
                        $dtb = date('Y-m-d');
                        //if (strtotime(date('Y-m-d', $uinfo['data'][0]['ultimo_acceso'])) == strtotime(date('Y-m-d', '1990-01-01'))) {
                        if ($dta <= $dtb) {
                           // redirecciona a cambiar contraseña
                           \Helpers\UsrFlash::setFlash($data['type'], $data['message']);
                           \Helpers\Helpers::redirect('auth/cambiar_clave/' . $data['data'][0]['id']);
                        } else {
                           // actualizamos datos de sesion
                           $cuser = [
                               ':id_usuario' => $data['data'][0]['id'],
                               ':ultimo_acceso' => date("Y-m-d H:i:s"),
                               ':ip_acceso' => $_SERVER['REMOTE_ADDR'],
                               ':ultimo_update' => $uinfo['data'][0]['ultimo_update'],
                               ':actualizado_por' => $uinfo['data'][0]['actualizado_por']
                           ];
                           \App\Models\Controlusuario::editar($cuser);
                           // reditecciona a pagina de inicio
                           \Helpers\UsrFlash::setFlash($data['type'], $data['message']);
                           \Helpers\Usrflash::sendFlash();
                           \Helpers\Helpers::redirect('');
                        }
                     } else {
                        $cuser = [
                            ':id_usuario' => $data['data'][0]['id'],
                            ':ultimo_acceso' => date("Y-m-d H:i:s"),
                            ':ip_acceso' => $_SERVER['REMOTE_ADDR'],
                            ':ultimo_update' => date('Y-m-d'),
                            ':actualizado_por' => $data['data'][0]['id']
                        ];

                        \Helpers\UsrFlash::setFlash($data['type'], $data['message']);
                        \Helpers\UsrFlash::setFlash('warning', 'Session de usuario no actualizada o no existe');
                        \Helpers\Usrflash::sendFlash();
                        \Helpers\Helpers::redirect('');
                     }
                  } else {
                     \Helpers\UsrFlash::setFlash($data['type'], $data['message'] . " - Usuario o clave incorrecta");
                     \Helpers\Usrflash::sendFlash();
                     \Helpers\Helpers::redirect('auth/login');
                  }
               } else {
                  // \var_dump($data['data'][0]['clave']);
                  \Helpers\UsrFlash::setFlash($data['type'], $data['message'] . " - Usuario o clave incorrecta");
                  \Helpers\Usrflash::sendFlash();
                  \Helpers\Helpers::redirect('auth/login');
               }
            } else {
               \Helpers\UsrFlash::setFlash($data['type'], $data['message'] . " - Usuario o clave incorrecta");
               \Helpers\Usrflash::sendFlash();
               \Helpers\Helpers::redirect('auth/login');
            }
         } else {
            \Helpers\UsrFlash::setFlash('warning', 'No debe ingresar campos vacios');
            \Helpers\Usrflash::sendFlash();
            \Helpers\Helpers::redirect('auth/login');
         }
      } else {
         \Helpers\UsrFlash::setFlash('warning', 'Solicitud incorrecta');
         \Helpers\Usrflash::sendFlash();
         \Helpers\Helpers::redirect('auth/login');
      }
   }

   public function logout() {
      \App\Libs\Auth::logout();
      \Helpers\Helpers::redirect('');
   }

   public function cambiar_clave($id_usuario) {
      $data = \App\Models\Usuarios::listar_uno(['id' => $id_usuario])['data'];
      \Core\Engine::set('data', $data);
      \Core\Engine::render();
   }

}
