<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Doctor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->model('doctor_model');
    }

    public function index() {
        if ($this->session->userdata('is_logged_in') == TRUE) {

            $this->load->model('nurse_model');
            $data['name'] = $this->session->userdata('name');
            $data['query'] = $this->nurse_model->get_patient();
            $this->load->view('doctor/index', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function new_patient() {
        if ($this->session->userdata('is_logged_in') == TRUE) {
            $data['name'] = $this->session->userdata('name');
            $this->load->view('doctor/Registration', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function patient_list() {
        if ($this->session->userdata('is_logged_in') == TRUE) {
            $this->load->model('nurse_model');
            $data['name'] = $this->session->userdata('name');
            $data['query'] = $this->nurse_model->get_patient();
            $this->load->view('doctor/patient_list', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function appointment() {
        $q = $this->session->userdata('id');


        $this->load->model('nurse_model');
        if ($this->session->userdata('is_logged_in') == TRUE) {
            $data['appointment'] = $this->doctor_model->get_appointment_date();
            $data['query'] = $this->doctor_model->get_appointment($q);
            $data['result'] = $this->nurse_model->get_patient();
            $data['doctor'] = $this->doctor_model->get_doctor();
            $data['name'] = $this->session->userdata('name');
            $this->load->view('doctor/manage_appointment', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function report() {
        $q = $this->session->userdata('id');
        $this->load->model('nurse_model');
        if ($this->session->userdata('is_logged_in') == TRUE) {

            $data['result'] = $this->nurse_model->get_patient();
            $data['doctor'] = $this->doctor_model->get_doctor();
            $data['query'] = $this->doctor_model->get_report_operation($q);
            $data['q'] = $this->doctor_model->get_report_birth($q);
            $data['d'] = $this->doctor_model->get_report_death($q);
            $data['oth'] = $this->doctor_model->get_report_other($q);
            $data['name'] = $this->session->userdata('name');
            $this->load->view('doctor/report', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function edit_report($id) {



        if ($this->session->userdata('is_logged_in') == TRUE) {


            $data['query'] = $this->doctor_model->get_report($id);
            $data['name'] = $this->session->userdata('name');
            $this->load->view('doctor/edit/edit_report', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    /* #####################PRESCRIPTION FUNCTIONS######################## */

    public function prescription() {
        $q = $this->session->userdata('id');

        if ($this->session->userdata('is_logged_in') == TRUE) {
            $this->load->model('nurse_model');
            $data['query'] = $this->doctor_model->get_prescription($q);

            $data['result'] = $this->nurse_model->get_patient();

            $data['name'] = $this->session->userdata('name');
            $this->load->view('doctor/manage_prescription', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    /* #######################bed allotment################# */

    public function bed_allotment() {
        $this->load->model('nurse_model');
        if ($this->session->userdata('is_logged_in') == TRUE) {

            $data['allotment'] = $this->nurse_model->get_bedallotment();
            $data['query'] = $this->nurse_model->get_bed();
            $data['result'] = $this->nurse_model->get_patient();
            $this->load->view('doctor/bed_allotment', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    /* #######################bed bank################# */

    public function blood_bank() {
        if ($this->session->userdata('is_logged_in') == TRUE) {
            $this->load->model('nurse_model');
            $data['query'] = $this->nurse_model->get_donors();
            $data['a'] = $this->nurse_model->a();
            $data['a1'] = $this->nurse_model->a1();
            $data['b'] = $this->nurse_model->b();
            $data['b1'] = $this->nurse_model->b1();
            $data['ab'] = $this->nurse_model->ab();
            $data['ab1'] = $this->nurse_model->ab1();
            $data['o'] = $this->nurse_model->o();
            $data['o1'] = $this->nurse_model->o1();

            $this->load->view('doctor/manage_blood_bank', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function add() {
        $this->load->model('nurse_model');
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            //form validation
            $this->form_validation->set_rules('patientname', 'patientname', 'required');

            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('address', 'address', 'trim');
            $this->form_validation->set_rules('phone', 'phone', 'trim|required');
            $this->form_validation->set_rules('gender', 'gender', 'required');
            $this->form_validation->set_rules('birthdate', 'birthdate', 'required');
            $this->form_validation->set_rules('age', 'age', 'required|numeric');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('doctor/new_patient');
            }
            //if the form has passed through the validation
            if ($this->form_validation->run()) {
                if ($this->session->userdata('is_logged_in') == TRUE) {
                    if ($this->input->post('gender') == 0) {
                        $data_to_store = array(
                            'sex' => 'male',
                            'name' => $this->input->post('patientname'),
                            'email' => $this->input->post('email'),
                            'password' => $this->input->post('password'),
                            'address' => $this->input->post('address'),
                            'phone' => $this->input->post('phone'),
                            'birthdate' => $this->input->post('birthdate'),
                            'age' => $this->input->post('age'),
                            'bloodgroup' => $this->input->post('bloodgroup')
                        );
                    } else if ($this->input->post('gender') == 1) {
                        $data_to_store = array(
                            'name' => $this->input->post('patientname'),
                            'email' => $this->input->post('email'),
                            'password' => $this->input->post('password'),
                            'address' => $this->input->post('address'),
                            'phone' => $this->input->post('phone'),
                            'birthdate' => $this->input->post('birthdate'),
                            'age' => $this->input->post('age'),
                            'sex' => 'female',
                            'bloodgroup' => $this->input->post('bloodgroup')
                        );
                    }

                    //if the insert has returned true then we show the flash message
                    if ($this->nurse_model->add_patient($data_to_store)) {
                        $data['flash_message'] = TRUE;
                        redirect('doctor/patient_list', $data);
                    } else {
                        $data['flash_message'] = FALSE;
                        redirect('doctor/patient_list', $data);
                    }
                }
                if ($this->session->userdata('is_logged_in') == FALSE) {
                    $data['error'] = 'login details are wrong';
                    $this->load->view('welcome_message', $data);
                }
            }
        }
    }

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
                $this->load->view('doctor/Registration');
            }
            //if the form has passed through the validation
            if ($this->form_validation->run()) {
                if ($this->session->userdata('is_logged_in') == TRUE) {


                    $config['upload_path'] = './img/projo/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = '1000';
                    $config['max_width'] = '1024';
                    $config['max_height'] = '768';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('image')) {
                        $error = array('error' => $this->upload->display_errors());


                        $this->load->view('doctor/Registration', $error);
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
                            redirect('doctor/patient_list', $data);
                        } else {
                            $data['flash_message'] = FALSE;
                            redirect('doctor/patient_list', $data);
                        }
                    }
                }
                if ($this->session->userdata('is_logged_in') == FALSE) {
                    $data['error'] = 'login details are wrong';
                    $this->load->view('welcome_message', $data);
                }
            }
        }
    }

    //*********************************** edit patient *************************************************//

    public function edit_hospital_patient($id) {



        if ($this->session->userdata('is_logged_in') == TRUE) {


            $this->load->model('nurse_model');
            $data['name'] = $this->session->userdata('name');
            $data['query'] = $this->doctor_model->get_patient($id);

            $this->load->view('doctor/edit/edit_patient', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function edit_patient() {
        $this->load->model('nurse_model');
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            //form validation
            $this->form_validation->set_rules('fname', 'fname', 'required');
            $this->form_validation->set_rules('lname', 'lname', 'required');
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
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
                $id = $this->input->upost('id');
                $this->load->model('nurse_model');
                $data['name'] = $this->session->userdata('name');
                $data['query'] = $this->doctor_model->get_patient($id);

                $this->load->view('doctor/edit/edit_patient', $data);
            }
            //if the form has passed through the validation
            if ($this->form_validation->run()) {
                if ($this->session->userdata('is_logged_in') == TRUE) {

                    $data_to_store = array(
                        'sex' => $this->input->post('gender'),
                        'name' => $this->input->post('fname'),
                        'lname' => $this->input->post('lname'),
                        'email' => $this->input->post('email'),
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
                    );


                    //if the insert has returned true then we show the flash message
                    if ($this->doctor_model->update_patient1($data_to_store)) {
                        $data['flash_message'] = TRUE;
                        redirect('doctor/patient_list', $data);
                    } else {
                        $data['flash_message'] = FALSE;
                        redirect('doctor/patient_list', $data);
                    }
                }
            }
            if ($this->session->userdata('is_logged_in') == FALSE) {
                $data['error'] = 'login details are wrong';
                $this->load->view('welcome_message', $data);
            }
        }
    }

    /* ##################################PRESCRIPTION FILEDS################################################## */

    public function add_prescription() {

        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            //form validation
            $this->form_validation->set_rules('casehistory', 'case history', 'required');
            $this->form_validation->set_rules('medicationpharmacist', 'medication from pharmacist', 'required');
            $this->form_validation->set_rules('medication', 'medication', 'required');
            $this->form_validation->set_rules('description', 'description', 'required');
            $this->form_validation->set_rules('date', 'date', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('doctor/manage_prescription');
            }
            //if the form has passed through the validation
            if ($this->form_validation->run()) {

                if ($this->session->userdata('is_logged_in') == TRUE) {
                    $data_to_store = array(
                        'casehistory' => $this->input->post('casehistory'),
                        'medication' => $this->input->post('medication'),
                        'medicationpharmacist' => $this->input->post('medicationpharmacist'),
                        'description' => $this->input->post('description'),
                        'date' => $this->input->post('date'),
                        'doctorid' => $this->input->post('doctor'),
                        'patientid' => $this->input->post('patient')
                    );


                    //if the insert has returned true then we show the flash message
                    if ($this->doctor_model->add_prescription($data_to_store)) {
                        $data['flash_message'] = TRUE;
                        redirect('doctor/prescription', $data);
                    } else {
                        $data['flash_message'] = FALSE;
                        redirect('doctor/prescription', $data);
                    }
                }
                if ($this->session->userdata('is_logged_in') == FALSE) {
                    $data['error'] = 'login details are wrong';
                    $this->load->view('welcome_message', $data);
                }
            }
        }
    }

    public function add_appointment() {
        $this->load->model('nurse_model');
        $q = $this->session->userdata('id');
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            //form validation

            $this->form_validation->set_rules('description', 'description', 'required');
            $this->form_validation->set_rules('appointmentdate', 'appointmentdate', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if ($this->form_validation->run() == FALSE) {

                $data['query'] = $this->doctor_model->get_appointment($q);
                $data['result'] = $this->nurse_model->get_patient();
                $data['doctor'] = $this->doctor_model->get_doctor();
                $data['appointment'] = $this->doctor_model->get_appointment_date();
                $this->load->view('doctor/manage_appointment', $data);
            }
            //if the form has passed through the validation
            if ($this->form_validation->run()) {
                
                if ($this->session->userdata('is_logged_in') == TRUE) {
                    $data_to_store = array(
                        'doctor' => $this->input->post('doctor'),
                        'patient' => $this->input->post('patient'),
                        'date' => $this->input->post('appointmentdate'),
                        'description' => $this->input->post('description')
                    );


                    //if the insert has returned true then we show the flash message
                    if ($this->doctor_model->add_appointment($data_to_store)) {
                        $data['flash_message'] = TRUE;
                        $data['query'] = $this->doctor_model->get_appointment($q);
                        $data['result'] = $this->nurse_model->get_patient();
                        $data['doctor'] = $this->doctor_model->get_doctor();
                        $data['appointment'] = $this->doctor_model->get_appointment_date();
                        $data['name'] = $this->session->userdata('name');
                        $this->load->view('doctor/manage_appointment', $data);
                    } else {
                        $data['flash_message'] = FALSE;
                        $this->load->model('nurse_model');
                        $data['query'] = $this->doctor_model->get_appointment($q);
                        $data['result'] = $this->nurse_model->get_patient();
                        $data['doctor'] = $this->doctor_model->get_doctor();
                        $data['appointment'] = $this->doctor_model->get_appointment_date();
                        $data['name'] = $this->session->userdata('name');

                        $this->load->view('doctor/manage_appointment', $data);
                    }
                }
            }
        }
    }

    /* bed allotment addition and validation function */

    public function add_bedallotment() {

        $this->load->model('nurse_model');
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            //form validation
            $this->form_validation->set_rules('bedno', 'bedno', 'required');
            $this->form_validation->set_rules('patient', 'patient', 'required');
            $this->form_validation->set_rules('allotmentdate', 'allotmentdate', 'required');
            $this->form_validation->set_rules('dischargedate', 'dischargedate', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if ($this->form_validation->run() == FALSE) {
                $data['allotment'] = $this->nurse_model->get_bedallotment();
                $data['query'] = $this->nurse_model->get_bed();
                $data['result'] = $this->nurse_model->get_patient();
                $this->load->view('doctor/bed_allotment', $data);
            }
            //if the form has passed through the validation
            if ($this->form_validation->run()) {
                if ($this->session->userdata('is_logged_in') == TRUE) {
                    $this->load->helper('date');

                    $startdate = strtotime($this->input->post('allotmentdate'));
                    $enddate = strtotime($this->input->post('dischargedate'));
                    $datestring = "%d-%m-%Y";
                    $today = mdate($datestring, now());
                    $today = strtotime($today);
                    if ($startdate < $today || $enddate < $today) {
                        $data['flash'] = TRUE;
                        $data['allotment'] = $this->nurse_model->get_bedallotment();
                        $data['query'] = $this->nurse_model->get_bed();
                        $data['result'] = $this->nurse_model->get_patient();
                        $this->load->view('doctor/bed_allotment', $data);
                        //  exit();
                    } else {

                        $data_to_store = array(
                            'bedno' => $this->input->post('bedno'),
                            'patient' => $this->input->post('patient'),
                            'allotmentdate' => $this->input->post('allotmentdate'),
                            'dischargedate' => $this->input->post('dischargedate')
                        );

                        //if the insert has returned true then we show the flash message
                        if ($this->nurse_model->add_bedallotment($data_to_store)) {
                            $data['flash_message'] = TRUE;
                            redirect('doctor/bed_allotment', $data);
                        } else {
                            $data['flash_message'] = FALSE;
                            redirect('doctor/bed_allotment', $data);
                        }
                    }
                }
                if ($this->session->userdata('is_logged_in') == FALSE) {
                    $data['error'] = 'login details are wrong';
                    $this->load->view('welcome_message', $data);
                }
            }
        }
    }

    public function edit_bedallotment($id) {



        if ($this->session->userdata('is_logged_in') == TRUE) {

            $data['allotment'] = $this->doctor_model->get_bedallotment($id);

            $data['name'] = $this->session->userdata('name');
            $this->load->view('doctor/edit/edit_bedallotment', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function edit_doctor_bedallotment() {
        $this->load->model('nurse_model');
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            //form validation
            $this->form_validation->set_rules('bedno', 'bedno', 'required');
            $this->form_validation->set_rules('patient', 'patient', 'required');
            $this->form_validation->set_rules('allotmentdate', 'allotmentdate', 'required');
            $this->form_validation->set_rules('dischargedate', 'dischargedate', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if ($this->form_validation->run() == FALSE) {
                $id = $this->session->userdata('name');
                $data['allotment'] = $this->doctor_model->get_bedallotment($id);

                $data['name'] =
                        $this->load->view('doctor/edit/edit_bedallotment', $data);
            }
            //if the form has passed through the validation
            if ($this->form_validation->run()) {
                if ($this->session->userdata('is_logged_in') == TRUE) {


                    //if the insert has returned true then we show the flash message
                    if ($this->doctor_model->update_bedallotment()) {
                        $data['flash_message'] = TRUE;
                        redirect('doctor/bed_allotment', $data);
                    } else {
                        $data['flash_message'] = FALSE;
                        redirect('doctor/bed_allotment', $data);
                    }
                }
                if ($this->session->userdata('is_logged_in') == FALSE) {
                    $data['error'] = 'login details are wrong';
                    $this->load->view('welcome_message', $data);
                }
            }
        }
    }

    //*********************doctor report add function***************************//

    public function add_report() {
        $q = $this->session->userdata('id');
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            //form validation
            $this->form_validation->set_rules('type', 'type', 'required');

            $this->form_validation->set_rules('description', 'description', 'required');
            $this->form_validation->set_rules('doctor', 'doctor', 'required');
            $this->form_validation->set_rules('patient', 'patient', 'required');
            $this->form_validation->set_rules('date', 'date', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if ($this->form_validation->run() == FALSE) {
                $this->load->model('nurse_model');
                $data['result'] = $this->nurse_model->get_patient();
                $data['doctor'] = $this->doctor_model->get_doctor();
                $data['query'] = $this->doctor_model->get_report_operation($q);
                $data['q'] = $this->doctor_model->get_report_birth($q);
                $data['d'] = $this->doctor_model->get_report_death($q);
                $data['oth'] = $this->doctor_model->get_report_other($q);
                $this->load->view('doctor/report', $data);
            }
            //if the form has passed through the validation
            if ($this->form_validation->run()) {
                if ($this->session->userdata('is_logged_in') == TRUE) {

                    $config['upload_path'] = './img/projo/';
                    $config['allowed_types'] = '*';

                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);



                    if (!$this->upload->do_upload('file')) {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('doctor/report', $error);
                    } else {

                        $data = $this->upload->data();

                        $q = $data['file_name'];


                        $data_to_store = array(
                            'type' => $this->input->post('type'),
                            'description' => $this->input->post('description'),
                            'doctor' => $this->session->userdata('id'),
                            'patient' => $this->input->post('patient'),
                            'date' => $this->input->post('date'),
                            'file' => $q
                        );

                        //if the insert has returned true then we show the flash message
                        if ($this->doctor_model->add_report($data_to_store)) {
                            $data['flash_message'] = TRUE;
                            redirect('doctor/report', $data);
                        } else {
                            $data['flash_message'] = FALSE;
                            redirect('doctor/report', $data);
                        }
                    }
                }
                if ($this->session->userdata('is_logged_in') == FALSE) {
                    $data['error'] = 'login details are wrong';
                    $this->load->view('welcome_message', $data);
                }
            }
        }
    }

    public function edit_docs_report() {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            //form validation
            $this->form_validation->set_rules('type', 'type', 'required');
            $this->form_validation->set_rules('description', 'description', 'required');
            $this->form_validation->set_rules('doctor', 'doctor', 'required');
            $this->form_validation->set_rules('patient', 'patient', 'required');
            $this->form_validation->set_rules('date', 'date', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if ($this->form_validation->run() == FALSE) {
                $id = $this->input->post('id');
                $data['query'] = $this->doctor_model->get_report($id);
                $data['name'] = $this->session->userdata('name');
                $this->load->view('doctor/edit/edit_report', $data);
                //if the form has passed through the validation
            } if ($this->form_validation->run()) {
                if ($this->session->userdata('is_logged_in') == TRUE) {


                    $data_to_store = array(
                        'type' => $this->input->post('type'),
                        'description' => $this->input->post('description'),
                        'date' => $this->input->post('date'),
                    );


                    //if the insert has returned true then we show the flash message
                    if ($this->doctor_model->update_report($data_to_store)) {
                        $data['flash_message'] = TRUE;
                        redirect('doctor/report', $data);
                    } else {
                        $data['flash_message'] = FALSE;
                        redirect('doctor/report', $data);
                    }
                }

                if ($this->session->userdata('is_logged_in') == FALSE) {
                    $data['error'] = 'login details are wrong';
                    $this->load->view('welcome_message', $data);
                }
            }
        }
    }

    //***************function for getting editing appointments***********************//

    public function edit_appointment($id) {



        if ($this->session->userdata('is_logged_in') == TRUE) {

            $data['query'] = $this->doctor_model->get_appointment1($id);

            $data['name'] = $this->session->userdata('name');


            $this->load->view('doctor/edit/edit_appointment', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function edit_patient_appointment($id) {

        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('appointmentdate', 'appointmentdate', 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

        if ($this->form_validation->run() == FALSE) {
            $data['query'] = $this->doctor_model->get_appointment1($id);

            $data['name'] = $this->session->userdata('name');


            $this->load->view('doctor/edit/edit_appointment', $data);
        } else {
            if ($this->session->userdata('is_logged_in') == TRUE) {
                $data_to_store = array(
                    'date' => $this->input->post('appointmentdate'),
                    'description' => $this->input->post('description')
                );
                $this->doctor_model->update_appointment($data_to_store, $id);



                $data['flash_message'] = TRUE;
                redirect('doctor/appointment', $data);
            }
            if ($this->session->userdata('is_logged_in') == FALSE) {
                $data['error'] = 'login details are wrong';
                $this->load->view('welcome_message', $data);
            }
        }
    }

    //*************Edit Prescription function ***************//

    public function edit_prescription($id) {

        $this->load->model('pharmacy_model');
        $q = $id;
        if ($this->session->userdata('is_logged_in') == TRUE) {
            $data['query'] = $this->pharmacy_model->get_prescription($q);
            $data['name'] = $this->session->userdata('name');
            $this->load->view('doctor/edit/edit_prescription', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    //****************function for updating prescription ******************//
    public function update_prescription() {
        $this->load->model('pharmacy_model');
        $this->load->model('nurse_model');
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            //form validation
            $this->form_validation->set_rules('medicationpharmacist', 'medication from pharmacist', 'required');
            $this->form_validation->set_rules('description', 'description', 'required|trim');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if ($this->form_validation->run() == FALSE) {
                $p = $this->input->post('id');
                $data['query'] = $this->pharmacy_model->get_prescription($p);
                $data['name'] = $this->session->userdata('name');
                $this->load->view('doctor/edit/edit_prescription', $data);
            }
            //if the form has passed through the validation
            if ($this->form_validation->run()) {
                if ($this->session->userdata('is_logged_in') == TRUE) {
                    $p = $this->input->post('id');

                    if ($this->doctor_model->update_prescription() == TRUE) {
                        $q = $this->session->userdata('id');
                        $data['flash'] = TRUE;
                        $data['query'] = $this->doctor_model->get_prescription($q);
                        $data['result'] = $this->nurse_model->get_patient();
                        $data['name'] = $this->session->userdata('name');
                        $this->load->view('doctor/manage_prescription', $data);
                    } else {
                        $data['flash_message'] = FALSE;
                        $data['query'] = $this->pharmacy_model->get_prescription($q);
                        $data['name'] = $this->session->userdata('name');
                        $this->load->view('doctor/edit/edit_prescription', $data);
                    }
                }
                if ($this->session->userdata('is_logged_in') == FALSE) {
                    $data['error'] = 'login details are wrong';
                    $this->load->view('welcome_message', $data);
                }
            }
        }
    }

    public function patient_profile($id) {
        $this->load->model('doctor_model');
        $this->load->model('patient_model');
        if ($this->session->userdata('is_logged_in') == TRUE) {

            $data['query'] = $this->doctor_model->get_patient($id);
            $data['allotment'] = $this->patient_model->admit_history($id);
            $data['query1'] = $this->patient_model->get_prescription1($id);
            $data['query2'] = $this->patient_model->get_appointment($id);
            $data['reports'] = $this->patient_model->get_report($id);


            $this->load->view('doctor/patient_profile', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function view_prescription($id) {
        $this->load->model('doctor_model');
        $this->load->model('patient_model');


        if ($this->session->userdata('is_logged_in') == TRUE) {
            $data['query'] = $this->doctor_model->get_patient($id);
            $data['allotment'] = $this->patient_model->admit_history($id);
            $data['query1'] = $this->patient_model->get_prescription1($id);
            $data['query2'] = $this->patient_model->get_appointment($id);
            $data['reports'] = $this->patient_model->get_report($id);

            $this->load->view('doctor/patient/view_prescription', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function inpatient() {
        $this->load->model('nurse_model');
        if ($this->session->userdata('is_logged_in') == TRUE) {
            $data['allotment'] = $this->nurse_model->get_bedallotment();
            $data['discharge'] = $this->nurse_model->discharged_patient();
            $this->load->view('doctor/inpatient', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function outpatient() {
        $this->load->model('nurse_model');
        if ($this->session->userdata('is_logged_in') == TRUE) {

            $data['patient'] = $this->nurse_model->get_outpatient();
            $this->load->view('doctor/outpatient', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function discharge($id, $bedno) {
        $this->load->model('nurse_model');
        if ($this->session->userdata('is_logged_in') == TRUE) {
            if ($this->nurse_model->disharge($id, $bedno)) {

                $data['flash_message'] = TRUE;
                $data['allotment'] = $this->nurse_model->get_bedallotment();
                $data['discharge'] = $this->nurse_model->discharged_patient();
                $this->load->view('doctor/inpatient', $data);
            } else {
                $data['flash_message'] = FALSE;
                $data['allotment'] = $this->nurse_model->get_bedallotment();
                $this->load->view('doctor/inpatient', $data);
            }
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

}
