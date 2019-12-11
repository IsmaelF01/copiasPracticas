<?php

    class Disco 
    {
        protected $titulo, $estilo, $autor, $year, $ncanciones, $portada;

        //Constructor
        function __construct($unTitulo="", $unEstilo="", $unAutor="", $unYear="", $unNcanciones="", $unaPortada="") {
            $this->titulo = $unTitulo;
            $this->estilo = $unEstilo;
            $this->autor = $unAutor;
            $this->year = $unYear;
            $this->ncanciones = $unNcanciones;
            $this->portada = $unaPortada;
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


    }


?>