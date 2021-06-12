<?php

	//require_once "../controladores/tipos-dispositivos.controlador.php";
	//require_once "../modelos/tipos-dispositivos.modelo.php";
	require_once "../controladores/accesorios.controlador.php";
	require_once "../modelos/accesorios.modelo.php";

	class AjaxAccesorios{

		/*======================================================================
		= Generar Activo del accesorio a partir de ID TIPO DISPOSITIVO         =
		======================================================================*/
		public $tipo_dispositivo_id;

		public function AjaxCrearActivoAccesorio(){

			$item = "accesorio_tipo_dispositivo_id";
			$valor = $this->tipo_dispositivo_id;

			$respuesta = ControladorAccesorios::ctrMostrarAccesorios($item, $valor);

			echo json_encode($respuesta);

		}
		/*=====  End of Generar Activo del accesorio a partir de ID TIPO DISPOSITIVO  ======*/	
	}

	/*=====================================================
	=            OBJETO ID TIPO DE DISPOSITIVO            =
	=====================================================*/
	if (isset($_POST["tipo_dispositivo_id"])) {
		$activo_accesorio = new AjaxAccesorios();
		$activo_accesorio -> tipo_dispositivo_id = $_POST["tipo_dispositivo_id"];
		$activo_accesorio -> AjaxCrearActivoAccesorio();
	}
	/*=====  End of OBJETO ID TIPO DE DISPOSITIVO  ======*/
	
	