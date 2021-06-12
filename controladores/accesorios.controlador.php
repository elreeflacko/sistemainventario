<?php

	class ControladorAccesorios{

		/*===========================================
		=            REGISTRAR ACCESORIO            =
		===========================================*/
		
		/*=====  End of REGISTRAR ACCESORIO  ======*/

		/*==========================================
		=            MOSTRAR ACCESORIOS            =
		==========================================*/
		public static function ctrMostrarAccesorios($item, $valor){

			//tabla de la bd
			$tabla = "accesorios";

			$respuesta = ModeloAccesorios::mdlMostrarAccesorios($tabla, $item, $valor);
			return $respuesta;
		}
		/*=====  End of MOSTRAR ACCESORIOS  ======*/
		
		
	}