<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Usuarios extends CI_Controller {

    private $id_modulo = NULL;
 
    function __construct() {
        parent::__construct();
 
        $this->load->library('grocery_CRUD');
        $this->load->library('tank_auth_groups','','tank_auth');
        $this->load->model('catalogos/modulos_model');
        $this->id_modulo = $this->modulos_model->get_id_modulo_por_nombre(get_class($this));
    }
 
    public function index() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            if($this->tank_auth->is_admin() && !is_null($this->id_modulo)) {
                redirect('/usuarios/listar/'); 
            } else {
                redirect('/inicio/');
            }
        }
    }

    function desbloquear($user_id)
    {
        if($this->tank_auth->is_admin()) {
            $this->tank_auth->unban_user($user_id);
            redirect('/usuarios/');
        } else {
            redirect('/inicio/');
        }
    }
 
    public function listar() {
        if($this->tank_auth->is_admin() && !is_null($this->id_modulo)) {
            $table_name='users';
            $crud = new grocery_CRUD();
            //$crud->where($table_name.'.activated',1);
            $crud->set_theme('datatables');
            $crud->set_subject('Usuario');
            $crud->set_table($table_name);
            $crud->columns('username','group_id','email','activated','banned','ban_reason','last_login');
            $crud->fields('username','email','group_id');
            $crud->display_as('username','Usuario')
                 ->display_as('group_id','Rol')
                 ->display_as('email','Correo Electrónico')
                 ->display_as('activated','Estado')
                 ->display_as('banned','Bloqueado')
                 ->display_as('ban_reason','Razón de Bloqueo')
                 ->display_as('last_login','Último Acceso');
            $crud->set_relation('group_id','roles','RLS_DESCRIPCION');
            //max_length['.$this->config->item('username_max_length', 'tank_auth').']|
            $crud->set_rules('username','nombre de usuario','trim|required|xss_clean|min_length['.$this->config->item('username_min_length', 'tank_auth').']|callback__alpha_dash_space');
            $crud->set_rules('email','correo electrónico','valid_email|required');
            $crud->set_rules('group_id','roles','required');
            $crud->add_action('Desbloquear', '', 'usuarios/desbloquear','ui-icon-unlocked');
            
            //leer permisos desde la bd
            $arr_acciones = $this->modulos_model->get_acciones_por_rol_modulo($this->tank_auth->is_admin(), $this->id_modulo[0]);
            //Ocultar botón Ver, Exportar, Imprimir
            $crud->unset_read();
            $crud->unset_export();
            $crud->unset_print();
            //si no tiene permiso para add entonces
            //if(!in_array('Crear', $arr_acciones)) {
                $crud->unset_add();
            //}
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
            $this->_usuario_output($output);
        } else {
            redirect('/inicio/');
        }
    }

    function alpha_dash_space($str)
{
    return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
} 
    function _usuario_output($output = null) {
        $data['user_id']    = $this->tank_auth->get_user_id();
        $data['username']   = $this->tank_auth->get_username();
        $data['is_admin']   = $this->tank_auth->is_admin();
        $output = array_merge((array)$output,$data);
        //recuperar modulos de la bd
        $arr_menu = $this->modulos_model->get_modulos_por_rol($this->session->userdata('group_id'), TRUE);
        $menu['menu'] = $arr_menu;
        $output = array_merge($output,$menu);
        $this->load->view('template/template.php',$output);    
    }
}
 
/* End of file usuarios.php */
/* Location: ./application/controllers/usuarios.php */