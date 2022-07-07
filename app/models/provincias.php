<?php

namespace App\Models;

class Provincias {

   public static function insertar($data = []) {
      if (!empty($data)) {
         $sql = "INSERT INTO t_provincias(cod_prov, desc_prov, estado) VALUES(:cod_prov, :desc_prov, :estado)";
         try {
            $con = \Core\Model::getInstance();
            $result = $con->consulta($sql, $data);
            if (!empty($result)) {
               $data = [
                   "title" => "Success",
                   "message" => "Informacion agregada satisfactoriamente",
                   "type" => "success",
                   "data" => $result
               ];
            } else {
               $data = [
                   "title" => "Warning",
                   "message" => "Información no creada, datos vacios",
                   "type" => "warn",
                   "data" => $result
               ];
            }
            return $data;
            die();
         } catch (\PDOException $e) {
            $data = [
                "title" => "Warning",
                "message" => "Error al crear la información",
                "type" => "warn",
                "data" => $e->getMessage()
            ];
            return $data;
            die();
         }
      }
   }

   public static function listar() {
      $sql = 'SELECT * FROM t_provincias;';
      try {
         $con = \Core\Model::getInstance();
         $result = $con->consulta($sql);
         if (!empty($result)) {
            $data = [
                "title" => "Success",
                "message" => "Informacion encontrada satisfactoriamente",
                "type" => "success",
                "data" => $result
            ];
         } else {
            $data = [
                "title" => "Warning",
                "message" => "Información no encontrada, datos vacios",
                "type" => "warn",
                "data" => $result
            ];
         }
         return $data;
         die();
      } catch (\PDOException $e) {
         $data = [
             "title" => "Warning",
             "message" => "Error al obtener la información",
             "type" => "warn",
             "data" => $e->getMessage()
         ];
         return $data;
         die();
      }
   }

   public static function editar($data = []) {
      if (!empty($data)) {
         $sql = "UPDATE t_provincias SET cod_prov = :cod_prov, desc_prov = :desc_prov, estado = :estado WHERE id = :id";
         try {
            $con = \Core\Model::getInstance();
            $result = $con->consulta($sql, $data);
            if (!empty($result)) {
               $data = [
                   "title" => "Success",
                   "message" => "Informacion modificada satisfactoriamente",
                   "type" => "success",
                   "data" => $result
               ];
            } else {
               $data = [
                   "title" => "Warning",
                   "message" => "Información no modificada, datos vacios",
                   "type" => "warn",
                   "data" => $result
               ];
            }
            return $data;
            die();
         } catch (\PDOException $e) {
            $data = [
                "title" => "Warning",
                "message" => "Error al obtener la información",
                "type" => "warn",
                "data" => $e->getMessage()
            ];
            return $data;
            die();
         }
      }
   }

   public static function eliminar($data = []) {
      if (!empty($data)) {
         $sql = 'DELETE FROM t_provincias WHERE id = :id';
         try {
            $con = \Core\Model::getInstance();
            $result = $con->consulta($sql, $data);
            if (!empty($result)) {
               $data = [
                   "title" => "Success",
                   "message" => "Informacion eliminada satisfactoriamente",
                   "type" => "success",
                   "data" => $result
               ];
            } else {
               $data = [
                   "title" => "Warning",
                   "message" => "Información no eliminada, datos vacios",
                   "type" => "warn",
                   "data" => $result
               ];
            }
            return $data;
            die();
         } catch (\PDOException $e) {
            $data = [
                "title" => "Warning",
                "message" => "Error al eliminar la información",
                "type" => "warn",
                "data" => $e->getMessage()
            ];
            return $data;
            die();
         }
      }
   }

}
