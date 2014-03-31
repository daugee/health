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

//    public function index($data) {
//        if($this->session->userdata('is_logged_in')==TRUE){
//            
//        
//        $this->load->model('nurse_model');
//        $data['query'] = $this->nurse_model->get_patient();
//        $this->load->view('patient/index', $data);
//        }
//        else{
//                
//                $data['error']='login details are wrong';
//                $this->load->view('welcome_message',$data); 
//        }
//    }

    public function view_appointment() {

        if ($this->session->userdata('logged_in') == TRUE) {
            $this->load->view('patient/appointment');
        }
        if ($this->session->userdata('logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function view_prescription() {
        $this->session->set_userdata();
        $q = $this->session->userdata('id');
        echo $q;
        if ($this->session->userdata('logged_in') == TRUE) {
             $data1 = $this->patient_model->get_prescription($q);
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
        $data['query'] = $this->admin_model->get_doctor();
        $data['results'] = $this->admin_model->get_department();
        $this->load->view('patient/doctor', $data);
    }

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

        $this->load->view('patient/blood_bank', $data);
    }

    public function admit_history() {
        $this->load->view('patient/admit_history');
    }

}