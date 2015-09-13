<?php
//Get porque se estan enviando valores por medio del url
$msjError = '';
$display = 'display:none;';

if (isset($_GET['error'])) {
    if ($_GET['error'] == 1) {
        $msjError = 'Debes de completar todos los campos';
        $display = '';
    } else if ($_GET['error'] == 2) {
        $msjError = 'Datos incorrectos';
        $display = '';
    } else if ($_GET['error'] == 3) {
        //error por el intento de ingresar al sistema sin login
        $msjError = 'Debes de ingresar los datos antes de continuar';
        $display = '';
    } else if ($_GET['error'] == 4) {
        //error por el intento de ingresar al sistema sin login
        $msjError = 'Debes de ingresar los datos antes de continuar';
        $display = '';
    }
    //Borra variable de la memoria
    unset($_GET['error']);
}
?>


<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styleLogin.css">
    </head>

    <body>
        <br/>
        <?php
        echo ('<div style="' . $display . '" class="alert alert-info">' . $msjError . '</div>');
        ?>


        <div class="wrapper">
            <div class="container">
                <h1>Bienvenido</h1>

                <form class="form" action="AppNode/Acceso.php?modo=login" method="post">
                    <input type="text" placeholder="Usuario" name="user">
                    <input type="password" placeholder="Contraseña" name="pass">
                    <button type="submit" id="login-button">Login</button>
                    <br/>
                </form>
            </div>

            <ul class="bg-bubbles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js/index.js"></script>
    </body>
</html>
