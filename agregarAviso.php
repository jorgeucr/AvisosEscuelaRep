
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
        //echo 'Bienvenido ', $_SESSION['usuario'], ' a esta nueva sesion';
        if ($_SESSION['usuario'] == 'jorge') {
            $habilitarAdmin = '';
        }
    } else if (!isset($_SESSION['usuario'])) {
        session_start();
        session_destroy();
        header('location: index.php?error=4');
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

                <!--Como se usa navbar-fixed-top hasy que agregar este estilo para que el texto nunca se oculte detras de la barra de navegacion-->
                <style>
                    body{
                        padding-top:100px;
                    }
                </style>


        </head>
        <body>
            <div id="top"  data-magellan-expedition="fixed">
                <div class="row">
                    <div class="large-12 columns">
                        <nav class="top-bar">
                            <ul class="title-area">
                                <li class="name logo">
                                    <a href="#"><img src="img/logo.png"  alt=""></a>
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



            <div class="row">
                <div class="large-12 columns">
                    <h2>Ingresar un nuevo aviso</h2>
                    <span class="subheading">Cada nuevo aviso será guardado junto con el usuario que lo haga como una forma de seguridad.
                    </span><br/><br/>
                    <br/>


                    <form method="post" action="AppNode/Avisos.php?modo=registroAviso" id="contactform">
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