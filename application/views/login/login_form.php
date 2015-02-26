<?php
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value' => set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'autofocus'	=> 'autofocus',
	'placeholder' => 'E-mail'
);
$clave = array(
	'name'	=> 'clave',
	'id'	=> 'clave',
	'size'	=> 30,
	'placeholder' => 'Clave',
	'class' => 'clave',
);
$recordar = array(
	'name'	=> 'recordar',
	'id'	=> 'recordar',
	'value'	=> 1,
	'checked'	=> set_value('recordar'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
<h1>LOGIN</h1>
<?php echo form_open($this->uri->uri_string()); ?>
<table>
	<tr>
		<td><?php echo form_label('E-mail: ', $email['id']); ?></td>
		<td><?php echo form_input($email); ?></td>
		<td style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></td>
	</tr>
	<tr>
		<td><?php echo form_label('Clave: ', $clave['id']); ?></td>
		<td><?php echo form_password($clave); ?></td>
		<td style="color: red;"><?php echo form_error($clave['name']); ?><?php echo isset($errors[$clave['name']])?$errors[$clave['name']]:''; ?></td>
	</tr>

	<?php if ($show_captcha) { ?>
	
	<tr>
		<td colspan="3">
			<p>Introducir el codigo de la imagen:</p>
			<?php echo $captcha_html; ?>
		</td>
	</tr>
	<tr>
		<td><?php echo form_label('Codigo de confirmacion: ', $captcha['id']); ?></td>
		<td><?php echo form_input($captcha); ?></td>
		<td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
	</tr>
	<?php } ?>

	<tr>
		<td colspan="3">
			<?php echo form_checkbox($recordar); ?>
			<?php echo form_label('Recordar', $recordar['id']); ?>
			<?php echo anchor('/login/recuperar_clave/', 'Olvidaste la clave?'); ?>
			<?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/login/registrar/', 'Registrarse'); ?>
		</td>
	</tr>
</table>
<?php echo form_submit('entrar', 'Entrar'); ?>
<?php echo form_close(); ?>
