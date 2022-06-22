<?php
namespace App\Models;

class Corregimientos {
   public static function insertar($data = []){
		if(!empty($data)){
			$sql = "INSERT INTO t_corregimientos (cod_correg, id_distrito, desc_correg) VALUES(:cod_correg, :id_distrito, :desc_correg)";
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

	public static function listar(){
		$sql = 'SELECT * FROM t_corregimientos ;';
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

	public static function filtrar($data){
		$sql = 'SELECT * FROM t_corregimientos WHERE id_distrito = :id_distrito ;';
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

	public static function editar($data = []){
		if(!empty($data)){
			$sql = "UPDATE t_corregimientos  SET cod_correg = :cod_correg, id_distrito = :id_distrito, desc_correg = :desc_correg WHERE id = :id";
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

	public static function eliminar($data = []){
		if(!empty($data)){
			$sql = 'DELETE FROM t_corregimientos  WHERE id = :id';
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