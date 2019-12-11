<?php

spl_autoload_register(function ( $NombreClase ) {
    if (file_exists('../Modelo'. $NombreClase . '.php'))
        include_once('../Modelo'.$NombreClase . '.php');
  }
);

    class VistaDisco
    {

        static function imprimirDiscoPortada($unDisco) {
            echo "<li class='mix ".$unDisco->getEstilo()."'>";
            echo "<a class='portfolio-popup' href='".$unDisco->getPortada()."'>";
            echo "  <img src='".$unDisco->getPortada()."' alt=''>";
            echo "  <div class='item-overly'>";
            echo "    <div class='position-center'>";
            echo "      <h4>".$unDisco->getTitulo()."</h4>";
            echo "      <p>".$unDisco->getAutor()."</p>";
            echo "    </div>";
            echo "  </div>";
            echo "</a>";
            echo "</li>";
            
        }





    }


?>