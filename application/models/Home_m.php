<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_m extends CI_Model 
{	
	function __construct() {
		parent::__construct();
	}
	
	public function GetAllJmobil() {
        $data = array();
        $this->db->from('jenis_mobil'); 
        $this->db->order_by('id_jmobil', 'ASC');
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

    public function GetAllArmada() {
        $data = array();
        $this->db->from('armada'); 
        $this->db->order_by('id_jmobil', 'ASC');
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

    function insertOrder($dataOrder) {
        $this->db->insert('order', $dataOrder); 
    }
}