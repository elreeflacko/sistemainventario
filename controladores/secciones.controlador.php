<?php

	class ControladorSecciones{

		/*=====================================================
		=            REGISTRAR SECCIÓN                        =
		=====================================================*/
		public static function ctrRegistrarSeccion(){

			if (isset($_POST["nombre_seccion_registro"])) {
				
				if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre_seccion_registro"])) {
					
					//Nombre de la tabla de la bd
					$tabla = "secciones";

					$datos_seccion = $_POST["nombre_seccion_registro"];

					$respuesta = ModeloSecciones::mdlRegistrarSeccion($tabla, $datos_seccion);

					if($respuesta == "ok"){

						echo'<script>

						swal({
							  type: "success",
							  title: "la sección ha sido guardada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "index.php?action=admin-secciones";

										}
									})

						</script>';

					}

				}else{

					echo'<script>

						swal({
						  type: "error",
						  title: "La sección no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index.php?action=admin-secciones";

							}
						})

			  			</script>';
				}
			}
		}
		/*=====  End of REGISTRAR SECCIÓN  ==========*/

		/*=======================================
		=            MOSTRAR SECCIONES           =
		=======================================*/
		public static function ctrMostrarSecciones($item, $valor){

			//tabla de la bd
			$tabla = "secciones";

			$respuesta = ModeloSecciones::mdlMostrarSecciones($tabla, $item, $valor);
			return $respuesta;
		}
		/*=====  End of MOSTRAR SECCIONES  ======*/

		/*===============================================
		=            EDITAR SECCION          =
		===============================================*/
		public static function ctrEditarSeccion(){

			if (isset($_POST["nombre_seccion_editar"])) {
				
				if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre_seccion_editar"])){

					//Nombre de la tabla de la bd
					$tabla = "secciones";

					$datos_seccion = array('id_seccion' => $_POST["id_seccion_actual"], 
				                          'seccion_nombre_editar' => $_POST["nombre_seccion_editar"]);
					

					$respuesta = ModeloSecciones::mdlEditarSeccion($tabla, $datos_seccion);

					if($respuesta == "ok"){

						echo'<script>

						swal({
							  type: "success",
							  title: "La Sección ha sido actualizado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "index.php?action=admin-secciones";

										}
									})

						</script>';

					}
				}else{

					echo'<script>

						swal({
						  type: "error",
						  title: "La Sección no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index.php?action=admin-secciones";

							}
						})

			  			</script>';
				}
			}
		}
		/*=====  End of EDITAR SECCION ======*/

		/*========================================
		=     ELIMINAR TIPO DE DISPOSECCION       =
		========================================*/
		public static function ctrEliminarSeccion(){

			if (isset($_GET["id-seccion"])) {
				
				//Nombre de la tabla de la bd
				$tabla = "secciones";
				$datos_seccion = $_GET["id-seccion"];

				$respuesta = ModeloSecciones::mdlEliminarSeccion($tabla, $datos_seccion);

				if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La sección ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "index.php?action=admin-secciones";

								}
							})

				</script>';

				}
			}
		}
		/*=====  End of ELIMINAR SECCION      ======*/
	}