<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Salarios extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth_groups','','tank_auth');
		$this->load->library('grocery_CRUD');
		$this->lang->load('tank_auth');
		$this->lang->load('form_validation');
		$this->load->model('catalogos/modulos_model');
		$this->load->model('empleados/empleados_model');
		$this->config->load('salarios',TRUE);
	}

	/**
	 * Generar rol de pagos individual  
	 *
	 * @param	void
	 * @return	void
	 */
	function individual() {
		$this->_pagar_salario(1);
	}

	/**
	 * Generar rol de pagos general
	 *
	 * @param	void
	 * @return	void
	 */
	function general() {
		for ($i = 1; $i <= 2; $i++) {
			$this->_pagar_salario($i);
		}		
	}

	/**
	 * Recuperar el correo electrónico de un empleado
	 * Verificar si los décimos de un empleado están mensualizados
	 * Enviar notificación de la generación de la orden de pago
	 *
	 * @param	int		ID de empleado
	 * @return	void
	 */
	function _pagar_salario($empleado_id) {
	
		$SBU = $this->config->item('SBU', 'salarios');
		$aporte_IESS = $this->config->item('aporte_IESS', 'salarios');

		$data['empleado_id'] = $empleado_id;

		$data['email'] = $this->empleados_model->get_email($data['empleado_id'])[0]['email'];
		$salario = $this->empleados_model->get_salario($data['empleado_id'])[0]['SLR_VALOR'];
		$mensualizado = $this->empleados_model->estan_decimos_mensualizados($data['empleado_id'])[0]['EMP_MENS'];

		if($mensualizado == 0){
				$data['salario'] = number_format($salario - ($salario * $aporte_IESS / 100), 2);
		} else if($mensualizado == 1){
			$data['salario'] = number_format($salario - ($salario * $aporte_IESS / 100) + ($SBU / 12) + ($salario / 12), 2);
		}
		unset($data['empleado_id']);

		$this->_enviar_notificacion($data);
	}

	public function listar() {
        //if(!is_null($this->id_modulo)){
			$table_name = 'empleados';
			$crud = new grocery_CRUD();
    	    $crud->set_subject('Empleado');
    	    $crud->set_table($table_name);
    	    if(!$this->tank_auth->is_admin()){
    	    	$crud->where('USUARIO_ID',$this->tank_auth->get_user_id());
    	    }
        	$crud->columns('EMP_NOMBRE_COMPLETO','CARGO_ID','EMP_MENS')
        		 ->display_as('EMP_NOMBRE_COMPLETO','NOMBRE')
        		 ->display_as('CARGO_ID','CARGO')
            	 ->display_as('EMP_MENS','MENSUALIZACIÓN SALARIO')
            	 ->set_relation('CARGO_ID','cargos','CRG_NOMBRE');
            //$crud->set_relation('SALARIO_ID','salarios','SLR_VALOR');
	        //$crud->set_rules('EMP_NOMBRE_COMPLETO','nombre del empleado','trim|is_unique[empleados.EMP_NOMBRE_COMPLETO]|required|xss_clean|min_length['.$this->config->item('username_min_length', 'tank_auth').']|callback_alpha_dash_space');
        //}
        try {
                $output = $crud->render();
            } catch(Exception $e) {
                if($e->getCode() == 14) {
                    show_error('No tiene permisos para esta operación.');
                } else {
                    show_error($e->getMessage());
                }
            }
	        $this->_empleado_output($output);
    }

    function _empleado_output($output = null) {
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

	/**
	 * Envia la notificación de la generación de la orden de pago,
	 * vía correo electrónico.
	 *
	 * @param	array
	 * @return	void
	 */
	function _enviar_notificacion($data) {
		$data['site_name'] = $this->config->item('website_name', 'tank_auth');
		try {
			$this->_send_email('orden_pago_salario', $data['email'], $data);
		} catch(Exception $e) {
			show_error($e->getMessage());
		}
	}

	/**
	 * Send email message of given type (activate, forgot_password, etc.)
	 *
	 * @param	string
	 * @param	string
	 * @param	array
	 * @return	void
	 */
	function _send_email($type, $email, &$data)
	{
		$this->load->library('email');
		$this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->to($email);
		$this->email->subject(sprintf($this->lang->line('auth_subject_'.$type), $this->config->item('website_name', 'tank_auth')));
		$this->email->message($this->load->view('email/'.$type.'-html', $data, TRUE));
		$this->email->set_alt_message($this->load->view('email/'.$type.'-txt', $data, TRUE));
		try{
			$this->email->send();
		} catch(Exception $e) {
			show_error($e->getMessage());
		}
	}
}

/* End of file salarios.php */
/* Location: ./application/controllers/salarios.php */