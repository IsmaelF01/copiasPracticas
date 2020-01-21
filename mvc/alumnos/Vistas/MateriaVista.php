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
              <h1 class="h3 ml-1 mb-2 text-gray-800">Materias</h1>
              
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



	}
?>