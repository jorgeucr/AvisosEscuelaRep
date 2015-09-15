
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
        } else {
            header('location: ../index.php');
        }
    } else if (!isset($_SESSION['usuario'])) {
        session_start();
        session_destroy();
        header('location: ../index.php?error=4');
    }

    //$result mensaje que se desplegará
    $result = '';
    $display = '';
    $tipoMensaje = 'display:none;';

    if (isset($_GET['result'])) {
        if ($_GET['result'] == 'success') {
            $result = 'El usuario ha sido borrado correctamente';
            $display = '';
            $tipoMensaje = 'alert-success';
        } else if ($_GET['result'] == 'error') {
            $result = 'Error de conección. El aviso no fue borrado';
            $display = '';
            $tipoMensaje = 'alert-danger';
        }
    }
    unset($_GET['result']);

    include './header.php';
    ?>
 <!--Como se usa navbar-fixed-top hasy que agregar este estilo para que el texto nunca se oculte detras de la barra de navegacion-->
        <style>
            body{
                padding-top:100px;
            }
        </style>

    <div class="container">
        <h2>Gestión de usuarios</h2>
        <span class="subheading">En este apartado podrá visualizar y borrar los usuarios previamente ingresados.
        </span><br/>

        <div class="container-fluid">
            <br>
                <div class="row">
                    <div class="col-lg-12">
                        <!--Alertas-->
                        <?php
                        echo ('<div style="' . $display . '" class="alert ' . $tipoMensaje . '">' . $result . '</div>');
                        ?>	

                    </div>
                </div>

        </div>
        <!--tabla respons. Se encierra en un div-->
        <div class="table-responsive">
            <!--table-striped alterna los colores de cada fila de la tabla
            table-hover cambia el color cuando el puntero pasa 
            table-condensed comprimir contenido
            -->
            <table class="table table-striped table-bordered table-hover table-condensed">
                <!--class="active" selecciona una celda o fila
                success, danger, warning le da color
                -->
                <tr class="success">
                    <th>Nombre completo</th>
                    <th>Usuario</th>
                    <th>Contraseña</th
                    <th></th>

                    <th></th>
                </tr>
                <?php
                include '../DataAccess/AccesoDATA.php';

                $accesoData = new AccesoDATA('', '');
                $array = $accesoData->getUsuarios();

                foreach ($array as $value) {

                    echo ('<tr>');
                    echo ('<td>' . $value->getNombre() . '</td>');
                    echo ('<td>' . $value->getUser() . '</td>');
                    echo ('<td>' . $value->getPass() . '</td>');
                    echo ('<td><a href="../AppNode/Acceso.php?modo=eliminarUsuario&id=' . $value->getId() . '">Eliminar</a></td>');
                    echo ('</tr>');
                }
                ?>

            </table>
        </div>
    </div>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>

    <?php
    include './footer.php';
    ?>