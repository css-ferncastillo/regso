<?php

namespace App\Models;

class Regatenciones {

   public static function insertar($data = []) {
      if (!empty($data)) {
         $sql = "INSERT INTO t_reg_atenciones(`id_hoja_especialista`, `id_sexo`, `num_cedula`, `edad`, `nombre_empresa`, `num_patronal`, `id_tipo_empresa`, `id_actividad_economica`, `id_tamano_empresa`, `id_tipo_asegurado`, `id_tipo_atencion`, `id_tipo_consulta`, `id_corregimiento`, `incapacidad`, `dias_incapacidad`, `id_referencia`, `json_diagnosticos`, `json_referencias`, `id_alta_laboral`, `dt_registro`, `id_usuario`, `estado`) "
                 . "VALUES(:id_hoja_especialista, :id_sexo, :num_cedula, :edad, :nombre_empresa, :num_patronal, :id_tipo_empresa, :id_actividad_economica, :id_tamano_empresa, :id_tipo_asegurado, :id_tipo_atencion, :id_tipo_consulta, :id_corregimiento, :incapacidad, :dias_incapacidad, :id_referencia, :json_diagnosticos, :json_referencias, :id_alta_laboral, :dt_registro, :id_usuario, :estado)";
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
                "data" => $e->getMessage()
            ];
            return $data;
            die();
         }
      }
   }

   public static function listar() {
      $sql = 'SELECT
   tra.id,
   tra.id_hoja_especialista,
   tra.id_sexo,
   tra.num_cedula,
   tra.edad,
   tra.nombre_empresa,
   tra.num_patronal,
   tra.id_tipo_empresa, 
   tte.tipo_empresa,
   tra.id_actividad_economica, 
   tae.actividad_economica, 
   tra.id_tamano_empresa, 
   tte2.tamano_empresa,
   tra.id_tipo_asegurado, 
   tta2.tipo_asegurado,
   tra.id_tipo_atencion, 
   tta3.tipo_atencion,
   tra.id_tipo_consulta, 
   ttc.tipo_consulta,
   tra.id_corregimiento, 
   tc.desc_correg,
   td.desc_dist,
   tp.desc_prov,
   tra.incapacidad,
   tra.dias_incapacidad,
   tra.id_referencia, 
   ttr.tipo_referencia,
   tra.json_diagnosticos,
   tra.json_referencias,
   tra.id_alta_laboral, 
   tal.alta_laboral,
   tra.dt_registro,
   tra.id_usuario,
   tu.correo,
   tra.estado
FROM
   t_reg_atenciones tra 
LEFT JOIN t_tipo_empresa tte ON tte.id = tra.id_tipo_empresa 
LEFT JOIN t_act_economica tae  ON tae.id =  tra.id_actividad_economica 
LEFT JOIN t_tamano_empresa tte2 ON tte2.id = tra.id_tamano_empresa 
LEFT JOIN t_tipo_asegurado tta2 ON tta2.id = tra.id_tipo_asegurado 
LEFT JOIN t_tipo_atencion tta3 ON tta3.id = tra.id_tipo_atencion 
LEFT JOIN t_tipo_consulta ttc ON ttc.id = tra.id_tipo_consulta 
LEFT JOIN t_corregimientos tc ON tc.id = tra.id_corregimiento 
LEFT JOIN t_distritos td ON td.id = tc.id_distrito 
LEFT JOIN t_provincias tp ON tp.id = td.id_provincia 
LEFT JOIN t_tipo_referencias ttr ON ttr.id  = tra.id_referencia 
LEFT JOIN t_alta_laboral tal ON tal.id = tra.id_alta_laboral 
LEFT JOIN t_usuarios tu ON tu.id = tra.id_usuario;';
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

   public static function listarUno($data) {
      if (!empty($data)) {
         $sql = 'SELECT
   tra.id,
   tra.id_hoja_especialista,
   tra.id_sexo,
   tra.num_cedula,
   tra.edad,
   tra.nombre_empresa,
   tra.num_patronal,
   tra.id_tipo_empresa, 
   tte.tipo_empresa,
   tra.id_actividad_economica, 
   tae.actividad_economica, 
   tra.id_tamano_empresa, 
   tte2.tamano_empresa,
   tra.id_tipo_asegurado, 
   tta2.tipo_asegurado,
   tra.id_tipo_atencion, 
   tta3.tipo_atencion,
   tra.id_tipo_consulta, 
   ttc.tipo_consulta,
   tra.id_corregimiento, 
   tc.desc_correg,
   td.desc_dist,
   tp.desc_prov,
   tra.incapacidad,
   tra.dias_incapacidad,
   tra.id_referencia, 
   ttr.tipo_referencia,
   tra.json_diagnosticos,
   tra.json_referencias,
   tra.id_alta_laboral, 
   tal.alta_laboral,
   tra.dt_registro,
   tra.id_usuario,
   tu.correo,
   tra.estado
FROM
   t_reg_atenciones tra 
LEFT JOIN t_tipo_empresa tte ON tte.id = tra.id_tipo_empresa 
LEFT JOIN t_act_economica tae  ON tae.id =  tra.id_actividad_economica 
LEFT JOIN t_tamano_empresa tte2 ON tte2.id = tra.id_tamano_empresa 
LEFT JOIN t_tipo_asegurado tta2 ON tta2.id = tra.id_tipo_asegurado 
LEFT JOIN t_tipo_atencion tta3 ON tta3.id = tra.id_tipo_atencion 
LEFT JOIN t_tipo_consulta ttc ON ttc.id = tra.id_tipo_consulta 
LEFT JOIN t_corregimientos tc ON tc.id = tra.id_corregimiento 
LEFT JOIN t_distritos td ON td.id = tc.id_distrito 
LEFT JOIN t_provincias tp ON tp.id = td.id_provincia 
LEFT JOIN t_tipo_referencias ttr ON ttr.id  = tra.id_referencia 
LEFT JOIN t_alta_laboral tal ON tal.id = tra.id_alta_laboral 
LEFT JOIN t_usuarios tu ON tu.id = tra.id_usuario
WHERE tra.id = :id';
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
   }

   public static function filterByHoja($data) {
      if (!empty($data)) {
         $sql = 'SELECT
   tra.id,
   tra.id_hoja_especialista,
   tra.id_sexo,
   tra.num_cedula,
   tra.edad,
   tra.nombre_empresa,
   tra.num_patronal,
   tra.id_tipo_empresa, 
   tte.tipo_empresa,
   tra.id_actividad_economica, 
   tae.actividad_economica, 
   tra.id_tamano_empresa, 
   tte2.tamano_empresa,
   tra.id_tipo_asegurado, 
   tta2.tipo_asegurado,
   tra.id_tipo_atencion, 
   tta3.tipo_atencion,
   tra.id_tipo_consulta, 
   ttc.tipo_consulta,
   tra.id_corregimiento, 
   tc.desc_correg,
   td.desc_dist,
   tp.desc_prov,
   tra.incapacidad,
   tra.dias_incapacidad,
   tra.id_referencia, 
   ttr.tipo_referencia,
   tra.json_diagnosticos,
   tra.json_referencias,
   tra.id_alta_laboral, 
   tal.alta_laboral,
   tra.dt_registro,
   tra.id_usuario,
   tu.correo,
   tra.estado
FROM
   t_reg_atenciones tra 
LEFT JOIN t_tipo_empresa tte ON tte.id = tra.id_tipo_empresa 
LEFT JOIN t_act_economica tae  ON tae.id =  tra.id_actividad_economica 
LEFT JOIN t_tamano_empresa tte2 ON tte2.id = tra.id_tamano_empresa 
LEFT JOIN t_tipo_asegurado tta2 ON tta2.id = tra.id_tipo_asegurado 
LEFT JOIN t_tipo_atencion tta3 ON tta3.id = tra.id_tipo_atencion 
LEFT JOIN t_tipo_consulta ttc ON ttc.id = tra.id_tipo_consulta 
LEFT JOIN t_corregimientos tc ON tc.id = tra.id_corregimiento 
LEFT JOIN t_distritos td ON td.id = tc.id_distrito 
LEFT JOIN t_provincias tp ON tp.id = td.id_provincia 
LEFT JOIN t_tipo_referencias ttr ON ttr.id  = tra.id_referencia 
LEFT JOIN t_alta_laboral tal ON tal.id = tra.id_alta_laboral 
LEFT JOIN t_usuarios tu ON tu.id = tra.id_usuario
WHERE tra.id_hoja_especialista = :id_hoja_especialista';
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
   }

   public static function editar(array $data): array {
      if (!empty($data)) {
         $sql = "UPDATE t_reg_atenciones SET id_hoja_especialista, id_sexo = :id_sexo, num_cedula = :num_cedula, edad = :edad, nombre_empresa = :nombre_empresa, num_patronal = :num_patronal, id_tipo_empresa = :id_tipo_empresa, id_actividad_economica = :id_actividad_economica, id_tamano_empresa = :id_tamano_empresa, id_tipo_asegurado = :id_tipo_asegurado, id_tipo_atencion = :id_tipo_atencion, id_tipo_consulta = :id_tipo_consulta, id_corregimiento = :id_corregimiento, incapacidad = :incapacidad, dias_incapacidad = :dias_incapacidad, id_referencia = :id_referencia, json_diagnosticos = :json_diagnosticos, json_referencias = :json_referencias, id_alta_laboral = :id_alta_laboral, dt_registro = :dt_registro, id_usuario = :id_usuario, estado = :estado WHERE id = :id";
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
         $sql = 'DELETE FROM t_reg_atenciones WHERE id = :id';
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
