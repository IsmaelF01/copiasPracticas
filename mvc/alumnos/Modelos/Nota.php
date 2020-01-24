<?php

    class Nota
    {
        private $dni_alumno;
        private $id_materia;
        private $nota;

        public function __construct($unDNI="",$unIdMateria="",$unaNota="") {
            $this->dni_alumno = $unDNI;
            $this->id_materia = $unIdMateria;
            $this->nota = $unaNota;
        }

        public function getDNI() {
            return $this->dni_alumno;
        }

        public function getMateria() {
            return $this->id_materia;
        }

        public function getNota() {
            return $this->nota;
        }
        
    }