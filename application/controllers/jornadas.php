<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Jornadas extends CI_Controller {
	
	//private $id_modulo = NULL;
	
	function __construct() {
		parent::__construct();

		//$this->load->library('form_validation');
		//$this->load->library('security');
		$this->load->library('grocery_CRUD');
		$this->load->library('tank_auth_groups','','tank_auth');
		//$this->load->library('table');
		//$this->lang->load('form_validation','spanish');
		$this->lang->load('tank_auth','spanish');
		////$this->load->model('empleado/empleado_model');
		$this->load->model('catalogos/modulos_model');
		//$this->id_modulo = $this->modulos_model->get_id_modulo_por_nombre(get_class($this));
	}
	
	public function index() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
        	//if(!is_null($this->id_modulo)){
                redirect('/jornadas/listar/');
            //} else {
            //	redirect('/inicio/');
            //}
        }
    }
	
	public function listar() {
        //if(!is_null($this->id_modulo)){
			$table_name='jornadas';
			$crud = new grocery_CRUD();
	        $crud->set_theme('flexigrid')
    	    	->set_subject('Jornada')
    	    	->set_table($table_name)
    	    	->columns('JOR_ID','DIAS_TRABAJO','DIAS_DESCANSO')
    	    	->change_field_type('JOR_ID','invisible')
    	    	->fields('DIAS_TRABAJO','DIAS_DESCANSO')
    	    	->required_fields('DIAS_TRABAJO','DIAS_DESCANSO')
    	    	
    	    	->display_as('DIAS_TRABAJO','DÍAS DE TRABAJO')
    	    	->display_as('DIAS_DESCANSO','DÍAS DE DESCANSO');
    	    	//->set_relation('LUGAR_NACIMIENTO','parroquias','PRR_NOMBRE');
    	    	$output=$crud->render();
    	    	$this->_jornada_output($output);

    }
    
    function _jornada_output($output = null) {
    	$data['user_id']    = $this->tank_auth->get_user_id();
        $data['username']   = $this->tank_auth->get_username();
        $data['is_admin']   = $this->tank_auth->is_admin();
        $output = array_merge((array)$output,$data);
        //recuperar modulos de la bd
        $arr_menu = $this->modulos_model->get_modulos_por_rol($this->session->userdata('group_id'));
        //if(!is_null($arr_menu)) {
        $menu['menu'] = $arr_menu;
        //}else{$menu['menu'] = '';}
        $output = array_merge($output,$menu);
        $this->load->view('template/template.php',$output);    
    }
}

/* End of file jornadas.php */
/* Location: ./application/controllers/jornadas.php */