<?php

	class ControladorTiposDispositivos{

		/*=====================================================
		=            REGISTRAR TIPO DE DISPOSITIVO            =
		=====================================================*/
		public static function ctrRegistrarTipoDispositivo(){

			if (isset($_POST["nombre_tipoDispositivo_registro"])) {
				
				if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre_tipoDispositivo_registro"])) {
	
				/*=============================================
				VALIDAR IMAGEN
				=============================================*/
			   	$ruta_imagen = "vistas/img/dispositivos/default/anonymous.png";

			   	if(isset($_FILES["imagen_dispositivo"]["tmp_name"]) && !empty($_FILES["imagen_dispositivo"])){

					list($ancho, $alto) = getimagesize($_FILES["imagen_dispositivo"]["tmp_name"]);

					$nuevo_ancho = 500;
					$nuevo_alto = 500;
					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL TIPO DE DISPOSITIVO
					=============================================*/
					$nombre_carpeta = strtr($_POST["nombre_tipoDispositivo_registro"], " ", "-");

					$directorio = "vistas/img/dispositivos/".$nombre_carpeta;

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["imagen_dispositivo"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta_imagen = "vistas/img/dispositivos/".$nombre_carpeta."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["imagen_dispositivo"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);

						imagejpeg($destino, $ruta_imagen);

					}

					if($_FILES["nueva_imagen"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta_imagen = "vistas/img/dispositivos/".$nombre_carpeta."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nueva_imagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);

						imagepng($destino, $ruta_imagen);

					}

				}

					//FIN VALIDAR IMAGEN
					
					//Nombre de la tabla de la bd
					$tabla = "tipos_dispositivos";

					$datos_tipo_dispositivo = array("tipo_dispositivo_nombre" => $_POST["nombre_tipoDispositivo_registro"],
											        "tipo_dispositivo_imagen" => $ruta_imagen);

					$respuesta = ModeloTiposDispositivos::mdlRegistrarTipoDispositivo($tabla, $datos_tipo_dispositivo);

					if($respuesta == "ok"){

						echo'<script>

						swal({
							  type: "success",
							  title: "El Tipo de dispositivo ha sido guardada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "index.php?action=admin-tipos-dispositivo";

										}
									})

						</script>';

					}

				}else{

					echo'<script>

						swal({
						  type: "error",
						  title: "El Tipo de dispositivo no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index.php?action=admin-tipos-dispositivo";

							}
						})

			  			</script>';
				}
			}
		}
		/*=====  End of REGISTRAR TIPO DE DISPOSITIVO  ======*/

		/*=====================================================
		=            MOSTRAR TIPOS  DISPOSITIVOS            =
		=====================================================*/
		public static function ctrMostrarTiposDispositivos($item, $valor){

			$tabla = "tipos_dispositivos";

			$respuesta = ModeloTiposDispositivos::mdlMostrarTiposDispositivos($tabla, $item, $valor);
			return $respuesta;
		}
		/*=====  End of MOSTRAR TIPOS  DISPOSITIVOS    ======*/

		/*===============================================
		=            EDITAR TIPO DISPOSITIVO            =
		===============================================*/
		public static function ctrEditarTipoDispositivo(){

			if (isset($_POST["nombre_tipoDispositivo_editar"])) {
				
				if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre_tipoDispositivo_editar"])){

					/*=============================================
					VALIDAR IMAGEN
					=============================================*/
				   	$ruta_imagen = $_POST["imagen_actual"];

				   	if(isset($_FILES["imagen_dispositivo_editar"]["tmp_name"]) && !empty($_FILES["imagen_dispositivo_editar"]["tmp_name"])){

						list($ancho, $alto) = getimagesize($_FILES["imagen_dispositivo_editar"]["tmp_name"]);

						$nuevo_ancho = 500;
						$nuevo_alto = 500;
						/*=============================================
						CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL TIPO DE DISPOSITIVO
						=============================================*/
						$nombre_carpeta = strtr($_POST["nombre_tipoDispositivo_editar"], " ", "-");

						$directorio = "vistas/img/dispositivos/".$nombre_carpeta;

						//Revisamos si exite otra imagen en la bd

						if (!empty($_POST["imagen_actual"]) && $_POST["imagen_actual"] != "vistas/img/dispositivos/default/anonymous.png") {
							unlink($_POST["imagen_actual"]);
							mkdir($directorio, 0755);
						}else{
							mkdir($directorio, 0755);	
						}
						/*=============================================
						DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
						=============================================*/

						if($_FILES["imagen_dispositivo_editar"]["type"] == "image/jpeg"){

							/*=============================================
							GUARDAMOS LA IMAGEN EN EL DIRECTORIO
							=============================================*/

							$aleatorio = mt_rand(100,999);

							$ruta_imagen = "vistas/img/dispositivos/".$nombre_carpeta."/".$aleatorio.".jpg";

							$origen = imagecreatefromjpeg($_FILES["imagen_dispositivo_editar"]["tmp_name"]);						

							$destino = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);

							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);

							imagejpeg($destino, $ruta_imagen);

						}

						if($_FILES["imagen_dispositivo_editar"]["type"] == "image/png"){

							/*=============================================
							GUARDAMOS LA IMAGEN EN EL DIRECTORIO
							=============================================*/

							$aleatorio = mt_rand(100,999);

							$ruta_imagen = "vistas/img/dispositivos/".$nombre_carpeta."/".$aleatorio.".png";

							$origen = imagecreatefrompng($_FILES["imagen_dispositivo_editar"]["tmp_name"]);						

							$destino = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);

							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);

							imagepng($destino, $ruta_imagen);

						}

					}

						//FIN VALIDAR IMAGEN

					//Nombre de la tabla de la bd
					$tabla = "tipos_dispositivos";

					$datos_tipo_dispositivo = array('id_tipo_dispositivo' => $_POST["id_tipo_dispositivo_actual"], 
				                                    'tipo_dispositivo_nombre_editar' => $_POST["nombre_tipoDispositivo_editar"],
				                                    'tipo_dispositivo_imagen' => $ruta_imagen);
					

					$respuesta = ModeloTiposDispositivos::mdlEditarTipoDispositivo($tabla, $datos_tipo_dispositivo);

					if($respuesta == "ok"){

						echo'<script>

						swal({
							  type: "success",
							  title: "El Tipo de dispositivo ha sido actualizado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "index.php?action=admin-tipos-dispositivo";

										}
									})

						</script>';

					}
				}else{

					echo'<script>

						swal({
						  type: "error",
						  title: "El Tipo de dispositivo no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index.php?action=admin-tipos-dispositivo";

							}
						})

			  			</script>';
				}
			}
		}
		
		
		/*=====  End of EDITAR TIPO DISPOSITIVO  ======*/

		/*========================================
		=     ELIMINAR TIPO DE DISPOSITIVO       =
		========================================*/
		public static function ctrEliminarTipoDispositivo(){

			if (isset($_GET["id-tipo-dispositivo"])) {
				
				//Nombre de la tabla de la bd
				$tabla = "tipos_dispositivos";
				$datos_tipo_dispositivo = $_GET["id-tipo-dispositivo"];

				//Revisamos si la variable imagen viene vacia
				if ($_GET["imagen"] != "" && $_GET["imagen"] != "vistas/img/dispositivos/default/anonymous.png") {
					unlink($_GET["imagen"]);
					$nombre_carpeta_borrar = strtr($_GET["tipo-dispositivo"], " ", "-");
					rmdir("vistas/img/dispositivos/".$nombre_carpeta_borrar);
				}

				$respuesta = ModeloTiposDispositivos::mdlEliminarTipoDispositivo($tabla, $datos_tipo_dispositivo);

				if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El tipo de dispositivo ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "index.php?action=admin-tipos-dispositivo";

								}
							})

				</script>';

				}
			}
		}
		/*=====  End of ELIMINAR TIPO DE DISPOSITIVO  ======*/
	}