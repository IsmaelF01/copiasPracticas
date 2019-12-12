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

    }

    //Insertar nuevo disco
    if ($_POST['insert']) {
        $mDisco = new MDisco();
        $disco = $mDisco->insertDisco($_POST['titulo'],$_POST['estilo'],$_POST['autor'],$_POST['year'],$_POST['ncanciones'],$_POST['portada']);
        header("Location: index.php");
    }    


?>