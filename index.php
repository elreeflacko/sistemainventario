<?php

	require_once "controladores/plantilla.controlador.php";
	require_once "controladores/usuarios.controlador.php";
	require_once "controladores/bloques.controlador.php";
	require_once "controladores/lugares.controlador.php";
	require_once "controladores/tipos-dispositivos.controlador.php";
	require_once "controladores/marcas.controlador.php";
	require_once "controladores/modelos.controlador.php";
	require_once "controladores/secciones.controlador.php";
	require_once "controladores/personas.controlador.php";
	require_once "controladores/dispositivos.controlador.php";
	require_once "controladores/personas-dos.controlador.php";
	require_once "controladores/accesorios.controlador.php";

	require_once "modelos/usuarios.modelo.php";
	require_once "modelos/bloques.modelo.php";
	require_once "modelos/lugares.modelo.php";
	require_once "modelos/tipos-dispositivos.modelo.php";
	require_once "modelos/marcas.modelo.php";
	require_once "modelos/modelos.modelo.php";
	require_once "modelos/secciones.modelo.php";
	require_once "modelos/personas.modelo.php";
	require_once "modelos/dispositivos.modelo.php";
	require_once "modelos/accesorios.modelo.php";

	$plantilla = new ControladorPlantilla();
	$plantilla->ctrPlantilla();

