<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mo_problem_reg extends CI_Model {

	var $table = 'tb_problem_reg';
	var $primary_key = 'RegID';

	//load tabel
	function tampil_data(){
		$query = $this->db->query('
            SELECT 	tb_problem_reg.RegID,
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
			FROM tb_problem_reg
			INNER JOIN tb_problem_log ON tb_problem_log.ProblemID = tb_problem_reg.ProblemID
			INNER JOIN tb_incident ON tb_incident.IncidentID = tb_problem_log.IncidentID
			ORDER BY tb_problem_reg.RegID DESC
        ');
		return $query;
	}
	
	function tampil_filter($first_date, $second_date,$RCA_Status,$Problem_Status){
	    $query = $this->db->query('
	    	SELECT 	tb_problem_reg.RegID,
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
			FROM tb_problem_reg
			INNER JOIN tb_problem_log ON tb_problem_log.ProblemID = tb_problem_reg.ProblemID
			INNER JOIN tb_incident ON tb_incident.IncidentID = tb_problem_log.IncidentID
			WHERE tb_problem_reg.Reg_Date BETWEEN "'.$first_date.'" AND "'.$second_date.'"
			AND tb_problem_reg.RCA_Status = "'.$RCA_Status.'"
			AND tb_problem_reg.Problem_Status = "'.$Problem_Status.'"
			ORDER BY tb_problem_reg.RegID DESC
        ');
		return $query;
	}

	function tampil_detail($RegID){
		$query = $this->db->query('
            SELECT 	tb_problem_reg.RegID,
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
			FROM tb_problem_reg
			INNER JOIN tb_problem_log ON tb_problem_log.ProblemID = tb_problem_reg.ProblemID
			INNER JOIN tb_incident ON tb_incident.IncidentID = tb_problem_log.IncidentID
			WHERE tb_problem_reg.RegID = '.$RegID.'
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

    // insert data
    function insert_known($data)
    {
        $this->db->insert('tb_known_error', $data);
    }

    public function delete_known($RegID)
	{
		$this->db->where('RegID', $RegID);
		$this->db->delete('tb_known_error');
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
