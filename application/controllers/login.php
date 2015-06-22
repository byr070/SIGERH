<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('security');
		$this->load->library('tank_auth_groups','','tank_auth');
		$this->lang->load('form_validation','spanish');
		$this->lang->load('tank_auth','spanish');
	}
	
	function index(){
		if ($mensaje = $this->session->flashdata('mensaje')) {
			$this->load->view('login/mensajes_general', array('mensaje' => $mensaje));
		} else {
			redirect('/login/entrar/');
		}
	}
	
	function entrar(){
		
		if ($this->tank_auth->is_logged_in()) {									// logged in
			redirect('/empleado/');		
		} elseif ($this->tank_auth->is_logged_in(FALSE)) {						// logged in, not activated
			redirect('/login/enviar_de_nuevo/');
		} else {
			
			$this->form_validation->set_rules('email', 'E-mail', 'trim|required|xss_clean');
			$this->form_validation->set_rules('clave', 'Clave', 'trim|required|xss_clean');
			$this->form_validation->set_rules('recordar', 'Recordarme', 'integer');
			if ($this->config->item('login_count_attempts', 'tank_auth') AND
					($login = $this->input->post('email'))) {
				$login = $this->security->xss_clean($login);
			} else {
				$login = '';
			}

			
			if ($this->tank_auth->is_max_login_attempts_exceeded($login)) {
					$this->form_validation->set_rules('captcha', 'Codigo confirmacion', 'trim|xss_clean|required|callback__check_captcha');
			}
			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if ($this->tank_auth->login(
						$this->form_validation->set_value('email'),
						$this->form_validation->set_value('clave'),
						$this->form_validation->set_value('recordar'),
						TRUE)) {								// success
					redirect('');
				} else {
					$errors = $this->tank_auth->get_error_message();
					if (isset($errors['banned'])) {								// banned user
						$this->_show_message($this->lang->line('auth_message_banned').' '.$errors['banned']);

					} elseif (isset($errors['not_activated'])) {				// not activated user
						redirect('/login/enviar_de_nuevo/');

					} else {													// fail
						foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
					}
				}
			}
			$data['show_captcha'] = FALSE;
			if ($this->tank_auth->is_max_login_attempts_exceeded($login)) {
				$data['show_captcha'] = TRUE;
				$data['captcha_html'] = $this->_create_captcha();
			}
			$this->load->view('login/login_form', $data);
		}
	}

	/**
	 * Registrar usuario en la aplicacion
	 *
	 * @return void
	 */
    function registrar() {
    	if ($this->tank_auth->is_logged_in()) {									// logged in
			redirect('');

		} elseif ($this->tank_auth->is_logged_in(FALSE)) {						// logged in, not activated
			redirect('/login/enviar_de_nuevo/');

		} elseif (!$this->config->item('allow_registration', 'tank_auth')) {	// registration is off
			$this->_show_message($this->lang->line('auth_message_registration_disabled'));

		} else {
			
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|matches[password]');

			$captcha_registration	= $this->config->item('captcha_registration', 'tank_auth');
			if ($captcha_registration) {
					$this->form_validation->set_rules('captcha', 'Codigo confirmacion', 'trim|xss_clean|required|callback__check_captcha');
			}
			$data['errors'] = array();
			
			$email_activation = $this->config->item('email_activation', 'tank_auth');
			
			if ($this->form_validation->run()) {								// validation ok
				if (!is_null($data = $this->tank_auth->create_user(
						$this->form_validation->set_value('email'),
						$this->form_validation->set_value('password'),
						$email_activation))) {									// success
					
					$data['site_name'] = $this->config->item('website_name', 'tank_auth');

					if ($email_activation) {									// send "activate" email
						$data['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;
						//print_r(array_keys($data));
						//print_r(array_values($data));
						$this->_send_email('activate', $data['usu_email'], $data);
						unset($data['password']); // Clear password (just for any case)
						
						$this->_show_message($this->lang->line('auth_message_registration_completed_1'));

					} else {
						if ($this->config->item('email_account_details', 'tank_auth')) {	// send "welcome" email

							$this->_send_email('welcome', $data['email'], $data);
						}
						unset($data['password']); // Clear password (just for any case)

						$this->_show_message($this->lang->line('auth_message_registration_completed_2').' '.anchor('/login/entrar/', 'Login'));
					}
				} else {
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}
			if ($captcha_registration) {
					$data['captcha_html'] = $this->_create_captcha();
			}
			$data['captcha_registration'] = $captcha_registration;
			$this->load->view('login/registro_form', $data);
		}
	}
	    
    /**
	 * Salida de usuario
	 *
	 * @return void
	 */
	function logout()
	{
		$this->tank_auth->logout();
		$this->_show_message($this->lang->line('auth_message_logged_out'));
	}

	/**
	 * Enviar email de activacion de nuevo, al mismo o a una nueva direccion email
	 *
	 * @return void
	 */
	function enviar_de_nuevo()
	{
		if (!$this->tank_auth->is_logged_in(FALSE)) {							// not logged in or activated
			redirect('/login/entrar/');

		} else {
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');

			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if (!is_null($data = $this->tank_auth->change_email(
						$this->form_validation->set_value('email')))) {			// success

					$data['site_name']	= $this->config->item('website_name', 'tank_auth');
					$data['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;
					print_r(array_keys($data));
					print_r(array_values($data));

					$this->_send_email('activate', $data['usu_email'], $data);

					$this->_show_message(sprintf($this->lang->line('auth_message_activation_email_sent'), $data['usu_email']));

				} else {
					$errors = $this->tank_auth->get_error_message();
					
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}
			$this->load->view('login/enviar_de_nuevo_form', $data);
		}
	}

	/**
	 * Activar una cuenta de usuario.
	 * El usuario es verificado por el id de usuario user_id y el codigo de autenticacion en la URL.
	 * Se lo puede llamar haciendo clic en el enlace en el correo.
	 *
	 * @return void
	 */
	function activar()
	{
		$user_id		= $this->uri->segment(3);
		$new_email_key	= $this->uri->segment(4);

		// Activate user
		if ($this->tank_auth->activate_user($user_id, $new_email_key)) {		// success
			$this->tank_auth->logout();
			$this->_show_message($this->lang->line('auth_message_activation_completed').' '.anchor('/login/entrar/', 'Login'));

		} else {																// fail
			$this->_show_message($this->lang->line('auth_message_activation_failed'));
		}
	}

	/**
	 * Generar un codigo de restauracion (para cambiar la clave) y enviarlo al usuario
	 *
	 * @return void
	 */
	function recuperar_clave()
	{
		if ($this->tank_auth->is_logged_in()) {									// logged in
			redirect('');

		} elseif ($this->tank_auth->is_logged_in(FALSE)) {						// logged in, not activated
			redirect('/login/enviar_de_nuevo/');

		} else {
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');

			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if (!is_null($data = $this->tank_auth->forgot_password(
						$this->form_validation->set_value('email')))) {

					$data['site_name'] = $this->config->item('website_name', 'tank_auth');

					// Send email with password activation link
					$this->_send_email('forgot_password', $data['usu_email'], $data);

					$this->_show_message($this->lang->line('auth_message_new_password_sent'));

				} else {
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}
			$this->load->view('login/recuperar_clave_form', $data);
		}
	}

	/**
	 * Reemplazar la clave de usuario (olvidada) con una nueva (establecida por el usuario).
	 * El usuario es verificado por el id de usuario user_id y el codigo de autenticacion en la URL.
	 * Se lo puede llamar haciendo clic en el enlace en el correo.
	 *
	 * @return void
	 */
	function reset_clave()
	{
		$user_id		= $this->uri->segment(3);
		$new_pass_key	= $this->uri->segment(4);

		$this->form_validation->set_rules('nueva_clave', 'Nueva Clave', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
		$this->form_validation->set_rules('confirmar_nueva_clave', 'Confirmar Nueva Clave', 'trim|required|xss_clean|matches[nueva_clave]');

		$data['errors'] = array();

		if ($this->form_validation->run()) {									// validation ok
			if (!is_null($data = $this->tank_auth->reset_password(
					$user_id, $new_pass_key,
					$this->form_validation->set_value('nueva_clave')))) {	// success

				$data['site_name'] = $this->config->item('website_name', 'tank_auth');

				// Enviar email con nueva clave
				$this->_send_email('reset_password', $data['email'], $data);

				$this->_show_message($this->lang->line('auth_message_new_password_activated').' '.anchor('/login/entrar/', 'Login'));

			} else {														// fail
				$this->_show_message($this->lang->line('auth_message_new_password_failed'));
			}
		} else {
			// Try to activate user by password key (if not activated yet)
			if ($this->config->item('email_activation', 'tank_auth')) {
				$this->tank_auth->activate_user($user_id, $new_pass_key, FALSE);
				echo 'xxxxxxxxxxxxxxx';

				$this->_show_message($this->lang->line('auth_message_activation_failed')); // usuario no activo
			}

			if (!$this->tank_auth->can_reset_password($user_id, $new_pass_key)) {
				$this->_show_message($this->lang->line('auth_message_new_password_failed'));
			}
		}
		$this->load->view('login/reset_clave_form', $data);
	}

	/**
	 * Cambiar clave del usuario
	 *
	 * @return void
	 */
	function cambiar_clave()
	{
		if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated
			redirect('/login/entrar/');

		} else {
			$this->form_validation->set_rules('anterior_clave', 'Anterior Clave', 'trim|required|xss_clean');
			$this->form_validation->set_rules('nueva_clave', 'Nueva Clave', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
			$this->form_validation->set_rules('confirmar_nueva_clave', 'Confirmar Nueva Clave', 'trim|required|xss_clean|matches[nueva_clave]');

			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if ($this->tank_auth->change_password(
						$this->form_validation->set_value('anterior_clave'),
						$this->form_validation->set_value('nueva_clave'))) {	// success
					$this->_show_message($this->lang->line('auth_message_password_changed'));

				} else {														// fail
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}
			$this->load->view('login/cambiar_clave_form', $data);
		}
	}

	/**
	 * Cambiar email del usuario
	 *
	 * @return void
	 */
	function cambiar_email() {
		if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated
			redirect('/login/entrar/');

		} 
		else {			
			$this->form_validation->set_rules('clave', 'Clave', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');

			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if (!is_null($data = $this->tank_auth->set_new_email(
						$this->form_validation->set_value('email'),
						$this->form_validation->set_value('clave')))) {			// success

					$data['site_name'] = $this->config->item('website_name', 'tank_auth');

					// print_r(array_keys($data));
					// print_r(array_values($data));

					// Send email with new email address and its activation link
					$this->_send_email('change_email', $data['usu_nuevo_email'], $data);

					$this->_show_message(sprintf($this->lang->line('auth_message_new_email_sent'), $data['usu_nuevo_email']));

				} else {
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}
			$this->load->view('login/cambiar_email_form', $data);
		}
	}

	/**
	 * Reemplazar email del usuario con uno nuevo.
	 * El usuario es verificado por el id de usuario user_id y el codigo de autenticacion en la URL.
	 * Se lo puede llamar haciendo clic en el enlace en el correo.
	 *
	 * @return void
	 */
	function reset_email()
	{
		$user_id		= $this->uri->segment(3);
		$new_email_key	= $this->uri->segment(4);

		// Reset email
		if ($this->tank_auth->activate_new_email($user_id, $new_email_key)) {	// success
			$this->tank_auth->logout();
			$this->_show_message($this->lang->line('auth_message_new_email_activated').' '.anchor('/login/entrar/', 'Login'));

		} else {																// fail
			$this->_show_message($this->lang->line('auth_message_new_email_failed'));
		}
	}

	/**
	 * Eliminar usuario de la aplicacion (solo cuando el usuario esta conectado)
	 *
	 * @return void
	 */
	function unregister()
	{
		if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated
			redirect('/login/entrar/');

		} else {
			$this->form_validation->set_rules('clave', 'Clave', 'trim|required|xss_clean');

			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if ($this->tank_auth->delete_user(
						$this->form_validation->set_value('clave'))) {		// success
					$this->_show_message($this->lang->line('auth_message_unregistered'));

				} else {														// fail
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}
			$this->load->view('login/unregister_form', $data);
		}
	}

	/**
	 * Mostrar un mensaje de informacion
	 *
	 * @param	string
	 * @return	void
	 */
	function _show_message($message)
	{
		$this->session->set_flashdata('mensaje', $message);
		redirect('/login/');
	}

	/**
	 * Enviar un mensaje email del tipo dado (activado, recuperar_clave, etc.)
	 *
	 * @param	string
	 * @param	string
	 * @param	array
	 * @return	void
	 */
	function _send_email($type, $email, &$data)
	{
		$this->load->library('email');
		$this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->to($email);
		$this->email->subject(sprintf($this->lang->line('auth_subject_'.$type), $this->config->item('website_name', 'tank_auth')));
		$this->email->message($this->load->view('email/'.$type.'-html', $data, TRUE));
		$this->email->set_alt_message($this->load->view('email/'.$type.'-txt', $data, TRUE));
		$this->email->send();
	}

	/**
	 * Crear una imagen CAPTCHA para verificar un usuario como un humano
	 *
	 * @return	string
	 */
	function _create_captcha()
	{
		$this->load->helper('captcha');

		$cap = create_captcha(array(
			'img_path'		=> './'.$this->config->item('captcha_path', 'tank_auth'),
			'img_url'		=> base_url().$this->config->item('captcha_path', 'tank_auth'),
			'font_path'		=> './'.$this->config->item('captcha_fonts_path', 'tank_auth'),
			'font_size'		=> $this->config->item('captcha_font_size', 'tank_auth'),
			'img_width'		=> $this->config->item('captcha_width', 'tank_auth'),
			'img_height'	=> $this->config->item('captcha_height', 'tank_auth'),
			'show_grid'		=> $this->config->item('captcha_grid', 'tank_auth'),
			'expiration'	=> $this->config->item('captcha_expire', 'tank_auth'),
		));

		// Save captcha params in session
		$this->session->set_flashdata(array(
				'captcha_word' => $cap['word'],
				'captcha_time' => $cap['time'],
		));
		echo $cap['word']; 				// mostrar captcha en letras
		return $cap['image'];
	}

	/**
	 * Funcion callback. Verifica si la prueba de CAPTCHA se supero.
	 *
	 * @param	string
	 * @return	bool
	 */
	function _check_captcha($code)
	{
		$time = $this->session->flashdata('captcha_time');
		$word = $this->session->flashdata('captcha_word');

		list($usec, $sec) = explode(" ", microtime());
		$now = ((float)$usec + (float)$sec);

		if ($now - $time > $this->config->item('captcha_expire', 'tank_auth')) {
			$this->form_validation->set_message('_check_captcha', $this->lang->line('auth_captcha_expired'));
			return FALSE;

		} elseif (($this->config->item('captcha_case_sensitive', 'tank_auth') AND
				$code != $word) OR
				strtolower($code) != strtolower($word)) {
			$this->form_validation->set_message('_check_captcha', $this->lang->line('auth_incorrect_captcha'));
			return FALSE;
		}
		return TRUE;
	}

	/**
	 * Create reCAPTCHA JS and non-JS HTML to verify user as a human
	 *
	 * @return	string
	 */
	function _create_recaptcha()
	{
		$this->load->helper('recaptcha');

		// Add custom theme so we can get only image
		$options = "<script>var RecaptchaOptions = {theme: 'custom', custom_theme_widget: 'recaptcha_widget'};</script>\n";

		// Get reCAPTCHA JS and non-JS HTML
		$html = recaptcha_get_html($this->config->item('recaptcha_public_key', 'tank_auth'));

		return $options.$html;
	}

	/**
	 * Callback function. Check if reCAPTCHA test is passed.
	 *
	 * @return	bool
	 */
	function _check_recaptcha()
	{
		$this->load->helper('recaptcha');

		$resp = recaptcha_check_answer($this->config->item('recaptcha_private_key', 'tank_auth'),
				$_SERVER['REMOTE_ADDR'],
				$_POST['recaptcha_challenge_field'],
				$_POST['recaptcha_response_field']);

		if (!$resp->is_valid) {
			$this->form_validation->set_message('_check_recaptcha', $this->lang->line('auth_incorrect_captcha'));
			return FALSE;
		}
		return TRUE;
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
