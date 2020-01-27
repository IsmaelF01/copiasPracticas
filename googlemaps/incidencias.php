<?php

  	header('Content-Type: application/json');

  	//Conexión base de datos para obtener las incidencias
	try{

		$connection = "mysql:host=localhost;dbname=2daw;charset=utf8mb4";
		$options = [
		    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		    PDO::ATTR_EMULATE_PREPARES   => false,
		    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",                
		];
		$pdo = new PDO($connection, "usuario", "iesjrs20", $options);

		$stmt = $pdo->prepare("SELECT * FROM incidencias");
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();

		$direcciones = array();
		while ($row = $stmt->fetch()){
			$direccion = array('latitud' => $row["latitud"], 
							   'longitud' => $row["longitud"],
							   'descripcion' => $row["descripcion"],
							   'label' => $row["label"]);
			$direcciones[] = $direccion;
		}		

	} catch(PDOException $e){
		print_r('Error connection: ' . $e->getMessage());
	} 

  	echo json_encode($direcciones);


?>