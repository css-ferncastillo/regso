<?php
namespace App\Model;

class Actividadeconomica{
	public static function insertar($data = {}){
		if(!empty($data)){
			$sql = "";
			try{
				$con = \Src\Model::getInstance();
				$result = $con->consulta($sql, $data);
				if(!empty($result)){
					return $result;
				} else{
					result false;
				}
			}catch(PDOException $e){
				return $e->getMessage();
			}
		}
	}

	public static function listar(){
		$sql = '';
		try{
			$con = \Src\Model::getInstance();
			$result = $con->consulta($sql, $data);
			if(!empty($result)){
				return $result;
			} else{
				result false;
			}
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}

	public static function editar($data = {}){
		if(!empty($data)){
			$sql = "";
			try{
				$con = \Src\Model::getInstance();
				$result = $con->consulta($sql, $data);
				if(!empty($result)){
					return $result;
				} else{
					result false;
				}
			}catch(PDOException $e){
				return $e->getMessage();
			}
		}
	}

	public static function eliminar($data = {}){
		if(!empty($data)){
			$sql = "";
			try{
				$con = \Src\Model::getInstance();
				$result = $con->consulta($sql, $data);
				if(!empty($result)){
					return $result;
				} else{
					result false;
				}
			}catch(PDOException $e){
				return $e->getMessage();
			}
		}
	}
}