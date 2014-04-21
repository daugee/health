<?php

class Lab_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    //***************8function for adding lab documents *******************//
    public function add_diagnostic_report($data) {

        $insert = $this->db->insert('lab_report', $data);
        return $insert;
    }

    public function get_diagnostic_report($patientid) {

        $this->db->where('patient_id', $patientid);
        $query = $this->db->get('lab_report');
       
        return $query->result_array();
    }

    public function count_report($patientid) {
        $this->db->where('patient_id', $patientid);
        $this->db->from('lab_report');
        $a = $this->db->count_all_results();
        return $a;
    }
     public function get_prescription() {
        $this->db->select('prescription.*,users.name,users.dep_id,patient.lname');
       
        $this->db->join('patient', 'patient.id = prescription.patientid', 'INNER');
        $this->db->join('users', 'users.id = prescription.doctorid');
        $query = $this->db->get('prescription');




        return $query->result_array();
    }

}