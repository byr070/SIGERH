<?php
$clave = array(
	'name'	=> 'clave',
	'id'	=> 'clave',
	'size'	=> 30,
);
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
?>
<?php echo form_open($this->uri->uri_string()); ?>
<table>
	<tr>
		<td><?php echo form_label('Clave: ', $clave['id']); ?></td>
		<td><?php echo form_password($clave); ?></td>
		<td style="color: red;"><?php echo form_error($clave['name']); ?><?php echo isset($errors[$clave['name']])?$errors[$clave['name']]:''; ?></td>
	</tr>
	<tr>
		<td><?php echo form_label('Nueva direccion email:', $email['id']); ?></td>
		<td><?php echo form_input($email); ?></td>
		<td style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></td>
	</tr>
</table>
<?php echo form_submit('cambiar', 'Enviar email de confirmacion'); ?>
<?php echo form_close(); ?>