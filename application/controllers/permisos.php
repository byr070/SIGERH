<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Permisos extends CI_Controller {

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
                redirect('/permisos/listar/'); 
            } else {
                redirect('/inicio/');
            }
        }
    }
 
    public function listar() {
        if($this->tank_auth->is_admin() && !is_null($this->id_modulo)) {
            $table_name = 'permisos';
            $crud = new grocery_CRUD();
            $crud->where($table_name.'.ACTIVADO',1);
            $crud->set_theme('twitter-bootstrap');
            $crud->set_subject('Permiso');
            $crud->set_table($table_name);
            $crud->columns('ROL_ID','MODULO_ID','ACCION_ID','ACTIVADO','MODIFICADO');
            $crud->fields('ROL_ID','MODULO_ID','ACCION_ID');
            $crud->display_as('ROL_ID','ROL')
                 ->display_as('MODULO_ID','MÓDULO')
                 ->display_as('ACCION_ID','ACCIÓN')
                 ->display_as('ACTIVADO','ESTADO');
            $crud->set_relation('ROL_ID','roles','RLS_DESCRIPCION');
            $crud->set_relation('MODULO_ID','modulos','MDL_DESCRIPCION');
            $crud->set_relation('ACCION_ID','acciones','ACC_DESCRIPCION');
            //leer permisos desde la bd
            $arr_acciones = $this->modulos_model->get_acciones_por_rol_modulo($this->tank_auth->is_admin(), $this->id_modulo[0]);
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
            $this->_permiso_output($output);
        } else {
            redirect('/auth/');
        }
    }

    function _permiso_output($output = null) {
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
 
/* End of file permisos.php */
/* Location: ./application/controllers/permisos.php */