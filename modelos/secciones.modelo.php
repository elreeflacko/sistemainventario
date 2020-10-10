<?php

	require_once "conexion.php";

	class ModeloSecciones{

		/*=======================================
		=            MOSTRAR SECCIONES            =
		=======================================*/
		public static function mdlMostrarSecciones($tabla, $item, $valor){

			if ($item != null) {

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
				$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
				$stmt->execute();
				return $stmt->fetch();
				
			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY seccion_nombre ASC");
				$stmt->execute();
				return $stmt->fetchAll();
			}
		}
		
		/*=====  End of MOSTRAR SECCIONES  ======*/

		/*=====================================================
		=            REGISTRAR SECCION            =
		=====================================================*/
		public static function mdlRegistrarSeccion($tabla, $datos_seccion){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(seccion_nombre) 
				                                   VALUES(:seccion_nombre)");

			$stmt->bindParam(":seccion_nombre",  $datos_seccion, PDO::PARAM_STR);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			$stmt->close();
			$stmt = null;
		}
		/*=====  End of REGISTRAR SECCION  ======*/

		/*===============================================
		=            EDITAR SECCION            =
		===============================================*/
		public static function mdlEditarSeccion($tabla, $datos_seccion){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET seccion_nombre = :seccion_nombre_editar
												   WHERE seccion_id = :id_seccion");

			$stmt->bindParam(":id_seccion",            $datos_seccion["id_seccion"], PDO::PARAM_INT);
			$stmt->bindParam(":seccion_nombre_editar", $datos_seccion["seccion_nombre_editar"], PDO::PARAM_STR);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			$stmt->close();
			$stmt = null;
		}
		
		/*=====  End of EDITAR SECCION  ===========*/

		/*========================================
		=    ELIMINAR SECCION         =
		========================================*/
		
		public static function mdlEliminarSeccion($tabla, $datos_seccion){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE seccion_id = :seccion_id");

			$stmt->bindParam(":seccion_id", $datos_seccion, PDO::PARAM_INT);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			$stmt->close();
			$stmt = null;
		}
		
		/*=====  End of ELIMINAR SECCION ======*/
	}