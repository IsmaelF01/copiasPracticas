<?php

spl_autoload_register(function ( $NombreClase ) {
    if (file_exists("./Modelo/". $NombreClase . '.php'))
        include_once("./Modelo/". $NombreClase . '.php');
    if (file_exists("./Vista/". $NombreClase . '.php'))
        include_once("./Vista/". $NombreClase . '.php');        
} );


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Incidencias Mongo">
    <meta name="author" content="ProfeJJ">    
    <title>Incidencias</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  
</head>
<body>

        <h1>Incidencias</h1>
        <a href="#fincidencia" class="btn btn-primary m-1" data-toggle="modal"> 
        	Nueva incidencia
        </a>

        <section id="principal"> 

		<?php
		    //Pintamos las incidencias
		    $mIncidencia = new MIncidencia();
		    $incidencias = $mIncidencia->getIncidencias();
		    VistaIncidencia::renderIncidencias($incidencias);
		?>

        </section>



<!-- Modal para el formulario de insertar incidencia -->
<div id="fincidencia" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nueva Incidencia</h5>
      </div>
      <div class="modal-body">
         	<form id="forminsertarincidencia">
         		<div class="form-group">
    				<label for="titulo">Título</label>
                	<input type='text' id='titulo' class="form-control">
                </div>
         		<div class="form-group">
    				<label for="desc">Descripción</label>
                	<input type='text' id='descripcion' class="form-control">
                </div>                
         		<div class="form-group">
    				<label for="fecha">Fecha</label>
                	<input type='date' id='fecha' class="form-control">
                </div> 
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="insertarIncidencia">Guardar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<script src="./js/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>

	//Script para insertar una incidencia
	$( '#insertarIncidencia' ).click(function(e) {
		e.preventDefault();
		
		//Creamos objeto y lo pasamos a JSON con los campos de la incidencia
		var objeto = {
            "Titulo": document.getElementById("titulo").value,
            "Descripcion": document.getElementById("descripcion").value,
            "Fecha": document.getElementById("fecha").value,         
		};
		var parametros = JSON.stringify(objeto);

        $.ajax({
            type: "GET",
            url: 'controller.php',
            data: "insertar=" + parametros,
            success: function(response)
            {
            	//Si todo funciona bien devolvemos de la vista todas las incidencias
                $("#principal").html(response);
 
            },
		    error: function() {
		        alert('Error insertando incidencia!');
		    }
       	});
       
       //Cerramos el modal
       $( '#fincidencia' ).modal('toggle'); 
    });

	//Script para eliminar una incidencia
    function del(unId) {
    	var parametros = {
            "action" : "delete",
            "id" : unId
        };
        $.ajax({
            type: "GET",
            url: 'controller.php',
            data: parametros,
            success: function(response)
            {
            	//Si todo funciona bien devolvemos de la vista todas las incidencias
                $("#principal").html(response);
 
            },
		    error: function() {
		        alert('Error eliminando incidencia!');
		    }
       	});
    }	

</script>

</body>
</html>


