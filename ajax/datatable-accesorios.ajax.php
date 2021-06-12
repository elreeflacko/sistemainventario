<?php
	require_once "../controladores/accesorios.controlador.php";
	require_once "../modelos/accesorios.modelo.php";	
	require_once "../controladores/dispositivos.controlador.php";
	require_once "../modelos/dispositivos.modelo.php";	
	require_once "../controladores/plantilla.controlador.php";

	class AjaxTablaAccesorios{

		/*=====================================================
		=    MOSTRAR TABLA DE ACCESORIOS                  =
		=====================================================*/
		public function mostrarTablaAccesorios(){

				//$ruta_memo =  ControladorPlantilla::ctrRutaMemo();

				$item = null;
	          	$valor = null;

	          	$accesorios =  ControladorAccesorios::ctrMostrarAccesorios($item, $valor);

	          	$datos_json = '{
						  "data": [ ';
						  for($i = 0; $i < count($accesorios); $i++){

						  	if (isset($_GET["perfil_oculto"]) && $_GET["perfil_oculto"] == "especial") {

						  		$acciones = "<div class='btn-group'><button class='btn btn-info btn_ver_accesorio' id-ver-accesorio='".$accesorios[$i]["accesorio_id"]."' data-toggle='modal' data-target='#modal_ver_accesorio'><i class='fa fa-info'></i></button></div>";
						  	}else{

						  		$acciones = "<div class='btn-group'><button class='btn btn-info btn_ver_accesorio' id-ver-accesorio='".$accesorios[$i]["accesorio_id"]."' data-toggle='modal' data-target='#modal_ver_accesorio'><i class='fa fa-info'></i></button><button class='btn btn-warning btn_editar_accesorio' id-accesorio='".$accesorios[$i]["accesorio_id"]."'' data-toggle='modal' data-target='#modal_editar_accesorio'><i class='fa fa-pencil'></i></button></div>";
						  	}

						  	$datos_json .= '[
						      "'.($i+1).'",
						      "'.$accesorios[$i]["accesorio_activo"].'",
						      "'.$accesorios[$i]["accesorio_serial"].'",
						      "'.$accesorios[$i]["accesorio_descripcion"].'",
						      "'.$accesorios[$i]["accesorio_estado"].'",
						      "'.$accesorios[$i]["dispositivo_serial"].'",
						      "'.$accesorios[$i]["tipo_dispositivo_nombre"].'",
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
	$activar_accesorios_ajax = new AjaxTablaAccesorios();
	$activar_accesorios_ajax->mostrarTablaAccesorios();
	/*=====  End of OBJETO PARA CARGAR LA TABLA  ======*/
