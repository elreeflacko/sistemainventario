<?php

	class ControladorPlantilla{

		public static function ctrPlantilla(){

			include "vistas/plantilla.php";
		}

		public static function ctrRuta(){

			return "http://localhost/sistemainventario/";
			//return "https://milenio.colegiobolivar.edu.co/sistemainventario/";
		}

		public static function ctrRutaMemo(){

			return "http://localhost/sistemainventario/extensiones/TCPDF-main/examples/memo.php?dispoId=";
			//return "https://milenio.colegiobolivar.edu.co/sistemainventario/extensiones/TCPDF-main/examples/memo.php?dispoId=";

		}
	}