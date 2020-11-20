<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mo_incident extends CI_Model {
	var $table = 'tb_incident';
	var $primary_key = 'IncidentID';

	//load tabel
	function tampil_data(){
		$this->db->order_by('IncidentID', 'DESC');
		return $this->db->get($this->table);
	}
	
	function tampil_filter($first_date, $second_date){
	    $this->db->where('Incident_Periode >=', $first_date);
	    $this->db->where('Incident_Periode <=', $second_date);
		$this->db->order_by('IncidentID', 'DESC');
		return $this->db->get($this->table);
	}

	//get id
	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where($this->primary_key, $id);
		$query = $this->db->get();

		return $query->row();
	}

	// insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);

        $lastid = $this->db->insert_id();
        $IncData = array(
		    'IncidentID' 			=> $lastid,
		    'Problem_Ident' 		=> 'PENDING',
	    );
        $this->db->insert('tb_problem_log', $IncData);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->primary_key, $id);
        $this->db->update($this->table, $data);
    }

	public function delete_by_id($id)
	{
		$this->db->where($this->primary_key, $id);
		$this->db->delete($this->table);
	}

	function cek($where,$table){		
		return $this->db->get_where($table,$where);
	}


}
