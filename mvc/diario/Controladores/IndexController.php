<?php

class IndexController extends Controller{
    function __construct(){
        parent::__construct();

    }

    function render(){
        $this->view('IndexVista',"");
    }

}

?>