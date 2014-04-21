<?php

class Pharmacy_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    //**************  function for adding medicine category *******************//

    function add_medicine_category($data) {

        $query = $this->db->get_where('medicine_category', array('med_cat_name' => $this->input->post('medicinecategory')));
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            $insert = $this->db->insert('medicine_category', $data);
            return $insert;
        }
    }

    // function for getting medicine cat8uegory
    public function get_medicine_category() {
        $query = $this->db->get('medicine_category');
        return $query->result_array();
    }

    //**************  function for adding medicine *******************//

    function add_medicine($data) {

        $query = $this->db->get_where('medicine', array('med_name' => $this->input->post('name')));
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            $insert = $this->db->insert('medicine', $data);
            return $insert;
        }
    }

    // function for getting medicine
    public function get_medicine() {
        $this->db->select('medicine.*,medicine_category.med_cat_id,medicine_category.med_cat_name');

        $this->db->join('medicine_category', 'medicine_category.med_cat_id = medicine.med_cat_id', 'INNER');

        $query = $this->db->get('medicine');


        return $query->result_array();
    }

    //*************function for getting prescription data**********//
    //function for getting prescription details
    public function get_prescription($id) {
        $this->db->select('prescription.*, users.dep_id,users.id,users.name,patient.lname, patient.id');
        $this->db->where('prescription.id', $id);
        $this->db->join('patient', 'patient.id = prescription.patientid', 'INNER');
        $this->db->join('users', 'users.id = prescription.doctorid');
        $query = $this->db->get('prescription');


        return $query->result_array();
    }

    //function for updating prescription details
    public function update_prescription() {


        $data = array(
            'medicationpharmacist' => $this->input->post('medicationpharmacist'),
            'description' => $this->input->post('description'),
        );

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('prescription', $data);
        return TRUE;
    }

//=========================Get medicine category =========================//
    public function get_medicine_category_edit($id) {

        $this->db->where('med_cat_id', $id);
        // $this->db->where('users.disable !=', 'disable');
        $query = $this->db->get('medicine_category');


        return $query->result_array();
    }

    public function update_medicine_category($data) {



        $this->db->where('med_cat_id', $this->input->post('id'));
        $this->db->update('medicine_category', $data);
        return TRUE;
    }

    public function get_medicine_edit($id) {

        $this->db->where('med_id', $id);
        // $this->db->where('users.disable !=', 'disable');
        $query = $this->db->get('medicine');


        return $query->result_array();
    }

    public function update_medicine($data) {



        $this->db->where('med_id', $this->input->post('id'));
        $this->db->update('medicine', $data);
        return TRUE;
    }

    public function get_prescription1() {
        $this->db->select('prescription.*,users.name,users.dep_id,patient.lname');
        $this->db->join('patient', 'patient.id = prescription.patientid', 'INNER');
        $this->db->join('users', 'users.id = prescription.doctorid');
        $query = $this->db->get('prescription');




        return $query->result_array();
    }

}
