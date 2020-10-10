<?php

	class ConexionDos{

		public static function conectarDos(){

			$link = new PDO("sqlsrv:Server=NW_MERIDIAN\CB_SQLEXPRESS_08,1521;Database=CB_HelpDesk","prgInvict","CamilaJorge198686");
			//$link = new PDO("mysql:host=localhost;dbname=dbo","root","");
			$link->exec("set names utf8");
			return $link;
		}
	}