<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Armada_m extends CI_Model 
{	
	function __construct() 
	{
		parent::__construct();
	}
	
	public function getAllArmada() {
        $data = array();
        $this->db->from('armada'); 
        $this->db->order_by('id_armada', 'DESC');
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

    public function getAllArmadaTayang() {
        $data = array();
        $this->db->from('armada'); 
        $this->db->where('status_tayang', 'Tayang');
        $this->db->order_by('no_urut', 'ASC');
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

    function getArmadaById($id) {
        $data = array();
        $this->db->from('armada');    
        $this->db->where('id_armada', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row();
        }
        $query->free_result();  
        return $data;
    }

    function insertArmada($dataArmada) {
        $this->db->insert('armada', $dataArmada); 
    }

    function updateArmada($id, $dataArmada) {
        $this->db->where('id_armada', $id);
        $this->db->update('armada', $dataArmada);
    }

    function deleteArmada($id) {
        $this->db->where('id_armada', $id);  
        $this->db->delete('armada');
    }
}