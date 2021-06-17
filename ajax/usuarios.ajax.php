<?php

	require_once "../controladores/usuarios.controlador.php";
	require_once "../modelos/usuarios.modelo.php";

	class AjaxUsuarios{

		/*=================================================
		=            EDITAR USUARIO                      =
		=================================================*/
		public $id_usuario;

		public function ajaxEditarUsuario(){

			$item = "usuario_id";
			$valor = $this->id_usuario;

			$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

			echo json_encode($respuesta);
		}

		/*=================================================
		=            ACTIVAR USUARIO                      =
		=================================================*/
		public $activar_usuario;
		public $activar_id;

		public function ajaxActivarUsuario(){

			$tabla = "usuarios";

			$item1  = "usuario_estado";
			$valor1 = $this->activar_usuario;

			$item2  = "usuario_id";
			$valor2 = $this->activar_id;

			$respuesta =  ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);
		}

		/*=====================================================
		=            REVISAR SI YA EXISTE EL EMAIL            =
		=====================================================*/
		public $validar_email;

		public function ajaxValidarEmail(){

			$item = "usuario_email";
			$valor = $this->validar_email;

			$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

			echo json_encode($respuesta);
		}
		/*=====  End of REVISAR SI YA EXISTE EL EMAIL  ======*/
		
	}

	/*=================================================
		=      OBJETO EDITAR USUARIO                  =
	=================================================*/
	if (isset($_POST["id_usuario"])) {
		
		$editar_usuario_ajax = new AjaxUsuarios();
		$editar_usuario_ajax -> id_usuario = $_POST["id_usuario"];
		$editar_usuario_ajax->ajaxEditarUsuario();
	}
	
	/*=================================================
		=      OBJETO ACTIVAR USUARIO                  =
	=================================================*/
	if (isset($_POST["activar_usuario"])) {
		
		$activar_usuario = new AjaxUsuarios();
		$activar_usuario-> activar_usuario = $_POST["activar_usuario"];
		$activar_usuario-> activar_id = $_POST["activar_id"];
		$activar_usuario-> ajaxActivarUsuario();
	}

	/*============================================
	=            OBJETO VALIDAR EMAIL            =
	============================================*/
	if (isset($_POST["validar_email"])) {
		
		$validar_email_ajax = new AjaxUsuarios();
		$validar_email_ajax-> validar_email = $_POST["validar_email"];
		$validar_email_ajax->  ajaxValidarEmail();
	}
	
	/*=====  End of OBJETO VALIDAR EMAIL  ======*/
	