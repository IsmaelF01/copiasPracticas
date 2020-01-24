<?php

	class MateriaVista extends Vista
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
              <h1 class="h3 ml-1 mb-2 text-gray-800">Materias
                  <a href="<?php echo constant('URL'); ?>MateriaController/finsert" class="btn btn-primary btn-icon-split">
                    <span class="text">Insertar materia</span>
                  </a>              
              </h1>
              
              <!-- DataTales  -->
              <div class="card shadow mb-4">

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Horas Semanales</th>
                          <th>Curso</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Nombre</th>
                          <th>Horas Semanales</th>
                          <th>Curso</th>
                          <th>Acciones</th>
                        </tr>
                      </tfoot>
                      <tbody>
<?php
                foreach($datos as $materia) {
                    echo "<tr>";
                    echo "<td>{$materia->getNombre()}</td>";
                    echo "<td>{$materia->getHorasSemanales()}</td>";
                    echo "<td>{$materia->getCurso()}</td>";   
                    echo "<td>";
                    echo "<a href='".constant('URL')."MateriaController/delete/".$materia->getId()."' class='btn btn-danger btn-circle'><i class='fas fa-trash'></i></a>";
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


      //MÉTODO PARA MOSTRAR FORMULARIO INSERTAR MATERIA
      function finsert() {
          include("html/cabecera.php");
?>  
          <!-- Begin Page Content -->
          <div class="container-fluid">
            
            <!-- Page Heading -->
            <h1 class="h3 ml-1 mb-2 text-gray-800">Materias - Nueva</h1>
            
            <form action="<?php echo constant('URL'); ?>MateriaController/nuevo" method="POST">
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre">
              </div>
              <div class="form-group">
                <label for="curso">Curso</label>
                <input type="number" class="form-control" name="curso" id="curso">
              </div> 
              <div class="form-group">
                <label for="horass">Horas Semanales</label>
                <input type="number" class="form-control" name="horass" id="horass">
              </div>    
              <button type="submit" class="btn btn-primary">Crear</button>                       
            </form>
          </div>

<?php            
          //Quitarlo con Ajax
          include("html/pie.php");
      }


	}
?>