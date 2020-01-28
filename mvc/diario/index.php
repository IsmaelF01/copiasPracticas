<?php

    //Incluimos el fichero con los datos de configuración de la Aplicación
    include_once("./libs/config.php");

    //Incluimos la carga automática de cada clase que necesite cuando se llame con autoload
    spl_autoload_register(function ( $NombreClase ) {
        if (file_exists("./libs/". $NombreClase . ".php")) {
            include_once("./libs/". $NombreClase . '.php');
        }  
        if (file_exists("./Controladores/".$NombreClase . '.php'))
            include_once("./Controladores/".$NombreClase . '.php');
      
        if (file_exists("./Modelos/". $NombreClase . ".php")) {
            include_once("./Modelos/". $NombreClase . '.php');
        }
      
        if (file_exists("./Vistas/". $NombreClase . ".php")) {
          include_once("./Vistas/". $NombreClase . '.php');
        }  
      }
      );

    //Lanzamos el enrutador, que toma la url y en función de ella llama a un controlador y
    //a un método dentro del controlador
    $app = new Router();
?>