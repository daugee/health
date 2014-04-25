<?php

class Nurse_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    function add_patient($data) {
        $insert = $this->db->insert('patient', $data);
        return $insert;
    }

    function add_patient1($data) {
        $insert = $this->db->insert('patient', $data);
        return $insert;
    }

    public function get_patient() {
        $this->db->where('disable !=', 'disable');
        $query = $this->db->get('patient');
        return $query->result_array();
    }

    //function for getting bed details
    public function get_bed() {
        $this->db->where('occupied !=', 'occupied');
        $query = $this->db->get('bed');
        return $query->result_array();
    }

    public function get_bed1($id) {
        $this->db->where('id', $id);
        
        $query = $this->db->get('bed');
        return $query->result_array();
    }

    // function for adding new beds
    function add_bed($data) {
        $insert = $this->db->insert('bed', $data);
        return $insert;
    }

    //function for getting bed allotment details
    public function get_bedallotment() {

        $this->db->select('bedallotment.*,patient.name,patient.lname,bed.bedtype');
        $this->db->where('bedallotment.discharge !=', 'yes');
       
        $this->db->join('patient', 'patient.id = bedallotment.patient', 'INNER');
        $this->db->join('bed', 'bed.bedno = bedallotment.bedno', 'INNER');
        $query = $this->db->get('bedallotment');
        return $query->result_array();
    }
    
    public function discharged_patient() {

        $this->db->select('bedallotment.*,patient.name,patient.lname,bed.bedtype');
        $this->db->where('bedallotment.discharge ', 'yes');
       
        $this->db->join('patient', 'patient.id = bedallotment.patient', 'INNER');
        $this->db->join('bed', 'bed.bedno = bedallotment.bedno', 'INNER');
        $query = $this->db->get('bedallotment');
        return $query->result_array();
    }

    //function for adding bed allotment
    public function add_bedallotment($data) {
        $data_to_store = array(
                        'occupied' => 'occupied',
                        
                    );
        $this->db->where('bedno', $this->input->post('bedno'));
        $this->db->update('bed',$data_to_store);
        $this->db->flush_cache();
        $insert = $this->db->insert('bedallotment', $data);
        return $insert;
    }

    //function for adding nurse report details
    public function add_nurse_report($data) {
        $insert = $this->db->insert('report', $data);
        return $insert;
    }

    //function for getting nurse report
    public function get_nurse_report_operation() {

         $this->db->select('report.*, patient.lname,users.dep_id, users.name');
        $this->db->where('report.type', 'operation');
        
        $this->db->join('patient', 'patient.id = report.patient', 'INNER');
        $this->db->join('users', 'users.id = report.doctor');
        $query = $this->db->get('report');
        return $query->result_array();
    }

    public function get_nurse_report_birth() {

        $this->db->select('report.*, patient.lname,users.dep_id, users.name');
        $this->db->where('report.type', 'birth');
        
        $this->db->join('patient', 'patient.id = report.patient', 'INNER');
        $this->db->join('users', 'users.id = report.doctor');
        $q = $this->db->get('report');
        return $q->result_array();
    }

    public function get_nurse_report_death() {

     $this->db->select('report.*, patient.lname,users.dep_id, users.name');
        $this->db->where('report.type', 'death');
        
        $this->db->join('patient', 'patient.id = report.patient', 'INNER');
        $this->db->join('users', 'users.id = report.doctor');
        $d = $this->db->get('report');
       
        return $d->result_array();
    }

    public function get_nurse_report_other() {

         $this->db->select('report.*, patient.lname,users.dep_id, users.name');
        $this->db->where('report.type', 'other');
       
        $this->db->join('patient', 'patient.id = report.patient', 'INNER');
        $this->db->join('users', 'users.id = report.doctor');
        $oth = $this->db->get('report');
        return $oth->result_array();
    }

    /*     * ********************************************************************************************************
      blood donors
     * ********************************************************************************************************** */

    public function add_donor($data) {
        $insert = $this->db->insert('blood_bank', $data);
        return $insert;
    }

    public function get_donors() {
        $query = $this->db->get('blood_bank');
        return $query->result_array();
    }

    public function ab1() {
        $this->db->where('bloodgroup', 'AB-');
        $this->db->from('blood_bank');
        $ab1 = $this->db->count_all_results();
        return $ab1;
    }

    public function a() {
        $this->db->where('bloodgroup', 'A+');
        $this->db->from('blood_bank');
        $a = $this->db->count_all_results();
        return $a;
    }

    public function a1() {
        $this->db->where('bloodgroup', 'A-');
        $this->db->from('blood_bank');
        $a1 = $this->db->count_all_results();
        return $a1;
    }

    public function b() {
        $this->db->where('bloodgroup', 'B+');
        $this->db->from('blood_bank');
        $b = $this->db->count_all_results();
        return $b;
    }

    public function b1() {
        $this->db->where('bloodgroup', 'B-');
        $this->db->from('blood_bank');
        $b1 = $this->db->count_all_results();
        return $b1;
    }

    public function ab() {
        $this->db->where('bloodgroup', 'AB+');
        $this->db->from('blood_bank');
        $ab = $this->db->count_all_results();
        return $ab;
    }

    public function o1() {
        $this->db->where('bloodgroup', 'O-');
        $this->db->from('blood_bank');
        $o1 = $this->db->count_all_results();
        return $o1;
    }

    public function o() {
        $this->db->where('bloodgroup', 'O+');
        $this->db->from('blood_bank');
        $o = $this->db->count_all_results();
        return $o;

        //print_r($data);
        //  return $data;
        //return $result[0]->blood_aggregate;
    }

    public function disharge($id,$bedno) {
        $data = array(
            'discharge' => 'yes',
        );

        
        $this->db->where('id', $id);
        $this->db->update('bedallotment', $data);
        $this->db->flush_cache();
        
         $data_to_store = array(
                        'occupied' => '',
                        
                    );
        $this->db->where('bedno', $bedno);
        $this->db->update('bed',$data_to_store);
        
        return TRUE;
    }

    //************************outpatient patients **************************//

    public function get_outpatient() {



        $this->db->select('patient.*, bedallotment.*');
        // $this->db->where('bedallotment.patient !=', 'patient.id');
        $this->db->join('bedallotment', 'bedallotment.patient != patient.id', 'LEFT');
        // $query = $this->db->get('bedallotment,patient');
        $query = $this->db->get('patient');
        return $query->result_array();
    }
    public function bed_edit($id){
        $data = array(
            'bedno' => $this->input->post('bedno'),
            'bedtype' => $this->input->post('bedtype'),
            'description' => $this->input->post('description'),
            
        );

        $this->db->where('id', $id);
        $this->db->update('bed', $data);
        return TRUE;
    }
    
    //=========================blood donors edit =========================//
    public function get_donors_edit($id) {

        $this->db->where('id', $id);
        
        $query = $this->db->get('blood_bank');
        return $query->result_array();

        return $query->result_array();
    }

    public function update_donors($data) {



        $this->db->where('id', $this->input->post('id'));
        $this->db->update('blood_bank', $data);
        return TRUE;
    }
    
    
    
    
}