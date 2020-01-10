<?php

    class Incidencia 
    {
        protected $nombre, $descripcion, $fecha,$usuarios;

        function __construct($unNombre="", $unaDescripcion="", $unaFecha="", $unosUsuarios="") {
            $this->nombre = $unNombre;
            $this->descripcion = $unaDescripcion;
            $this->fecha = $unaFecha;
            $this->usuarios = $unosUsuarios;
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

        function getUsuarios() {
            return $this->usuarios;
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

        function setUsuarios($unosUsuarios) {
            $this->usuarios = $unosUsuarios;
        }


    }



?>