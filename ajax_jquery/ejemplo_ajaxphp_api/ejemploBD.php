<?php
	spl_autoload_register( function( $NombreClase ) {
	    include_once($NombreClase . '.php');
	} );

	header("Content-Type: application/json; charset=UTF-8");

	//Por Post recibimos los datos para insertar en la BD
	if ($_POST) {
		//Si es POST mando a insertar en la base de datos lo que recibo
        //$objeto Decodificamos Javascript
        try {
			$objeto = json_decode($_POST["objeto"],false);
			echo BDBirra::insertar($objeto->nombre, $objeto->grados, $objeto->foto);
        } catch (Exception $e) {
        	echo $e->getMessage();
        }

       //Por Get recibo la acción a realizar, o mostrar las cervezas de la api o mis favoritas, o eliminar
       //Depende del parámetro accion 
	} else if (isset($_GET['accion'])) {
		//Si tengo que mostrar favoritos o mostrar las cervezas de la api

		//Mostrar las cervezas de la API, hay que llamarla
		if ($_GET['accion'] == "api") {
			// Si es GET llamo a la API y pido todas las cervezas, paginadas.		
			$pag = 4;
		    $uri = 'https://sandbox-api.brewerydb.com/v2/beers?p='.$pag.'&key=a1dc1446191ebea66072bac6e03a13f6';
		    $reqPrefs['http']['method'] = 'GET';
		    $reqPrefs['http']['header'] = 'X-Auth-Token: 7c112489898843e6b4949f49284587ed';
		    $stream_context = stream_context_create($reqPrefs);
		    $response = file_get_contents($uri, false, $stream_context);
		    echo $response;
		}	
		
		//Mostrar las cervezas favoritas de la BD
		if ($_GET['accion'] == "favoritos") {
			echo BDBirra::mostrar();
		}	

		//Mostrar las cervezas favoritas de la BD
		if ($_GET['accion'] == "eliminar") {
			echo BDBirra::eliminar($_GET['id']);
		}
	}
?>