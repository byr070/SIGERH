<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Empleados extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('grocery_CRUD');
		$this->load->library('tank_auth_groups','','tank_auth');
		$this->load->library('table');
		$this->lang->load('form_validation','spanish');
		$this->lang->load('tank_auth','spanish');
		//$this->load->model('empleado/empleado_model');
		$this->load->model('catalogos/modulos_model');
	}
	
	public function index() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            //$data['user_id']    = $this->tank_auth->get_user_id();
            //$data['username']   = $this->tank_auth->get_username();
            
            //if($this->tank_auth->is_admin()) {
                redirect('/empleados/listar/');   
            /*} else {
                //show_404();
                redirect('/auth/');
            }*/
        }
    }
	
	public function listar() {
		//if($this->tank_auth->is_admin()) {
			$crud = new grocery_CRUD();
	        $crud->set_theme('datatables');
    	    $crud->set_subject('Empleado');
        	$crud->set_table('empleados');
	        $crud->columns('EMP_NOMBRE_COMPLETO','EMP_NUMERO_CEDULA','EMP_FECHA_NACIMIENTO','EMP_FECHA_INGRESO','CUADRILLA_ID','TIPO_ID','TARJETA_ID','CARGO_ID');
    	    $crud->fields('EMP_NOMBRE_COMPLETO','EMP_NUMERO_CEDULA','EMP_FECHA_NACIMIENTO','LUGAR_NACIMIENTO','PROVINCIA_RESIDENCIA','EMP_FECHA_INGRESO','CUADRILLA_ID','TIPO_ID','TARJETA_ID','CARGO_ID');
        	$crud->display_as('EMP_NOMBRE_COMPLETO','NOMBRE')
            	 ->display_as('EMP_NUMERO_CEDULA','NÚMERO CEDULA')
	             ->display_as('EMP_FECHA_NACIMIENTO','FECHA NACIMIENTO')
    	         ->display_as('EMP_FECHA_INGRESO','FECHA INGRESO')
        	     ->display_as('ORGANIZACION_ID','ORGANIZACIÓN')
            	 ->display_as('CUADRILLA_ID','CUADRILLA')
            	 ->display_as('TIPO_ID','TIPO')
            	 ->display_as('TARJETA_ID','TARJETA')
            	 ->display_as('CARGO_ID','CARGO');

	        $crud->set_relation('LUGAR_NACIMIENTO','parroquias','PRR_NOMBRE');
	        $crud->set_relation('PROVINCIA_RESIDENCIA','provincias','PRV_NOMBRE');
	        $crud->set_relation('ORGANIZACION_ID','organizaciones','ORG_NOMBRE');
	        $crud->set_relation('CUADRILLA_ID','cuadrillas','CDR_NOMBRE');
	        $crud->set_relation('TIPO_ID','tipos','TIP_NOMBRE');
	        $crud->set_relation('TARJETA_ID','tarjetas','TRJ_ID');
	        $crud->set_relation('CARGO_ID','cargos','CRG_NOMBRE');
    	    //leer permisos desde la bd
            $id_modulo = $this->modulos_model->get_id_modulo_por_nombre(get_class($this));
            $arr_acciones = $this->modulos_model->get_acciones_por_rol_modulo($this->tank_auth->is_admin(), $id_modulo[0]);
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
                    show_error('No tienes permisos para esta operación');
                } else {
                    show_error($e->getMessage());
                }
            }
	        $this->_empleado_output($output);
        //} else {
        //    redirect('/inicio/');
        //}
    }

    function _empleado_output($output = null) {
    	$data['user_id']    = $this->tank_auth->get_user_id();
        $data['username']   = $this->tank_auth->get_username();
        $data['is_admin']   = $this->tank_auth->is_admin();
        $output = array_merge((array)$output,$data);
        //recuperar modulos de la bd
        $arr_menu = $this->modulos_model->get_modulos_por_rol($data['is_admin']);
        $menu['menu'] = $arr_menu;
        $output = array_merge($output,$menu);
        $this->load->view('template/template.php',$output);    
    }

	function listar_anterior(){
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		} else {
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['email']	= $this->tank_auth->get_email();
			$this->load->view('welcome', $data);
			$this->load->view('menu');
			$this->table->set_heading( array(
				'Id',
				'Nombre completo',
				'Numero cedula',
				'Fecha nacimiento')
			);
			$empleados = $this->empleado_model->listar_empleados();
			foreach ($empleados as /*$key => */$emp) {
				// print_r($key); optional
				// print_r($emp);
				$this->table->add_row( array(
					anchor('/empleados/verDetalle/'.$emp->emp_id, $emp->emp_id),
					anchor('/empleados/verDetalle/'.$emp->emp_id, $emp->emp_nombre_completo),
					$emp->emp_numero_cedula,
					$emp->emp_fecha_nacimiento
					)
				);
			}
			$this->load->view('/empleado/listar_view');
		}
	}
	public function verDetalle($emp_id = '') {
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		} else {
			if (empty($emp_id)){
				redirect('');
			} else {
				if (!is_null($emp = $this->empleado_model->get_empleado($emp_id))){
					$data['user_id']	= $this->tank_auth->get_user_id();
					$data['email']	= $this->tank_auth->get_email();
					$this->load->view('welcome', $data);
					$this->load->view('menu');
					$this->form_validation->set_rules('nombre_completo', 'nombre completo', 'trim|required|xss_clean');
					$this->form_validation->set_rules('numero_cedula', 'numero de cedula', 'trim|required|xss_clean');
					if ($this->form_validation->run()) {
						//actualizar usuario
					}
					$data['empleado'] = $emp;
					$this->load->view('/empleados/ver_detalle_form', $data);
				}else {
					redirect('');
				}
			}
		}
	}
	/**
	 * Enviar un mensaje email del tipo dado (activado, recuperar_clave, etc.)
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
		$this->email->send();
	}
	/**
	 * Crear una imagen CAPTCHA para verificar un usuario como un humano
	 *
	 * @return	string
	 */
	function _create_captcha()
	{
		$this->load->helper('captcha');
		$cap = create_captcha(array(
			'img_path'		=> './'.$this->config->item('captcha_path', 'tank_auth'),
			'img_url'		=> base_url().$this->config->item('captcha_path', 'tank_auth'),
			'font_path'		=> './'.$this->config->item('captcha_fonts_path', 'tank_auth'),
			'font_size'		=> $this->config->item('captcha_font_size', 'tank_auth'),
			'img_width'		=> $this->config->item('captcha_width', 'tank_auth'),
			'img_height'	=> $this->config->item('captcha_height', 'tank_auth'),
			'show_grid'		=> $this->config->item('captcha_grid', 'tank_auth'),
			'expiration'	=> $this->config->item('captcha_expire', 'tank_auth'),
		));
		// Save captcha params in session
		$this->session->set_flashdata(array(
				'captcha_word' => $cap['word'],
				'captcha_time' => $cap['time'],
		));
		echo $cap['word']; 				// mostrar captcha en letras
		return $cap['image'];
	}
	/**
	 * Funcion callback. Verifica si la prueba de CAPTCHA se supero.
	 *
	 * @param	string
	 * @return	bool
	 */
	function _check_captcha($code)
	{
		$time = $this->session->flashdata('captcha_time');
		$word = $this->session->flashdata('captcha_word');
		list($usec, $sec) = explode(" ", microtime());
		$now = ((float)$usec + (float)$sec);
		if ($now - $time > $this->config->item('captcha_expire', 'tank_auth')) {
			$this->form_validation->set_message('_check_captcha', $this->lang->line('auth_captcha_expired'));
			return FALSE;
		} elseif (($this->config->item('captcha_case_sensitive', 'tank_auth') AND
				$code != $word) OR
				strtolower($code) != strtolower($word)) {
			$this->form_validation->set_message('_check_captcha', $this->lang->line('auth_incorrect_captcha'));
			return FALSE;
		}
		return TRUE;
	}
	/**
	 * Mostrar un mensaje de informacion
	 *
	 * @param	string
	 * @return	void
	 */
	function _show_message($message)
	{
		$this->session->set_flashdata('mensaje', $message);
		redirect('/empleado/');
	}
	public function registrar()	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		} else {
			$email_activation = TRUE;
			$data['user_id'] = $this->tank_auth->get_user_id();
			$data['email']	= $this->tank_auth->get_email();
			$this->load->view('welcome', $data);
			$this->load->view('menu');
			$this->form_validation->set_rules('nombre_completo', 'nombre completo', 'trim|required|xss_clean');
			$this->form_validation->set_rules('numero_cedula', 'numero de cedula', 'trim|required|xss_clean');
			$this->form_validation->set_rules('crear_login', 'crear login', 'integer');
			$this->form_validation->set_rules('email', 'email', 'trim|xss_clean|valid_email');
			$this->form_validation->set_rules('clave', 'clave', 'trim|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
			$this->form_validation->set_rules('confirmar_clave', 'Confirmar clave', 'trim|xss_clean|matches[clave]');
			//$captcha_registration	= $this->config->item('captcha_registration', 'tank_auth');
			$captcha_registration	= FALSE;
			if ($captcha_registration) {
					$this->form_validation->set_rules('captcha', 'Codigo confirmacion', 'trim|xss_clean|callback__check_captcha');
			}
			$data['errors'] = array();
			if ($this->form_validation->run()) {
				if ((strlen($this->form_validation->set_value('nombre_completo')) > 0)
					AND (strlen($this->form_validation->set_value('numero_cedula')) > 0)) {
					$empleado = array(
						'emp_nombre_completo' => $this->form_validation->set_value('nombre_completo'),
						'emp_numero_cedula' => $this->form_validation->set_value('numero_cedula')
						);
					if($this->form_validation->set_value('crear_login')){
						if (!is_null($data = $this->tank_auth->create_user(
							$this->form_validation->set_value('email'),
							$this->form_validation->set_value('clave'),
							$email_activation))){
							if (!is_null($res = $this->empleado_model->crear_empleado($empleado))) {
								$empleado['emp_id'] = $res['emp_id'];			
								if($this->tank_auth->actualizar_empleado($data['usu_id'], $empleado['emp_id'])) {
									$data['site_name'] = $this->config->item('website_name', 'tank_auth');
									if ($email_activation) {
										$data['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;
										$this->_send_email('activate', $data['usu_email'], $data);
										unset($data['clave']); // Clear password (just for any case)
										$this->_show_message($this->lang->line('auth_message_registration_completed_1'));
									} else {
										if ($this->config->item('email_account_details', 'tank_auth')) {	// send "welcome" email
											$this->_send_email('welcome', $data['email'], $data);
										}
										unset($data['clave']); // Clear password (just for any case)
										$this->_show_message($this->lang->line('auth_message_registration_completed_2').' '.anchor('/login/entrar/', 'Login'));
									}
								}
							}
						} else {
							$errors = $this->tank_auth->get_error_message();
							foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
						}
					} else {
						if (!is_null($res = $this->empleado_model->crear_empleado($empleado))) {
							$empleado['emp_id'] = $res['emp_id'];
						}
					}
				}
			}
			if ($captcha_registration) {
				$data['captcha_html'] = $this->_create_captcha();
			}
			$data['captcha_registration'] = $captcha_registration;
			$this->load->view('/empleados/registrar_form', $data);
		}
	}
}

/* End of file empleados.php */
/* Location: ./application/controllers/empleados.php */