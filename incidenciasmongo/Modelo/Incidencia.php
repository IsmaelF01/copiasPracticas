<?php

    class Incidencia 
    {
        protected $nombre, $descripcion, $fecha;

        function __construct($unNombre="", $unaDescripcion="", $unaFecha="") {
            $this->nombre = $unNombre;
            $this->descripcion = $unaDescripcion;
            $this->fecha = $unaFecha;
        }

        //Get y Set
        function getNombre() {
            return $this->nombre;
        }

        function getDescripcion() {
            return $this->descripcion;
        }

        function getFecha() {
            return $this->fecha;
        }

        function setNombre($unNombre) {
            $this->nombre = $unNombre;
        }

        function setDescripcion($unaDescripcion) {
            $this->descripcion = $unaDescripcion;
        }

        function setFecha($unaFecha) {
            $this->fecha = $unaFecha;
        }



    }



?>