<?php

	class ControladorDispositivos{

		/*=====================================================
		=            REGISTRAR DISPOSITIVO                       =
		=====================================================*/
		public static function ctrRegistrarDispositivo(){

			if (isset($_POST["serial_dispositivo_registro"])) {

					$fecha_garantia = $_POST["fecha_garantia_dispositivo"];
					/*=============================================
					=  REVISAMOS SI LA FECHA VIENE VACIA          =
					=============================================*/
					if ($fecha_garantia == "") {

						$fecha_garantia = "0000-00-00";

						//Revisamos y limpiamos el campo de serial
						$serial_dispositivo = $_POST["serial_dispositivo_registro"];
						$serial_dispositivo = htmlspecialchars($serial_dispositivo);
						$serial_dispositivo = trim($serial_dispositivo);
						$serial_dispositivo = filter_var($serial_dispositivo, FILTER_SANITIZE_STRING);

						//Revisamos y limpiamos el campo de activo
						$activo_dispositivo = $_POST["activo_dispositivo_registro"];
						$activo_dispositivo = htmlspecialchars($activo_dispositivo);
						$activo_dispositivo = trim($activo_dispositivo);
						$activo_dispositivo = filter_var($activo_dispositivo, FILTER_SANITIZE_STRING);

						//Validamos la imagen de la firma
						if (isset($_FILES["firma_persona"]["tmp_name"])) {

							list($ancho, $alto) = getimagesize($_FILES["firma_persona"]["tmp_name"]);

							$nuevo_ancho = 1500;
							$nuevo_alto = 800;

							/*=============================================================================
							=            Creamos el directorio donde vamos a guardar la imagen            =
							=============================================================================*/
							$directorio = "vistas/img/firmas/".$_POST["combobox_persona_registro"];
							mkdir($directorio, 0755, true);
							/*===============================================================================================
							=            De acuerdo al tipo de imagen aplicamos las funciones por defecto de PHP            =
							===============================================================================================*/
							if($_FILES["firma_persona"]["type"] == "image/jpeg"){
								/*============================================================
								=            guardamos la imagen en el directorio            =
								============================================================*/
								$firma_ruta = "vistas/img/firmas/".$_POST["combobox_persona_registro"]."/".$_POST["combobox_persona_registro"].".jpg";
								$firma_origen = imagecreatefromjpeg($_FILES["firma_persona"]["tmp_name"]);
								$firma_destino = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
								imagecopyresized($firma_destino, $firma_origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
								imagejpeg($firma_destino, $firma_ruta);
								/*=====  End of guardamos la imagen en el directorio  ======*/
								
							}
							if($_FILES["firma_persona"]["type"] == "image/png"){
								/*============================================================
								=            guardamos la imagen en el directorio            =
								============================================================*/
								$firma_ruta = "vistas/img/firmas/".$_POST["combobox_persona_registro"]."/".$_POST["combobox_persona_registro"].".png";
								$firma_origen = imagecreatefrompng($_FILES["firma_persona"]["tmp_name"]);
								$firma_destino = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
								imagecopyresized($firma_destino, $firma_origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
								imagepng($firma_destino, $firma_ruta);
								/*=====  End of guardamos la imagen en el directorio  ======*/
								
							}
							/*=====  End of De acuerdo al tipo de imagen aplicamos las funciones por defecto de PHP  ======*/
		
							/*=====  End of Creamos el directorio donde vamos a guardar la imagen  ======*/	
						}
						else{
							
							$firma_ruta = "";
						}

						//Nombre de la tabla de la bd
						$tabla = "dispositivos";

						$datos_dispositivo = array('serial_dispositivo' => $serial_dispositivo,
										       'activo_dispositivo'     => $activo_dispositivo,
										       'comentario_dispositivo' => $_POST["comentario_dispositivo_registro"],
										       'garantia_dispositivo'   => $fecha_garantia,
										       'id_modelo'              => $_POST["combobox_modelo_registro"],
										       'id_persona'             => $_POST["combobox_persona_registro"],
										       'id_lugar'               => $_POST["combobox_lugar_registro"],
										       'estado_dispositivo'     => $_POST["combobox_estado_registrar"],
											   'firma_dispositivo'      => $firma_ruta
										      );

						$respuesta = ModeloDispositivos::mdlRegistrarDispositivo($tabla, $datos_dispositivo);

						if($respuesta == "ok"){

							echo'<script>

							swal({
							  type: "success",
							  title: "El dispositivo ha sido guardada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "index.php?action=admin-dispositivos";

										}
									})

							</script>';

						}else{

							echo'<script>

							swal({
						  		type: "error",
						  		title: "El dispositivo no ha sido guardado correctamente!",
						  		showConfirmButton: true,
						  		confirmButtonText: "Cerrar"
						  	}).then(function(result){
								if (result.value) {

								window.location = "index.php?action=admin-dispositivos";

								}
							})

			  				</script>';
						}
					}
					/*=====  End of REVISAMOS SI LA FECHA VIENE VACIA   ======*/

					/*=============================================
					=  Corre esta condicion cuando viene con datos        =
					=============================================*/
					else{

						//Revisamos y limpiamos el campo de serial
						$serial_dispositivo = $_POST["serial_dispositivo_registro"];
						$serial_dispositivo = htmlspecialchars($serial_dispositivo);
						$serial_dispositivo = trim($serial_dispositivo);
						$serial_dispositivo = filter_var($serial_dispositivo, FILTER_SANITIZE_STRING);

						//Revisamos y limpiamos el campo de activo
						$activo_dispositivo = $_POST["activo_dispositivo_registro"];
						$activo_dispositivo = htmlspecialchars($activo_dispositivo);
						$activo_dispositivo = trim($activo_dispositivo);
						$activo_dispositivo = filter_var($activo_dispositivo, FILTER_SANITIZE_STRING);

						//Nombre de la tabla de la bd
						$tabla = "dispositivos";

						$datos_dispositivo = array('serial_dispositivo' => $serial_dispositivo,
										       'activo_dispositivo'     => $activo_dispositivo,
										       'comentario_dispositivo' => $_POST["comentario_dispositivo_registro"],
										       'garantia_dispositivo'   => $fecha_garantia,
										       'id_modelo'              => $_POST["combobox_modelo_registro"],
										       'id_persona'             => $_POST["combobox_persona_registro"],
										       'id_lugar'               => $_POST["combobox_lugar_registro"],
										       'estado_dispositivo'     => $_POST["combobox_estado_registrar"],
											   'firma_dispositivo'      => $firma_ruta
										      );

						$respuesta = ModeloDispositivos::mdlRegistrarDispositivo($tabla, $datos_dispositivo);

						if($respuesta == "ok"){

							echo'<script>

							swal({
							  type: "success",
							  title: "El dispositivo ha sido guardada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "index.php?action=admin-dispositivos";

										}
									})

							</script>';

						}else{

							echo'<script>

							swal({
						  		type: "error",
						  		title: "El dispositivo no ha sido guardado correctamente!",
						  		showConfirmButton: true,
						  		confirmButtonText: "Cerrar"
						  	}).then(function(result){
								if (result.value) {

								window.location = "index.php?action=admin-dispositivos";

								}
							})

			  				</script>';
						}
					}
			}
		}
		/*=====  End of REGISTRAR DISPOSITIVO  ======*/

		/*=======================================
		=         MOSTRAR DISPOSITIVOS          =
		=======================================*/
		public static function ctrMostrarDispositivos($item, $valor){

			//tabla de la bd
			$tabla = "dispositivos";

			$respuesta = ModeloDispositivos::mdlMostrarDispositivos($tabla, $item, $valor);
			return $respuesta;
		}
		/*=====  End of MOSTRAR DISPOSITIVOS  ======*/

		/*=======================================
		=   MOSTRAR DISPOSITIVOS POR TIPO       =
		=======================================*/
		public static function ctrMostrarDispositivosTipo($item, $valor){
			//tabla de la bd
			$tabla = "dispositivos";

			$respuesta = ModeloDispositivos::mdlMostrarDispositivosTipo($tabla, $item, $valor);
			return $respuesta;
		}
		/*=====  End of MOSTRAR DISPOSITIVOS POR TIPO  ======*/

		/*======================================
		=          EDITAR DISPOSITIVO          =
		======================================*/
		public static function ctrEditarDispositivo(){

			if (isset($_POST["serial_dispositivo_editar"])) {

					//$resultado = $valor ?: 'defecto';

					$fecha_garantia_editar = $_POST["fecha_garantia_dispositivo_editar"] ?: "0000-00-00";
					$fecha_prestamo = $_POST["fecha_prestamo_dispositivo"] ?: "0000-00-00";

					//$fecha_garantia_editar = $_POST["fecha_garantia_dispositivo_editar"];
					//$fecha_prestamo = $_POST["fecha_prestamo_dispositivo"];
					/*=========================================================
					=            REVISAMOS SI LA FECHA VIENE VACIA            =
					=========================================================*/
					//if($fecha_garantia_editar === ""){

						//$fecha_garantia_editar = "0000-00-00";
						
						//Revisamos y limpiamos el campo de serial
						$serial_dispositivo = $_POST["serial_dispositivo_editar"];
						$serial_dispositivo = htmlspecialchars($serial_dispositivo);
						$serial_dispositivo = trim($serial_dispositivo);
						$serial_dispositivo = filter_var($serial_dispositivo, FILTER_SANITIZE_STRING);

						//Revisamos y limpiamos el campo de activo
						$activo_dispositivo = $_POST["activo_dispositivo_editar"];
						$activo_dispositivo = htmlspecialchars($activo_dispositivo);
						$activo_dispositivo = trim($activo_dispositivo);
						$activo_dispositivo = filter_var($activo_dispositivo, FILTER_SANITIZE_STRING);

						//nombre de la tabla de la bd
						$tabla = "dispositivos";

						//llenamos el array con los datos del modelo
						$datos_dispositivo = array('id_dispositivo'            => $_POST["id_dispositivo_actual"],
											   'serial_dispositivo_editar'     => $serial_dispositivo,
										       'activo_dispositivo_editar'     => $activo_dispositivo,
										       'comentario_dispositivo_editar' => $_POST["comentario_dispositivo_editar"],
										       'garantia_dispositivo_editar'   => $fecha_garantia_editar,
										       'id_modelo_editar'              => $_POST["combobox_modelo_editar"],
										       'id_persona_editar'             => $_POST["combobox_persona_editar"],
										       'id_lugar_editar'               => $_POST["combobox_lugar_editar"],
										       'fecha_prestamo'                => $fecha_prestamo,
										       'estado_dispositivo_editar'     => $_POST["combobox_estado_editar"]
										      );

						$respuesta = ModeloDispositivos::mdlEditarDispositivo($tabla, $datos_dispositivo);

						if ($respuesta == "ok") {

							echo'<script>

							swal({
							  	type: "success",
							  	title: "El Dispositivo ha sido actualizado correctamente",
							  	showConfirmButton: true,
							  	confirmButtonText: "Cerrar"
							  	}).then(function(result){
									if (result.value) {

										window.location = "index.php?action=admin-dispositivos";

									}
								})

							</script>';

						}else{

							echo'<script>

								swal({
						  		type: "error",
						  		title: "El dispositivo no ha sido guardado correctamente!",
						  		showConfirmButton: true,
						  		confirmButtonText: "Cerrar"
						  		}).then(function(result){
									if (result.value) {

									window.location = "index.php?action=admin-dispositivos";

								}
							})

			  				</script>';
						}
					//}
					/*=====  End of REVISAMOS SI LA FECHA VIENE VACIA  ======*/
					/*else{
						//Revisamos y limpiamos el campo de serial
						$serial_dispositivo = $_POST["serial_dispositivo_editar"];
						$serial_dispositivo = htmlspecialchars($serial_dispositivo);
						$serial_dispositivo = trim($serial_dispositivo);
						$serial_dispositivo = filter_var($serial_dispositivo, FILTER_SANITIZE_STRING);

						//Revisamos y limpiamos el campo de activo
						$activo_dispositivo = $_POST["activo_dispositivo_editar"];
						$activo_dispositivo = htmlspecialchars($activo_dispositivo);
						$activo_dispositivo = trim($activo_dispositivo);
						$activo_dispositivo = filter_var($activo_dispositivo, FILTER_SANITIZE_STRING);

						//nombre de la tabla de la bd
						$tabla = "dispositivos";

						//llenamos el array con los datos del modelo
						$datos_dispositivo = array('id_dispositivo'            => $_POST["id_dispositivo_actual"],
											   'serial_dispositivo_editar'     => $serial_dispositivo,
										       'activo_dispositivo_editar'     => $activo_dispositivo,
										       'comentario_dispositivo_editar' => $_POST["comentario_dispositivo_editar"],
										       'garantia_dispositivo_editar'   => $fecha_garantia_editar,
										       'id_modelo_editar'              => $_POST["combobox_modelo_editar"],
										       'id_persona_editar'             => $_POST["combobox_persona_editar"],
										       'id_lugar_editar'               => $_POST["combobox_lugar_editar"],
										       'fecha_prestamo'                => $fecha_prestamo,
										       'estado_dispositivo_editar'     => $_POST["combobox_estado_editar"]
										      );

						$respuesta = ModeloDispositivos::mdlEditarDispositivo($tabla, $datos_dispositivo);

						if ($respuesta == "ok") {

							echo'<script>

							swal({
							  	type: "success",
							  	title: "El Dispositivo ha sido actualizado correctamente",
							  	showConfirmButton: true,
							  	confirmButtonText: "Cerrar"
							  	}).then(function(result){
									if (result.value) {

										window.location = "index.php?action=admin-dispositivos";

									}
								})

							</script>';

						}else{

							echo'<script>

								swal({
						  		type: "error",
						  		title: "El dispositivo no ha sido guardado correctamente!",
						  		showConfirmButton: true,
						  		confirmButtonText: "Cerrar"
						  		}).then(function(result){
									if (result.value) {

									window.location = "index.php?action=admin-dispositivos";

								}
							})

			  				</script>';
						}
					}*/
			}
		}
		/*=====  End of EDITAR DISPOSITIVO  ======*/

		/*========================================
		=            ELIMINAR DISPOSTIVO         =
		========================================*/
		public static function ctrEliminarDispositivo(){

			if (isset($_GET["id-dispositivo"])) {

				$tabla = "dispositivos";
				$datos_dispositivo = $_GET["id-dispositivo"];

				$respuesta = ModeloDispositivos::mdlEliminarDispositivo($tabla, $datos_dispositivo);

				if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El dispositivo ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "index.php?action=admin-dispositivos";

								}
							})

				</script>';

				}
			}
		}
		/*=====  End of ELIMINAR DISPOSTIVO  ======*/
		/*========================================
		=     MOSTRAR DISPOSITIVOS POR ESTADO     =
		========================================*/
		public static function ctrMostrarEstadoDispositivos($item, $valor){

			//tabla de la bd
			$tabla = "dispositivos";

			$respuesta = ModeloDispositivos::mdlMostrarEstadoDispositivos($tabla, $item, $valor);
			return $respuesta;
		}
		/*=====  End of MOSTRAR ESTADO DISPOSITIVO  ======*/
		/*========================================
		=     MOSTRAR DISPOSITIVOS POR ESTADO     =
		========================================*/
		public static function ctrMostrarDispositivosPrestados($item, $valor){

			//tabla de la bd
			$tabla = "dispositivos";

			$respuesta = ModeloDispositivos::mdlMostrarDispositivosPrestados($tabla, $item, $valor);
			return $respuesta;
		}
		/*=====  End of MOSTRAR ESTADO DISPOSITIVO  ======*/

		/*=====================================
		=            GUARDAR FIRMA            =
		=====================================*/
		public static function ctrGuardarFirma($valor_idDispositivo, $valor_firma){

			//tabla de la bd
			$tabla = "dispositivos";

			$respuesta = ModeloDispositivos::mdlGuardarFirma($tabla, $valor_idDispositivo, $valor_firma);

			if ($respuesta == "ok") {
				return "ok";
			}else{
				return "false";
			}	
		}
		/*=====  End of GUARDAR FIRMA  ======*/
		
	}