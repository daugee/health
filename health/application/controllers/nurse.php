<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nurse extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('nurse_model');
        $this->load->library('pagination');
    }

    public function index() {
        if ($this->session->userdata('is_logged_in') == TRUE) {
            $this->load->model('nurse_model');
            $data['query'] = $this->nurse_model->get_patient();
            $this->load->view('nurse/index', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
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
                $this->load->view('nurse/Registration');
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
                            redirect('welcome/patient_list', $data);
                        } else {
                            $data['flash_message'] = FALSE;
                            $this->load->view('nurse/Registration', $data);
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


            $this->load->model('doctor_model');
            $data['name'] = $this->session->userdata('name');
            $data['query'] = $this->doctor_model->get_patient($id);

            $this->load->view('nurse/edit/edit_patient', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function edit_patient() {
        $this->load->model('doctor_model');
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

                $data['name'] = $this->session->userdata('name');
                $data['query'] = $this->doctor_model->get_patient($id);

                $this->load->view('nurse/edit/edit_patient', $data);
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
                        redirect('welcome/patient_list', $data);
                    } else {
                        $data['flash_message'] = FALSE;
                        redirect('welcome/patient_list', $data);
                    }
                }
            }
            if ($this->session->userdata('is_logged_in') == FALSE) {
                $data['error'] = 'login details are wrong';
                $this->load->view('welcome_message', $data);
            }
        }
    }

    public function inpatient() {
        if ($this->session->userdata('is_logged_in') == TRUE) {
            $data['allotment'] = $this->nurse_model->get_bedallotment();
             $data['discharge'] = $this->nurse_model->discharged_patient();
            $this->load->view('nurse/inpatient', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function discharge($id,$bedno) {

        if ($this->session->userdata('is_logged_in') == TRUE) {
            if ($this->nurse_model->disharge($id,$bedno)) {

                $data['flash_message'] = TRUE;
                $data['allotment'] = $this->nurse_model->get_bedallotment();
                $data['discharge'] = $this->nurse_model->discharged_patient();
                $this->load->view('nurse/inpatient', $data);
            } else {
                $data['flash_message'] = FALSE;
                $data['allotment'] = $this->nurse_model->get_bedallotment();
                $this->load->view('nurse/inpatient', $data);
            }
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function outpatient() {
        if ($this->session->userdata('is_logged_in') == TRUE) {

            $data['patient'] = $this->nurse_model->get_outpatient();
            $this->load->view('nurse/outpatient', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function edit_bed($id) {



        if ($this->session->userdata('is_logged_in') == TRUE) {




            $data['query'] = $this->nurse_model->get_bed($id);

            $this->load->view('nurse/edit/edit_bed', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function bed_edit() {


        $id = $this->input->post('id');
        if ($this->session->userdata('is_logged_in') == TRUE) {

            if ($this->nurse_model->bed_edit($id)) {


                $data['flash_message'] = TRUE;
                $data['query'] = $this->nurse_model->get_bed($id);

                $this->load->view('nurse/edit/edit_bed', $data);
            } else {
                $data['flash_message'] = FALSE;
                $data['query'] = $this->nurse_model->get_bed($id);

                $this->load->view('nurse/edit/edit_bed', $data);
            }
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    //========================EDIT BED ALLOTMENT ===========================//
    public function edit_bedallotment($id) {

        if ($this->session->userdata('is_logged_in') == TRUE) {
            $this->load->model('doctor_model');

            $data['allotment'] = $this->doctor_model->get_bedallotment($id);

            $this->load->view('nurse/edit/edit_bedallotment', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function edit_nurse_bedallotment($id) {
        $this->load->model('doctor_model');
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            //form validation
            $this->form_validation->set_rules('bedno', 'bedno', 'required');
            $this->form_validation->set_rules('patient', 'patient', 'required');
            $this->form_validation->set_rules('allotmentdate', 'allotmentdate', 'required');
            $this->form_validation->set_rules('dischargedate', 'dischargedate', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if ($this->form_validation->run() == FALSE) {
                $this->load->model('doctor_model');

                $data['allotment'] = $this->doctor_model->get_bedallotment($id);

                $this->load->view('nurse/edit/edit_bedallotment', $data);
                ;
            }
            //if the form has passed through the validation
            if ($this->form_validation->run()) {
                if ($this->session->userdata('is_logged_in') == TRUE) {

                    $data_to_store = array(
                        'bedno' => $this->input->post('bedno'),
                        'patient' => $this->input->post('patient'),
                        'allotmentdate' => $this->input->post('allotmentdate'),
                        'dischargedate' => $this->input->post('dischargedate')
                    );

                    //if the insert has returned true then we show the flash message
                    if ($this->doctor_model->update_bedallotment($data_to_store)) {
                        $data['flash'] = TRUE;
                        $data['allotment'] = $this->nurse_model->get_bedallotment();
                        $this->load->view('nurse/inpatient', $data);
                    } else {
                        $data['flash'] = FALSE;
                        $data['allotment'] = $this->doctor_model->get_bedallotment($id);
                        $this->load->view('nurse/edit/edit_bedallotment', $data);
                    }
                }
                if ($this->session->userdata('is_logged_in') == FALSE) {
                    $data['error'] = 'login details are wrong';
                    $this->load->view('welcome_message', $data);
                }
            }
        }
    }

    //============================ update of blood donors ===========================//
    public function donors_update($id) {



        if ($this->session->userdata('is_logged_in') == TRUE) {

            $data['results'] = $this->nurse_model->get_donors_edit($id);
            $data['query'] = $this->nurse_model->get_donors();

            $this->load->view('nurse/edit/edit_blood_donor', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function edit_donors($id) {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            //form validation
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
            $this->form_validation->set_rules('address', 'address', 'trim');
            $this->form_validation->set_rules('phone', 'phone', 'trim|required');
            $this->form_validation->set_rules('gender', 'gender', 'required');
            $this->form_validation->set_rules('age', 'age', 'required|numeric');
            $this->form_validation->set_rules('donationdate', 'donationdate', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if ($this->form_validation->run() == FALSE) {
                $data['results'] = $this->nurse_model->get_donors_edit($id);
                $data['query'] = $this->nurse_model->get_donors();

                $this->load->view('nurse/edit/edit_blood_donor', $data);
            }
            //if the form has passed through the validation
            if ($this->form_validation->run()) {
                if ($this->session->userdata('is_logged_in') == TRUE) {

                    $data_to_store = array(
                        'name' => $this->input->post('name'),
                        'email' => $this->input->post('email'),
                        'address' => $this->input->post('address'),
                        'phone' => $this->input->post('phone'),
                        'gender' => $this->input->post('gender'),
                        'donationdate' => $this->input->post('donationdate'),
                        'age' => $this->input->post('age'),
                        'bloodgroup' => $this->input->post('bloodgroup')
                    );



                    //if the insert has returned true then we show the flash message
                    if ($this->nurse_model->update_donors($data_to_store)) {
                        $data['flash_msg'] = TRUE;
                        $data['query'] = $this->nurse_model->get_donors();
                        $this->load->view('nurse/manage_blood_donor', $data);
                    } else {
                        $data['flash_message'] = FALSE;
                        $data['results'] = $this->nurse_model->get_donors_edit($id);
                        $data['query'] = $this->nurse_model->get_donors();

                        $this->load->view('nurse/edit/edit_blood_donor', $data);
                    }
                }
            }
            if ($this->session->userdata('is_logged_in') == FALSE) {
                $data['error'] = 'login details are wrong';
                $this->load->view('welcome_message', $data);
            }
        }
    }

    //=======================function for adding reports =============================//
    public function add_report() {
        $q = $this->session->userdata('id');
        $this->load->model('doctor_model');
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
                $this->load->model('doctor_model');
                $data['result'] = $this->nurse_model->get_patient();
                $data['doctor'] = $this->doctor_model->get_doctor();
                $data['query'] = $this->doctor_model->get_report_operation($q);
                $data['q'] = $this->doctor_model->get_report_birth($q);
                $data['d'] = $this->doctor_model->get_report_death($q);
                $data['oth'] = $this->doctor_model->get_report_other($q);


                $this->load->view('nurse/edit/edit_report', $data);
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

                        $data['result'] = $this->nurse_model->get_patient();
                        $data['doctor'] = $this->doctor_model->get_doctor();
                        $data['query'] = $this->doctor_model->get_report_operation($q);
                        $data['q'] = $this->doctor_model->get_report_birth($q);
                        $data['d'] = $this->doctor_model->get_report_death($q);
                        $data['oth'] = $this->doctor_model->get_report_other($q);


                        $this->load->view('nurse/edit/edit_report', $data);
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
                            redirect('welcome/nurse_report');
                        } else {
                            $data['flash_message'] = FALSE;
                            $data['result'] = $this->nurse_model->get_patient();
                            $data['doctor'] = $this->doctor_model->get_doctor();
                            $data['query'] = $this->doctor_model->get_report_operation($q);
                            $data['q'] = $this->doctor_model->get_report_birth($q);
                            $data['d'] = $this->doctor_model->get_report_death($q);
                            $data['oth'] = $this->doctor_model->get_report_other($q);


                            $this->load->view('nurse/edit/edit_report', $data);
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

    public function edit_report($id) {

        $this->load->model('doctor_model');

        if ($this->session->userdata('is_logged_in') == TRUE) {


            $data['query'] = $this->doctor_model->get_report($id);
            $data['name'] = $this->session->userdata('name');
            $this->load->view('nurse/edit/edit_report', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function edit_nurse_report() {
        $this->load->model('doctor_model');
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
                $id = $this->input->post('id');
                $data['query'] = $this->doctor_model->get_report($id);
                $data['name'] = $this->session->userdata('name');
                $this->load->view('nurse/edit/edit_report', $data);
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
                        $data['flash_msg'] = TRUE;
                        $data['result'] = $this->nurse_model->get_patient();
                        $data['doctor'] = $this->doctor_model->get_doctor();
                        $data['query'] = $this->doctor_model->get_report_operation($q);
                        $data['q'] = $this->doctor_model->get_report_birth($q);
                        $data['d'] = $this->doctor_model->get_report_death($q);
                        $data['oth'] = $this->doctor_model->get_report_other($q);
                        $this->load->view('nurse/nurse_report', $data);
                    } else {
                        $data['flash_msg'] = FALSE;
                        $id = $this->input->post('id');
                $data['query'] = $this->doctor_model->get_report($id);
                $data['name'] = $this->session->userdata('name');
                $this->load->view('nurse/edit/edit_report', $data);
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
        if ($this->session->userdata('logged_in') == TRUE) {
                        
            $data['query'] = $this->doctor_model->get_patient($id);
             $data['allotment'] = $this->patient_model->admit_history($id);
              $data['query1'] = $this->patient_model->get_prescription1($id);
              $data['query2'] = $this->patient_model->get_appointment($id);
               $data['reports'] = $this->patient_model->get_report($id);

            
            $this->load->view('nurse/patient_profile',$data);
        }
        if ($this->session->userdata('logged_in') == FALSE) {
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

            $this->load->view('nurse/patient/view_prescription', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }
    

}