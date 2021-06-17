<?php

	require_once "conexion-dos.php";

	class ModeloPersonasDos{

		/*======================================
		=            CARGAR PERSONAS            =
		======================================*/
		public static function mdlListarPersonas($tabla){

			//if ($valor_buscar != null) {
				$stmt = ConexionDos::conectarDos()->prepare("SELECT * FROM $tabla");
				//$stmt->bindParam(":valor_buscar", $valor_buscar, PDO::PARAM_STR);
				$stmt->execute();
				return $stmt->fetchAll();

				$stmt->close();
				$stmt = null;
			//}
		}
		/*=====  End of CARGAR PERSONAS  ======*/
	}