<?php
namespace Src;
class Router{
   public static function run (Request $req){
      $controller = $req->getController();
      $method = $req->getMethod();
      $params = $req->getParams();

      $controller_path = CONTROLLERS . $controller . '.php';
      if(file_exists($controller_path)){
         require_once $controller_path;
         $controller_class = '\App\Controllers\\'. $controller;
         $controller_obj = new $controller_class();
         \Src\Log::access_log($controller_class, $method, $params);
         if(empty($params)){
            if(method_exists($controller_obj, $method)){
               call_user_func([$controller_obj, $method]);
            } else {
               throw new \Exception("Method not found: $method", 404);
            }
         } else {
            if(method_exists($controller_obj, $method)){
               call_user_func_array([$controller_obj, $method], $params);
            } else {
               throw new \Exception("Method not found: $method", 404);
            }
         }
      } else {
         throw new \Exception("Controller not found: $controller", 404);
      }
   }
}