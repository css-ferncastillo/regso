<?php

namespace App\Controllers;

class Atenciones
{
   public function index(){
      \Core\Engine::set('title', 'Registro de Atenciones');
      \Core\Engine::render();
   }

   public function nueva()
   {
      echo "Nueva atención";
   }

   public function editar()
   {
      echo "Editar atención";
   }

   public function eliminar()
   {
      echo "Eliminar atención";
   }

   public function ver()
   {
      echo "Ver atención";
   }
}
