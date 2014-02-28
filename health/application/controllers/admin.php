<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

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
        
    }
    
    private function check_isvalidated() {
        if (!$this->session->userdata('validated')) {
            $this->index();
        }
    }

    public function index() {
        $this->load->view('admin/index');
    }

    public function department() {
        $this->load->view('admin/department');
    }

    public function doctor() {
        $this->load->view('admin/doctor');
    }

    /* #######FUNCTION FOR NURSE######## */

    public function nurse() {
        $this->load->view('admin/nurse');
    }

    /* #######FUNCTION FOR ADMIN PROFILE######## */

    public function admin_profile() {
        $this->load->view('admin/profile');
    }

    /* #######FUNCTION FOR PHARMACIST######## */

    public function pharmacist() {
        $this->load->view('admin/pharmacist');
    }

    /* #######FUNCTION FOR LABORATORIST######## */

    public function laboratorist() {
        $this->load->view('admin/laboratorist');
    }

    /* #######FUNCTION FOR HOSPITAL MANAGEMENT######## */

    public function view_appointment() {
        $this->load->view('admin/hospital/appointment');
    }

    public function view_bed_status() {
        $this->load->model('nurse_model');
        $data['query'] = $this->nurse_model->get_bed();
        $data['allotment'] = $this->nurse_model->get_bedallotment();
        $this->load->view('admin/hospital/bed', $data);
    }

    /*     * *****************view medicine********************************** */

    public function view_medicine() {
        $this->load->view('admin/hospital/medicine');
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
                $this->load->view('admin/patient');
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
                    redirect('admin/patient', $data);
                } else {
                    $data['flash_message'] = FALSE;
                    redirect('admin/patient', $data);
                }
            }
        }
    }

}