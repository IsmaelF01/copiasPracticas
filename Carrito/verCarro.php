<?php
    session_start();
//    session_destroy();

    include('Carrito.php');
    include('LineaProducto.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carro de la compra</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body>

<div class="container">
    <h2>TIENDA AMAZOS</h2>

    <section>
<?php
    if (isset($_SESSION['carro'])) {
        $carro = unserialize($_SESSION['carro']);
    } else {
        $carro = new Carrito();
    }

    echo "<h3>Carrito de la compra &nbsp;<a href='index.php'><i class='material-icons'>arrow_back</i></a></h3>";
    $carro->mostrar();
?>

    </section>
</div>
</body>
</html>