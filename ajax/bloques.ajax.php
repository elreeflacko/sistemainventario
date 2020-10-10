<?php

	require_once "../controladores/bloques.controlador.php";
	require_once "../modelos/bloques.modelo.php";

	class AjaxBloques{

		/*=====================================================
		=    REVISAR SI YA EXISTE EL BLOQUE                   =
		=====================================================*/
		public $validar_bloque;

		public function ajaxValidarBloque(){

			$item = "bloque_nombre";
			
			$valor = $this->validar_bloque;

			$respuesta = ControladorBloques::ctrMostrarBloques($item, $valor);

			echo json_encode($respuesta);
		}
		/*=  End of REVISAR SI YA EXISTE EL BLOQUE ====*/

		/*=================================================
		=                 EDITAR BLOQUES            =
		=================================================*/
		public $id_bloque;

		public function ajaxEditarBloque(){

			$item = "bloque_id";
			$valor = $this->id_bloque;

			$respuesta = ControladorBloques::ctrMostrarBloques($item, $valor);

			echo json_encode($respuesta);
		}
		/*=======  End of EDITAR BLOQUE =============*/
	}

	/*============================================
	=   OBJETO VALIDAR EL BLOQUE                 =
	============================================*/
	if (isset($_POST["validar_bloque"])) {
		
		$validar_bloque_ajax = new AjaxBloques();
		$validar_bloque_ajax-> validar_bloque = $_POST["validar_bloque"];
		$validar_bloque_ajax-> ajaxValidarBloque();
	}
	/*=====  End of OBJETO VALIDAR EL BLOQUE  ======*/

	/*=================================================
	=              OBJETO EDITAR BLOQUE               =
	=================================================*/
	if (isset($_POST["id_bloque"])) {
		
		$editar_bloque_ajax = new AjaxBloques();
		$editar_bloque_ajax-> id_bloque = $_POST["id_bloque"];
		$editar_bloque_ajax-> ajaxEditarBloque();
	}
	/*=====  End of OBJETO VALIDAR EL BLOQUE  ======*/