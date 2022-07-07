<?php

namespace App\Models;

class Actividades {

   public static function insertar($data = []) {
      if (!empty($data)) {
         $sql = "INSERT INTO t_actividades(tipo_actividad, descripcion, estado) VALUES(:tipo_actividad, :descripcion, :estado)";
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
      $sql = 'SELECT * FROM t_actividades;';
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
         $sql = "UPDATE t_actividades SET tipo_actividad = :tipo_actividad, descripcion = :descripcion, estado = :estado WHERE id = :id";
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
         $sql = 'DELETE FROM t_actividades WHERE id = :id';
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
