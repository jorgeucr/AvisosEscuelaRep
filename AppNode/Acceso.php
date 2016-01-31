<?php

//Login, Registro

include '../DataAccess/AccesoDATA.php';

//para determinar la accion
$modo = isset($_GET['modo']) ? $_GET['modo'] : 'default';

switch ($modo) {
    case 'login':
        //Obtener datos de pag html
        $_POST['user'];
        $_POST['pass'];
        
        //chequea si estan definidas
        if (isset($_POST['pass']) and isset($_POST['user'])) {
            //evalua si la variable esta vacia
            if (empty($_POST['user']) or empty($_POST['pass'])) {
                //redirecciona junto con un valor de error por url
                header('location: ../index.php?error=1');
            } else {
                $login = new AccesoDATA($_POST['user'], $_POST['pass']);

                if ($login->login()) {
                    //crear nueva sesion
                    session_start();
                    //variables para la sesion
                    $_SESSION['usuario'] = $_POST['user'];
                    $_SESSION['pass'] = $_POST['pass'];
                    header('location: ../Vistas/home.php');
                } else {
                    //redirecciona junto con un segundo valor de error
                    header('location: ../index.php?error=2');
                }
            }
        } else {
            //error por el intento de ingresar al sistema sin login
            //redirecciona junto con un tercer valor de error
            header('location: ../index.php?error=3');
        }

        break;

    case 'registro':


        //Obtener datos de pag html
        $_POST['nombreRegistro'];
        $_POST['userRegistro'];
        $_POST['passRegistro'];


        if (empty($_POST['nombreRegistro']) or empty($_POST['userRegistro']) or empty($_POST['passRegistro'])) {
            //redirecciona junto con un valor de error por url
            header('location: ../Vistas/registrarUsuario.php?error=1');
        } else {
            $registro = new AccesoDATA($_POST['userRegistro'], $_POST['passRegistro']);
            $result = $registro->registro($_POST['nombreRegistro']);
            header('location: ../Vistas/registrarUsuario.php?result=' . $result . '');
        }
        break;

    case 'eliminarUsuario':


        $eliminarUsuario = new AccesoDATA('', '');
        $result = $eliminarUsuario->eliminarUsuario($_GET['id']);
        header('location: ../Vistas/gestionarUsuarios.php?result=' . $result . '');
        break;


    default:
        break;
}
?>


