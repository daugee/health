<?php

class Patient_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_appointment($q) {
        $this->db->select('appointment.*,users.name,users.dep_id,
           patient.id');
        $this->db->where('patient',$q);
        $this->db->join('patient', 'patient.id = appointment.patient', 'INNER');
        $this->db->join('users', 'users.id = appointment.doctor','INNER');
        $query = $this->db->get('appointment');
    
         
       


        return $query->result_array();
    }

   
    public function get_prescription($q) {
        $this->db->select('prescription.*,doctor.dname,
           patient.name,patient.lname');
        $this->db->where('patientid',$q);
        $this->db->join('patient', 'patient.id = prescription.patientid', 'INNER');
        $this->db->join('doctor', 'doctor.id = prescription.doctorid');
        $query = $this->db->get('prescription');

        
        return $query->result_array();
    }
    public function get_prescription1($id) {
        $this->db->select('prescription.*,users.name,users.dep_id,patient.lname');
            $this->db->where('patientid',$id);
        $this->db->join('patient', 'patient.id = prescription.patientid', 'INNER');
        $this->db->join('users', 'users.id = prescription.doctorid');
        $query = $this->db->get('prescription');




        return $query->result_array();
    }
    
    public function admit_history($q) {
        
       $this->db->select('bedallotment.*,bed.*');
        $this->db->where('patient',$q);
        $this->db->join('bed', 'bed.bedno =bedallotment.bedno', 'INNER');
        
        $query = $this->db->get('bedallotment');
       
        return $query->result_array();
    }
     public function get_report($q) {

        $this->db->select('report.*,users.dep_id, users.name');
        $this->db->where('report.patient', $q);
        
        $this->db->join('users', 'users.id = report.doctor','INNER');
        $query = $this->db->get('report');
        return $query->result_array();
    } 
     
}
