<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Problem_log extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		date_default_timezone_get('Asia/Jakarta');

		// Model
		$this->load->model('Mo_problem_log','problem');

        if($this->session->userdata('status_admin') != "login_auth_app"){
            redirect(base_url().'manage/login');
        }
	}

	//index/tabel
	public function index()
	{
		$data['data_problem'] = $this->problem->tampil_data()->result();
		$data['first_date'] 	= null;
		$data['second_date']	= null;
		// echo('<pre>');
		// print_r($this->problem->tampil_data()->result());
		// echo('</pre>');
		$this->load->view('templates/main_header');
		$this->load->view('main/log', $data);
		$this->load->view('templates/main_footer');
	}
	
	public function filter_data()
	{
		$first_date 	= $this->input->post('first_date');
		$second_date	= $this->input->post('second_date');
		$Ident			= $this->input->post('Ident');
		
		if (empty($first_date) || empty ($second_date) || empty ($Ident))
	    { 
	        $this->session->set_flashdata('message1', '
                <div class="ui container centered grid">
                    <div class="sixteen wide phone sixteen wide tablet sixteen wide computer column">
                        <div class="ui red icon message">
                            <i class="warning sign icon"></i>
                            <i class="close icon"></i>
                            <div class="content">
                            <div class="header">
                            Perhatian!
                            </div>
                            <p>Isi lengkap form filter</p>
                            </div>
                        </div>
                    </div>
                </div>
            ');
	        redirect(base_url().'manage/problem_log');
	    }
	    
	    $this->session->set_flashdata('message1', '

            <div class="ui container centered grid">
                <div class="sixteen wide phone sixteen wide tablet sixteen wide computer column">
                    <div class="ui info icon message">
                        <i class="checkmark icon"></i>
                        <i class="close icon"></i>
                        <div class="content">
                        <div class="header">
                        Berhasil!
                        </div>
                        <p>Data Filter, Dari '.$first_date.' sampai '.$second_date.' dengan Status Problem '.$Ident.'</p>
                        </div>
                    </div>
                </div>
            </div>

            ');
		
		$data['data_problem'] = $this->problem->tampil_filter($first_date, $second_date, $Ident)->result();
		$data['first_date'] 	= $this->input->post('first_date');
		$data['second_date']	= $this->input->post('second_date');

		$this->load->view('templates/main_header');
		$this->load->view('main/log', $data);
		$this->load->view('templates/main_footer');
	}

	//form Update
	public function problem_update($id)
	{
		$row 								= $this->problem->get_by_id($id);

        if ($row) {
        	$IncID 							= $row->IncidentID;
            $data = array(
                'aksi' 						=> 'UBAH',
                'action' 					=> base_url('manage/problem_log/proses_update'),
                'ProblemID' 				=> set_value('ProblemID', $row->ProblemID),
                'IncidentID' 				=> set_value('IncidentID', $row->IncidentID),
			    'Problem_Class' 			=> set_value('Problem_Class', $row->Problem_Class),
		    	'Problem_Ident' 			=> set_value('Problem_Ident', $row->Problem_Ident),
			    'Problem_Note' 				=> set_value('Problem_Note', $row->Problem_Note),
			    'Problem_Ket' 				=> set_value('Problem_Ket', $row->Problem_Ket),
		    );

            $get_inc       					= array('IncidentID' => $IncID);
        	$data['get_data']    			= $this->problem->cek($get_inc,'tb_incident')->result();

			$this->load->view('templates/main_header');
			$this->load->view('main/log_add', $data);
			$this->load->view('templates/main_footer');
        } else {
            //$this->session->set_flashdata('message', '<p>Data Error</p>');
            $this->session->set_flashdata('message', '

            	<div class="ui container centered grid">
	                <div class="sixteen wide phone sixteen wide tablet sixteen wide computer column">
	                    <div class="ui red icon message">
	                        <i class="warning sign icon"></i>
	                        <i class="close icon"></i>
	                        <div class="content">
	                        <div class="header">
	                        Perhatian!
	                        </div>
	                        <p>Data Error</p>
	                        </div>
	                    </div>
	                </div>
	            </div>

            	');
            redirect(base_url('manage/problem_log'));
        }
	}

	public function proses_update() 
    {
			$IDProblem						= $this->input->post('ProblemID', TRUE);
            $data = array(
	        	'IncidentID' 				=> $this->input->post('IncidentID', TRUE),
			    'Problem_Class' 			=> $this->input->post('Problem_Class', TRUE),
			    'Problem_Ident' 			=> $this->input->post('Problem_Ident', TRUE),
			    'Problem_Note' 				=> $this->input->post('Problem_Note', TRUE),
			    'Problem_Ket' 				=> $this->input->post('Problem_Ket', TRUE),
        	 );

            $this->problem->update($IDProblem, $data);

            if ($this->input->post('Problem_Ident') ==  'Y') {

            	$lastid = $this->db->insert_id();

            	$RegData = array(
            		'ProblemID' 				=> $IDProblem,
				    'RCA_Status' 				=> 'OPEN',
				    'Problem_Status' 			=> 'OPEN',
        	 	);

        	 	$this->problem->insert_reg($RegData);
            }

            if ($this->input->post('Problem_Ident') ==  'N') {
        	 	$this->problem->delete_reg($IDProblem);
            }

            

            // $this->session->set_flashdata('message1', '<p>Berhasil Diubah</p>');
            $this->session->set_flashdata('message1', '

        	<div class="ui container centered grid">
                <div class="sixteen wide phone sixteen wide tablet sixteen wide computer column">
                    <div class="ui info icon message">
                        <i class="checkmark icon"></i>
                        <i class="close icon"></i>
                        <div class="content">
                        <div class="header">
                        Berhasil!
                        </div>
                        <p>Pengubahan Data Berhasil!</p>
                        </div>
                    </div>
                </div>
            </div>

        	');
        	redirect(base_url('manage/problem_log'));
    }

    function problem_delete($id){
		$this->problem->delete_by_id($id);
		//$this->session->set_flashdata('message1', '<p>Berhasil Dihapus</p>');
		$this->session->set_flashdata('message1', '

        	<div class="ui container centered grid">
                <div class="sixteen wide phone sixteen wide tablet sixteen wide computer column">
                    <div class="ui info icon message">
                        <i class="checkmark icon"></i>
                        <i class="close icon"></i>
                        <div class="content">
                        <div class="header">
                        Berhasil!
                        </div>
                        <p>Penghapusan Data Berhasil!</p>
                        </div>
                    </div>
                </div>
            </div>

        	');
		redirect(base_url('manage/problem_log'));
	}

}
