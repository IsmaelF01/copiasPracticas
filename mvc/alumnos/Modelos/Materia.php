<?php

    class Materia
    {
        private $id_materia;
        private $nombre;
        private $curso;
        private $horas_semanales;

        public function __construct($unId="",$unNombre="",$unCurso="",$unasHorasSemanales="") {
            $this->id_materia = $unId;
            $this->nombre = $unNombre;
            $this->curso = $unCurso;
            $this->horas_semanales = $unasHorasSemanales;
        }

        public function getId() {
            return $this->id_materia;
        }

        public function getNombre() {
            return $this->nombre;
        }
        
        public function getCurso() {
            return $this->curso;
        }

        public function getHorasSemanales() {
            return $this->horas_semanales;
        }

    }