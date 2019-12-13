<?php

    class Disco 
    {
        protected $titulo, $estilo, $autor, $year, $ncanciones, $portada;
        protected $canciones;

        //Constructor
        function __construct($unTitulo="", $unEstilo="", $unAutor="", $unYear="", $unNcanciones="", $unaPortada="") {
            $this->titulo = $unTitulo;
            $this->estilo = $unEstilo;
            $this->autor = $unAutor;
            $this->year = $unYear;
            $this->ncanciones = $unNcanciones;
            $this->portada = $unaPortada;
            $this->canciones = array();
        }

        //Getters y setters
        function getTitulo() {
            return $this->titulo;
        }

        function getEstilo() {
            return $this->estilo;
        }

        function getAutor() {
            return $this->autor;
        }

        function getYear() {
            return $this->year;
        }

        function getNcanciones() {
            return $this->ncanciones;
        }

        function getPortada() {
            return $this->portada;
        }

        function getCanciones() {
            return $this->canciones;
        }


        function setTitulo($unTitulo) {
            $this->titulo = $unTitulo;
        }

        function setEstilo($unEstilo) {
            $this->estilo = $unEstilo;
        }

        function setAutor($unAutor) {
            $this->autor = $unAutor;
        }

        function setYear($unYear) {
            $this->year = $unYear;
        }

        function setNcanciones($unNcanciones) {
            $this->ncanciones = $unNcanciones;
        }

        function setPortada($unaPortada) {
            $this->portada = $unaPortada;
        }

        function setCanciones($unasCanciones) {
            $this->canciones = $unasCanciones;
        }

        //Añadir una canción a un disco
        function addCancion($unaCancion) {
            $this->canciones[] = $unaCancion;
        }

        //Eliminar una canción
        function deleteCancion($unaCancion) {
            foreach($this->canciones as $key => $cancion) {
                if ($cancion->getTitulo() == $unaCancion->getTitulo()) {
                    unset($this->canciones[$key]);
                    $this->canciones = array_values($this->canciones);
                }
            }
        }


    }


?>