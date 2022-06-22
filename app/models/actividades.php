<?php
namespace App\Models;

class Actividades {
   public static function insertar($data = []){
		if(!empty($data)){
			$sql = "INSERT INTO t_actividades(tipo_actividad, descripcion, estado) VALUES(:tipo_actividad, :descripcion, :estado)";
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
		$sql = 'SELECT * FROM t_actividades;';
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

	public static function editar($data = []){
		if(!empty($data)){
			$sql = "UPDATE t_actividades SET tipo_actividad = :tipo_actividad, descripcion = :descripcion, estado = :estado WHERE id = :id";
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
			$sql = 'DELETE FROM t_actividades WHERE id = :id';
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