<?php

namespace Helpers;

class UsrFlash
{
   private static $icon;
   public function __construct(){
      self::$icon = [
         'success' => '<i class="fa fa-check-circle"></i>',
         'error' => '<i class="fa fa-exclamation-circle"></i>',
         'info' => '<i class="fa fa-info-circle"></i>',
         'warning' => '<i class="fa fa-exclamation-triangle"></i>'
      ];
   }
   public static function set($type, $message){
      $_SESSION['flash'][$type] = $message;
   }

   public static function get($type){
      if (isset($_SESSION['flash'][$type])) {
         $message = $_SESSION['flash'][$type];
         unset($_SESSION['flash'][$type]);
         return $message;
      }
   }

   public static function has($type){
      return isset($_SESSION['flash'][$type]);
   }

   public static function clear(){
      unset($_SESSION['flash']);
   }

   public static function all(){
      return $_SESSION['flash'];
   }

   public static function render($type){
      if (self::has($type)) {
         $message = self::get($type);
        $str = '<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">';
        $str += '<div class="alert alert-primary d-flex align-items-center" role="alert">';
        $str += '<div class="flex-shrink-">'. self::$icon[$type] .'</div>';
        $str += '<div class="flex-grow-1 ms-3">';
        $str += '<p class="mb-0">'.$message.'</p></div></div>';
        echo $str;
      }
   }

   public static function renderAll(){
      $flash = self::all();
      foreach ($flash as $type => $message) {
         $str = '<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">';
         $str += '<div class="alert alert-primary d-flex align-items-center" role="alert">';
         $str += '<div class="flex-shrink-">'. self::$icon[$type] .'</div>';
         $str += '<div class="flex-grow-1 ms-3">';
         $str += '<p class="mb-0">'.$message.'</p></div></div>';
         echo $str;
      }
   }

   public static function clearAll(){
      self::clear();
   }
}
