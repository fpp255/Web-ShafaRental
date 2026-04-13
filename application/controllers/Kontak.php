<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->helper('tglind');
		$this->load->helper(array('form'));
		$this->load->helper('text');
		$this->load->library(array('form_validation'));
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('recaptcha');
		$this->load->model('Home_m');
		$this->load->model('Pesan_m');
    }  

	public function index() {
		$data=array(
			'title'=>'Shafa Rent Car',
			'nopage'=>2
		);

		$this->load->view('header',$data);
		$this->load->view('kontak',$data);
		$this->load->view('footer');
	}

	public function add() {
		if ($post = $this->input->post('submit')) {
			$this->form_validation->set_rules('firstname','Nama Depan','required');
			$this->form_validation->set_rules('lastname','Nama Belakang','');
			$this->form_validation->set_rules('phone','No. Hp','required');
			// $this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('message','Pesan','required');
			$this->form_validation->set_rules('g-recaptcha-response', 'reCaptcha', 'required');

			if ($this->form_validation->run()==FALSE) {   
				$this->session->set_flashdata('pesanerror','Silakan diisi semua form dan contreng kotak Saya bukan robot!');

				$data=array(
					'title'=>'Shafa Rent Car',
					'nopage'=>2
				);
				
				$this->load->view('header',$data);
				$this->load->view('kontak',$data);
				$this->load->view('footer');
			} else {
				// insert tabel pesan	
				$dataPesan = array(
					'nama_depan'	=> $this->input->post('firstname'),
					'nama_belakang'	=> $this->input->post('lastname'),
					'no_hp'			=> $this->input->post('phone'),
					// 'email'			=> $this->input->post('email'),
					'pesan'			=> $this->input->post('message'),
					'tgl_editpesan' => date('Y-m-d H:i:s')
				);								
				$this->Pesan_m->insertPesan($dataPesan);
				$this->session->set_flashdata('pesansukses','Pesan Berhasil kirim, kami akan segera merespon');	
				redirect('kontak');
			}
		} 
	}
}
