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
                          <th>Acciones</th>
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
                          <th>Acciones</th>
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
                    echo "<td>";
                    echo "<a href='".constant('URL')."AlumnoController/delete/".$alumno->getDNI()."' class='btn btn-danger btn-circle'><i class='fas fa-trash'></i></a>";
                    echo "</td>";                                        
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


      //Método que carga el formulario de insertar alumno
      function formInsert() {

        include("html/cabecera.php");
        ?>            
                  
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
            
                      <!-- Page Heading -->
                      <h1 class="h3 ml-1 mb-2 text-gray-800">Alumnos - Nuevo</h1>
                      
                      <form action="<?php echo constant('URL'); ?>AlumnoController/nuevo" method="POST">
                        <div class="form-group">
                          <label for="dni">DNI</label>
                          <input type="text" class="form-control" name="dni" id="dni">
                        </div>
                        <div class="form-group">
                          <label for="nombre">Nombre</label>
                          <input type="text" class="form-control" name="nombre" id="nombre">
                        </div>
                        <div class="form-group">
                          <label for="apellidos">Apellidos</label>
                          <input type="text" class="form-control" name="apellidos" id="apellidos">
                        </div>
                        <div class="form-group">
                          <label for="edad">Edad</label>
                          <input type="number" class="form-control" name="edad" id="edad">
                        </div>
                        <div class="form-group">
                          <label for="movil">Móvil</label>
                          <input type="text" class="form-control" name="movil" id="movil">
                        </div>                        
                        <div class="form-group">
                          <label for="direccion">Dirección</label>
                          <input type="text" class="form-control" name="direccion" id="direccion">
                        </div>
                        <button type="submit" class="btn btn-primary">Crear</button>
                      </form>                      
                
                    </div>
                    <!-- /.container-fluid -->   
        <?php            
                    //Quitarlo con Ajax
                    include("html/pie.php");

      }


	}
?>