<?php

	require_once "../controladores/modelos.controlador.php";
	require_once "../modelos/modelos.modelo.php";
	require_once "../controladores/lugares.controlador.php";
	require_once "../modelos/lugares.modelo.php";
	require_once "../controladores/personas.controlador.php";
	require_once "../modelos/personas.modelo.php";
	require_once "../controladores/dispositivos.controlador.php";
	require_once "../modelos/dispositivos.modelo.php";


	class AjaxDispositivos{

		/*=============================================================
		=            CARGAR DATOS EN EL SELECTOR DE MODELO            =
		=============================================================*/
		public $datos_tipo_marca;

		public function ajaxCargaComboboxModelos(){
			$item1 = "modelo_tipo_dispositivo_id";
			$item2 = "modelo_marca_id";

			$valor1 = $this->datos_tipo_marca[0];
			$valor2 = $this->datos_tipo_marca[1];

			$respuesta = ControladorModelos::ctrCargarModelos($item1, $item2, $valor1, $valor2);

			foreach ($respuesta as $key => $value) {
					
				echo $lista_modelos = '<option value="'.$value["modelo_id"].'">'.$value["modelo_nombre"].'</option>';
			}

			return  $lista_modelos;
		}
		
		
		/*=====  End of CARGAR DATOS EN EL SELECTOR DE MODELO  ======*/

		/*=============================================================
		=            CARGAR DATOS EN EL SELECTOR DE LUGAR            =
		=============================================================*/
		public $datos_bloque;

		public function ajaxCargaComboboxLugares(){

			$item = "lugar_bloque_id";
			
			$valor = $this->datos_bloque;
	

			$respuesta = ControladorLugares::ctrCargarLugares($item, $valor);

			foreach ($respuesta as $key => $value) {
					
				echo $lista_lugares = '<option value="'.$value["lugar_id"].'">'.$value["lugar_nombre"].'</option>';
			}

			return  $lista_lugares;
		}
		
		
		/*=====  End of CARGAR DATOS EN EL SELECTOR DE LUGAR  ======*/

		/*=============================================================
		=            CARGAR DATOS EN EL SELECTOR DE PERSONAS            =
		=============================================================*/
		public $datos_seccion;

		public function ajaxCargaComboboxPersonas(){

			$item = "persona_seccion_id";
			
			$valor = $this->datos_seccion;
	

			$respuesta = ControladorPersonas::ctrCargarPersonas($item, $valor);

			foreach ($respuesta as $key => $value) {
					
				echo $lista_personas = '<option value="'.$value["persona_id"].'">'.$value["persona_nombre"].'</option>';
			}

			return  $lista_personas;
		}
		/*=====  End of CARGAR DATOS EN EL SELECTOR DE PERSONAS  ======*/

		/*=================================================
		=    CARGAR LOS DATOS DEL DISPOSITIVO A EDITAR    =
		=================================================*/
		public $id_dispositivo;

		public function ajaxEditarDispositivo(){

			$item = "dispositivo_id";
			$valor = $this->id_dispositivo;

			$respuesta = ControladorDispositivos::ctrMostrarDispositivos($item, $valor);

			echo json_encode($respuesta);
		}
		/*===End of CARGAR LOS DATOS DEL DISPOSITIVO A EDITAR ==*/

		/*=============================================================
		=            CARGAR DATOS EN EL SELECTOR DE MODELO EDITAR     =
		=============================================================*/
		public $datos_tipo_marca_editar;

		public function ajaxCargaComboboxModelosEditar(){
			$item1 = "modelo_tipo_dispositivo_id";
			$item2 = "modelo_marca_id";

			$valor1 = $this->datos_tipo_marca_editar[0];
			$valor2 = $this->datos_tipo_marca_editar[1];

			$respuesta = ControladorModelos::ctrCargarModelos($item1, $item2, $valor1, $valor2);

			foreach ($respuesta as $key => $value) {
					
				echo $lista_modelos = '<option value="'.$value["modelo_id"].'">'.$value["modelo_nombre"].'</option>';
			}

			return  $lista_modelos;
		}
		
		
		/*=====  End of CARGAR DATOS EN EL SELECTOR DE MODELO EDITAR  ======*/

		/*=============================================================
		=            CARGAR DATOS EN EL SELECTOR DE LUGAR            =
		=============================================================*/
		public $datos_bloque_editar;

		public function ajaxCargaComboboxLugaresEditar(){

			$item = "lugar_bloque_id";
			
			$valor = $this->datos_bloque_editar;
	

			$respuesta = ControladorLugares::ctrCargarLugares($item, $valor);

			foreach ($respuesta as $key => $value) {
					
				echo $lista_lugares = '<option value="'.$value["lugar_id"].'">'.$value["lugar_nombre"].'</option>';
			}

			return  $lista_lugares;
		}
		
		
		/*=====  End of CARGAR DATOS EN EL SELECTOR DE LUGAR  ======*/

		/*=============================================================
		=            CARGAR DATOS EN EL SELECTOR DE PERSONAS            =
		=============================================================*/
		public $datos_seccion_editar;

		public function ajaxCargaComboboxPersonasEditar(){

			$item = "persona_seccion_id";
			
			$valor = $this->datos_seccion_editar;
	

			$respuesta = ControladorPersonas::ctrCargarPersonas($item, $valor);

			foreach ($respuesta as $key => $value) {
					
				echo $lista_personas = '<option value="'.$value["persona_id"].'">'.$value["persona_nombre"].'</option>';
			}

			return  $lista_personas;
		}
		/*=====  End of CARGAR DATOS EN EL SELECTOR DE PERSONAS  ======*/
	}
	/*============================================
	=          OBJETO CARGAR SELECTOR MODELOS           =
	============================================*/
	if (isset($_POST["tipo_marca_array"])) {
		
		$cargar_tipomarca_ajax = new AjaxDispositivos();
		$cargar_tipomarca_ajax-> datos_tipo_marca = $_POST["tipo_marca_array"];
		$cargar_tipomarca_ajax-> ajaxCargaComboboxModelos();
	}
	/*=== End of OBJETOCARGAR SELECTOR MODELOS   ====*/ 

	/*============================================
	=      OBJETO CARGAR SELECTOR LUGARES        =
	============================================*/
	if (isset($_POST["bloque"])) {
		
		$cargar_lugares_ajax = new AjaxDispositivos();
		$cargar_lugares_ajax-> datos_bloque = $_POST["bloque"];
		$cargar_lugares_ajax-> ajaxCargaComboboxLugares();
	}
	/*=== End of OBJETO CARGAR SELECTOR LUGARES   ====*/ 

	/*============================================
	=      OBJETO CARGAR SELECTOR PERSONAS        =
	============================================*/
	if (isset($_POST["seccion"])) {
		
		$cargar_personas_ajax = new AjaxDispositivos();
		$cargar_personas_ajax-> datos_seccion = $_POST["seccion"];
		$cargar_personas_ajax-> ajaxCargaComboboxPersonas();
	}
	/*=== End of OBJETO CARGAR SELECTOR PERSONAS   ====*/ 

	/*=================================================
	=      OBJETO EDITAR DISPOSITIVO                 =
	=================================================*/
	if (isset($_POST["id_dispositivo"])) {
		
		$editar_dispositivo_ajax = new AjaxDispositivos();
		$editar_dispositivo_ajax-> id_dispositivo = $_POST["id_dispositivo"];
		$editar_dispositivo_ajax-> ajaxEditarDispositivo();
	}
	/*=====  End of OBJETO EDITAR DISPOSITIVO  ======*/

	/*============================================
	=   OBJETO CARGAR SELECTOR MODELOS EDITAR    =
	============================================*/
	if (isset($_POST["tipo_marca_editar"])) {
		
		$cargar_tipomarca_editar_ajax = new AjaxDispositivos();
		$cargar_tipomarca_editar_ajax-> datos_tipo_marca_editar = $_POST["tipo_marca_editar"];
		$cargar_tipomarca_editar_ajax-> ajaxCargaComboboxModelosEditar();
	}
	/*=== End of OBJETOCARGAR SELECTOR MODELOS  EDITAR  ====*/ 

	/*============================================
	=  OBJETO CARGAR SELECTOR LUGARES EDITAR     =
	============================================*/
	if (isset($_POST["bloque_editar"])) {
		
		$cargar_lugares_editar_ajax = new AjaxDispositivos();
		$cargar_lugares_editar_ajax-> datos_bloque_editar = $_POST["bloque_editar"];
		$cargar_lugares_editar_ajax-> ajaxCargaComboboxLugaresEditar();
	}
	/*=== End of OBJETO CARGAR SELECTOR LUGARES EDITAR  ====*/ 

	/*============================================
	=      OBJETO CARGAR SELECTOR PERSONAS       =
	============================================*/
	if (isset($_POST["seccion_editar"])) {
		
		$cargar_personas_editar_ajax = new AjaxDispositivos();
		$cargar_personas_editar_ajax-> datos_seccion_editar = $_POST["seccion_editar"];
		$cargar_personas_editar_ajax-> ajaxCargaComboboxPersonasEditar();
	}
	/*=== End of OBJETO CARGAR SELECTOR PERSONAS   ====*/ 