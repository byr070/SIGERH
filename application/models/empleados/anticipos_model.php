<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Anticipo_model extends CI_Model
{
	private $table_name			= 'anticipo'; // modulos

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function add_anticipo($data){
		$this->db->insert('anticipos',$data);
	}

}

/* End of file empleados_model.php */
/* Location: ./application/models/auth/empleados_model.php */