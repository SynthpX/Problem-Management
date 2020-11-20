<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mo_dashboard extends CI_Model {

	function countIncident(){
		return $this->db->count_all_results('tb_incident');
	}
	function countProblem_log(){
		return $this->db->count_all_results('tb_problem_log');
	}
	function countProblem_reg(){
		return $this->db->count_all_results('tb_problem_reg');
	}
	function countKnown(){
		return $this->db->count_all_results('tb_known_error');
	}

}
