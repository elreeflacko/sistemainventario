<?php

	class Conexion{

		public static function conectar(){

			//$link = new PDO("mysql:host=192.168.100.10:3307;dbname=sistemainventario","root","lsdick7381");
			$link = new PDO("mysql:host=localhost;dbname=sistemainventario","root","");
			$link->exec("set names utf8");
			return $link;
		}
	}