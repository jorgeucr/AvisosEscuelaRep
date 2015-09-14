
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
        if ($_SESSION['usuario'] == 'jorge') {
            $habilitarAdmin = '';
        }
    } else if (!isset($_SESSION['usuario'])) {
        session_start();
        session_destroy();
        header('location: ../index.php?error=4');
    }
    ?>

    <html>
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>

                <title>Escuela Higuito del Guarco</title>

                <link rel="stylesheet" href="css/normalize.css" />
                <link rel="stylesheet" href="css/foundation.min.css" />
                <link rel="stylesheet" href="css/style.css" />
                <link rel="stylesheet" href="css/ie.css" />
                <link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'/>
                <link href='http://fonts.googleapis.com/css?family=Cabin+Condensed:600' rel='stylesheet' type='text/css'/>

                <script src="js/vendor/custom.modernizr.js"></script>


        </head>
        <body>
            <div id="top"  data-magellan-expedition="fixed">
                <div class="row">
                    <div class="large-12 columns">
                        <nav class="top-bar">
                            <ul class="title-area">
                                <li class="name logo">
                                    <a href="#ventana1" data-toggle="modal"><img src="img/iconApp.png"  alt=""></a>
                                </li>
                                <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
                            </ul>

                            <section class="top-bar-section">
                                <ul class="right" id="menu">
                                    <li data-magellan-arrival="contact"><a href="home.php">Home</a></li>
                                    <?php
//                                                //echo ('<div style="' . $display . '" class="alert alert-info">' . $msjError . '</div>');
                                    echo ('<li style="' . $habilitarAdmin . '" data-magellan-arrival="contact"><a href="registrarUsuario.php">Agregar usuario</a></li>');
                                    ?>
                                    <li data-magellan-arrival="contact"><a href="AppNode/Logout.php">Cerrar Sesión</a></li>
                                </ul>
                            </section>
                        </nav>
                    </div>
                </div>
            </div>

            <header id="header" >
                <div class="row">

                    <div class="large-6 columns">
                        <div id="teaser-slider-2">
                            <div class="flexslider">
                                <ul class="slides">
                                    <li>
                                        <img src="img/slides/iphoneshots-1.jpg" alt="Petrichor - slider">
                                    </li>
                                    <li>
                                        <img src="img/slides/iphoneshots-2.jpg" alt="Petrichor - slider">
                                    </li>
                                    <li>
                                        <img src="img/slides/iphoneshots.jpg" alt="Petrichor - slider">
                                    </li>
                                </ul>
                            </div> 
                        </div>
                    </div>

                    <div class="large-6 columns container-fluid">
                        <h1>Escuela Higuito del Guarco</h1>
                        <span class="subheading">Gestión de avisos para los padres de familia del alumnado</span>

                        <!--<a href="#ventana1" data-toggle="modal"><img src="img/Button.png" alt="" class="img-responsive img-rounded"></a>-->
                        <div class="modal fade" id="ventana1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    header de la ventana
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Encabezado de nuestra ventana</h4>
                                    </div>
                                    contenido
                                    <div class="modal-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab tempore eos aut atque repellendus vitae, mollitia magni molestias, earum officiis quas voluptatem non, sapiente sequi quod labore eius debitis quos.</p>
                                    </div>
                                    footer
                                    <div class="modal-footer">
                                        <button type="buttion" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        <button type="buttion" class="btn btn-primary" data-dismiss="modal">Guardar cambios</button>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                        <a href="Vistas/gestionarAvisos.php"><span class="icon icon-tools hi-icon"</span></a>
                        <h3>Gestionar avisos</h3>
                        <p>Revice la validez de los avisos previamente almacenados en la base de datos pudiendo en casos extraordinarios, modificar o eliminar de forma separada cada uno de los registros. 

                        </p>
                    </div>
                </div>
            </div>
            <footer>
                <div class="row">
                    <div class="large-6 columns">
                        <ul class="inline-list">
                            <li class="copyright">2015 &copy; Gestión de avisos de la Escuela de Higuito del Guarco</a></li>

                        </ul>
                    </div>
                </div>
            </footer>			
            <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
            <script type="text/javascript" src="js/foundation.min.js"></script>
            <script type="text/javascript" src="js/functions.js"></script>
            <script type="text/javascript" src="js/jquery.nicescroll.js"></script>
            <script src="js/jquery.localscroll-1.2.7.js" type="text/javascript"></script>
            <script src="js/jquery.scrollTo-1.4.3.1.js" type="text/javascript"></script>
            <link rel="stylesheet" href="css/flexslider.css"> <!-- Flex slider -->
                <script src="js/jquery.flexslider.js" type="text/javascript"></script><!-- Flex slider -->
                <script type="text/javascript" src="js/custom.js"></script>


        </body>
    </html>