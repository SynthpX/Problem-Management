<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Incident extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('Mo_incident','incident');

		if($this->session->userdata('status_admin') != "login_auth_app"){
			redirect(base_url().'manage/login');
		}
	}

	// index load table
	public function index()
	{
		$data['incidentData'] = $this->incident->tampil_data()->result();
		$data['first_date'] 	= null;
		$data['second_date']	= null;

		$this->load->view('templates/main_header');
		$this->load->view('main/incident',$data);
		$this->load->view('templates/main_footer');
	}
	
	public function filter_data()
	{
		$first_date 	= $this->input->post('first_date');
		$second_date	= $this->input->post('second_date');
		
		if (empty($first_date) || empty ($second_date))
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
	        redirect(base_url().'manage/incident');
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
                        <p>Data Filter, Dari '.$first_date.' sampai '.$second_date.'</p>
                        </div>
                    </div>
                </div>
            </div>

            ');
		
		$data['incidentData'] = $this->incident->tampil_filter($first_date, $second_date)->result();
		$data['first_date'] 	= $this->input->post('first_date');
		$data['second_date']	= $this->input->post('second_date');

		$this->load->view('templates/main_header');
		$this->load->view('main/incident',$data);
		$this->load->view('templates/main_footer');
	}

	//detail
	public function incident_detail($id)
	{
		$row = $this->incident->get_by_id($id);

        if ($row) {
            $data = array(
                'aksi' 				=> 'UBAH',
                'action' 			=> base_url('manage/incident/proses_update'),
                'IncidentID' 		=> set_value('IncidentID', $row->IncidentID),
			    'Incident_App' 		=> set_value('Incident_App', $row->Incident_App),
			    'Incident_Inc' 		=> set_value('Incident_Inc', $row->Incident_Inc),
			    'Incident_Periode' 	=> set_value('Incident_Periode', $row->Incident_Periode),
			    'Incident_Source' 	=> set_value('Incident_Source', $row->Incident_Source),
			    'Incident_Unit' 	=> set_value('Incident_Unit', $row->Incident_Unit),
			    'Incident_PIC' 		=> set_value('Incident_PIC', $row->Incident_PIC),
			    'Incident_PName' 	=> set_value('Incident_PName', $row->Incident_PName),
		    );

			$this->load->view('templates/main_header');
			$this->load->view('main/incident_detail', $data);
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
            redirect(base_url('manage/incident'));
        }
	}

	// form add
	public function incident_add()
	{

		$data = array(
            'aksi' 				=> 'TAMBAH',
            'action' 			=> base_url('manage/incident/proses_add'),
		    'IncidentID' 		=> set_value('IncidentID'),
		    'Incident_App' 		=> set_value('Incident_App'),
		    'Incident_Inc' 		=> set_value('Incident_Inc'),
		    'Incident_Periode' 	=> set_value('Incident_Periode'),
		    'Incident_Source' 	=> set_value('Incident_Source'),
		    'Incident_Unit' 	=> set_value('Incident_Unit'),
		    'Incident_PIC' 		=> set_value('Incident_PIC'),
		    'Incident_PName' 	=> set_value('Incident_PName'),
		);

		$this->load->view('templates/main_header');
		$this->load->view('main/incident_add', $data);
		$this->load->view('templates/main_footer');
	}

	// proses add
	public function proses_add()
	{
		$data = array(
		    'IncidentID' 		=> $this->input->post('IncidentID', TRUE),
		    'Incident_App' 		=> $this->input->post('Incident_App', TRUE),
		    'Incident_Inc' 		=> $this->input->post('Incident_Inc', TRUE),
		    'Incident_Periode' 	=> $this->input->post('Incident_Periode', TRUE),
		    'Incident_Source' 	=> $this->input->post('Incident_Source', TRUE),
		    'Incident_Unit' 	=> $this->input->post('Incident_Unit', TRUE),
		    'Incident_PIC' 		=> $this->input->post('Incident_PIC', TRUE),
		    'Incident_PName' 	=> $this->input->post('Incident_PName', TRUE),
	    );

	    $this->incident->insert($data);
        // $this->session->set_flashdata('message1', '<p>Berhasil Ditambahkan</p>');
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
                        <p>Penambahan Data Berhasil!</p>
                        </div>
                    </div>
                </div>
            </div>

        	');
        redirect(base_url('manage/incident'));
	}

	//form Update
	public function incident_update($id)
	{
		$row = $this->incident->get_by_id($id);

        if ($row) {
            $data = array(
                'aksi' 				=> 'UBAH',
                'action' 			=> base_url('manage/incident/proses_update'),
                'IncidentID' 		=> set_value('IncidentID', $row->IncidentID),
			    'Incident_App' 		=> set_value('Incident_App', $row->Incident_App),
			    'Incident_Inc' 		=> set_value('Incident_Inc', $row->Incident_Inc),
			    'Incident_Periode' 	=> set_value('Incident_Periode', $row->Incident_Periode),
			    'Incident_Source' 	=> set_value('Incident_Source', $row->Incident_Source),
			    'Incident_Unit' 	=> set_value('Incident_Unit', $row->Incident_Unit),
			    'Incident_PIC' 		=> set_value('Incident_PIC', $row->Incident_PIC),
			    'Incident_PName' 	=> set_value('Incident_PName', $row->Incident_PName),
		    );

			$this->load->view('templates/main_header');
			$this->load->view('main/incident_add', $data);
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
            redirect(base_url('manage/incident'));
        }
	}

	public function proses_update() 
    {
            $data = array(
	        	'Incident_App' 		=> $this->input->post('Incident_App', TRUE),
			    'Incident_Inc' 		=> $this->input->post('Incident_Inc', TRUE),
			    'Incident_Periode' 	=> $this->input->post('Incident_Periode', TRUE),
			    'Incident_Source' 	=> $this->input->post('Incident_Source', TRUE),
			    'Incident_Unit' 	=> $this->input->post('Incident_Unit', TRUE),
			    'Incident_PIC' 		=> $this->input->post('Incident_PIC', TRUE),
			    'Incident_PName' 	=> $this->input->post('Incident_PName', TRUE),
        	 );

            $this->incident->update($this->input->post('IncidentID', TRUE), $data);
            //$this->session->set_flashdata('message1', '<p>Berhasil Diubah</p>');
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
        	redirect(base_url('manage/incident'));
    }

    function incident_delete($id){
		$this->incident->delete_by_id($id);
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
		redirect(base_url('manage/incident'));
	}

}
