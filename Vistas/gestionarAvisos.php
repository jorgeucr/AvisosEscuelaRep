
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
        //echo 'Bienvenido ', $_SESSION['usuario'], ' a esta nueva sesion';
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
    $display = '';
    $tipoMensaje = 'display:none;';

    if (isset($_GET['result'])) {
        if ($_GET['result'] == 'success') {
            $result = 'El aviso ha sido borrado correctamente';
            $display = '';
            $tipoMensaje = 'alert-success';
        } else if ($_GET['result'] == 'success2') {
            $result = 'Se ejecutó correctamente el borrado de avisos viejos';
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
        <h2>Gestión de avisos</h2>
        <span class="subheading">En este apartado podrá visualizar y borrar los avisos previamente ingresados.
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
        <a href="../AppNode/Avisos.php?modo=eliminarAvisosViejos">Eliminar avisos anteriores de la fecha: <?php echo (date('Y-m-j')); ?></a>
        <br/><br/>
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
                    <th>Nombre del aviso</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Categoría</th>
                    <th>Usuario</th>
                    <th></th>
                </tr>
                <?php
//for
                include '../DataAccess/AvisosDATA.php';

                $avisoData = new AvisoData();
                $array = $avisoData->getAvisos();
                foreach ($array as $value) {

                    echo ('<tr>');
                    echo ('<td>' . $value->getNombreAviso() . '</td>');
                    echo ('<td>' . $value->getDescripcion() . '</td>');
                    echo ('<td>' . $value->getFecha() . '</td>');
                    echo ('<td>' . $value->getHora() . '</td>');
                    echo ('<td>' . $value->getCategoria() . '</td>');
                    echo ('<td>' . $value->getUser() . '</td>');
                    echo ('<td><a href="../AppNode/Avisos.php?modo=eliminarAviso&id=' . $value->getId() . '">Eliminar</a></td>');
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