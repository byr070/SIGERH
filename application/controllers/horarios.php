<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Horarios extends CI_Controller {
	
	private $id_modulo = NULL;
	
	function __construct() {
		parent::__construct();

		// $this->load->library('security');
		$this->load->library('grocery_CRUD');
		$this->load->library('tank_auth_groups','','tank_auth');
		$this->lang->load('tank_auth','spanish');
        // $this->load->library('table');		
		$this->load->model('catalogos/modulos_model');
		$this->id_modulo = $this->modulos_model->get_id_modulo_por_nombre(get_class($this));
	}
	
	public function index() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            if(!is_null($this->id_modulo)){
                redirect('/horarios/listar/');
            } else {
            	 redirect('/inicio/');
            }
        }
    }
	
	public function listar() {
        if(!is_null($this->id_modulo)){
			$table_name='horarios';
			$crud = new grocery_CRUD();
    	    $crud->set_subject('Horario')
            ->set_table($table_name)

            ->columns('HRR_HORA_INICIO','HRR_HORA_FIN')
            ->fields('HRR_HORA_INICIO','HRR_HORA_FIN')

            ->display_as('HRR_HORA_INICIO','Hora de inicio')
            ->display_as('HRR_HORA_FIN','Hora fin')

            ->set_rules('HRR_HORA_INICIO','Hora de inicio','required')
            ->set_rules('HRR_HORA_FIN','Hora fin','required|callback_verificar_hora[HRR_HORA_INICIO]')

            // ->field_type('HRR_HORA_INICIO','time')
            // ->field_type('HRR_HORA_FIN','time')

            ->callback_add_field('HRR_HORA_INICIO',array($this,'add_field_hora_inicio'))
            ->callback_add_field('HRR_HORA_FIN',array($this,'add_field_hora_fin'))
            ->callback_edit_field('HRR_HORA_INICIO',array($this,'edit_field_hora_inicio'))
            ->callback_edit_field('HRR_HORA_FIN',array($this,'edit_field_hora_fin'));

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
                    show_error('No tiene permisos para esta operación');
                } else {
                    show_error($e->getMessage());
                }
            }
	        $this->_horarios_output($output);
        } else {
        	 redirect('/inicio/');
        }
    }

    function edit_field_hora_inicio($value, $primary_key){
        return '
            <div class="input-group clockpicker " style="width: 135px; margin-bottom: 10px;">
                <input type="text" readonly class="form-control" value="'.$value.'" placeholder="Elegir hora" id="field-HRR_HORA_INICIO" name="HRR_HORA_INICIO">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
        ';
    }
    function add_field_hora_inicio(){
        return '
            <div class="input-group clockpicker " style="width: 135px; margin-bottom: 10px;">
                <input type="text" readonly class="form-control" value="" placeholder="Elegir hora" id="field-HRR_HORA_INICIO" name="HRR_HORA_INICIO">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
        ';
    }

    function edit_field_hora_fin($value, $primary_key){
        return '
            <div class="input-group clockpicker " style="width: 135px; margin-bottom: 10px;">
                <input type="text" readonly class="form-control" value="'.$value.'" placeholder="Elegir hora" id="field-HRR_HORA_FIN" name="HRR_HORA_FIN">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
        ';
    }

    function add_field_hora_fin(){
        return '
            <div class="input-group clockpicker " style="width: 135px; margin-bottom: 10px;">
                <input type="text" readonly class="form-control" value="" placeholder="Elegir hora" id="field-HRR_HORA_FIN" name="HRR_HORA_FIN">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
        ';
    }

    function verificar_hora($hora_fin,$hora_inicio_param) {
        $hora_inicio = $_POST[$hora_inicio_param];
        if($hora_fin <= $hora_inicio) {
            $this->form_validation->set_message('verificar_hora', 'La %s debe ser mayor que la %s.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function _horarios_output($output = null) {
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

/* End of file horarios.php */
/* Location: ./application/controllers/horarios.php */