<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Tarjetas extends CI_Controller {
	
	private $id_modulo = NULL;
	
	function __construct() {
		parent::__construct();
        $this->load->library('security');
		$this->load->library('grocery_CRUD');
		$this->load->library('tank_auth_groups','','tank_auth');
		$this->load->model('catalogos/modulos_model');
        $this->load->model('empleados/tarjetas_model');
        $this->id_modulo = $this->modulos_model->get_id_modulo_por_nombre(get_class($this));
	}
	
	public function index() {
		if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
        	if(!is_null($this->id_modulo)){
                redirect('/tarjetas/listar/');
            } else {
            	redirect('/inicio/');
            }
        }
		
    }
    public function crearTarjeta(){
        // TARJETA COORDENADAS
  //       $pos;
  //   	for ($fila=0; $fila < 9; $fila++) { 
  //   		for ($columna=0; $columna < 9; $columna++) {
  //               switch ($columna) {
  //                   case '0':$pos="A";break;
  //                   case '1':$pos="B";break;
  //                   case '2':$pos="C";break;
  //                   case '3':$pos="D";break;
  //                   case '4':$pos="E";break;
  //                   case '5':$pos="F";break;
  //                   case '6':$pos="G";break;
  //                   case '7':$pos="H";break;
  //                   case '8':$pos="I";break;
  //                   default:break;
  //               }
  //               $pos=$pos.($fila+1);
  //               $generado[$pos]=str_pad(rand(0,999),3,"0",STR_PAD_LEFT);
  //               $codigo[$pos]=password_hash($generado[$pos],PASSWORD_DEFAULT);
  //               $pos=""; 			
  //   		}
  //   	}
  //       $data['generado']=$generado;
		// $this->load->view('tarjetas',$data);
        
  //       $this->tarjetas_model->add_tarjeta($codigo);

        // TARJETA CODIGOS
        for ($i=0; $i <10 ; $i++) { 
            $pos='TRJ_' . ($i+1) . '_VALOR';
            $generado[$pos] = str_pad(rand(0,9999),4,"0",STR_PAD_LEFT) . str_pad(rand(0,9999),4,"0",STR_PAD_LEFT);
            $codigo[$pos] = password_hash($generado[$pos], PASSWORD_DEFAULT);
        }
        $data['generado'] = $generado;
        print_r($generado);
        print_r($codigo);
        $this->load->view('tarjetas',$data);
        $this->tarjetas_model->add_tarjeta($codigo);
    }

    public function listar(){
        if(!is_null($this->id_modulo)){
        	$table_name='tarjetas';
			$crud = new grocery_CRUD();
    	    $crud->set_subject('Tarjeta')
    	    ->set_table($table_name)
    	    ->columns('TRJ_ID','TRJ_ESTADO','TRJ_CREADO')
    	    ->edit_fields('TRJ_ESTADO')

    	    ->display_as('TRJ_ID','Número de tarjeta')
    	    ->display_as('TRJ_ESTADO','Estado')
    	    ->display_as('TRJ_CREADO','Creada')

    	    ->order_by('TRJ_ID','asc');

    	    //leer permisos desde la bd
            $arr_acciones = $this->modulos_model->get_acciones_por_rol_modulo($this->tank_auth->is_admin(), $this->id_modulo[0]);
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
            	// $this->load->view('tarjetas');
                $output = $crud->render();
            } catch(Exception $e) {
                if($e->getCode() == 14) {
                    show_error('No tiene permisos para esta operación');
                } else {
                    show_error($e->getMessage());
                }
            }
            $this->_tarjeta_output($output);
        } else {
            redirect('/inicio/');
        }
    }
    function _tarjeta_output($output = null) {
    	$data['user_id']    = $this->tank_auth->get_user_id();
        $data['username']   = $this->tank_auth->get_username();
        $data['is_admin']   = $this->tank_auth->is_admin();
        $output = array_merge((array)$output,$data);
        //recuperar modulos de la bd
        $arr_menu = $this->modulos_model->get_modulos_por_rol($this->session->userdata('group_id'));
        $menu['menu'] = $arr_menu;
        $output = array_merge($output,$menu);
        $this->load->view('template/template.php',$output);    
    }
	
}

/* End of file tarjetas.php */
/* Location: ./application/controllers/jornadas.php */