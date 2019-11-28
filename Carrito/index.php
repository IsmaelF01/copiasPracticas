<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carro de la compra</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>
<body>

<div class="container">
    <h2>TIENDA AMAZOS</h2>
    <a href="verCarro.php">
        <figure class="figure">
            <img src="imgs/shopping-cart.png" class="figure-img img-fluid w-25" alt="...">
        </figure>
    </a>
<?php
    //Comprobamos si hay usuario registrado
    if(isset($_COOKIE['usuario'])){
        $usuario = unserialize($_COOKIE['usuario']);
        echo "Bienvenido ".$usuario['email']."&nbsp;<a href='controlador.php?cerrar=1'>Cerrar</a>";
    } else {
        echo "<a href='#LoginUser' data-toggle='modal'><span>Logueate</span></a>";
    }

?>
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


<!-- Modal login -->
	<!-- Delete Modal HTML -->
	<div id="LoginUser" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action='controlador.php' method='POST'>
					<div class="modal-header">						
						<h4 class="modal-title">Loguin</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
                        Email: <input type='text' name='email' class='form-control'><br>
                        Contraseña: <input type='password' name='pass' class='form-control'>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-danger" value="Login">
					</div>
				</form>
			</div>
		</div>
	</div>


</body>
</html>