<?php
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email o Usuario';
} else if ($login_by_username) {
	$login_label = 'Usuario';
} else {
	$login_label = 'Email';
}

$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'title'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'class' => 'form-control',
	'placeholder' => 'Usuario',
	'required' => 'required',
	'autofocus' => 'autofocus'
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'title'	=> 'password',
	'type'	=>	'password',
	'size'	=> 30,
	'class' => 'form-control',
	'placeholder'=> 'Contraseña',
	'required'	=>	'required'
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$signin = array(
	'class' => 'btn btn-lg btn-success btn-block',
	'name' => 'entrar',
	'value'=> 'Entrar'
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Iniciar sesión</title>

    <!-- Bootstrap core CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css") ?>">

	<!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/signin.css") ?>">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script type="text/javascript" src=""></script>
    <script src="<?php echo base_url("assets/js/ie-emulation-modes-warning.js") ?>"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
    #topContainer{
    	
    	height: 400px;
    }
	</style>
</head>
<body>

	<div class="container" id="topContainer">
		<?php echo form_open($this->uri->uri_string(),array('class'=>'form-signin')); ?>
		<h3 style="color:white;  text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">
			<span class="glyphicon glyphicon-home"></span> Bienvenido a SIGERH</h3>

		<div class="form-group has-feedback">
			<?php echo form_input($login) ?>
		    <span class="glyphicon glyphicon-envelope form-control-feedback" aria-hidden="true"></span>
		    <?php echo form_error($login['name']); ?>
		  	<?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
		</div>


		<div class="form-group has-feedback">
			<?php echo form_input($password) ?>
        	<span class="glyphicon glyphicon-lock form-control-feedback"></span>
        	<?php echo form_error($password['name']); ?>
			<?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
		</div>

		<?php if ($show_captcha) {
				if ($use_recaptcha) { ?>
			<table>
				<tr>
					<td colspan="2">
						<div id="recaptcha_image"></div>
					</td>
					<td>
						<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
						<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
						<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="recaptcha_only_if_image">Enter the words above</div>
						<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
					</td>
					<td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
					<td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td>
					<?php echo $recaptcha_html; ?>
				</tr>
				<?php } else { ?>
				<tr>
					<td colspan="3">
						<p>Enter the code exactly as it appears:</p>
						<?php echo $captcha_html; ?>
					</td>
				</tr>
				<tr>
					<td><?php //echo form_label('Confirmation Code', $captcha['id']); ?></td>
					<td><?php echo form_input($captcha); ?></td>
					<td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
				</tr>
			</table>
			<?php }
		} ?>		




		<div class="form-group">
			<?php echo form_checkbox($remember); ?>
			<?php echo form_label('Mantenerme conectado', $remember['id']); ?>	
			<?php echo anchor('/auth/forgot_password/', 'Recuperar clave',array('class'=>'btn btn-info btn-sm pull-right')); ?>
		</div>

		<div class="form-group has-feedback">
			<?php echo form_submit($signin); ?>
			<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
		</div>

		
		<?php if ($this->config->item('allow_registration','tank_auth'))
			echo anchor('/auth/register/', 'Register');
		?>
		
		<?php echo form_close(); ?> 


		<!-- <table>
			<tr>
				<th><?php //echo form_label($login_label, $login['id']); ?></th>
				<td><?php echo form_input($login); ?></td>
				<td style="color: red;">
					<?php echo form_error($login['name']); ?>
					<?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
				</td>
			</tr>
			<tr>
				<th><?php //echo form_label('Password', $password['id']); ?></th>
				<td><?php echo form_password($password); ?></td>
				<td style="color: red;">
					<?php echo form_error($password['name']); ?>
					<?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
				</td>
			</tr> 

			<?php if ($show_captcha) {
				if ($use_recaptcha) { ?>
			<tr>
				<td colspan="2">
					<div id="recaptcha_image"></div>
				</td>
				<td>
					<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
					<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
					<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="recaptcha_only_if_image">Enter the words above</div>
					<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
				</td>
				<td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
				<td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td>
				<?php echo $recaptcha_html; ?>
			</tr>
			<?php } else { ?>
			<tr>
				<td colspan="3">
					<p>Enter the code exactly as it appears:</p>
					<?php echo $captcha_html; ?>
				</td>
			</tr>
			<tr>
				<td><?php //echo form_label('Confirmation Code', $captcha['id']); ?></td>
				<td><?php echo form_input($captcha); ?></td>
				<td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
			</tr>
			<?php }
			} ?>

			<tr>
				<td colspan="3">
					<?php echo form_submit($signin); ?>
					<?php echo form_checkbox($remember); ?>
					<?php echo form_label('Remember me', $remember['id']); ?>
					<?php echo anchor('/auth/forgot_password/', 'Recuperar clave'); ?>
					<?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register'); ?>

				</td>
			</tr>
		</table> 
		<?php echo form_close(); ?> -->

		<!-- <div class="footer">
				<p style="float: left;">© 2015 SIGERH. Todos los derechos reservados.</p>
				<p style="float: right;">Página mostrada en <strong>{elapsed_time}</strong> segundos.</p>
		</div> -->
	</div> <!-- /container -->

	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url("assets/js/ie10-viewport-bug-workaround.js") ?>"></script>

    <script type="text/javascript">
      $(".contentContainer").css("min-height",$(window).height());
      </script>
</body>