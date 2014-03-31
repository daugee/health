<?php

class Doctor_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    //function for adding up a prescription
    function add_prescription($data) {
        $insert = $this->db->insert('prescription', $data);
        return $insert;
    }

    //function for getting prescription details
    public function get_prescription($q) {
        $this->db->select('prescription.*,users.name,users.dep_id,
           patient.name,patient.lname');
        $this->db->where('doctorid',$q);
        $this->db->join('patient', 'patient.id = prescription.patientid', 'INNER');
        $this->db->join('users', 'users.id = prescription.doctorid');
        $query = $this->db->get('prescription');
        
        

   
        return $query->result_array();
    }

    //function for adding up appointment
    function add_appointment($data) {
        $insert = $this->db->insert('appointment', $data);
        return $insert;
    }
    
   public function update_appointment($data,$id) {
        
            $this->db->where('id', $id);
            $this->db->update('appointment',$data);
           
    }

    
    
    
    public function get_doctor() {

        $query = $this->db->get('doctor');
        return $query->result_array();
    }

    //function for adding nurse report details
    public function add_report($data) {
        $insert = $this->db->insert('report', $data);
        return $insert;
    }

    //function for getting nurse report details
    public function get_report_operation() {

        $this->db->select('*');
        $this->db->from('report');
        $this->db->where('type', 'operation');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_report_birth() {

        $this->db->select('*');
        $this->db->from('report');
        $this->db->where('type', 'birth');
        $q = $this->db->get();
        return $q->result_array();
    }

    public function get_report_death() {

        $this->db->select('*');
        $this->db->from('report');
        $this->db->where('type', 'death');
        $d = $this->db->get();
        return $d->result_array();
    }

    public function get_report_other() {

        $this->db->select('*');
        $this->db->from('report');
        $this->db->where('type', 'other');
        $oth = $this->db->get();
        return $oth->result_array();
    }

    //function for getting prescription details
    public function get_appointment($q) {
        $this->db->select('appointment.*,users.name,users.dep_id,
           patient.name,patient.lname');
        $this->db->where('doctor',$q);
        $this->db->join('patient', 'patient.id = appointment.patient', 'INNER');
        $this->db->join('users', 'users.id = appointment.doctor');
        $query = $this->db->get('appointment');
      

        return $query->result_array();
    }
    public function get_appointment1($id){
         $this->db->select('appointment.*,users.name,users.dep_id,
           patient.name,patient.lname');
        $this->db->where('appointment.id',$id);
        $this->db->join('patient', 'patient.id = appointment.patient', 'INNER');
        $this->db->join('users', 'users.id = appointment.doctor');
        $query = $this->db->get('appointment');
      

        return $query->result_array();
    }
    
     public function update_prescription()
    {
        
      
        $data=array(
            'casehistory'=>$this->input->post('casehistory'),
            'medication'=>$this->input->post('medication'),
            'medicationpharmacist'=>$this->input->post('medicationpharmacist'),
            'description'=>$this->input->post('description'),
            
        );
        
        $this->db->where('patientid', $this->input->post('id'));
        $this->db->update('prescription',$data);
    }
   
    public function get_bedallotment($id) {
       
        
         $this->db->where('bedallotment.id',$id);
         $this->db->select('bedallotment.*,patient.name');
        $this->db->join('patient', 'patient.id = bedallotment.patient', 'INNER');       
        $query = $this->db->get('bedallotment');
     
        return $query->result_array();
    }
    
    
     public function update_bedallotment()
    {
        
         
         $data = array(
                        'bedno' => $this->input->post('bedno'),
                        'patient' => $this->input->post('patient'),
                        'allotmentdate' => $this->input->post('allotmentdate'),
                        'dischargedate' => $this->input->post('dischargedate')
                    );
      
              
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('prescription',$data);
    }

}