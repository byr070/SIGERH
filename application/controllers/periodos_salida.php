<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Periodos_salida extends CI_Controller {
	
	private $id_modulo = NULL;
	
	function __construct() {
		parent::__construct();

		$this->load->library('security');
		$this->load->library('grocery_CRUD');
		$this->load->library('tank_auth_groups','','tank_auth');
		$this->load->library('table');
		$this->lang->load('tank_auth','spanish');
		$this->load->model('p_salida/periodos_salida_model');
        $this->load->model('catalogos/modulos_model');
		$this->id_modulo = $this->modulos_model->get_id_modulo_por_nombre(get_class($this));
	}
	
	public function index() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
        	if(!is_null($this->id_modulo)){
                redirect('/periodos_salida/listar/');
            } else {
                redirect('/inicio/');
            }
        }
    }
	
	public function listar() {
        if(!is_null($this->id_modulo)){
			$table_name='periodos_salida';
            $table_name_empleados='empleados';
			$crud = new grocery_CRUD();
            $crud->set_theme('bootstrap');
    	    $crud->set_subject('Periodo de salida');
    	    $crud->set_table($table_name);

            if(!$this->tank_auth->is_admin()){
                $crud->where('USUARIO_ID',$this->tank_auth->get_user_id());
            }
            $crud->columns('EMPLEADO_ID','TIPO_PERMISO_ID','PRD_FECHA_INICIO','PRD_FECHA_FIN','PRD_HORA_INICIO','PRD_HORA_FIN');
    	    $crud->add_fields('EMPLEADO_ID','TIPO_PERMISO_ID','PRD_FECHA_INICIO','PRD_FECHA_FIN','PRD_HORA_INICIO','PRD_HORA_FIN');
            $crud->edit_fields('TIPO_PERMISO_ID','PRD_FECHA_INICIO','PRD_FECHA_FIN','PRD_HORA_INICIO','PRD_HORA_FIN');
        	$crud->display_as('PRD_FECHA_INICIO','FECHA INICIO')
    	         ->display_as('PRD_FECHA_FIN','FECHA FIN')
                 ->display_as('PRD_HORA_INICIO','HORA INICIO')
                 ->display_as('PRD_HORA_FIN','HORA FIN')
            	 ->display_as('EMPLEADO_ID','EMPLEADO')
            	 ->display_as('TIPO_PERMISO_ID','TIPO DE PERMISO')
	             ->set_relation('EMPLEADO_ID','empleados','EMP_NOMBRE_COMPLETO',array('EMP_ACTIVADO' => 1))
                 ->set_relation('TIPO_PERMISO_ID','tipos_permiso','TPP_DESCRIPCION')
                 ->field_type('PRD_HORA_INICIO','time')
                 ->field_type('PRD_HORA_FIN','time')
                 ->set_rules('EMPLEADO_ID','nombre de empleado','required')
                 ->set_rules('TIPO_PERMISO_ID','tipo de permiso','required')
                 ->set_rules('PRD_FECHA_INICIO','fecha inicio','required|callback_verificar_fecha_cruzada[EMPLEADO_ID]')
                 ->set_rules('PRD_FECHA_FIN','fecha fin','required|callback_verificar_fecha[PRD_FECHA_INICIO]|callback_verificar_fecha_cruzada[EMPLEADO_ID]|callback_verificar_periodo_cruzado[PRD_FECHA_INICIO,EMPLEADO_ID]')
                 ->set_rules('PRD_HORA_INICIO','hora inicio','required')
                 ->set_rules('PRD_HORA_FIN','hora fin','required|callback_verificar_hora[PRD_FECHA_INICIO,PRD_FECHA_FIN,PRD_HORA_INICIO,EMPLEADO_ID]')
                 ->callback_before_insert(array($this, 'verificar_horas'))
                 ->callback_before_update(array($this, 'verificar_horas'))
                 ->callback_add_field('PRD_HORA_INICIO',array($this,'add_field_hora_inicio'))
                 ->callback_add_field('PRD_HORA_FIN',array($this,'add_field_hora_fin'))
                 ->callback_edit_field('PRD_HORA_INICIO',array($this,'edit_field_hora_inicio'))
                 ->callback_edit_field('PRD_HORA_FIN',array($this,'add_field_hora_fin'))
                 ;
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
	        $this->_periodo_output($output);
        } else {
        	redirect('/inicio/');
        }
    }

    function add_field_hora_inicio(){
        return '
            <div class="input-group clockpicker " style="width: 135px; margin-bottom: 10px;">
                <input type="text" readonly class="form-control" value="" placeholder="Elegir hora" id="field-PRD_HORA_INICIO" name="PRD_HORA_INICIO">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
        ';
    }

    function add_field_hora_fin(){
        return '
            <div class="input-group clockpicker " style="width: 135px; margin-bottom: 10px;">
                <input type="text" readonly class="form-control" value="" placeholder="Elegir hora" id="field-PRD_HORA_FIN" name="PRD_HORA_FIN">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
        ';
    }
    function edit_field_hora_inicio($value, $primary_key){
        return '
            <div class="input-group clockpicker " style="width: 135px; margin-bottom: 10px;">
                <input type="text" readonly class="form-control" value="'.$value.'" placeholder="Elegir hora" id="field-PRD_HORA_INICIO" name="PRD_HORA_INICIO">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
        ';
    }

    function edit_field_hora_fin($value, $primary_key){
        return '
            <div class="input-group clockpicker " style="width: 135px; margin-bottom: 10px;">
                <input type="text" readonly class="form-control" value="'.$value.'" placeholder="Elegir hora" id="field-PRD_HORA_FIN" name="PRD_HORA_FIN">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
        ';
    }
    function verificar_horas($post_array) {
        if($post_array['PRD_FECHA_INICIO']!=$post_array['PRD_FECHA_FIN']){
            $post_array['PRD_HORA_INICIO']="00:00";
            $post_array['PRD_HORA_FIN']="00:00";
        }
        return $post_array;
    }

    function verificar_fecha($fecha_fin,$fecha_inicio_name) {
        $fecha_inicio = $_POST[$fecha_inicio_name];
        $fecha_i_f=date_format(date_create($fecha_inicio),"Y-m-d");
        $fecha_f_f=date_format(date_create($fecha_fin),"Y-m-d");
        if ($fecha_f_f < $fecha_i_f) {
            $this->form_validation->set_message('verificar_fecha', 'La %s debe ser mayor que %s.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    function verificar_fecha_cruzada($fecha,$empleado_name) {
        $empleado_id = $_POST[$empleado_name];
        $arr_fechas = $this->periodos_salida_model->get_fechas_por_empleado($empleado_id);
        $fecha_f=date_format(date_create($fecha),"Y-m-d");
        foreach ($arr_fechas as $key => $value) {
            $fecha_inicio=date_format(date_create($value['PRD_FECHA_INICIO']),"Y-m-d");
            $fecha_fin=date_format(date_create($value['PRD_FECHA_FIN']),"Y-m-d");
            if($fecha_f >= $fecha_inicio && $fecha_f <= $fecha_fin){
                $this->form_validation->set_message('verificar_fecha_cruzada', 'La %s se cruza con un periodo registrado.');
                return FALSE;
            }
        }
        return TRUE;
    }

    function verificar_periodo_cruzado($fecha_fin,$fields_name) {
        list($fecha_inicio_param,$empleado_id_param) = split(',', $fields_name);
        
        $fecha_inicio = $_POST[$fecha_inicio_param];
        $empleado_id = $_POST[$empleado_id_param];
        
        $fecha_i_f=date_format(date_create($fecha_inicio),"Y-m-d");
        $fecha_f_f=date_format(date_create($fecha_fin),"Y-m-d");
        
        $arr_fechas = $this->periodos_salida_model->get_fechas_por_empleado($empleado_id);
        foreach ($arr_fechas as $key => $value) {
            $fecha_f=date_format(date_create($value['PRD_FECHA_FIN']),"Y-m-d");
            if($fecha_f >= $fecha_i_f && $fecha_f <= $fecha_f_f){
                $this->form_validation->set_message('verificar_periodo_cruzado', 'La %s se cruza con un periodo registrado.');
                return FALSE;
            }
        }
        return TRUE;
    }

    function verificar_hora($hora_fin,$fields_name) {
        
        list($fecha_inicio_param, $fecha_fin_param, $hora_inicio_param,$empleado_id_param) = split(',', $fields_name);

        $fecha_inicio = $_POST[$fecha_inicio_param];
        $fecha_fin = $_POST[$fecha_fin_param];
        $hora_inicio = $_POST[$hora_inicio_param];
        $empleado_id = $_POST[$empleado_id_param];
        
        if ($fecha_inicio==$fecha_fin) {
            if($hora_fin <= $hora_inicio) {
                $this->form_validation->set_message('verificar_hora', 'La %s debe ser mayor que la hora inicio.');
                return FALSE;
            } else {
                return TRUE;
            }
        }
    }

    function _periodo_output($output = null) {
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