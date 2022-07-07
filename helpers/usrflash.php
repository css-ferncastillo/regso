<?php

namespace Helpers;

class Usrflash {

   public static $icon;
   public static $flash = [];

   public function __construct() {
      
   }

   public static function setFlash($type, $message) {
      return array_push(self::$flash, ['type' => $type, 'message' => $message]);
   }

   public static function sendFlash() {
      $_SESSION['flash'] = self::$flash;
   }

   public static function get($type) {
      if (isset($_SESSION['flash'])) {
         $message = $_SESSION['flash'];
         unset($_SESSION['flash']);
         return $message;
      }
   }

   public static function clear() {
      unset($_SESSION['flash']);
   }

   public static function all() {
      return $_SESSION['flash'];
   }

   public static function getIcon($icon = 'success') {
      self::$icon = [
          'success' => '<i class="fa fa-check-circle"></i>',
          'error' => '<i class="fa fa-exclamation-circle"></i>',
          'info' => '<i class="fa fa-info-circle"></i>',
          'warning' => '<i class="fa fa-exclamation-triangle"></i>'
      ];
      return self::$icon[$icon];
   }

   public static function render_all() {
      if (isset($_SESSION['flash'])) {
         $flash = self::all();
         for ($f = 0; $f < count($flash); $f++) {
            $type = $flash[$f]['type'];
            $message = $flash[$f]['message'];
            $str = '<script type="text/javascript">';
            $str .= '$(document).ready(function(){';
            $str .= "$.notify('{$message}', '{$type}', {globalPosition: 'bottom right'})";
            $str .= '});';
            $str .= '</script>';
            echo $str;
         }
         self::clear();
      }
   }

}
