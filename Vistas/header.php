<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>

        <title>Escuela Higuito del Guarco</title>
        <link rel="shortcut icon" href="../img/iconApp.png">

        <link rel="stylesheet" href="../css/normalize.css" />
        <link rel="stylesheet" href="../css/foundation.min.css" />
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/ie.css" />
        <link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'/>
        <link href='http://fonts.googleapis.com/css?family=Cabin+Condensed:600' rel='stylesheet' type='text/css'/>

        <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="../js/vendor/custom.modernizr.js"></script>


    </head>
    <body>
        <div id="top"  data-magellan-expedition="fixed">
            <div class="row">
                <div class="large-12 columns">
                    <nav class="top-bar">
                        <ul class="title-area">
                            <li class="name logo">
                                <a class="visible-lg visible-md navbar-brand" href="#ventana1" data-toggle="modal">
                                    <img src="../img/iconApp.png">
                                </a>
                            </li>
                            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
                        </ul>

                        <section class="top-bar-section">
                            <ul class="right" id="menu">
                                <li data-magellan-arrival="contact"><a href="home.php">Home</a></li>
                                <li><a class="visible-sm visible-xs" href="#ventana1" data-toggle="modal">Acerca de</a></li>
                                <?php
                                echo ('<li style="' . $habilitarAdmin . '" data-magellan-arrival="contact"><a href="registrarUsuario.php">Agregar usuario</a></li>');
                                ?>
                                <li data-magellan-arrival="contact"><a href="../AppNode/Logout.php">Cerrar Sesión</a></li>
                            </ul>
                        </section>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="modal fade" id="ventana1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!--header de la ventana-->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Gestión de avisos de la escuela de Higuito del Guarco</h4>
                        </div>
                        <!--contenido-->
                        <div class="modal-body">
                            <p>La presente aplicacción tiene como objetivo el informar oportunamente a los padres de familia relacionados a la escuela
                                Higuito del Guarco por medio de la publicación y gestión de avisos los cuales podrán ser visualizados por la aplicación móvil "Avisos Escuela de Higuito"
                                disponible de forma gratuita en la Play Store de Google</p>
                            <br/>
                            <p>La aplicación corresponde al proyecto del Trabajo Comunal Universitario 606 de la Universidad de Costa Rica</p>
                            <br/>
                            <p>Desarrollador: Jorge Castillo Vindas <br/>E-mail: jorge.art.castillo@gmail.com</p>
                            <div align="center"><img  src="../img/ucr.png"></div>
                            
                            <ul class="inline-list">
                                <li align="center" class="copyright">2015 &copy; Gestión de avisos de la Escuela de Higuito del Guarco</a></li>

                            </ul>

                        </div>
                        <!--footer-->
                        <div class="modal-footer">
                            <button type="buttion" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

