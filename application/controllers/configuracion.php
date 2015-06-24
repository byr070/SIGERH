<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Configuracion extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->library('tank_auth_groups','','tank_auth');
		$this->lang->load('tank_auth','spanish');
		$this->load->model('catalogos/modulos_model');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} elseif (!$this->tank_auth->is_admin()) {
			redirect('inicio');
		} else {
			$data['is_admin']	= $this->tank_auth->is_admin();
			//recuperar modulos de la bd
			$arr_modulos = $this->modulos_model->get_modulos_por_rol($this->session->userdata('group_id'), TRUE);
			if(!is_null($arr_modulos)) {
				redirect(strtolower($arr_modulos[0]));
			} else {
				$data['user_id']	= $this->tank_auth->get_user_id();
				$data['username']	= $this->tank_auth->get_username();
				$this->load->view('template/header', $data);
			}
		}
	}
}
 
/* End of file configuracion.php */
/* Location: ./application/controllers/configuracion.php */