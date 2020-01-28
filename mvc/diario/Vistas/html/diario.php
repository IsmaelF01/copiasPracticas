<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>DIARIO</title>

</head>

<body>


    <div id="principal" class="container">
        <h1 class="text-primary">MI DIARIO</h1>

        <div id="content" class="form-row align-items-center">
            <div class="form-group purple-border col-auto">
                <label for="calendario" class="text-info">ELIGE FECHA</label>
                <input class="form-control form-control-sm" type="date" id="calendario" min="2019-01-01">

            </div>
        </div>

        <div id="entrada">
            <div class="form-group purple-border" >
                <label for="textarea"  class="text-info">ENTRADA DIARIO</label>
                <textarea class="form-control" id="textarea" rows="3"></textarea>
            </div>
        </div>

    </div>

 


    <script src="<?php echo constant('URL');?>Vistas/html/js/jquery-3.4.1.min.js"></script>
    <script>

        //Cuando cambie el input date llamamos para que devuelva la nueva entrada del diario
		$( "#calendario" ).change(function() {			
			//Llamada Ajax al controlador para obtener la entrada del día
			var entrada = "";
			var url = '<?php echo constant('URL')."EntradasDiarioController/getEntrada/";?>'+$( "#calendario" ).val();
            //Llamar por Ajax al Controlador del Diario para sacar las entradas
			$.ajax({
				type: 'GET',
				url: url,
				beforeSend: function() {
					$("#textarea").html("Cargando...");
				},			
				success: function(response) {				
					//Si la respuesta es null significa que no hay datos
					if (response == "Null") {
						$("#textarea").val("");	
					} else {
						entrada = JSON.parse(response);										
						$("#textarea").val(entrada.texto);						
					}

				}
       		});		

		});

        window.addEventListener("load",inicio);

        function inicio() {
            //Obtenemos la fecha del día y la pintamos en el input
            var fecha = new Date();
            var dd = fecha.getDate();
            var mm = fecha.getMonth()+1;
            var yy = fecha.getFullYear();
            if(dd<10) {
                dd = '0'+dd
            } 
            if(mm<10) {
                mm = '0'+mm
            } 
            var strFecha = yy + "-" + mm + "-" + dd;
            $("#calendario").val(strFecha);

            //Textarea crece conforme escribes
            $('#textarea').on('input', function () { 
                this.style.height = 'auto'; 
                this.style.height =  (this.scrollHeight) + 'px'; 
            }); 

			var url = '<?php echo constant('URL')."EntradasDiarioController/getEntrada/";?>'+strFecha;
            //Llamar por Ajax al Controlador del Diario para sacar las entradas
			$.ajax({
				type: 'GET',
				url: url,
				beforeSend: function() {
					$("#textarea").val("Cargando...");
				},			
				success: function(response) {
					var entrada = JSON.parse(response);
					$("#textarea").val(entrada.texto);
				}
       		});
   
        }

        //Cambio en el textarea
        $("#textarea").focusout(function() {
			var entrada = "";
			var url = '<?php echo constant('URL')."EntradasDiarioController/modificarEntrada/";?>'+$( "#calendario" ).val()+"/"+$( "#textarea" ).val();		
            //Llamar por Ajax al Controlador del Diario para sacar las entradas
			$.ajax({
				type: 'GET',
				url: url,
				beforeSend: function() {
					$("#textarea").html("Modificando...");
				},			
				success: function(response) {				
					//Si la respuesta es null significa que no hay datos
					if (response == "Null") {
						$("#textarea").val("");	
					} else {
alert(response);
						entrada = JSON.parse(response);										
						$("#textarea").val(entrada.texto);						
					}

				}
			});
        });

    </script>    
</body>

</html>