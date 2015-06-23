<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIGERH</title>


    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/numericKeyboard.css") ?>">


</head>

<body>

<!-- Inicio Cabecera -->
<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="" class="navbar-brand">SIGERH</a>

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <div class="collapse navbar-collapse navbar-right">
          <ul class="nav navbar-nav">
              <li><?php echo anchor('/inicio/', 'Inicio');?></li>
              <li><?php if ($is_admin): echo anchor('/configuracion/', 'Configuración'); endif;?></li>
              <li><?php echo anchor('/auth/logout/', 'Salir'); ?></li>
          </ul>
        </div>
      </div> <!-- end container -->
    </div> <!-- end navbar -->
<!-- Fin Cabecera -->