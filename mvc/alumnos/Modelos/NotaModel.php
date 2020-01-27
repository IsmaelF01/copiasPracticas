<?php

class NotaModel {

    public function __construct(){
        $this->db = new Database();
    }

    public function getNotasByAlumno($dni){
        $items = [];
        try{
        $query = "SELECT notas.dni_alumno, notas.id_materia, notas.nota FROM notas RIGHT JOIN materias ON notas.id_materia = materias.id_materia WHERE dni_alumno = :dni";
            $stmt = $this->db->connect()->prepare($query);
            $stmt->bindValue(':dni', $dni);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Nota');
            $stmt->execute();
            while ($materia = $stmt->fetch()){
                $items[] = $materia;
            }

            return $items;
        }catch(PDOException $e){
            return [];
        }
    }

}