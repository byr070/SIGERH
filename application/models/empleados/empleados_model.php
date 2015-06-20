<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Empleados
 *
 * This model represents user authentication data. It operates the following tables:
 * - user account data,
 * - user profiles
 *
 * @package	Tank_auth
 * @author	Ilya Konyukhov (http://konyukhov.com/soft/)
 */
class Empleados_model extends CI_Model
{
	private $table_name			= 'empleados'; // modulos
	private $cargos_table_name	= 'cargos'; // cargos
	private $salarios_table_name= 'salarios'; //salarios
	private $users_table_name= 'users'; //users

	function __construct()
	{
		parent::__construct();

		$ci =& get_instance();
		$this->table_name			= $ci->config->item('db_table_prefix', 'tank_auth').$this->table_name;
		$this->cargos_table_name	= $ci->config->item('db_table_prefix', 'tank_auth').$this->cargos_table_name;
		$this->salarios_table_name	= $ci->config->item('db_table_prefix', 'tank_auth').$this->salarios_table_name;
		$this->users_table_name	= $ci->config->item('db_table_prefix', 'tank_auth').$this->users_table_name;
	}

	/**
	 * Obtener el valor del salario de un empleado
	 *
	 * @param	int		ID de empleado
	 * @return	object
	 */
	function get_salario($empleado_id=NULL) {
		$this->db->select('SLR_VALOR');
		$this->db->from($this->table_name);
		$this->db->join($this->cargos_table_name, 'CARGO_ID = CRG_ID');
		$this->db->join($this->salarios_table_name, 'SALARIO_ID = SLR_ID');
		$this->db->where('EMP_ID', $empleado_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	/**
	 * Verificar si los décimos de un empleado están mensualizados
	 *
	 * @param	int		ID de empleado
	 * @return	object
	 */
	function estan_decimos_mensualizados($empleado_id=NULL) {
		$this->db->select('EMP_MENS');
		$this->db->from($this->table_name);
		$this->db->where('EMP_ID', $empleado_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	/**
	 * Obtener el correo electrónico de un empleado
	 *
	 * @param	int		ID de empleado
	 * @return	object
	 */
	function get_email($empleado_id=NULL) {
		$this->db->select('email');
		$this->db->from($this->table_name);
		$this->db->join($this->users_table_name, 'USUARIO_ID = id');
		$this->db->where('EMP_ID', $empleado_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	/**
	 * Activate user if activation key is valid.
	 * Can be called for not activated users only.
	 *
	 * @param	int
	 * @param	string
	 * @param	bool
	 * @return	bool
	 */
	function activar_empleado($user_id) {
		$this->db->select('1', FALSE);
		$this->db->where('USUARIO_ID', $user_id);
		$this->db->where('EMP_ACTIVADO', 0);
		$query = $this->db->get($this->table_name);

		if ($query->num_rows() == 1) {

			$this->db->set('EMP_ACTIVADO', 1);
			$this->db->where('USUARIO_ID', $user_id);
			$this->db->update($this->table_name);

			return TRUE;
		}
		return FALSE;
	}
}

/* End of file empleados_model.php */
/* Location: ./application/models/auth/empleados_model.php */