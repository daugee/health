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
        $this->db->where('doctorid', $q);
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

    public function update_appointment($data, $id) {

        $this->db->where('id', $id);
        $this->db->update('appointment', $data);
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
    
      public function get_report($id) {

        $this->db->select('report.*, patient.lname,users.dep_id, users.name');
        $this->db->where('report.id', $id);
        $this->db->join('patient', 'patient.id = report.patient', 'INNER');
        $this->db->join('users', 'users.id = report.doctor');
        $query = $this->db->get('report');
        return $query->result_array();
    }  
    //function for getting nurse report details
    public function get_report_operation($q) {
        $this->db->select('report.*, patient.lname,users.dep_id, users.name');
        $this->db->where('report.type', 'operation');
        $this->db->where('report.doctor', $q);
        $this->db->join('patient', 'patient.id = report.patient', 'INNER');
        $this->db->join('users', 'users.id = report.doctor');
        $query = $this->db->get('report');

        return $query->result_array();
    }

    public function get_report_birth($q) {


        $this->db->select('report.*, patient.lname,users.dep_id, users.name');
        $this->db->where('report.type', 'birth');
        $this->db->where('report.doctor', $q);
        $this->db->join('patient', 'patient.id = report.patient', 'INNER');
        $this->db->join('users', 'users.id = report.doctor');
        $q = $this->db->get('report');


        return $q->result_array();
    }

    public function get_report_death($q) {

        $this->db->select('report.*, patient.lname,users.dep_id, users.name');
        $this->db->where('report.type', 'death');
        $this->db->where('report.doctor', $q);
        $this->db->join('patient', 'patient.id = report.patient', 'INNER');
        $this->db->join('users', 'users.id = report.doctor');
        $d = $this->db->get('report');

        return $d->result_array();
    }

    public function get_report_other($q) {

        $this->db->select('report.*, patient.lname,users.dep_id, users.name');
        $this->db->where('report.type', 'other');
        $this->db->where('report.doctor', $q);
        $this->db->join('patient', 'patient.id = report.patient', 'INNER');
        $this->db->join('users', 'users.id = report.doctor');
        $oth = $this->db->get('report');
        return $oth->result_array();
    }

    //function for getting prescription details
    public function get_appointment($q) {
        $this->db->select('appointment.*,users.name,users.dep_id,
           patient.name,patient.lname');
        $this->db->where('doctor', $q);
        $this->db->join('patient', 'patient.id = appointment.patient', 'INNER');
        $this->db->join('users', 'users.id = appointment.doctor');
        $query = $this->db->get('appointment');


        return $query->result_array();
    }

    public function get_appointment1($id) {
        $this->db->select('appointment.*,users.name,users.dep_id,
           patient.name,patient.lname');
        $this->db->where('appointment.id', $id);
        $this->db->join('patient', 'patient.id = appointment.patient', 'INNER');
        $this->db->join('users', 'users.id = appointment.doctor');
        $query = $this->db->get('appointment');


        return $query->result_array();
    }

    public function update_prescription() {


        $data = array(
            'casehistory' => $this->input->post('casehistory'),
            'medication' => $this->input->post('medication'),
            'medicationpharmacist' => $this->input->post('medicationpharmacist'),
            'description' => $this->input->post('description'),
        );

        $this->db->where('patientid', $this->input->post('id'));
        $this->db->update('prescription', $data);
    }

    public function get_bedallotment($id) {


        $this->db->where('bedallotment.id', $id);
        $this->db->where('bedallotment.discharge', 'no');
        $this->db->select('bedallotment.*,patient.name');
        $this->db->join('patient', 'patient.id = bedallotment.patient', 'INNER');
        $query = $this->db->get('bedallotment');

        return $query->result_array();
    }

    public function update_bedallotment() {


        $data = array(
            'bedno' => $this->input->post('bedno'),
            'patient' => $this->input->post('patient'),
            'allotmentdate' => $this->input->post('allotmentdate'),
            'dischargedate' => $this->input->post('dischargedate')
        );


        $this->db->where('id', $this->input->post('id'));
        $this->db->update('prescription', $data);
    }

    
    public function update_report($data) {


        $this->db->where('id', $this->input->post('id'));
        $this->db->update('report', $data);
    }
    
     public function get_patient($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('patient');
        return $query->result_array();
    }
    
    public function update_patient1($data) {


        $this->db->where('id', $this->input->post('id'));
        $this->db->update('patient', $data);
    }
}