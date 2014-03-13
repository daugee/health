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
    public function get_prescription() {
        $this->db->select('prescription.date,prescription.id,doctor.dname,
           patient.name,patient.lname');

        $this->db->join('patient', 'patient.id = prescription.patientid', 'INNER');
        $this->db->join('doctor', 'doctor.id = prescription.doctorid');
        $query = $this->db->get('prescription');


        return $query->result_array();
    }

    
     //function for adding up appointment
    function add_appointment($data) {
        $insert = $this->db->insert('appointment', $data);
        return $insert;
    }

    
    public function get_doctor() {

        $query = $this->db->get('doctor');
        return $query->result_array();
    }
    
     //function for adding nurse report details
    public function add_report ($data){
        $insert = $this->db->insert('report', $data);
        return $insert;
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