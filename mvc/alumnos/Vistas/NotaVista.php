<?php

	class NotaVista extends Vista
	{

	    function __construct(){
	    	parent::__construct();
    	}

        //MOSTRAR TODOS LOS ALUMNOS
    	function index($datos) {
            $notas = $datos[0];
            $materias = $datos[1];
            include("html/cabecera.php");
?>            
          
            <!-- Begin Page Content -->
            <div class="container-fluid">
    
              <!-- Page Heading -->
              <h1 class="h3 ml-1 mb-2 text-gray-800">Notas
                  <a href="<?php echo constant('URL'); ?>NotaController/finsert" class="btn btn-primary btn-icon-split">
                    <span class="text">Insertar nota</span>
                  </a>              
              </h1>
              
              <!-- DataTales  -->
              <div class="card shadow mb-4">

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th>Alumno</th>
<?php
                foreach($materias as $materia) {
                    echo "<th>{$materia->getNombre()}</th>"; 
                }
?>                        
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                            <th>Alumno</th>
<?php
                foreach($materias as $materia) {
                    echo "<th>{$materia->getNombre()}</th>"; 
                }
?>    
                        </tr>
                      </tfoot>
                      <tbody>
<?php
                foreach($notas as $notas_alumno) {
                    echo "<tr>";

                    foreach($notas_alumno as $nota) {
                        echo "<td>{$nota}</td>";
                    }                
                    echo "</tr>";
                }
?>
                    
                      </tbody>
                      </table>
                      </div>
                    </div>
                  </div>
        
                </div>
                <!-- /.container-fluid -->   
<?php            
            //Quitarlo con Ajax
            include("html/pie.php");
        }
        
    }