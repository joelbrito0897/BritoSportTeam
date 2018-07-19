<?php
class admi{
    static $instancia=null;
    static function apply(){
        self::$instancia=new admi();
    }
    
    public function __construct(){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Admin|Brito Sport Team</title>
          <link rel="shortcut icon" href="<?=base_url()?>useFile/img/icon.png"/>
           <!-- CSS -->
           <link rel="stylesheet" href="<?= base_url()?>useFile/css/style.css">
           <link rel="stylesheet" href="<?= base_url()?>useFile/css/main.css">
           <!-- Font Awesome -->
           <script src="https://use.fontawesome.com/12f32993c1.js"></script>
           <!-- Bootstrap -->
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
           <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
           <!-- Google Font -->
           <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">
           <!-- Editor WySiWyG  -->
           <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
            <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
            <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
            <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
            <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
        </head>
        <body style="background-color:#f2f2f2;">
            <header class="site-header">
                <div class="hero">
                    <div class="contenido-header">
                    <div class="informacion">
                        <h1 class="nombre-sitio">brito sport team</h1>
                        <p class="slogan">Amor por el deporte y sed por el triunfo.</p>
                    </div>
                    </div>
                </div>
            </header>

            <!-- barra -->
            <div class="barra">
                <div class="contenedor">
                    <nav class="navegacion-principal">
                        <ul>
                            <li><a href="<?=base_url('admin/noticias')?>"><i class="fa fa-plus-circle" aria-hidden="true"></i> Noticias</a></li>
                            <li><a href="<?=base_url('admin/Miembros')?>">Miembros</a></li>
                            <li><a href="<?=base_url('admin/galeria')?>"><i class="fa fa-plus-circle" aria-hidden="true"></i> Galeria</a></li>
                            <li><a href="<?=base_url('admin/eventos')?>"><i class="fa fa-plus-circle" aria-hidden="true"></i> Eventos</a></li>
                            <li><a href="<?=base_url('admin/clasificados')?>">Clasificados</a></li>
                            <li><a href="<?=base_url('admin/contactos')?>">Contactos</a></li>
                            <li><a href="<?=base_url('admin/faq')?>">Faq</a></li>
                            <li><a href="<?=base_url('Admin/registerAdmin')?>"><i class="fa fa-plus-circle" aria-hidden="true"></i> Admin</a></li>
                            <span class="mx-5"></span><span class="mx-5"></span><span class="mx-5"></span>
                            <?php if(isset($_SESSION['user'])){
                                ?>
                                <li><a href="">Hola <?= $_SESSION['user']?></a></li>
                                                    <li><a href="">|</a></li> 
                                <li><a href="<?=base_url('admin/logout')?>">Cerrar Session </a></li>
                                <?php
                            }else{
                                ?>
                                <li><a href="<?=base_url('admin/login')?>">Iniciar Session</a></li>
                               <?php
                            }?>

                        </ul>
                    </nav>
                </div>
            </div>
            <div>
            
        </body>
        </html>
        <?php
    }
    public function __destruct(){
        ?>
        <?php
    }
}