<?php

class EntradasDiarioController extends Controller{
    function __construct(){
        parent::__construct();

    }

    function getEntrada($parametros){
    	//Consultamos al modelo
    	$diarioM = new DiarioModel();
    	$entrada = $diarioM->getEntradasPorFecha($parametros[0]);
 
        //Devolvemos datos directamente con Ajax
        echo $entrada;
    }

    function modificarEntrada($parametros) {
    	$diarioM = new DiarioModel();
    	$entrada = $diarioM->modificarEntrada($parametros[0],$parametros[1]);
    	echo "jj".$parametros[1];
    	//echo $entrada;
    }

}

?>