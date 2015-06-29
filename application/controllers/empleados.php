<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Empleados extends CI_Controller {
	
	private $id_modulo = NULL;
	
	function __construct() {
		parent::__construct();
		$this->load->library('gc_dependent_select');
		$this->load->library('security');
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
                redirect('/empleados/listar/');
            } else {
            	redirect('/inicio/');
            }
        }
    }
	
	public function listar() {
        if(!is_null($this->id_modulo)){
			$table_name='empleados';
			$crud = new grocery_CRUD();
    	    $crud->set_subject('Empleado');
    	    $crud->set_table($table_name);
    	    if(!$this->tank_auth->is_admin()){
    	    	$crud->where('EMP_NOMBRE_COMPLETO',$this->tank_auth->get_username());
    	    }
        	$crud->columns('EMP_NOMBRE_COMPLETO','EMP_NUMERO_CEDULA','EMP_FECHA_NACIMIENTO',
    	    	'PROVINCIA_NACIMIENTO','CANTON_NACIMIENTO','PARROQUIA_NACIMIENTO',
    	    	'PROVINCIA_RESIDENCIA','EMP_DIRECCION_DOMICILIO',
                'EMP_TELEFONO_FIJO','EMP_TELEFONO_MOVIL',
    	    	'EMP_ESTADO','EMP_ESTADO_CIVIL','EMP_TIPO_SANGRE',
    	    	'EMP_NOMBRE_CONYUGE','EMP_NUMERO_HIJOS',
    	    	'EMP_EMERG_NOMBRE','EMP_EMERG_PARENTESCO','EMP_EMERG_TELEFONO',
    	    	'EMP_FECHA_INGRESO','EMP_FECHA_SALIDA',
    	    	'ORGANIZACION_ID','CUADRILLA_ID','CARGO_ID')
    	    ->add_fields('EMP_NOMBRE_COMPLETO','EMP_NUMERO_CEDULA','EMP_FECHA_NACIMIENTO',
    	    	'PROVINCIA_NACIMIENTO','CANTON_NACIMIENTO','PARROQUIA_NACIMIENTO',
    	    	'PROVINCIA_RESIDENCIA','EMP_DIRECCION_DOMICILIO',
                'EMP_TELEFONO_FIJO','EMP_TELEFONO_MOVIL',
    	    	'EMP_ESTADO','EMP_ESTADO_CIVIL','EMP_TIPO_SANGRE',
    	    	'EMP_NOMBRE_CONYUGE','EMP_NUMERO_HIJOS',
    	    	'EMP_EMERG_NOMBRE','EMP_EMERG_PARENTESCO','EMP_EMERG_TELEFONO',
    	    	'EMP_FECHA_INGRESO','EMP_FECHA_SALIDA',
    	    	'CUADRILLA_ID','CARGO_ID',
    	    	'USUARIO_ID','email','clave')
    	    ->edit_fields('EMP_FECHA_NACIMIENTO',
    	    	'PROVINCIA_NACIMIENTO','CANTON_NACIMIENTO','PARROQUIA_NACIMIENTO',
    	    	'PROVINCIA_RESIDENCIA','EMP_DIRECCION_DOMICILIO',
                'EMP_TELEFONO_FIJO','EMP_TELEFONO_MOVIL',
    	    	'EMP_ESTADO','EMP_ESTADO_CIVIL','EMP_TIPO_SANGRE',
    	    	'EMP_NOMBRE_CONYUGE','EMP_NUMERO_HIJOS',
    	    	'EMP_EMERG_NOMBRE','EMP_EMERG_PARENTESCO','EMP_EMERG_TELEFONO',
    	    	'EMP_FECHA_INGRESO','EMP_FECHA_SALIDA',
    	    	'CUADRILLA_ID','CARGO_ID')
       		->display_as('EMP_NOMBRE_COMPLETO','Nombre completo')
	    	->display_as('EMP_NUMERO_CEDULA','Número de cédula o RUC')
	        ->display_as('EMP_FECHA_NACIMIENTO','Fecha de nacimiento')
	        ->display_as('PROVINCIA_NACIMIENTO','Provincia de nacimiento')
	        ->display_as('CANTON_NACIMIENTO','Cantón de nacimiento')
	        ->display_as('PARROQUIA_NACIMIENTO','Parroquia de nacimiento')
	        ->display_as('PROVINCIA_RESIDENCIA','Provincia de residencia')
	        ->display_as('EMP_DIRECCION_DOMICILIO','Dirección de domicilio')
            ->display_as('EMP_TELEFONO_FIJO','Teléfono fijo')
            ->display_as('EMP_TELEFONO_MOVIL','Teléfono móvil')
	        ->display_as('EMP_ESTADO','Estado')
	        ->display_as('EMP_ESTADO_CIVIL','Estado civil')
	        ->display_as('EMP_TIPO_SANGRE','Tipo de sangre')
	        ->display_as('EMP_NOMBRE_CONYUGE','Nombre del cónyuge')
	        ->display_as('EMP_NUMERO_HIJOS','Número de hijos')
	        ->display_as('EMP_EMERG_NOMBRE','Nombre contacto emergencia')
	        ->display_as('EMP_EMERG_PARENTESCO','Parentezco contacto emergencia')
	        ->display_as('EMP_EMERG_TELEFONO','Teléfono contacto emergencia')
	        ->display_as('EMP_FECHA_INGRESO','Fecha de ingreso')
	        ->display_as('EMP_FECHA_SALIDA','Fecha de salida')
		    ->display_as('ORGANIZACION_ID','Organización')
	    	->display_as('CUADRILLA_ID','Cuadrilla')
	    	->display_as('CARGO_ID','Cargo')
	    	->display_as('email','Correo electónico')
	    	->display_as('clave','Clave')
           	->change_field_type('USUARIO_ID','invisible')
           	->change_field_type('EMP_ESTADO','dropdown', array('1' => 'TRABAJO', '2' => 'DESCANSO', '3' => 'LIQUIDADO'))
           	->change_field_type('EMP_ESTADO_CIVIL','enum',array('Soltero(a)','Casado(a)','Viudo(a)',
           		'Divorciado(a)','Unión de hecho'))
           	->change_field_type('EMP_TIPO_SANGRE','enum',array(
           		'Tipo O Rh +','Tipo O Rh -',
           		'Tipo A Rh +','Tipo A Rh -',
           		'Tipo B Rh +','Tipo B Rh -',
           		'Tipo AB Rh +','Tipo AB Rh -'))
	        ->set_relation('PROVINCIA_NACIMIENTO','provincias','PRV_NOMBRE')
	        ->set_relation('CANTON_NACIMIENTO','cantones','CNT_NOMBRE')
	        ->set_relation('PARROQUIA_NACIMIENTO','parroquias','PRR_NOMBRE')
	        ->set_relation('PROVINCIA_RESIDENCIA','provincias','PRV_NOMBRE')
	        ->set_relation('ORGANIZACION_ID','organizaciones','ORG_NOMBRE')
	        ->set_relation('CUADRILLA_ID','cuadrillas','CDR_NOMBRE')
	        ->set_relation('CARGO_ID','cargos','CRG_NOMBRE')
	        ->required_fields('EMP_NOMBRE_COMPLETO','EMP_NUMERO_CEDULA','EMP_FECHA_NACIMIENTO','EMP_TIPO_SANGRE','EMP_FECHA_INGRESO','CARGO_ID','email','clave')	        
	        ->set_rules('EMP_NUMERO_CEDULA','Número de Cédula','required|callback_cedula_ruc_check')
	        ->set_rules('EMP_NOMBRE_COMPLETO','Nombre del empleado','required|trim|is_unique[empleados.EMP_NOMBRE_COMPLETO]|xss_clean|min_length['.$this->config->item('username_min_length', 'tank_auth').']|callback__alpha_dash_space')
	        ->set_rules('EMP_NOMBRE_CONYUGE','Nombre del cónyugue','trim|max_length[55]|callback__alpha_dash_space')
	        ->set_rules('EMP_NUMERO_HIJOS','Número de hijos','integer')
            ->set_rules('email','Correo electrónico','required|valid_email|is_unique[users.email]')
            ->set_rules('EMP_EMERG_NOMBRE','trim|max_length[55]|callback__alpha_dash_space')
            ->set_rules('EMP_EMERG_PARENTESCO','trim|max_length[20]|callback__alpha_dash_space')
            ->set_rules('EMP_EMERG_TELEFONO','trim|max_length[15]|numeric')
            ->set_rules('EMP_TELEFONO_FIJO','trim|max_length[15]|numeric')
            ->set_rules('EMP_TELEFONO_MOVIL','trim|max_length[15]|numeric')
            ->set_rules('EMP_FECHA_SALIDA','Fecha de salida','callback_verificar_fecha[EMP_FECHA_INGRESO]')
	        
	        ->callback_add_field('email',array($this,'email_field_add_callback'))
	        ->callback_add_field('clave',array($this,'clave_field_add_callback'))
			
	        ->callback_before_insert(array($this, 'registrar_usuario'));


    	    //leer permisos desde la bd
            $arr_acciones = $this->modulos_model->get_acciones_por_rol_modulo($this->tank_auth->is_admin(), $this->id_modulo[0]);
            // $crud->unset_read();
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
	        $this->_empleado_output($output);
        } else {
        	redirect('/inicio/');
        }
    }

    function cedula_ruc_check($value) {
    	$arr = str_split($value);
    	$sumaPares = 0;
    	$sumaImpares = 0;

    	if(sizeof($arr) == 10 || sizeof($arr) == 13) { //13 o 10 caracteres
    		for ($i=0; $i < 9; $i++) {
    			if($i % 2){ //mod no es 0, i es impar, posición de cédula es par
    				$sumaPares += intval($arr[$i]);
    			}	
    			else{ //mod es 0, i es par, posición de cédula es impar
					if( (intval($arr[$i]) * 2) > 9 ){
    					$sumaImpares += intval($arr[$i]) * 2 - 9;
    				}else{
    					$sumaImpares += intval($arr[$i]) * 2;
    				}
    			}    
    		}
			if( (10-(($sumaPares+$sumaImpares)%10) ) == intval($arr[9])){ //se comprueba el 10 caracter
				if(sizeof($arr)==13){
					//se verifican los últimos 3 con 001
					if (intval($arr[10])==0 && intval($arr[11])==0 && intval($arr[12])==1){
						//echo "ruc correcto";
						return TRUE;
					}
					else{
						//echo 'ruc incorrecto';
						$this->form_validation->set_message('cedula_ruc_check', "RUC incorrecto");
        				return FALSE;
					}
				}
				else{ //10 caracteres corectos
					//echo "cedula correcta";
					return TRUE;	
				}
			}
			else{ //10mo incorrecto
				//echo '10mo incorecto';
				$this->form_validation->set_message('cedula_ruc_check', "Cédula o RUC incorrecto");
        		return FALSE;
			}
    	}
    	else{ // no hay 10
    		$this->form_validation->set_message('cedula_ruc_check', "Cédula o RUC incorrecto");
    		return FALSE;
    	}
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

    function registrar_usuario($post_array) {
    	$email_activation = $this->config->item('email_activation', 'tank_auth');
	    $username=$post_array['EMP_NOMBRE_COMPLETO'];
		if (!is_null($data = $this->tank_auth->create_user(
			$username,
			$post_array['email'],
			$post_array['clave'],
			$email_activation))){									// success
			
			$data['site_name'] = $this->config->item('website_name', 'tank_auth');

			if ($email_activation) {									// send "activate" email
				$data['activation_period'] = 
				$this->config->item('email_activation_expire', 'tank_auth') / 3600;

				$this->_send_email('activate', $data['email'], $data);

				unset($data['password']); // Clear password (just for any case)

				//$this->_show_message($this->lang->line('auth_message_registration_completed_1'));
			
			} else {
				if ($this->config->item('email_account_details', 'tank_auth')) {	// send "welcome" email
					$this->_send_email('welcome', $data['email'], $data);
				}
				unset($data['password']); // Clear password (just for any case)
				//$this->_show_message($this->lang->line('auth_message_registration_completed_2').' '.anchor('/auth/login/', 'Login'));
			}
            $message = "wrong answer";
            echo "<script type='text/javascript'>alert('$message');</script>";
			$post_array['USUARIO_ID']=$data['user_id'];
		} else {
			$errors = $this->tank_auth->get_error_message();
			foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
		}
	    //redirect('inicio');
	    /*$user_logs_insert = array(
    	    "user_id" => $primary_key,
        	"created" => date('Y-m-d H:i:s'),
	        "last_update" => date('Y-m-d H:i:s')
    	);
    	$this->db->insert('user_logs',$user_logs_insert);
    	return true;*/
    	unset($post_array['email']);
    	unset($post_array['clave']);
    	return $post_array;
    	//var_dump($post_array);
    }

    function email_field_add_callback() {
    	return '<input type="text" maxlength="50" value="" name="email">';
    }
    
    function clave_field_add_callback() {
    	return '<input type="password" maxlength="10" value="" name="clave">';
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
		redirect('/empleados/');
	}
	public function registrar()	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		} else {
			$email_activation = TRUE;
			$data['user_id'] = $this->tank_auth->get_user_id();
			//$data['email']	= $this->tank_auth->get_email();
			$this->load->view('welcome', $data);
			//$this->load->view('menu');
			$this->form_validation->set_rules('nombre_completo', 'nombre completo', 'trim|required|xss_clean');
			$this->form_validation->set_rules('numero_cedula', 'numero de cedula', 'trim|required|xss_clean');
			$this->form_validation->set_rules('crear_login', 'crear login', 'integer');
			$this->form_validation->set_rules('email', 'email', 'trim|xss_clean|valid_email');
			$this->form_validation->set_rules('clave', 'clave', 'trim|xss_clean|min_length['.
				$this->config->item('password_min_length', 'tank_auth').']|max_length['.
				$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
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
										$this->_show_message($this->lang->line('auth_message_registration_completed_2').' '.
											anchor('/login/entrar/', 'Login'));
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