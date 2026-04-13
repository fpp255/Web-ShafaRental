<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->helper('tglind');
		$this->load->helper(array('form'));
		$this->load->library(array('form_validation'));
		$this->load->library(['ion_auth', 'form_validation']);
		date_default_timezone_set('Asia/Jakarta');	
		$this->load->model('Order_m');

		if(!$this->ion_auth->logged_in()) {
			redirect('auth/login', 'refresh');
		}
    }   

	public function index() {
		$data=array(
			'title'=>'Shafa Rent Car Backend System - Order',
			'nopage'=>1011
		);

		$data['user'] = $this->ion_auth->user()->row();
		$data['orders'] = $this->Order_m->getAllOrder();
		
		$this->load->view('backend/header',$data);
		$this->load->view('backend/order',$data);
		$this->load->view('backend/footer');
	}

	public function edit($id) {
		if ($post = $this->input->post('submit')) {
			$this->form_validation->set_rules('tglorder','Tgl. Order','');
			$this->form_validation->set_rules('nama','Nama Pelanggan','');
			$this->form_validation->set_rules('nohp','No. HP','');
			$this->form_validation->set_rules('email','Email Pelanggan','');
			$this->form_validation->set_rules('jmobil','Jenis Mobil','required');
			$this->form_validation->set_rules('tglawal','Tgl. Awal Sewa','required');
			$this->form_validation->set_rules('tglakhir','Tgl. Akhir Sewa','required');
			$this->form_validation->set_rules('statusord','Status Order','required');
			$this->form_validation->set_rules('statusbyr','Status Bayar','required');

			if ($this->form_validation->run()==FALSE) {     
				$this->session->set_flashdata('pesanerror','Semua form harus diisi!');
				$data=array(
					'title'=>'Shafa Rent Car Backend System - Order',
					'nopage'=>1012
				);
				
				$data['user'] = $this->ion_auth->user()->row();
				$data['order'] = $this->Order_m->getOrdeById($id);
				$data['jmobils'] = $this->Order_m->getAllJmobil();
				
				$this->load->view('backend/header',$data);
				$this->load->view('backend/orderedit',$data);
				$this->load->view('backend/footer');
			} else {
				$datauser = $this->ion_auth->user()->row();
				// update tabel order
				$dataOrder = array(
					'status_order'		=> $this->input->post('statusord'),	
					'status_bayar'		=> $this->input->post('statusbyr'),
					'tgl_editorder'  	=> date('Y-m-d H:i:s'),
					'iduser_editorder'  => $datauser->id
				);	
				$this->Order_m->updateOrder($id,$dataOrder);
				$this->session->set_flashdata('pesansukses','Data Berhasil Disimpan');	
				redirect('backend/order');
			}
		} else {
			$data=array(
				'title'=>'Shafa Rent Car Backend System - Order',
				'nopage'=>1012
			);
			
			$data['user'] = $this->ion_auth->user()->row();
			$data['order'] = $this->Order_m->getOrdeById($id);
			$data['jmobils'] = $this->Order_m->getAllJmobil();
			
			$this->load->view('backend/header',$data);
			$this->load->view('backend/orderedit',$data);
			$this->load->view('backend/footer');
		}
	}
}
