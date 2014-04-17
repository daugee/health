<?php

class Admin_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // function for addding departments
    function add_department($data) {

        $query = $this->db->get_where('department', array('dep_name' => $this->input->post('departmentname')));
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            $insert = $this->db->insert('department', $data);
            return $insert;
        }
    }

    // function for getting departments
    public function get_department() {
        $this->db->where('disable !=', 'disable');
        $query = $this->db->get('department');

        return $query->result_array();
    }

    // function for getting medicine
    public function get_medicine() {
        $query = $this->db->get('medicine');
        return $query->result_array();
    }

    // function for addding doctors
    function add_doctor($data) {

        $query = $this->db->get_where('users', array('phone' => $this->input->post('phone'))) OR $this->db->get_where('users', array('email' => $this->input->post('email')));
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            $insert = $this->db->insert('users', $data);
            return $insert;
        }
    }

    // function for getting doctor
    public function get_doctor() {
        $this->db->select('users.name,users.id,users.disable,department.dep_name,
           department.dep_id');
        $this->db->where('type', 'doctor');
        $this->db->where('users.disable !=', 'disable');
        $this->db->join('department', 'department.dep_id = users.dep_id', 'INNER');

        $query = $this->db->get('users');


        return $query->result_array();
    }

    // function for addding nurses
    function add_nurse($data) {

        $query = $this->db->get_where('users', array('phone' => $this->input->post('phone'))) OR $this->db->get_where('users', array('email' => $this->input->post('email')));
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            $insert = $this->db->insert('users', $data);
            return $insert;
        }
    }

    // function for getting nurse
    public function get_nurse() {
        $this->db->select('*');
        $this->db->where('type', 'nurse');
        $this->db->where('disable !=', 'disable');
        $query = $this->db->get('users');


        return $query->result_array();
    }

    // function for addding pharmacist
    function add_pharmacist($data) {

        $query = $this->db->get_where('users', array('phone' => $this->input->post('phone'))) OR $this->db->get_where('users', array('email' => $this->input->post('email')));
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            $insert = $this->db->insert('users', $data);
            return $insert;
        }
    }

    // function for getting pharmacist
    public function get_pharmacist() {
        $this->db->select('*');
        $this->db->where('type', 'pharmacist');
         $this->db->where('disable !=', 'disable');
        $query = $this->db->get('users');


        return $query->result_array();
    }

    // function for addding laboratorist
    function add_laboratorist($data) {

        $query = $this->db->get_where('users', array('phone' => $this->input->post('phone'))) OR $this->db->get_where('users', array('email' => $this->input->post('email')));
        // ('email'=>  $this->input->post('email'))

        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            $insert = $this->db->insert('users', $data);
            return $insert;
        }
    }

    // function for getting laboratorist
    public function get_laboratorist() {
        $this->db->select('*');
        $this->db->where('type', 'lab');
        $this->db->where('disable !=', 'disable');
        $query = $this->db->get('users');


        return $query->result_array();
    }

    //function for getting prescription details
    public function get_appointment() {
        $this->db->select('appointment.*,users.name,users.dep_id,patient.lname');

        $this->db->join('patient', 'patient.id = appointment.patient', 'INNER');
        $this->db->join('users', 'users.id = appointment.doctor');
        $query = $this->db->get('appointment');


        return $query->result_array();
    }
    

    //=====================EDIT  for departments =====================================//

    public function get_department_edit($id) {
        $this->db->where('dep_id', $id);
        $this->db->where('disable !=', 'disable');
        $query = $this->db->get('department');
        return $query->result_array();
    }

    public function update_department($data) {



        $this->db->where('dep_id', $this->input->post('dep_id'));
        $this->db->update('department', $data);
        return TRUE;
    }

    public function delete_department($id) {




        $data = array(
            'disable' => 'disable',
        );
        $this->db->where('dep_id', $id);
        $insert = $this->db->update('department', $data);
        return $insert;
    }

    //=====================EDIT  for doctors =====================================//

    public function get_doctor_edit($id) {
        $this->db->select('users.*,department.dep_name,
           department.dep_id');
        $this->db->where('id', $id);
        $this->db->where('users.disable !=', 'disable');
        $this->db->join('department', 'department.dep_id = users.dep_id', 'INNER');

        $query = $this->db->get('users');


        return $query->result_array();
    }

    public function update_doctor($data) {



        $this->db->where('id', $this->input->post('id'));
        $this->db->update('users', $data);
        return TRUE;
    }

    public function delete_doctor($id) {




        $data = array(
            'disable' => 'disable',
        );
        $this->db->where('id', $id);
        $insert = $this->db->update('users', $data);
        return $insert;
    }

    //=========================== PATIENT UPDATE  DETAILS =======================//
    public function update_patient1($data) {


        $this->db->where('id', $this->input->post('id'));
        $this->db->update('patient', $data);
        return TRUE;
    }

    public function delete_patient($id) {




        $data = array(
            'disable' => 'disable',
        );
        $this->db->where('id', $id);
        $this->db->update('patient', $data);
        return TRUE;
    }

    //========================FUNCTION FOR UPDATING NURSE DETAILS ===========================//
    public function get_nurse_edit($id) {

        $this->db->where('id', $id);
        $this->db->where('users.disable !=', 'disable');
        $query = $this->db->get('users');


        return $query->result_array();
    }

    public function update_nurse($data) {



        $this->db->where('id', $this->input->post('id'));
        $this->db->update('users', $data);
        return TRUE;
    }

    public function delete_nurse($id) {




        $data = array(
            'disable' => 'disable',
        );
        $this->db->where('id', $id);
        $insert = $this->db->update('users', $data);
        return $insert;
    }

    //========================FUNCTION FOR UPDATING PHARMACIST DETAILS ===========================//
    public function get_pharmacist_edit($id) {

        $this->db->where('id', $id);
        $this->db->where('users.disable !=', 'disable');
        $query = $this->db->get('users');


        return $query->result_array();
    }

    public function update_pharmacist($data) {



        $this->db->where('id', $this->input->post('id'));
        $this->db->update('users', $data);
        return TRUE;
    }

    public function delete_pharmacist($id) {




        $data = array(
            'disable' => 'disable',
        );
        $this->db->where('id', $id);
        $insert = $this->db->update('users', $data);
        return $insert;
    }
    
     //========================FUNCTION FOR UPDATING LABORATORIST DETAILS ===========================//
    public function get_laboratorist_edit($id) {

        $this->db->where('id', $id);
        $this->db->where('users.disable !=', 'disable');
        $query = $this->db->get('users');


        return $query->result_array();
    }

    public function update_laboratorist($data) {



        $this->db->where('id', $this->input->post('id'));
        $this->db->update('users', $data);
        return TRUE;
    }

    public function delete_laboratorist($id) {




        $data = array(
            'disable' => 'disable',
        );
        $this->db->where('id', $id);
        $insert = $this->db->update('users', $data);
        return $insert;
    }

    
}