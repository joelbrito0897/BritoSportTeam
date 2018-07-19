<?php
class plantilla{
    static $instancia=null;
    static function apply(){
        self::$instancia=new plantilla();
    }

    function __construct(){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <!-- CSS -->
            <link rel="stylesheet" href="<?= base_url()?>useFile/css/style.css">
            <link rel="stylesheet" href="<?= base_url()?>useFile/css/main.css">
            
            <link rel="stylesheet" href="<?= base_url()?>useFile/css/lightbox.css">
            <!-- Font Awesome -->
            <script src="https://use.fontawesome.com/12f32993c1.js"></script>
            <!-- Bootstrap -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
            <!-- Google Font -->
            <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">
        
          	<link rel="shortcut icon" href="<?=base_url()?>useFile/img/icon.png"/>
            <title>Brito Sport Team</title>
        </head>
        <body style="background-color:#f2f2f2;">
            <header class="site-header">
                <div class="hero">
                    <div class="contenido-header">
                    <nav class="redes-sociales">
                        <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a> 
                        <a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                        <a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </nav>
                    <div class="informacion">
                        <h1 class="nombre-sitio">brito sport team</h1>
                        <p class="slogan">Amor por el deporte y sed por el triunfo.</p>
                    </div>
                    </div>
                </div>
            </header>

            <!-- ****************************** -->
            <div class="barra">
                <div class="contenedor">
                    <nav class="navegacion-principal">
                        <ul>
                        
                            <li><a href="<?= base_url('sport')?>">Inicio</a></li>
                            <li><a href="<?=base_url('Sport/noticias')?>">Noticias</a></li>

                    <?php
                        if (isset($_SESSION['idMiembro'])) {
                            ?>
                            <li><a href="<?=base_url('Sport/miembro')?>">Miembros</a></li>
                            <?php
                        } else {
                            ?>
                             <div class="dropdown">
                            <a class="dropdown-toggle estil" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Miembros
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="<?=base_url('Sport/verificarCedula')?>">Registrar</a>
                                <a class="dropdown-item" href="<?= base_url('Sport/loginMiembro')?>">Iniciar Sesion</a>
                            </div>
                            </div> 
                            <?php
                        }
                        
                    ?>
                            <!-- <li><a href="#">Miembors</a></li>
                                <ul>
                                    <li><a href="#">Registrate</a></li>
                                    <li><a href="#">Iniciar Sesion</a></li>
                                </ul> -->
                            <li><a href="<?=base_url('Sport/galeria')?>">Galeria</a></li>
                            <li><a href="<?=base_url('Sport/eventos')?>">Eventos</a></li>
                            <li><a href="<?=base_url('Sport/clasificados')?>">Clasificados</a></li>
                            <li><a href="<?=base_url('Sport/contacto')?>">Contactos</a></li>
                            <li><a href="<?=base_url('Sport/faq')?>">Faq</a></li>
                            <li><a href="<?=base_url('Admin')?>">Admin</a></li>
                            <span class="mx-5"></span>
                            <?php if(isset($_SESSION['nombre'])){
                                ?>
                                <li><a href="<?= base_url('Sport/miembroById/').$_SESSION['idMiembro']?>">Hola <?= $_SESSION['nombre']?></a></li>
                                                    <li><a href="">|</a></li> 
                                <li><a href="<?=base_url('Sport/logout')?>">Cerrar Session </a></li>
                                <?php
                            }
                            ?>

                        </ul>
                    </nav>
                </div>
            </div>
            <div>
            
           
        <?php
    }
    function __destruct(){
        ?>
         </div>
        </body>
        <footer class="footer">
        <h1 class="nombre">Copyright © Brito Sport Team. All rights reserved.</h1>
            
            
        </footer>
        </html>
        <?php
    }
    
}