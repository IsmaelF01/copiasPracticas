<?php

use MongoDB\Operation\Watch;

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
            echo "        <th scope='col'>Acciones</th>";
            echo "        </tr>";
            echo "    </thead>";
            echo "    <tbody>";

            foreach($incidencias as $incidencia) {
                echo "        <tr>";
                echo "        <td>".$incidencia->getNombre()."</td>"; //." id=".$incidencia->id_incidencia."</td>";
                echo "        <td>".$incidencia->getDescripcion()."</td>";
                echo "        <td>".$incidencia->getFecha()."</td>";
                echo "        <td>";
                /*
                foreach($incidencia->getUsuarios() as $usuario) {
                    echo $usuario['Nombre']." - ".$usuario['Email']."<br>";
                }
                */
                echo "          <a href='controller.php?action=delete&id={$incidencia->id}' class='btn btn-danger btn-circle'>-</a>";
                echo "        </td>";
                echo "        </tr>";
            }

            echo "    </tbody>";
            echo "  </table>";

        }

        //Imprimir el formulario de insertar incidencia
        static function renderFormInsert() {
?>
            <form action='controller.php' method='GET'>
                <input type='text' name='titulo'>
                <input type='text' name='descripcion'>
                <input type='date' name='fecha'> 
                <input type='submit' name='finsert' value='Nuevo'>
            </form>

<?php            
        }

    }


?>