<?php

	class ControladorAccesorios{

		/*===========================================
		=            REGISTRAR ACCESORIO            =
		===========================================*/
		public static function ctrRegistrarAccesorio(){
			if (isset($_POST["activo_accesorio_registro"]) AND isset($_POST["descripcion_accesorio_registro"])) {
				
				//Revisamos y limpiamos el campo activo
				$activo_accesorio = $_POST["activo_accesorio_registro"];
				$activo_accesorio = htmlspecialchars($activo_accesorio);
				$activo_accesorio = trim($activo_accesorio);
				$activo_accesorio = filter_var($activo_accesorio, FILTER_SANITIZE_STRING);

				//Revisamos la descripcion del accesorio
				$descripcion_accesorio = $_POST["descripcion_accesorio_registro"];
				$descripcion_accesorio = htmlspecialchars($descripcion_accesorio);
				$descripcion_accesorio = trim($descripcion_accesorio);
				$descripcion_accesorio = filter_var($descripcion_accesorio, FILTER_SANITIZE_STRING);

				//Revisamos si la variable $_POST["serial_accesorio_registro"] existe
				$serial_accesorio = (empty($_POST["serial_accesorio_registro"])) ? "000000" : $_POST['serial_accesorio_registro'];

				$estado_accesorio = (empty($_POST["combobox_estado_registrar"])) ? "no-asignado" : $_POST['combobox_estado_registrar'];

				$tabla  = "accesorios";

				$datos_accesorio = array ('accesorio_activo' => $activo_accesorio,
										'accesorio_serial' => $serial_accesorio,
									    'accesorio_descripcion' => $descripcion_accesorio,
									    'accesorio_comentario' => $_POST["comentario_accesorio_registro"],
									    'accesorio_estado' => $estado_accesorio,      
									    'accesorio_tipo_dispositivo_id' => $_POST["combobox_tipoDispositivo_registrar"]
									);

				$respuesta = ModeloAccesorios::mdlRegistrarAccesorio($tabla, $datos_accesorio);

				if($respuesta == "ok"){

							echo'<script>

							swal({
							  type: "success",
							  title: "El accesorio ha sido guardada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "index.php?action=admin-accesorios";

										}
									})

							</script>';

						}else{

							echo'<script>

							swal({
						  		type: "error",
						  		title: "El accesorio no ha sido guardado correctamente!",
						  		showConfirmButton: true,
						  		confirmButtonText: "Cerrar"
						  	}).then(function(result){
								if (result.value) {

								window.location = "index.php?action=admin-accesorios";

								}
							})

			  				</script>';
						}
			}
		}
		/*=====  End of REGISTRAR ACCESORIO  ======*/

		/*==========================================
		=            MOSTRAR ACCESORIOS            =
		==========================================*/
		public static function ctrMostrarAccesorios($item, $valor){

			//tabla de la bd
			$tabla = "accesorios";

			$respuesta = ModeloAccesorios::mdlMostrarAccesorios($tabla, $item, $valor);
			return $respuesta;
		}
		/*=====  End of MOSTRAR ACCESORIOS  ======*/	
	}