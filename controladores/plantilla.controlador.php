<?php

	class ControladorPlantilla{

		public static function ctrPlantilla(){

			include "vistas/plantilla.php";
		}

		public static function ctrRuta(){

			return "http://localhost/sistemainventario/";
		}

		public static function ctrRutaMemo(){

			return "http://localhost/sistemainventario/extensiones/TCPDF-main/examples/memo.php?dispoId=";
		}
	}