<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->output->set_header("HTTP/1.0 200 OK");
        $this->output->set_header("HTTP/1.1 200 OK");
        //$this->output->set_header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $last_update) . ' GMT');
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        // Your own constructor code
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('nurse_model');
        $this->load->library('pagination');
    }

    public function index($error = NULL) {
        $data['error'] = $error;
        $this->load->view('welcome_message', $data);
    }

    /* logout page */

    public function logout() {
        $this->session->sess_destroy();
        $this->index();
    }

    public function patient_index() {
        $result1 = $this->login->patient_validate();
        $data = array(
            'id' => $result1->id,
            'email' => $result1->email,
            'name' => $result1->name,
            'lname' => $result1->lname,
            'logged_in' => TRUE
        );
        /* setting the session variables */
        $this->session->set_userdata($data);



        if ($this->session->userdata('logged_in') == TRUE) {

            $this->load->model('nurse_model');
            $data['query'] = $this->nurse_model->get_patient();
            $this->load->view('patient/index', $data);
        } else {

            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    /* Nurse controller main */

    public function nurse() {
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

    /* ########################login  function####################################################### */

    public function login() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email Address?', 'trim|required|valid_email');
        $this->form_validation->set_rules('pass', 'Password?', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
            //$this->load->view('welcome_message'); //redirecting to the login view
        } else {
            // Load the model
            $this->load->model('login');
            // Validate the user can login
            $result = $this->login->validate();
            $result1 = $this->login->patient_validate();



            if (sizeof($result) > 0) {
                //Capturing the necessary data from the database


                $user_type = $result[0]->type;







                if ($user_type == 'admin') {

                    //Admin's session data
                    $data = array(
                        'id' => $result[0]->login_type,
                        'email' => $result[0]->email,
                        'name' => $result[0]->name,
                        'logged_in' => true
                    );


                    /* setting the session variables */
                    $this->session->set_userdata($data);
                    redirect("admin/index");
                } else if ($user_type == 'doctor') {

                    //Admin's session data
                    $data = array(
                        'id' => $result[0]->id,
                        'email' => $result[0]->email,
                        'name' => $result[0]->name,
                        'dep_id' => $result[0]->dep_id,
                        'is_logged_in' => TRUE
                    );


                    /* setting the session variables */
                    $this->session->set_userdata($data);
                    redirect("doctor/index");
                } else if ($user_type == 'nurse') {

                    //Admin's session data
                    $data = array(
                        'id' => $result[0]->id,
                        'email' => $result[0]->email,
                        'name' => $result[0]->name,
                        'dep_id' => $result[0]->dep_id,
                        'is_logged_in' => TRUE
                    );

                    /* setting the session variables */
                    $this->session->set_userdata($data);
                    redirect("nurse/index");
                } else if ($user_type == 'pharmacist') {

                    //Admin's session data
                    $data = array(
                        'id' => $result[0]->id,
                        'email' => $result[0]->email,
                        'name' => $result[0]->name,
                        'dep_id' => $result[0]->dep_id,
                        'logged_in' => TRUE
                    );

                    /* setting the session variables */
                    $this->session->set_userdata($data);
                    redirect("pharmacy/login");
                } else if ($user_type == 'lab') {

                    //Admin's session data
                    $data = array(
                        'id' => $result[0]->id,
                        'email' => $result[0]->email,
                        'name' => $result[0]->name,
                        'dep_id' => $result[0]->dep_id,
                        'logged_in' => TRUE
                    );
                    /* setting the session variables */
                    $this->session->set_userdata($data);
                    redirect("lab/index");
                }
            }

            if (sizeof($result1) > 0) {

                $this->patient_index();
            } else {

                // If user did not validate, then show them login page again
                $error['error'] = '<font color=red>Invalid username and/or password .</font><br />';
                $this->load->view('welcome_message', $error);
            }
        }
    }

    public function register() {
        $this->load->view('welcome_message');
    }

    public function patient_list() {
        if ($this->session->userdata('is_logged_in') == TRUE) {

            $data['query'] = $this->nurse_model->get_patient();
            $this->load->view('nurse/patient_list', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function new_patient() {
        if ($this->session->userdata('is_logged_in') == TRUE) {
            $this->load->view('nurse/Registration');
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function patient_profile() {
        if ($this->session->userdata('is_logged_in') == TRUE) {

            $this->load->view('nurse/patient_profile');
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function manage_bed() {
        if ($this->session->userdata('is_logged_in') == TRUE) {
            $data['query'] = $this->nurse_model->get_bed();
            $this->load->view('nurse/manage_bed', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    //bed allotment function
    public function bed_allotment() {
        if ($this->session->userdata('is_logged_in') == TRUE) {
            $data['allotment'] = $this->nurse_model->get_bedallotment();
            $data['query'] = $this->get_bed();
            $data['result'] = $this->get_patient();
            $data['main_content'] = 'nurse/bed_allotment';
            $this->load->view('nurse/template', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    //get bed function
    public function get_bed() {
        if ($this->session->userdata('is_logged_in') == TRUE) {
            $q = $this->nurse_model->get_bed();
            if ($q) {
                return $q;
            }
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    //function of getting patient
    public function get_patient() {
        if ($this->session->userdata('is_logged_in') == TRUE) {
            $q = $this->nurse_model->get_patient();
            if ($q) {
                return $q;
            }
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    //function of getting nurse report
    public function get_nurse_report() {
        if ($this->session->userdata('is_logged_in') == TRUE) {
            $q = $this->nurse_model->get_nurse_report();
            if ($q) {
                return $q;
            }
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function nurse_report() {
        $this->load->model('doctor_model');
        $q = $this->session->userdata('id');
        if ($this->session->userdata('is_logged_in') == TRUE) {


            $data['result'] = $this->nurse_model->get_patient();
            $data['doctor'] = $this->doctor_model->get_doctor();
            $data['query'] = $this->doctor_model->get_report_operation($q);
            $data['q'] = $this->doctor_model->get_report_birth($q);
            $data['d'] = $this->doctor_model->get_report_death($q);
            $data['oth'] = $this->doctor_model->get_report_other($q);
            $this->load->view('nurse/nurse_report', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function nurse_profile() {
        if ($this->session->userdata('is_logged_in') == TRUE) {
            $this->load->view('nurse/nurse_profile');
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function add() {
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
                $this->load->view('nurse/new_patient');
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
                        redirect('welcome/patient_list', $data);
                    } else {
                        $data['flash_message'] = FALSE;
                        redirect('welcome/patient_list', $data);
                    }
                }
                if ($this->session->userdata('is_logged_in') == FALSE) {
                    $data['error'] = 'login details are wrong';
                    $this->load->view('welcome_message', $data);
                }
            }
        }
    }

    /* bed addition and validation function */

    public function add_bed() {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            //form validation
            $this->form_validation->set_rules('bedno', 'bedno', 'required');
            $this->form_validation->set_rules('bedtype', 'bedtype', 'required');
            $this->form_validation->set_rules('description', 'description', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if ($this->form_validation->run() == FALSE) {
                $data['query'] = $this->nurse_model->get_bed();
                $this->load->view('nurse/manage_bed', $data);
            }
            //if the form has passed through the validation
            if ($this->form_validation->run()) {

                if ($this->session->userdata('is_logged_in') == TRUE) {
                    $data_to_store = array(
                        'bedno' => $this->input->post('bedno'),
                        'bedtype' => $this->input->post('bedtype'),
                        'description' => $this->input->post('description'),
                        'occupied' => 'occupied'
                    );

                    //if the insert has returned true then we show the flash message
                    if ($this->nurse_model->add_bed($data_to_store)) {
                        $data['flash_message'] = TRUE;
                        redirect('welcome/manage_bed', $data);
                    } else {
                        $data['flash_message'] = FALSE;
                        redirect('welcome/manage_bed', $data);
                    }
                }
                if ($this->session->userdata('is_logged_in') == FALSE) {
                    $data['error'] = 'login details are wrong';
                    $this->load->view('welcome_message', $data);
                }
            }
        }
    }

    /* bed allotment addition and validation function */

    public function add_bedallotment() {
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
                if ($this->session->userdata('is_logged_in') == TRUE) {

                    $data_to_store = array(
                        'bedno' => $this->input->post('bedno'),
                        'patient' => $this->input->post('patient'),
                        
                        'allotmentdate' => $this->input->post('allotmentdate'),
                        'dischargedate' => $this->input->post('dischargedate')
                    );

                    //if the insert has returned true then we show the flash message
                    if ($this->nurse_model->add_bedallotment($data_to_store)) {
                        $data['flash_message'] = TRUE;
                        redirect('welcome/bed_allotment', $data);
                    } else {
                        $data['flash_message'] = FALSE;
                        redirect('welcome/bed_allotment', $data);
                    }
                }
            }
            if ($this->session->userdata('is_logged_in') == FALSE) {
                $data['error'] = 'login details are wrong';
                $this->load->view('welcome_message', $data);
            }
        }
    }

    //nurse report add function

    public function add_nurse_report() {
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
                $this->load->view('nurse/nurse_report');
            }
            //if the form has passed through the validation
            if ($this->form_validation->run()) {
                if ($this->session->userdata('is_logged_in') == TRUE) {

                    $data_to_store = array(
                        'type' => $this->input->post('type'),
                        'description' => $this->input->post('description'),
                        'doctor' => $this->input->post('doctor'),
                        'patient' => $this->input->post('patient'),
                        'date' => $this->input->post('date')
                    );

                    //if the insert has returned true then we show the flash message
                    if ($this->nurse_model->add_nurse_report($data_to_store)) {
                        $data['flash_message'] = TRUE;
                        redirect('welcome/nurse_report', $data);
                    } else {
                        $data['flash_message'] = FALSE;
                        redirect('welcome/nurse_report', $data);
                    }
                }
                if ($this->session->userdata('is_logged_in') == FALSE) {
                    $data['error'] = 'login details are wrong';
                    $this->load->view('welcome_message', $data);
                }
            }
        }
    }

    /*     * ********************************************************************************************************
      blood donors
     * * ********************************************************************************************************************

     */

    public function blood_bank() {
        if ($this->session->userdata('is_logged_in') == TRUE) {
            $data['a'] = $this->nurse_model->a();
            $data['a1'] = $this->nurse_model->a1();
            $data['b'] = $this->nurse_model->b();
            $data['b1'] = $this->nurse_model->b1();
            $data['ab'] = $this->nurse_model->ab();
            $data['ab1'] = $this->nurse_model->ab1();
            $data['o'] = $this->nurse_model->o();
            $data['o1'] = $this->nurse_model->o1();

            $this->load->view('nurse/manage_blood_bank', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    public function blood_donors() {
        if ($this->session->userdata('is_logged_in') == TRUE) {
            $data['query'] = $this->nurse_model->get_donors();
            $this->load->view('nurse/manage_blood_donor', $data);
        }
        if ($this->session->userdata('is_logged_in') == FALSE) {
            $data['error'] = 'login details are wrong';
            $this->load->view('welcome_message', $data);
        }
    }

    // add blood donor
    public function add_donor() {
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
                $data['query'] = $this->nurse_model->get_donors();
                $this->load->view('nurse/manage_blood_donor', $data);
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
                    if ($this->nurse_model->add_donor($data_to_store)) {
                        $data['flash_message'] = TRUE;
                        $data['query'] = $this->nurse_model->get_donors();
                        $this->load->view('nurse/manage_blood_donor', $data);
                    } else {
                        $data['flash_message'] = FALSE;
                        $data['query'] = $this->nurse_model->get_donors();
                        $this->load->view('nurse/manage_blood_donor', $data);
                    }
                }
            }
            if ($this->session->userdata('is_logged_in') == FALSE) {
                $data['error'] = 'login details are wrong';
                $this->load->view('welcome_message', $data);
            }
        }
    }

    /* #######################patients view appointment########################### */

    public function view_appointment() {
        $this->session->set_userdata();
        $q = $this->session->userdata('id');
        if ($this->session->userdata('logged_in') == true) {
            $this->load->model('patient_model');
            $data['query'] = $this->patient_model->get_appointment($q);
            $this->load->view('patient/appointment', $data);
        } else {
            echo 'haha';
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */