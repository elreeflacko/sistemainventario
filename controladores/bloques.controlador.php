<?php

	class ControladorBloques{

		/*=====================================================
		=            REGISTRAR BLOQUE                        =
		=====================================================*/
		public static function ctrRegistrarBloque(){

			if (isset($_POST["nombre_bloque_registro"])) {
				
				if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/', $_POST["nombre_bloque_registro"])) {
					
					//Nombre de la tabla de la bd
					$tabla = "bloques";

					$datos_bloque = $_POST["nombre_bloque_registro"];

					$respuesta = ModeloBloques::mdlRegistrarBloque($tabla, $datos_bloque);

					if($respuesta == "ok"){

						echo'<script>

						swal({
							  type: "success",
							  title: "El Bloque ha sido guardada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "index.php?action=admin-bloques";

										}
									})

						</script>';

					}

				}else{

					echo'<script>

						swal({
						  type: "error",
						  title: "El bloque no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index.php?action=admin-bloques";

							}
						})

			  			</script>';
				}
			}
		}
		/*=====  End of REGISTRAR TIPO DE DISPOSITIVO  ======*/

		/*=======================================
		=            MOSTRAR BLOQUES            =
		=======================================*/
		public static function ctrMostrarBloques($item, $valor){

			//tabla de la bd
			$tabla = "bloques";

			$respuesta = ModeloBloques::mdlMostrarBloques($tabla, $item, $valor);
			return $respuesta;
		}
		/*=====  End of MOSTRAR BLOQUES  ======*/

		/*===============================================
		=            EDITAR BLOQUE          =
		===============================================*/
		public static function ctrEditarBloque(){

			if (isset($_POST["nombre_bloque_editar"])) {
				
				if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre_bloque_editar"])){

					//Nombre de la tabla de la bd
					$tabla = "bloques";

					$datos_bloque = array('id_bloque' => $_POST["id_bloque_actual"], 
				                          'bloque_nombre_editar' => $_POST["nombre_bloque_editar"]);
					

					$respuesta = ModeloBloques::mdlEditarBloque($tabla, $datos_bloque);

					if($respuesta == "ok"){

						echo'<script>

						swal({
							  type: "success",
							  title: "El Bloque ha sido actualizado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "index.php?action=admin-bloques";

										}
									})

						</script>';

					}
				}else{

					echo'<script>

						swal({
						  type: "error",
						  title: "El Bloque no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index.php?action=admin-bloques";

							}
						})

			  			</script>';
				}
			}
		}
		/*=====  End of EDITAR BLOQUES ======*/

		/*========================================
		=     ELIMINAR BLOQUE       =
		========================================*/
		public static function ctrEliminarBloque(){

			if (isset($_GET["id-bloque"])) {
				
				//Nombre de la tabla de la bd
				$tabla = "bloques";
				$datos_bloque = $_GET["id-bloque"];

				$respuesta = ModeloBloques::mdlEliminarBloque($tabla, $datos_bloque);

				if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Bloque ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "index.php?action=admin-bloques";

								}
							})

				</script>';

				}
			}
		}
		/*=====  End of ELIMINAR BLOQUE      ======*/	
	}