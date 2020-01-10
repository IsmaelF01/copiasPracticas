<?php
spl_autoload_register(function ( $NombreClase ) {
    if (file_exists("../Modelo/". $NombreClase . ".php")) {
        include_once("../Modelo/". $NombreClase . '.php');
    }
    if (file_exists("../Vista/". $NombreClase . ".php")) {
      include_once("../Vista/". $NombreClase . '.php');
    }  
  }
  );

    //Controla las acciones que le llegan
    if (isset($_GET['action'])) {

        //Eliminar un disco en el módulo de administración
        if ($_GET['action'] == "delete") {
            $mDisco = new MDisco();
            $disco = $mDisco->deleteDisco($_GET['id']);
            header("Location: index.php");
        }

        //Eliminar una canción en el módulo de administración
        if ($_GET['action'] == "delete_c") {
            $mDisco = new MDisco();
            //Cambio para borrar cnación de un disco, necesita el id de disco
            $disco = $mDisco->deleteCancion($_GET['id_d'],$_GET['id_c']);
            header("Location: ver_canciones.php?id={$_GET['id_d']}");
        }        

    }

    //Insertar nuevo disco
    if (isset($_POST['insert'])) {
        $mDisco = new MDisco();
        $disco = $mDisco->insertDisco($_POST['titulo'],$_POST['estilo'],$_POST['autor'],$_POST['year'],$_POST['ncanciones'],$_POST['portada']);
        header("Location: index.php");
    }    

    //Modificar un disco
    if (isset($_POST['update'])) {
        $mDisco = new MDisco();
        $disco = $mDisco->updateDisco($_POST['id'],$_POST['titulo'],$_POST['estilo'],$_POST['autor'],$_POST['year'],$_POST['ncanciones'],$_POST['portada']);
        header("Location: index.php");
    }

    //Insertar canción
    if (isset($_POST['insert_c'])) {
        $mDisco = new MDisco();
        $disco = $mDisco->insertCancion($_POST['titulo'],$_POST['duracion'],$_POST['id_disco']);
        header("Location: ver_canciones.php?id={$_POST['id_disco']}");
    }


?>