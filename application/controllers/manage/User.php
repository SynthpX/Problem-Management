<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('Mo_makun','makun');

		if($this->session->userdata('status_admin') != "login_auth_app"){
			redirect(base_url().'manage/login');
		}
	}

	// index load table
	public function index()
	{
		$data['makunData'] = $this->makun->tampil_data()->result();

		$this->load->view('templates/main_header');
		$this->load->view('main/user',$data);
		$this->load->view('templates/main_footer');
	}

	// form add
	public function user_add()
	{
		$data = array(
            'aksi' 				=> 'TAMBAH',
            'action' 			=> base_url('manage/user/proses_add'),
		    'UserID' 			=> set_value('UserID'),
		    'User_Name' 		=> set_value('User_Name'),
		    'User_Email' 		=> set_value('User_Email'),
		    'User_Phone' 		=> set_value('User_Phone'),
		    'User_Password' 	=> set_value(''),
		    'User_Position' 	=> set_value('User_Position'),
		    'User_Role' 		=> set_value('User_Role'),
		);

		$this->load->view('templates/main_header');
		$this->load->view('main/user_add', $data);
		$this->load->view('templates/main_footer');
	}

	// proses add
	public function proses_add()
	{
		$data = array(
		    'UserID' 			=> $this->input->post('UserID', TRUE),
		    'User_Name' 		=> $this->input->post('User_Name', TRUE),
		    'User_Email' 		=> $this->input->post('User_Email', TRUE),
		    'User_Phone' 		=> $this->input->post('User_Phone', TRUE),
		    'User_Password' 	=> md5(base64_encode($this->input->post('User_Password', TRUE))),
		    'User_Position' 	=> $this->input->post('User_Position', TRUE),
		    'User_Role' 		=> $this->input->post('User_Role', TRUE),
	    );

	    $this->makun->insert($data);
        $this->session->set_flashdata('message1', '<p>Berhasil Ditambahkan</p>');
        redirect(base_url('manage/user'));
	}

	//form Update
	public function user_update($id)
	{
		$row = $this->makun->get_by_id($id);

        if ($row) {
            $data = array(
                'aksi' 				=> 'UBAH',
                'action' 			=> base_url('manage/user/proses_update'),
                'UserID' 			=> set_value('UserID', $row->UserID),
			    'User_Name' 		=> set_value('User_Name', $row->User_Name),
			    'User_Email' 		=> set_value('User_Email', $row->User_Email),
			    'User_Phone' 		=> set_value('User_Phone', $row->User_Phone),
			    'User_Password' 	=> set_value('User_Password', ''),
			    'User_Position' 	=> set_value('User_Position', $row->User_Position),
			    'User_Role' 		=> set_value('User_Role', $row->User_Role),
		    );

			$this->load->view('templates/main_header');
			$this->load->view('main/user_add', $data);
			$this->load->view('templates/main_footer');
        } else {
            $this->session->set_flashdata('message', '<p>Data Error</p>');
            redirect(base_url('manage/user'));
        }
	}

	public function proses_update() 
    {
            $data = array(
	        	'User_Name' 		=> $this->input->post('User_Name', TRUE),
			    'User_Email' 		=> $this->input->post('User_Email', TRUE),
			    'User_Phone' 		=> $this->input->post('User_Phone', TRUE),
			    'User_Password' 	=> md5(base64_encode($this->input->post('User_Password', TRUE))),
			    'User_Position' 	=> $this->input->post('User_Position', TRUE),
			    'User_Role' 		=> $this->input->post('User_Role', TRUE),
        	 );

            $this->makun->update($this->input->post('UserID', TRUE), $data);
            $this->session->set_flashdata('message1', '<p>Berhasil Diubah</p>');
        	redirect(base_url('manage/user'));
    }

    function user_delete($id){
		$this->makun->delete_by_id($id);
		$this->session->set_flashdata('message1', '<p>Berhasil Dihapus</p>');
		redirect(base_url('manage/user'));
	}
}
