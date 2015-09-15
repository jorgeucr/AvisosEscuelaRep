
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
    include './header.php';
    ?>

    <header id="header" >
        <div class="row">

            <div class="large-6 columns">
                <div id="teaser-slider-2">
                    <div class="flexslider">
                        <ul class="slides">
                            <li>
                                <img src="../img/slides/iphoneshots-1.jpg" alt="Petrichor - slider">
                            </li>
                            <li>
                                <img src="../img/slides/iphoneshots-2.jpg" alt="Petrichor - slider">
                            </li>
                            <li>
                                <img src="../img/slides/iphoneshots.jpg" alt="Petrichor - slider">
                            </li>
                        </ul>
                    </div> 
                </div>
            </div>

            <div class="large-6 columns container-fluid">
                <h1>Escuela Higuito del Guarco</h1>
                <span class="subheading">Gestión de avisos para los padres de familia del alumnado</span>
            </div>
        </div>
    </header>

    <br/>
    <div id="features" class="section features" data-magellan-destination="features">
        <div class="row hi-icon-wrap hi-icon-effect-3 hi-icon-effect-3b">
            <div class="large-6 columns feature">
                <a href="agregarAviso.php"><span class="icon icon-paperplane hi-icon"></span></a>
                <h3>Agregar un nuevo aviso</h3>
                <p>Inserte en la base de datos un aviso fechado y categorizado correspondiente a las actividades de la escuela de Higuito del Guarco. Estos avisos podrán ser vistos por la población de padres de familia relacionados a la escuela mediante la aplicación móvil "Escuela Higuito del Guarco" 
                </p>
            </div>
            <div class="large-6 columns feature">
                <a href="gestionarAvisos.php"><span class="icon icon-tools hi-icon"</span></a>
                <h3>Gestionar avisos</h3>
                <p>Revice la validez de los avisos previamente almacenados en la base de datos pudiendo en casos extraordinarios, modificar o eliminar de forma separada cada uno de los registros. 

                </p>
            </div>
        </div>
    </div>
    <?php
    include './footer.php';
    ?>