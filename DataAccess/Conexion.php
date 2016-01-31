<?php

//herencia
class Conexion extends mysqli {

    public function __construct() {
        //servidor,usuario,pass,nombreBase
        parent::__construct('localhost', 'root', '', 'php');
        //parent::__construct('localhost', 'u859113394_user', 'Gamma26', 'u859113394_bd');
        //envio de datos utf8 (para evitar caracteres extraños)
        $this->query("SET NAMES 'ut8';");
        //connect_errno devuelve verdadero su hay un error en la conexion
        //chequeo de la conexion
        //$this->connect_errno ? die('Error con la conexion') : $x = 'Conectado';
        //echo $x;
    }

    public function recorrer($param) {
        return mysqli_fetch_array($param);
    }
}

?>
