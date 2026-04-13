<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Roleadmin_m extends CI_Model {
	function getAksesPenggunaByIdGroup() {
		$data = array();
		$this->db->from('roleadmin');	
		$this->db->where('id_group', $this->session->userdata('user_id'));
		$this->db->where('akses_pengguna', 1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$data = $query->row();
		}
		$query->free_result();  
		return $data;
	}
}