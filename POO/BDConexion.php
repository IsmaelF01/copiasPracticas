<?php

class BDConexion {

		private $MySQL_host;
		private $MySQL_user;
		private $MySQL_password;
		private $conexion;

		/* Constructor de la clase, pasamos parámetros de creación */
		function __construct($basededatos,$host="localhost",$user="usuario",$password="iesjrs20") {
		    $this->MySQL_host = $host;
    	    $this->MySQL_user = $user;
        	$this->MySQL_password = $password;

        	$this->conexion = new mysqli($this->MySQL_host,$this->MySQL_user,$this->MySQL_password, $basededatos);

	        if ($this->conexion->connect_error) 
            	die("No ha podido realizarse la conexión");

		}

		/* GET y SET */
		public function getConexion() {
			return $this->conexion;
		}

		public function getHost() {
			return $this->MySQL_host;
		}

		public function getUser() {
			return $this->MySQL_user;
		}

		public function cerrar_conexion() {
			$this->conexion->close();
		}




		/* Destructor */
		function __destruct() {
			//Si la conexión sigue abierta, pues la cierro
			if ($this->conexion->ping())
				$this->conexion->close();
		}

}


	/* PRUEBAS */
	$BDconexion = new BDConexion("2daw");
	$resultado = $BDconexion->getConexion()->query("SELECT COUNT(*) as total FROM peliculas");
	$fila = $resultado->fetch_assoc();
	echo $fila['total'];	

?>