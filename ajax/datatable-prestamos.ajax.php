<?php

	require_once "../controladores/modelos.controlador.php";
	require_once "../modelos/modelos.modelo.php";
	require_once "../controladores/dispositivos.controlador.php";
	require_once "../modelos/dispositivos.modelo.php";

	class AjaxTablaPrestamos{
		/*=====================================================
		=    MOSTRAR TABLA DE DISPOSITIVOS PARA PRESTAR       =
		=====================================================*/
		public function mostrarTablaPrestamos(){

				$item = null;
	          	$valor = null;

	          	$dispositivo_prestar =  ControladorDispositivos::ctrMostrarDispositivos($item, $valor);

	          	$datos_json = '{
						  "data": [ ';
						  for($i = 0; $i < count($dispositivo_prestar); $i++){

						  	$datos_json .= '[
						      "'.($i+1).'",
						      "'.$dispositivo_prestar[$i]["modelo_nombre"].'",
						      "'.$dispositivo_prestar[$i]["dispositivo_serial"].'",
						      "'.$dispositivo_prestar[$i]["dispositivo_activo"].'"
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
	$prestar_dispositivos_ajax = new AjaxTablaPrestamos;
	$prestar_dispositivos_ajax->mostrarTablaPrestamos();
	/*=====  End of OBJETO PARA CARGAR LA TABLA  ======*/
