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


    public function deleteAlumno($id) {
        try{
            $stmt = $this->db->connect()->prepare("DELETE FROM alumnos WHERE DNI = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
              
          } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
          }            
    }

    public function nuevoAlumno($alumno) {

        //Insertar película
        try {
            // Prepare
            $stmt = $this->db->connect()->prepare("INSERT INTO alumnos (dni, nombre, apellidos, edad, movil, direccion) VALUES (:dni, :nombre, :apellidos, :edad, :movil, :direccion)");
            // Bind
            $stmt->bindValue(':dni', $alumno->getDNI());
            $stmt->bindValue(':nombre', $alumno->getNombre());
            $stmt->bindValue(':apellidos', $alumno->getApellidos());
            $stmt->bindValue(':edad', $alumno->getEdad());
            $stmt->bindValue(':movil', $alumno->getMovil());
            $stmt->bindValue(':direccion', $alumno->getDireccion());

            // Excecute
            $stmt->execute();	
        } catch (PDOException $e){
            echo $e->getMessage();
        }

    }

}

?>
