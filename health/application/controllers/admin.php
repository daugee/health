<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->model('admin_model');
    }

    public function index() {
        $this->load->view('admin/index');
    }

    public function department() {

        $data['results'] = $this->admin_model->get_department();
        $this->load->view('admin/department', $data);
    }

    public function doctor() {
        $data['query'] = $this->admin_model->get_doctor();
        $data['results'] = $this->admin_model->get_department();
        $this->load->view('admin/doctor', $data);
    }

    /* #######FUNCTION FOR NURSE######## */

    public function nurse() {
        $data['query'] = $this->admin_model->get_nurse();
        $this->load->view('admin/nurse', $data);
    }

    /* #######FUNCTION FOR ADMIN PROFILE######## */

    public function admin_profile() {
        $this->load->view('admin/profile');
    }

    /* #######FUNCTION FOR PHARMACIST######## */

    public function pharmacist() {
        $data['query'] = $this->admin_model->get_pharmacist();
        $this->load->view('admin/pharmacist', $data);
    }

    /* #######FUNCTION FOR LABORATORIST######## */

    public function laboratorist() {
         $data['query'] = $this->admin_model->get_laboratorist();
        $this->load->view('admin/laboratorist',$data);
    }

    /* #######FUNCTION FOR HOSPITAL MANAGEMENT######## */

    public function view_appointment() {
        $data['query'] = $this->admin_model->get_appointment();
        $this->load->view('admin/hospital/appointment',$data);
    }

    public function view_bed_status() {
        $this->load->model('nurse_model');
        $data['query'] = $this->nurse_model->get_bed();
        $data['allotment'] = $this->nurse_model->get_bedallotment();
        $this->load->view('admin/hospital/bed', $data);
    }

    /*     * *****************view medicine********************************** */

    public function view_medicine() {
        $this->load->model('pharmacy_model');
        $data['query'] = $this->pharmacy_model->get_medicine();
        $this->load->view('admin/hospital/medicine',$data);
    }

    /*     * *****************Report Module********************************** */

    public function view_reports() {
        $this->load->model('nurse_model');
        $data['query'] = $this->nurse_model->get_nurse_report_operation();
        $data['q'] = $this->nurse_model->get_nurse_report_birth();
        $data['d'] = $this->nurse_model->get_nurse_report_death();
        $data['oth'] = $this->nurse_model->get_nurse_report_other();
        $this->load->view('admin/hospital/report', $data);
    }

    /*     * *****************blood bank********************************** */

    public function view_blood_bank() {
        $this->load->model('nurse_model');
        $data['a'] = $this->nurse_model->a();
        $data['a1'] = $this->nurse_model->a1();
        $data['b'] = $this->nurse_model->b();
        $data['b1'] = $this->nurse_model->b1();
        $data['ab'] = $this->nurse_model->ab();
        $data['ab1'] = $this->nurse_model->ab1();
        $data['o'] = $this->nurse_model->o();
        $data['o1'] = $this->nurse_model->o1();
        $data['query'] = $this->nurse_model->get_donors();
        $this->load->view('admin/hospital/blood_bank', $data);
    }

    /* #######FUNCTION FOR PATIENT######## */

    public function patient() {
        $this->load->model('nurse_model');
        $data['query'] = $this->nurse_model->get_patient();
        $this->load->view('admin/patient', $data);
    }

    /* ################## FUNCTION FOR ADDING A PATIENT########################### */

    public function add_patient() {
  $this->load->model('nurse_model');
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            //form validation
            $this->form_validation->set_rules('fname', 'fname', 'required');
            $this->form_validation->set_rules('lname', 'lname', 'required');
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('address', 'address', 'trim');
            $this->form_validation->set_rules('city', 'city', 'trim');
            $this->form_validation->set_rules('pcode', 'pcode', 'trim|numeric');
            $this->form_validation->set_rules('country', 'country', 'trim');
            $this->form_validation->set_rules('weight', 'weight', 'required');
            $this->form_validation->set_rules('height', 'height', 'required');
            $this->form_validation->set_rules('temperature', 'temperature', 'required');
            $this->form_validation->set_rules('history', 'history', 'trim');
            $this->form_validation->set_rules('phone', 'phone', 'trim|required');
            $this->form_validation->set_rules('gender', 'gender', 'required');
            $this->form_validation->set_rules('birthdate', 'birthdate', 'required');
            $this->form_validation->set_rules('age', 'age', 'required|numeric');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if ($this->form_validation->run() == FALSE) {
               $data['query'] = $this->nurse_model->get_patient();
                $this->load->view('admin/patient',$data);
            }
            //if the form has passed through the validation
            if ($this->form_validation->run()) {


                $config['upload_path'] = './img/projo/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '1000';
                $config['max_width'] = '1024';
                $config['max_height'] = '768';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('admin/patient', $error );

                   
                } else {

                    $data = $this->upload->data();

                    $q = $data['file_name'];





                    $data_to_store = array(
                        'sex' => $this->input->post('gender'),
                        'name' => $this->input->post('fname'),
                        'lname' => $this->input->post('lname'),
                        'email' => $this->input->post('email'),
                        'password' => $this->input->post('password'),
                        'address' => $this->input->post('address'),
                        'phone' => $this->input->post('phone'),
                        'birthdate' => $this->input->post('birthdate'),
                        'age' => $this->input->post('age'),
                        'bloodgroup' => $this->input->post('bloodgroup'),
                        'city' => $this->input->post('city'),
                        'pcode' => $this->input->post('pcode'),
                        'country' => $this->input->post('country'),
                        'weight' => $this->input->post('weight'),
                        'height' => $this->input->post('height'),
                        'temperature' => $this->input->post('temperature'),
                        'history' => $this->input->post('history'),
                        'image' => $q
                    );


                    //if the insert has returned true then we show the flash message
                    if ($this->nurse_model->add_patient1($data_to_store)) {
                        $data['flash_message'] = TRUE;
                        $data['query'] = $this->nurse_model->get_patient();
                        $this->load->view('admin/patient', $data);
                    } else {
                        $data['flash_message'] = FALSE;
                        $data['query'] = $this->nurse_model->get_patient();
                      $this->load->view('admin/patient',$data);
                    }
                }
            }
        }
    }
