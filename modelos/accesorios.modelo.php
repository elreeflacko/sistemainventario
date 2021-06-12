<?php
	
	require_once "conexion.php";

	class ModeloAccesorios{

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