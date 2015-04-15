<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class' => 'form-control',
	'placeholder' => 'Email o Usuario',
);
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Email o Usuario';
} else {
	$login_label = 'Email';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Recuperar clave</title>
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

<?php echo form_open($this->uri->uri_string(),array('class'=>'form-signin')); ?>
<table class="table">
	<tr>
		<td><?php echo form_input($login); ?></td>
		<td style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></td>
	</tr>
	<tr>
		<td colspan="2">
			<?php $attributes = array('class' => 'btn btn-lg btn-success btn-block', 'name' => 'reset', 'value'=> 'Recuperar'); ?>
			<?php echo form_submit($attributes); ?>
		</td>
	</tr>
</table>
<?php echo form_close(); ?>
	<div class="footer">
			<p style="float: left;">© 2015 SIGERH. Todos los derechos reservados.</p>
			<p style="float: right;">Página mostrada en <strong>{elapsed_time}</strong> segundos.</p>
	</div>

</div>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.11.2.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</body>