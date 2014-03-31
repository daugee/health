<?php

class Admin_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // function for addding departments
    function add_department($data) {
        
        $query = $this->db->get_where('department', array ('dep_name'=>$this->input->post('departmentname')));
        if($query->num_rows() > 0)
        {
          return FALSE;
           
        }
        else
        {
        $insert = $this->db->insert('department', $data);
        return $insert;
        }
    }
    
    // function for getting departments
    public function get_department(){
        $query = $this->db->get('department');
        return $query->result_array();
    }
    
    
    // function for getting medicine
    public function get_medicine(){
        $query = $this->db->get('medicine');
        return $query->result_array();
    }
    
    // function for addding doctors
    function add_doctor($data) {
        
        $query = $this->db->get_where('users', array ('phone'=>$this->input->post('phone'))) OR $this->db->get_where('users', array ( 'email'=>  $this->input->post('email')));
        if($query->num_rows() > 0)
        {
          return FALSE;
           
        }
        else
        {
        $insert = $this->db->insert('users', $data);
        return $insert;
        }
    }

     // function for getting doctor
    public function get_doctor(){
        $this->db->select('users.name,users.id,department.dep_name,
           department.dep_id');
        $this->db->where('type', 'doctor');
        $this->db->join('department', 'department.dep_id = users.dep_id', 'INNER');
        
        $query = $this->db->get('users');


        return $query->result_array();
        
    }
    
    
     // function for addding nurses
    function add_nurse($data) {
        
        $query = $this->db->get_where('users', array ('phone'=>$this->input->post('phone'))) OR $this->db->get_where('users', array ( 'email'=>  $this->input->post('email')));
        if($query->num_rows() > 0)
        {
          return FALSE;
           
        }
        else
        {
        $insert = $this->db->insert('users', $data);
        return $insert;
        }
    }
    
     // function for getting nurse
    public function get_nurse(){
        $this->db->select('*');
        $this->db->where('type', 'nurse');
       $query = $this->db->get('users');


        return $query->result_array();
        
    }
    
    
     // function for addding pharmacist
    function add_pharmacist($data) {
        
       $query = $this->db->get_where('users', array ('phone'=>$this->input->post('phone'))) OR $this->db->get_where('users', array ( 'email'=>  $this->input->post('email')));
        if($query->num_rows() > 0)
        {
          return FALSE;
           
        }
        else
        {
        $insert = $this->db->insert('users', $data);
        return $insert;
        }
    }
    
    
     // function for getting pharmacist
    public function get_pharmacist(){
        $this->db->select('*');
        $this->db->where('type', 'pharmacist');
       $query = $this->db->get('users');


        return $query->result_array();
        
    }
    
    
    
     // function for addding laboratorist
    function add_laboratorist($data) {
        
        $query = $this->db->get_where('users', array ('phone'=>$this->input->post('phone'))) OR $this->db->get_where('users', array ( 'email'=>  $this->input->post('email')));
        // ('email'=>  $this->input->post('email'))
       
        if($query->num_rows() > 0)
        {
          return FALSE;
           
        }
        else
        {
        $insert = $this->db->insert('users', $data);
        return $insert;
        }
    }
    
    // function for getting laboratorist
    public function get_laboratorist(){
        $this->db->select('*');
        $this->db->where('type', 'lab');
       $query = $this->db->get('users');


        return $query->result_array();
        
    }
    
    //function for getting prescription details
    public function get_appointment() {
        $this->db->select('appointment.date,appointment.id,doctor.dname,
           patient.name,patient.lname');

        $this->db->join('patient', 'patient.id = appointment.patient', 'INNER');
        $this->db->join('doctor', 'doctor.id = appointment.doctor');
        $query = $this->db->get('appointment');


        return $query->result_array();
    }
    
}