<?php

namespace App\Models\Admin;

class Provincias{
   public static function create ($data=null) {
      $sql = ""; // define la query sql
      try{
         $query = \Src\Model::getInstance()->consulta($sql, $data); // ejecuta la query
         if($query){
            $result = $query;
         }else{
            $result =  false;
         }

         $query->cerrar();
         return $result;
         die();
      } catch (\PDOException $e) {
         return $e;
      }
  }

  public static function read ($data=null) {
   $sql = ""; // define la query sql
   try{
      $query = \Src\Model::getInstance()->consulta($sql, $data); // ejecuta la query
      if($query){
         $result = $query;
      }else{
         $result =  false;
      }

      $query->cerrar();
      return $result;
      die();
   } catch (\PDOException $e) {
      return $e;
   }
  }

  public static function update ($data=null) {
   $sql = ""; // define la query sql
   try{
      $query = \Src\Model::getInstance()->consulta($sql, $data); // ejecuta la query
      if($query){
         $result = $query;
      }else{
         $result =  false;
      }

      $query->cerrar();
      return $result;
      die();
   } catch (\PDOException $e) {
      return $e;
   }
  }
  
  public static function delete ($data=null) {
   $sql = ""; // define la query sql
   try{
      $query = \Src\Model::getInstance()->consulta($sql, $data); // ejecuta la query
      if($query){
         $result = $query;
      }else{
         $result =  false;
      }

      $query->cerrar();
      return $result;
      die();
   } catch (\PDOException $e) {
      return $e;
   }
  }
}
