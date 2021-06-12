<?php
	
	require_once "conexion.php";

	class ModeloAccesorios{

		/*=======================================
		=       MOSTRAR ACCESORIOS            =
		=======================================*/
		public static function mdlMostrarAccesorios($tabla, $item, $valor){

			if ($item != null) {

				/*$stmt = Conexion::conectar()->prepare("SELECT dispositivo_id, dispositivo_serial, dispositivo_activo, dispositivo_comentario, dispositivo_garantia, dispositivo_estado, 
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
				return $stmt->fetch();*/

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT accesorio_id, accesorio_activo, accesorio_serial, accesorio_descripcion, accesorio_estado, 
															  dispositivo_serial,
															  tipo_dispositivo_nombre	
												       FROM accesorios
												       INNER JOIN tipos_dispositivos ON accesorios.accesorio_tipo_dispositivo_id = tipos_dispositivos.tipo_dispositivo_id
												       INNER JOIN dispositivos ON accesorios.accesorio_dispositivo_id = dispositivos.dispositivo_id
													   ORDER BY accesorio_fecha ASC");
				$stmt->execute();
				return $stmt->fetchAll();
			}
		}	
	}