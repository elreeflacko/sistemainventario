<?php
	
	require_once "conexion.php";

	class ModeloAccesorios{

		/*=========================================
		=            REGISTRAR ACCESORIO           =
		=========================================*/
		public static function mdlRegistrarAccesorio($tabla, $datos_accesorio){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(accesorio_activo, accesorio_serial, accesorio_descripcion, accesorio_comentario, accesorio_estado,
				                                                      accesorio_tipo_dispositivo_id)
				                                   VALUES(:accesorio_activo, :accesorio_serial, :accesorio_descripcion, :accesorio_comentario, :accesorio_estado,
				                                          :accesorio_tipo_dispositivo_id)");

			$stmt->bindParam(":accesorio_activo", $datos_accesorio["accesorio_activo"], PDO::PARAM_STR);
			$stmt->bindParam(":accesorio_serial", $datos_accesorio["accesorio_serial"], PDO::PARAM_STR);
			$stmt->bindParam(":accesorio_descripcion", $datos_accesorio["accesorio_descripcion"], PDO::PARAM_STR);
			$stmt->bindParam(":accesorio_comentario", $datos_accesorio["accesorio_comentario"],  PDO::PARAM_STR);
			$stmt->bindParam(":accesorio_estado", $datos_accesorio["accesorio_estado"], PDO::PARAM_STR);
			$stmt->bindParam(":accesorio_tipo_dispositivo_id",   $datos_accesorio["accesorio_tipo_dispositivo_id"], PDO::PARAM_INT);
	

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			$stmt->close();
			$stmt = null;
		}
		/*=====  End of REGISTRAR ACCESORIO  ======*/

		/*=======================================
		=       MOSTRAR ACCESORIOS            =
		=======================================*/
		public static function mdlMostrarAccesorios($tabla, $item, $valor){

			if ($item != null) {

				$stmt = Conexion::conectar()->prepare("SELECT accesorio_id, accesorio_activo, accesorio_serial, accesorio_descripcion, accesorio_estado,
															  tipo_dispositivo_nombre	
												       FROM accesorios
												       INNER JOIN tipos_dispositivos ON accesorios.accesorio_tipo_dispositivo_id = tipos_dispositivos.tipo_dispositivo_id
					                                   WHERE $item = :$item ORDER BY accesorio_id DESC");
				$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
				$stmt->execute();
				return $stmt->fetch();

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT accesorio_id, accesorio_activo, accesorio_serial, accesorio_descripcion, accesorio_estado,
															  tipo_dispositivo_nombre	
												       FROM accesorios
												       INNER JOIN tipos_dispositivos ON accesorios.accesorio_tipo_dispositivo_id = tipos_dispositivos.tipo_dispositivo_id
													   ORDER BY accesorio_fecha ASC");
				$stmt->execute();
				return $stmt->fetchAll();
			}
		}	
	}