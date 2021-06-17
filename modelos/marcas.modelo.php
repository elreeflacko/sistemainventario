<?php

	require_once "conexion.php";

	class ModeloMarcas{

		/*=======================================
		=            MOSTRAR MARCAS            =
		=======================================*/
		public static function mdlMostrarMarcas($tabla, $item, $valor){

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
		
		/*=====  End of MOSTRAR MARCAS  ======*/

		/*=====================================================
		=            REGISTRAR MARCA            =
		=====================================================*/
		public static function mdlRegistrarMarca($tabla, $datos_marca){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(marca_nombre) 
				                                   VALUES(:marca_nombre)");

			$stmt->bindParam(":marca_nombre",  $datos_marca, PDO::PARAM_STR);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			$stmt->close();
			$stmt = null;
		}
		/*=====  End of REGISTRAR MARCA  ======*/

		/*===============================================
		=            EDITAR MARCA            =
		===============================================*/
		public static function mdlEditarMarca($tabla, $datos_marca){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET marca_nombre = :marca_nombre_editar
												   WHERE marca_id = :id_marca");

			$stmt->bindParam(":id_marca",            $datos_marca["id_marca"], PDO::PARAM_INT);
			$stmt->bindParam(":marca_nombre_editar", $datos_marca["marca_nombre_editar"], PDO::PARAM_STR);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			$stmt->close();
			$stmt = null;
		}
		
		/*=====  End of EDITAR MARCA  ===========*/

		/*========================================
		=    ELIMINAR MARCA         =
		========================================*/
		
		public static function mdlEliminarMarca($tabla, $datos_marca){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE marca_id = :marca_id");

			$stmt->bindParam(":marca_id", $datos_marca, PDO::PARAM_INT);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			$stmt->close();
			$stmt = null;
		}
		
		/*=====  End of ELIMINAR MARCA ======*/
	}