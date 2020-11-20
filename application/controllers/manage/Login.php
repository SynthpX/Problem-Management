<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		date_default_timezone_get('Asia/Jakarta');
		$this->load->model('Mo_auth','admin_auth');
	}

	public function index()
	{

		//$this->load->view('templates/main_header');
		$this->load->view('main/login');
		//$this->load->view('templates/main_footer');
	}

	public function proses_login()
	{

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'User_Name' 		=> $username,
			'User_Password' 	=> md5(base64_encode($password))
			);

		$this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('password','Password','required|trim');

		$cek = $this->admin_auth->cek_login("tb_user",$where)->num_rows();

		$datas = $this->admin_auth->cek_login("tb_user",$where)->result();

		if($this->form_validation->run()==FALSE)
		{
			$this->session->set_flashdata('pesan1', 'Username atau Password kosong!');
			redirect(base_url().'manage/login');
		}else{

			if($cek > 0){

				foreach ($datas as $row) {
					# code...
				}

				$data_session = array(
					'UserID' 			=> $row->UserID,
					'User_Name' 		=> $row->User_Name,
					'User_Email' 		=> $row->User_Email,
					'User_Phone' 		=> $row->User_Phone,
					'User_Position' 	=> $row->User_Position,
					'User_Role' 		=> $row->User_Role,

					'status_admin' 		=> 'login_auth_app'
					);

				$this->session->set_userdata($data_session);

				redirect(base_url().'manage/dashboard');

			}else{
				$this->session->set_flashdata('pesan2', 'Username atau Password salah');
				redirect(base_url().'manage/login');
			}
		}

	}

	public function logout(){
		$data_session = array(
					'UserID' 			=> '',
					'User_Name' 		=> '',
					'User_Email' 		=> '',
					'User_Phone' 		=> '',
					'User_Position' 	=> '',
					'User_Role' 		=> '',

					'status_admin' 		=> ''
					);

		$this->session->unset_userdata($data_session);
		$this->session->sess_destroy();
		redirect(base_url().'manage/login');
	}

}