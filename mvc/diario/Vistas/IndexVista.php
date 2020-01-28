<?php

	class IndexVista extends Vista
	{

	    function __construct(){
	    	parent::__construct();
    	}

    	function index($datos="") {
			
    		include("html/diario.php");

    	}



	}
?>


    
