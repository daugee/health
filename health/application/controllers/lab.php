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
    }

    public function diagnostic_report() {
        $this->load->model('doctor_model');
        $data['query'] = $this->doctor_model->get_prescription();
        $this->load->view('lab/diagnostic_report', $data);
    }

    public function index() {
        $this->load->view('lab/index');
    }

    /* ################### Lab blood bank/donor ################################### */

    public function blood_bank() {
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

    public function blood_donor() {
        $this->load->model('nurse_model');
        $data['query'] = $this->nurse_model->get_donors();
        $this->load->view('lab/manage_blood_donor', $data);
    }

    /* ################### Lab profile ################################### */

    public function lab_profile() {
        $this->load->view('lab/lab_profile');
    }

    //**********************Edit diagnostic report ***********************//

    public function edit_diagnostic_report($id) {
        $this->load->model('pharmacy_model');
        $this->load->model('doctor_model');
        $p = $id;
        $data['query'] = $this->pharmacy_model->get_prescription($p);

        $data['results'] = $this->doctor_model->get_prescription();
        $data['id'] = $id;

        $this->load->view('lab/edit_diagnostic_report', $data);
    }

    public function add_diagnostic_report() {

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
                        'lab_type' => $this->input->post('reporttype'),
                        'document_type' => $this->input->post('documenttype'),
                        'lab_description' => $this->input->post('description'),
                        'patient' => $this->input->post('patient1'),
                        'doctor' => $this->input->post('doctor1'),
                        'lab_document' => $q
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

}