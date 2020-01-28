<?php

class Database{

    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        $this->host     = constant('HOST');
        $this->db       = constant('DB');
        $this->user     = constant('USER');
        $this->password = constant('PASSWORD');
        $this->charset  = constant('CHARSET');
    }

    function connect(){
        try {
            $this->conexion = (new MongoDB\Client)->{$this->db};
        } catch (Exception $e){
            echo $e->getMessage();
        }    

        return $this->conexion;
    
    }
}

?>