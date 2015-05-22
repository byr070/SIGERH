<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

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
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */
            height: 60px;
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <!-- Inicio Cabecera -->
    <nav class="navbar navbar-inverse">
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


        <div class="collapse navbar-collapse">


            <?php if(!is_null($menu)) { ?>
            <ul class="nav navbar-nav navbar-left">
                <?php foreach($menu as $item):
                $modulo=$this->uri->segment(1); ?>
                <li>
                    <?php echo ($modulo == strtolower($item)) ? '' : '' ; ?>
                    <a href='<?php echo site_url(''.strtolower($item).'/')?>'><?php echo $item;?></a>
                </li>
                <?php endforeach; }?>
            </ul>


          <ul class="nav navbar-nav navbar-right">
            <li><?php echo anchor('/inicio/', 'Inicio');?></li>
            <li><?php if ($is_admin): echo anchor('/configuracion/', 'Configuración'); endif;?></li>
            <li><?php echo anchor('/auth/logout/', 'Salir');?></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Fin Cabecera -->

    <?php $modulo=$this->uri->segment(1); ?>

    <!-- Inicio Menu -->
    <?php if(!is_null($menu)) { ?>
    <ul class="nav nav-tabs nav-justified">
        <?php foreach($menu as $item):
            $modulo=$this->uri->segment(1); ?>
        <li role="presentation">
            <?php echo ($modulo == strtolower($item)) ? '' : '' ; ?>
            <a href='<?php echo site_url(''.strtolower($item).'/')?>'><?php echo $item;?></a>
        </li>
        <?php endforeach; }?>
    </ul>
    <!-- Fin Menu -->

    <div>
        <?php if(!is_null($output)) {
           echo $output;
        }?>
    </div>


    
    
    <!-- Inicio Pie -->
    <footer class="footer">
        <div class="container" >
            <p class="text-muted" style="float: left;">
                <span class="glyphicon glyphicon-copyright-mark"></span>
                2015 SIGERH. Todos los derechos reservados
            </p>
            <p class="text-muted" style="float: right;">
                <span class="glyphicon glyphicon-time  "></span>
                Página mostrada en <strong>{elapsed_time}</strong> segundos
            </p>
        </div>
            
    </footer>
    <!-- Fin Pie -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
</body>
</html>