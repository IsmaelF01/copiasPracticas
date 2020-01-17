<?php

	class BDBirra {

		//Métodos Base de Datos

		//Muestra las cervezas favoritas
		public static function mostrar() {
			$dbh=Db::conectar();

			try {
				//Seleccionamos colección "birra"
				$coleccion = $dbh->birra;
				$birras = $coleccion->find();		
			} catch (Exception $e){
			    echo $e->getMessage();
			}	

			$dbh=null;		
				
			return json_encode($birras->toArray());

		}	

		//Eliminar una cerveza
		public static function eliminar($idCerveza){
			//Conectamos con la base de datos peliculas
			$bd=Db::conectar();

			//Se guarda en una variable la coleccion a manipular
			$coleccion = $bd->birra;
			//Buscamos en la coleccion si hay alguna coincidencia
			$coleccion->deleteOne(['_id' => new \MongoDB\BSON\ObjectId($idCerveza)]);

			return json_encode("Eliminado");
		}

		//Metodo para insertar una cerveza que recibe sus datos
		public static function insertar($nombre, $grados, $foto){
			//Conectamos con la base de datos
			$bd=Db::conectar();
			//Se guarda la coleccion a manipular en una variable
			$coleccion = $bd->birra;
			//Insertamos el anterior documento en la coleccion
			$coleccion->insertOne([
								    'nombre' => $nombre,
								    'grados' => $grados,
								    'foto' => $foto
								   ]);		

			return json_encode("Insertado");
		}	

	}

?>