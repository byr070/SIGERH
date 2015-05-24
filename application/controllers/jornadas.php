<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Jornadas extends CI_Controller {
	
	private $id_modulo = NULL;
	
	function __construct() {
		parent::__construct();

		//$this->load->library('form_validation');
		//$this->load->library('security');
		$this->load->library('grocery_CRUD');
		$this->load->library('tank_auth_groups','','tank_auth');
		$this->load->model('catalogos/modulos_model');
        $this->id_modulo = $this->modulos_model->get_id_modulo_por_nombre(get_class($this));
        //$this->load->library('table');
		//$this->lang->load('form_validation','spanish');
		//$this->lang->load('tank_auth','spanish');
		//$this->load->model('empleado/empleado_model');		
	}
	
	public function index() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
        	if(!is_null($this->id_modulo)){
                redirect('/jornadas/listar/');
            } else {
            	redirect('/inicio/');
            }
        }
    }
	
	public function listar() {
        if(!is_null($this->id_modulo)){
			$table_name='jornadas';
			$crud = new grocery_CRUD();
	        $crud->set_theme('flexigrid')
    	    ->set_subject('Jornada')
    	    ->set_table($table_name)
    	    ->columns('JRN_DIAS_TRABAJO','JRN_DIAS_DESCANSO')

    	    ->fields('JRN_DIAS_TRABAJO','JRN_DIAS_DESCANSO')
    	    ->display_as('JRN_DIAS_TRABAJO','DÍAS DE TRABAJO')
    	    ->display_as('JRN_DIAS_DESCANSO','DÍAS DE DESCANSO')
            ->required_fields('JRN_DIAS_TRABAJO','JRN_DIAS_DESCANSO')
            ->unique_fields('JRN_DIAS_TRABAJO','JRN_DIAS_DESCANSO')
            ->set_rules('JRN_DIAS_TRABAJO','días de trabajo','numeric|max_length[2]|is_natural_no_zero')
            ->set_rules('JRN_DIAS_DESCANSO','días de descanso','numeric|max_length[2]|is_natural_no_zero');

            //leer permisos desde la bd
            $arr_acciones = $this->modulos_model->get_acciones_por_rol_modulo($this->tank_auth->is_admin(), $this->id_modulo[0]);
            //deshabilitar opciones unset_read,unset_edit,unset_delete,unset_add
            //print_r($arr_acciones);
            // $crud->unset_operations();
            //Ocultar botón Ver, Exportar, Imprimir
            $crud->unset_read();
            $crud->unset_export();
            $crud->unset_print();
    	    //si no tiene permiso para add entonces
            if(!in_array('Crear', $arr_acciones)) {
                $crud->unset_add();
            }
            //si no tiene permiso para editar entonces
            if(!in_array('Editar', $arr_acciones)) {
                $crud->unset_edit();
            }
            //si no tiene permiso para leer entonces
            if(!in_array('Ver', $arr_acciones)) {
                $crud->unset_list();
            }
            //si no tiene permiso para borrar entonces
            if(!in_array('Eliminar', $arr_acciones)) {
                $crud->unset_delete();
            }
            try {
                $output = $crud->render();
            } catch(Exception $e) {
                if($e->getCode() == 14) {
                    show_error('No tiene permisos para esta operación');
                } else {
                    show_error($e->getMessage());
                }
            }
            $this->_jornada_output($output);
        } else {
            redirect('/inicio/');
        }

    }
    
    function _jornada_output($output = null) {
    	$data['user_id']    = $this->tank_auth->get_user_id();
        $data['username']   = $this->tank_auth->get_username();
        $data['is_admin']   = $this->tank_auth->is_admin();
        $output = array_merge((array)$output,$data);
        //recuperar modulos de la bd
        $arr_menu = $this->modulos_model->get_modulos_por_rol($this->session->userdata('group_id'));
        $menu['menu'] = $arr_menu;
        $output = array_merge($output,$menu);
        $this->load->view('template/template.php',$output);    
    }
}

/* End of file jornadas.php */
/* Location: ./application/controllers/jornadas.php */