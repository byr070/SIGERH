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
	'required'	=>	'required',
	// 'readonly' => 'readonly'
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
// $signin = array(
// 	'class' => 'btn btn-lg btn-default btn-block',
// 	'name' => 'entrar',
// 	'value'=> 'Entrar'
// );
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

    <title>Iniciar sesión</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css") ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/signin.css") ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/keyboard.css") ?>">
    <script src="<?php echo base_url("assets/js/ie-emulation-modes-warning.js") ?>"></script>

    <style type="text/css">
    #topContainer{
    	
    	height: 400px;
    }
	</style>
</head>
<body>

	<div class="container" id="topContainer">
		<?php echo form_open($this->uri->uri_string(),array('class'=>'form-signin')); ?>
		<!-- <h3 style="color:white;  text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;"> -->
		<h3>
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


		<table>
	        <tbody>
		        <tr id="keyboard">
		            <td><li class="btn btn-sm btn-primary symbol"><span class="off">`</span><span class="on">~</span></li></td>
		            <td><li class="btn btn-sm btn-primary symbol"><span class="off">1</span><span class="on">!</span></li></td>
		            <td><li class="btn btn-sm btn-primary symbol"><span class="off">2</span><span class="on">@</span></li></td>
		            <td><li class="btn btn-sm btn-primary symbol"><span class="off">3</span><span class="on">#</span></li></td>
		            <td><li class="btn btn-sm btn-primary symbol"><span class="off">4</span><span class="on">$</span></li></td>
		            <td><li class="btn btn-sm btn-primary symbol"><span class="off">5</span><span class="on">%</span></li></td>
		            <td><li class="btn btn-sm btn-primary symbol"><span class="off">6</span><span class="on">^</span></li></td>
		            <td><li class="btn btn-sm btn-primary symbol"><span class="off">7</span><span class="on">&amp;</span></li></td>
		            <td><li class="btn btn-sm btn-primary symbol"><span class="off">8</span><span class="on">*</span></li></td>
		            <td><li class="btn btn-sm btn-primary symbol"><span class="off">9</span><span class="on">(</span></li></td>
		            <td><li class="btn btn-sm btn-primary symbol"><span class="off">0</span><span class="on">)</span></li></td>
		            <td><li class="btn btn-sm btn-primary symbol"><span class="off">-</span><span class="on">_</span></li></td>
		            <td><li class="btn btn-sm btn-primary symbol"><span class="off">=</span><span class="on">+</span></li></td>
		            <td colspan="2"><li class="btn btn-sm btn-info delete"><span class="glyphicon glyphicon-arrow-left"></span></li></td>
		<!--         </tr>
	        </tbody>
	    </table>
	    <table>
	        <tbody> -->
		        <tr id="keyboard">
		            <!-- <td><li class="btn btn-sm btn-info tab" sytle="width: 70px;"><span class="glyphicon glyphicon-step-forward"></span> Tab</li></td> -->
		            <td colspan="2"><button class="btn btn-sm btn-default return">Entrar</button></td>
		            <td><li class="btn btn-sm btn-primary letter">q</li></td>
		            <td><li class="btn btn-sm btn-primary letter">w</li></td>
		            <td><li class="btn btn-sm btn-primary letter">e</li></td>
		            <td><li class="btn btn-sm btn-primary letter">r</li></td>
		            <td><li class="btn btn-sm btn-primary letter">t</li></td>
		            <td><li class="btn btn-sm btn-primary letter">y</li></td>
		            <td><li class="btn btn-sm btn-primary letter">u</li></td>
		            <td><li class="btn btn-sm btn-primary letter">i</li></td>
		            <td><li class="btn btn-sm btn-primary letter">o</li></td>
		            <td><li class="btn btn-sm btn-primary letter">p</li></td>
		            <td><li class="btn btn-sm btn-primary symbol"><span class="off">[</span><span class="on">{</span></li></td>
		            <td><li class="btn btn-sm btn-primary symbol"><span class="off">]</span><span class="on">}</span></li></td>
		            <td><li class="btn btn-sm btn-primary symbol"><span class="off">\</span><span class="on">|</span></li></td>
		        <!-- </tr>
	        </tbody>
	    </table>
	    <table>
	        <tbody> -->
		        <tr id="keyboard">
		            
		            <td colspan="3"><li class="btn btn-sm btn-info capslock">Bloq Mayús</li></td>
		            <td><li class="btn btn-sm btn-primary letter">a</li></td>
		            <td><li class="btn btn-sm btn-primary letter">s</li></td>
		            <td><li class="btn btn-sm btn-primary letter">d</li></td>
		            <td><li class="btn btn-sm btn-primary letter">f</li></td>
		            <td><li class="btn btn-sm btn-primary letter">g</li></td>
		            <td><li class="btn btn-sm btn-primary letter">h</li></td>
		            <td><li class="btn btn-sm btn-primary letter">j</li></td>
		            <td><li class="btn btn-sm btn-primary letter">k</li></td>
		            <td><li class="btn btn-sm btn-primary letter">l</li></td>
		            <td><li class="btn btn-sm btn-primary symbol"><span class="off">;</span><span class="on">:</span></li></td>
		            <td><li class="btn btn-sm btn-primary symbol"><span class="off">'</span><span class="on">"</span></li></td>
		            <!-- <td><li class="btn btn-sm btn-info return">Enter</li></td> -->
		        <!-- </tr>
	        </tbody>
	    </table>
	    <table>
	        <tbody> -->
		        <tr id="keyboard">
		            <td colspan="2"><li class="btn btn-sm btn-info left-shift"><span class="glyphicon glyphicon-arrow-up"></span> Shift</li></td>
		            <td><li class="btn btn-sm btn-primary letter">z</li></td>
		            <td><li class="btn btn-sm btn-primary letter">x</li></td>
		            <td><li class="btn btn-sm btn-primary letter">c</li></td>
		            <td><li class="btn btn-sm btn-primary letter">v</li></td>
		            <td><li class="btn btn-sm btn-primary letter">b</li></td>
		            <td><li class="btn btn-sm btn-primary letter">n</li></td>
		            <td><li class="btn btn-sm btn-primary letter">m</li></td>
		            <td><li class="btn btn-sm btn-primary symbol"><span class="off">,</span><span class="on">&lt;</span></li></td>
		            <td><li class="btn btn-sm btn-primary symbol"><span class="off">.</span><span class="on">&gt;</span></li></td>
		            <td><li class="btn btn-sm btn-primary symbol"><span class="off">/</span><span class="on">?</span></li></td>
		            <td colspan="2"><li class="btn btn-sm btn-info right-shift"><span class="glyphicon glyphicon-arrow-up"></span> Shift</li></td>
		        </tr>
	        </tbody>
	    </table>
	    <!-- <table>
	        <tbody>
		        <tr id="keyboard">
		            <td><li class="btn btn-sm btn-primary space">&nbsp;</li></td>
		        </tr>
	        </tbody>
	    </table> -->



		<div class="form-group">
			<?php echo form_checkbox($remember); ?>
			<?php echo form_label('Mantenerme conectado', $remember['id']); ?>	
			<?php echo anchor('/auth/forgot_password/', 'Recuperar clave',array('class'=>'btn btn-info btn-sm pull-right')); ?>
		</div>

		<div class="form-group has-feedback">
			<button type="submit" class="btn btn-lg btn-default btn-block" name="entrar">
			<!-- <?php echo form_submit($signin); ?> -->
			Entrar <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
			</button>
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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.11.2.js") ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js") ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/keyboard.js") ?>"></script>    

    <script type="text/javascript">
      $(".contentContainer").css("min-height",$(window).height());
    </script>
</body>