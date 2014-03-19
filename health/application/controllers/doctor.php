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
        $this->load->model('nurse_model');
        $data['query'] = $this->nurse_model->get_patient();
        $this->load->view('doctor/index', $data);
    }

    public function new_patient() {
        $this->load->view('doctor/Registration');
    }

    public function patient_list() {
        $this->load->model('nurse_model');
        $data['query'] = $this->nurse_model->get_patient();
        $this->load->view('doctor/patient_list', $data);
    }

    public function appointment() {
        $this->load->model('nurse_model');
        $data['query'] = $this->doctor_model->get_appointment();
        $data['result'] = $this->nurse_model->get_patient();
        $data['doctor'] = $this->doctor_model->get_doctor();
        $this->load->view('doctor/manage_appointment', $data);
    }

    public function report() {
        $this->load->model('nurse_model');
        $data['result'] = $this->nurse_model->get_patient();
        $data['doctor'] = $this->doctor_model->get_doctor();
        $data['query'] = $this->doctor_model->get_report_operation();
        $data['q'] = $this->doctor_model->get_report_birth();
        $data['d'] = $this->doctor_model->get_report_death();
        $data['oth'] = $this->doctor_model->get_report_other();
        $this->load->view('doctor/report', $data);
    }

    /* #####################PRESCRIPTION FUNCTIONS######################## */

    public function prescription() {
        $this->load->model('nurse_model');
        $data['query'] = $this->doctor_model->get_prescription();
        $data['result'] = $this->nurse_model->get_patient();
        $data['doctor'] = $this->doctor_model->get_doctor();
        $this->load->view('doctor/manage_prescription', $data);
    }

    /* #######################bed allotment################# */

    public function bed_allotment() {

        $this->load->model('nurse_model');
        $data['allotment'] = $this->nurse_model->get_bedallotment();
        $data['query'] = $this->nurse_model->get_bed();
        $data['result'] = $this->nurse_model->get_patient();
        $this->load->view('doctor/bed_allotment', $data);
    }

    /* #######################bed bank################# */

    public function blood_bank() {
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
        }
    }

    public function add_appointment() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            //form validation

            $this->form_validation->set_rules('description', 'description', 'required');
            $this->form_validation->set_rules('appointmentdate', 'appointmentdate', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if ($this->form_validation->run() == FALSE) {
                $this->load->model('nurse_model');
                $data['result'] = $this->nurse_model->get_patient();
                $data['doctor'] = $this->doctor_model->get_doctor();
                $this->load->view('doctor/manage_appointment', $data);
            }
            //if the form has passed through the validation
            if ($this->form_validation->run()) {


                $data_to_store = array(
                    'doctor' => $this->input->post('doctor'),
                    'patient' => $this->input->post('patient'),
                    'date' => $this->input->post('appointmentdate'),
                    'description' => $this->input->post('description')
                );


                //if the insert has returned true then we show the flash message
                if ($this->doctor_model->add_appointment($data_to_store)) {
                    $data['flash_message'] = TRUE;
                    redirect('doctor/appointment', $data);
                } else {
                    $data['flash_message'] = FALSE;
                    redirect('doctor/appointment', $data);
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
                $this->load->view('nurse/bed_allotment');
            }
            //if the form has passed through the validation
            if ($this->form_validation->run()) {


                $data_to_store = array(
                    'bedno' => $this->input->post('bedno'),
                    'patient' => $this->input->post('patient'),
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
    }

    //*********************doctor report add function***************************//

    public function add_report() {
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
                $this->load->view('doctor/report', $data);
            }
            //if the form has passed through the validation
            if ($this->form_validation->run()) {

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
                        'doctor' => $this->input->post('doctor'),
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
        }
    }
    
    
    //***************function for getting the reports***********************//
      

}
