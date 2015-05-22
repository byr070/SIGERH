<?php
$clave = array(
	'name'	=> 'clave',
	'id'	=> 'clave',
	'size'	=> 30,
);
?>
<?php echo form_open($this->uri->uri_string()); ?>
<table>
	<tr>
		<td><?php echo form_label('Clave: ', $clave['id']); ?></td>
		<td><?php echo form_clave($clave); ?></td>
		<td style="color: red;"><?php echo form_error($clave['name']); ?><?php echo isset($errors[$clave['name']])?$errors[$clave['name']]:''; ?></td>
	</tr>
</table>
<?php echo form_submit('cancel', 'Delete account'); ?>
<?php echo form_close(); ?>