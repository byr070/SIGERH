<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Usuarios extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
 
        /* Standard Libraries of codeigniter are required */
        //$this->load->database();
        //$this->load->helper('url');
        /* ------------------ */ 
 
        $this->load->library('grocery_CRUD');
        $this->load->library('tank_auth_groups','','tank_auth');
        $this->load->model('catalogos/modulos_model'); 
    }
 
    public function index() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            
            if($this->tank_auth->is_admin()) {
                redirect('/usuarios/listar/'); 
            } else {
                //show_404();
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
        if($this->tank_auth->is_admin()) {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_subject('Usuario');
            $crud->set_table('users');
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
            $crud->add_action('Desbloquear', '', 'usuarios/desbloquear','ui-icon-unlocked');
            //leer permisos desde la bd
            $id_modulo = $this->modulos_model->get_id_modulo_por_nombre(get_class($this));
            $arr_acciones = $this->modulos_model->get_acciones_por_rol_modulo($this->tank_auth->is_admin(), $id_modulo[0]);
            //deshabilitar opciones unset_read,unset_edit,unset_delete,unset_add
            //print_r($arr_acciones);
            //$crud->unset_operations();
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
            $this->_usuario_output($output);
        } else {
            redirect('/inicio/');
        }
    }

    function _usuario_output($output = null) {
        $data['user_id']    = $this->tank_auth->get_user_id();
        $data['username']   = $this->tank_auth->get_username();
        $data['is_admin']   = $this->tank_auth->is_admin();
        $output = array_merge((array)$output,$data);
        //recuperar modulos de la bd
        $arr_menu = $this->modulos_model->get_modulos_por_rol($data['is_admin'], TRUE);
        $menu['menu'] = $arr_menu;
        $output = array_merge($output,$menu);
        $this->load->view('template/template.php',$output);    
    }
}
 
/* End of file usuarios.php */
/* Location: ./application/controllers/usuarios.php */