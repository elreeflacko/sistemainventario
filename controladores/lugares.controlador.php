<?php

	class ControladorLugares{

		/*=====================================================
		=            REGISTRAR LUGAR                        =
		=====================================================*/
		public static function ctrRegistrarLugar(){

			if (isset($_POST["nombre_lugar_registro"])) {
				
				if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/', $_POST["nombre_lugar_registro"])) {
					
					//Nombre de la tabla de la bd
					$tabla = "lugares";

					$datos_lugar = array('id_bloque'             => $_POST["combobox_bloque_registro"],
										 'nombre_lugar_registro' => $_POST["nombre_lugar_registro"]);

					$respuesta = Modelolugares::mdlRegistrarLugar($tabla, $datos_lugar);
 
					if($respuesta == "ok"){

						echo'<script>

						swal({
							  type: "success",
							  title: "El Lugar ha sido guardada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "index.php?action=admin-lugares";

										}
									})

						</script>';

					}

				}else{

					echo'<script>

						swal({
						  type: "error",
						  title: "El lugar no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index.php?action=admin-lugares";

							}
						})

			  			</script>';
				}
			}
		}
		/*=====  End of REGISTRAR LUGAR  ======*/

		/*=======================================
		=            MOSTRAR LUGAR            =
		=======================================*/
		public static function ctrMostrarLugares($item, $valor){

			//tabla de la bd
			$tabla = "lugares";

			$respuesta = ModeloLugares::mdlMostrarLugares($tabla, $item, $valor);
			return $respuesta;
		}
		/*=====  End of MOSTRAR LUGAR  ======*/

		/*======================================
		=            EDITAR LUGAR            =
		======================================*/
		public static function ctrEditarLugar(){

			if (isset($_POST["nombre_lugar_editar"])) {
			
				if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/', $_POST["nombre_lugar_editar"])){

					//nombre de la tabla de la bd
					$tabla = "lugares";

					//llenamos el array con los datos del lugar
					$datos_lugar = array('id_lugar'               => $_POST["id_lugar_actual"],
										 'nombre_lugar_editar'    => $_POST["nombre_lugar_editar"],
										 'combobox_bloque_editar' => $_POST["combobox_bloque_editar"]);

					$respuesta = ModeloLugares::mdlEditarLugar($tabla, $datos_lugar);

					if ($respuesta == "ok") {
						
						echo'<script>

						swal({
							  type: "success",
							  title: "El lugar ha sido actualizado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "index.php?action=admin-lugares";

										}
									})

						</script>';
					}

				}else{

						echo'<script>

							swal({
						  		type: "error",
						  		title: "El lugar no puede ir vacía o llevar caracteres especiales!",
						  		showConfirmButton: true,
						  		confirmButtonText: "Cerrar"
						  		}).then(function(result){
									if (result.value) {

									window.location = "index.php?action=admin-lugares";

							}
						})

			  			</script>';	
					 }
				
			}
		}
		/*=====  End of EDITAR PERSONA  ======*/

		/*========================================
		=            ELIMINAR LUGAR            =
		========================================*/
		public static function ctrEliminarLugar(){

			if (isset($_GET["id-lugar"])) {
				
				$tabla = "lugares";
				$datos_lugar = $_GET["id-lugar"];

				$respuesta = ModeloLugares::mdlEliminarLugar($tabla, $datos_lugar);

				if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El lugar ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "index.php?action=admin-lugares";

								}
							})

				</script>';

				}
			}
		}
		/*=====  End of ELIMINAR LUGAR =========*/

		/*======================================
		=            CARGAR LUGARES         =
		======================================*/
		public static function ctrCargarLugares($item, $valor){

			//tabla de la bd
			$tabla = "lugares";

			$respuesta = ModeloLugares::mdlCargarLugares($tabla, $item, $valor);
			return $respuesta;
		}
		/*=====  End of CARGAR LUGARES  ======*/

		/*======================================
		=            VER LUGAR         =
		======================================*/
		public static function ctrVerLugar($item, $valor){

			//tabla de la bd
			$tabla = "lugares";

			$respuesta = ModeloLugares::mdlVerLugar($tabla, $item, $valor);
			return $respuesta;
		}
		/*=====  End of VER LUGAR  ======*/
	}