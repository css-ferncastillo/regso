<?php

namespace App\Controllers;

class Atenciones
{
   public function index()
   {
      \Core\Engine::set('title_page', 'Registro de Atenciones');
      \Core\Engine::render();
   }

   public function nueva_atencion($hoja)
   {
      if (isset($hoja)) {
         \Core\Engine::set('title_page', 'Registro de Atenciones');
         \Core\Engine::render();
      }
   }

   public function nueva_hoja()
   {
      \Core\Engine::set('title_page', 'Registro de Atenciones');
      \Core\Engine::render();
   }

   public function detalle_hoja($hoja)
   {
      if (isset($hoja)) {
         \Core\Engine::set('title_page', 'Detalles de Hoja de Atencion');
         \Core\Engine::render();
      }
   }
}
