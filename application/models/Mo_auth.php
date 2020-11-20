<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mo_auth extends CI_Model {

	//var $table = 'tb_user_admin';

	// public function __construct()
	// {
	// 	parent::__construct();
	// }

	function cek_login($table,$where){		

		return $this->db->get_where($table,$where);
		
	}

	function cek($where,$table){		
		return $this->db->get_where($table,$where);
	}

	// public function cek_login($username, $password)
	// {
	// 	$this->db->where('username',$username);
	// 	$this->db->where('password',$password);
	// 	$query = $this->db->get($this->table);
	// 	if ($query->num_rows()>0)
	// 	{
	// 		return $query->result_array();
	// 	}

	// }
}
