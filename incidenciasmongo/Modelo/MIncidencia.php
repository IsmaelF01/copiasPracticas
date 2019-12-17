<?php

    include_once("Incidencia.php");
    include_once("./vendor/autoload.php");

    class MIncidencia
    {
        protected $conexion=null;

        //Abrir conexion a BD
        function __construct($dbname="Ejercicio",$user="usuario",$password="iesjrs20") {
            $this->conexion = (new MongoDB\Client)->{$dbname};
        }

        function __destruct() {
            $this->conexion = null;
        }

        //Método de acceso a BD
        function getIncidencias() {

            $cursor = $this->conexion->incidencias->find();
            $incidencias = array();
            foreach($cursor as $incidencia) {
                $incidencia = new Incidencia($incidencia['Titulo'],$incidencia['Descripcion'],$incidencia['Fecha']);
                $incidencias[] = $incidencia;
            }

            return $incidencias;

        }

    }


?>