<?php

	class ControladorUsuarios{

		/*=====================================================
		=            Ingreso de usuario al sistema            =
		=====================================================*/
		public static function ctrIngresoUsuario(){

			if (isset($_POST["email_usuario_ingreso"])){
				
				if (preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $_POST["email_usuario_ingreso"])) {

					$pwd_encriptar = crypt($_POST["pwd_usuario_ingreso"], '$2a$07$usesomesillystringforsalt$');
					
					$tabla = "usuarios";
					$item  = "usuario_email";
					$valor = $_POST["email_usuario_ingreso"];

					$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
					
					if ($respuesta["usuario_email"] == $_POST["email_usuario_ingreso"] && $respuesta["usuario_password"] == $pwd_encriptar) {

						if ($respuesta["usuario_estado"] == 1) {
							
							$_SESSION["usuario_valido"] = true;
							$_SESSION["usuario_id"]     = $respuesta["usuario_id"];
							$_SESSION["usuario_nombre"] = $respuesta["usuario_nombre"];
							$_SESSION["usuario_email"]  = $respuesta["usuario_email"];
							$_SESSION["usuario_perfil"] = $respuesta["usuario_perfil"];

							/*==================================================================
							=            CAPTURAR FECHA PARA SABER EL ULTIMO LOGIN            =
							==================================================================*/
							date_default_timezone_set('America/Bogota');

							$fecha = date('Y-m-d');
							$hora = date('H:i:s');

							$fecha_actual = $fecha.' '.$hora;

							/*=====  End of CAPTURAR FECHA PARA SABER EL ULTIMO LOGIN  ======*/
							
							$item1 = 'usuario_ultimoLogin';
							$valor1 = $fecha_actual;

							$item2 = "usuario_id";
							$valor2 = $respuesta["usuario_id"];

							$usuario_ultimo_login = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

							if ($usuario_ultimo_login == "ok") {
								
								echo '<script>window.location="index.php?action=inicio"</script>';
							}

						}else{

							echo '<br><div class="alert alert-danger">El usuario aún no esta activado</div>';
						}

					}else{

						echo '<br><div class="alert alert-danger">Error al ingresar a la aplicación</div>';
					}
				}
			}
		}
		/*=====  End of Ingreso de usuario al sistema  ======*/

		/*========================================
		=            Mostrar usuarios            =
		========================================*/
		public static function ctrMostrarUsuarios($item, $valor){ 

			$tabla = "usuarios";

			$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
			return $respuesta;
		}
		/*=====  End of Mostrar usuarios  ======*/
		
		/*=========================================
		=            Registrar usuario            =
		=========================================*/
		public static function ctrRegistrarUsuario(){

			if (isset($_POST["nombre_usuario_registro"])){

				if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre_usuario_registro"]) && 
					preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $_POST["email_usuario_registro"])) {

					//nombre de la tabla de la bd
					$tabla = "usuarios";
					
					//encriptamos la clave
					$pwd_encriptar = crypt($_POST["pwd_usuario_registro"], '$2a$07$usesomesillystringforsalt$');
					
					//llenamos el array con los datos de usuario
					$datos_usuario = array('nombre_usuario_registro' => $_POST["nombre_usuario_registro"],
										   'email_usuario_registro'  => $_POST["email_usuario_registro"],
										   'pwd_usuario_registro'    => $pwd_encriptar,
										   'perfil_usuario_registro' => $_POST["perfil_usuario_registro"]);

					$respuesta = ModeloUsuarios::mdlRegistrarUsuario($tabla, $datos_usuario);

					if ($respuesta == "ok") {
						echo '<script>window.location="index.php?action=admin-usuarios"</script>';
					
					}
					elseif ($respuesta == "error") {
						echo '<div class="alert alert-danger">El usuario no se ha creado correctamente.</div>';					
					}
						
				}else{

					echo '<div class="alert alert-danger">Hay uno ó varios campos incorrectos en el formulario.</div>';
				}
			}
		}
		/*=====  End of Registrar usuario  ======*/

		/*======================================
		=            EDITAR USUARIO            =
		======================================*/
		public static function ctrEditarUsuario(){

			if (isset($_POST["nombre_usuario_editar"])) {
			
				if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre_usuario_editar"]) && 
					preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $_POST["email_usuario_editar"])){

					//nombre de la tabla de la bd
					$tabla = "usuarios";

					//Revisamos si la variable POST editar password esta vacia
					if ($_POST["pwd_usuario_editar"] != "") {
						
						//encriptamos la clave
						$pwd_encriptar = crypt($_POST["pwd_usuario_editar"], '$2a$07$usesomesillystringforsalt$');

					}else{

						$pwd_encriptar = $_POST["pwd_usuario_actual"];
					}

					//llenamos el array con los datos de usuario
					$datos_usuario = array('id_usuario'            => $_POST["id_usuario_actual"],
										   'nombre_usuario_editar' => $_POST["nombre_usuario_editar"],
										   'email_usuario_editar'  => $_POST["email_usuario_editar"],
										   'pwd_usuario_editar'    => $pwd_encriptar,
										   'perfil_usuario_editar' => $_POST["perfil_usuario_editar"]);

					$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos_usuario);

					if ($respuesta == "ok") {
						
						echo '<script>window.location="index.php?action=admin-usuarios"</script>';

					}elseif($respuesta == "error"){

						echo '<div class="alert alert-danger">El usuario no se ha actualizado correctamente.</div>';	
					}

				}else{

					echo '<div class="alert alert-danger">Hay uno ó varios campos incorrectos en el formulario.</div>';
				}
			}
		}
		/*=====  End of EDITAR USUARIO  ======*/

		/*========================================
		=            ELIMINAR USUARIO            =
		========================================*/
		public static function ctrEliminarUsuario(){

			if (isset($_GET["id-usuario"])) {
				
				$tabla = "usuarios";
				$datos_usuario = $_GET["id-usuario"];

				$respuesta = ModeloUsuarios::mdlEliminarUsuario($tabla, $datos_usuario);

				if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "index.php?action=admin-usuarios";

								}
							})

				</script>';

				}
			}
		}
		/*=====  End of ELIMINAR USUARIO  ======*/
		
	}