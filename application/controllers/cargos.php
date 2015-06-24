<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Cargos extends CI_Controller {
	
	private $id_modulo = NULL;
	
	function __construct() {
		parent::__construct();

		$this->load->library('grocery_CRUD');
		$this->load->library('tank_auth_groups','','tank_auth');
		$this->lang->load('tank_auth','spanish');
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
        if(!is_null($this->id_modulo)){
			$table_name='cargos';
			$crud = new grocery_CRUD();
    	    $crud->set_subject('Cargo');
    	    $crud->set_table($table_name);
            $crud->set_theme('bootstrap')
            ->columns('CRG_NOMBRE','CRG_SUELDO')
            ->fields('CRG_NOMBRE','CRG_SUELDO')
            
            ->display_as('CRG_NOMBRE','Nombre')
            ->display_as('CRG_SUELDO','Sueldo')
            

            ->set_rules('CRG_NOMBRE','nombre del cargo','required')
            ->set_rules('CRG_SUELDO','descripción del cargo','required|numeric')
            
            ->callback_add_field('CRG_SUELDO',array($this,'add_field_sueldo'))
            ->callback_edit_field('CRG_SUELDO',array($this,'edit_field_sueldo'))

            ->callback_column('CRG_SUELDO',array($this,'valueToDollar'));

            //leer permisos desde la bd
            $arr_acciones = $this->modulos_model->get_acciones_por_rol_modulo($this->tank_auth->is_admin(), $this->id_modulo[0]);
            $crud->unset_export();
            $crud->unset_print();
            if (is_null($arr_acciones)) {
                redirect('/inicio/');
            } else {
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

    function valueToDollar($value, $row){
        return '$ '.$value;
    }

    function add_field_sueldo(){
        return '<input type="range" id="addSueldo" min="1" max="15000" value="1000" oninput="outputUpdateSueldo(value)">
        <div class="input-group">
            <span class="input-group-addon">$</span>
            <input type="number" name="CRG_SUELDO" value="1000" min="0" step="0.01"
            data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="sueldoInput" />
        </div>
        ';
    }

    function edit_field_sueldo($value, $primary_key){
        return '<input type="range" id="addSueldo" min="1" max="15000" value="'.$value.'" oninput="outputUpdateSueldo(value)">
        <div class="input-group">
            <span class="input-group-addon">$</span>
            <input type="number" name="CRG_SUELDO" value="'.$value.'" min="0" step="0.01"
            data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="sueldoInput" />
        </div>
        ';
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

/* End of file cargos.php */
/* Location: ./application/controllers/cargos.php */