<?php

namespace Helpers;

class Usrflash {
   public static $icon;

   public function __construct() {
      
   }

   public static function setFlash($type, $message) {
      $_SESSION['flash'] = [
         [
            'type' => $type,
            'message' => $message
         ]
      ];
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



  

   public static function render_all(){
      if(isset($_SESSION['flash'])){
         $flash = self::all();
         for($f = 0; $f < count($flash); $f++){
            $type = $flash[0]['type'];
            $message = $flash[0]['message'];
            $str = '<script type="text/javascript">';
               $str .= '$(document).ready(function(){';
                  $str .= '$.notify("' . $message . '", {';
                     $str .= 'type: "' . $type . '",';
                     $str .= 'allow_dismiss: true,';
                     $str .= 'placement: {';
                     $str .= 'from: "top",';
                     $str .= 'align: "center",';
                     $str .= '},';
               $str .= '});';
               $str .= '});';
            $str .= '</script>';
            echo $str;
         }
         self::clear();
      }
   }

}
