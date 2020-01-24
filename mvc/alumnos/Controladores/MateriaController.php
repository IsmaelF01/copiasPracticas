<?php

class MateriaController extends Controller{
    function __construct(){
        parent::__construct();
    }

    //Muestra todas las materias
    function consulta() {        
        $materias = $this->loadModel("Materia")->getMaterias();
        $this->view("MateriaVista/index",$materias);
    }

    //Elimina una materia por id
    function delete($params) {
        $this->loadModel("Materia")->deleteMateria($params[0]);
        $materias = $this->loadModel("Materia")->getMaterias();
        $this->view("MateriaVista/index",$materias);        
    }

    //Pintar el formulario para insertar materia
    function finsert() {
        $this->view("MateriaVista/finsert","");
    }

    //Insertar en la BBDD una nueva materia
    function nuevo() {
        $materia = new Materia("",$_POST['nombre'],$_POST['curso'],$_POST['horass']);
        $this->loadModel("Materia")->insert($materia);
        //Volver a pintar todas las materias
        $materias = $this->loadModel("Materia")->getMaterias();
        $this->view("MateriaVista/index",$materias);

    }

}

?>