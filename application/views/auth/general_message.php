<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Iniciar Sesión</title>
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
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/signin.css"); ?>" />
</head>
<body>
	<div class="container">
		<?php echo $message; ?>
		<div class="footer">
			<p style="float: left;">© 2015 SIGERH. Todos los derechos reservados.</p>
			<p style="float: right;">Página mostrada en <strong>{elapsed_time}</strong> segundos.</p>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.11.2.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</body>