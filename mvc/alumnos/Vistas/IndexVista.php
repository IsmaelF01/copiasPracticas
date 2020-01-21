<?php

	class IndexVista extends Vista
	{

	    function __construct(){
	    	parent::__construct();
    	}

    	function index($datos="") {
			
			include_once("html/cabecera.php");
?>		
		  
				  <!-- Begin Page Content -->
				  <div id="inicio" class="container-fluid">
			 
					<!-- Content Row -->
					<div class="row">
		  
						<!-- Illustrations -->
						<div class="card shadow mb-4">
						  <div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">2DAW</h6>
						  </div>
						  <div class="card-body">
							<div class="text-center">
							  <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?php echo constant('URL');?>Vistas/html/img/undraw_posting_photo.svg" alt="">
							</div>
							<p>Bienvenido a la web de adminstración de notas de 2DAW, aquí podrás añadir alumnos, materias, y notas finales para cada materia-alumno.</p>                  
						  </div>
						</div>
		  
					</div>
		  
				  </div>
				  <!-- /.container-fluid -->

				</div>
				<!-- End of Main Content -->
		  
		  <?php
			include_once("html/pie.php");
					

    	}



	}
?>


    
