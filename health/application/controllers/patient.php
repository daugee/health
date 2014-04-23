<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Patient extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->model('patient_model');
    }

    public function view_appointment() {
        $q = $this->session->userdata('id');
        $data['query'] = $this->patient_model->get_appointment($q);

        if ($this->session->userdata('logged_in') == TRUE) {
            $data['query'] = $this->patient_model->get_appointment($q);
            $data['query'] = $this->patient_model->get_dep($q);
            $this->load->view('patient/appointment', $data);
        }
        if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function view_prescription() {
      
        $q = $this->session->userdata('id');

        if ($this->session->userdata('logged_in') == TRUE) {
            $data1 = $this->patient_model->get_prescription($q);
            $q = $this->session->userdata('id');
            if (sizeof($data1) > 0) {
                $data['flash_message'] = TRUE;
                $data['query'] = $this->patient_model->get_prescription($q);

                $this->load->view('patient/prescription', $data);
            } else {
                $data['flash_message'] = FALSE;

                $this->load->view('patient/prescription', $data);
            }
        } else {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function view_doctors() {
        $this->load->model('admin_model');
        if ($this->session->userdata('logged_in') == TRUE) {
            $data['query'] = $this->admin_model->get_doctor();
            $data['results'] = $this->admin_model->get_department();
            $this->load->view('patient/doctor', $data);
        }
        if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function view_blood_bank() {
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

            $this->load->view('patient/blood_bank', $data);
        }
        if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function admit_history() {
        
         $q = $this->session->userdata('id');
        if ($this->session->userdata('logged_in') == TRUE) {
            
             $data['allotment'] = $this->patient_model->admit_history($q);
            $this->load->view('patient/admit_history',$data);
        }
        if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }
    
    public function reports() {
        
         $q = $this->session->userdata('id');
        if ($this->session->userdata('logged_in') == TRUE) {
            
             $data['reports'] = $this->patient_model->get_report($q);
            $this->load->view('patient/reports',$data);
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

            
            $this->load->view('patient/patient_profile',$data);
        }
        if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }
    
       public function view_prescription1($id) {
 $this->load->model('doctor_model');
 $this->load->model('patient_model');


        if ($this->session->userdata('logged_in') == TRUE) {
            $data['query'] = $this->doctor_model->get_patient($id);
             $data['allotment'] = $this->patient_model->admit_history($id);
              $data['query1'] = $this->patient_model->get_prescription1($id);
              $data['query2'] = $this->patient_model->get_appointment($id);
               $data['reports'] = $this->patient_model->get_report($id);

            $this->load->view('patient/patient/view_prescription', $data);
        }
        if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

}