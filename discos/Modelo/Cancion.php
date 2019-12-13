<?php
    class Cancion {
        protected $titulo,$duracion;

        function __construct($unTitulo="", $unaDuracion="") {
            $this->titulo = $unTitulo;
            $this->duracion = $unaDuracion;
        }

        function getTitulo() {
            return $this->titulo;
        }

        function getDuracion() {
            return $this->duracion;
        }

        function setTitulo($unTitulo) {
            $this->titulo = $unTitulo;
        }

        function setDuracion($unaDuracion) {
            $this->duracion = $unaDuracion;
        }

    }

?>