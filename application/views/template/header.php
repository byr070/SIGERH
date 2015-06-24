<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SIGERH</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/numericKeyboard.css") ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-clockpicker.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-datetimepicker.min.css') ?>">

    <?php if(!is_null($css_files)) {
        foreach($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php endforeach; 
    } 
    
    if(!is_null($js_files)) {
        foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
        <?php endforeach;
    } ?>
    <style type="text/css">
      .footer{
        padding-left: 15px;
        padding-right: 15px;
      }
    </style> 

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Inicio Cabecera -->
    <div class="navbar navbar-inverse">
          <div class="container">
            <div class="navbar-header">
              <a href="" class="navbar-brand">SIGERH</a>

              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <div id="navbar1" class="collapse navbar-collapse navbar-right">
              <ul class="nav navbar-nav">
                  <li><?php echo anchor('/inicio/', '<span class="glyphicon glyphicon-home"></span> INICIO');?></li>
                  <li><?php if ($is_admin): echo anchor('/configuracion/', '<span class="glyphicon glyphicon-cog"></span> Configuración'); endif;?></li>
                  <li><?php echo anchor('/auth/logout/', '<span class="glyphicon glyphicon-log-out"></span> Salir'); ?></li>
              </ul>
            </div>
          </div> <!-- end container -->
        </div> <!-- end navbar -->
    <!-- Fin Cabecera -->
