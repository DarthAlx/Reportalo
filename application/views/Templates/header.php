<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="<?=base_url()?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url()?>css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?=base_url()?>css/main.css">
        <link rel="stylesheet" href="<?=base_url()?>css/animate.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="<?=base_url()?>js/vendor/bootstrap.min.js"></script>
        <script src="<?=base_url()?>js/wow.min.js"></script>
        <script src="<?=base_url()?>js/main.js"></script>
        <script src="<?=base_url()?>js/animate.js"></script>
        <script src="https://use.fontawesome.com/a95323d4b8.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
        <script src="<?=base_url()?>js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="navigation container">
          <section class="top">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-3 logo">
                  <a href="<?=base_url()?>"><img src="<?=base_url()?>img/logo.png" alt="" class="img-responsive"></a>
                </div>
                <div class="col-sm-5 tel">
                  01 800 Repórtalo
                </div>
                <div class="col-sm-4 menu text-right">
                  <a href="#" onclick="clickmenu();">MENÚ</a>  |  <a href="#" onclick="clickredes();">REDES</a>
                </div>
              </div>
            </div>
          </section>
        </div>

        <section class="menudesp" style="width: 100%; display: none;">
          <div class="text-center">
            <h2><a href="<?=base_url()?>">INICIO</a></h2>
            <h2><a href="<?=base_url()?>index.php/about">PROYECTO REPÓRTALO</a></h2>
            <h2><a href="<?=base_url()?>index.php/dudas">TIENES DUDAS</a></h2>
            <h2><a href="<?=base_url()?>index.php/noticias">NOTICIAS</a></h2>
            <h2><a href="<?=base_url()?>index.php/alianzas">NUESTRAS ALIANZAS</a></h2>
            <h2><a href="<?=base_url()?>index.php/contacto#">CONTÁCTANOS</a></h2>
          </div>
        </section>

        <section class="menuredes" style="width: 100%;  display: none;">
          <div class="text-center">

              <div class="text-center"><i class="fa fa-facebook redes" aria-hidden="true"></i><i class="fa fa-twitter redes" aria-hidden="true"></i></div>

          </div>
        </section>
        <?php if($this->session->userdata('logueado')){ ?>
        <section class="cuenta">
          <div class="container">
            Hola <?=ucfirst($this->session->userdata('aliasuser'))?> | <a href="<?php echo base_url() ?>index.php/admin">Publicar noticia</a> | <a href="<?php echo base_url() ?>index.php/usuarios/cerrar_sesion">Cerrar sesión</a>

          </div>
        </section>
        <?php }?>
