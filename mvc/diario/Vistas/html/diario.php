<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>DIARIO</title>


    <script src="<?php echo constant('URL');?>Vistas/html/js/jquery-3.4.1.min.js"></script>
    <script>
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

            //Asociamos evento cuando cambiamos de fecha
            //$("#calendario").change(mostrarEntrada);
            //$("#textarea").change(modificarEntrada);
            
           
        }

    </script>
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

    
</body>

</html>