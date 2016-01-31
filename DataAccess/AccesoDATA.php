<?php

include '../DataAccess/Conexion.php';
include '../DataAccess/ConMySQL.php';
include '../Domain/Usuario.php';
class AccesoDATA {

    protected $user;
    protected $pass;

    function __construct($user, $pass) {
        $this->user = $user;
        $this->pass = $pass;
    }
    

    public function login() {
        $db = new ConMySQL();
        $sqlq= $db->query("Select username, pass from usuarios "
                . "where username='$this->user' and pass='$this->pass';");
        
        return $result = $sqlq->num_rows>0? true : false;;
    }

    public function registro($nombreRegistro) {
        $db = new ConMySQL();
        
        $sqlq = "Select username, pass from usuarios "
                . "where username='$this->user';";
        $result = $db->query($sql);
        
        if ($result->num_rows > 0) {
            return $result = 3;
        }  else {
             //LLAMADO A UN PROCESO ALMACENADO
           $con = new ConMySQL();
            $llamado = mysql_query("call sp_insert_user('$this->user','$this->pass','$nombreRegistro')",$con->getCon());
            if($llamado>=1){
                return $result = 1;
            }else{
                return $result = 3;
            }
        }     
        /*try {
                $sql = $db->query("insert into usuarios (username,pass,nombre) "
                        . "values('$this->user','$this->pass','$nombreRegistro');");
                return $result = 1;
            } catch (Exception $exc) {
               return $result = 2;
            }*/
    }
    
    public function getUsuarios() {
        $db = new ConMySQL();
        //TODO Constantes
        $sql = ("select * from usuarios where username!='admescuela'");
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
            $db = new ConMySQL();
            $db->query("delete from usuarios where id='$id'");
            return 'success';
        } catch (Exception $exc) {
            return 'error';
        }
    }
}
?>

