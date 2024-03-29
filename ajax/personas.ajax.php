<?php

	require_once "../controladores/personas.controlador.php";
	require_once "../modelos/personas.modelo.php";

	class AjaxPersonas{

		/*=====================================================
		=    REVISAR SI YA EXISTE LA PERSONA               =
		=====================================================*/
		public $validar_persona;

		public function ajaxValidarPersona(){

			$item = "persona_nombre";
			
			$valor = $this->validar_persona;

			$respuesta = ControladorPersonas::ctrMostrarPersonas($item, $valor);

			echo json_encode($respuesta);
		}
		/*=  End of REVISAR SI YA EXISTE LA PERSONA ====*/

		/*=================================================
		=                 EDITAR  PERSONA           =
		=================================================*/
		public $id_persona;

		public function ajaxEditarPersona(){

			$item = "persona_id";
			$valor = $this->id_persona;

			$respuesta = ControladorPersonas::ctrMostrarPersonas($item, $valor);

			echo json_encode($respuesta);
		}
		/*=======  End of EDITAR PERSONA =============*/

		/*=================================================
		=                 VER PERSONA            =
		=================================================*/
		public $ver_persona;

		public function ajaxVerPersona(){

			$item = "persona_id";
			$valor = $this->ver_persona;

			$respuesta = ControladorPersonas::ctrVerPersona($item, $valor);

			foreach ($respuesta as $key => $value) {
				
				echo $lista_dispositivos_persona = '<p>'.$value["tipo_dispositivo_nombre"].'  '.$value["marca_nombre"].'  '.$value["modelo_nombre"].' - serial:'.$value["dispositivo_serial"].'                              - activo: '.$value["dispositivo_activo"].' - lugar: '.$value["lugar_nombre"].' - bloque: '.$value["bloque_nombre"].' </p>
				                                  -------------------------------------------------------------------------------------------------------------------------

				                                  ';
			}
			return $lista_dispositivos_persona;
		}
		/*=======  End of VER PERSONA =============*/

		/*===================================
		=            PAZ Y SALVO            =
		===================================*/
		public $paz_salvo;

		public function ajaxPazySalvo(){
			
			$valor1 = $this->paz_salvo[0];
			$valor2 = $this->paz_salvo[1];

			$respuesta = ControladorPersonas::ctrActualizarPazySalvo($valor1, $valor2);

			if($respuesta == "ok"){

				echo $paz = '<div class="alert alert-success">
  										<strong>Excelente!</strong> La persona esta en paz y salvo
									</div>';
			}
			return $paz;
		}
		/*=====  End of PAZ Y SALVO  ======*/	

		/*===================================
		=           NO PAZ Y SALVO          =
		===================================*/
		public $no_paz_salvo;

		public function ajaxNoPazySalvo(){
			
			$valor1 = $this->no_paz_salvo[0];
			$valor2 = $this->no_paz_salvo[1];

			$respuesta = ControladorPersonas::ctrActualizarPazySalvo($valor1, $valor2);

			if($respuesta == "ok"){

				echo $no_paz = '<div class="alert alert-warning">
  										<strong>Ojo</strong> La persona no esta en paz y salvo
									</div>';
			}
			return $no_paz;
		}
		/*=====  End of NO PAZ Y SALVO  ======*/	
	
	}

	/*============================================
	=          OBJETO VALIDAR PERSONA            =
	============================================*/
	if (isset($_POST["validar_persona"])) {
		
		$validar_persona_ajax = new AjaxPersonas();
		$validar_persona_ajax-> validar_persona = $_POST["validar_persona"];
		$validar_persona_ajax-> ajaxValidarPersona();
	}
	/*=== End of OBJETO VALIDAR LA SECCION  ====*/

	/*=================================================
	=              OBJETO EDITAR PERSONA               =
	=================================================*/
	if (isset($_POST["id_persona"])) {
		
		$editar_persona_ajax = new AjaxPersonas();
		$editar_persona_ajax-> id_persona = $_POST["id_persona"];
		$editar_persona_ajax-> ajaxEditarPersona();
	}
	/*=====  End of OBJETO EDITAR PERSONA  ======*/

	/*=================================================
	=              OBJETO VER LUGAR               =
	=================================================*/
	if (isset($_POST["ver_persona"])) {
		
		$ver_persona_ajax = new AjaxPersonas();
		$ver_persona_ajax-> ver_persona = $_POST["ver_persona"];
		$ver_persona_ajax-> ajaxVerPersona();
	}
	/*=====  End of OBJETO  VER EL LUGAR  ======*/

	/*=================================================
	=              OBJETO PAZ Y SALVO             =
	=================================================*/
	if (isset($_POST["persona_pazsalvo_array"])) {

		$paz_salvo_ajax = new AjaxPersonas();
		$paz_salvo_ajax-> paz_salvo = $_POST["persona_pazsalvo_array"];
		$paz_salvo_ajax-> ajaxPazySalvo();
	}
	/*=====  End of OBJETO  PAZ Y SALVO  ======*/
	/*=================================================
	=              OBJETO NO PAZ Y SALVO             =
	=================================================*/
	if (isset($_POST["no_persona_pazsalvo_array"])) {

		$no_paz_salvo_ajax = new AjaxPersonas();
		$no_paz_salvo_ajax-> no_paz_salvo = $_POST["no_persona_pazsalvo_array"];
		$no_paz_salvo_ajax-> ajaxNoPazySalvo();
	}
	/*=====  End of OBJETO  PAZ Y SALVO  ======*/