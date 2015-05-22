<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cargos extends CI_Controller {
	
	private $id_modulo = NULL;
	
	function __construct() {
		parent::__construct();

		$this->load->library('grocery_CRUD');
		$this->load->library('tank_auth_groups','','tank_auth');
		$this->load->library('table');
		$this->lang->load('tank_auth','spanish');
		//$this->load->model('empleado/empleado_model');
		$this->load->model('catalogos/modulos_model');
		$this->id_modulo = $this->modulos_model->get_id_modulo_por_nombre(get_class($this));
	}
	
	public function index() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
        	if(!is_null($this->id_modulo)){
                redirect('/cargos/listar/');
            } else {
            	redirect('/inicio/');
            }
        }
    }
	
	public function listar() {
        //if(!is_null($this->id_modulo)){
			$table_name='cargos';
			$crud = new grocery_CRUD();
    	    $crud->set_subject('Cargo');
    	    $crud->set_table($table_name)
            ->columns('CRG_NOMBRE','CRG_DESCRIPCION','JORNADA_ID','HORARIO_ID','CRG_CREADO','CRG_MODIFICADO')
            ->fields('CRG_NOMBRE','CRG_DESCRIPCION','JORNADA_ID','HORARIO_ID')
            ->display_as('CRG_NOMBRE','NOMBRE')
            ->display_as('CRG_DESCRIPCION','DESCRIPCION')
            ->display_as('JORNADA_ID','JORNADA')
            ->display_as('HORARIO_ID','HORARIO')
            ->display_as('CRG_CREADO','CREADO')
            ->display_as('CRG_MODIFICADO','CRG_MODIFICADO')

            ->set_relation('JORNADA_ID','jornadas','{JRN_DIAS_TRABAJO} - {JRN_DIAS_DESCANSO}')
            ->set_relation('HORARIO_ID','horarios','De {HRR_HORA_INICIO} a {HRR_HORA_FIN}')
            
            ->set_rules('CRG_NOMBRE','Nombre del cargo','required')
            ->set_rules('CRG_DESCRIPCION','Descripción','required')
            ->set_rules('JORNADA_ID','Jornada','required')
            ->set_rules('HORARIO_ID','Horario','required');

            //leer permisos desde la bd
            //$arr_acciones = $this->modulos_model->get_acciones_por_rol_modulo($this->tank_auth->is_admin(), $this->id_modulo[0]);
            //deshabilitar opciones unset_read,unset_edit,unset_delete,unset_add
            //print_r($arr_acciones);
            // $crud->unset_operations();
            //Ocultar botón Ver, Exportar, Imprimir
            $crud->unset_read();
            $crud->unset_export();
            $crud->unset_print();
            //si no tiene permiso para add entonces
            /*if(!in_array('Crear', $arr_acciones)) {
                $crud->unset_add();
            }*/
            //si no tiene permiso para editar entonces
            /*if(!in_array('Editar', $arr_acciones)) {
                $crud->unset_edit();
            }*/
            //si no tiene permiso para leer entonces
            /*if(!in_array('Ver', $arr_acciones)) {
                $crud->unset_list();
            }*/
            //si no tiene permiso para borrar entonces
            /*if(!in_array('Eliminar', $arr_acciones)) {
                $crud->unset_delete();
            }*/
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
        //} else {
        //	redirect('/inicio/');
        //}
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
        $this->load->view('template/template.php',$output);    
    }


}

/* End of file periodos_salida.php */
/* Location: ./application/controllers/periodos_salida.php */