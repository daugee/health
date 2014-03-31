<?php

class Patient_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_appointment($q) {
        $this->db->select('appointment.*,doctor.dname,doctor.dept,
           patient.*');
        $this->db->where('patient',$q);
        $this->db->join('patient', 'patient.id = appointment.patient', 'INNER');
        $this->db->join('doctor', 'doctor.id = appointment.doctor');
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
}
