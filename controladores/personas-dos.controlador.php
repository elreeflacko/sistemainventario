<?php

	class ControladorPersonasDos{
		/*=======================================
		=            MOSTRAR PERSONAS           =
		=======================================*/
		public static function ctrListarPersonas(){
			//$valor_buscar = '%'.$valor.'%';
			$tabla = "VW_User_Colegio";
			$respuesta = ModeloPersonasDos::mdlListarPersonas($tabla);
			return $respuesta;
		}
		/*=======================================
		=           FIN MOSTRAR PERSONAS        =
		=======================================*/
	}