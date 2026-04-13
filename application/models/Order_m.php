<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_m extends CI_Model 
{	
	function __construct() 
	{
		parent::__construct();
	}
	
	public function getAllOrder() {
        $data = array();
        $this->db->from('order'); 
        $this->db->order_by('id_order', 'DESC');
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

    function getOrdeById($id) {
        $data = array();
        $this->db->from('order');    
        $this->db->where('id_order', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row();
        }
        $query->free_result();  
        return $data;
    }

    public function getAllJmobil() {
        $data = array();
        $this->db->from('jenis_mobil'); 
        $this->db->order_by('nama_jmobil', 'ASC');
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

    function updateOrder($id, $dataOrder) {
        $this->db->where('id_order', $id);
        $this->db->update('order', $dataOrder);
    }
}