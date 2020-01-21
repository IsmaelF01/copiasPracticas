<?php

    class Alumno 
    {
        private $dni;
        private $nombre;
        private $apellidos;
        private $edad;
        private $movil;
        private $direccion;

        public function __construct($unDNI="",$unNombre="",$unosApellidos="",$unaEdad="",$unMovil="",$unaDireccion="") {
            $this->dni = $unDNI;
            $this->nombre = $unNombre;
            $this->apellidos = $unosApellidos;
            $this->edad = $unaEdad;
            $this->movil = $unMovil;
            $this->direccion = $unaDireccion;
        }

        public function getDNI() {
            return $this->dni;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getApellidos() {
            return $this->apellidos;
        }

        public function getEdad() {
            return $this->edad;
        }
       
        public function getMovil() {
            return $this->movil;
        }

        public function getDireccion() {
            return $this->direccion;
        }        
    }


?>