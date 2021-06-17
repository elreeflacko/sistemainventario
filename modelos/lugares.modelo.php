<?php

	require_once "conexion.php";

	class ModeloLugares{

		/*=======================================
		=            MOSTRAR LUGARES            =
		=======================================*/
		public static function mdlMostrarLugares($tabla, $item, $valor){

			if ($item != null) {

				$stmt = Conexion::conectar()->prepare("SELECT * 
					                                   FROM $tabla 
					                                   INNER JOIN bloques ON lugares.lugar_bloque_id=bloques.bloque_id
					                                   WHERE $item = :$item");
				$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
				$stmt->execute();
				return $stmt->fetch();
				
			}else{

				$stmt = Conexion::conectar()->prepare("SELECT *
													   FROM $tabla
													   INNER JOIN bloques ON lugares.lugar_bloque_id=bloques.bloque_id");
				$stmt->execute();
				return $stmt->fetchAll();
			}
		}
		
		/*=====  End of MOSTRAR LUGARES  ======*/

		/*=========================================
		=            REGISTRAR LUGAR            =
		=========================================*/
		public static function mdlRegistrarLugar($tabla, $datos_lugar){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(lugar_nombre, lugar_bloque_id) VALUES(:lugar_nombre, :lugar_bloque_id)");

			$stmt->bindParam(":lugar_nombre",     $datos_lugar["nombre_lugar_registro"], PDO::PARAM_STR);
			$stmt->bindParam(":lugar_bloque_id",  $datos_lugar["id_bloque"],             PDO::PARAM_INT);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			$stmt->close();
			$stmt = null;
		}
		/*=====  End of REGISTRAR LUGAR  ======*/

		/*======================================
		=            EDITAR LUGAR            =
		======================================*/
		public static function mdlEditarLugar($tabla, $datos_lugar){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla 
												   SET  lugar_nombre = :nombre_lugar_editar, lugar_bloque_id = :combobox_bloque_editar
												   WHERE lugar_id = :id_lugar");

			$stmt->bindParam(":id_lugar",              $datos_lugar["id_lugar"], PDO::PARAM_INT);
			$stmt->bindParam(":nombre_lugar_editar",   $datos_lugar["nombre_lugar_editar"], PDO::PARAM_STR);
			$stmt->bindParam(":combobox_bloque_editar", $datos_lugar["combobox_bloque_editar"],  PDO::PARAM_INT);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			$stmt->close();
			$stmt = null;
		}
		/*=====  End of EDITAR LUGAR  ======*/

		/*========================================
		=            ELIMINAR LUGAR            =
		========================================*/
		
		public static function mdlEliminarLugar($tabla, $datos_lugar){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE lugar_id = :lugar_id");

			$stmt->bindParam(":lugar_id", $datos_lugar, PDO::PARAM_INT);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			$stmt->close();
			$stmt = null;
		}
		
		/*=====  End of ELIMINAR LUGAR  ======*/

		/*======================================
		=            CARGAR LUGARES            =
		======================================*/
		public static function mdlCargarLugares($tabla, $item, $valor){

			$stmt = Conexion::conectar()->prepare("SELECT lugar_id, lugar_nombre
					                               FROM $tabla
					                               WHERE $item = :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
		}
		/*=====  End of CARGAR LUGARES  ======*/

		/*======================================
		=   VER DISPOSITIVOS DEL LUGAR         =
		======================================*/
		public static function mdlVerLugar($tabla, $item, $valor){

			$stmt = Conexion::conectar()->prepare("SELECT bloque_nombre, lugar_nombre, dispositivo_serial, dispositivo_activo, modelo_nombre, marca_nombre, tipo_dispositivo_nombre,   
						                                  persona_nombre, seccion_nombre, dispositivo_id
												   FROM $tabla
												   INNER JOIN bloques ON lugares.lugar_bloque_id = bloques.bloque_id
												   INNER JOIN dispositivos ON lugares.lugar_id = dispositivos.dispositivo_lugar_id
												   INNER JOIN modelos ON dispositivos.dispositivo_modelo_id = modelos.modelo_id
												   INNER JOIN marcas ON modelos.modelo_marca_id = marcas.marca_id
												   INNER JOIN tipos_dispositivos ON modelos.modelo_tipo_dispositivo_id = tipos_dispositivos.tipo_dispositivo_id
												   INNER JOIN personas ON dispositivos.dispositivo_persona_id = personas.persona_id
												   INNER JOIN secciones ON personas.persona_seccion_id = secciones.seccion_id
												   WHERE $item = :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
			$stmt = null;
		}
		/*=====  End of VER DISPOSITIVOS DEL LUGAR  ======*/

	}