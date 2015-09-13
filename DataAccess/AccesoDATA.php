<?php

include '../DataAccess/Conexion.php';
include '../Domain/Usuario.php';
class AccesoDATA {

    protected $user;
    protected $pass;

    function __construct($user, $pass) {
        $this->user = $user;
        $this->pass = $pass;
    }

    public function login() {
        $db = new Conexion();
        $sql = $db->query("Select username, pass from usuarios "
                . "where username='$this->user' and pass='$this->pass';");
        //array asociativo
        $dato = $db->recorrer($sql);

        $result = $dato['username'] == $this->user and $dato['pass'] == $this->pass ? true : false;
        return $result;
    }

    public function registro($nombreRegistro) {
        $db = new Conexion();
        $result = '';

        //consulta que determinará si el usuario ya existe
        $sql = $db->query("Select username, pass from usuarios "
                . "where username='$this->user';");
        $dato = $db->recorrer($sql);
        //en caso de que el usuario no exista
        if ($dato['username']!=$this->user) {
            try {
                $sql = $db->query("insert into usuarios (username,pass,nombre) "
                        . "values('$this->user','$this->pass','$nombreRegistro');");
                return $result = 1;
            } catch (Exception $exc) {
               return $result = 2;
            }
        } else {
            return $result = 3;
        }
    }
    
    public function getUsuarios() {
        $db = new Conexion();
        //TODO Constantes
        $sql = ("select * from usuarios where username!='jorge'");
        $result = $db->query($sql);
        $array = array();

        if ($result->num_rows > 0) {
            // output data of each row
//            private $user;
            while ($row = $result->fetch_array()) {
                $usuario=new Usuario();
                $usuario->setId($row['id']);
                $usuario->setNombre($row['nombre']);
                $usuario->setUser($row['username']);
                $usuario->setPass($row['pass']);
                
                array_push($array, $usuario);
            }
        }
        return $array;
    }
    
    public function eliminarUsuario($id) {
        try {
            $db = new Conexion();
            $db->query("delete from usuarios where id='$id'");
            return 'success';
        } catch (Exception $exc) {
            return 'error';
        }
    }
}
?>

