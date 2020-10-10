<?php

	require_once "../controladores/lugares.controlador.php";
	require_once "../modelos/lugares.modelo.php";

	class AjaxLugares{

		/*=====================================================
		=    REVISAR SI YA EXISTE EL LUGAR                  =
		=====================================================*/
		public $validar_lugar;

		public function ajaxValidarLugar(){

			$item = "lugar_nombre";
			
			$valor = $this->validar_lugar;

			$respuesta = ControladorLugares::ctrMostrarLugares($item, $valor);

			echo json_encode($respuesta);
		}
		/*=  End of REVISAR SI YA EXISTE EL LUGAR ====*/

		/*=================================================
		=                 EDITAR LUGAR            =
		=================================================*/
		public $id_lugar;

		public function ajaxEditarLugar(){

			$item = "lugar_id";
			$valor = $this->id_lugar;

			$respuesta = ControladorLugares::ctrMostrarLugares($item, $valor);

			echo json_encode($respuesta);
		}
		/*=======  End of EDITAR LUGAR =============*/

		/*=================================================
		=                 VER LUGAR            =
		=================================================*/
		/*public $ver_lugar;

		public function ajaxVerLugar(){

			$item = "lugar_id";
			$valor = $this->ver_lugar;

			$respuesta = ControladorLugares::ctrVerLugar($item, $valor);

			foreach ($respuesta as $key => $value) {
				
				echo $lista_dispositivos_lugar = '<p>'.$value["tipo_dispositivo_nombre"].'  '.$value["marca_nombre"].'  '.$value["modelo_nombre"].' - serial:'.$value["dispositivo_serial"].'                              - activo: '.$value["dispositivo_activo"].' - persona: '.$value["persona_nombre"].' - sección: '.$value["seccion_nombre"].'</p>
				                                  -------------------------------------------------------------------------------------------------------------------------

				                                  ';
			}
			return $lista_dispositivos_lugar;
		}*/
		/*=======  End of VER LUGAR =============*/
	}

	/*============================================
	=   OBJETO VALIDAR EL LUGAR                 =
	============================================*/
	if (isset($_POST["validar_lugar"])) {
		
		$validar_lugar_ajax = new AjaxLugares();
		$validar_lugar_ajax-> validar_lugar = $_POST["validar_lugar"];
		$validar_lugar_ajax-> ajaxValidarLugar();
	}
	/*=====  End of OBJETO VALIDAR EL LUGAR  ======*/

	/*=================================================
	=              OBJETO EDITAR LUGAR               =
	=================================================*/
	if (isset($_POST["id_lugar"])) {
		
		$editar_lugar_ajax = new AjaxLugares();
		$editar_lugar_ajax-> id_lugar = $_POST["id_lugar"];
		$editar_lugar_ajax-> ajaxEditarLugar();
	}
	/*=====  End of OBJETO VALIDAR EL LUGAR  ======*/

	/*=================================================
	=              OBJETO VER LUGAR               =
	=================================================*/
	/*if (isset($_POST["ver_lugar"])) {
		
		$ver_lugar_ajax = new AjaxLugares();
		$ver_lugar_ajax-> ver_lugar = $_POST["ver_lugar"];
		$ver_lugar_ajax-> ajaxVerLugar();
	}*/
	/*=====  End of OBJETO  VER EL LUGAR  ======*/