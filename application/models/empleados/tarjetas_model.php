<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tarjetas_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function add_tarjeta($data){
		$this->db->insert('tarjetas',$data);
	}
}