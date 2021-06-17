<?php

	require_once "../controladores/modelos.controlador.php";
	require_once "../modelos/modelos.modelo.php";

	class AjaxModelos{

		/*=====================================================
		=    REVISAR SI YA EXISTE EL MODELO               =
		=====================================================*/
		public $validar_modelo;

		public function ajaxValidarModelo(){

			$item = "modelo_nombre";
			
			$valor = $this->validar_modelo;

			$respuesta = ControladorModelos::ctrMostrarModelos($item, $valor);

			echo json_encode($respuesta);
		}
		/*=  End of REVISAR SI YA EXISTE EL MODELO ====*/

		/*=================================================
		=                 EDITAR  MODELO           =
		=================================================*/
		public $id_modelo;

		public function ajaxEditarModelo(){

			$item = "modelo_id";
			$valor = $this->id_modelo;

			$respuesta = ControladorModelos::ctrMostrarModelos($item, $valor);

			echo json_encode($respuesta);
		}
		/*=======  End of EDITAR MODELO =============*/
	}

	/*============================================
	=          OBJETO VALIDAR  MODELO           =
	============================================*/
	if (isset($_POST["validar_modelo"])) {
		
		$validar_modelo_ajax = new AjaxModelos();
		$validar_modelo_ajax-> validar_modelo = $_POST["validar_modelo"];
		$validar_modelo_ajax-> ajaxValidarModelo();
	}
	/*=== End of OBJETO VALIDAR MODELO   ====*/

	/*=================================================
	=              OBJETO EDITAR MODELO               =
	=================================================*/
	if (isset($_POST["id_modelo"])) {
		
		$editar_modelo_ajax = new AjaxModelos();
		$editar_modelo_ajax-> id_modelo = $_POST["id_modelo"];
		$editar_modelo_ajax-> ajaxEditarModelo();
	}
	/*=====  End of OBJETO EDITAR MODELO  ======*/