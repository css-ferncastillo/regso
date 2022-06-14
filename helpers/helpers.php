<?php
namespace Helpers;

class Helpers{

   private $location;

   public static function redirect($location){
      $self = new self();
      $self->location = $location;

      if(headers_sent()){
         $script = '<script type="text/javascript">';
         $script .= 'window.location.href="' . APP_URI . $self->location . '";';
         $script .= '</script>';
         $script .= '<noscript>';
         $script .= '<meta http-equiv="refresh" content="0;url=' . APP_URI .$self->location . '" />';
         $script .= '</noscript>';
         echo $script;
         die();
      }

      if(strpos($self->location, 'http') !== false){
         header('Location: ' . $self->location);
         die();
      }

      header('Location: ' . APP_URI . $self->location);
      die();
   }

   public static function print_r($data){
      echo '<pre>';
      print_r($data);
      echo '</pre>';
   }

   public static  function debug($param) {
      $t = "<script type='text/javascript'>";
      $t += "console.log(".$param."');";
      $t += "</script>";
      
      echo $t;
   }
}