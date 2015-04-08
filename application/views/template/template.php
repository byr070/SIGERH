<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <?php foreach($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php endforeach; ?>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
    <style type='text/css'>
        body {
            font-family: Arial;
            font-size: 14px;
        }
        a {
            color: blue;
            text-decoration: none;
            font-size: 14px;
        }
        a:hover {
            text-decoration: underline;
        }
        div.footer{
            text-align: right;
            font-size: 11px;
            border-top: 1px solid #D0D0D0;
            line-height: 32px;
            padding: 0 10px 0 10px;
            margin: 20px 0 0 0;
        }

.navbar {
  margin-bottom: 20px;
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
    <nav class="navbar navbar-default">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <?php foreach($menu as $item): ?>
            <?php $modulo=$this->uri->segment(1); ?>
            <li <?php echo ($modulo == strtolower($item)) ? 'class="active"' : '' ; ?> ><a href='<?php echo site_url(''.strtolower($item).'/')?>'><?php echo $item;?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>
<?php } ?>
    <!-- Fin Menu -->
    <div>
        <?php echo $output; ?>
 
    </div>
    <!-- Inicio Pie -->
    <div class="footer">
            <p style="float: left;">© 2015 SIGERH. Todos los derechos reservados.</p>
            <p style="float: right;">Página mostrada en <strong>{elapsed_time}</strong> segundos.</p>
    </div>
    <!-- Fin Pie -->
</body>
</html>