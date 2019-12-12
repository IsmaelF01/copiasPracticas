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
                $this->conexion = new PDO($dsn, $user, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
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

            try {
                $stmt = $this->conexion->prepare("SELECT * FROM discos");
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Disco');
                $stmt->execute();
                while ($disco = $stmt->fetch()){
                    $discos[] = $disco;
                }
            } catch (PDOException $e){
                echo $e->getMessage();
            }
            return $discos;
        }

        //Consulta un único disco
        function getDisco($unId) {
            //Array de Discos con la consulta
            $discos = array();

            try {
                $stmt = $this->conexion->prepare("SELECT * FROM discos WHERE id_disco=$unId");
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Disco');
                $stmt->execute();
                $disco = $stmt->fetch();
            } catch (PDOException $e){
                echo $e->getMessage();
            }
            return $disco;
        } 
        
        //Eliminar un disco
        function deleteDisco($unId) {
            try {
                $stmt = $this->conexion->prepare('DELETE FROM discos WHERE id_disco = :id');
                $stmt->bindParam(':id', $unId); 
                $stmt->execute();                 
              } catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
              }
        }

        //Insertar un disco
        function insertDisco($titulo,$estilo,$autor,$year,$ncanciones,$portada) {
            try {
                $stmt = $this->conexion->prepare('INSERT INTO discos (titulo,estilo,autor,year,ncanciones,portada) VALUES(:titulo,:estilo,:autor,:anio,:ncanciones,:portada )');
                $stmt->bindParam(':titulo', $titulo);
                $stmt->bindParam(':estilo', $estilo);
                $stmt->bindParam(':autor', $autor);
                $stmt->bindParam(':anio', $year);
                $stmt->bindParam(':ncanciones', $ncanciones);
                $stmt->bindParam(':portada', $portada);
                $stmt->execute();               
              } catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
              }

        }


    }

?>