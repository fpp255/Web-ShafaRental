<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->helper('tglind');
		$this->load->helper(array('form'));
		$this->load->library(array('form_validation'));
		$this->load->library(['ion_auth', 'form_validation']);
		date_default_timezone_set('Asia/Jakarta');

		if(!$this->ion_auth->logged_in()) {
			redirect('auth/login', 'refresh');
		}
    }   

	public function index() {
		$data=array(
			'title'=>'Home',
			'nopage'=>1001
		);

		$data['user'] = $this->ion_auth->user()->row();
		
		$this->load->view('backend/header',$data);
		$this->load->view('backend/home',$data);
		$this->load->view('backend/footer');
	}
}
