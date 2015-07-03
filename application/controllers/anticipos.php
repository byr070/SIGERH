<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Anticipos extends CI_Controller {
	
	private $id_modulo = NULL;
	
	function __construct() {
		parent::__construct();
		$this->load->library('grocery_CRUD');
        $this->load->library('tank_auth_groups','','tank_auth');
        $this->lang->load('tank_auth','spanish');
        $this->load->library('form_validation');
		$this->load->model('catalogos/modulos_model');
        $this->load->model('empleados/tarjetas_model');
		$this->id_modulo = $this->modulos_model->get_id_modulo_por_nombre(get_class($this));
	}
	
	public function index() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
        	if(!is_null($this->id_modulo)){
                redirect('/anticipos/seguridad/');
            } else {
            	redirect('/inicio/');
            }
        }
    }

    public function validarFormulario(){
        $this->form_validation->set_rules('codigo','código de verificación','required');
        $this->form_validation->set_message('required','El campo: %s, es obligatorio');
    }

    public function seguridad(){
    	if ($this->input->post()) {

            $this->validarFormulario();

			if ($this->form_validation->run() == TRUE){
				
                $datos_formulario = $this->input->post();
				unset($datos_formulario['btn_aceptar']);
                $codigo = $datos_formulario['codigo'];

                $resultado = $this->tarjetas_model->get_todos($this->tank_auth->get_user_id()-1);
                $tarjeta = get_object_vars($resultado['0']);

                for ($i=1; $i <= 10; $i++) {
                    $pos = 'TRJ_'.$i.'_VALOR';
                    $hash = $tarjeta[$pos];
                    if(password_verify($codigo,$hash)){ //ingreso un codigo correcto
                        // echo 'COD CORRECTO ';

                        //se analiza el estado del codigo
                        $pos = 'TRJ_'.$i.'_ESTADO';
                        // print_r($tarjeta);

                        if($tarjeta[$pos]==1){ //codigo tiene estado 1 (activado)
                            // se cambia el estado del codigo a 0 (desactivado)
                            $tarjeta[$pos]=0;
                            $this->tarjetas_model->update($tarjeta,$tarjeta['TRJ_ID']);

                            // se le permite ingresar
                            $this->listar();
                            break;
                        }else{ //codigo tiene estado 0 (desactivado)
                            // echo "ya utilizo el codigo ";
                            $this->_anticipo_output('none','inline','none');
                            break;
                        }
                    }
                    else{ //ingreso un codigo incorrecto
                       // echo 'COD INCORRECTO ';
                       $this->_anticipo_output('none','none','inline');
                       break;
                    }
                }
	
			} else{
                $this->_anticipo_output('none','none','none');
			}
		}else{
            $this->_anticipo_output('none','none','none');
		}
    }
	function _anticipo_output($display_btn_ver_tarjeta,$display_alr_utilizado,$display_alr_incorrecto){
        $data['display_btn_ver_tarjeta'] = $display_btn_ver_tarjeta;
        $data['display_alr_utilizado'] = $display_alr_utilizado;
        $data['display_alr_incorrecto'] = $display_alr_incorrecto;

        $data['user_id']    = $this->tank_auth->get_user_id()-1;
        $data['username']   = $this->tank_auth->get_username();
        $data['is_admin']   = $this->tank_auth->is_admin();

        $arr_menu = $this->modulos_model->get_modulos_por_rol($this->session->userdata('group_id'));
        $data['menu'] = $arr_menu;
        $this->load->view('template/header',$data);
        $this->load->view('template/menu',$data);
        $this->load->view('anticipo/anticipo_form',$data);
        $this->load->view('template/footer');
    }
	public function listar() {
        if(!is_null($this->id_modulo)){
			$table_name='anticipos';
			$crud = new grocery_CRUD();
    	    $crud->set_subject('Anticipo');
    	    $crud->set_table($table_name);
    	    // if(!$this->tank_auth->is_admin()){
    	    // 	$crud->where('EMP_NOMBRE_COMPLETO',$this->tank_auth->get_username());
    	    // }
        	$crud->columns('ANT_FECHA','ANT_MONTO','ANT_OPCIONES')
    	    ->fields('ANT_FECHA','ANT_MONTO','ANT_OPCIONES','EMPLEADO_ID')
       		->display_as('ANT_FECHA','Fecha')
	    	->display_as('ANT_MONTO','Monto')
            ->display_as('ANT_OPCIONES','Opciones')

			->change_field_type('EMPLEADO_ID','invisible')


	        ->required_fields('ANT_FECHA','ANT_MONTO')
	        ->callback_before_insert(array($this,'_crear_anticipo'));
	        
    	    //leer permisos desde la bd
            $arr_acciones = $this->modulos_model->get_acciones_por_rol_modulo($this->tank_auth->is_admin(), $this->id_modulo[0]);
            $crud->unset_read();
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
	        $this->_grocery_output($output);
        } 
        else {
        	redirect('/inicio/');
        }
    }

    
    function _grocery_output($output = null) {
    	$data['user_id']    = $this->tank_auth->get_user_id()-1;
        $data['username']   = $this->tank_auth->get_username();
        $data['is_admin']   = $this->tank_auth->is_admin();
        $output = array_merge((array)$output,$data);

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

/* End of file anticipos.php */
/* Location: ./application/controllers/anticipos.php */