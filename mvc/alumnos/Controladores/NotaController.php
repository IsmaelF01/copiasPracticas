<?php

class NotaController extends Controller{
    function __construct(){
        parent::__construct();
    }

    function consulta() {        
        //Todos los alumnos y todas las materias. Luego podría sacarse por curso
        $alumnos = $this->loadModel("Alumno")->getAlumnos();
        $materias = $this->loadModel("Materia")->getMaterias();

        //Array donde irán las notas de los alumnos para pasarlo a la vista
        $notasVista = [];

        //Para cada alumno sacamos sus notas
        foreach($alumnos as $alumno) {
            $notas_alumno = $this->loadModel("Nota")->getNotasByAlumno($alumno->getDNI());

            $notaVista = array($alumno->getNombre()); //Su nombre

            //Para cada materia comprobamos si tiene nota, si tiene la ponemos si no un guión
            foreach($materias as $materia) {  
                $tiene_nota=false;
                foreach($notas_alumno as $nota) {
                    if ($materia->getId() == $nota->getMateria()) {
                        $notaVista[] = $nota->getNota();
                        $tiene_nota = true;
                    }
                }
                if (!$tiene_nota)
                    $notaVista[] = "-";
            }
            $notasVista[] = $notaVista;           
        }

        $this->view("NotaVista/index",[$notasVista,$materias]);
    }

}