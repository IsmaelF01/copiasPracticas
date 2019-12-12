<?php

spl_autoload_register(function ( $NombreClase ) {
    if (file_exists('../Modelo'. $NombreClase . '.php'))
        include_once('../Modelo'.$NombreClase . '.php');
  }
);

    class VistaDisco
    {

        static function imprimirDiscosPortada($unDisco) {
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

        static function imprimirDiscosAdmin($unDisco) {
            echo "<tbody>";
            echo "<tr>";
            echo "  <td>".$unDisco->getTitulo()."</td>";
            echo "  <td>".$unDisco->getEstilo()."</td>";
            echo "  <td>".$unDisco->getAutor()."</td>";
            echo "  <td>".$unDisco->getYear()."</td>";
            //Ver canciones
            echo "  <td>".$unDisco->getNcanciones();
            echo "      <a href='#' class='btn btn-success btn-icon-split'>";
            echo "      <span class='text'>Ver</span>";
            echo "      </a>";
            echo "  </td>";
            echo "  <td><img width='50' src='".$unDisco->getPortada()."'></td>";
            //Reseñas
            echo "  <td>";
            echo "      <a href='#' class='btn btn-primary btn-icon-split'>";
            echo "      <span class='text'>Ver</span>";
            echo "      </a>";
            echo "  </td>";
            //Acciones
            echo "  <td>";
            echo "      <a href='#' class='btn btn-warning btn-circle'>";
            echo "       <i class='fas fa-edit'></i>";
            echo "      </a>";
            echo "      <a href='#' class='btn btn-danger btn-circle'>";
            echo "       <i class='fas fa-trash'></i>";
            echo "      </a>";            
            echo "  </td>";
            
            echo "</tr>";
            echo "</tbody>";


            
        }



    }


?>