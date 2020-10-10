<?php

	require_once "../controladores/tipos-dispositivos.controlador.php";
	require_once "../modelos/tipos-dispositivos.modelo.php";

	class AjaxTiposDispositivos{

		/*=====================================================
		=    REVISAR SI YA EXISTE EL TIPO DE DISPOSITIVO      =
		=====================================================*/
		public $validar_tipo_dispositivo;

		public function ajaxValidarTipoDispositivo(){

			$item = "tipo_dispositivo_nombre";
			
			$valor = $this->validar_tipo_dispositivo;

			$respuesta = ControladorTiposDispositivos::ctrMostrarTiposDispositivos($item, $valor);

			echo json_encode($respuesta);
		}
		/*=  End of REVISAR SI YA EXISTE TIPO DE DISPOSITIVO ====*/

		/*=================================================
		=        EDITAR TIPO DE DISPOSITIVO               =
		=================================================*/
		public $id_tipo_dispositivo;

		public function ajaxEditarTipoDispositivo(){

			$item = "tipo_dispositivo_id";
			$valor = $this->id_tipo_dispositivo;

			$respuesta = ControladorTiposDispositivos::ctrMostrarTiposDispositivos($item, $valor);

			echo json_encode($respuesta);
		}
		/*=======  End of EDITAR TIPO DE DISPOSITIVO ====*/
	}

	/*============================================
	=   OBJETO VALIDAR EL TIPO DE DISPOSITIVO    =
	============================================*/
	if (isset($_POST["validar_tipo_dispositivo"])) {
		
		$validar_tipo_dispositivo_ajax = new AjaxTiposDispositivos();
		$validar_tipo_dispositivo_ajax-> validar_tipo_dispositivo = $_POST["validar_tipo_dispositivo"];
		$validar_tipo_dispositivo_ajax-> ajaxValidarTipoDispositivo();
	}
	
	/*=====  End of OBJETO VALIDAR EL TIPO DE DISPOSITIVO  ======*/

	/*=================================================
	=     OBJETO EDITAR TIPO DISPOSITIVO              =
	=================================================*/
	if (isset($_POST["id_tipo_dispositivo"])) {
		
		$editar_tipo_dispositivo_ajax = new AjaxTiposDispositivos();
		$editar_tipo_dispositivo_ajax-> id_tipo_dispositivo = $_POST["id_tipo_dispositivo"];
		$editar_tipo_dispositivo_ajax-> ajaxEditarTipoDispositivo();
	}