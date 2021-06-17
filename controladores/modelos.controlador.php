<?php

	class ControladorModelos{

		/*=====================================================
		=            REGISTRAR MODELO                       =
		=====================================================*/
		public static function ctrRegistrarModelo(){

			if (isset($_POST["nombre_modelo_registro"])) {
				
				if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\-0-9\+ ]+$/', $_POST["nombre_modelo_registro"])) {
					
					//Nombre de la tabla de la bd
					$tabla = "modelos";

					$datos_modelo = array('id_tipo_dispositivo'    => $_POST["combobox_tipoDispositivo_registro"],
										  'id_marca'               => $_POST["combobox_marca_registro"],
										  'nombre_modelo_registro' => $_POST["nombre_modelo_registro"]);

					$respuesta = ModeloModelos::mdlRegistrarModelo($tabla, $datos_modelo);
 
					if($respuesta == "ok"){

						echo'<script>

						swal({
							  type: "success",
							  title: "El modelo ha sido guardada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "index.php?action=admin-modelos";

										}
									})

						</script>';

					}

				}else{

					echo'<script>

						swal({
						  type: "error",
						  title: "El modelo no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index.php?action=admin-modelos";

							}
						})

			  			</script>';
				}
			}
		}
		/*=====  End of REGISTRAR MODELO  ======*/

		/*=======================================
		=            MOSTRAR MODELOS            =
		=======================================*/
		public static function ctrMostrarModelos($item, $valor){

			//tabla de la bd
			$tabla = "modelos";

			$respuesta = ModeloModelos::mdlMostrarModelos($tabla, $item, $valor);
			return $respuesta;
		}
		/*=====  End of MOSTRAR MODELOS  ======*/

		/*======================================
		=            EDITAR MODELO            =
		======================================*/
		public static function ctrEditarModelo(){

			if (isset($_POST["nombre_modelo_editar"])) {
			
				if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\-0-9 ]+$/', $_POST["nombre_modelo_editar"])){

					//nombre de la tabla de la bd
					$tabla = "modelos";

					//llenamos el array con los datos del modelo
					$datos_modelo = array('id_modelo'                  => $_POST["id_modelo_actual"],
										  'nombre_modelo_editar'       => $_POST["nombre_modelo_editar"],
										  'id_tipo_dispositivo_editar' => $_POST["combobox_tipoDispositivo_editar"],
										  'id_marca_editar'            => $_POST["combobox_marca_editar"]);

					$respuesta = ModeloModelos::mdlEditarModelo($tabla, $datos_modelo);

					if ($respuesta == "ok") {
						
						echo'<script>

						swal({
							  type: "success",
							  title: "El modelo ha sido actualizado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "index.php?action=admin-modelos";

										}
									})

						</script>';
					}

				}else{

						echo'<script>

							swal({
						  		type: "error",
						  		title: "El modelo no puede ir vacía o llevar caracteres especiales!",
						  		showConfirmButton: true,
						  		confirmButtonText: "Cerrar"
						  		}).then(function(result){
									if (result.value) {

									window.location = "index.php?action=admin-modelos";

							}
						})

			  			</script>';	
					 }
				
			}
		}
		/*=====  End of EDITAR MODELO  ======*/

		/*========================================
		=            ELIMINAR MODELO            =
		========================================*/
		public static function ctrEliminarModelo(){

			if (isset($_GET["id-modelo"])) {
				
				$tabla = "modelos";
				$datos_modelo = $_GET["id-modelo"];

				$respuesta = ModeloModelos::mdlEliminarModelo($tabla, $datos_modelo);

				if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El modelo ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "index.php?action=admin-modelos";

								}
							})

				</script>';

				}
			}
		}
		/*=====  End of ELIMINAR MODELO  ======*/

		/*======================================
		=            CARGAR MODELOS            =
		======================================*/
		public static function ctrCargarModelos($item1, $item2, $valor1, $valor2){

			//tabla de la bd
			$tabla = "modelos";

			$respuesta = ModeloModelos::mdlCargarModelos($tabla, $item1, $item2, $valor1, $valor2);
			return $respuesta;
		}
		/*=====  End of CARGAR MODELOS  ======*/
		
	}