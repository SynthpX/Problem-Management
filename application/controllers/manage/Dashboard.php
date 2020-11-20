<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		date_default_timezone_get('Asia/Jakarta');
		// Model
		$this->load->model('Mo_dashboard','dashboard');

		if($this->session->userdata('status_admin') != "login_auth_app"){
			redirect(base_url().'manage/login');
		}
	}

	public function index()
	{
		$data['incident'] = $this->dashboard->countIncident();
		$data['Problem_log'] = $this->dashboard->countProblem_log();
		$data['Problem_reg'] = $this->dashboard->countProblem_reg();
		$data['known_error'] = $this->dashboard->countKnown();

		$this->load->view('templates/main_header');
		$this->load->view('main/dashboard', $data);
		$this->load->view('templates/main_footer');
	}

}
