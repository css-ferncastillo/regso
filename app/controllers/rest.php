<?php
namespace App\Controllers;

class Rest{
   //  Actividades economicas
   public function actividad_economica($action, $param=null){
      $actividad_economica = new \App\Models\ActividadEconomica();
      switch ($action) {
         case 'listar':
            echo  json_encode($actividad_economica->listar());
            break;
         case 'insert':
            return $actividad_economica->insertar($param);
            break;
         case 'update':
            return $actividad_economica->editar($param);
            break;
         case 'delete':
            return $actividad_economica->eliminar($param);
            break;
         default:
            return false;
            break;
      }
   }
   // Actividades
   // Alta Laboral
   // Control Usuarios
}