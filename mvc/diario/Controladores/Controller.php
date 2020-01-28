<?php

class Controller{

    private $modelo;

    function __construct(){
    }

    //Cargamos un determinado modelo para ejecutar métodos sobre él
    function loadModel($model){                
        $modelName = $model.'Model';
        $this->modelo = new $modelName();
        return $this->modelo;

    }

    //Ejecutar una determinada vista pasada como parámetro del tipo ClaseVista/MétodoVista
    function view($vista,$datos) {
        $rvista = explode('/', $vista);

        //Si sólo hay un parámetro cargamos la vista principal de esa Vista
        if (count($rvista) == 1) {
            //require 'Vistas/' . $rvista[0] . '.php';
            $vista = new $rvista[0];
            $vista->index();            
        } else {
            //Ejecutamos el método correspondiente a mostrar algo determinado en esa visa
            //require 'Vistas/' . $rvista[0] . '.php';
            $vista = new $rvista[0];
            $vista->{$rvista[1]}($datos);
        }
        
    }
}

?>