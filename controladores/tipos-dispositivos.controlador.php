<?php

	class ControladorTiposDispositivos{

		/*=====================================================
		=            REGISTRAR TIPO DE DISPOSITIVO            =
		=====================================================*/
		public static function ctrRegistrarTipoDispositivo(){

			if (isset($_POST["nombre_tipoDispositivo_registro"])) {
				
				if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre_tipoDispositivo_registro"])) {
					
					//Nombre de la tabla de la bd
					$tabla = "tipos_dispositivos";

					$datos_tipo_dispositivo = $_POST["nombre_tipoDispositivo_registro"];

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

					//Nombre de la tabla de la bd
					$tabla = "tipos_dispositivos";

					$datos_tipo_dispositivo = array('id_tipo_dispositivo' => $_POST["id_tipo_dispositivo_actual"], 
				                                    'tipo_dispositivo_nombre_editar' => $_POST["nombre_tipoDispositivo_editar"]);
					

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