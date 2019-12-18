<?php

    spl_autoload_register( function( $NombreClase ) {
        include_once($NombreClase . '.php');
    } );

    //Incluimos la librería de Mongo
    include_once("./vendor/autoload.php");

    class MIncidencia
    {
        protected $conexion=null;

        //Abrir conexion a BD MongoDB, cambiar nombre a la vuestra
        function __construct($dbname="Ejercicio") {
            $this->conexion = (new MongoDB\Client)->{$dbname};
        }

        function __destruct() {
            $this->conexion = null;
        }

        //Método de acceso a BD
        function getIncidencias() {
            //incidencias es la colección (como una tabla) donde se consultan las incidencias
            $cursor = $this->conexion->incidencias->find();
            $incidencias = array();
            foreach($cursor as $incidencia) {
                //Mongo nos devuelve un array asociativo con cada documento. 
                //Generamos un objeto con esos valores para que funcione el resto de la app
                $unaIncidencia = new Incidencia($incidencia['Titulo'],$incidencia['Descripcion'],$incidencia['Fecha'],$incidencia['Usuarios']);
                $unaIncidencia->id = $incidencia['_id'];                
                $incidencias[] = $unaIncidencia;
            }

            return $incidencias;

        }

        //Borra una incidencia en Mongodb
        function deleteIncidencia($unId) {            
            $cursor = $this->conexion->incidencias->deleteOne(['_id' => new \MongoDB\BSON\ObjectId($unId)]);
        }

        //Inserta una incidencia en Mongodb
        function insertIncidencia($unTitulo, $unaDescripcion, $unaFecha) {
            $insertOneResult = $this->conexion->incidencias->insertOne([
                'Titulo' => $unTitulo,
                'Descripcion' => $unaDescripcion,
                'Fecha' => $unaFecha,
            ]);
        }

    }


?>