<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Problem_reg extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		date_default_timezone_get('Asia/Jakarta');

		// Model
		$this->load->model('Mo_problem_reg','problem');

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
		$this->load->view('main/reg', $data);
		$this->load->view('templates/main_footer');
	}
	
	public function filter_data()
	{
		$first_date 	    = $this->input->post('first_date');
		$second_date	    = $this->input->post('second_date');
		$RCA_Status		    = $this->input->post('RCA_Status');
		$Problem_Status	    = $this->input->post('Problem_Status');
		
		if (empty($first_date) || empty ($second_date) || empty ($RCA_Status) || empty ($Problem_Status))
	    { 
	        redirect(base_url().'manage/problem_reg');
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
                        <p>Data Filter, Dari '.$first_date.' sampai '.$second_date.' Dengan Status RCA '.$RCA_Status.' Dan Problem '.$Problem_Status.'</p>
                        </div>
                    </div>
                </div>
            </div>

            ');
		
		$data['data_problem'] = $this->problem->tampil_filter($first_date, $second_date, $RCA_Status, $Problem_Status)->result();
		$data['first_date'] 	= $this->input->post('first_date');
		$data['second_date']	= $this->input->post('second_date');

		$this->load->view('templates/main_header');
		$this->load->view('main/reg', $data);
		$this->load->view('templates/main_footer');
	}

    //form Update
    public function problem_update($id)
    {
        $row                                = $this->problem->get_by_id($id);

        if ($row) {
            $ProblemID                          = $row->ProblemID;
            $data = array(
                'aksi'                      => 'UBAH',
                'action'                    => base_url('manage/problem_reg/proses_update'),
                'RegID'                     => set_value('RegID', $row->RegID),
                'ProblemID'                 => set_value('ProblemID', $row->ProblemID),
                'RCA'                       => set_value('RCA', $row->RCA),
                'RCA_Status'                => set_value('RCA_Status', $row->RCA_Status),
                'Problem_Status'            => set_value('Problem_Status', $row->Problem_Status),
                'Tindak_Lanjut'             => set_value('Tindak_Lanjut', $row->Tindak_Lanjut),
                'Reg_Date'                  => set_value('Reg_Date', $row->Reg_Date),
            );

            $data['get_data']               = $this->problem->tampil_detail($id)->result();

            $this->load->view('templates/main_header');
            $this->load->view('main/reg_add', $data);
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
            redirect(base_url('manage/problem_reg'));
        }
    }

    public function proses_update() 
    {
            $RegID                          = $this->input->post('RegID', TRUE);
            $data = array(
                'ProblemID'                 => $this->input->post('ProblemID', TRUE),
                'RCA'                       => $this->input->post('RCA', TRUE),
                'RCA_Status'                => $this->input->post('RCA_Status', TRUE),
                'Problem_Status'            => $this->input->post('Problem_Status', TRUE),
                'Tindak_Lanjut'             => $this->input->post('Tindak_Lanjut', TRUE),
                'Reg_Date'                  => $this->input->post('Reg_Date', TRUE),
             );

            $this->problem->update($RegID, $data); 

            if ($this->input->post('Problem_Status') ==  'CLOSE') {

                $RegData = array(
                    'RegID'                     => $RegID,
                    'Note'                      => '',
                );

                $this->problem->insert_known($RegData);
            }

            if ($this->input->post('Problem_Status') ==  'OPEN') {
                $this->problem->delete_known($RegID);
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
            redirect(base_url('manage/problem_reg'));
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
		redirect(base_url('manage/problem_reg'));
	}

}
