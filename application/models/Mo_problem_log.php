<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mo_problem_log extends CI_Model {

	var $table = 'tb_problem_log';
	var $primary_key = 'ProblemID';

	//load tabel
	function tampil_data(){
		$query = $this->db->query('
            SELECT 	tb_problem_log.ProblemID,
					tb_incident.IncidentID,
					tb_problem_log.IncidentID,
					tb_incident.Incident_App,
					tb_incident.Incident_Inc,
					tb_incident.Incident_Periode,
					tb_incident.Incident_Source,
					tb_problem_log.Problem_Class,
					tb_problem_log.Problem_Ident,
					tb_problem_log.Problem_Note,
					tb_problem_log.Problem_Ket
			FROM tb_problem_log
			INNER JOIN tb_incident 
			ON tb_incident.IncidentID = tb_problem_log.IncidentID
			ORDER BY tb_problem_log.ProblemID DESC
        ');
		return $query;
	}
	
	function tampil_filter($first_date, $second_date,$Ident){
	    $query = $this->db->query('
            SELECT 	tb_problem_log.ProblemID,
					tb_incident.IncidentID,
					tb_problem_log.IncidentID,
					tb_incident.Incident_App,
					tb_incident.Incident_Inc,
					tb_incident.Incident_Periode,
					tb_incident.Incident_Source,
					tb_problem_log.Problem_Class,
					tb_problem_log.Problem_Ident,
					tb_problem_log.Problem_Note,
					tb_problem_log.Problem_Ket
			FROM tb_problem_log
			INNER JOIN tb_incident 
			ON tb_incident.IncidentID = tb_problem_log.IncidentID
			WHERE Incident_Periode BETWEEN "'.$first_date.'" AND "'.$second_date.'"
			AND tb_problem_log.Problem_Ident = "'.$Ident.'"
			ORDER BY tb_problem_log.ProblemID DESC
        ');
		return $query;
	}

	public function get_inc($id)
	{
		$this->db->from('tb_incident');
		$this->db->where('IncidentID', $id);
		$query = $this->db->get();

		return $query->row();
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
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->primary_key, $id);
        $this->db->update($this->table, $data);
    }

    // insert data
    function insert_reg($data)
    {
        $this->db->insert('tb_problem_reg', $data);
    }

    public function delete_reg($ProblemID)
	{
		$this->db->where('ProblemID', $ProblemID);
		$this->db->delete('tb_problem_reg');
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
