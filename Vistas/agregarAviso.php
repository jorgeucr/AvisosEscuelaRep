
<!DOCTYPE html>
<!--[if lt IE 7]><html class="lt-ie9 lt-ie8 lt-ie7" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><![endif]-->
<!--[if IE 7]><html class="lt-ie9 lt-ie8" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><![endif]-->
<!--[if IE 8]><html class="lt-ie9" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><![endif]-->
<!--[if gt IE 8]><!--><html xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]-->

    <?php
    $fecha = time();

//Chequeo de que exista una sesion
//Necesario para ver el objeto session
    session_start();
//Esta variable contiene un fragmento de codigo que desabilitará la opción de agregar usuarios en caso de que el usuario en sesión sea diferente al usuario administrador
    $habilitarAdmin = 'display:none;';

    if (isset($_SESSION['usuario'])) {
        //pagina de acceso solo para usuarios registrados
        if ($_SESSION['usuario'] == 'admescuela') {
            $habilitarAdmin = '';
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
            $result = 'El aviso ha sido guardado correctamente';
            $display = '';
            $tipoMensaje = 'alert-success';
        } else if ($_GET['result'] == 2) {
            $result = 'Error de conección. El aviso no fue guardado';
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
    <style>
            body{
                padding-top:100px;
            }
        </style>

    <div class="row">
        <div class="large-12 columns">
            <h2>Ingresar un nuevo aviso</h2>
            <span class="subheading">Cada nuevo aviso será guardado junto con el usuario que lo haga como una forma de seguridad.
            </span><br/><br/>
            <br/>


            <form method="post" action="../AppNode/Avisos.php?modo=registroAviso" id="contactform">
                <div>
                    <label for="name">Nombre del aviso</label>
                    <input type="text" class="input-field" id="name" name="nombreAviso" value="">
                </div>
                <div>
                    <label for="descripcion">Categoría</label>
                    <select name="categoriaAviso">
                        <option value="General">General</option>
                        <option value="Banda">Banda</option>
                        <option value="Kinder">Kinder</option>
                        <option value="Primer grado">Primer grado</option>
                        <option value="Segundo grado">Segundo grado</option>
                        <option value="Tercer grado">Tercer grado</option>
                        <option value="Cuarto grado">Cuarto grado</option>
                        <option value="Quinto grado">Quinto grado</option>
                        <option value="Sexto grado">Sexto grado</option>
                    </select>
                </div>
                <br/>
                <div>
                    <label>Descripción</label>
                    <textarea id="descripcion" name="descripcionAviso"></textarea>
                </div>
                <div>
                    <label>Fecha</label>
                    <input id="fecha" type="date" name="fechaAviso">
                </div>
                <div>
                    <label>Hora</label>
                    <input id="hora" type="time" name="horaAviso">
                </div>

                <br/>
                <button class="button" type="submit" id="login-button" style="width:100%;">Guardar aviso</button>
                <br/>
                <?php
                echo ('<div style="' . $display . '" class="alert ' . $tipoMensaje . '">' . $result . '</div>');
                ?>

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