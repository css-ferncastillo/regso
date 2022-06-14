<?php
namespace Src;
class Request{
   private $controller;
   private $params;
   private $method;

   public function __construct(){
      $this->parse_url();
   }

   public function getController(){
      return $this->controller;
   }

   public function getParams(){
      return $this->params;
   }

   public function getMethod(){
      return $this->method;
   }

   public function parse_url(){

      if(!isset($_GET['url']) || empty($_GET['url'])){
         $_GET['url'] = 'home/index';
      }


      $url_filter = filter_input(INPUT_GET, "url", FILTER_SANITIZE_URL, FILTER_NULL_ON_FAILURE);
      $url_explode = explode('/', $url_filter);
      $url_array = array_filter($url_explode);




      $this->controller = count($url_array) > 0 ? strtolower(array_shift($url_array)) : 'home' ;
      $this->method = count($url_array) > 0 ? strtolower(array_shift($url_array)) : 'index' ;
      $this->params = $url_array;
      return true;
   }



}