//************department addition **********************///

    public function add_department() {



        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            //form validation
            $this->form_validation->set_rules('departmentname', 'department name', 'required');
            $this->form_validation->set_rules('description', 'description', 'required|trim');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if ($this->form_validation->run() == FALSE) {
                $data['results'] = $this->admin_model->get_department();
                $this->load->view('admin/department', $data);
            }
            //if the form has passed through the validation
            if ($this->form_validation->run()) {


                $data_to_store = array(
                    'dep_name' => $this->input->post('departmentname'),
                    'description' => $this->input->post('description'),
                );


                //if the insert has returned true then we show the flash message
                if ($this->admin_model->add_department($data_to_store)) {
                    $data['flash_message'] = TRUE;
                    $data['query'] = TRUE;
                    $data['results'] = $this->admin_model->get_department();
                    $this->load->view('admin/department', $data);
                } else {

                    $data['flash_message'] = FALSE;
                    $data['query'] = $this->input->post('departmentname');
                    $data['results'] = $this->admin_model->get_department();
                    $this->load->view('admin/department', $data);
                }
            }
        }
    }

    //****************function for adding doctors**************//
    public function add_doctor() {

        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            //form validation
            $this->form_validation->set_rules('docsname', 'doctors name', 'required');
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('address', 'address', 'trim');
            $this->form_validation->set_rules('phone', 'phone', 'trim|required');
            $this->form_validation->set_rules('profile', 'profile', 'required|trim');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if ($this->form_validation->run() == FALSE) {
                $data['results'] = $this->admin_model->get_department();
                $data['query'] = $this->admin_model->get_doctor();
                $this->load->view('admin/doctor', $data);
            }
            //if the form has passed through the validation
            if ($this->form_validation->run()) {


                $data_to_store = array(
                    'name' => $this->input->post('docsname'),
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone'),
                    'profile' => $this->input->post('profile'),
                    'dep_id' => $this->input->post('department'),
                    'type' => 'doctor'
                );


                //if the insert has returned true then we show the flash message
                if ($this->admin_model->add_doctor($data_to_store)) {
                    $data['flash_message'] = TRUE;
                    $data['query'] = $this->admin_model->get_doctor();
                    $data['results'] = $this->admin_model->get_department();
                    $this->load->view('admin/doctor', $data);
                } else {

                    $data['flash_message'] = FALSE;
                    $data['query'] = $this->admin_model->get_doctor();
                    $data['results'] = $this->admin_model->get_department();
                    $this->load->view('admin/doctor', $data);
                }
            }
        }
    }

    //****************function for adding doctors**************//
    public function add_nurse() {



        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            //form validation
            $this->form_validation->set_rules('nursename', 'nurse name', 'required');
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('address', 'address', 'trim');
            $this->form_validation->set_rules('phone', 'phone', 'trim|required');
            $this->form_validation->set_rules('profile', 'profile', 'required|trim');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if ($this->form_validation->run() == FALSE) {

                $data['query'] = $this->admin_model->get_nurse();
                $this->load->view('admin/nurse', $data);
            }
            //if the form has passed through the validation
            if ($this->form_validation->run()) {


                $data_to_store = array(
                    'name' => $this->input->post('nursename'),
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone'),
                    'profile' => $this->input->post('profile'),
                    'type' => 'nurse'
                );


                //if the insert has returned true then we show the flash message
                if ($this->admin_model->add_nurse($data_to_store)) {
                    $data['flash_message'] = TRUE;

                    $data['query'] = $this->admin_model->get_nurse();
                    $this->load->view('admin/nurse', $data);
                } else {

                    $data['flash_message'] = FALSE;

                    $data['query'] = $this->admin_model->get_nurse();
                    $this->load->view('admin/nurse', $data);
                }
            }
        }
    }

    //****************function for adding doctors**************//
    public function add_pharmacist() {



        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            //form validation
            $this->form_validation->set_rules('pharmacistname', 'pharmacist name', 'required');
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('address', 'address', 'trim');
            $this->form_validation->set_rules('phone', 'phone', 'trim|required');
            $this->form_validation->set_rules('profile', 'profile', 'required|trim');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if ($this->form_validation->run() == FALSE) {

                $data['query'] = $this->admin_model->get_pharmacist();
                $this->load->view('admin/pharmacist', $data);
            }
            //if the form has passed through the validation
            if ($this->form_validation->run()) {


                $data_to_store = array(
                    'name' => $this->input->post('pharmacistname'),
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone'),
                    'profile' => $this->input->post('profile'),
                    'type' => 'pharmacist'
                );


                //if the insert has returned true then we show the flash message
                if ($this->admin_model->add_pharmacist($data_to_store)) {
                    $data['flash_message'] = TRUE;

                    $data['query'] = $this->admin_model->get_pharmacist();
                    $this->load->view('admin/pharmacist', $data);
                } else {

                    $data['flash_message'] = FALSE;

                    $data['query'] = $this->admin_model->get_pharmacist();
                    $this->load->view('admin/pharmacist', $data);
                }
            }
        }
    }

    
     //****************function for adding laboratorist**************//
    public function add_laboratorist() {



        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            //form validation
            $this->form_validation->set_rules('laboratoristname', 'laboratorist name', 'required');
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('address', 'address', 'trim');
            $this->form_validation->set_rules('phone', 'phone', 'trim|required');
            $this->form_validation->set_rules('profile', 'profile', 'required|trim');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if ($this->form_validation->run() == FALSE) {

                $data['query'] = $this->admin_model->get_laboratorist();
                $this->load->view('admin/laboratorist', $data);
            }
            //if the form has passed through the validation
            if ($this->form_validation->run()) {


                $data_to_store = array(
                    'name' => $this->input->post('laboratoristname'),
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone'),
                    'profile' => $this->input->post('profile'),
                    'type' => 'lab'
                );


                //if the insert has returned true then we show the flash message
                if ($this->admin_model->add_laboratorist($data_to_store)) {
                    $data['flash_message'] = TRUE;

                    $data['query'] = $this->admin_model->get_laboratorist();
                    $this->load->view('admin/laboratorist', $data);
                } else {

                    $data['flash_message'] = FALSE;

                    $data['query'] = $this->admin_model->get_laboratorist();
                    $this->load->view('admin/laboratorist', $data);
                }
            }
        }
    }


}

