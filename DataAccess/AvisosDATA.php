<?php

include '../DataAccess/Conexion.php';
include '../Domain/Aviso.php';

//Necesario para ver el objeto session
//session_start();

class AvisoData {

    function __construct() {
        
    }

    public function agregarAviso($username, $nombreAviso, $descripcion, $categoria, $fecha, $hora) {
        $db = new Conexion();
        $sql = $db->query("select id from usuarios where username='$username'");
        $dato = $db->recorrer($sql);
        $userid = $dato['id'];
        try {
            $db->query("insert into avisos (user_id,fecha,hora,nombre,descripcion,categoria) "
                    . "values('$userid','$fecha','$hora','$nombreAviso','$descripcion','$categoria');");
            return $result = 1;
            ;
        } catch (Exception $exc) {
            return $result = 2;
        }
    }

    public function getAvisos() {
        $db = new Conexion();
        $username = $_SESSION['usuario'];
        $sql = $db->query("select id from usuarios where username='$username'");
        $dato = $db->recorrer($sql);
        $userid = $dato['id'];

        //TODO CONSTANTES
        if ($username == 'admescuela') {
            $result = $db->query("select * from avisos order by fecha");
        } else {
            $result = $db->query("select * from avisos where user_id='$userid' order by fecha");
        }

        $array = array();

        if ($result->num_rows > 0) {
            // output data of each row
//            private $user;
            while ($row = $result->fetch_array()) {
                $aviso = new Aviso();
                $aviso->setId($row['id']);
                $aviso->setNombreAviso($row['nombre']);
                $aviso->setCategoria($row['categoria']);
                $aviso->setDescripcion($row['descripcion']);
                $aviso->setFecha($row['fecha']);
                $aviso->setHora($row['hora']);

                $aux = $row['user_id'];
                $sql = $db->query("select nombre from usuarios where id = '$aux'");
                $dato = $db->recorrer($sql);
                $aviso->setUser($dato['nombre']);

                array_push($array, $aviso);
            }
        }
        return $array;
    }

    public function eliminarAviso($id) {

        try {
            $db = new Conexion();
            $db->query("delete from avisos where id='$id'");
            return 'success';
        } catch (Exception $exc) {
            return 'error';
        }
    }

    public function eliminarAvisosViejos() {
        $fecha = date('Y-m-j');
        try {
            $db = new Conexion();
            $db->query("delete from avisos where fecha <'$fecha'");
            return 'success2';
        } catch (Exception $exc) {
            return 'error';
        }
    }

}

?>
