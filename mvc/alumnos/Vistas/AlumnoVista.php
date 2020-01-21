<?php

	class AlumnoVista extends Vista
	{

	    function __construct(){
	    	parent::__construct();
    	}

        //MOSTRAR TODOS LOS ALUMNOS
    	function index($datos) {
            //Quitarlo con Ajax
            include("html/cabecera.php");
?>            
          
            <!-- Begin Page Content -->
            <div class="container-fluid">
    
              <!-- Page Heading -->
              <h1 class="h3 ml-1 mb-2 text-gray-800">Alumnos</h1>
              
              <!-- DataTales  -->
              <div class="card shadow mb-4">

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>DNI</th>
                          <th>Nombre</th>
                          <th>Apellidos</th>
                          <th>Edad</th>
                          <th>Móvil</th>
                          <th>Dirección</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>DNI</th>
                          <th>Nombre</th>
                          <th>Apellidos</th>
                          <th>Edad</th>
                          <th>Móvil</th>
                          <th>Dirección</th>
                        </tr>
                      </tfoot>
                      <tbody>
<?php
                foreach($datos as $alumno) {
                    echo "<tr>";
                    echo "<td>{$alumno->getDNI()}</td>";
                    echo "<td>{$alumno->getNombre()}</td>";
                    echo "<td>{$alumno->getApellidos()}</td>";
                    echo "<td>{$alumno->getEdad()}</td>";
                    echo "<td>{$alumno->getMovil()}</td>";
                    echo "<td>{$alumno->getDireccion()}</td>";                    
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
?>