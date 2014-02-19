<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pharmacy extends CI_Controller {

	  public function __construct()
       {
            parent::__construct();
            // Your own constructor code
            $this->load->helper('url');
            $this->load->library('session');
            $this->load->library('form_validation');
            $this->load->model('nurse_model');
            $this->load->library('pagination');
       }
       
       public function login()
	{
		$this->load->view('pharmacy/index');
	}
        
         public function medicine_category()
	{
		$this->load->view('pharmacy/medicine_category');
               
	}
        public function manage_medicine()
	{
		$this->load->view('pharmacy/manage_medicine');
               
	}
        public function prescription()
	{
		$this->load->view('pharmacy/prescription');
               
	}
        public function pharmacist_profile()
	{
		$this->load->view('pharmacy/pharmacist_profile');
               
	}
        
         public function edit_prescription()
	{
		$this->load->view('pharmacy/edit_prescription');
               
	}
     
       
       
       
}