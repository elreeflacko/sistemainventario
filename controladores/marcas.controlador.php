<?php

	class ControladorMarcas{

		/*=====================================================
		=         REGISTRAR MARCA                        =
		=====================================================*/
		public static function ctrRegistrarMarca(){

			if (isset($_POST["nombre_marca_registro"])) {
				
				if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre_marca_registro"])) {
					
					//Nombre de la tabla de la bd
					$tabla = "marcas";

					$datos_marca = $_POST["nombre_marca_registro"];

					$respuesta = ModeloMarcas::mdlRegistrarMarca($tabla, $datos_marca);

					if($respuesta == "ok"){

						echo'<script>

						swal({
							  type: "success",
							  title: "La marca ha sido guardada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "index.php?action=admin-marcas";

										}
									})

						</script>';

					}

				}else{

					echo'<script>

						swal({
						  type: "error",
						  title: "La marca no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index.php?action=admin-marcas";

							}
						})

			  			</script>';
				}
			}
		}
		/*=====  End of REGISTRAR MARCA  ======*/

		/*=======================================
		=            MOSTRAR MARCAS            =
		=======================================*/
		public static function ctrMostrarMarcas($item, $valor){

			//tabla de la bd
			$tabla = "marcas";

			$respuesta = ModeloMarcas::mdlMostrarMarcas($tabla, $item, $valor);
			return $respuesta;
		}
		/*=====  End of MOSTRAR MARCAS  ======*/

		/*===============================================
		=            EDITAR MARCA          =
		===============================================*/
		public static function ctrEditarMarca(){

			if (isset($_POST["nombre_marca_editar"])) {
				
				if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre_marca_editar"])){

					//Nombre de la tabla de la bd
					$tabla = "marcas";

					$datos_marca = array('id_marca' => $_POST["id_marca_actual"], 
				                          'marca_nombre_editar' => $_POST["nombre_marca_editar"]);
					

					$respuesta = ModeloMarcas::mdlEditarMarca($tabla, $datos_marca);

					if($respuesta == "ok"){

						echo'<script>

						swal({
							  type: "success",
							  title: "La marca ha sido actualizado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "index.php?action=admin-marcas";

										}
									})

						</script>';

					}
				}else{

					echo'<script>

						swal({
						  type: "error",
						  title: "La marca no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index.php?action=admin-marcas";

							}
						})

			  			</script>';
				}
			}
		}
		/*=====  End of EDITAR MARCAS ======*/

		/*========================================
		=       ELIMINAR MARCA       =
		========================================*/
		public static function ctrEliminarMarca(){

			if (isset($_GET["id-marca"])) {
				
				//Nombre de la tabla de la bd
				$tabla = "marcas";
				$datos_marca = $_GET["id-marca"];

				$respuesta = ModeloMarcas::mdlEliminarMarca($tabla, $datos_marca);

				if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La marca ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "index.php?action=admin-marcas";

								}
							})

				</script>';

				}
			}
		}
		/*=====  End of ELIMINAR MARCA      ======*/	
	}