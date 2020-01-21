<?php

class AlumnoController extends Controller{
    function __construct(){
        parent::__construct();
    }

    function consulta() {        
        $alumnos = $this->loadModel("Alumno")->getAlumnos();
        $this->view("AlumnoVista/index",$alumnos);
    }

    function delete($params) {
        $this->loadModel("Alumno")->deleteAlumno($params[0]);
        $alumnos = $this->loadModel("Alumno")->getAlumnos();
        $this->view("AlumnoVista/index",$alumnos);
    }

}

?>