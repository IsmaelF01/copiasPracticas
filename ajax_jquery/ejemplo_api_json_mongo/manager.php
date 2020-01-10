<?php
	
	spl_autoload_register(function ( $NombreClase ) {
		if (file_exists("./Modelos/". $NombreClase . '.php'))
			include_once("./Modelos/". $NombreClase . '.php');
		if (file_exists("./Vistas/". $NombreClase . '.php'))
			include_once("./Vistas/". $NombreClase . '.php');        
	} );


	if (isset($_GET['accion'])) {
		//Mostrar las mejores películas según The Movie DB
		if ($_GET['accion'] == 'top') {
			topMovies();
		}
		if ($_GET['accion'] == 'cartelera') {
			onAirMovies();
		}		
	}

	//Películas top
	function topMovies() {
		$uri = 'https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=d0c9b6cd659d5b9a74f988e28be7a2f5&language=es-ES&page=1';
		$reqPrefs['http']['method'] = 'GET';
		$reqPrefs['http']['header'] = 'X-Auth-Token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkMGM5YjZjZDY1OWQ1YjlhNzRmOTg4ZTI4YmU3YTJmNSIsInN1YiI6IjVjNzQzNTM4OTI1MTQxMTllMWIxZDM0NiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.6o-cHWQTVoi2ozp0aXk43mvBLB1B3WjucEtKNx7q17o';
		$stream_context = stream_context_create($reqPrefs);
		$json = file_get_contents($uri, false, $stream_context);
		//Llamo a la vista para que con el Json de la API genere Html. Lo paso a Ajax
		echo VistaPeliculas::render($json);
	}

	//Películas top
	function onAirMovies() {
		$uri = 'https://api.themoviedb.org/3/discover/movie?primary_release_date.gte=2019-09-15&primary_release_date.lte=2020-01-20&api_key=d0c9b6cd659d5b9a74f988e28be7a2f5&language=es-ES&page=1';
		$reqPrefs['http']['method'] = 'GET';
		$reqPrefs['http']['header'] = 'X-Auth-Token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkMGM5YjZjZDY1OWQ1YjlhNzRmOTg4ZTI4YmU3YTJmNSIsInN1YiI6IjVjNzQzNTM4OTI1MTQxMTllMWIxZDM0NiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.6o-cHWQTVoi2ozp0aXk43mvBLB1B3WjucEtKNx7q17o';
		$stream_context = stream_context_create($reqPrefs);
		$json = file_get_contents($uri, false, $stream_context);
		//Llamo a la vista para que con el Json de la API genere Html. Lo paso a Ajax
		echo VistaPeliculas::render($json);
	}

?>
