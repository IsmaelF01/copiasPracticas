<?php
session_start();

include('Carrito.php');
include('LineaProducto.php');

    //Si pulsamos añadir al carrito
    if (isset($_POST['add'])) {
        //Comprobar que hay carro en la sesión
        if (isset($_SESSION['carro'])) {
            $carro = unserialize($_SESSION['carro']);
            //Comprobamos si el producto ya está en el carro
            $key = $carro->comprobar($_POST['nombre']);
            if ($key >= 0 ) {
                //Sumamos uno a la cantidad de ese artículo
                $carro->sumar($key);
            } else {
                //Si no está lo metemos
                $linea = new LineaProducto($_POST['nombre'],$_POST['precio']);
                $carro->meter($linea);
            }
            $_SESSION['carro'] = serialize($carro);
        } else {
            //Creamos el carro vacío y lo añadimos a la sesión
            $carro = new Carrito();
            $linea = new LineaProducto($_POST['nombre'],$_POST['precio']);
            $carro->meter($linea);
            $_SESSION['carro'] = serialize($carro);

        }
        header("Location: index.php");
    }


    //Si pulsamos borrar
    if (isset($_GET['delete'])) {
        //Comprobar que hay carro en la sesión
        if (isset($_SESSION['carro'])) { 
            $carro = unserialize($_SESSION['carro']);
            $carro->eliminar($_GET['delete']);
            $_SESSION['carro'] = serialize($carro);
        }
        header("Location: verCarro.php");
    }

    //Incrementar cantidad
    if (isset($_GET['plus'])) {
        if (isset($_SESSION['carro'])) { 
            $carro = unserialize($_SESSION['carro']);
            $carro->sumar($_GET['plus']);
            $_SESSION['carro'] = serialize($carro);
        }
        header("Location: verCarro.php");        
    }

    //Decrementar cantidad
    if (isset($_GET['minus'])) {
        if (isset($_SESSION['carro'])) { 
            $carro = unserialize($_SESSION['carro']);
            $carro->restar($_GET['minus']);
            $_SESSION['carro'] = serialize($carro);
        }
        header("Location: verCarro.php");        
    }    

?>