<?php 
namespace App\Models;

class Usuarios {
   public static function insertar($data = []){
		if(!empty($data)){
			$sql = "INSERT INTO tabla(campo) VALUES(:valor)";
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
		$sql = 'SELECT * FROM tabla;';
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
			$sql = "UPDATE tabla SET campo = :valor WHERE id = :id";
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
			$sql = 'DELETE FROM tabla WHERE id = :id';
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