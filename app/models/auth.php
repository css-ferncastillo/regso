<?php

namespace App\Models;

class Auth
{
   public static function login($data)
   {
      $str = "SELECT a.id, b.desc_unidad ,id_unidad, id_tipo_usuario,nombre1,apellido1, password, ultimologin FROM t_usuarios a join t_unidad b on (a.id_unidad = b.id) WHERE correo= :usuario and a.estatus = 1;";
      try {
         //code...
         $query = \Src\Model::getInstance()->consulta($str);
         if ($query) {
            return $query;
         } else {
            return [];
         }
      } catch (\Exception $th) {
         return $th->getMessage();
      }
   }
}
