<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Salarios extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth_groups','','tank_auth');
		$this->lang->load('tank_auth');
		$this->lang->load('form_validation');
	}

	function index()
	{
		/*
		if ($message = $this->session->flashdata('message')) {
			$this->load->view('auth/general_message', array('message' => $message));
		} else {
			redirect('/auth/login/');
		}*/
		$data['email']="byr_070@hotmail.com";
		$data['salario']=700;
		
		$this->_enviar_notificacion($data);
	}

	/**
	 * Envia la notificación de la generación de la orden de pago,
	 * vía correo electrónico.
	 *
	 * @return void
	 */
	function _enviar_notificacion($data) {
		$data['site_name'] = $this->config->item('website_name', 'tank_auth');
		try {
			$this->_send_email('orden_pago_salario', $data['email'], $data);
		} catch(Exception $e) {
			show_error($e->getMessage());
		}
	}

	/**
	 * Send email message of given type (activate, forgot_password, etc.)
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
		try{
			$this->email->send();
		} catch(Exception $e) {
			show_error($e->getMessage());
		}
	}
}

/* End of file salarios.php */
/* Location: ./application/controllers/salarios.php */