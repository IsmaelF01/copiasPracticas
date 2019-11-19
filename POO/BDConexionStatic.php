<?php

class BDConexionStatic {


		private static $conexion;

		/* Constructor de la clase, pasamos parámetros de creación */
		static function conectar($basededatos,$host="localhost",$user="usuario",$password="iesjrs20") {
        	self::$conexion = new mysqli($host,$user,$password, $basededatos);

	        if (self::$conexion->connect_error) 
            	die("No ha podido realizarse la conexión");

            return self::$conexion;

		}

		/* GET y SET */
		public static function getConexion() {
			return self::$conexion;
		}

		public static function cerrar_conexion() {
			self::$conexion->close();
		}

}


	/* PRUEBAS */
	$conexion = BDConexionStatic::conectar("2daw");
	$resultado = $conexion->query("SELECT COUNT(*) as total FROM peliculas");
	$fila = $resultado->fetch_assoc();
	echo $fila['total'];	
	BDConexionStatic::cerrar_conexion();

?>