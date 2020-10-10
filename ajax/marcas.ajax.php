<?php

	require_once "../controladores/marcas.controlador.php";
	require_once "../modelos/marcas.modelo.php";

	class ajaxMarcas{

		/*=====================================================
		=    REVISAR SI YA EXISTE LA MARCA                   =
		=====================================================*/
		public $validar_marca;

		public function ajaxValidarMarca(){

			$item = "marca_nombre";
			
			$valor = $this->validar_marca;

			$respuesta = ControladorMarcas::ctrMostrarMarcas($item, $valor);

			echo json_encode($respuesta);
		}
		/*=  End of REVISAR SI YA EXISTE LA MARCA ====*/

		/*=================================================
		=                 EDITAR MARCA                    =
		=================================================*/
		public $id_marca;

		public function ajaxEditarMarca(){

			$item = "marca_id";
			$valor = $this->id_marca;

			$respuesta = ControladorMarcas::ctrMostrarMarcas($item, $valor);

			echo json_encode($respuesta);
		}
		/*=======  End of EDITAR MARCA =============*/
	}

	/*============================================
	=   OBJETO VALIDAR LA MARCA                 =
	============================================*/
	if (isset($_POST["validar_marca"])) {
		
		$validar_marca_ajax = new AjaxMarcas();
		$validar_marca_ajax-> validar_marca = $_POST["validar_marca"];
		$validar_marca_ajax-> ajaxValidarMarca();
	}
	/*=====  End of OBJETO VALIDAR LA MARCA  ======*/

	/*=================================================
	=              OBJETO EDITAR BLOQUE               =
	=================================================*/
	if (isset($_POST["id_marca"])) {
		
		$editar_marca_ajax = new AjaxMarcas();
		$editar_marca_ajax-> id_marca = $_POST["id_marca"];
		$editar_marca_ajax-> ajaxEditarMarca();
	}
	/*=====  End of OBJETO VALIDAR LA MARCA  ======*/