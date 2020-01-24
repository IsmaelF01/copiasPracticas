<?php

class MateriaModel {

    public function __construct(){
        $this->db = new Database();
    }

    public function getMaterias(){
        $items = [];
        try{
            $stmt = $this->db->connect()->query('SELECT * FROM materias ORDER BY curso,nombre');
            
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Materia');
            $stmt->execute();
            while ($materia = $stmt->fetch()){
                $items[] = $materia;
            }

            return $items;
        }catch(PDOException $e){
            return [];
        }
    }

    public function deleteMateria($id) {
        try{
            $stmt = $this->db->connect()->prepare("DELETE FROM materias WHERE id_materia = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
              
          } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
          }            

    }

    public function insert($materia) {
        //Insertar materia
        try {
            $stmt = $this->db->connect()->prepare("INSERT INTO materias (nombre, curso, horas_semanales) VALUES ( :nombre, :curso, :horas_semanales )");

            $stmt->bindValue(':nombre', $materia->getNombre());
            $stmt->bindValue(':curso', $materia->getCurso());
            $stmt->bindValue(':horas_semanales', $materia->getHorasSemanales());

            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }


    }
}

?>