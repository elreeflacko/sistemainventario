<?php

	require_once "conexion.php";

	class ModeloBloques{

		/*=======================================
		=            MOSTRAR BLOQUES            =
		=======================================*/
		public static function mdlMostrarBloques($tabla, $item, $valor){

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
		}
		
		/*=====  End of MOSTRAR BLOQUES  ======*/

		/*=====================================================
		=            REGISTRAR BLOQUE            =
		=====================================================*/
		public static function mdlRegistrarBloque($tabla, $datos_bloque){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(bloque_nombre) 
				                                   VALUES(:bloque_nombre)");

			$stmt->bindParam(":bloque_nombre",  $datos_bloque, PDO::PARAM_STR);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			$stmt->close();
			$stmt = null;
		}
		/*=====  End of REGISTRAR BLOQUE  ======*/

		/*===============================================
		=            EDITAR bloque            =
		===============================================*/
		public static function mdlEditarBloque($tabla, $datos_bloque){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET bloque_nombre = :bloque_nombre_editar
												   WHERE bloque_id = :id_bloque");

			$stmt->bindParam(":id_bloque",            $datos_bloque["id_bloque"], PDO::PARAM_INT);
			$stmt->bindParam(":bloque_nombre_editar", $datos_bloque["bloque_nombre_editar"], PDO::PARAM_STR);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			$stmt->close();
			$stmt = null;
		}
		
		/*=====  End of EDITAR BLOQUE  ===========*/

		/*========================================
		=    ELIMINAR BLOQUE         =
		========================================*/
		
		public static function mdlEliminarBloque($tabla, $datos_bloque){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE bloque_id = :bloque_id");

			$stmt->bindParam(":bloque_id", $datos_bloque, PDO::PARAM_INT);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			$stmt->close();
			$stmt = null;
		}
		
		/*=====  End of ELIMINAR BLOQUE ======*/
		
	}