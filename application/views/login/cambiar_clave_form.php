<?php
$anterior_clave = array(
	'name'	=> 'anterior_clave',
	'id'	=> 'anterior_clave',
	'value' => set_value('anterior_clave'),
	'size' 	=> 30,
);
$nueva_clave = array(
	'name'	=> 'nueva_clave',
	'id'	=> 'nueva_clave',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirmar_nueva_clave = array(
	'name'	=> 'confirmar_nueva_clave',
	'id'	=> 'confirmar_nueva_clave',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size' 	=> 30,
);
?>
<?php echo form_open($this->uri->uri_string()); ?>
<table>
	<tr>
		<td><?php echo form_label('Anterior Clave: ', $anterior_clave['id']); ?></td>
		<td><?php echo form_password($anterior_clave); ?></td>
		<td style="color: red;"><?php echo form_error($anterior_clave['name']); ?><?php echo isset($errors[$anterior_clave['name']])?$errors[$anterior_clave['name']]:''; ?></td>
	</tr>
	<tr>
		<td><?php echo form_label('Nueva Clave: ', $nueva_clave['id']); ?></td>
		<td><?php echo form_password($nueva_clave); ?></td>
		<td style="color: red;"><?php echo form_error($nueva_clave['name']); ?><?php echo isset($errors[$nueva_clave['name']])?$errors[$nueva_clave['name']]:''; ?></td>
	</tr>
	<tr>
		<td><?php echo form_label('Confirmar Nueva Clave: ', $confirmar_nueva_clave['id']); ?></td>
		<td><?php echo form_password($confirmar_nueva_clave); ?></td>
		<td style="color: red;"><?php echo form_error($confirmar_nueva_clave['name']); ?><?php echo isset($errors[$confirmar_nueva_clave['name']])?$errors[$confirmar_nueva_clave['name']]:''; ?></td>
	</tr>
</table>
<?php echo form_submit('cambiar', 'Cambiar Clave'); ?>
<?php echo form_close(); ?>