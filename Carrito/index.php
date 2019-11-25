<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carro de la compra</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <h2>TIENDA AMAZOS</h2>
    <a href="verCarro.php">
        <figure class="figure">
            <img src="imgs/shopping-cart.png" class="figure-img img-fluid w-25" alt="...">
        </figure>
    </a>

    <section>
<?php
    require('conexion.php');
    $conexion = conectar("2daw");

    $consulta = "SELECT * FROM productos ORDER BY nombre";
    $conexion->query("SET NAMES utf8");
    $resultado = $conexion->query($consulta);
    echo "<div class='row'>";
    while($producto = $resultado->fetch_array()) {
        echo "<div class='card col-sm-4' style='width: 18rem;'>";
        echo "<img src='{$producto['imagen']}' class='card-img-top' alt='Producto'>";
        echo "  <div class='card-body'>";
        echo "      <h5 class='card-title'>{$producto['nombre']}</h5>";        
        //echo "      <p class='card-text'>{$producto['descripcion']}</p>";
        echo "      <form action='controlador.php' method='POST'>";
        echo "          <input type='hidden' name='nombre' value='{$producto['nombre']}'>";
        echo "          <input type='hidden' name='precio' value='{$producto['precio']}'>";
        echo "          <span class='text-danger'>{$producto['precio']}&euro;</span>";
        echo "          <input type='submit' class='btn btn-primary ml-2' name='add' value='Añadir'>";
        echo "      </form>";
        echo "  </div>";
        echo "</div>";
    }
    echo "</div>";

?>
    </section>
</div>


</body>
</html>