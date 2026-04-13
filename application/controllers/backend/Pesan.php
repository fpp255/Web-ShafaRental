<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->helper('tglind');
		$this->load->helper(array('form'));
		$this->load->library(array('form_validation'));
		$this->load->library(['ion_auth', 'form_validation']);
		date_default_timezone_set('Asia/Jakarta');	
		$this->load->model('Pesan_m');

		if(!$this->ion_auth->logged_in()) {
			redirect('auth/login', 'refresh');
		}
    }   

	public function index() {
		$data=array(
			'title'=>'Shafa Rent Car Backend System - Pesan',
			'nopage'=>1041
		);

		$data['user'] = $this->ion_auth->user()->row();
		$data['pesans'] = $this->Pesan_m->getAllPesan();
		
		$this->load->view('backend/header',$data);
		$this->load->view('backend/pesan',$data);
		$this->load->view('backend/footer');
	}

	public function detail($id) {
		if ($post = $this->input->post('submit')) {
			// update tabel pesan
			$dataPesan = array(
				'baca'				=> $this->input->post('dibaca'),
				'tgl_editpesan'  	=> date('Y-m-d H:i:s')
			);		
			$this->Pesan_m->updatePesan($id,$dataPesan);
			redirect('backend/pesan');
		}
	}

	public function hapus($id) {
		if ($post = $this->input->post('submit')) {
			$this->Pesan_m->deletePesan($id);
			$this->session->set_flashdata('pesansukses','Data Berhasil Dihapus!');
			redirect('backend/pesan');
		}
	}
}
