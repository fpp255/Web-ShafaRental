<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_m extends CI_Model 
{	
	function __construct() 
	{
		parent::__construct();
	}
	
    public function getallGroup() {
        $data = array();
        $this->db->from('groups'); 
        $this->db->order_by('id', 'DESC');
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

	public function getallPengguna() {
        $data = array();
        $this->db->from('users'); 
        $this->db->where('id !=', 2); 
        $this->db->order_by('first_name', 'ASC');
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

    public function getallPenggunaAktif() {
        $data = array();
        $this->db->from('users');
        $this->db->where('active', 1); 
        $this->db->order_by('id', 'DESC');
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

    function getPengguna_byid($id) {
        $data = array();
        $this->db->from('users');    
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row();
        }
        $query->free_result();  
        return $data;
    }

    function getPengguna_byemail($email) {
        $data = array();
        $this->db->from('users');    
        $this->db->where('email', $email);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row();
        }
        $query->free_result();  
        return $data;
    }

    function getGroupPengguna_byid($id) {
        $data = array();
        $this->db->from('users_groups');    
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = $query->row();
        }
        $query->free_result();  
        return $data;
    }

    function insertPengguna($dataPengguna) {
        $this->db->insert('users', $dataPengguna); 
        // $insertID = $this->db->mysql_insert_id();
        // return $insertID;
    }

    function updatePengguna($id, $dataPengguna) {
        $this->db->where('id', $id);
        $this->db->update('users', $dataPengguna);
    }

    function updateUserGroup($id, $dataUserGroup) {
        $this->db->where('user_id', $id);
        $this->db->update('users_groups', $dataUserGroup);
    }

    function deletePengguna($id) {
        $this->db->where('id', $id);  
        $this->db->delete('users');
    }

    function insertUserGroup($dataUserGroup) {
        $this->db->insert('users_groups', $dataUserGroup); 
    }

    function deleteUserGroup($id) {
        $this->db->where('user_id', $id);  
        $this->db->delete('users_groups');
    }
}