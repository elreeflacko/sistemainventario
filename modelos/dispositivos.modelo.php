<?php

	require_once "conexion.php";

	class ModeloDispositivos{

		/*=======================================
		=       MOSTRAR DISPOSITIVOS            =
		=======================================*/
		public static function mdlMostrarDispositivos($tabla, $item, $valor){

			if ($item != null) {

				$stmt = Conexion::conectar()->prepare("SELECT dispositivo_id, dispositivo_serial, dispositivo_activo, dispositivo_comentario, dispositivo_garantia, dispositivo_estado, 
															  dispositivo_estado_fecha, dispositivo_firma,
															  modelo_id, modelo_nombre,
															  tipo_dispositivo_id, tipo_dispositivo_nombre,
															  marca_id, marca_nombre,
															  persona_id, persona_nombre,
															  seccion_id, seccion_nombre,
															  lugar_id, lugar_nombre,
															  bloque_id, bloque_nombre
													   FROM dispositivos
												       INNER JOIN modelos ON dispositivos.dispositivo_modelo_id = modelos.modelo_id
												       INNER JOIN tipos_dispositivos ON modelos.modelo_tipo_dispositivo_id = tipos_dispositivos.tipo_dispositivo_id
												       INNER JOIN marcas ON modelos.modelo_marca_id = marcas.marca_id
												       INNER JOIN personas ON dispositivos.dispositivo_persona_id = personas.persona_id
												       INNER JOIN secciones ON personas.persona_seccion_id = secciones.seccion_id
												       INNER JOIN lugares ON dispositivos.dispositivo_lugar_id = lugares.lugar_id
												       INNER JOIN bloques ON lugares.lugar_bloque_id = bloques.bloque_id
					                                   WHERE $item = :$item");
				$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
				$stmt->execute();
				return $stmt->fetch();

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT dispositivo_id, dispositivo_serial, dispositivo_activo,
															  modelo_id, modelo_nombre,
		 													  tipo_dispositivo_id, tipo_dispositivo_nombre,
		 													  marca_id,marca_nombre,
		 													  persona_id, persona_nombre,
		 													  seccion_id, seccion_nombre,
		 													  lugar_id, lugar_nombre,
		 													  bloque_id, bloque_nombre
												       FROM dispositivos
												       INNER JOIN modelos ON dispositivos.dispositivo_modelo_id = modelos.modelo_id
												       INNER JOIN tipos_dispositivos ON modelos.modelo_tipo_dispositivo_id = tipos_dispositivos.tipo_dispositivo_id
												       INNER JOIN marcas ON modelos.modelo_marca_id = marcas.marca_id
												       INNER JOIN personas ON dispositivos.dispositivo_persona_id = personas.persona_id
												       INNER JOIN secciones ON personas.persona_seccion_id = secciones.seccion_id
												       INNER JOIN lugares ON dispositivos.dispositivo_lugar_id = lugares.lugar_id
												       INNER JOIN bloques ON lugares.lugar_bloque_id = bloques.bloque_id
													   ORDER BY tipo_dispositivo_nombre ASC");
				$stmt->execute();
				return $stmt->fetchAll();
			}
		}

		/*=====  End of MOSTRAR DISPOSITIVOS  ======*/

		/*=========================================
		=   MOSTRAR DISPOSITIVO POR TIPO          =
		=========================================*/
		public static function mdlMostrarDispositivosTipo($tabla, $item, $valor){

			if ($item != null) {

				$stmt = Conexion::conectar()->prepare("SELECT dispositivo_id, dispositivo_serial, dispositivo_activo, dispositivo_comentario, dispositivo_garantia,
															  modelo_id, modelo_nombre,
															  tipo_dispositivo_id, tipo_dispositivo_nombre,
															  marca_id, marca_nombre,
															  persona_id, persona_nombre,
															  seccion_id, seccion_nombre,
															  lugar_id, lugar_nombre,
															  bloque_id, bloque_nombre
													   FROM dispositivos
												       INNER JOIN modelos ON dispositivos.dispositivo_modelo_id = modelos.modelo_id
												       INNER JOIN tipos_dispositivos ON modelos.modelo_tipo_dispositivo_id = tipos_dispositivos.tipo_dispositivo_id
												       INNER JOIN marcas ON modelos.modelo_marca_id = marcas.marca_id
												       INNER JOIN personas ON dispositivos.dispositivo_persona_id = personas.persona_id
												       INNER JOIN secciones ON personas.persona_seccion_id = secciones.seccion_id
												       INNER JOIN lugares ON dispositivos.dispositivo_lugar_id = lugares.lugar_id
												       INNER JOIN bloques ON lugares.lugar_bloque_id = bloques.bloque_id
					                                   WHERE $item = :$item");
				$stmt->bindParam(":".$item, $valor, PDO::PARAM_INT);
				$stmt->execute();
				return $stmt->fetchAll();
			}
		}
		/*=====  End of MOSTRAR DISPOSITIVO POR TIPO  ======*/

		/*=========================================
		=            REGISTRAR DISPOSITIVO           =
		=========================================*/
		public static function mdlRegistrarDispositivo($tabla, $datos_dispositivo){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(dispositivo_serial, dispositivo_activo, dispositivo_comentario, dispositivo_garantia, dispositivo_estado,
				                                                      dispositivo_modelo_id, dispositivo_persona_id, dispositivo_lugar_id)
				                                   VALUES(:dispositivo_serial, :dispositivo_activo, :dispositivo_comentario, :dispositivo_garantia, :dispositivo_estado,
				                                          :dispositivo_modelo_id, :dispositivo_persona_id, :dispositivo_lugar_id)");

			$stmt->bindParam(":dispositivo_serial",      $datos_dispositivo["serial_dispositivo"],     PDO::PARAM_STR);
			$stmt->bindParam(":dispositivo_activo",      $datos_dispositivo["activo_dispositivo"],     PDO::PARAM_STR);
			$stmt->bindParam(":dispositivo_comentario",  $datos_dispositivo["comentario_dispositivo"], PDO::PARAM_STR);
			$stmt->bindParam(":dispositivo_garantia",    $datos_dispositivo["garantia_dispositivo"]);
			$stmt->bindParam(":dispositivo_estado",      $datos_dispositivo["estado_dispositivo"],     PDO::PARAM_STR);
			$stmt->bindParam(":dispositivo_modelo_id",   $datos_dispositivo["id_modelo"],              PDO::PARAM_INT);
			$stmt->bindParam(":dispositivo_persona_id",  $datos_dispositivo["id_persona"],             PDO::PARAM_INT);
			$stmt->bindParam(":dispositivo_lugar_id",    $datos_dispositivo["id_lugar"],               PDO::PARAM_INT);

			if ($stmt->execute()) {
				return "ok";
			}else{
				//return $mensaje = print_r($stmt->errorInfo());
				return "error";
			}
			$resultado = null;
			unset($resultado);
		}
		/*=====  End of REGISTRAR DISPOSITIVO  ======*/

		/*======================================
		=            EDITAR MODELO            =
		======================================*/
		public static function mdlEditarDispositivo($tabla, $datos_dispositivo){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla
												   SET    dispositivo_serial       = :dispositivo_serial,
												          dispositivo_activo       = :dispositivo_activo,
												          dispositivo_comentario   = :dispositivo_comentario,
												          dispositivo_garantia     = :dispositivo_garantia,
												          dispositivo_estado       = :dispositivo_estado,
												          dispositivo_estado_fecha = :dispositivo_estado_fecha,
												          dispositivo_modelo_id    = :dispositivo_modelo_id,
												          dispositivo_persona_id   = :dispositivo_persona_id,
												          dispositivo_lugar_id     = :dispositivo_lugar_id
												   WHERE  dispositivo_id = :dispositivo_id");

			$stmt->bindParam(":dispositivo_id",          $datos_dispositivo["id_dispositivo"],               PDO::PARAM_INT);
			$stmt->bindParam(":dispositivo_serial",      $datos_dispositivo["serial_dispositivo_editar"],    PDO::PARAM_STR);
			$stmt->bindParam(":dispositivo_activo",      $datos_dispositivo["activo_dispositivo_editar"],    PDO::PARAM_STR);
			$stmt->bindParam(":dispositivo_comentario",  $datos_dispositivo["comentario_dispositivo_editar"],PDO::PARAM_STR);
			$stmt->bindParam(":dispositivo_estado",      $datos_dispositivo["estado_dispositivo_editar"],    PDO::PARAM_STR);
			$stmt->bindParam(":dispositivo_garantia",    $datos_dispositivo["garantia_dispositivo_editar"]);
			$stmt->bindParam(":dispositivo_estado_fecha",$datos_dispositivo["fecha_prestamo"]);
			$stmt->bindParam(":dispositivo_modelo_id",   $datos_dispositivo["id_modelo_editar"],             PDO::PARAM_INT);
			$stmt->bindParam(":dispositivo_persona_id",  $datos_dispositivo["id_persona_editar"],            PDO::PARAM_INT);
			$stmt->bindParam(":dispositivo_lugar_id",    $datos_dispositivo["id_lugar_editar"],              PDO::PARAM_INT);

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
		=            ELIMINAR DISPOSITIVO            =
		========================================*/
		public static function mdlEliminarDispositivo($tabla, $datos_dispositivo){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE dispositivo_id = :dispositivo_id");

			$stmt->bindParam(":dispositivo_id", $datos_dispositivo, PDO::PARAM_INT);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			$stmt->close();
			$stmt = null;
		}

		/*=====  End of ELIMINAR DISPOSITIVO  ======*/

		/*=========================================
		=   MOSTRAR DISPOSITIVOS POR ESTADO       =
		=========================================*/
		public static function mdlMostrarEstadoDispositivos($tabla, $item, $valor){

			if ($item != null) {

				$stmt = Conexion::conectar()->prepare("SELECT dispositivo_id, dispositivo_serial, dispositivo_activo, dispositivo_comentario, dispositivo_garantia, dispositivo_estado,
															  modelo_id, modelo_nombre,
															  tipo_dispositivo_id, tipo_dispositivo_nombre,
															  marca_id, marca_nombre,
															  persona_id, persona_nombre,
															  seccion_id, seccion_nombre,
															  lugar_id, lugar_nombre,
															  bloque_id, bloque_nombre
													   FROM dispositivos
												       INNER JOIN modelos ON dispositivos.dispositivo_modelo_id = modelos.modelo_id
												       INNER JOIN tipos_dispositivos ON modelos.modelo_tipo_dispositivo_id = tipos_dispositivos.tipo_dispositivo_id
												       INNER JOIN marcas ON modelos.modelo_marca_id = marcas.marca_id
												       INNER JOIN personas ON dispositivos.dispositivo_persona_id = personas.persona_id
												       INNER JOIN secciones ON personas.persona_seccion_id = secciones.seccion_id
												       INNER JOIN lugares ON dispositivos.dispositivo_lugar_id = lugares.lugar_id
												       INNER JOIN bloques ON lugares.lugar_bloque_id = bloques.bloque_id
					                                   WHERE $item = :$item");
				$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
				$stmt->execute();
				return $stmt->fetchAll();
			}
		}
		/*=====  End of MOSTRAR ESTADO DISPOSITIVO  ======*/
		/*=========================================
		=   MOSTRAR DISPOSITIVOS PRESTADOS       =
		=========================================*/
		public static function mdlMostrarDispositivosPrestados($tabla, $item, $valor){

			if ($item != null) {

				$stmt = Conexion::conectar()->prepare("SELECT dispositivo_id, dispositivo_serial, dispositivo_activo, dispositivo_comentario, dispositivo_garantia, dispositivo_estado, dispositivo_estado_fecha,
															  modelo_id, modelo_nombre,
															  tipo_dispositivo_id, tipo_dispositivo_nombre,
															  marca_id, marca_nombre,
															  persona_id, persona_nombre,
															  seccion_id, seccion_nombre,
															  lugar_id, lugar_nombre,
															  bloque_id, bloque_nombre
													   FROM dispositivos
												       INNER JOIN modelos ON dispositivos.dispositivo_modelo_id = modelos.modelo_id
												       INNER JOIN tipos_dispositivos ON modelos.modelo_tipo_dispositivo_id = tipos_dispositivos.tipo_dispositivo_id
												       INNER JOIN marcas ON modelos.modelo_marca_id = marcas.marca_id
												       INNER JOIN personas ON dispositivos.dispositivo_persona_id = personas.persona_id
												       INNER JOIN secciones ON personas.persona_seccion_id = secciones.seccion_id
												       INNER JOIN lugares ON dispositivos.dispositivo_lugar_id = lugares.lugar_id
												       INNER JOIN bloques ON lugares.lugar_bloque_id = bloques.bloque_id
					                                   WHERE $item = :$item");
				$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
				$stmt->execute();
				return $stmt->fetchAll();
			}
		}
		/*=====  End of MOSTRAR ESTADO DISPOSITIVO  ======*/

		/*====================================
		=            GUARDARFIRMA            =
		====================================*/
		public static function mdlGuardarFirma($tabla, $valor_idDispositivo, $valor_firma){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET dispositivo_firma = :dispositivo_firma WHERE dispositivo_id = :dispositivo_id");

			$stmt->bindParam(":dispositivo_id", $valor_idDispositivo, PDO::PARAM_INT);
			$stmt->bindParam(":dispositivo_firma", $valor_firma[1], PDO::PARAM_STR);

			if($stmt->execute()) {
				return "ok";
			}else{
				return "false";
				//return print_r(Conexion::conectar()->errorInfo());
			}
			$stmt->close();
			$stmt = null;			
		}
		/*=====  End of GUARDARFIRMA  ======*/
		
	}