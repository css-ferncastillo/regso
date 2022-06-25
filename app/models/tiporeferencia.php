<?php
namespace App\Models;

class Tiporeferencia {
	public static function insertar($data = []){
		if(!empty($data)){
			$sql = "INSERT INTO t_tipo_referencias(tipo_referencia) VALUES(:tipo_referencia)";
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
		$sql = 'SELECT * FROM t_tipo_referencias;';
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
			$sql = "UPDATE t_tipo_referencias SET tipo_referencia = :tipo_referencia WHERE id = :id";
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
			$sql = 'DELETE FROM t_tipo_referencias WHERE id = :id';
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