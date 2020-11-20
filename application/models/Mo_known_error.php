<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mo_known_error extends CI_Model {

	var $table = 'tb_known_error';
	var $primary_key = 'KnownID';

	//load tabel
	function tampil_data(){
		$query = $this->db->query('
            SELECT 	tb_known_error.KnownID,
            		tb_known_error.Note,
            		tb_known_error.RegID, tb_problem_reg.RegID,
					tb_incident.IncidentID, tb_problem_log.IncidentID,
					tb_problem_log.ProblemID, tb_problem_reg.ProblemID,
					tb_incident.Incident_App,
					tb_incident.Incident_Inc,
					tb_incident.Incident_Unit,
					tb_incident.Incident_PIC,
					tb_incident.Incident_PName,
					tb_problem_log.Problem_Class,
					tb_problem_reg.RCA,
					tb_problem_reg.RCA_Status,
					tb_problem_reg.Problem_Status,
					tb_problem_reg.Tindak_Lanjut,
					tb_problem_reg.Reg_Date
			FROM tb_known_error
			INNER JOIN tb_problem_reg ON tb_problem_reg.RegID = tb_known_error.RegID
			INNER JOIN tb_problem_log ON tb_problem_log.ProblemID = tb_problem_reg.ProblemID
			INNER JOIN tb_incident ON tb_incident.IncidentID = tb_problem_log.IncidentID
			ORDER BY tb_known_error.KnownID DESC
        ');
		return $query;
	}
	
	function tampil_filter($first_date, $second_date){
	    $query = $this->db->query('
	    	SELECT 	tb_known_error.KnownID,
            		tb_known_error.Note,
            		tb_known_error.RegID, tb_problem_reg.RegID,
					tb_incident.IncidentID, tb_problem_log.IncidentID,
					tb_problem_log.ProblemID, tb_problem_reg.ProblemID,
					tb_incident.Incident_App,
					tb_incident.Incident_Inc,
					tb_incident.Incident_Unit,
					tb_incident.Incident_PIC,
					tb_incident.Incident_PName,
					tb_problem_log.Problem_Class,
					tb_problem_reg.RCA,
					tb_problem_reg.RCA_Status,
					tb_problem_reg.Problem_Status,
					tb_problem_reg.Tindak_Lanjut,
					tb_problem_reg.Reg_Date
			FROM tb_known_error
			INNER JOIN tb_problem_reg ON tb_problem_reg.RegID = tb_known_error.RegID
			INNER JOIN tb_problem_log ON tb_problem_log.ProblemID = tb_problem_reg.ProblemID
			INNER JOIN tb_incident ON tb_incident.IncidentID = tb_problem_log.IncidentID
			WHERE tb_problem_reg.Reg_Date BETWEEN "'.$first_date.'" AND "'.$second_date.'"
			ORDER BY tb_known_error.KnownID DESC
        ');
		return $query;
	}

	function tampil_detail($KnownID){
		$query = $this->db->query('
            SELECT 	tb_known_error.KnownID,
            		tb_known_error.Note,
            		tb_known_error.RegID, tb_problem_reg.RegID,
					tb_incident.IncidentID, tb_problem_log.IncidentID,
					tb_problem_log.ProblemID, tb_problem_reg.ProblemID,
					tb_incident.Incident_App,
					tb_incident.Incident_Inc,
					tb_incident.Incident_Unit,
					tb_incident.Incident_PIC,
					tb_incident.Incident_PName,
					tb_problem_log.Problem_Class,
					tb_problem_reg.RCA,
					tb_problem_reg.RCA_Status,
					tb_problem_reg.Problem_Status,
					tb_problem_reg.Tindak_Lanjut,
					tb_problem_reg.Reg_Date
			FROM tb_known_error
			INNER JOIN tb_problem_reg ON tb_problem_reg.RegID = tb_known_error.RegID
			INNER JOIN tb_problem_log ON tb_problem_log.ProblemID = tb_problem_reg.ProblemID
			INNER JOIN tb_incident ON tb_incident.IncidentID = tb_problem_log.IncidentID
			WHERE tb_known_error.KnownID = '.$KnownID.'
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

	public function get_reg($id)
	{
		$this->db->from('tb_problem_log');
		$this->db->where('ProblemID', $id);
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

	public function delete_by_id($id)
	{
		$this->db->where($this->primary_key, $id);
		$this->db->delete($this->table);
	}

	function cek($where,$table){		
		return $this->db->get_where($table,$where);
	}



}
