<?php
  //Incluimos la librería de Mongo
  include("vendor/autoload.php");


class DiarioModel {

    public function __construct(){
        $this->db = new Database();
    }

    public function getEntradasPorFecha($unaFecha){
        $this->conexion = $this->db->connect();

        try {
            $entrada = $this->conexion->entradas_diario->findOne(['fecha' => $unaFecha]);
        } catch (Exception $e){
            echo $e->getMessage();
        }
        
        if (is_null($entrada)) {
        	return "Null";
        }
        return json_encode($entrada);       
    }

    public function modificarEntrada($unaFecha,$unTexto) {
    	 $this->conexion = $this->db->connect();
    	 //Consulto a ver si existe
		try {
            $entrada = $this->conexion->entradas_diario->findOne(['fecha' => $unaFecha]);
        } catch (Exception $e){
            echo $e->getMessage();
        }
        
        if (is_null($entrada)) {
        	//INSERT
			$insertOneResult = $this->conexion->entradas_diario->insertOne([
			    'fecha' => $unaFecha,
			    'texto' => $unTexto,
			]);

        } else {
        	//UPDATE
			$updateResult = $this->conexion->entradas_diario->updateOne(
			    ['fecha' => $unaFecha],
			    ['$set' => ['texto' => $unTexto]]
			);

        }


    }


            

}

?>