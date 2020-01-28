<?php

    class Diario
    {
        private $fecha;
        private $texto;
        private $usuario;

        public function __construct($unaFecha="",$unTexto="",$unUsuario="") {
            $this->fecha = $unaFecha;
            $this->texto = $unTexto;
            $this->usuario = $unUsuario;
        }

        public function getFecha() {
            return $this->fecha;
        }

        public function getTexto() {
            return $this->texto;
        }
        
        public function getUsuario() {
            return $this->usuario;
        }


    }