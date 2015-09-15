
<!DOCTYPE html>
<!--[if lt IE 7]><html class="lt-ie9 lt-ie8 lt-ie7" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><![endif]-->
<!--[if IE 7]><html class="lt-ie9 lt-ie8" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><![endif]-->
<!--[if IE 8]><html class="lt-ie9" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><![endif]-->
<!--[if gt IE 8]><!--><html xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]-->

    <?php
//Chequeo de que exista una sesion
//Necesario para ver el objeto session
    session_start();
//Esta variable contiene un fragmento de codigo que desabilitará la opción de agregar usuarios en caso de que el usuario en sesión sea diferente al usuario administrador
    $habilitarAdmin = 'display:none;';

    if (isset($_SESSION['usuario'])) {
        //pagina de acceso solo para usuarios registrados
        if ($_SESSION['usuario'] == 'admescuela') {
            $habilitarAdmin = '';
        }  else {
            header('location: ../index.php?error=4');
        }
    } else if (!isset($_SESSION['usuario'])) {
        session_start();
        session_destroy();
        header('location: ../index.php?error=4');
    }



    //$result mensaje que se desplegará
    $result = '';
    $display = 'display:none;';
    $tipoMensaje = '';

    if (isset($_GET['result'])) {
        if ($_GET['result'] == 1) {
            $result = 'El usuario ha sido guardado correctamente';
            $display = '';
            $tipoMensaje = 'alert-success';
        } else if ($_GET['result'] == 2) {
            $result = 'Error de conección. El usuario no fue guardado';
            $display = '';
            $tipoMensaje = 'alert-danger';
        } else if ($_GET['result'] == 3) {
            //error por el intento de ingresar al sistema sin login
            $result = 'El usuario ya existe, cambielo e inténtelo nuevamente';
            $display = '';
            $tipoMensaje = 'alert-danger';
        }
    }
    unset($_GET['result']);

    if (isset($_GET['error'])) {
        if ($_GET['error'] == 1) {
            $result = 'Debe de completar todos los espacios';
            $display = '';
            $tipoMensaje = 'alert-danger';
        }
        unset($_GET['error']);
        unset($_GET['result']);
    }

    include './header.php';
    ?>
    <!--Como se usa navbar-fixed-top hasy que agregar este estilo para que el texto nunca se oculte detras de la barra de navegacion-->
    <style>
        body{
            padding-top:100px;
        }
    </style>
    <div class="row">
        <div class="large-12 columns">
            <h2>Ingresar un nuevo usuario</h2>
            <span class="subheading">El unico usuario que tiene permitido ingresar a este apartado es el actual. Ningún otro puede agregar un usuario
            </span><br/><br/>
            <br/>


            <form method="post" action="../AppNode/Acceso.php?modo=registro" id="contactform">
                <div>
                    <label for="name">Nombre completo</label>
                    <input type="text" class="input-field" id="name" name="nombreRegistro" value="">
                </div>
                <div>

                    <label for="email">Nombre de usuario</label>
                    <input type="text" class="input-field" id="email" name="userRegistro" value="">
                </div>
                <div>
                    <label for="email">Contraseña</label>
                    <input type="text" class="input-field" id="email" name="passRegistro" value="">
                </div>
                <button class="button" type="submit" id="login-button" style="width:100%;">Guardar usuario</button>
                <br/>


                <?php
                echo ('<div style="' . $display . '" class="alert ' . $tipoMensaje . '">' . $result . '</div>');
                ?>

            </form>
            <form action="../Vistas/gestionarUsuarios.php">
                <button class="button" type="submit" id="login-button" style="width:100%;">Gestionar usuarios</button>
            </form>

        </div>

    </div>
    <br/>
    <br/>
    <br/>
    <br/>

    <?php
    include './footer.php';
    ?>