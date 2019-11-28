<?php
session_start();
//session_destroy();

//Autocarga de clases
spl_autoload_register(function ( $NombreClase ) {
    if (file_exists($NombreClase . '.php'))
        include_once($NombreClase . '.php');

    if (file_exists("./clases/". $NombreClase . ".php")) {
        include_once("./clases/". $NombreClase . '.php');
    }
}
);

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

    //Si pulsamos eliminar al carrito
    if (isset($_GET['del'])) {
        //Comprobar que hay carro en la sesión
        if (isset($_SESSION['carro'])) {
            $carro = unserialize($_SESSION['carro']);
            $carro->eliminar($_GET['del']);
            $_SESSION['carro'] = serialize($carro);
        }
        header("Location: verCarro.php");
    }

    //Sumar cantidad en el carrito
    if (isset($_GET['sumar'])) {
        //Comprobar que hay carro en la sesión
        if (isset($_SESSION['carro'])) {
            $carro = unserialize($_SESSION['carro']);
            $carro->sumar($_GET['sumar']);
            $_SESSION['carro'] = serialize($carro);
        }
        header("Location: verCarro.php");
    }

    //Restar cantidad en el carrito
    if (isset($_GET['restar'])) {
        //Comprobar que hay carro en la sesión
        if (isset($_SESSION['carro'])) {
            $carro = unserialize($_SESSION['carro']);
            $carro->restar($_GET['restar']);
            $_SESSION['carro'] = serialize($carro);
        }
        header("Location: verCarro.php");
    }

    //Login de usuarios
    if (isset($_POST['pass'])) {
        require("conexion.php");
        $conexion = conectar("2daw");

        $consulta = "SELECT * FROM usuarios WHERE email='{$_POST['email']}'";
        $resultado = $conexion->query($consulta);
        $usuario = $resultado->fetch_assoc();
        if ($usuario['pass'] == $_POST['pass']) {
            //Creamos la sesión en la COOKIE
            setcookie('usuario', serialize($usuario), time()+2592000, 'cookies/', "", false, true);

            header("Location: index.php");
        }

    } else {
        header("Location: index.php");
    }

    //Cerrar la sesión borrando la cookie
    if (isset($_GET['cerrar'])) {
        setcookie('usuario', "", time()-5, 'cookies/', "", false, true);        
        header("Location: index.php");
    }


?>