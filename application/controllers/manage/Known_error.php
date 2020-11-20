<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Known_error extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		date_default_timezone_get('Asia/Jakarta');

		// Model
		$this->load->model('Mo_known_error','known_error');

        if($this->session->userdata('status_admin') != "login_auth_app"){
            redirect(base_url().'manage/login');
        }
	}

	//index/tabel
	public function index()
	{
		$data['data_known_error'] = $this->known_error->tampil_data()->result();
		$data['first_date'] 	= null;
		$data['second_date']	= null;
		$this->load->view('templates/main_header');
		$this->load->view('main/known_error', $data);
		$this->load->view('templates/main_footer');
	}
	
	public function filter_data()
	{
		$first_date 	    = $this->input->post('first_date');
		$second_date	    = $this->input->post('second_date');
		
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
	        redirect(base_url().'manage/known_error');
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
		
		$data['data_known_error'] = $this->known_error->tampil_filter($first_date, $second_date)->result();
		$data['first_date'] 	= $this->input->post('first_date');
		$data['second_date']	= $this->input->post('second_date');

		$this->load->view('templates/main_header');
		$this->load->view('main/known_error', $data);
		$this->load->view('templates/main_footer');
	}

    //form Update
    public function known_update($id)
    {
        $row                                = $this->known_error->get_by_id($id);

        if ($row) {
            $data = array(
                'aksi'                      => 'UBAH',
                'action'                    => base_url('manage/known_error/proses_update'),
                'KnownID'                   => set_value('KnownID', $row->KnownID),
                'RegID'                     => set_value('RegID', $row->RegID),
                'Note'                      => set_value('Note', $row->Note),
            );

            $data['get_data']               = $this->known_error->tampil_detail($id)->result();

            $this->load->view('templates/main_header');
            $this->load->view('main/known_error_add', $data);
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
            redirect(base_url('manage/known_error'));
        }
    }

    public function proses_update() 
    {
            $KnownID                          = $this->input->post('KnownID', TRUE);
            $data = array(
                'RegID'                     => $this->input->post('RegID', TRUE),
                'Note'                      => $this->input->post('Note', TRUE),
             );

            $this->known_error->update($KnownID, $data); 

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
            redirect(base_url('manage/known_error'));
    }

    function known_delete($id){
		$this->known_error->delete_by_id($id);
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
		redirect(base_url('manage/known_error'));
	}

}
