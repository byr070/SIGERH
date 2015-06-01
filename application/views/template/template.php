<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
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
    <div class="top" style="text-align:right;">
        <?php echo anchor('/inicio/', 'Inicio');?>
        <?php if ($is_admin): echo anchor('/configuracion/', 'Configuración'); endif;?>
         Hola, <strong><?php echo $username; ?></strong>!
         <?php echo anchor('/auth/logout/', 'Salir'); ?>
    </div>
    <!-- Fin Cabecera -->
    <?php $modulo=$this->uri->segment(1); ?>
    <!-- Inicio Menu -->
    <?php if(!is_null($menu)) { ?>
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
        <?php endforeach; }?>
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