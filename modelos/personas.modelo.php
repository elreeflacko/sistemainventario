<?php

	require_once "conexion.php";

	class ModeloPersonas{

		/*=======================================
		=            MOSTRAR PERSONAS            =
		=======================================*/
		public static function mdlMostrarPersonas($tabla, $item, $valor){

			if ($item != null) {

				$stmt = Conexion::conectar()->prepare("SELECT *
					                                   FROM $tabla
					                                   INNER JOIN secciones ON personas.persona_seccion_id=secciones.seccion_id
					                                   WHERE $item = :$item");
				$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
				$stmt->execute();
				return $stmt->fetch();

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT *
													   FROM $tabla
													   INNER JOIN secciones ON personas.persona_seccion_id=secciones.seccion_id
													   ORDER BY seccion_nombre ASC");
				$stmt->execute();
				return $stmt->fetchAll();
			}
		}

		/*=====  End of MOSTRAR PERSONAS  ======*/

		/*=========================================
		=            REGISTRAR PERSONA            =
		=========================================*/
		public static function mdlRegistrarPersona($tabla, $datos_persona){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(persona_nombre, persona_seccion_id) VALUES(:persona_nombre, :persona_seccion_id)");

			$stmt->bindParam(":persona_nombre",     $datos_persona["nombre_persona_registro"], PDO::PARAM_STR);
			$stmt->bindParam(":persona_seccion_id", $datos_persona["id_seccion"],              PDO::PARAM_INT);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			$stmt->close();
			$stmt = null;
		}
		/*=====  End of REGISTRAR PERSONA  ======*/

		/*======================================
		=            EDITAR PERSONA            =
		======================================*/
		public static function mdlEditarPersona($tabla, $datos_persona){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla
												   SET persona_nombre = :nombre_persona_editar, persona_seccion_id = :combobox_seccion_editar
												   WHERE persona_id = :id_persona");

			$stmt->bindParam(":id_persona",              $datos_persona["id_persona"], PDO::PARAM_INT);
			$stmt->bindParam(":nombre_persona_editar",   $datos_persona["nombre_persona_editar"], PDO::PARAM_STR);
			$stmt->bindParam(":combobox_seccion_editar", $datos_persona["combobox_seccion_editar"],  PDO::PARAM_INT);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			$stmt->close();
			$stmt = null;
		}


		/*=====  End of EDITAR PERSONA  ======*/

		/*========================================
		=            ELIMINAR PERSONA            =
		========================================*/

		public static function mdlEliminarPersona($tabla, $datos_persona){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE persona_id = :persona_id");

			$stmt->bindParam(":persona_id", $datos_persona, PDO::PARAM_INT);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			$stmt->close();
			$stmt = null;
		}

		/*=====  End of ELIMINAR PERSONA  ======*/

		/*======================================
		=            CARGAR PERSONAS            =
		======================================*/
		public static function mdlCargarPersonas($tabla, $item, $valor){

			$stmt = Conexion::conectar()->prepare("SELECT persona_id, persona_nombre
					                               FROM $tabla
					                               WHERE $item = :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
		}
		/*=====  End of CARGAR PERSONAS  ======*/

		/*======================================
		=   VER DISPOSITIVOS DEL PERSONA         =
		======================================*/
		public static function mdlVerPersona($tabla, $item, $valor){

			$stmt = Conexion::conectar()->prepare("SELECT persona_nombre, tipo_dispositivo_nombre, marca_nombre, modelo_nombre, dispositivo_serial, dispositivo_activo,
														  lugar_nombre, bloque_nombre
												   FROM $tabla
												   INNER JOIN secciones ON personas.persona_seccion_id = secciones.seccion_id
												   INNER JOIN dispositivos ON personas.persona_id = dispositivos.dispositivo_persona_id
												   INNER JOIN modelos ON dispositivos.dispositivo_modelo_id = modelos.modelo_id
												   INNER JOIN marcas ON modelos.modelo_marca_id = marcas.marca_id
												   INNER JOIN tipos_dispositivos ON modelos.modelo_tipo_dispositivo_id = tipos_dispositivos.tipo_dispositivo_id
												   INNER JOIN lugares ON dispositivos.dispositivo_lugar_id = lugares.lugar_id
												   INNER JOIN bloques ON lugares.lugar_bloque_id = bloques.bloque_id
												   WHERE $item = :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
			$stmt = null;
		}
		/*=====  End of VER DISPOSITIVOS DEL PERSONA  ======*/

		/*=============================================
		=             ACTUALIZAR PAZ Y SALVO             =
		=============================================*/
		public static function mdlActualizarPazySalvo($tabla,$valor1, $valor2){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET persona_paz = :persona_paz WHERE persona_id = :persona_id");

			$stmt->bindParam(":persona_id", $valor1, PDO::PARAM_INT);
			$stmt->bindParam(":persona_paz", $valor2, PDO::PARAM_INT);

			if($stmt->execute()) {
				return "ok";
			}else{
				return "false";
				//return print_r(Conexion::conectar()->errorInfo());
			}
			$stmt->close();
			$stmt = null;	
		}
		/*=====  End of  ACTUALIZAR PAZ Y SALVO   ======*/	
	}