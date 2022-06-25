<?php

namespace App\Models;

class Controlusuario {
	public static function insertar($data = []) {
		if (!empty($data)) {
			$sql = "INSERT INTO  t_control_usuario (id_usuario, ultimo_acceso, ip_access, ultimo_update, actualizado_por) VALUES(:id_usuario, :ultimo_acceso, :ip_access, :ultimo_update, :actualizado_por)";
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
		$sql = 'SELECT * FROM  t_control_usuario ;';
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

	public static function filtrar($data) {
		$sql = 'SELECT * FROM  t_control_usuario WHERE id_usuariio = :id_usuario;';
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

	public static function editar($data = []) {
		if (!empty($data)) {
			$sql = "UPDATE  t_control_usuario  SET ultimo_acceso = :ultimo_acceso, ip_access = :ip_access, ultimo_update = :ultimo_update, actualizado_por = :actualizado_por WHERE id_usuario = :id_usuario";
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
			$sql = 'DELETE FROM  t_control_usuario  WHERE id = :id';
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
