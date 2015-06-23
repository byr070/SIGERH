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
                redirect('/tarjetas/crear_tarjeta/');
            } else {
            	redirect('/inicio/');
            }
        }
		
    }

    public function crear_tarjeta(){
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
  //    $data['generado']=$generado;
      // $this->load->view('tarjetas',$data);
  //       $this->tarjetas_model->add_tarjeta($codigo);

        $data['display_btn_ver_tarjeta'] = 'inline';
        $data['display_alr_utilizado'] = 'none';
        $data['display_alr_incorrecto'] = 'none';

        $data['user_id']    = $this->tank_auth->get_user_id()-1;
        $data['username']   = $this->tank_auth->get_username();
        $data['is_admin']   = $this->tank_auth->is_admin();

        // TARJETA CODIGOS
        for ($i=0; $i <10 ; $i++) { 
            $pos='TRJ_' . ($i+1) . '_VALOR';
            $generado[$pos] = str_pad(rand(0,9999),4,"0",STR_PAD_LEFT) . str_pad(rand(0,9999),4,"0",STR_PAD_LEFT);
            $codigo[$pos] = password_hash($generado[$pos], PASSWORD_DEFAULT);
        }
        $codigo['EMPLEADO_ID']=$this->tank_auth->get_user_id()-1;
        $data['generado'] = $generado;
        // print_r($generado);
        // echo '<br><br><br>';
        // print_r($codigo);
        $this->tarjetas_model->delete($data['user_id']);
        $this->tarjetas_model->add_tarjeta($codigo);
        $this->_tarjeta_output('inline','none','none',$data);
    }

    function _tarjeta_output($display_btn_ver_tarjeta,$display_alr_utilizado,$display_alr_incorrecto,$data){
      $data['display_btn_ver_tarjeta'] = $display_btn_ver_tarjeta;
      $data['display_alr_utilizado'] = $display_alr_utilizado;
      $data['display_alr_incorrecto'] = $display_alr_incorrecto;

      $data['user_id']    = $this->tank_auth->get_user_id()-1;
      $data['username']   = $this->tank_auth->get_username();
      $data['is_admin']   = $this->tank_auth->is_admin();

      $arr_menu = $this->modulos_model->get_modulos_por_rol($this->session->userdata('group_id'));
      $data['menu'] = $arr_menu;
      $this->load->view('template/header',$output);
      $this->load->view('template/menu',$output);
      $this->load->view('template/template',$output);
      $this->load->view('template/footer',$output);
    }
}

/* End of file tarjetas.php */
/* Location: ./application/controllers/tarjetas.php */