<?php

	require_once "../controladores/secciones.controlador.php";
	require_once "../modelos/secciones.modelo.php";

	class AjaxSecciones{

		/*=====================================================
		=    REVISAR SI YA EXISTE LA SECCION                 =
		=====================================================*/
		public $validar_seccion;

		public function ajaxValidarSeccion(){

			$item = "seccion_nombre";
			
			$valor = $this->validar_seccion;

			$respuesta = ControladorSecciones::ctrMostrarSecciones($item, $valor);

			echo json_encode($respuesta);
		}
		/*=  End of REVISAR SI YA EXISTE LA SECCION ====*/

		/*=================================================
		=                 EDITAR SECCION            =
		=================================================*/
		public $id_seccion;

		public function ajaxEditarSeccion(){

			$item = "seccion_id";
			$valor = $this->id_seccion;

			$respuesta = ControladorSecciones::ctrMostrarSecciones($item, $valor);

			echo json_encode($respuesta);
		}
		/*=======  End of EDITAR SECCION =============*/
	}

	/*============================================
	=   OBJETO VALIDAR LA SECCION                =
	============================================*/
	if (isset($_POST["validar_seccion"])) {
		
		$validar_seccion_ajax = new AjaxSecciones();
		$validar_seccion_ajax-> validar_seccion = $_POST["validar_seccion"];
		$validar_seccion_ajax-> ajaxValidarSeccion();
	}
	/*=== End of OBJETO VALIDAR LA SECCION  ====*/

	/*=================================================
	=              OBJETO EDITAR SECCION               =
	=================================================*/
	if (isset($_POST["id_seccion"])) {
		
		$editar_seccion_ajax = new AjaxSecciones();
		$editar_seccion_ajax-> id_seccion = $_POST["id_seccion"];
		$editar_seccion_ajax-> ajaxEditarSeccion();
	}
	/*=====  End of OBJETO VALIDAR EL SECCION  ======*/