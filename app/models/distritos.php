<?php
namespace App\Models;

class Distritos {
   public static function insertar($data = []){
		if(!empty($data)){
			$sql = "INSERT INTO  t_distritos(cod_dist, id_provincia, desc_dist) VALUES(:cod_dist, :id_provincia, :desc_dist)";
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
		$sql = 'SELECT td.id, td.id_provincia, tp.desc_prov, td.desc_dist FROM t_distritos td LEFT JOIN t_provincias tp ON tp.id = td.id_provincia;';
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

	public static function filtrar($data=[]){
		$sql = 'SELECT * FROM  t_distritos WHERE id_provincia = :id_provincia;';
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

	public static function editar($data = []){
		if(!empty($data)){
			$sql = "UPDATE t_distritos SET cod_dist = :cod_dist, id_provincia = :id_provincia, desc_dist = :desc_dist WHERE id = :id";
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
			$sql = 'DELETE FROM  t_distritos WHERE id = :id';
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