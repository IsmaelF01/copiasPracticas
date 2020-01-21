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

}

?>