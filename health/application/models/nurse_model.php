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

        $query = $this->db->get('patient');
        return $query->result_array();
    }

    //function for getting bed details
    public function get_bed() {
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
        $query = $this->db->get('bedallotment');
        return $query->result_array();
    }

    //function for adding bed allotment
    public function add_bedallotment($data) {
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

        $this->db->select('*');
        $this->db->from('report');
        $this->db->where('type', 'operation');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_nurse_report_birth() {

        $this->db->select('*');
        $this->db->from('report');
        $this->db->where('type', 'birth');
        $q = $this->db->get();
        return $q->result_array();
    }

    public function get_nurse_report_death() {

        $this->db->select('*');
        $this->db->from('report');
        $this->db->where('type', 'death');
        $d = $this->db->get();
        return $d->result_array();
    }

    public function get_nurse_report_other() {

        $this->db->select('*');
        $this->db->from('report');
        $this->db->where('type', 'other');
        $oth = $this->db->get();
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

}