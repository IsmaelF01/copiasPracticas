<?php

    spl_autoload_register( function( $NombreClase ) {
        include_once($NombreClase . '.php');
    } );

    //Incluimos la librería de Mongo
    include_once("./vendor/autoload.php");

    class MPeliculas
    {
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

        function getFavoritas() {
            $cursor = $this->conexion->favoritas->find();
            return $cursor;
        }

        function eliminar($id_pelicula) {
            $this->conexion->favoritas->deleteOne(['id' => intval($id_pelicula)]);
        }


    }