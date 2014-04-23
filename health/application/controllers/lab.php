<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lab extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->model('lab_model');
       $this->load->helper('date');
    }

    public function diagnostic_report() {
         if ($this->session->userdata('logged_in') == TRUE) {
        $this->load->model('doctor_model');
        
        $data['results'] = $this->lab_model->get_prescription();
        $this->load->view('lab/diagnostic_report', $data);
         }
         if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function index() {
         if ($this->session->userdata('logged_in') == TRUE) {
        $this->load->view('lab/index');
         }
         if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    /* ################### Lab blood bank/donor ################################### */

    public function blood_bank() {
         if ($this->session->userdata('logged_in') == TRUE) {
        $this->load->model('nurse_model');
        $data['a'] = $this->nurse_model->a();
        $data['a1'] = $this->nurse_model->a1();
        $data['b'] = $this->nurse_model->b();
        $data['b1'] = $this->nurse_model->b1();
        $data['ab'] = $this->nurse_model->ab();
        $data['ab1'] = $this->nurse_model->ab1();
        $data['o'] = $this->nurse_model->o();
        $data['o1'] = $this->nurse_model->o1();
        $this->load->view('lab/blood_bank', $data);
         }
         if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function blood_donor() {
         if ($this->session->userdata('logged_in') == TRUE) {
        $this->load->model('nurse_model');
        $data['query'] = $this->nurse_model->get_donors();
        $this->load->view('lab/manage_blood_donor', $data);
         }
         if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    /* ################### Lab profile ################################### */

    public function lab_profile() {
         if ($this->session->userdata('logged_in') == TRUE) {
        $this->load->view('lab/lab_profile');
         }
         if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    //**********************Edit diagnostic report ***********************//

    public function edit_diagnostic_report($id,$patientid) {
         if ($this->session->userdata('logged_in') == TRUE) {
        $this->load->model('pharmacy_model');
        $this->load->model('doctor_model');
        $p = $id;
        $q= $patientid;
        $data['row'] = $this->lab_model->get_diagnostic_report($patientid);
        $data['query'] = $this->pharmacy_model->get_prescription($p);
        $data['count'] = $this->lab_model->count_report($patientid);

        $data['results'] = $this->lab_model->get_prescription();
        $data['id'] = $id;

        $this->load->view('lab/edit_diagnostic_report', $data);
         }
        
         if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function add_diagnostic_report() {
 if ($this->session->userdata('logged_in') == TRUE) {
        $this->load->model('pharmacy_model');
        $this->load->model('doctor_model');
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            //form validation
            $this->form_validation->set_rules('reporttype', 'report type', 'required');
            $this->form_validation->set_rules('documenttype', 'document type', 'required');
            $this->form_validation->set_rules('description', 'description', 'required|trim');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if ($this->form_validation->run() == FALSE) {

                $p = $this->input->post('userid');
                $data['query'] = $this->pharmacy_model->get_prescription($p);

                $data['results'] = $this->doctor_model->get_prescription();
                $data['id'] = $p;

                $this->load->view('lab/edit_diagnostic_report', $data);
            }
            //if the form has passed through the validation
            if ($this->form_validation->run()) {



                $config['upload_path'] = './img/projo/';
                $config['allowed_types'] = '*';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);


                if (!$this->upload->do_upload('doc')) {
                 
                    $data['error'] = $this->upload->display_errors();

                    $p = $this->input->post('userid');
                    $data['id'] = $p;
                    $data['query'] = $this->pharmacy_model->get_prescription($p);
                    $data['results'] = $this->doctor_model->get_prescription();
                    $this->load->view('lab/edit_diagnostic_report', $data);
                } else {

                    $data = $this->upload->data();

                    $q = $data['file_name'];
                    $data_to_store = array(
                        'report_type' => $this->input->post('reporttype'),
                        'document_type' => $this->input->post('documenttype'),
                        'lab_description' => $this->input->post('description'),
                        'patient_id' => $this->input->post('patient1'),
                        'doctor_id' => $this->input->post('doctor1'),
                        'document' => $q,
                        'date' => date('Y-m-d H:i:s',now())
                       
                    );


                    //if the insert has returned true then we show the flash message
                    if ($this->lab_model->add_diagnostic_report($data_to_store)) {
                        $data['flash_message'] = TRUE;
                        $this->load->model('pharmacy_model');
                        $this->load->model('doctor_model');
                        $p = $this->input->post('userid');
                        $data['id'] = $p;
                        $data['query'] = $this->pharmacy_model->get_prescription($p);
                        $data['results'] = $this->doctor_model->get_prescription();

                        $this->load->view('lab/diagnostic_report', $data);
                    } else {

                        $data['flash_message'] = FALSE;
                        $this->load->model('pharmacy_model');
                        $this->load->model('doctor_model');
                        $p = $this->input->post('userid');
                        $data['id'] = $p;
                        $data['query'] = $this->pharmacy_model->get_prescription($p);
                        $data['results'] = $this->doctor_model->get_prescription();
                        $this->load->view('lab/diagnostic_report', $data);
                    }
                }
            }
        }
    }
     if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    
    //=================edit donors ==================//
     public function donors_update($id) {

$this->load->model('nurse_model');

        if ($this->session->userdata('logged_in') == TRUE) {

            $data['results'] = $this->nurse_model->get_donors_edit($id);
            $data['query'] = $this->nurse_model->get_donors();

            $this->load->view('lab/edit/edit_blood_donor', $data);
        }
        if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }
    
    
    public function edit_donors($id) {
        $this->load->model('nurse_model');
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

                $this->load->view('lab/edit/edit_blood_donor', $data);
            }
            //if the form has passed through the validation
            if ($this->form_validation->run()) {
                if ($this->session->userdata('logged_in') == TRUE) {

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
                        $this->load->view('lab/manage_blood_donor', $data);
                    } else {
                        $data['flash_message'] = FALSE;
                        $data['results'] = $this->nurse_model->get_donors_edit($id);
                        $data['query'] = $this->nurse_model->get_donors();

                        $this->load->view('lab/edit/edit_blood_donor', $data);
                    }
                }
            }
            if ($this->session->userdata('logged_in') == FALSE) {
                $data['error'] = 'login details are wrong';
                $this->load->view('welcome_message', $data);
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

            
            $this->load->view('lab/patient_profile',$data);
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

            $this->load->view('lab/patient/view_prescription', $data);
        }
        if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }
}