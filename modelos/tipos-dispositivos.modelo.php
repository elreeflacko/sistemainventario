<?php

	require_once "conexion.php";

	class ModeloTiposDispositivos {

		/*========================================
		=     Mostrar tipos de dispositivos      =
		========================================*/
		public static function mdlMostrarTiposDispositivos($tabla, $item, $valor){

			if ($item != null) {
				
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
				$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
				$stmt->execute();
				return $stmt->fetch();
			
			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
				$stmt->execute();
				return $stmt->fetchAll();
			}
			
			$stmt->close();
			$stmt = null;
		}
		/*=====  End of Mostrar usuarios  ======*/

		/*=====================================================
		=            REGISTRAR TIPO DE DISPOSITIVO            =
		=====================================================*/
		public static function mdlRegistrarTipoDispositivo($tabla, $datos_tipo_dispositivo){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tipo_dispositivo_nombre, tipo_dispositivo_imagen) 
				                                   VALUES(:tipo_dispositivo_nombre, :tipo_dispositivo_imagen)");

			$stmt->bindParam(":tipo_dispositivo_nombre",  $datos_tipo_dispositivo["tipo_dispositivo_nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":tipo_dispositivo_imagen",  $datos_tipo_dispositivo["tipo_dispositivo_imagen"], PDO::PARAM_STR);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			$stmt->close();
			$stmt = null;
		}
		/*=====  End of REGISTRAR TIPO DE DISPOSITIVO  ======*/

		/*===============================================
		=            EDITAR TIPO DISPOSITIVO            =
		===============================================*/
		public static function mdlEditarTipoDispositivo($tabla, $datos_tipo_dispositivo){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tipo_dispositivo_nombre = :tipo_dispositivo_nombre_editar, tipo_dispositivo_imagen = :tipo_dispositivo_imagen_editar
												   WHERE tipo_dispositivo_id = :id_tipo_dispositivo");

			$stmt->bindParam(":id_tipo_dispositivo",            $datos_tipo_dispositivo["id_tipo_dispositivo"], PDO::PARAM_INT);
			$stmt->bindParam(":tipo_dispositivo_nombre_editar", $datos_tipo_dispositivo["tipo_dispositivo_nombre_editar"], PDO::PARAM_STR);
			$stmt->bindParam(":tipo_dispositivo_imagen_editar", $datos_tipo_dispositivo["tipo_dispositivo_imagen"], PDO::PARAM_STR);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			$stmt->close();
			$stmt = null;
		}
		
		
		/*=====  End of EDITAR TIPO DISPOSITIVO  ======*/

		/*========================================
		=    ELIMINAR TIPO DISPOSITIVO           =
		========================================*/
		
		public static function mdlEliminarTipoDispositivo($tabla, $datos_tipo_dispositivo){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE tipo_dispositivo_id = :tipo_dispositivo_id");

			$stmt->bindParam(":tipo_dispositivo_id", $datos_tipo_dispositivo, PDO::PARAM_INT);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			$stmt->close();
			$stmt = null;
		}
		
		/*=====  End of ELIMINAR TIPO DISPOSITIVO  ======*/
	}