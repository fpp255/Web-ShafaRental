<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cari extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->helper('tglind');
		$this->load->helper(array('form'));
		$this->load->helper('text');
		$this->load->library(array('form_validation'));
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Cari_m');
    }  

	public function index() {
		if ($post = $this->input->post('submit')) {
			$data=array(
				'title'=>'Microsite IUWASH PLUS',
				'nopage'=>11
			);
			// $data['caris'] = $this->Cari_m->getallContent();
			
			// $this->load->view('cari',$data);

			$katakunci = $this->input->post('katakunci');
			$data['caris'] = $this->Cari_m->getallData($katakunci);
			$this->load->view('cari',$data);
		} else {
			redirect('/');
		}
	}
}
