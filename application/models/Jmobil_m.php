<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Jmobil_m extends CI_Model 
{	
	function __construct() 
	{
		parent::__construct();
	}
	
	public function getAllJmobil() {
        $data = array();
        $this->db->from('jenis_mobil'); 
        $this->db->order_by('id_jmobil', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }
        }
        $query->free_result();  
        return $data;    
    }

    function getJmobilById($id) {
        $data = array();
        $this->db->from('jenis_mobil');    
        $this->db->where('id_jmobil', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row();
        }
        $query->free_result();  
        return $data;
    }

    function insertJmobil($dataJmobil) {
        $this->db->insert('jenis_mobil', $dataJmobil); 
    }

    function updateJmobil($id, $dataJmobil) {
        $this->db->where('id_jmobil', $id);
        $this->db->update('jenis_mobil', $dataJmobil);
    }
}