<?php

//Login, Registro

include '../DataAccess/AvisosDATA.php';

//Chequeo de que exista una sesion
//Necesario para ver el objeto session
session_start();
if (!isset($_SESSION['usuario'])) {
    session_start();
    session_destroy();
    header('location: ../index.php?error=4');
}
//para determinar la accion
$modo = isset($_GET['modo']) ? $_GET['modo'] : 'default';

switch ($modo) {
    case 'registroAviso':
        if (empty($_POST['nombreAviso']) or empty($_POST['descripcionAviso']) or empty($_POST['categoriaAviso']) or empty($_POST['fechaAviso'])) {
            //redirecciona junto con un valor de error por urldescripcionAviso    or empty($_POST['categoriaAviso']) or empty($_POST['nombreAviso']) or empty($_POST['fechaAviso']) or empty($_POST['horaAviso']) or empty($_POST['descripcionAviso'])
            header('location: ../Vistas/agregarAviso.php?error=1');
        } else {
            $registroAviso = new AvisoData();
            $result = $registroAviso->agregarAviso($_SESSION['usuario'], $_POST['nombreAviso'], $_POST['descripcionAviso'], $_POST['categoriaAviso'], $_POST['fechaAviso'], $_POST['horaAviso']);

            header('location: ../Vistas/agregarAviso.php?result=' . $result . '');
        }

        break;

        
    case 'eliminarAviso':

        $eliminarAviso = new AvisoData();
        $result = $eliminarAviso->eliminarAviso($_GET['id']);
        header('location: ../Vistas/gestionarAvisos.php?result=' . $result . '');
        break;

    case 'eliminarAvisosViejos':
        $eliminarAviso = new AvisoData();
        $result = $eliminarAviso->eliminarAvisosViejos();
        header('location: ../Vistas/gestionarAvisos.php?result=' . $result . '');
        break;


    default:
        break;
}
?>