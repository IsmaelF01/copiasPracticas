<?php

class AlumnoController extends Controller{
    function __construct(){
        parent::__construct();
    }

    function consulta() {        
        $alumnos = $this->loadModel("Alumno")->getAlumnos();
        $this->view("AlumnoVista/index",$alumnos);
    }

}

?>