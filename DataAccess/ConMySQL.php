<?php

class ConMySQL extends mysqli{
    private $con;

    public function __construct() {
        parent::__construct('localhost', 'root', '', 'php');
        $this->con = mysql_connect("localhost", "root", "");
        mysql_select_db("php", $this->con);
       
    }
    
    function getCon() {
        return $this->con;
    } 
}

?>
