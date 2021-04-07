<?php

	require_once "../controladores/modelos.controlador.php";
	require_once "../modelos/modelos.modelo.php";
	require_once "../controladores/lugares.controlador.php";
	require_once "../modelos/lugares.modelo.php";
	require_once "../controladores/personas.controlador.php";
	require_once "../modelos/personas.modelo.php";
	require_once "../controladores/dispositivos.controlador.php";
	require_once "../modelos/dispositivos.modelo.php";
	require_once "../controladores/plantilla.controlador.php";

	class AjaxTablaDispositivos{

		/*=====================================================
		=    MOSTRAR TABLA DE DISPOSITIVOS                  =
		=====================================================*/
		public function mostrarTablaDispositivos(){

				$ruta_memo =  ControladorPlantilla::ctrRutaMemo();

				$item = null;
	          	$valor = null;

	          	$dispositivos =  ControladorDispositivos::ctrMostrarDispositivos($item, $valor);

	          	$datos_json = '{
						  "data": [ ';
						  for($i = 0; $i < count($dispositivos); $i++){

						  	if (isset($_GET["perfil_oculto"]) && $_GET["perfil_oculto"] == "especial") {

						  		$acciones = "<div class='btn-group'><button class='btn btn-info btn_ver_dispositivo' id-ver-dispositivo='".$dispositivos[$i]["dispositivo_id"]."' data-toggle='modal' data-target='#modal_ver_dispositivo'><i class='fa fa-info'></i></button><button class='btn btn-warning btn_editar_dispositivo' id-dispositivo='".$dispositivos[$i]["dispositivo_id"]."'' data-toggle='modal' data-target='#modal_editar_dispositivo' disabled><i class='fa fa-pencil'></i></button></div>";
						  	}else{

						  		$acciones = "<div class='btn-group'><button class='btn btn-info btn_ver_dispositivo' id-ver-dispositivo='".$dispositivos[$i]["dispositivo_id"]."' data-toggle='modal' data-target='#modal_ver_dispositivo'><i class='fa fa-info'></i></button><button class='btn btn-warning btn_editar_dispositivo' id-dispositivo='".$dispositivos[$i]["dispositivo_id"]."'' data-toggle='modal' data-target='#modal_editar_dispositivo'><i class='fa fa-pencil'></i></button><a href='".$ruta_memo.$dispositivos[$i]["dispositivo_id"]."' class='btn btn-success'  target='_blank'><i class='fa fa-print'></i></a></div>";
						  	}

						  	$datos_json .= '[
						      "'.($i+1).'",
						      "'.$dispositivos[$i]["tipo_dispositivo_nombre"].'",
						      "'.$dispositivos[$i]["marca_nombre"].'",
						      "'.$dispositivos[$i]["modelo_nombre"].'",
						      "'.$dispositivos[$i]["dispositivo_serial"].'",
						      "'.$dispositivos[$i]["dispositivo_activo"].'",
						      "'.$dispositivos[$i]["bloque_nombre"].'",
						      "'.$dispositivos[$i]["lugar_nombre"].'",
						      "'.$dispositivos[$i]["seccion_nombre"].'",
						      "'.$dispositivos[$i]["persona_nombre"].'",
						      "'.$acciones.'"
						    ],';
						  }
						  $datos_json = substr($datos_json, 0, -1);

						  $datos_json .=']
				}';

				echo $datos_json;
		}
		/*=  End of MOSTRAR TABLA DE DISPOSITIVOS ====*/
	}
	/*=================================================
	=      OBJETO PARA CARGAR LA TABLA                 =
	=================================================*/
	$activar_dispositivos_ajax = new AjaxTablaDispositivos();
	$activar_dispositivos_ajax->mostrarTablaDispositivos();
	/*=====  End of OBJETO PARA CARGAR LA TABLA  ======*/
