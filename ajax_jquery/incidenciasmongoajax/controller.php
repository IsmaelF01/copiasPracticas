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
        
            //Repintamos incidencias
            $incidencias = $mIncidencia->getIncidencias();
            VistaIncidencia::renderIncidencias($incidencias);
        }
    }

    if (isset($_GET['insertar'])) {
        $objeto = json_decode($_GET["insertar"],false);
        
        //Insertamos directamente la incidencia en json
        $mIncidencia = new MIncidencia();
        $mIncidencia->insertIncidencia($objeto);

        //Repintamos incidencias
        $incidencias = $mIncidencia->getIncidencias();
        VistaIncidencia::renderIncidencias($incidencias);      
    }


?>