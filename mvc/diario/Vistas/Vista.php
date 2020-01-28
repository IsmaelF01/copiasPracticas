<?php
	
	abstract class Vista {


	    function __construct(){
    	}

    	//Pinta la página principal de una vista
    	abstract function index($datos);


	}
