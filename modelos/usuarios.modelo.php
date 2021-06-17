<?php

	require_once "conexion.php";

	class ModeloUsuarios{

		/*========================================
		=            Mostrar usuarios            =
		========================================*/
		public static function mdlMostrarUsuarios($tabla, $item, $valor){

			if ($item != null) {
				
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
				$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
				$stmt->execute();
				return $stmt->fetch();
			
			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
				$stmt->execute();
				return $stmt->fetchAll();
			}
			
			$stmt->close();
			$stmt = null;
		}
		/*=====  End of Mostrar usuarios  ======*/

		/*=========================================
		=            Registrar usuario            =
		=========================================*/
		public static function mdlRegistrarUsuario($tabla, $datos_usuario){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario_nombre, usuario_email, usuario_password, usuario_perfil) VALUES(:usuario_nombre, :usuario_email, :usuario_password, :usuario_perfil)");

			$stmt->bindParam(":usuario_nombre",   $datos_usuario["nombre_usuario_registro"], PDO::PARAM_STR);
			$stmt->bindParam(":usuario_email", 	  $datos_usuario["email_usuario_registro"],  PDO::PARAM_STR);
			$stmt->bindParam(":usuario_password", $datos_usuario["pwd_usuario_registro"],    PDO::PARAM_STR);
			$stmt->bindParam(":usuario_perfil",   $datos_usuario["perfil_usuario_registro"], PDO::PARAM_STR);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			$stmt->close();
			$stmt = null;
		}
		/*=====  End of Registrar usuario  ======*/

		/*======================================
		=            EDITAR USUARIO            =
		======================================*/
		public static function mdlEditarUsuario($tabla, $datos_usuario){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario_nombre   = :usuario_nombre_editar, 
				                                                     usuario_email    = :usuario_email_editar,
				                                                     usuario_password = :usuario_password_editar,  
				                                                     usuario_perfil   = :usuario_perfil_editar 
				                                                     WHERE usuario_id = :id_usuario");

			$stmt->bindParam(":id_usuario",              $datos_usuario["id_usuario"], PDO::PARAM_INT);
			$stmt->bindParam(":usuario_nombre_editar",   $datos_usuario["nombre_usuario_editar"], PDO::PARAM_STR);
			$stmt->bindParam(":usuario_email_editar", 	 $datos_usuario["email_usuario_editar"],  PDO::PARAM_STR);
			$stmt->bindParam(":usuario_password_editar", $datos_usuario["pwd_usuario_editar"],    PDO::PARAM_STR);
			$stmt->bindParam(":usuario_perfil_editar",   $datos_usuario["perfil_usuario_editar"], PDO::PARAM_STR);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			$stmt->close();
			$stmt = null;
		}
		
		
		/*=====  End of EDITAR USUARIO  ======*/

		/*======================================
		=            ACTUALIZAR USUARIO        =
		======================================*/
		public static function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1  WHERE $item2 = :$item2");

			$stmt->bindParam(":".$item1, $valor1, PDO::PARAM_STR);
			$stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			$stmt->close();
			$stmt = null;
		}
		/*=====  End of actualizar USUARIO  ======*/

		/*========================================
		=            ELIMINAR USUARIO            =
		========================================*/
		
		public static function mdlEliminarUsuario($tabla, $datos_usuario){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE usuario_id = :usuario_id");

			$stmt->bindParam(":usuario_id", $datos_usuario, PDO::PARAM_INT);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}
			$stmt->close();
			$stmt = null;
		}
		
		/*=====  End of ELIMINAR USUARIO  ======*/
		
		
	}