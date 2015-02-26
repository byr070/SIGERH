<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
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
    <!-- Inicio Pie -->
    <div>© 2015 SIGERH. Todos los derechos reservados.</div>
    <!-- Fin Pie -->
</body>
</html>