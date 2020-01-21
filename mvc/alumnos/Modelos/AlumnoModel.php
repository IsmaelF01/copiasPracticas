<?php

class AlumnoModel {

    public function __construct(){
        $this->db = new Database();
    }

    public function getAlumnos(){
        $items = [];
        try{
            $stmt = $this->db->connect()->query('SELECT * FROM alumnos');
            
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Alumno');
            $stmt->execute();
            while ($alumno = $stmt->fetch()){
                $items[] = $alumno;
            }

            return $items;
        }catch(PDOException $e){
            return [];
        }
    }
}

?>
