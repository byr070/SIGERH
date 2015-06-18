<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap-clockpicker.min.css") ?>">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php if(!is_null($css_files)) { ?>
    <?php foreach($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php endforeach; 
    } 
    if(!is_null($js_files)) {
        foreach($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach;
    } ?>
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
    <div class="top" style="text-align:right;">
        <?php echo anchor('/inicio/', 'Inicio');?>
        <?php if ($is_admin): echo anchor('/configuracion/', 'Configuración'); endif;?>
         Hola, <strong><?php echo $username; ?></strong>!
         <?php echo anchor('/auth/logout/', 'Salir'); ?>
    </div>
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
                    echo 'Salidas';
                    break;
                case 'Tipos_permiso': 
                    echo 'Permisos'; 
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
        <?php if(!is_null($output)) { ?>
        <?php echo $output; ?>
        <?php } ?>
    </div>
    <!-- Inicio Pie -->
    <div class="footer">
            <p style="float: left;">© 2015 SIGERH. Todos los derechos reservados.</p>
            <p style="float: right;">Página mostrada en <strong>{elapsed_time}</strong> segundos.</p>
    </div>
    <!-- Fin Pie -->
</body>
</html>