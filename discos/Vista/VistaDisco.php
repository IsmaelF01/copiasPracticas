<?php

spl_autoload_register(function ( $NombreClase ) {
    if (file_exists('../Modelo'. $NombreClase . '.php'))
        include_once('../Modelo'.$NombreClase . '.php');
  }
);

    class VistaDisco
    {
        //Métodos front-end
        ///////////////////////////////////////////////////////
        static function imprimirDiscosPortada($unDisco) {
            echo "<li class='mix ".$unDisco->getEstilo()."'>";
            echo "<a class='disco' href='ver_detalle.php?id=".$unDisco->id_disco."'>";
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

        static function imprimirDisco($unDisco) {

            echo "<div class='media'>";
            echo "<img width='400' src='".$unDisco->getPortada()."' class='align-self-start mr-3' alt='...'>";
            echo "<div class='media-body'>";
            echo "  <h2 class='mt-0'>".$unDisco->getTitulo()."</h2>";
            echo "  <h4>".$unDisco->getAutor()."</h4>";
            echo "  <p>CANCIONES (".$unDisco->getNcanciones().")</p>";
            echo "</div>";
            echo "</div>";

        }



        //Métodos back-end
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
            echo "      <a href='controller.php?action=delete&id={$unDisco->id_disco}' class='btn btn-danger btn-circle'>";
            echo "       <i class='fas fa-trash'></i>";
            echo "      </a>";            
            echo "  </td>";
            
            echo "</tr>";
            echo "</tbody>";


            
        }



    }


?>