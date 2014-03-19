<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lab extends CI_Controller {

	  public function __construct()
       {
            parent::__construct();
            // Your own constructor code
            $this->load->helper('url');
            $this->load->library('session');
            $this->load->library('form_validation');
         
            $this->load->library('pagination');
       }
       
        public function diagnostic_report(){
           $this->load->view('lab/diagnostic_report');
       }
       
       
       public function index() {
        $this->load->view('lab/index');
    }
       
       
       /*################### Lab blood bank/donor ###################################*/ 
       
       public function blood_bank(){
            $this->load->model('nurse_model');
           $data['a']=$this->nurse_model->a();
                $data['a1']=$this->nurse_model->a1();
                $data['b']=$this->nurse_model->b();
                $data['b1']=$this->nurse_model->b1();
                $data['ab']=$this->nurse_model->ab();
                $data['ab1']=$this->nurse_model->ab1();
                $data['o']=$this->nurse_model->o();
                $data['o1']=$this->nurse_model->o1();
           $this->load->view('lab/blood_bank',$data);
       }
       
       public function blood_donor()
	{
                $this->load->model('nurse_model');
                 $data['query']=$this->nurse_model->get_donors();
		$this->load->view('lab/manage_blood_donor',$data);
	}
        
         /*################### Lab profile ###################################*/ 
       public function lab_profile(){
           $this->load->view('lab/lab_profile');
       }
}