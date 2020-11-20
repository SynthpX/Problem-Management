<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mo_makun extends CI_Model {
	var $table = 'tb_user';
	var $primary_key = 'UserID';

	//load tabel
	function tampil_data(){
		$this->db->order_by('UserID', 'DESC');
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
