<?php
class Doctor_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
    }
    
    
    //function for adding up a prescription
    function add_prescription($data)
    {
		$insert = $this->db->insert('prescription', $data);
                return $insert;
    }
    
    //function for getting prescription details
     public function get_prescription()
    {
	    
		$query = $this->db->get('prescription');
		return $query->result_array(); 
    }
    
}