<?php
namespace App\Models;

class Regatenciones {
   public static function insertar($data = []){
		if(!empty($data)){
			$sql = "INSERT INTO t_reg_atenciones(id_hoja_especialista, id_sexo, num_cedula, edad, nombre_empresa, num_patronal, id_tipo_empresa, id_tamano_empresa, id_tipo_asegurado, id_tipo_atencion, id_tipo_consulta, id_corregimiento, incapacidad, dias_incapacidad, id_referencia, descripcion_ref1, codigo_ref1, descripcion_ref2, codigo_ref2, descripcion_ref3, codigo_ref3, descripcion_esp1, codigo_esp1, descripcion_esp2, codigo_esp2, descripcion_esp3, codigo_esp3, id_alta_laboral, dt_registro, id_usuario, estado) VALUES(:id_hoja_especialista, :id_sexo, :num_cedula, :edad, :nombre_empresa, :num_patronal, :id_tipo_empresa, :id_tamano_empresa, :id_tipo_asegurado, :id_tipo_atencion, :id_tipo_consulta, :id_corregimiento, :incapacidad, :dias_incapacidad, :id_referencia, :descripcion_ref1, :codigo_ref1, :descripcion_ref2, :codigo_ref2, :descripcion_ref3, :codigo_ref3, :descripcion_esp1, :codigo_esp1, :descripcion_esp2, :codigo_esp2, :descripcion_esp3, :codigo_esp3, :id_alta_laboral, :dt_registro, :id_usuario, :estado)";
			try{
				$con = \Core\Model::getInstance();
				$result = $con->consulta($sql, $data);
				if(!empty($result)){
					return $result;
				} else{
					$result = false;
				}
			}catch(\PDOException $e){
				return $e->getMessage();
			}
		}
	}

	public static function listar(){
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
		tra.id_tamano_empresa,
		tra.id_tipo_asegurado,
		tta.tipo_asegurado,
		tra.id_tipo_atencion,
		tta2.tipo_atencion,
		tra.id_tipo_consulta,
		ttc.tipo_consulta,
		tra.id_corregimiento,
		tco.cod_correg,
		tco.desc_correg,
		tdi.cod_dist,
		tdi.desc_dist,
		tpr.cod_prov,
		tpr.desc_prov,
		tra.incapacidad,
		tra.dias_incapacidad,
		tra.id_referencia,
		ttr.tipo_referencia,
		tra.descripcion_ref1,
		tra.codigo_ref1,
		tra.descripcion_ref2,
		tra.codigo_ref2,
		tra.descripcion_ref3,
		tra.codigo_ref3,
		tra.descripcion_esp1,
		tra.codigo_esp1,
		tra.descripcion_esp2,
		tra.codigo_esp2,
		tra.descripcion_esp3,
		tra.codigo_esp3,
		tra.id_alta_laboral,
		tra.dt_registro,
		tra.id_usuario,
		tra.estado
		FROM
		t_reg_atenciones tra
		LEFT JOIN t_tipo_empresa tte ON
		tte.id = tra.id_tipo_empresa
		LEFT JOIN t_tipo_asegurado tta ON
		tta.id = tra.id_tipo_asegurado
		LEFT JOIN t_tipo_atencion tta2 ON
		tta2.id = tra.id_tipo_atencion
		LEFT JOIN t_tipo_consulta ttc ON
		ttc.id = tra.id_tipo_consulta
		LEFT JOIN t_tipo_referencias ttr ON
		ttr.id = tra.id_referencia
		LEFT JOIN t_alta_laboral tal ON
		tal.id = tra.id_alta_laboral
		LEFT JOIN t_corregimientos tco ON
		tco.id = tra.id_corregimiento
		LEFT JOIN t_distritos tdi ON
		tdi.id = tco.id_distrito
		LEFT JOIN t_provincias tpr ON
		tpr.id = tdi.id_provincia;';
		try{
			$con = \Core\Model::getInstance();
			$result = $con->consulta($sql);
			if(!empty($result)){
				return $result;
			} else{
				$result = false;
			}
		}catch(\PDOException $e){
			return $e->getMessage();
		}
	}

	public static function editar(array $data):array{
		if(!empty($data)){
			$sql = "UPDATE t_reg_atenciones SET id_hoja_especialista = :id_hoja_especialista, id_sexo = :id_sexo, num_cedula = :num_cedula, edad = :edad, nombre_empresa = :nombre_empresa, num_patronal = :num_patronal, id_tipo_empresa = :id_tipo_empresa, id_tamano_empresa = :id_tamano_empresa, id_tipo_asegurado = :id_tipo_asegurado, id_tipo_atencion = :id_tipo_atencion, id_tipo_consulta = :id_tipo_consulta, id_corregimiento = :id_corregimiento, incapacidad = :incapacidad, dias_incapacidad = :dias_incapacidad, id_referencia = :id_referencia, descripcion_ref1 = :descripcion_ref1, codigo_ref1 = :codigo_ref1, descripcion_ref2 = :descripcion_ref2, codigo_ref2 = :codigo_ref2, descripcion_ref3 = :descripcion_ref3, codigo_ref3 = :codigo_ref3, descripcion_esp1 = :descripcion_esp1, codigo_esp1 = :codigo_esp1, descripcion_esp2 = :descripcion_esp2, codigo_esp2 = :codigo_esp2, descripcion_esp3 = :descripcion_esp3, codigo_esp3 = :codigo_esp3, id_alta_laboral = :id_alta_laboral, dt_registro = :dt_registro, id_usuario = :id_usuario, estado = :estado WHERE id = :id";
			try{
				$con = \Core\Model::getInstance();
				$result = $con->consulta($sql, $data);
				if(!empty($result)){
					return $result;
				} else{
					$result = false;
				}
			}catch(\PDOException $e){
				return $e->getMessage();
			}
		}
	}

	public static function eliminar($data = []){
		if(!empty($data)){
			$sql = 'DELETE FROM t_reg_atenciones WHERE id = :id';
			try{
				$con = \Core\Model::getInstance();
				$result = $con->consulta($sql, $data);
				if(!empty($result)){
					return $result;
				} else{
					$result = false;
				}
			}catch(\PDOException $e){
				return $e->getMessage();
			}
		}
	}
}