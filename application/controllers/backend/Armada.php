<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Armada extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->helper('tglind');
		$this->load->helper(array('form'));
		$this->load->library(array('form_validation'));
		$this->load->library(['ion_auth', 'form_validation']);
		date_default_timezone_set('Asia/Jakarta');	
		$this->load->model('Armada_m');
		$this->load->model('Jmobil_m');

		if(!$this->ion_auth->logged_in()) {
			redirect('auth/login', 'refresh');
		}
    }   

	public function index() {
		$data=array(
			'title'=>'Shafa Rent Car Backend System - Armada',
			'nopage'=>1031
		);

		$data['user'] = $this->ion_auth->user()->row();
		$data['armadas'] = $this->Armada_m->getAllArmada();
		
		$this->load->view('backend/header',$data);
		$this->load->view('backend/armada',$data);
		$this->load->view('backend/footer');
	}

	public function edit($id) {
		if ($post = $this->input->post('submit')) {
			$this->form_validation->set_rules('jmobil','Jenis Mobil','required');
			$this->form_validation->set_rules('hargadalam','Harga Dalam Kota','required');
			$this->form_validation->set_rules('hargaluar','Harga Luar Kota','');
			$this->form_validation->set_rules('durasi','Durasi Sewa','required');
			$this->form_validation->set_rules('status','Status Tayang','required');
			$this->form_validation->set_rules('filegmbr','File Gambar','');
			$this->form_validation->set_rules('filebg','File Background','');

			if ($this->form_validation->run()==FALSE) {     
				$this->session->set_flashdata('pesanerror','Semua form harus diisi!');
				$data=array(
					'title'=>'Shafa Rent Car Backend System - Armada',
					'nopage'=>1032
				);
				
				$data['user'] = $this->ion_auth->user()->row();
				$data['armada'] = $this->Armada_m->getArmadaById($id);
				$data['jmobils'] = $this->Jmobil_m->getAllJmobil();
				
				$this->load->view('backend/header',$data);
				$this->load->view('backend/armadaedit',$data);
				$this->load->view('backend/footer');
			} else {
				$datauser = $this->ion_auth->user()->row();

				$extensi1 = explode(".", $_FILES['filegmbr']['name']);
				$extensi2 = explode(".", $_FILES['filebg']['name']);
				
				if($_FILES['filegmbr']['name'] && $_FILES['filebg']['name']) {
					if ($extensi1[1]!='png' && $extensi1[1]!='jpg' && $extensi1[1]!='jpeg') {
						$this->session->set_flashdata('pesanerror','Format file gambar tidak didukung');
						redirect('backend/armada/edit/'.$id);
					} else if ($extensi2[1]!='png' && $extensi2[1]!='jpg' && $extensi2[1]!='jpeg') {
						$this->session->set_flashdata('pesanerror','Format file background tidak didukung');
						redirect('backend/armada/edit/'.$id);
					} else {
						$config['upload_path'] = './uploads/';
						$config['allowed_types'] = 'png|jpg|jpeg';
						$config['max_size'] = 3072;	// 3MB
						unlink('./uploads/'.$this->input->post('filegmbrlama'));
						$this->load->library('upload', $config);
						$this->upload->do_upload('filegmbr');
						$unggahgmbr = $this->upload->data();   

						$config2['upload_path'] = './uploads/';
						$config2['allowed_types'] = 'png|jpg|jpeg';
						$config2['max_size'] = 3072;	// 3MB
						$this->upload->initialize($config2);
						unlink('./uploads/'.$this->input->post('filebglama'));
						$this->upload->do_upload('filebg'); 
						$unggahbg = $this->upload->data();

						// update tabel armada dengan file gmbr dan file bg
						$dataArmada = array(
							'id_jmobil'			=> $this->input->post('jmobil'),
							'hrg_dlmkota'		=> $this->input->post('hargadalam'),
							'hrg_luarkota'		=> $this->input->post('hargaluar'),
							'durasi_sewa'		=> $this->input->post('durasi'),
							'status_tayang'		=> $this->input->post('status'),
							'gambar1'			=> $unggahgmbr['file_name'],
							'gambar2'			=> $unggahbg['file_name'],
							'tgl_editarmada'  	=> date('Y-m-d H:i:s'),
							'iduser_editarmada' => $datauser->id
						);	
						$this->Armada_m->updateArmada($id,$dataArmada);
						$this->session->set_flashdata('pesansukses','Data Berhasil Disimpan');	
						redirect('backend/armada');
					}
				} else if($_FILES['filegmbr']['name']) {
					if ($extensi1[1]!='png' && $extensi1[1]!='jpg' && $extensi1[1]!='jpeg') {
						$this->session->set_flashdata('pesanerror','Format file gambar tidak didukung');
						redirect('backend/armada/edit/'.$id);
					} else {
						$config['upload_path'] = './uploads/';
						$config['allowed_types'] = 'png|jpg|jpeg';
						$config['max_size'] = 3072;	// 3MB
						unlink('./uploads/'.$this->input->post('filegmbrlama'));
						$this->load->library('upload', $config);
						$this->upload->do_upload('filegmbr');
						$unggahgmbr = $this->upload->data();   

						// update tabel armada dengan file gambar
						$dataArmada = array(
							'id_jmobil'			=> $this->input->post('jmobil'),
							'hrg_dlmkota'		=> $this->input->post('hargadalam'),
							'hrg_luarkota'		=> $this->input->post('hargaluar'),
							'durasi_sewa'		=> $this->input->post('durasi'),
							'status_tayang'		=> $this->input->post('status'),
							'gambar1'			=> $unggahgmbr['file_name'],
							'tgl_editarmada'  	=> date('Y-m-d H:i:s'),
							'iduser_editarmada' => $datauser->id
						);		
						$this->Armada_m->updateArmada($id,$dataArmada);
						$this->session->set_flashdata('pesansukses','Data Berhasil Disimpan');	
						redirect('backend/armada');
					}
				} else if($_FILES['filebg']['name']) {
					if ($extensi2[1]!='png' && $extensi2[1]!='jpg' && $extensi2[1]!='jpeg') {
						$this->session->set_flashdata('pesanerror','Format file background tidak didukung');
						redirect('backend/armada/edit/'.$id);
					} else {
						$config2['upload_path'] = './uploads/';
						$config2['allowed_types'] = 'png|jpg|jpeg';
						$config['max_size'] = 3072;	// 3MB
						unlink('./uploads/'.$this->input->post('filebglama'));
						$this->load->library('upload', $config2);
						$this->upload->do_upload('filebg');
						$unggahbg = $this->upload->data(); 

						// update tabel armada dengan file background
						$dataArmada = array(
							'id_jmobil'			=> $this->input->post('jmobil'),
							'hrg_dlmkota'		=> $this->input->post('hargadalam'),
							'hrg_luarkota'		=> $this->input->post('hargaluar'),
							'durasi_sewa'		=> $this->input->post('durasi'),
							'status_tayang'		=> $this->input->post('status'),
							'gambar2'			=> $unggahbg['file_name'],
							'tgl_editarmada'  	=> date('Y-m-d H:i:s'),
							'iduser_editarmada' => $datauser->id
						);		
						$this->Armada_m->updateArmada($id,$dataArmada);
						$this->session->set_flashdata('pesansukses','Data Berhasil Disimpan');	
						redirect('backend/armada');
					}
				} else {
					// update tabel armada tanpa file
					$dataArmada = array(
						'id_jmobil'			=> $this->input->post('jmobil'),
						'hrg_dlmkota'		=> $this->input->post('hargadalam'),
						'hrg_luarkota'		=> $this->input->post('hargaluar'),
						'durasi_sewa'		=> $this->input->post('durasi'),
						'status_tayang'		=> $this->input->post('status'),
						'tgl_editarmada'  	=> date('Y-m-d H:i:s'),
						'iduser_editarmada' => $datauser->id
					);		
					$this->Armada_m->updateArmada($id,$dataArmada);
					$this->session->set_flashdata('pesansukses','Data Berhasil Disimpan');	
					redirect('backend/armada');
				}
			}
		} else {
			$data=array(
				'title'=>'Shafa Rent Car Backend System - Armada',
				'nopage'=>1032
			);
			
			$data['user'] = $this->ion_auth->user()->row();
			$data['armada'] = $this->Armada_m->getArmadaById($id);
			$data['jmobils'] = $this->Jmobil_m->getAllJmobil();
			
			$this->load->view('backend/header',$data);
			$this->load->view('backend/armadaedit',$data);
			$this->load->view('backend/footer');
		}
	}

	public function add() {
		if ($post = $this->input->post('submit')) {
			$this->form_validation->set_rules('jmobil','Jenis Mobil','required');
			$this->form_validation->set_rules('hargadalam','Harga Dalam Kota','required');
			$this->form_validation->set_rules('hargaluar','Harga Luar Kota','');
			$this->form_validation->set_rules('durasi','Durasi Sewa','required');
			$this->form_validation->set_rules('status','Status Tayang','required');
			$this->form_validation->set_rules('filegmbr','File Gambar','');
			$this->form_validation->set_rules('filebg','File Background','');

			if ($this->form_validation->run()==FALSE) {     
				$this->session->set_flashdata('pesanerror','Semua form harus diisi!');
				$data=array(
					'title'=>'Shafa Rent Car Backend System - Armada',
					'nopage'=>1033
				);
				
				$data['user'] = $this->ion_auth->user()->row();
				$data['jmobils'] = $this->Jmobil_m->getAllJmobil();
				
				$this->load->view('backend/header',$data);
				$this->load->view('backend/armadaadd',$data);
				$this->load->view('backend/footer');
			} else {
				$datauser = $this->ion_auth->user()->row();

				$extensi1 = explode(".", $_FILES['filegmbr']['name']);
				$extensi2 = explode(".", $_FILES['filebg']['name']);

				if($_FILES['filegmbr']['name'] && $_FILES['filebg']['name']) {
					if ($extensi1[1]!='png' && $extensi1[1]!='jpg' && $extensi1[1]!='jpeg') {
						$this->session->set_flashdata('pesanerror','Format file gambar tidak didukung');
						redirect('backend/armada/add');
					} else if ($extensi2[1]!='png' && $extensi2[1]!='jpg' && $extensi2[1]!='jpeg') {
						$this->session->set_flashdata('pesanerror','Format file background tidak didukung');
						redirect('backend/armada/add');
					} else {
						$config['upload_path'] = './uploads/';
						$config['allowed_types'] = 'png|jpg|jpeg';
						$config['max_size'] = 3072;	// 3MB
						$this->load->library('upload', $config);
						$this->upload->do_upload('filegmbr');
						$unggahgmbr = $this->upload->data();   

						$config2['upload_path'] = './uploads/';
						$config2['allowed_types'] = 'png|jpg|jpeg';
						$config2['max_size'] = 3072;	// 3MB
						$this->upload->initialize($config2);
						$this->upload->do_upload('filebg'); 
						$unggahbg = $this->upload->data();

						// insert tabel armada dengan file gmbr dan file bg
						$dataArmada = array(
							'id_jmobil'			=> $this->input->post('jmobil'),
							'hrg_dlmkota'		=> $this->input->post('hargadalam'),
							'hrg_luarkota'		=> $this->input->post('hargaluar'),
							'durasi_sewa'		=> $this->input->post('durasi'),
							'status_tayang'		=> $this->input->post('status'),
							'gambar1'			=> $unggahgmbr['file_name'],
							'gambar2'			=> $unggahbg['file_name'],
							'tgl_editarmada'  	=> date('Y-m-d H:i:s'),
							'iduser_editarmada' => $datauser->id
						);	
						$this->Armada_m->insertArmada($dataArmada);
						$this->session->set_flashdata('pesansukses','Data Berhasil Disimpan');	
						redirect('backend/armada');
					}
				} else {
					$this->session->set_flashdata('pesanerror','File foto/gambar dan background harus diisi!');
					redirect('backend/armada/add');
				}
			}
		} else {
			$data=array(
				'title'=>'Shafa Rent Car Backend System - Armada',
				'nopage'=>1033
			);
			
			$data['user'] = $this->ion_auth->user()->row();
			$data['jmobils'] = $this->Jmobil_m->getAllJmobil();
			
			$this->load->view('backend/header',$data);
			$this->load->view('backend/armadaadd',$data);
			$this->load->view('backend/footer');
		}
	}

	public function hapus($id) {
		if ($post = $this->input->post('submit')) {
			unlink('./uploads/'.$this->input->post('filegmbr'));
			unlink('./uploads/'.$this->input->post('filebg'));
			$this->Armada_m->deleteArmada($id);
			$this->session->set_flashdata('pesansukses','Data Berhasil Dihapus!');
			redirect('backend/armada');
		}
	}
}
