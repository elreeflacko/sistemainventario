<?php

	require_once "conexion.php";

	class ModeloModelos{

		/*=======================================
		=            MOSTRAR MODELOS            =
		=======================================*/
		public static function mdlMostrarModelos($tabla, $item, $valor){

			if ($item != null) {

				$stmt = Conexion::conectar()->prepare("SELECT * 
					                                   FROM $tabla
					                                   JOIN marcas ON modelos.modelo_marca_id = marcas.marca_id
													   JOIN tipos_dispositivos ON modelos.modelo_tipo_dispositivo_id = tipos_dispositivos.tipo_dispositivo_id
					                                   WHERE $item = :$item");
				$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
				$stmt->execute();
				return $stmt->fetch();
				
			}else{

				$stmt = Conexion::conectar()->prepare("SELECT modelo_id, modelo_nombre, marca_id, marca_nombre, tipo_dispositivo_id, tipo_dispositivo_nombre
													   FROM $tabla
													   JOIN marcas ON modelos.modelo_marca_id = marcas.marca_id
													   JOIN tipos_dispositivos ON modelos.modelo_tipo_dispositivo_id = tipos_dispositivos.tipo_dispositivo_id
													   ORDER BY tipo_dispositivo_nombre ASC");
				$stmt->execute();
				return $stmt->fetchAll();
			}
		}
		
		/*=====  End of MOSTRAR MODELOS  ======*/

		/*=========================================
		=            REGISTRAR MODELO           =
		=========================================*/
		public static function mdlRegistrarModelo($tabla, $datos_modelo){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(modelo_nombre, modelo_tipo_dispositivo_id, modelo_marca_id) 
				                                   VALUES(:modelo_nombre, :modelo_tipo_dispositivo_id, :modelo_marca_id)");

			$stmt->bindParam(":modelo_nombre",              $datos_modelo["nombre_modelo_registro"], PDO::PARAM_STR);
			$stmt->bindParam(":modelo_tipo_dispositivo_id", $datos_modelo["id_tipo_dispositivo"],    PDO::PARAM_INT);
			$stmt->bindParam(":modelo_marca_id",            $datos_modelo["id_marca"],               PDO::PARAM_INT);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			$stmt->close();
			$stmt = null;
		}
		/*=====  End of REGISTRAR MODELO  ======*/

		/*======================================
		=            EDITAR MODELO            =
		======================================*/
		public static function mdlEditarModelo($tabla, $datos_modelo){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla 
												   SET    modelo_nombre = :nombre_modelo_editar, 
												          modelo_tipo_dispositivo_id = :id_tipo_dispositivo_editar, 
												          modelo_marca_id = :id_marca_editar
												   WHERE  modelo_id = :id_modelo");

			$stmt->bindParam(":id_modelo",                  $datos_modelo["id_modelo"],                  PDO::PARAM_INT);
			$stmt->bindParam(":nombre_modelo_editar",       $datos_modelo["nombre_modelo_editar"],       PDO::PARAM_STR);
			$stmt->bindParam(":id_tipo_dispositivo_editar", $datos_modelo["id_tipo_dispositivo_editar"], PDO::PARAM_INT);
			$stmt->bindParam(":id_marca_editar",            $datos_modelo["id_marca_editar"],            PDO::PARAM_INT);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			$stmt->close();
			$stmt = null;
		}
		
		/*=====  End of EDITAR MODELO  ======*/

		/*========================================
		=            ELIMINAR MODELO            =
		========================================*/
		
		public static function mdlEliminarModelo($tabla, $datos_modelo){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE modelo_id = :modelo_id");

			$stmt->bindParam(":modelo_id", $datos_modelo, PDO::PARAM_INT);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			$stmt->close();
			$stmt = null;
		}
		
		/*=====  End of ELIMINAR MODELO  ======*/

		/*======================================
		=            CARGAR MODELOS            =
		======================================*/
		public static function mdlCargarModelos($tabla, $item1, $item2, $valor1, $valor2){

			$stmt = Conexion::conectar()->prepare("SELECT modelo_id, modelo_nombre
					                               FROM $tabla
					                               WHERE $item1 = :$item1 AND $item2 = :$item2");
			$stmt->bindParam(":".$item1, $valor1, PDO::PARAM_INT);
			$stmt->bindParam(":".$item2, $valor2, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
		}
		
		
		/*=====  End of CARGAR MODELOS  ======*/
		
	}