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
class Periodos_salida_model extends CI_Model
{
	private $table_name			= 'periodos_salida'; // periodos salida
	private $empleados_table_name	= 'empleados'; // empleados
	
	function __construct()
	{
		parent::__construct();

		$ci =& get_instance();
		$this->table_name			= $ci->config->item('db_table_prefix', 'tank_auth').$this->table_name;
		$this->empleados_table_name	= $ci->config->item('db_table_prefix', 'tank_auth').$this->empleados_table_name;
	}

	/**
	 * Obtener fechas por empleado
	 *
	 * @param	bool	si es administrador
	 * @param	bool	si viene desde controlador configuracion
	 * @return	object
	 */
	function get_fechas_por_empleado($id_empleado)
	{
		$arr_fechas = [];

		$this->db->distinct();
		$this->db->select('PRD_FECHA_INICIO,PRD_FECHA_FIN,PRD_HORA_INICIO,PRD_HORA_FIN');
		$this->db->from($this->table_name);
		$this->db->join($this->empleados_table_name, 'EMPLEADO_ID = EMP_ID');
		$this->db->where('EMP_ID', $id_empleado);
		$this->db->where(''.$this->table_name.'.PRD_ESTADO', 1);
		$query = $this->db->get();
		//var_dump($query->result_array());
		//print_r($query->result_array());
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				array_push($arr_fechas,$row);
			}
			return $arr_fechas;
		}
		return NULL;
	}
}

/* End of file periodos_salida_model.php */
/* Location: ./application/models/auth/periodos_salida_model.php */