<?php 
namespace App\Models;

class Usuarios {
   public static function insertar($data = []){
		\var_dump($data);
		if(!empty($data)){
			$sql = "INSERT INTO t_usuarios(id_unidad, id_tipo_usuario, correo, clave, nombre1, apellido1, creador, creacion_dt, estado) VALUES(:id_unidad, :id_tipo_usuario, :correo, :clave, :nombre1, :apellido1, :creador, :creacion_dt, :estado)";
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
		$sql = 'SELECT tu.id, tu.id_unidad, tun.desc_unidad, tp.desc_prov, tu.id_tipo_usuario, ttu.tipo_usuario, tu.correo, tu.clave, tu.nombre1, tu.apellido1, tu.creador, tu.creacion_dt, tu.estado FROM t_usuarios tu LEFT JOIN t_unidades tun ON tun.id = tu.id_unidad LEFT JOIN t_provincias tp ON tp.id = tun.id_provincia LEFT JOIN t_tipo_usuario ttu ON ttu.id = tu.id_tipo_usuario;';
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

	public static function listar_uno($data = []){
		$sql = 'SELECT tu.id, tu.id_unidad, tun.desc_unidad, tp.desc_prov, tun.id_provincia, tu.id_tipo_usuario, ttu.tipo_usuario, tu.correo, tu.clave, tu.nombre1, tu.apellido1, tu.creador, tu.creacion_dt, tu.estado FROM t_usuarios tu LEFT JOIN t_unidades tun ON tun.id = tu.id_unidad LEFT JOIN t_provincias tp ON tp.id = tun.id_provincia LEFT JOIN t_tipo_usuario ttu ON ttu.id = tu.id_tipo_usuario WHERE tu.id = :id;';
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
			$params = [
				":id" => $data[":id"],
				":id_unidad" => $data[":id_unidad"],
				":id_tipo_usuario" => $data[":id_tipo_usuario"],
				":correo" => $data[":correo"],
				":nombre1" => $data[":nombre1"],
				":apellido1" => $data[":apellido1"],
				":estado" => $data[":estado"]

			];
			$sql = "UPDATE t_usuarios SET id_unidad = :id_unidad, id_tipo_usuario = :id_tipo_usuario, correo = :correo, nombre1 = :nombre1, apellido1 = :apellido1, estado = :estado WHERE id = :id";
			try {
				$con = \Core\Model::getInstance();
				$result = $con->consulta($sql, $params);
				
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
			$sql = 'DELETE FROM t_usuarios WHERE id = :id';
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