<?php

spl_autoload_register(function ( $NombreClase ) {
    if (file_exists($NombreClase . '.php'))
        include_once($NombreClase . '.php');
  }
);

    class MDisco 
    {

        protected $conexion;

        function __construct($dbname="2daw",$user="usuario",$password="iesjrs20") {
            try {
                $dsn = "mysql:host=localhost;dbname=$dbname";
                $this->conexion = new PDO($dsn, $user, $password);
            } catch (PDOException $e){
                echo $e->getMessage();
            }
        }

        //El destructor cierra la conexión a la BD
        function __destruct() {
            $this->conexion = null;
        }

        //Get de la conexión BD
        function getConexion() {
            return $this->conexion;
        }

        //Listado de todos los discos
        //Luego parametrizarlo para consultar por categoría
        function getDiscos() {
            //Array de Discos con la consulta
            $discos = array();

            $stmt = $this->conexion->prepare("SELECT * FROM discos");
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Disco');
            $stmt->execute();
            while ($disco = $stmt->fetch()){
                $discos[] = $disco;
            }

            return $discos;
        }



    }

?>