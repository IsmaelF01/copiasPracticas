<?php

spl_autoload_register(function ( $NombreClase ) {
    if (file_exists("../Modelo/". $NombreClase . '.php'))
        include_once("../Modelo/". $NombreClase . '.php');
} );

    class VistaIncidencia
    {

        static function renderIncidencias($incidencias) {

            echo "<table class='table table-dark'>";
            echo "    <thead>";
            echo "        <tr>";
            echo "        <th scope='col'>Nombre</th>";
            echo "        <th scope='col'>Descripcion</th>";
            echo "        <th scope='col'>Fecha</th>";
            echo "        </tr>";
            echo "    </thead>";
            echo "    <tbody>";

            foreach($incidencias as $incidencia) {
                echo "        <tr>";
                echo "        <td>".$incidencia->getNombre()."</td>"; //." id=".$incidencia->id_incidencia."</td>";
                echo "        <td>".$incidencia->getDescripcion()."</td>";
                echo "        <td>".$incidencia->getFecha()."</td>";
                echo "        </tr>";
            }

            echo "    </tbody>";
            echo "  </table>";

        }

    }


?>