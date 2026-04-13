<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan_m extends CI_Model 
{	
	function __construct() 
	{
		parent::__construct();
	}
	
	public function getAllPesan() {
        $data = array();
        $this->db->from('pesan'); 
        $this->db->order_by('id_pesan', 'DESC');
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

    function getPesanById($id) {
        $data = array();
        $this->db->from('pesan');    
        $this->db->where('id_pesan', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row();
        }
        $query->free_result();  
        return $data;
    }

    function insertPesan($dataPesan) {
        $this->db->insert('pesan', $dataPesan); 
    }

    function updatePesan($id, $dataPesan) {
        $this->db->where('id_pesan', $id);
        $this->db->update('pesan', $dataPesan);
    }

    function deletePesan($id) {
        $this->db->where('id_pesan', $id);  
        $this->db->delete('pesan');
    }
}