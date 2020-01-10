<?php

class VistaPeliculas
{

        static function render($peliculas_json) {
            $cadena = "";
            $pelis = json_decode($peliculas_json);
            $cont = 0;
            foreach($pelis->results as $pelicula) {
                if (isset($pelicula->poster_path))  {
                    //Inicio carta
                    $cadena .= "<div class='card mt-3 mb-3 col-sm-4 elegant-color text-center' style='width: 15rem;'>";
                    //Imagen carta
                    $cadena .= "<div class='view overlay'>";
                    $cadena .= "<img class='card-img-top' src='https://image.tmdb.org/t/p/w600_and_h900_bestv2" . $pelicula->poster_path . "' alt='Card image cap'>";
                    $cadena .= "<a href='#!'><div class='mask rgba-white-slight'></div></a>";
                    $cadena .= "</div>";
                    //Fin imagen carta
                    //Inicio card-body
                    $cadena .= "<div class='card-body'";
                    $cadena .= "<h2 class='card-title'>" . $pelicula->title . " <br>Nota media: " . $pelicula->vote_average . "</h2>";
                    $cadena .= "<hr class='white'>";  
                    $cadena .= "</div>";
                    //Fin card-body
                    $cadena .= "</div>";
                    //Fin carta                  
                    
                }
            }

            return $cadena;

        }

}


?>