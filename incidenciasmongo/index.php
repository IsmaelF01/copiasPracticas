<?php

spl_autoload_register(function ( $NombreClase ) {
    if (file_exists("./Modelo/". $NombreClase . '.php'))
        include_once("./Modelo/". $NombreClase . '.php');
    if (file_exists("./Vista/". $NombreClase . '.php'))
        include_once("./Vista/". $NombreClase . '.php');        
} );


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Incidencias</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
        <h1>Incidencias</h1>

        <section>
    
<?php
    //Pintamos las incidencias
    $mIncidencia = new MIncidencia();
    $incidencias = $mIncidencia->getIncidencias();
    VistaIncidencia::renderIncidencias($incidencias);
?>

        </section>

</body>
</html>


