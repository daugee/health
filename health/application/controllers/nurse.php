<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends CI_Controller {
public function __construct()
       {
       parent::__construct();
             $this->load->helper('url');
            $this->load->library('session');
            $this->load->library('form_validation');
       
       }
       public function index() {

        $this->load->model('nurse_model');
        $data['query'] = $this->nurse_model->get_patient();
        $this->load->view('nurse/index', $data);
    }
}