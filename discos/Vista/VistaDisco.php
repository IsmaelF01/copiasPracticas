<?php

spl_autoload_register(function ( $NombreClase ) {
    if (file_exists('../Modelo'. $NombreClase . '.php'))
        include_once('../Modelo'.$NombreClase . '.php');
  }
);

    class VistaDisco
    {
        //Métodos front-end
        ///////////////////////////////////////////////////////
        static function imprimirDiscosPortada($unDisco) {
            echo "<li class='mix ".$unDisco->getEstilo()."'>";
            echo "<a class='disco' href='ver_detalle.php?id=".$unDisco->id_disco."'>";
            echo "  <img src='".$unDisco->getPortada()."' alt=''>";
            echo "  <div class='item-overly'>";
            echo "    <div class='position-center'>";
            echo "      <h4>".$unDisco->getTitulo()."</h4>";
            echo "      <p>".$unDisco->getAutor()."</p>";
            echo "    </div>";
            echo "  </div>";
            echo "</a>";
            echo "</li>";
            
        }

        static function imprimirDisco($unDisco) {

            echo "<div class='media'>";
            echo "<img width='400' src='".$unDisco->getPortada()."' class='align-self-start mr-3' alt='...'>";
            echo "<div class='media-body'>";
            echo "  <h2 class='mt-0'>".$unDisco->getTitulo()."</h2>";
            echo "  <h4>".$unDisco->getAutor()."</h4>";
            echo "  <p>CANCIONES (".$unDisco->getNcanciones().")</p>";
            echo "</div>";
            echo "</div>";

        }

        //Imprimir las canciones de un disco
        static function imprimirCancionesDiscoAdmin($disco) {
            echo "<h5>{$disco->getTitulo()}</h5>";
            echo "<h5>{$disco->getAutor()}</h5>";
            foreach($disco->getCanciones() as $cancion) {
                echo $cancion->getTitulo()." ".$cancion->getDuracion();
            }

        }


        //Métodos back-end
        static function imprimirDiscosAdmin($unDisco) {
            echo "<tbody>";
            echo "<tr>";
            echo "  <td>".$unDisco->getTitulo()."</td>";
            echo "  <td>".$unDisco->getEstilo()."</td>";
            echo "  <td>".$unDisco->getAutor()."</td>";
            echo "  <td>".$unDisco->getYear()."</td>";
            //Ver canciones
            echo "  <td>".$unDisco->getNcanciones();
            //Botón canciones
            echo "      <a href='ver_canciones.php?id=".$unDisco->id_disco."' class='btn btn-success btn-icon-split'>";
            echo "      <span class='text'>Ver</span>";
            echo "      </a>";
            echo "  </td>";
            echo "  <td><img width='50' src='".$unDisco->getPortada()."'></td>";
            //Reseñas
            echo "  <td>";
            echo "      <a href='#' class='btn btn-primary btn-icon-split'>";
            echo "      <span class='text'>Ver</span>";
            echo "      </a>";
            echo "  </td>";
            //Acciones
            echo "  <td>";
            //Botón update
            echo "      <a href='update_disco.php?id={$unDisco->id_disco}' class='btn btn-warning btn-circle'>";
            echo "       <i class='fas fa-edit'></i>";
            echo "      </a>";
            //Botón delete
            echo "      <a href='controller.php?action=delete&id={$unDisco->id_disco}' class='btn btn-danger btn-circle'>";
            echo "       <i class='fas fa-trash'></i>";
            echo "      </a>";            
            echo "  </td>";
            
            echo "</tr>";
            echo "</tbody>";
           
        }


        static function imprimirFormularioDiscoAdmin($unDisco) {
            echo "<form action='controller.php' method='POST'>";
?>
            <div class="modal-header">						
                <h4 class="modal-title">Añadir Disco</h4>         
            </div>
                <div class="modal-body">					
                    <div class="form-group">
                        <label>Título</label>
                        <input type="text" name="titulo" class="form-control" value="<?php echo $unDisco->getTitulo();?>" required>
                    </div>
                    <div class="form-group">
                        <label>Estilo</label>
                        <select name="estilo" class="form-control" required>
<?php                            
    //Hay que ver con cuál nos quedamos
        if ($unDisco->getEstilo() == "Rock")
            echo "<option value='Rock' selected>Rock</option>";
        else 
            echo "<option value='Rock' >Rock</option>";
        if ($unDisco->getEstilo() == "Metal")
            echo "<option value='Metal' selected>Metal</option>";
        else 
            echo "<option value='Metal' >Metal</option>";
        if ($unDisco->getEstilo() == "Pop")
            echo "<option value='Pop' selected>Pop</option>";
        else 
            echo "<option value='Pop' >Pop</option>";
        if ($unDisco->getEstilo() == "Electro")
            echo "<option value='Electro' selected>Electro</option>";
        else 
            echo "<option value='Electro' >Electro</option>";
        if ($unDisco->getEstilo() == "Mamandurrias")
            echo "<option value='Mamandurrias' selected>Mamandurrias</option>";
        else 
            echo "<option value='Mamandurrias' >Mamandurrias</option>";
?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Autor</label>
                        <input type="text" name="autor" class="form-control" value="<?php echo $unDisco->getAutor();?>" required>
                    </div>
                    <div class="form-group">
                        <label>Año</label>
                        <input type="text" name="year" class="form-control" value="<?php echo $unDisco->getYear();?>" required>
                    </div>
                    <div class="form-group">
                        <label>Num Canciones</label>
                        <input type="number" name="ncanciones" class="form-control" value="<?php echo $unDisco->getNcanciones();?>" required>
                    </div>
                    <div class="form-group">
                        <label>Portada</label>
                        <input type="text" name="portada" class="form-control" value="<?php echo $unDisco->getPortada();?>" required>
                    </div>
					<div>
                        <!-- Hidden para pasar el id del disco a modificar -->
                        <input type="hidden" name="id" value="<?php echo $unDisco->id_disco;?>">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" name='update' class="btn btn-success" value="Modificar">
					</div>                    				
                </div>            
<?php
            echo "</form>";
        }

    }


?>