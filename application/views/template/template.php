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
    </style>
</head>
<body>
    <!-- Inicio Cabecera -->
    <div>
        <?php echo anchor('/inicio/', 'Inicio');?>
        <?php if ($is_admin): echo anchor('/configuracion/', 'Configuración'); endif;?>
         Hola, <strong><?php echo $username; ?></strong>!
         <?php echo anchor('/auth/logout/', 'Salir'); ?>
    </div>
    <!-- Fin Cabecera -->
    <br>
    <br>
    <!-- Inicio Menu -->
    <div>
        <?php foreach($menu as $item): ?>
            <a href='<?php echo site_url(''.strtolower($item).'/')?>'><?php echo $item;?></a> |
        <?php endforeach; ?>
    </div>
    <!-- Fin Menu -->
    <div style='height:20px;'></div>  
    <div>
        <?php echo $output; ?>
 
    </div>
    <!-- Inicio Pie -->
    <div>© 2015 SIGERH. Todos los derechos reservados.</div>
    <!-- Fin Pie -->
</body>
</html>