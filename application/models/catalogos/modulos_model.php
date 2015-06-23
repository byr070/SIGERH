<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Users
 *
 * This model represents user authentication data. It operates the following tables:
 * - user account data,
 * - user profiles
 *
 * @package	Tank_auth
 * @author	Ilya Konyukhov (http://konyukhov.com/soft/)
 */
class Modulos_model extends CI_Model
{
	private $table_name			= 'modulos'; // modulos
	private $roles_table_name	= 'roles'; // roles
	private $acciones_table_name= 'acciones'; //acciones
	private $permisos_table_name= 'permisos'; //permisos

	function __construct()
	{
		parent::__construct();

		$ci =& get_instance();
		$this->table_name			= $ci->config->item('db_table_prefix', 'tank_auth').$this->table_name;
		$this->roles_table_name	= $ci->config->item('db_table_prefix', 'tank_auth').$this->roles_table_name;
		$this->acciones_table_name	= $ci->config->item('db_table_prefix', 'tank_auth').$this->acciones_table_name;
		$this->permisos_table_name	= $ci->config->item('db_table_prefix', 'tank_auth').$this->permisos_table_name;
	}

	/**
	 * Obtener id de módulo por nombre
	 *
	 * @param	string	nombre del módulo
	 * @return	object
	 */
	function get_id_modulo_por_nombre($modulo)
	{
		$arr_id_modulo = [];

		$this->db->select('MDL_ID');
		$this->db->from($this->table_name);
		$this->db->where('MDL_DESCRIPCION', $modulo);
		$this->db->where($this->table_name.'.ACTIVADO', 1);
		$query = $this->db->get();
		//var_dump($query->result_array());
		//print_r($query->result_array()[0]['MDL_ID']);
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				array_push($arr_id_modulo,$row['MDL_ID']);
			}
			return $arr_id_modulo;
		}
		return NULL;
	}

	/**
	 * Obtener acciones por rol y módulo
	 *
	 * @param	bool	si es administrador
	 * @param	int		id del módulo
	 * @return	object
	 */
	function get_acciones_por_rol_modulo($is_admin, $modulo)
	{
		$arr_acciones = [];

		$this->db->distinct();
		$this->db->select('ACC_DESCRIPCION');
		$this->db->from($this->permisos_table_name);
		$this->db->join($this->roles_table_name, 'ROL_ID = RLS_ID');
		$this->db->join($this->table_name, 'MODULO_ID = MDL_ID');
		$this->db->join($this->acciones_table_name, 'ACCION_ID = ACC_ID');
		$this->db->where('RLS_ID', $is_admin ? 1 : 2);
		$this->db->where('MDL_ID', $modulo);
		$this->db->where(''.$this->permisos_table_name.'.ACTIVADO', 1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				array_push($arr_acciones,$row['ACC_DESCRIPCION']);
			}
			return $arr_acciones;
		}
		return NULL;
	}

	/**
	 * Obtener módulos por rol
	 *
	 * @param	bool	si es administrador
	 * @param	bool	si viene desde controlador configuracion
	 * @return	object
	 */
	function get_modulos_por_rol($id_rol, $configuracion = FALSE)
	{
		$arr_modulos = [];

		$this->db->distinct();
		$this->db->select('MDL_DESCRIPCION');
		$this->db->select('MDL_NAV_BAR');
		$this->db->from($this->permisos_table_name);
		$this->db->join($this->roles_table_name, 'ROL_ID = RLS_ID');
		$this->db->join($this->table_name, 'MODULO_ID = MDL_ID');
		$this->db->where('RLS_ID', $id_rol);
		$this->db->where('ADMIN', $configuracion ? 1 : 0);

		$this->db->where(''.$this->permisos_table_name.'.ACTIVADO', 1);
		$this->db->where(''.$this->roles_table_name.'.ACTIVADO', 1);
		$this->db->where(''.$this->table_name.'.ACTIVADO', 1);
		
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				array_push($arr_modulos,$row['MDL_DESCRIPCION'],$row['MDL_NAV_BAR']);
			}
			return $arr_modulos;
		}
		return NULL;
	}

}

/* End of file modulos_model.php */
/* Location: ./application/models/auth/modulos_model.php */