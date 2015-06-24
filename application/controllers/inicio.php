<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->library('grocery_CRUD');
		$this->load->library('tank_auth_groups','','tank_auth');
		$this->lang->load('tank_auth','spanish');
		$this->load->model('catalogos/modulos_model');
	}

	function index()
	{
		//var_dump($this->tank_auth->is_logged_in());
		//var_dump($this->session->userdata);
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {	
			$data['is_admin']	= $this->tank_auth->is_admin();
			//recuperar modulos de la bd
			$arr_modulos = $this->modulos_model->get_modulos_por_rol($this->session->userdata('group_id'));
			//var_dump($arr_modulos);
			if(!is_null($arr_modulos)) {
				redirect(strtolower($arr_modulos[0]));
			} else {
				$data['user_id']	= $this->tank_auth->get_user_id();
				$data['username']	= $this->tank_auth->get_username();
				$data['is_admin']   = $this->tank_auth->is_admin();
	        	$arr_menu = $this->modulos_model->get_modulos_por_rol($this->session->userdata('group_id'));
    		    $menu['menu'] = $arr_menu;
	        	$data = array_merge($data,$menu);
	        	//$crud = new grocery_CRUD();
	        	//$output = $crud->render();
	        	$output['css_files'] = null;
	        	$output['js_files'] = null;
	        	$output['output'] = null;
	        	$data = array_merge($data,$output);

				$this->load->view('template/header',$data);
		        $this->load->view('template/menu',$data);
		        $this->load->view('template/template',$data);
		        $this->load->view('template/footer',$data);
			}
		}
	}
}
 
/* End of file inicio.php */
/* Location: ./application/controllers/inicio.php */