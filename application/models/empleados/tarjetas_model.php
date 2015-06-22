<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tarjetas_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function add_tarjeta($data){
		$this->db->insert('tarjetas',$data);
	}

	function get_todos($id){
		$query = $this->db->where('EMPLEADO_ID',$id);
		$query = $this->db->get('tarjetas');
		return $query->result();
	}

	function delete($id){
		$this->db->where('EMPLEADO_ID',$id);
		$this->db->delete('tarjetas');
	}

	function update($data,$id){
		$this->db->where('TRJ_ID',$id);
		$this->db->update('tarjetas',$data);
	}
}