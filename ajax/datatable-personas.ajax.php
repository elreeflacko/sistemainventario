<?php

	require_once "../controladores/secciones.controlador.php";
	require_once "../modelos/secciones.modelo.php";
	require_once "../controladores/personas.controlador.php";
	require_once "../modelos/personas.modelo.php";

	class AjaxTablaPersonas{
		/*====================================
		=    MOSTRAR TABLA DE PERSONAS       =
		====================================*/
		public function mostrarTablaPersonas(){

				$item = null;
	          	$valor = null;

	          	$personas_prestar =  ControladorPersonas::ctrMostrarPersonas($item, $valor);

	          	$datos_json = '{
						  "data": [ ';
						  for($i = 0; $i < count($personas_prestar); $i++){

						  	$datos_json .= '[
						      "'.($i+1).'",
						      "'.$personas_prestar[$i]["persona_nombre"].'"
						    ],';
						  }
						  $datos_json = substr($datos_json, 0, -1);

						  $datos_json .=']
				}';
				echo $datos_json;
		}
	}
	/*=  End of MOSTRAR TABLA DE DISPOSITIVOS PARA PRESTAR ====*/
	/*=================================================
	=      OBJETO PARA CARGAR LA TABLA                 =
	=================================================*/
	$personas_ajax = new AjaxTablaPersonas;
	$personas_ajax->mostrarTablaPersonas();
	/*=====  End of OBJETO PARA CARGAR LA TABLA  ======*/