<?php
namespace Src;
class Autoload{
   public static function load(){
      spl_autoload_register(function($class){
         $class = str_replace('\\', '/', $class);
         $file = ROOT . strtolower($class) . '.php'; 
         if(file_exists($file)){
            require_once $file;
         } else {
            throw new \Exception("File not found: $file");
         }
      });
   }
}