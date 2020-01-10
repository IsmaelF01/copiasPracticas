<?php

spl_autoload_register(function ( $NombreClase ) {
    if (file_exists($NombreClase . '.php'))
        include_once($NombreClase . '.php');
  }
);

    //Incluimos la librería de Mongo
    include_once("./vendor/autoload.php");


    class MDisco 
    {

        protected $conexion;

        function __construct($dbname="misdiscos",$user="usuario",$password="iesjrs20") {
            try {
                $this->conexion = (new MongoDB\Client)->{$dbname};
            } catch (Exception $e){
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

            try {
                $cursor = $this->conexion->discos->find();
                $discos = array();
                foreach($cursor as $disco) {
                    //Mongo nos devuelve un array asociativo con cada documento. 
                    //Generamos un objeto con esos valores para que funcione el resto de la app
                    $unDisco = new Disco($disco['titulo'], $disco['estilo'], $disco['autor'],$disco['year'], $disco['ncanciones'], $disco['portada']);
                    $unDisco->id_disco = $disco['_id'];                
                    $discos[] = $unDisco;
                }
            } catch (Exception $e){
                echo $e->getMessage();
            }
            
            return $discos;

        }

        //Consulta un único disco
        function getDisco($unId) {

            try {
                $cursor = $this->conexion->discos->find(array('_id' => new \MongoDB\BSON\ObjectId($unId)));
                foreach($cursor as $disco) {
                    //Mongo nos devuelve un array asociativo con cada documento. 
                    //Generamos un objeto con esos valores para que funcione el resto de la app
                    $unDisco = new Disco($disco['titulo'], $disco['estilo'], $disco['autor'],$disco['year'], $disco['ncanciones'], $disco['portada']);
                    $unDisco->id_disco = $disco['_id'];                
                }
            } catch (Exception $e){
                echo $e->getMessage();
            }

            //Devolvemos el disco con sus canciones
            $canciones = $this->getCanciones($unId);
            $unDisco->setCanciones($canciones);

            return $unDisco;
        } 
     
        //Listar canciones de un disco
        function getCanciones($id_disco) {
            //Array de canciones con la consulta
            $canciones = array();
 
            try {
                $cursor = $this->conexion->discos->find(array('_id' => new \MongoDB\BSON\ObjectId($id_disco)));
                foreach($cursor as $disco) {
                    foreach($disco['canciones'] as $cancion) {
                        $unaCancion = new Cancion($cancion['titulo'], $cancion['duracion']);
                        $canciones[] = $unaCancion; 
                    }               
                }
            } catch (Exception $e){
                echo $e->getMessage();
            }

            return $canciones;            
         }

        //Eliminar un disco
        function deleteDisco($unId) {
            try {
                $cursor = $this->conexion->discos->deleteOne(array('_id' => new \MongoDB\BSON\ObjectId($unId)));             
              } catch(Exception $e) {
                echo 'Error: ' . $e->getMessage();
              }
        }

        //Insertar un disco
        function insertDisco($titulo,$estilo,$autor,$year,$ncanciones,$portada) {
            try {
                
                $insertOneResult = $this->conexion->discos->insertOne([
                    'titulo' => $titulo,
                    'estilo' => $estilo,
                    'autor' => $autor,
                    'year' => $year,
                    'ncanciones' => $ncanciones,
                    'portada' => $portada,
                    'canciones' => []
                ]);
              } catch(Exception $e) {
                echo 'Error: ' . $e->getMessage();
              }
        }

        //Update un disco
        function updateDisco($id,$titulo,$estilo,$autor,$year,$ncanciones,$portada) {
            try {
                
                $updateOneResult = $this->conexion->discos->updateOne(
                    ['_id' => new \MongoDB\BSON\ObjectId($id)],
                    ['$set' => [
                        'titulo' => $titulo,
                        'estilo' => $estilo,
                        'autor' => $autor,
                        'year' => $year,
                        'ncanciones' => $ncanciones,
                        'portada' => $portada
                        ]   
                    ]);
              } catch(Exception $e) {
                echo 'Error: ' . $e->getMessage();
              }
        }
        
        //Insertar una canción
        function insertCancion($titulo,$duracion,$id_disco) {
            //Primero saco las canciones que tenía y le añado la nuevo
            //Luego modifico la parte de canciones en el documento JSON

            $canciones_m = array(); //Array donde estarán todas las canciones, las de antes y la nueva
            //Obtenemos canciones anteriores
            $canciones = $this->getCanciones($id_disco);
            foreach ($canciones as $cancion) {
                $canciones_m[] = $cancion;
            }
            //Y añadirmos la nueva canción
            $cancion_m->titulo = $titulo;
            $cancion_m->duracion = $duracion;
            $canciones_m[] = $cancion_m;

            try {
                $updateOneResult = $this->conexion->discos->updateOne(
                    ['_id' => new \MongoDB\BSON\ObjectId($id_disco)],
                    ['$set' => [
                        'canciones' => $canciones_m
                        ]   
                    ]);              
              } catch(Exception $e) {
                echo 'Error: ' . $e->getMessage();
              }
        }

        //Método para eliminar una canción
        function deleteCancion($id_disco, $unTitulo) {
            $canciones_m = array(); //Array donde estarán todas las canciones, las de antes y la nueva
            //Obtenemos canciones anteriores
            $canciones = $this->getCanciones($id_disco);
            foreach ($canciones as $cancion) {
                //Si el título corresponde a la canción a eliminar no la metemos al array
                if ($cancion->getTitulo() != $unTitulo)
                    $canciones_m[] = $cancion;
            }

            try {
                $updateOneResult = $this->conexion->discos->updateOne(
                    ['_id' => new \MongoDB\BSON\ObjectId($id_disco)],
                    ['$set' => [
                        'canciones' => $canciones_m
                        ]   
                    ]);              
                } catch(Exception $e) {
                echo 'Error: ' . $e->getMessage();
                }
        }

    }

?>