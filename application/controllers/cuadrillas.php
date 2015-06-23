<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Cuadrillas extends CI_Controller {
	
	private $id_modulo = NULL;
	
	function __construct() {
		parent::__construct();

		$this->load->library('security');
		$this->load->library('grocery_CRUD');
		$this->load->library('tank_auth_groups','','tank_auth');
		$this->load->library('table');
		$this->lang->load('tank_auth','spanish');
		$this->load->model('catalogos/modulos_model');
		$this->id_modulo = $this->modulos_model->get_id_modulo_por_nombre(get_class($this));
	}
	
	public function index() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
        	if(!is_null($this->id_modulo)){
                redirect('/cuadrillas/listar/');
            } else {
            	redirect('/inicio/');
            }
        }
    }
	
	public function listar() {
        if(!is_null($this->id_modulo)){
			$table_name='cuadrillas';
			$crud = new grocery_CRUD();
            $crud->set_theme('bootstrap');
    	    $crud->set_subject('Cuadrillas');
    	    $crud->set_table($table_name)
            ->columns('CDR_NOMBRE','PROYECTO_ID','JORNADA_ID','HORARIO_ID')
            ->fields('CDR_NOMBRE','PROYECTO_ID','JORNADA_ID','HORARIO_ID')

            ->display_as('CDR_NOMBRE','Nombre de la cuadrilla')
            ->display_as('PROYECTO_ID','Proyecto')
            ->display_as('JORNADA_ID','Jornada')
            ->display_as('HORARIO_ID','Horario')
            
            ->set_relation('PROYECTO_ID','proyectos','PRY_NOMBRE')
            ->set_relation('JORNADA_ID','jornadas','{JRN_DIAS_TRABAJO} - {JRN_DIAS_DESCANSO}')
            ->set_relation('HORARIO_ID','horarios','De {HRR_HORA_INICIO} a {HRR_HORA_FIN}')

            ->set_rules('CDR_NOMBRE','required|is_unique[cuadrillas.cdr_nombre]|max_length[60]')
            ->set_rules('CRG_NOMBRE','Nombre del cargo','required');

            //leer permisos desde la bd
            $arr_acciones = $this->modulos_model->get_acciones_por_rol_modulo($this->tank_auth->is_admin(), $this->id_modulo[0]);
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
                    show_error('No tienes permisos para esta operación');
                } else {
                    show_error($e->getMessage());
                }
            }
	        $this->_cargo_output($output);
        } else {
        	redirect('/inicio/');
        }
    }


    function _cargo_output($output = null) {
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
        $this->load->view('template/header',$output);
        $this->load->view('template/menu',$output);
        $this->load->view('template/template',$output);
        $this->load->view('template/footer',$output);   
    }


}

/* End of file periodos_salida.php */
/* Location: ./application/controllers/periodos_salida.php */