<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pharmacy extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('pharmacy_model');
        $this->load->library('pagination');
    }

    public function login() {
        if ($this->session->userdata('logged_in') == TRUE) {
            $this->load->view('pharmacy/index');
        }
        if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function medicine_category() {
        if ($this->session->userdata('logged_in') == TRUE) {
            $data['results'] = $this->pharmacy_model->get_medicine_category();
            $this->load->view('pharmacy/medicine_category', $data);
        }
        if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    //*****************public function for adding medicine category ************?/



    public function add_medicine_category() {
        if ($this->session->userdata('logged_in') == TRUE) {
            //if save button was clicked, get the data sent via post
            if ($this->input->server('REQUEST_METHOD') === 'POST') {

                //form validation
                $this->form_validation->set_rules('medicinecategory', 'medicine category name', 'required');
                $this->form_validation->set_rules('description', 'description', 'required|trim');
                $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

                if ($this->form_validation->run() == FALSE) {
                    $data['results'] = $this->pharmacy_model->get_medicine_category();
                    $this->load->view('pharamcy/medicine_category', $data);
                }
                //if the form has passed through the validation
                if ($this->form_validation->run()) {


                    $data_to_store = array(
                        'med_cat_name' => $this->input->post('medicinecategory'),
                        'med_cat_description' => $this->input->post('description'),
                    );


                    //if the insert has returned true then we show the flash message
                    if ($this->pharmacy_model->add_medicine_category($data_to_store)) {
                        $data['flash_message'] = TRUE;
                        $data['query'] = TRUE;
                        $data['results'] = $this->pharmacy_model->get_medicine_category();
                        $this->load->view('pharmacy/medicine_category', $data);
                    } else {

                        $data['flash_message'] = FALSE;
                        $data['query'] = $this->input->post('medicinecategory');
                        $data['results'] = $this->pharmacy_model->get_medicine_category();
                        $this->load->view('pharmacy/medicine_category', $data);
                    }
                }
            }
        }
        if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function manage_medicine() {
        if ($this->session->userdata('logged_in') == TRUE) {
            $data['query'] = $this->pharmacy_model->get_medicine();
            $data['results'] = $this->pharmacy_model->get_medicine_category();
            $this->load->view('pharmacy/manage_medicine', $data);
        }
        if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    //*****************public function for adding medicine ************?/

    public function add_medicine() {
        if ($this->session->userdata('logged_in') == TRUE) {
            //if save button was clicked, get the data sent via post
            if ($this->input->server('REQUEST_METHOD') === 'POST') {

                //form validation
                $this->form_validation->set_rules('name', 'medicine name', 'required');
                $this->form_validation->set_rules('price', 'price', 'required');
                $this->form_validation->set_rules('mancompany', 'manufacturing company name', 'required');
                $this->form_validation->set_rules('status', 'status', 'required');
                $this->form_validation->set_rules('description', 'description', 'required|trim');
                $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

                if ($this->form_validation->run() == FALSE) {

                    $data['query'] = $this->pharmacy_model->get_medicine();
                    $data['results'] = $this->pharmacy_model->get_medicine_category();
                    $this->load->view('pharmacy/manage_medicine', $data);
                }
                //if the form has passed through the validation
                if ($this->form_validation->run()) {


                    $data_to_store = array(
                        'med_name' => $this->input->post('name'),
                        'med_price' => $this->input->post('price'),
                        'med_man_company' => $this->input->post('mancompany'),
                        'med_cat_id' => $this->input->post('medcategory'),
                        'med_status' => $this->input->post('status'),
                        'med_description' => $this->input->post('description'),
                    );


                    //if the insert has returned true then we show the flash message
                    if ($this->pharmacy_model->add_medicine($data_to_store)) {
                        $data['flash_message'] = TRUE;
                        $data['results'] = $this->pharmacy_model->get_medicine_category();
                        $data['query'] = $this->pharmacy_model->get_medicine();
                        $this->load->view('pharmacy/manage_medicine', $data);
                    } else {

                        $data['flash_message'] = FALSE;
                        $data['query'] = $this->pharmacy_model->get_medicine();
                        $data['results'] = $this->pharmacy_model->get_medicine_category();
                        $this->load->view('pharmacy/manage_medicine', $data);
                    }
                }
            }
        }
        if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function prescription() {
        if ($this->session->userdata('logged_in') == TRUE) {
            $data['query'] = $this->pharmacy_model->get_prescription1();
            $this->load->view('pharmacy/prescription', $data);
        }
        if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function pharmacist_profile() {
        if ($this->session->userdata('logged_in') == TRUE) {
            $this->load->view('pharmacy/pharmacist_profile');
        }
        if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function edit_prescription($id) {
        if ($this->session->userdata('logged_in') == TRUE) {

            $data['query'] = $this->pharmacy_model->get_prescription($id);

            $data['query'] = $this->pharmacy_model->get_prescription1();
            $this->load->view('pharmacy/edit_prescription', $data);
        }
        if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function update_prescription($id) {
        if ($this->session->userdata('logged_in') == TRUE) {
            //if save button was clicked, get the data sent via post
            if ($this->input->server('REQUEST_METHOD') === 'POST') {

                //form validation
                $this->form_validation->set_rules('medicationpharmacist', 'medication from pharmacist', 'required');
                $this->form_validation->set_rules('description', 'description', 'required|trim');
                $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

                if ($this->form_validation->run() == FALSE) {

                    $data['query'] = $this->pharmacy_model->get_prescription($id);
                    $this->load->view('pharmacy/edit_prescription', $data);
                }
                //if the form has passed through the validation
                if ($this->form_validation->run()) {

                    if ($this->pharmacy_model->update_prescription()) {
                        $data['flash_msg'] = TRUE;
                        $data['query'] = $this->pharmacy_model->get_prescription1();
                        $this->load->view('pharmacy/prescription', $data);
                    } else {

                        $data['flash_message'] = FALSE;
                        $data['query'] = $this->pharmacy_model->get_prescription($id);
                        $this->load->view('pharmacy/edit_prescription', $data);
                    }
                }
            }
        }
        if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    //==============================edit medicine category =========================//
    public function medicine_category_update($id) {



        if ($this->session->userdata('logged_in') == TRUE) {

            $data['query'] = $this->pharmacy_model->get_medicine_category_edit($id);
            $data['results'] = $this->pharmacy_model->get_medicine_category();
            $this->load->view('pharmacy/edit/edit_medicine_category', $data);
        }
        if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function edit_medicine_category($id) {
        if ($this->session->userdata('logged_in') == TRUE) {
            //if save button was clicked, get the data sent via post
            if ($this->input->server('REQUEST_METHOD') === 'POST') {

                //form validation
                $this->form_validation->set_rules('medicinecategory', 'medicine category name', 'required');
                $this->form_validation->set_rules('description', 'description', 'required|trim');
                $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

                if ($this->form_validation->run() == FALSE) {
                    $data['query'] = $this->pharmacy_model->get_medicineCategory_edit($id);
                    $data['results'] = $this->pharmacy_model->get_medicine_category();
                    $this->load->view('pharmacy/edit/edit_medicine_category', $data);
                }
                //if the form has passed through the validation
                if ($this->form_validation->run()) {


                    $data_to_store = array(
                        'med_cat_name' => $this->input->post('medicinecategory'),
                        'med_cat_description' => $this->input->post('description'),
                    );


                    //if the insert has returned true then we show the flash message
                    if ($this->pharmacy_model->update_medicine_category($data_to_store)) {
                        $data['flash_msg'] = TRUE;
                        $data['query'] = TRUE;
                        $data['results'] = $this->pharmacy_model->get_medicine_category();
                        $this->load->view('pharmacy/medicine_category', $data);
                    } else {

                        $data['flash_message'] = FALSE;
                        //$data['query'] = $this->input->post('medicinecategory');
                        $data['query'] = $this->pharmacy_model->get_medicineCategory_edit($id);
                        $data['results'] = $this->pharmacy_model->get_medicine_category();
                        $this->load->view('pharmacy/edit/edit_medicine_category', $data);
                    }
                }
            }
        }
        if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function medicine_update($id) {



        if ($this->session->userdata('logged_in') == TRUE) {

            $data['query'] = $this->pharmacy_model->get_medicine_edit($id);
            $data['results'] = $this->pharmacy_model->get_medicine_category();
            $data['fun'] = $this->pharmacy_model->get_medicine();


            $this->load->view('pharmacy/edit/edit_medicine', $data);
        }
        if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function edit_medicine($id) {
        if ($this->session->userdata('logged_in') == TRUE) {
            //if save button was clicked, get the data sent via post
            if ($this->input->server('REQUEST_METHOD') === 'POST') {

                //form validation
                $this->form_validation->set_rules('name', 'medicine name', 'required');
                $this->form_validation->set_rules('price', 'price', 'required');
                $this->form_validation->set_rules('mancompany', 'manufacturing company name', 'required');
                $this->form_validation->set_rules('status', 'status', 'required');
                $this->form_validation->set_rules('description', 'description', 'required|trim');
                $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

                if ($this->form_validation->run() == FALSE) {

                    $$data['query'] = $this->pharmacy_model->get_medicine_edit($id);
                    $data['results'] = $this->pharmacy_model->get_medicine_category();
                    $data['fun'] = $this->pharmacy_model->get_medicine();
                }
                //if the form has passed through the validation
                if ($this->form_validation->run()) {


                    $data_to_store = array(
                        'med_name' => $this->input->post('name'),
                        'med_price' => $this->input->post('price'),
                        'med_man_company' => $this->input->post('mancompany'),
                        'med_cat_id' => $this->input->post('medcategory'),
                        'med_status' => $this->input->post('status'),
                        'med_description' => $this->input->post('description'),
                    );


                    //if the insert has returned true then we show the flash message
                    if ($this->pharmacy_model->update_medicine($data_to_store)) {
                        $data['flash_msg'] = TRUE;
                        $data['results'] = $this->pharmacy_model->get_medicine_category();
                        $data['query'] = $this->pharmacy_model->get_medicine();
                        $this->load->view('pharmacy/manage_medicine', $data);
                    } else {

                        $data['flash_message'] = FALSE;
                        $$data['query'] = $this->pharmacy_model->get_medicine_edit($id);
                        $data['results'] = $this->pharmacy_model->get_medicine_category();
                        $data['fun'] = $this->pharmacy_model->get_medicine();
                    }
                }
            }
        }
        if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    
    public function patient_profile($id) {
 $this->load->model('doctor_model');
 $this->load->model('patient_model');
        if ($this->session->userdata('logged_in') == TRUE) {
                        
            $data['query'] = $this->doctor_model->get_patient($id);
             $data['allotment'] = $this->patient_model->admit_history($id);
              $data['query1'] = $this->patient_model->get_prescription1($id);
              $data['query2'] = $this->patient_model->get_appointment($id);
               $data['reports'] = $this->patient_model->get_report($id);

            
            $this->load->view('pharmacy/patient_profile',$data);
        }
        if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }
    
       public function view_prescription($id) {
 $this->load->model('doctor_model');
 $this->load->model('patient_model');


        if ($this->session->userdata('logged_in') == TRUE) {
            $data['query'] = $this->doctor_model->get_patient($id);
             $data['allotment'] = $this->patient_model->admit_history($id);
              $data['query1'] = $this->patient_model->get_prescription1($id);
              $data['query2'] = $this->patient_model->get_appointment($id);
               $data['reports'] = $this->patient_model->get_report($id);

            $this->load->view('pharmacy/patient/view_prescription', $data);
        }
        if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }
}