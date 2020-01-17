<?php

    spl_autoload_register( function( $NombreClase ) {
        include_once($NombreClase . '.php');
    } );

    //Incluimos la librería de Mongo
    include_once("./vendor/autoload.php");

    class MPeliculas
    {
        const PELISPORPAGINA = 4;

        protected $conexion=null;

        //Abrir conexion a BD MongoDB, cambiar nombre a la vuestra
        function __construct($dbname="FPeliculas") {
            $this->conexion = (new MongoDB\Client)->{$dbname};
        }

        function __destruct() {
            $this->conexion = null;
        }

        function insert($pelicula_json) {
            $insertOneResult = $this->conexion->favoritas->insertOne(json_decode($pelicula_json)); 
        }

        function getFavoritas($pag) {
            $salto = self::PELISPORPAGINA * ($pag - 1);
            $cursor = $this->conexion->favoritas->find(
                [],
                [
                    'limit' => self::PELISPORPAGINA,
                    'skip' => $salto,
                    'sort' => ['vote_average' => -1], //Ordenar desc por media de los votos
                ]
            );
            return $cursor;
        }

        function count() {
            return $this->conexion->favoritas->count();
        }

        function eliminar($id_pelicula) {
            $this->conexion->favoritas->deleteOne(['id' => intval($id_pelicula)]);
        }


    }