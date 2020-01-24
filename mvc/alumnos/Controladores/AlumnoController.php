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

    function finsertar() {
        $this->view("AlumnoVista/formInsert","");
    }

    function nuevo() {
        $alumno = new Alumno($_POST['dni'],$_POST['nombre'],$_POST['apellidos'],$_POST['edad'],$_POST['movil'],$_POST['direccion']);
        $this->loadModel("Alumno")->nuevoAlumno($alumno);
        $alumnos = $this->loadModel("Alumno")->getAlumnos();
        $this->view("AlumnoVista/index",$alumnos);

    }

}

?>