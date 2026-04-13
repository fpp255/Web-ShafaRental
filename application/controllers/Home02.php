<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->helper('tglind');
		$this->load->helper(array('form'));
		$this->load->helper('text');
		$this->load->library(array('form_validation'));
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Home_m');
		$this->load->model('Armada_m');
    }  

	public function index() {
		if ($post = $this->input->post('submit')) {
			$this->form_validation->set_rules('nama','Nama','required');
			$this->form_validation->set_rules('hp','Handphone','required');
			$this->form_validation->set_rules('email','Email','');
			$this->form_validation->set_rules('jmobil','Jenis Mobil','');
			$this->form_validation->set_rules('tglmulai','Tgl Mulai','');
			$this->form_validation->set_rules('tglakhir','Tgl Akhir','');

			if ($this->form_validation->run()==FALSE) {     
				$this->session->set_flashdata('pesanerror','Semua form harus diisi');
				$data=array(
					'title'=>'Shafa Rent Car',
					'nopage'=>1
				);
				
				$data['jmobils'] = $this->Home_m->GetAllJmobil();
				$data['armadas'] = $this->Armada_m->GetAllArmadaTayang();
				
				$this->load->view('header',$data);
				$this->load->view('home',$data);
				$this->load->view('footer');
			} else {
				$datauser = $this->ion_auth->user()->row();
				// insert tabel order
				$dataOrder = array(
					'nama_pelanggan'	=> $this->input->post('nama'),
					'hp_pelanggan' 	   	=> $this->input->post('hp'),
					//'email_pelanggan' 	=> $this->input->post('email'),
					'id_armada' 	   	=> $this->input->post('jmobil'),
					'tgl_awalsewa' 	   	=> $this->input->post('tglmulai'),
					'tgl_akhirsewa' 	=> $this->input->post('tglakhir'),
					'status_bayar' 	   	=> "Belum Lunas",
					'tgl_order'			=> date('Y-m-d H:i:s'),
					'tgl_editorder'		=> date('Y-m-d H:i:s'),
					'iduser_editorder'	=> 1
				);	
				$this->Home_m->insertOrder($dataOrder);

				$this->session->set_flashdata('pesansukses','Terima kasih, kami akan segera menghubungi anda');	
				redirect('/');
			}
		} else {
			$data=array(
				'title'=>'Shafa Rent Car',
				'nopage'=>1
			);

			$data['jmobils'] = $this->Home_m->GetAllJmobil();
			$data['armadas'] = $this->Armada_m->GetAllArmadaTayang();
			
			$this->load->view('header',$data);
			$this->load->view('home',$data);
			$this->load->view('footer');
		}
	}

	public function order() {
		if ($post = $this->input->post('submit')) {
			$this->form_validation->set_rules('nama','Nama','required');
			$this->form_validation->set_rules('hp','Handphone','required');
			$this->form_validation->set_rules('email','Email','');
			$this->form_validation->set_rules('jmobil','Jenis Mobil','');
			$this->form_validation->set_rules('tglmulai','Tgl Mulai','');
			$this->form_validation->set_rules('tglakhir','Tgl Akhir','');

			if ($this->form_validation->run()==FALSE) {     
				$this->session->set_flashdata('pesanerror','Semua form harus diisi');
				redirect('/');
			} else {
				if ($this->input->post('jmobil')==0) {
					$this->session->set_flashdata('pesanerror','Jenis mobil belum dipilih!');
					redirect('/');
				} else {
					$datauser = $this->ion_auth->user()->row();
					// insert tabel order
					$dataOrder = array(
						'nama_pelanggan'	=> $this->input->post('nama'),
						'hp_pelanggan' 	   	=> $this->input->post('hp'),
						// 'email_pelanggan' 	=> $this->input->post('email'),
						'id_armada' 	   	=> $this->input->post('jmobil'),
						'tgl_awalsewa' 	   	=> $this->input->post('tglmulai'),
						'tgl_akhirsewa' 	=> $this->input->post('tglakhir'),
						'status_order' 	   	=> "Belum Disetujui",
						'status_bayar' 	   	=> "Belum Lunas",
						'tgl_order'			=> date('Y-m-d H:i:s'),
						'tgl_editorder'		=> date('Y-m-d H:i:s'),
						'iduser_editorder'	=> 1
					);	
					$this->Home_m->insertOrder($dataOrder);

					$this->session->set_flashdata('pesansukses','Terima kasih, kami akan segera menghubungi anda.');	
					redirect('/');
				}
			}
		}
	}
}
