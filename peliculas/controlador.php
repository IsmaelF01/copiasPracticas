<?php
    require('conexion.php');
    //En función de la acción solicitada realizaremos la acción correspondiente

    //Añadir
    if (isset($_POST['add'])) {        
		$conexion = conectar("2daw");

        //Deberíamos filtrar lo que recibimos de POST
        $titulo = $_POST['titulo'];
        $genero = $_POST['genero'];
        $director = $_POST['director'];
        $fecha = $_POST['fecha'];
        $sinopsis = $_POST['sinopsis'];
        $cartel = $_POST['cartel'];

		//Insertamos lo recibido del formulario. Todos los varchar con '
        $consulta = "INSERT INTO peliculas (titulo,genero,director,fecha,sinopsis,cartel) VALUES ('$titulo','$genero','$director',$fecha,'$sinopsis','$cartel')";
        //Para que no de problemas con los caracteres especiales
        $conexion->query("SET NAMES utf8");
        //Si da error lo pintamos directamente, sino redirigimos a index.php
        if (!$conexion->query($consulta)) {
            echo "Error insertando ".$conexion->error;
        } else {
            $conexion->close();
            header("Location: index.php");
        }
        
    }

    //Eliminar
    if ($_GET['delete']) {

        $conexion = conectar("2daw");
        $consulta = "DELETE FROM peliculas WHERE id_pelicula={$_GET['delete']}";

        if (!$conexion->query($consulta)) {
            echo "Error borrando ".$conexion->error;
        } else {
            $conexion->close();
            header("Location: index.php");
        }
    }


    //Editar
    if (isset($_POST['edit'])) {        
		$conexion = conectar("2daw");

        //Deberíamos filtrar lo que recibimos de POST
        $titulo = $_POST['titulo'];
        $genero = $_POST['genero'];
        $director = $_POST['director'];
        $fecha = $_POST['fecha'];
        $sinopsis = $_POST['sinopsis'];
        $cartel = $_POST['cartel'];

		//Insertamos lo recibido del formulario. Todos los varchar con '
        $consulta = "UPDATE peliculas SET titulo='$titulo', genero='$genero', director='$director', fecha=$fecha, sinopsis=\"$sinopsis\", cartel='$cartel' WHERE id_pelicula={$_POST['id_pelicula']}";
        //Para que no de problemas con los caracteres especiales
        $conexion->query("SET NAMES utf8");
        //Si da error lo pintamos directamente, sino redirigimos a index.php
        if (!$conexion->query($consulta)) {
            echo "Error modificando ".$conexion->error;
            echo $consulta;
        } else {
            $conexion->close();
            header("Location: index.php");
        }
        
    }

