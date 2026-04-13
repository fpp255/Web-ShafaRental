<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->helper('tglind');
		$this->load->helper(array('form'));
		$this->load->library(array('form_validation'));
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Pengguna_m');
		$this->load->model('Roleadmin_m');

		if(!$this->ion_auth->logged_in()) {
			redirect('auth/login', 'refresh');
		}
    }   

	public function index() {
		$hakAksesPengguna = $this->Roleadmin_m->getAksesPenggunaByIdGroup();
		if (!$this->ion_auth->logged_in()) {
		    redirect('auth/login/','refresh');
		} else if (!$hakAksesPengguna) {
			$this->session->set_flashdata('noaccess','Kamu Tidak Mempunyai Akses Kehalaman Ini!');	
			redirect('backend/','refresh');
		} else {
			// sengaja dikosongkan
		}

		$data=array(
			'title'=>'Shafa Rent Car Backend System - Pengguna',
			'nopage'=>1051
		);

		$data['user'] = $this->ion_auth->user()->row();
		$data['penggunas'] = $this->Pengguna_m->getallPengguna();
		
		$this->load->view('backend/header',$data);
		$this->load->view('backend/pengguna',$data);
		$this->load->view('backend/footer');
	}

	public function edit($id) {
		if ($post = $this->input->post('submit')) {
			$this->form_validation->set_rules('first_name','First Name','required');
			$this->form_validation->set_rules('last_name','Last Name','required');
			$this->form_validation->set_rules('phone','Phone','');
			$this->form_validation->set_rules('password','Password','required|min_length[8]');
			$this->form_validation->set_rules('groupuser','Group User','required');			

			if ($this->form_validation->run()==FALSE) {     
				if (form_error('password')) {
					$this->session->set_flashdata('pesanerror','Password harus 8 karakter!');
				} else {
					$this->session->set_flashdata('pesanerror','Form yang berwarna merah wajib diisi!');
				}

				$data=array(
					'title'=>'Shafa Rent Car Backend System - Pengguna',
					'nopage'=>1052
				);
				
				$data['user'] = $this->ion_auth->user()->row();
				$data['groups'] = $this->Pengguna_m->getallGroup();
				$data['grouppengguna'] = $this->Pengguna_m->getGroupPengguna_byid($id);
				$data['pengguna'] = $this->Pengguna_m->getPengguna_byid($id);

				$this->load->view('backend/header',$data);
				$this->load->view('backend/penggunaedit',$data);
				$this->load->view('backend/footer');
			} else {
				$datauser = $this->ion_auth->user()->row();

				// update tabel user
				$dataPengguna = array(
					'first_name' 	   	=> $this->input->post('first_name'),
					'last_name' 	   	=> $this->input->post('last_name'),
					'phone'				=> $this->input->post('phone'),
					'password' 	   	   	=> password_hash($this->input->post('password'),PASSWORD_BCRYPT),
					'active'			=> $this->input->post('statususer')
				);	
				$this->Pengguna_m->updatePengguna($id,$dataPengguna);

				$dataUserGroup = array(
					'group_id' 	   	=> $this->input->post('groupuser')
				);	
				$this->Pengguna_m->updateUserGroup($id,$dataUserGroup);

				$this->session->set_flashdata('pesansukses','Data Berhasil Disimpan');	
				redirect('backend/pengguna');
			}
		} else {
			$hakAksesPengguna = $this->Roleadmin_m->getAksesPenggunaByIdGroup();
			if (!$this->ion_auth->logged_in()) {
			    redirect('auth/login/','refresh');
			} else if (!$hakAksesPengguna) {
				$this->session->set_flashdata('noaccess','Kamu Tidak Mempunyai Akses Kehalaman Ini!');	
				redirect('backend/','refresh');
			} else {
				// sengaja dikosongkan
			}

			$data=array(
				'title'=>'Shafa Rent Car Backend System - Pengguna',
				'nopage'=>1052
			);
			
			$data['user'] = $this->ion_auth->user()->row();
			$data['groups'] = $this->Pengguna_m->getallGroup();
			$data['grouppengguna'] = $this->Pengguna_m->getGroupPengguna_byid($id);
			$data['pengguna'] = $this->Pengguna_m->getPengguna_byid($id);

			$this->load->view('backend/header',$data);
			$this->load->view('backend/penggunaedit',$data);
			$this->load->view('backend/footer');	
		}
	}

	public function add() {
    	if ($post = $this->input->post('submit')) {
    		$this->form_validation->set_rules('first_name','First Name','required');
			$this->form_validation->set_rules('last_name','Last Name','required');
			$this->form_validation->set_rules('email','E Mail','required|valid_email');
			$this->form_validation->set_rules('phone','Phone','');
			$this->form_validation->set_rules('password','Password','required|min_length[8]');
			$this->form_validation->set_rules('groupuser','Group User','required');
			
			if ($this->form_validation->run()==FALSE) {     
				if (form_error('email')) {
					$this->session->set_flashdata('pesanerror','Email tidak valid');
				} elseif (form_error('password')) {
					$this->session->set_flashdata('pesanerror','Password harus 8 karakter!');
				} else {
					$this->session->set_flashdata('pesanerror','Form yang berwarna merah wajib diisi!');
				}
					
				$data=array(
					'title'=>'Shafa Rent Car Backend System - Pengguna',
					'nopage'=>1053,
				);

				$data['user'] = $this->ion_auth->user()->row();
				$data['groups'] = $this->Pengguna_m->getallGroup();

				$this->load->view('backend/header',$data);
				$this->load->view('backend/penggunaadd',$data);
				$this->load->view('backend/footer');			
			} else {
				$cekuser = $this->Pengguna_m->getPengguna_byemail($this->input->post('email'));
				if ($cekuser) {
					$this->session->set_flashdata('pesanerror','Email sudah terdaftar!');
					
					$data=array(
						'title'=>'Shafa Rent Car Backend System - Pengguna',
						'nopage'=>1053,
					);

					$data['user'] = $this->ion_auth->user()->row();
					$data['groups'] = $this->Pengguna_m->getallGroup();

					$this->load->view('backend/header',$data);
					$this->load->view('backend/penggunaadd',$data);
					$this->load->view('backend/footer');
				} else {
					// insert tabel user
					$dataPengguna = array(
						'ip_address'        => $this->input->ip_address(),
						'username' 	   		=> $this->input->post('email'),
						'password' 	   	   	=> password_hash($this->input->post('password'),PASSWORD_BCRYPT),
						'email' 	   		=> $this->input->post('email'),
						'created_on' 		=> time(),
						'active'			=> 1,
						'first_name' 	   	=> $this->input->post('first_name'),
						'last_name' 	   	=> $this->input->post('last_name'),
						'phone'				=> $this->input->post('phone')
					);
					$this->Pengguna_m->insertPengguna($dataPengguna);	
					$idUser = $this->db->insert_id();

					$dataUserGroup = array(
						'user_id'			=> $idUser,
						'group_id'			=> $this->input->post('groupuser')
					);
					$this->Pengguna_m->insertUserGroup($dataUserGroup);
					$this->session->set_flashdata('pesansukses','Data Berhasil Disimpan');
					redirect('backend/pengguna/');
				}
				
			}
		} else {
			$hakAksesPengguna = $this->Roleadmin_m->getAksesPenggunaByIdGroup();
			if (!$this->ion_auth->logged_in()) {
			    redirect('auth/login/','refresh');
			} else if (!$hakAksesPengguna) {
				$this->session->set_flashdata('noaccess','Kamu Tidak Mempunyai Akses Kehalaman Ini!');	
				redirect('backend/','refresh');
			} else {
				// sengaja dikosongkan
			}

			$data=array(
				'title'=>'Shafa Rent Car Backend System - Pengguna',
				'nopage'=>1053,
			);

			$data['user'] = $this->ion_auth->user()->row();
			$data['groups'] = $this->Pengguna_m->getallGroup();

			$this->load->view('backend/header',$data);
			$this->load->view('backend/penggunaadd',$data);
			$this->load->view('backend/footer');
		}
	}

	public function hapus($id) {
		$hakAksesPengguna = $this->Roleadmin_m->getAksesPenggunaByIdGroup();
		if (!$this->ion_auth->logged_in()) {
		    redirect('auth/login/','refresh');
		} else if (!$hakAksesPengguna) {
			$this->session->set_flashdata('noaccess','Kamu Tidak Mempunyai Akses Kehalaman Ini!');	
			redirect('backend/','refresh');
		} else {
			// sengaja dikosongkan
		}

		if ($post = $this->input->post('submit')) {
			$this->Pengguna_m->deletePengguna($id);
			$this->Pengguna_m->deleteUserGroup($id);
			$this->session->set_flashdata('pesansukses','Data Berhasil Dihapus');
			redirect('backend/pengguna/');
		}
	}
}
