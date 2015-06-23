<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Pagos extends CI_Controller {
	
	private $id_modulo = NULL;
	
	function __construct() {
		parent::__construct();
        $this->load->library('form_validation');
		$this->load->library('grocery_CRUD');
		$this->load->library('tank_auth_groups','','tank_auth');
		$this->load->model('catalogos/modulos_model');
        $this->id_modulo = $this->modulos_model->get_id_modulo_por_nombre(get_class($this));
	}
	
	public function index() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
        	if(!is_null($this->id_modulo)){
                redirect('/pagos/listar/');
            } else {
            	redirect('/inicio/');
            }
        }
    }
	
	public function listar() {
        if(!is_null($this->id_modulo)){
			$table_name='pagos';
			$crud = new grocery_CRUD();
            $crud->set_subject('Pago')
    	    ->set_table($table_name)

            ->columns('EMPLEADO_ID','EMPLEADO_CARGO','EMPLEADO_SUELDO','PGS_DIAS_TRABAJADOS','PGS_SUELDO_GANADO',
                'PGS_HORAS_EXTRAS_50','PGS_HORAS_EXTRAS_100','PGS_VALOR_HORAS_EXTRAS','PGS_COMISIONES','PGS_INGRESOS',
                'PGS_IESS','PGS_QUIROGRAFARIO','PGS_ANTICIPOS','PGS_DESCUENTOS','PGS_TOTAL')
            ->fields('EMPLEADO_ID','EMPLEADO_CARGO','PGS_DIAS_TRABAJADOS','PGS_SUELDO_GANADO',
                'PGS_HORAS_EXTRAS_50','PGS_HORAS_EXTRAS_100','PGS_COMISIONES','PGS_VALOR_HORAS_EXTRAS','PGS_INGRESOS',
                'PGS_IESS','PGS_QUIROGRAFARIO','PGS_ANTICIPOS','PGS_DESCUENTOS','PGS_TOTAL')
            // ->required_fields('EMPLEADO_ID','PGS_DIAS_TRABAJADOS','PGS_HORAS_EXTRAS_50','PGS_HORAS_EXTRAS_100','PGS_COMISIONES',
            //     'PGS_QUIROGRAFARIO','PGS_ANTICIPOS')
            ->order_by('EMPLEADO_ID','asc')

            ->change_field_type('EMPLEADO_CARGO','invisible')
            // ->change_field_type('EMPLEADO_SUELDO','invisible')
            ->change_field_type('PGS_SUELDO_GANADO','invisible')
            ->change_field_type('PGS_VALOR_HORAS_EXTRAS','invisible')
            ->change_field_type('PGS_INGRESOS','invisible')
            ->change_field_type('PGS_IESS','invisible')
            ->change_field_type('PGS_DESCUENTOS','invisible')
            ->change_field_type('PGS_TOTAL','invisible')

            ->display_as('EMPLEADO_ID','Nombre')
            ->display_as('EMPLEADO_CARGO','Cargo')
            ->display_as('EMPLEADO_SUELDO','Sueldo')
            ->display_as('PGS_DIAS_TRABAJADOS','Días trabajados')
            ->display_as('PGS_SUELDO_GANADO','Sueldo ganado')
            ->display_as('PGS_HORAS_EXTRAS_50','Horas extras 50 %')
            ->display_as('PGS_HORAS_EXTRAS_100','Horas extras 100 %')
            ->display_as('PGS_COMISIONES','Comisiones')
            ->display_as('PGS_VALOR_HORAS_EXTRAS','Valor horas extras')
            ->display_as('PGS_INGRESOS','INGRESOS')
            ->display_as('PGS_IESS','Aporte IESS')
            ->display_as('PGS_QUIROGRAFARIO','Préstamos quirografarios')
            ->display_as('PGS_ANTICIPOS','Anticipos y préstamos')
            ->display_as('PGS_DESCUENTOS','DESCUENTOS')
            ->display_as('PGS_TOTAL','TOTAL')

            ->set_relation('EMPLEADO_ID','empleados','EMP_NOMBRE_COMPLETO',array('EMP_ACTIVADO' => 1))

            ->callback_column('EMPLEADO_SUELDO',array($this,'valueToDollar'))
            ->callback_column('PGS_SUELDO_GANADO',array($this,'valueToDollar'))
            ->callback_column('PGS_HORAS_EXTRAS_50',array($this,'column_horas'))
            ->callback_column('PGS_HORAS_EXTRAS_100',array($this,'column_horas'))
            ->callback_column('PGS_DIAS_TRABAJADOS',array($this,'column_dias'))
            ->callback_column('PGS_COMISIONES',array($this,'valueToDollar'))
            ->callback_column('PGS_VALOR_HORAS_EXTRAS',array($this,'valueToDollar'))
            ->callback_column('PGS_INGRESOS',array($this,'valueToDollar'))
            ->callback_column('PGS_IESS',array($this,'valueToDollar'))
            ->callback_column('PGS_QUIROGRAFARIO',array($this,'valueToDollar'))
            ->callback_column('PGS_ANTICIPOS',array($this,'valueToDollar'))
            ->callback_column('PGS_DESCUENTOS',array($this,'valueToDollar'))
            ->callback_column('PGS_TOTAL',array($this,'valueToDollar'))

            ->callback_add_field('PGS_DIAS_TRABAJADOS',array($this,'add_field_dias_trabajados'))
            ->callback_add_field('PGS_HORAS_EXTRAS_50',array($this,'add_field_horas_extras_50'))
            ->callback_add_field('PGS_HORAS_EXTRAS_100',array($this,'add_field_horas_extras_100'))
            ->callback_add_field('PGS_COMISIONES',array($this,'add_field_comisiones'))
            ->callback_add_field('PGS_QUIROGRAFARIO',array($this,'add_field_quirografario'))
            ->callback_add_field('PGS_ANTICIPOS',array($this,'add_field_anticipos'))

            ->callback_edit_field('PGS_DIAS_TRABAJADOS',array($this,'edit_field_dias_trabajados'))
            ->callback_edit_field('PGS_HORAS_EXTRAS_50',array($this,'edit_field_horas_extras_50'))
            ->callback_edit_field('PGS_HORAS_EXTRAS_100',array($this,'edit_field_horas_extras_100'))
            ->callback_edit_field('PGS_COMISIONES',array($this,'edit_field_comisiones'))
            ->callback_edit_field('PGS_QUIROGRAFARIO',array($this,'edit_field_quirografario'))
            ->callback_edit_field('PGS_ANTICIPOS',array($this,'edit_field_anticipos'))

            ->callback_before_insert(array($this,'calcularValores'))

            // ->set_rules('PGS_DIAS_TRABAJADOS','días trabajados','numeric')
            ;
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
            $this->_pago_output($output);
        } else {
            redirect('/inicio/');
        }
    }

    function valueToDollar($value, $row){
        return '$ '.$value;
    }
    function column_dias($value,$row){
        return $value.' días';
    }
    function column_horas($value,$row){
        return $value.' horas';
    }

    function add_field_dias_trabajados(){
        return '<input type="range" id="addTrabajados" min="0" max="30" value="30" oninput="outputUpdateTrabajo(value)">
        <div class="input-group">
            <input type="number" name="PGS_DIAS_TRABAJADOS" for="addTrabajados" value="30" min="0"
             class="form-control" id="field-PGS_DIAS_TRABAJADOS" />
            <span class="input-group-addon">días</span>
        </div>';        
    }
    function edit_field_dias_trabajados($value, $primary_key){
        return '<input type="range" id="editTrabajados" min="0" max="30" value="'.$value.'" oninput="outputUpdateTrabajo(value)">
        <div class="input-group">
            <input type="number" name="PGS_DIAS_TRABAJADOS" for="editTrabajados" value="'.$value.'" min="0"
             class="form-control currency" id="field-PGS_DIAS_TRABAJADOS" />
            <span class="input-group-addon">días</span>
        </div>';        
    }

    function add_field_horas_extras_50(){
        return '<input type="range" id="addExtras50" min="0" max="400" value="0" oninput="outputUpdateExtrasCincuenta(value)">
        <div class="input-group">
            <input type="number" name="PGS_HORAS_EXTRAS_50" for="addExtras50" value="0" min="0"
             class="form-control" id="field-PGS_HORAS_EXTRAS_50" />
            <span class="input-group-addon">horas</span>
        </div>';        
    }
    function edit_field_horas_extras_50($value,$primary_key){
        return '<input type="range" id="editExtras50" min="0" max="400" value="'.$value.'" oninput="outputUpdateExtrasCincuenta(value)">
        <div class="input-group">
            <input type="number" name="PGS_HORAS_EXTRAS_50" for="editExtras50" value="'.$value.'" min="0"
             class="form-control" id="field-PGS_HORAS_EXTRAS_50" />
            <span class="input-group-addon">horas</span>
        </div>';        
    }

    function add_field_horas_extras_100(){
        return '<input type="range" id="addExtras100" min="0" max="400" value="0" oninput="outputUpdateExtrasCien(value)">
        <div class="input-group">
            <input type="number" name="PGS_HORAS_EXTRAS_100" for="addExtras100" value="0" min="0"
             class="form-control" id="field-PGS_HORAS_EXTRAS_100" />
            <span class="input-group-addon">horas</span>
        </div>';        
    }
    function edit_field_horas_extras_100($value,$primary_key){
        return '<input type="range" id="editExtras100" min="0" max="400" value="'.$value.'" oninput="outputUpdateExtrasCien(value)">
        <div class="input-group">
            <input type="number" name="PGS_HORAS_EXTRAS_100" for="editExtras100" value="'.$value.'" min="0"
            class="form-control" id="field-PGS_HORAS_EXTRAS_100" />
            <span class="input-group-addon">horas</span>
        </div>';        
    }

    function add_field_comisiones($row){
        return '<input type="range" id="addComision" min="0" max="10000" value="0" oninput="outputUpdateComision(value)">
        <div class="input-group">
            <span class="input-group-addon">$</span>
            <input type="number" name="PGS_COMISIONES" for="addComision" value="0" min="0" step="0.01"
             class="form-control" id="field-PGS_COMISIONES" />
        </div>';    
    }
    function edit_field_comisiones($value,$primary_key){
        return '<input type="range" id="editComision" min="0" max="10000" value="'.$value.'" oninput="outputUpdateComision(value)">
        <div class="input-group">
            <span class="input-group-addon">$</span>
            <input type="number" name="PGS_COMISIONES" for="editComision" value="'.$value.'" min="0" step="0.01"
             class="form-control" id="field-PGS_COMISIONES" />
        </div>';    
    }

    function add_field_quirografario($row){
        return '<input type="range" id="addQuirografario" min="0" max="10000" value="0" oninput="outputUpdateQuirografario(value)">
        <div class="input-group">
            <span class="input-group-addon">$</span>
            <input type="number" name="PGS_QUIROGRAFARIO" for="addQuirografario" value="0" min="0" step="0.01"
             class="form-control" id="field-PGS_QUIROGRAFARIO" />
        </div>';    
    }
    function edit_field_quirografario($value,$primary_key){
        return '<input type="range" id="editQuirografario" min="0" max="10000" value="'.$value.'" oninput="outputUpdateQuirografario(value)">
        <div class="input-group">
            <span class="input-group-addon">$</span>
            <input type="number" name="PGS_QUIROGRAFARIO" for="editQuirografario" value="'.$value.'" min="0" step="0.01"
             class="form-control" id="field-PGS_QUIROGRAFARIO" />
        </div>';    
    }

    function add_field_anticipos($row){
        return '<input type="range" id="addAnticipo" min="0" max="10000" value="0" oninput="outputUpdateAnticipo(value)">
        <div class="input-group">
            <span class="input-group-addon">$</span>
            <input type="number" name="PGS_ANTICIPOS" for="addAnticipo" value="0" min="0" step="0.01"
             class="form-control" id="field-PGS_ANTICIPOS" />
        </div>
        ';    
    }
    function edit_field_anticipos($value,$primary_key){
        return '<input type="range" id="addAnticipo" min="0" max="10000" value="'.$value.'" oninput="outputUpdateAnticipo(value)">
        <div class="input-group">
            <span class="input-group-addon">$</span>
            <input type="number" name="PGS_ANTICIPOS" for="addAnticipo" value="'.$value.'" min="0" step="0.01"
             class="form-control" id="field-PGS_ANTICIPOS" />
        </div>
        ';    
    }

    function calcularValores($post_array){
        $post_array['PGS_SUELDO_GANADO'] = round($post_array['EMPLEADO_SUELDO']/30*$post_array['PGS_DIAS_TRABAJADOS'],2);
        
        $totalHorasExtras=$post_array['PGS_HORAS_EXTRAS_50']*1.5 + $post_array['PGS_HORAS_EXTRAS_100']*2;
        $post_array['PGS_VALOR_HORAS_EXTRAS'] = round(($post_array['EMPLEADO_SUELDO']/30)/8 * $totalHorasExtras,2);
        $post_array['PGS_INGRESOS'] = $post_array['PGS_SUELDO_GANADO'] + $post_array['PGS_VALOR_HORAS_EXTRAS'] + $post_array['PGS_COMISIONES'];

        $post_array['PGS_IESS'] = round($post_array['PGS_INGRESOS'] * 0.0935,2);
        $post_array['PGS_DESCUENTOS'] = $post_array['PGS_IESS'] + $post_array['PGS_QUIROGRAFARIO'] + $post_array['PGS_ANTICIPOS'];

        $post_array['PGS_TOTAL'] = $post_array['PGS_INGRESOS'] - $post_array['PGS_DESCUENTOS'];
        return $post_array;
    }

    function _pago_output($output = null) {
    	$data['user_id']    = $this->tank_auth->get_user_id();
        $data['username']   = $this->tank_auth->get_username();
        $data['is_admin']   = $this->tank_auth->is_admin();
        $output = array_merge((array)$output,$data);
        //recuperar modulos de la bd
        $arr_menu = $this->modulos_model->get_modulos_por_rol($this->session->userdata('group_id'));
        $menu['menu'] = $arr_menu;
        $output = array_merge($output,$menu);
        $this->load->view('template/header',$output);
        $this->load->view('template/menu',$output);
        $this->load->view('template/template',$output);
        $this->load->view('template/footer',$output);
    }
}

/* End of file pagos.php */
/* Location: ./application/controllers/pagos.php */