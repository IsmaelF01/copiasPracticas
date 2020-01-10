<?php
	session_start();
	
	spl_autoload_register(function ( $NombreClase ) {
		if (file_exists("./Modelos/". $NombreClase . '.php'))
			include_once("./Modelos/". $NombreClase . '.php');
		if (file_exists("./Vistas/". $NombreClase . '.php'))
			include_once("./Vistas/". $NombreClase . '.php');        
	} );


	if (isset($_GET['accion'])) {
		//Mostrar las mejores películas según The Movie DB
		if ($_GET['accion'] == 'top') {
			$_SESSION['peliculas']="top";
			topMovies(1); //Cada vez que pincho en top empieza en la página 1
		}
		//Mostrar películas en cartelera
		if ($_GET['accion'] == 'cartelera') {
			$_SESSION['peliculas']="cartelera";
			onAirMovies(1); //Cada vez que pincho en cartelera empieza en la página 1
		}	
		//PAGINADOR 
		if ($_GET['accion'] == 'paginador') {	
			if ($_SESSION['peliculas'] == "top")
				topMovies($_GET['pag']);
			if ($_SESSION['peliculas'] == "cartelera")
				onAirMovies($_GET['pag']);
		}	
				
	}

	//Películas top
	function topMovies($pagina) {
		$uri = 'https://api.themoviedb.org/3/movie/top_rated?sort_by=popularity.desc&api_key=d0c9b6cd659d5b9a74f988e28be7a2f5&language=es-ES&page='.$pagina;
		$reqPrefs['http']['method'] = 'GET';
		$reqPrefs['http']['header'] = 'X-Auth-Token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkMGM5YjZjZDY1OWQ1YjlhNzRmOTg4ZTI4YmU3YTJmNSIsInN1YiI6IjVjNzQzNTM4OTI1MTQxMTllMWIxZDM0NiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.6o-cHWQTVoi2ozp0aXk43mvBLB1B3WjucEtKNx7q17o';
		$stream_context = stream_context_create($reqPrefs);
		$json = file_get_contents($uri, false, $stream_context);
		//Llamo a la vista para que con el Json de la API genere Html. Lo paso a Ajax
		echo VistaPeliculas::render($json,$pagina);
	}

	//Películas top
	function onAirMovies($pagina) {
		$uri = 'https://api.themoviedb.org/3/movie/upcoming?api_key=d0c9b6cd659d5b9a74f988e28be7a2f5&language=es-ES&page='.$pagina;
		$reqPrefs['http']['method'] = 'GET';
		$reqPrefs['http']['header'] = 'X-Auth-Token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkMGM5YjZjZDY1OWQ1YjlhNzRmOTg4ZTI4YmU3YTJmNSIsInN1YiI6IjVjNzQzNTM4OTI1MTQxMTllMWIxZDM0NiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.6o-cHWQTVoi2ozp0aXk43mvBLB1B3WjucEtKNx7q17o';
		$stream_context = stream_context_create($reqPrefs);
		$json = file_get_contents($uri, false, $stream_context);
		//Llamo a la vista para que con el Json de la API genere Html. Lo paso a Ajax
		echo VistaPeliculas::render($json,$pagina);
	}

?>
