<?php
spl_autoload_register(function ( $NombreClase ) {
    if (file_exists("./Modelo/". $NombreClase . '.php'))
        include_once("./Modelo/". $NombreClase . '.php');
    if (file_exists("./Vista/". $NombreClase . '.php'))
        include_once("./Vista/". $NombreClase . '.php');        
} );

    if (isset($_GET['action'])) {
        //Si hemos pinchado en borrar incidencia
        if ($_GET['action'] == 'delete') {
            $mIncidencia = new MIncidencia();
            $incidencias = $mIncidencia->deleteIncidencia($_GET['id']);
            header("Location: index.php");
        }

        if ($_GET['action'] == 'insert') {
            echo VistaIncidencia::renderFormInsert();
        }
    }

    //Recibimos formulario de insertar incidencia
    if (isset($_GET['finsert'])) {
        $mIncidencia = new MIncidencia();
        $mIncidencia->insertIncidencia($_GET['titulo'],$_GET['descripcion'],$_GET['fecha']);
        header("Location: index.php");        
    }



?>