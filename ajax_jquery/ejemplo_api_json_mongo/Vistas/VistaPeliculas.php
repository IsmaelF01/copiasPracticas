<?php

class VistaPeliculas
{

        static function render($peliculas_json,$pagina,$final=0) {
            $cadena = "";
            $disabled_a = "";
            $pelis = json_decode($peliculas_json);
            
            //Paginador
            if ($pagina > 1)
                $anterior = $pagina - 1;
            else {
                $anterior = $pagina;
                $disabled_a = "disabled";
            }
            
            if ($final == 0)
                $siguiente = $pagina + 1;
            else
                $siguiente = $pagina;

            $cadena .= "<div class='row m-2 ml-3'>";
            $cadena .= "<button class='btn-xs' id='anterior' onclick='paginador(".$anterior.");'".$disabled_a.">&lt;</button><span class='mr-1 ml-1 mt-2 small'>".$pagina."</span>";
            $cadena .= "<button class='btn-xs' id='siguiente' onclick='paginador(".$siguiente.");'>&gt;</button>";        
            $cadena .= "</div>";

            $cadena .= "<div  class='row m-2'>";
            //Películas
            foreach($pelis->results as $pelicula) {
                if (isset($pelicula->poster_path))  {
                    //Inicio carta
                    $cadena .= "<div class='card mt-3 mb-3 col-md-3 elegant-color text-center' style='width: 17rem;'>";
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
                    $cadena .= "<button class='btn btn-outline-success my-2 my-sm-0' id='fav' type='submit' onclick='favoritas(".$pelicula->id.");'>Añadir Favoritas</button>";
                    $cadena .= "</div>";
                    //Fin card-body
                    $cadena .= "</div>";
                    //Fin carta                  
                    
                }
            }
            $cadena .= "</div>";

            return $cadena;

        }


        static function renderFavoritas($peliculas_json,$pagina,$final=0) {
            $cadena = "";
            $disabled_a = "";
            $disabled_s = "";

            //Paginador
            if ($pagina > 1)
                $anterior = $pagina - 1;
            else {
                $anterior = $pagina;
                $disabled_a = "disabled";
            }
            
            if ($final == 0)
                $siguiente = $pagina + 1;
            else {
                $siguiente = $pagina;
                $disabled_s = "disabled";
            }

            $cadena .= "<div class='row m-2 ml-3'>";
            $cadena .= "<button class='btn-xs' id='anterior' onclick='paginador(".$anterior.");' ".$disabled_a.">&lt;</button><span class='mr-1 ml-1 mt-2 small'>".$pagina."</span>";
            $cadena .= "<button class='btn-xs' id='siguiente' onclick='paginador(".$siguiente.");' ".$disabled_s.">&gt;</button>";
            $cadena .= "</div>";

            $cadena .= "<div  class='row m-2'>";
            //Películas
            foreach($peliculas_json as $pelicula) {
                if (isset($pelicula->poster_path))  {
                    //Inicio carta
                    $cadena .= "<div class='card mt-3 mb-3 col-md-3 elegant-color text-center' style='width: 17rem;'>";
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
                    $cadena .= "<button class='btn btn-outline-danger my-2 my-sm-0' id='fav' type='submit' onclick='eliminarDeFavoritas(".$pelicula->id.");'>Eliminar</button>";
                    $cadena .= "</div>";
                    //Fin card-body
                    $cadena .= "</div>";
                    //Fin carta                  
                    
                }
            }
            $cadena .= "</div>";

            return $cadena;

        }        

}


?>