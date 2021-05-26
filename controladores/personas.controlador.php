<?php

	class ControladorPersonas{

		/*=====================================================
		=            REGISTRAR PERSONA                       =
		=====================================================*/
		public static function ctrRegistrarPersona(){

			if (isset($_POST["nombre_persona_registro"])) {
				
				if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre_persona_registro"])) {
					
					//Nombre de la tabla de la bd
					$tabla = "personas";

					$datos_persona = array('id_seccion'             => $_POST["combobox_seccion_registro"],
										 'nombre_persona_registro' => $_POST["nombre_persona_registro"]);

					$respuesta = ModeloPersonas::mdlRegistrarPersona($tabla, $datos_persona);
 
					if($respuesta == "ok"){

						echo'<script>

						swal({
							  type: "success",
							  title: "La persona ha sido guardada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "index.php?action=admin-personas";

										}
									})

						</script>';

					}

				}else{

					echo'<script>

						swal({
						  type: "error",
						  title: "La persona no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index.php?action=admin-personas";

							}
						})

			  			</script>';
				}
			}
		}
		/*=====  End of REGISTRAR PERSONA  ======*/

		/*=======================================
		=            MOSTRAR PERSONAS            =
		=======================================*/
		public static function ctrMostrarPersonas($item, $valor){

			//tabla de la bd
			$tabla = "personas";

			$respuesta = ModeloPersonas::mdlMostrarPersonas($tabla, $item, $valor);
			return $respuesta;
		}
		/*=====  End of MOSTRAR PERSONAS  ======*/

		/*======================================
		=            EDITAR PERSONA            =
		======================================*/
		public static function ctrEditarPersona(){

			if (isset($_POST["nombre_persona_editar"])) {
			
				if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/', $_POST["nombre_persona_editar"])){

					//nombre de la tabla de la bd
					$tabla = "personas";

					//llenamos el array con los datos de persona
					$datos_persona = array('id_persona'              => $_POST["id_persona_actual"],
										   'nombre_persona_editar'   => $_POST["nombre_persona_editar"],
										   'combobox_seccion_editar' => $_POST["combobox_seccion_editar"]);

					$respuesta = ModeloPersonas::mdlEditarPersona($tabla, $datos_persona);

					if ($respuesta == "ok") {
						
						echo'<script>

						swal({
							  type: "success",
							  title: "La persona ha sido actualizado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "index.php?action=admin-personas";

										}
									})

						</script>';
					}

				}else{

						echo'<script>

							swal({
						  		type: "error",
						  		title: "La persona no puede ir vacía o llevar caracteres especiales!",
						  		showConfirmButton: true,
						  		confirmButtonText: "Cerrar"
						  		}).then(function(result){
									if (result.value) {

									window.location = "index.php?action=admin-personas";

							}
						})

			  			</script>';	
					 }
				
			}
		}
		/*=====  End of EDITAR PERSONA  ======*/

		/*========================================
		=            ELIMINAR PERSONAS            =
		========================================*/
		public static function ctrEliminarPersona(){

			if (isset($_GET["id-persona"])) {
				
				$tabla = "personas";
				$datos_persona = $_GET["id-persona"];

				$respuesta = ModeloPersonas::mdlEliminarPersona($tabla, $datos_persona);

				if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La persona ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "index.php?action=admin-personas";

								}
							})

				</script>';

				}
			}
		}
		/*=====  End of ELIMINAR PERSONAS  ======*/

		/*======================================
		=            CARGAR PERSONAS         =
		======================================*/
		public static function ctrCargarPersonas($item, $valor){

			//tabla de la bd
			$tabla = "personas";

			$respuesta = ModeloPersonas::mdlCargarPersonas($tabla, $item, $valor);
			return $respuesta;
		}
		/*=====  End of CARGAR PERSONAS  ======*/

		/*======================================
		=            VER PERSONA         =
		======================================*/
		public static function ctrVerPersona($item, $valor){

			//tabla de la bd
			$tabla = "personas";
		
			$respuesta = ModeloPersonas::mdlVerPersona($tabla, $item, $valor);
			return $respuesta;
		}
		/*=====  End of VER PERSONA  ======*/

		/*==============================================
		=            ACTUALIZAR PAZ Y SALVO            =
		==============================================*/
		public static function ctrActualizarPazySalvo( $valor1, $valor2){

			$tabla = "personas";
			
			$respuestas = ModeloPersonas::mdlActualizarPazySalvo($tabla, $valor1, $valor2);
			return $respuestas;
		}
		/*=====  End of ACTUALIZAR PAZ Y SALVO  ======*/	
	}