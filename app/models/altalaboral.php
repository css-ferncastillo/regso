<?php
namespace App\Models;

class Altalaboral{
   public static function insertar($data = []){
		if(!empty($data)){
			$sql = "INSERT INTO t_alta_laboral(alta_laboral) VALUES(:alta_laboral)";
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
		$sql = 'SELECT * FROM t_alta_laboral;';
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
			$sql = "UPDATE t_alta_laboral SET alta_laboral = :alta_laboral WHERE id = :id";
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
			$sql = 'DELETE FROM t_alta_laboral WHERE id = :id';
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