<?php

namespace App\Models;

class Regactividades {

   public static function insertar($data = []) {
      if (!empty($data)) {
         $sql = "INSERT INTO t_reg_actividades(id_unidad, id_servicio, dt_visita, htrabajadas, nombre_profecional, nombre_empresa, num_patronal, id_actividad_economica, id_referencia, num_empleados, num_hombres, num_mujeres, num_beneficiados, id_corregimiento, json_actividades, id_usuario, dt_creacion) "
                 . "VALUES(:id_unidad, :id_servicio, :dt_visita, :htrabajadas, :nombre_profecional, :nombre_empresa, :num_patronal, :id_actividad_economica, :id_referencia, :num_empleados, :num_hombres, :num_mujeres, :num_beneficiados, :id_corregimiento, :json_actividades, :id_usuario, :dt_creacion)";
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
                   "type" => "warning",
                   "data" => $result
               ];
            }
            return $data;
            die();
         } catch (\PDOException $e) {
            $data = [
                "title" => "Warning",
                "message" => "Error al crear la información",
                "type" => "warning",
                "data" => $data,
                "sql" => $sql
            ];
            return $data;
            die();
         }
      }
   }

   public static function listar() {
      $sql = 'SELECT
		tra.id,
		tra.id_unidad, -- unidades
		tu.desc_unidad_alterno,
		tu.desc_unidad,
		tra.id_servicio,
		ts.desctipcion,
		tra.dt_visita,
		tra.htrabajadas,
		tra.nombre_profecional,
		tra.nombre_empresa,
		tra.num_patronal,
		tra.id_actividad_economica,
		tae.actividad_economica,
		tra.id_referencia,
		tre.ref_empresa,
		tra.num_empleados,
		tra.num_hombres,
		tra.num_mujeres,
		tra.num_beneficiados,
		tra.id_corregimiento,
		tc.cod_correg,
		tc.desc_correg,
		td.cod_dist,
		td.desc_dist,
		tp.cod_prov,
		tp.desc_prov,
		tra.json_actividades,
		tra.id_usuario,
		tu2.correo,
		tu2.nombre1,
		tu2.apellido1,
		tra.dt_creacion
  FROM t_reg_actividades tra
  LEFT JOIN t_unidades tu ON tu.id  = tra.id_unidad
  LEFT JOIN t_servicios ts ON ts.id  = tra.id_servicio
  LEFT JOIN t_act_economica tae ON tae.id  = tra.id_actividad_economica
  LEFT JOIN t_ref_empresas tre ON tre.id = tra.id_referencia
  LEFT JOIN t_corregimientos tc ON tc.id  = tra.id_corregimiento
  LEFT JOIN t_distritos td ON td.id  = tc.id_distrito
  LEFT JOIN t_provincias tp ON tp.id  = td.id_provincia
  LEFT JOIN t_usuarios tu2 ON tu2.id  = tra.id_usuario ;';
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
                "type" => "warning",
                "data" => $result
            ];
         }
         return $data;
         die();
      } catch (\PDOException $e) {
         $data = [
             "title" => "Warning",
             "message" => "Error al obtener la información",
             "type" => "warning",
             "data" => $e->getMessage()
         ];
         return $data;
         die();
      }
   }

   public static function filtrarByUsuario($data = []) {
      $sql = 'SELECT
		tra.id,
		tra.id_unidad, -- unidades
		tu.desc_unidad_alterno,
		tu.desc_unidad,
		tra.id_servicio,
		ts.desctipcion,
		tra.dt_visita,
		tra.htrabajadas,
		tra.nombre_profecional,
		tra.nombre_empresa,
		tra.num_patronal,
		tra.id_actividad_economica,
		tae.actividad_economica,
		tra.id_referencia,
		tre.ref_empresa,
		tra.num_empleados,
		tra.num_hombres,
		tra.num_mujeres,
		tra.num_beneficiados,
		tra.id_corregimiento,
		tc.cod_correg,
		tc.desc_correg,
		td.cod_dist,
		td.desc_dist,
		tp.cod_prov,
		tp.desc_prov,
		tra.json_actividades,
		tra.id_usuario,
		tu2.correo,
		tu2.nombre1,
		tu2.apellido1,
		tra.dt_creacion
  FROM t_reg_actividades tra
  LEFT JOIN t_unidades tu ON tu.id  = tra.id_unidad
  LEFT JOIN t_servicios ts ON ts.id  = tra.id_servicio
  LEFT JOIN t_act_economica tae ON tae.id  = tra.id_actividad_economica
  LEFT JOIN t_ref_empresas tre ON tre.id = tra.id_referencia
  LEFT JOIN t_corregimientos tc ON tc.id  = tra.id_corregimiento
  LEFT JOIN t_distritos td ON td.id  = tc.id_distrito
  LEFT JOIN t_provincias tp ON tp.id  = td.id_provincia
  LEFT JOIN t_usuarios tu2 ON tu2.id  = tra.id_usuario
  WHERE tra.id_usuario = :id_usuario;';
      try {
         $con = \Core\Model::getInstance();
         $result = $con->consulta($sql, $data);
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
                "type" => "warning",
                "data" => $result
            ];
         }
         return $data;
         die();
      } catch (\PDOException $e) {
         $data = [
             "title" => "Warning",
             "message" => "Error al obtener la información",
             "type" => "warning",
             "data" => $e->getMessage()
         ];
         return $data;
         die();
      }
   }

   public static function filtrarById($data = []) {
      $sql = 'SELECT
		tra.id,
		tra.id_unidad, -- unidades
		tu.desc_unidad_alterno,
		tu.desc_unidad,
		tra.id_servicio,
		ts.desctipcion,
		tra.dt_visita,
		tra.htrabajadas,
		tra.nombre_profecional,
		tra.nombre_empresa,
		tra.num_patronal,
		tra.id_actividad_economica,
		tae.actividad_economica,
		tra.id_referencia,
		tre.ref_empresa,
		tra.num_empleados,
		tra.num_hombres,
		tra.num_mujeres,
		tra.num_beneficiados,
		tra.id_corregimiento,
		tc.cod_correg,
		tc.desc_correg,
		td.cod_dist,
		td.desc_dist,
		tp.cod_prov,
		tp.desc_prov,
		tra.json_actividades,
		tra.id_usuario,
		tu2.correo,
		tu2.nombre1,
		tu2.apellido1,
		tra.dt_creacion
  FROM t_reg_actividades tra
  LEFT JOIN t_unidades tu ON tu.id  = tra.id_unidad
  LEFT JOIN t_servicios ts ON ts.id  = tra.id_servicio
  LEFT JOIN t_act_economica tae ON tae.id  = tra.id_actividad_economica
  LEFT JOIN t_ref_empresas tre ON tre.id = tra.id_referencia
  LEFT JOIN t_corregimientos tc ON tc.id  = tra.id_corregimiento
  LEFT JOIN t_distritos td ON td.id  = tc.id_distrito
  LEFT JOIN t_provincias tp ON tp.id  = td.id_provincia
  LEFT JOIN t_usuarios tu2 ON tu2.id  = tra.id_usuario
  WHERE tra.id = :id;';
      try {
         $con = \Core\Model::getInstance();
         $result = $con->consulta($sql, $data);
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
                "type" => "warning",
                "data" => $result
            ];
         }
         return $data;
         die();
      } catch (\PDOException $e) {
         $data = [
             "title" => "Warning",
             "message" => "Error al obtener la información",
             "type" => "warning",
             "data" => $e->getMessage()
         ];
         return $data;
         die();
      }
   }

   public static function filtrarByRegion($data = []) {
      $sql = 'SELECT
		tra.id,
		tra.id_unidad, -- unidades
		tu.desc_unidad_alterno,
		tu.desc_unidad,
		tra.id_servicio,
		ts.desctipcion,
		tra.dt_visita,
		tra.htrabajadas,
		tra.nombre_profecional,
		tra.nombre_empresa,
		tra.num_patronal,
		tra.id_actividad_economica,
		tae.actividad_economica,
		tra.id_referencia,
		tre.ref_empresa,
		tra.num_empleados,
		tra.num_hombres,
		tra.num_mujeres,
		tra.num_beneficiados,
		tra.id_corregimiento,
		tc.cod_correg,
		tc.desc_correg,
		td.cod_dist,
		td.desc_dist,
		tp.cod_prov,
		tp.desc_prov,
		tra.json_actividades,
		tra.id_usuario,
		tu2.correo,
		tu2.nombre1,
		tu2.apellido1,
		tra.dt_creacion
  FROM t_reg_actividades tra
  LEFT JOIN t_unidades tu ON tu.id  = tra.id_unidad
  LEFT JOIN t_servicios ts ON ts.id  = tra.id_servicio
  LEFT JOIN t_act_economica tae ON tae.id  = tra.id_actividad_economica
  LEFT JOIN t_ref_empresas tre ON tre.id = tra.id_referencia
  LEFT JOIN t_corregimientos tc ON tc.id  = tra.id_corregimiento
  LEFT JOIN t_distritos td ON td.id  = tc.id_distrito
  LEFT JOIN t_provincias tp ON tp.id  = td.id_provincia
  LEFT JOIN t_usuarios tu2 ON tu2.id  = tra.id_usuario
  WHERE tp.cod_prov = :cod_prov;';
      try {
         $con = \Core\Model::getInstance();
         $result = $con->consulta($sql, $data);
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
                "type" => "warning",
                "data" => $result
            ];
         }
         return $data;
         die();
      } catch (\PDOException $e) {
         $data = [
             "title" => "Warning",
             "message" => "Error al obtener la información",
             "type" => "warning",
             "data" => $e->getMessage()
         ];
         return $data;
         die();
      }
   }

   public static function editar($data = []) {
      if (!empty($data)) {
         $sql = "UPDATE t_reg_actividades
			SET
         id_unidad=:id_unidad,
         id_servicio=:id_servicio,
         dt_visita=:dt_visita,
         htrabajadas=:htrabajadas,
         nombre_profecional=:nombre_profecional,
         nombre_empresa=:nombre_empresa,
         num_patronal=:num_patronal,
         id_actividad_economica=:id_actividad_economica,
         id_referencia=:id_referencia,
         num_empleados=:num_empleados,
         num_hombres=:num_hombres,
         num_mujeres=:num_mujeres,
         num_beneficiados=:num_beneficiados,
         id_corregimiento=:id_corregimiento,
         json_actividades=:json_actividades

			WHERE id=:id;
			";
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
                   "type" => "warning",
                   "data" => $result
               ];
            }
            return $data;
            die();
         } catch (\PDOException $e) {
            $data = [
                "title" => "Warning",
                "message" => "Error al obtener la información",
                "type" => "warning",
                "data" => $e->getMessage()
            ];
            return $data;
            die();
         }
      }
   }

   public static function eliminar($data = []) {
      if (!empty($data)) {
         $sql = 'DELETE FROM t_reg_actividades WHERE id = :id';
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
                   "type" => "warning",
                   "data" => $result
               ];
            }
            return $data;
            die();
         } catch (\PDOException $e) {
            $data = [
                "title" => "Warning",
                "message" => "Error al eliminar la información",
                "type" => "warning",
                "data" => $e->getMessage()
            ];
            return $data;
            die();
         }
      }
   }

}
