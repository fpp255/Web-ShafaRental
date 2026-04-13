<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Armadakami extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->helper('tglind');
		$this->load->helper(array('form'));
		$this->load->helper('text');
		$this->load->library(array('form_validation'));
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Armada_m');
    }  

	public function index() {
		$data=array(
			'title'=>'Shafa Rent Car',
			'nopage'=>3
		);

		$data['armadas'] = $this->Armada_m->GetAllArmadaTayang();

		$this->load->view('header',$data);
		$this->load->view('armadakami',$data);
		$this->load->view('footer');
	}
}
