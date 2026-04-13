<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jmobil extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->helper('tglind');
		$this->load->helper(array('form'));
		$this->load->library(array('form_validation'));
		$this->load->library(['ion_auth', 'form_validation']);
		date_default_timezone_set('Asia/Jakarta');	
		$this->load->model('Jmobil_m');

		if(!$this->ion_auth->logged_in()) {
			redirect('auth/login', 'refresh');
		}
    }   

	public function index() {
		$data=array(
			'title'=>'Shafa Rent Car Backend System - Jenis Mobil',
			'nopage'=>1021
		);

		$data['user'] = $this->ion_auth->user()->row();
		$data['jmobils'] = $this->Jmobil_m->getAllJmobil();
		
		$this->load->view('backend/header',$data);
		$this->load->view('backend/jmobil',$data);
		$this->load->view('backend/footer');
	}

	public function edit($id) {
		if ($post = $this->input->post('submit')) {
			$this->form_validation->set_rules('namajmobil','Jenis Mobil','required');

			if ($this->form_validation->run()==FALSE) {     
				$this->session->set_flashdata('pesanerror','Semua form harus diisi!');
				$data=array(
					'title'=>'Shafa Rent Car Backend System - Jenis Mobil',
					'nopage'=>1022
				);
				
				$data['user'] = $this->ion_auth->user()->row();
				$data['jmobil'] = $this->Jmobil_m->getJmobilById($id);
				
				$this->load->view('backend/header',$data);
				$this->load->view('backend/jmobiledit',$data);
				$this->load->view('backend/footer');
			} else {
				// cek nama yang sama
				$this->db->select('nama_jmobil');
				$this->db->from('jenis_mobil');	
				$this->db->where('nama_jmobil', $this->input->post('namajmobil'));
				$this->db->where('id_jmobil !=', $id);
				$query = $this->db->get();
				if ($query->num_rows() > 0) {
					$this->session->set_flashdata('pesanerror','Nama mobil yang dimasukan sudah ada!');	
					redirect('backend/jmobil/edit/'.$id);
				} else {
					$datauser = $this->ion_auth->user()->row();
					// update tabel jmobil
					$dataJmobil = array(
						'nama_jmobil'		=> $this->input->post('namajmobil'),
						'tgl_editjmobil'  	=> date('Y-m-d H:i:s'),
						'iduser_editjmobil' => $datauser->id
					);	
					$this->Jmobil_m->updateJmobil($id,$dataJmobil);
					$this->session->set_flashdata('pesansukses','Data Berhasil Disimpan');	
					redirect('backend/jmobil');
				}
			}
		} else {
			$data=array(
				'title'=>'Shafa Rent Car Backend System - Jenis Mobil',
				'nopage'=>1022
			);
			
			$data['user'] = $this->ion_auth->user()->row();
			$data['jmobil'] = $this->Jmobil_m->getJmobilById($id);
			
			$this->load->view('backend/header',$data);
			$this->load->view('backend/jmobiledit',$data);
			$this->load->view('backend/footer');
		}
	}

	public function add() {
		if ($post = $this->input->post('submit')) {
			$this->form_validation->set_rules('namajmobil','Jenis Mobil','required');

			if ($this->form_validation->run()==FALSE) {     
				$this->session->set_flashdata('pesanerror','Semua form harus diisi!');
				$data=array(
					'title'=>'Shafa Rent Car Backend System - Jenis Mobil',
					'nopage'=>1023
				);
				
				$data['user'] = $this->ion_auth->user()->row();
				
				$this->load->view('backend/header',$data);
				$this->load->view('backend/jmobiladd',$data);
				$this->load->view('backend/footer');
			} else {
				// cek nama yang sama
				$this->db->select('nama_jmobil');
				$this->db->from('jenis_mobil');	
				$this->db->where('nama_jmobil', $this->input->post('namajmobil'));
				$query = $this->db->get();
				if ($query->num_rows() > 0) {
					$this->session->set_flashdata('pesanerror','Nama mobil yang dimasukan sudah ada!');	
					redirect('backend/jmobil/add');
				} else {
					$datauser = $this->ion_auth->user()->row();
					// inser tabel jmobil
					$dataJmobil = array(
						'nama_jmobil'		=> $this->input->post('namajmobil'),
						'tgl_editjmobil'  	=> date('Y-m-d H:i:s'),
						'iduser_editjmobil' => $datauser->id
					);	
					$this->Jmobil_m->insertJmobil($dataJmobil);
					$this->session->set_flashdata('pesansukses','Data Berhasil Disimpan');	
					redirect('backend/jmobil');
				}
			}
		} else {
			$data=array(
				'title'=>'Shafa Rent Car Backend System - Jenis Mobil',
				'nopage'=>1023
			);
			
			$data['user'] = $this->ion_auth->user()->row();
			
			$this->load->view('backend/header',$data);
			$this->load->view('backend/jmobiladd',$data);
			$this->load->view('backend/footer');
		}
	}
}
