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
    <style type="text/css">
    div.footer{
        text-align: right;
        font-size: 11px;
        border-top: 1px solid #D0D0D0;
        line-height: 32px;
        padding: 0 10px 0 10px;
        margin: 20px 0 0 0;
    }
    </style>
</head>
<body>
    <!-- Inicio Cabecera -->
    <div class="navbar navbar-inverse">
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
          <ul class="nav navbar-nav navbar-right">
            <li><?php echo anchor('/inicio/', 'Inicio');?></li>
            <li><?php if ($is_admin): echo anchor('/configuracion/', 'Configuración'); endif;?></li>
            <li><?php echo anchor('/auth/logout/', 'Salir');?></li>
          </ul>
        </div>
      </div> <!-- end container -->
    </div> <!-- end navbar -->
    <!-- Fin Cabecera -->

    <?php $modulo=$this->uri->segment(1); ?>

    <!-- Inicio Menu -->
    <?php if(!is_null($menu)): ?>
    <ul class="nav nav-tabs nav-justified">
        <?php foreach($menu as $item):
            $modulo=$this->uri->segment(1); ?>
        <li role="presentation">
            <?php echo ($modulo == strtolower($item)) ? '' : '' ; ?>
            <a href='<?php echo site_url(''.strtolower($item).'/')?>'>
                <?php switch ($item):
                case 'Periodos_salida':
                    echo 'Periodos de Salida';
                    break;
                case 'Tipos_permiso': 
                    echo 'Tipos de Permiso'; 
                    break;
                case 'Modulos':
                    echo 'Módulos';
                    break;
                default: 
                    echo $item; 
                    break;
                endswitch; ?>
            </a>
        </li>
        <?php endforeach; ?>
        <?php endif; ?>
    </ul>
    <!-- Fin Menu -->

    <div>
        <?php if(!is_null($output)) {
           echo $output;
        }?>
    </div>




    <!-- Inicio Pie -->
    <div class="footer">
            <p class="text-muted" style="float: left;">
                <span class="glyphicon glyphicon-copyright-mark"></span>
                2015 SIGERH. Todos los derechos reservados
            </p>
            <p class="text-muted" style="float: right;">
                <span class="glyphicon glyphicon-time  "></span>
                Página mostrada en <strong>{elapsed_time}</strong> segundos
            </p>
    </div>
    <!-- Fin Pie -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
</body>
</html>