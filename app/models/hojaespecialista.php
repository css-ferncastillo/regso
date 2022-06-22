<?php
namespace App\Models;

class Hojaespecialista {
   public static function insertar($data = []){
		if(!empty($data)){
			$sql = "INSERT INTO t_hoja_especialista(id_unidad, id_servicio, dt_atencion, nombre_profecional, lugar_atencion, h_contratadas, h_trabajadas, h_administrativas, num_vacaciones, num_incapacidad, num_fortuitas, carga_laboral, cupo_utilizado, cupo_disponible, cupo_ausente, cupo_no_solicitado, dt_creacion, id_usuario, estado ) VALUES(:id_unidad, :id_servicio, :dt_atencion, :nombre_profecional, :lugar_atencion, :h_contratadas, :h_trabajadas, :h_administrativas, :num_vacaciones, :num_incapacidad, :num_fortuitas, :carga_laboral, :cupo_utilizado, :cupo_disponible, :cupo_ausente, :cupo_no_solicitado, :dt_creacion, :id_usuario, :estado)";
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
		$sql = 'SELECT the.id, the.id_unidad, tun.id_provincia, tun.desc_unidad_alterno, tun.desc_unidad, the.id_servicio,  tse.desctipcion, the.dt_atencion, the.nombre_profecional, the.lugar_atencion, the.h_contratadas, the.h_trabajadas, the.h_administrativas, the.num_vacaciones, the.num_incapacidad, the.num_fortuitas, the.carga_laboral, the.cupo_utilizado, the.cupo_disponible, the.cupo_ausente, the.cupo_no_solicitado, the.dt_creacion, the.id_usuario, tus.nombre1, tus.nombre1, tus.correo, the.estado FROM t_hoja_especialista the LEFT JOIN t_unidades tun ON tun.id = the.id_unidad LEFT JOIN t_servicios tse ON tse.id = the.id_servicio LEFT JOIN t_usuarios tus ON tus.id = the.id_usuario ';
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

	public static function filtrar($data = []){
		$sql = 'SELECT the.id, the.id_unidad, tun.id_provincia, tun.desc_unidad_alterno, tun.desc_unidad, the.id_servicio,  tse.desctipcion, the.dt_atencion, the.nombre_profecional, the.lugar_atencion, the.h_contratadas, the.h_trabajadas, the.h_administrativas, the.num_vacaciones, the.num_incapacidad, the.num_fortuitas, the.carga_laboral, the.cupo_utilizado, the.cupo_disponible, the.cupo_ausente, the.cupo_no_solicitado, the.dt_creacion, the.id_usuario, tus.nombre1, tus.nombre1, tus.correo, the.estado FROM t_hoja_especialista the LEFT JOIN t_unidades tun ON tun.id = the.id_unidad LEFT JOIN t_servicios tse ON tse.id = the.id_servicio LEFT JOIN t_usuarios tus ON tus.id = the.id_usuario WHERE :campo = :valor';
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

	public static function editar($data = []){
		if(!empty($data)){
			$sql = "UPDATE t_hoja_especialista SET id_unidad = :id_unidad, id_servicio = :id_servicio, dt_atencion = :dt_atencion, nombre_profecional = :nombre_profecional, lugar_atencion = :lugar_atencion, h_contratadas = :h_contratadas, h_trabajadas = :h_trabajadas, h_administrativas = :h_administrativas, num_vacaciones = :num_vacaciones, num_incapacidad = :num_incapacidad, num_fortuitas = :num_fortuitas, carga_laboral = :carga_laboral, cupo_utilizado = :cupo_utilizado, cupo_disponible = :cupo_disponible, cupo_ausente = :cupo_ausente, cupo_no_solicitado = :cupo_no_solicitado, dt_creacion = :dt_creacion, id_usuario = :id_usuario, estado = :estado WHERE id = :id";
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
			$sql = 'DELETE FROM t_hoja_especialista WHERE id = :id';
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