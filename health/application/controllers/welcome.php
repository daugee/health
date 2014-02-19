<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
//           $this->load->model('nurse_model');
//           $data['query']=$this->nurse_model->get_patient();
		$this->load->view('lab/index');
//               $this->load->view('nurse/index',$data);
	}
        /* Nurse controller main */
        public function nurse(){
            
             $this->load->model('nurse_model');
             $data['query']=$this->nurse_model->get_patient();
	     $this->load->view('nurse/index',$data);
        }

        public function login()
	{
		$this->load->view('welcome_message');
	}
        public function register()
	{
		$this->load->view('welcome_message');
	}
         public function patient_list()
	{
                 $data['query']=$this->nurse_model->get_patient();
		$this->load->view('nurse/patient_list',$data);
	}
         public function new_patient()
	{
		$this->load->view('nurse/new_patient');
	}
         public function patient_profile()
	{
		$this->load->view('nurse/patient_profile');
	}
        public function manage_bed()
	{
               
                $data['query']=$this->nurse_model->get_bed();
		$this->load->view('nurse/manage_bed',$data);
	}
        
        //bed allotment function
         public function bed_allotment()
	{  
                $data['allotment']= $this->nurse_model->get_bedallotment();
                $data['query']=$this->get_bed();
                $data['result']=$this->get_patient();
                $data['main_content'] = 'nurse/bed_allotment';
                $this->load->view('nurse/template', $data);
//		$this->load->view('nurse/bed_allotment',$data);
	}
        
        //get bed function
        public function get_bed (){
            $q=$this->nurse_model->get_bed();
            if ($q){
                return $q;
            }
            
        }
        
        //function of getting patient
        public function get_patient (){
            $q=$this->nurse_model->get_patient();
            if ($q){
                return $q;
            }
            
        }
        
         //function of getting nurse report
        public function get_nurse_report (){
            $q=$this->nurse_model->get_nurse_report();
            if ($q){
                return $q;
            }
            
        }

        public function nurse_report()
	{   
                $data['result']=$this->get_patient();
                $data['query']=$this->nurse_model->get_nurse_report_operation();
                $data['q']=$this->nurse_model->get_nurse_report_birth();
                $data['d']=$this->nurse_model->get_nurse_report_death();
                $data['oth']=$this->nurse_model->get_nurse_report_other();
		$this->load->view('nurse/nurse_report',$data);
	}
         public function nurse_profile()
	{
		$this->load->view('nurse/nurse_profile');
	}
        public function add()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
            $this->form_validation->set_rules('patientname', 'patientname', 'required');
            
            $this->form_validation->set_rules('email','email','trim|required|valid_email');
            $this->form_validation->set_rules('password','password','trim|required|min_length[6]');
            $this->form_validation->set_rules('address','address','trim');
            $this->form_validation->set_rules('phone','phone','trim|required');
            $this->form_validation->set_rules('gender', 'gender', 'required');
            $this->form_validation->set_rules('birthdate', 'birthdate', 'required');
            $this->form_validation->set_rules('age', 'age', 'required|numeric');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            
            if($this->form_validation->run()==FALSE){
                $this->load->view('nurse/new_patient');
            }
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
               
                if ($this->input->post('gender')==0){
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
                }
                else if($this->input->post('gender')==1){
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
                if($this->nurse_model->add_patient($data_to_store)){
                    $data['flash_message'] = TRUE; 
                    redirect('welcome/patient_list',$data);
                }else{
                    $data['flash_message'] = FALSE; 
                    redirect('welcome/patient_list',$data);
                }

            }

        }
    }
        
    
    /*bed addition and validation function */
    public function add_bed()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
            $this->form_validation->set_rules('bedno', 'bedno', 'required');            
            $this->form_validation->set_rules('bedtype','bedtype','required');
            $this->form_validation->set_rules('description','description','required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            
            if($this->form_validation->run()==FALSE){
                $this->load->view('nurse/manage_bed');
            }
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
               
                
                    $data_to_store = array(
                    'bedno' => $this->input->post('bedno'),
                    'bedtype' => $this->input->post('bedtype'),
                    'description' => $this->input->post('description')                    
                        );
               
                //if the insert has returned true then we show the flash message
                if($this->nurse_model->add_bed($data_to_store)){
                    $data['flash_message'] = TRUE; 
                      redirect('welcome/manage_bed',$data);
                }else{
                    $data['flash_message'] = FALSE;
                      redirect('welcome/manage_bed',$data);
                }

            }

        }
    }
    
    /*bed allotment addition and validation function */
    public function add_bedallotment()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
            $this->form_validation->set_rules('bedno', 'bedno', 'required');            
            $this->form_validation->set_rules('patient','patient','required');
             $this->form_validation->set_rules('allotmentdate', 'allotmentdate', 'required'); 
            $this->form_validation->set_rules('dischargedate','dischargedate','required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            
            if($this->form_validation->run()==FALSE){
                $this->load->view('nurse/bed_allotment');
            }
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
               
                
                    $data_to_store = array(
                    'bedno' => $this->input->post('bedno'),
                    'patient' => $this->input->post('patient'),
                    'patient' => $this->input->post('patient'),
                    'allotmentdate' => $this->input->post('allotmentdate'),
                    'dischargedate' => $this->input->post('dischargedate')
                        );
               
                //if the insert has returned true then we show the flash message
                if($this->nurse_model->add_bedallotment($data_to_store)){
                    $data['flash_message'] = TRUE; 
                      redirect('welcome/bed_allotment',$data);
                }else{
                    $data['flash_message'] = FALSE;
                      redirect('welcome/bed_allotment',$data);
                }

            }

        }
    }
  
    
 //nurse report add function
    
    public function add_nurse_report()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
            $this->form_validation->set_rules('type', 'type', 'required');
            
            $this->form_validation->set_rules('description','description','required');
            $this->form_validation->set_rules('doctor','doctor','required');
            $this->form_validation->set_rules('patient','patient','required');
            $this->form_validation->set_rules('date','date','required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            
            if($this->form_validation->run()==FALSE){
                $this->load->view('nurse/nurse_report');
            }
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
               
                
                    $data_to_store = array(
                    'type' => $this->input->post('type'),
                    'description' => $this->input->post('description'),
                    'doctor' => $this->input->post('doctor'),
                    'patient' => $this->input->post('patient'),          
                    'date' => $this->input->post('date')
                  
                        );
                            
                //if the insert has returned true then we show the flash message
                if($this->nurse_model->add_nurse_report($data_to_store)){
                    $data['flash_message'] = TRUE; 
                    redirect('welcome/nurse_report',$data);
                }else{
                    $data['flash_message'] = FALSE;
                    redirect('welcome/nurse_report',$data);
                }

            }

        }
    }
    
    /**********************************************************************************************************
                                    blood donors
     * * ********************************************************************************************************************
     
     */
  public function blood_bank()
	{   
                $data['a']=$this->nurse_model->a();
                $data['a1']=$this->nurse_model->a1();
                $data['b']=$this->nurse_model->b();
                $data['b1']=$this->nurse_model->b1();
                $data['ab']=$this->nurse_model->ab();
                $data['ab1']=$this->nurse_model->ab1();
                $data['o']=$this->nurse_model->o();
                $data['o1']=$this->nurse_model->o1();
                
                $this->load->view('nurse/manage_blood_bank',$data);
	}
        public function blood_donors()
	{
                 $data['query']=$this->nurse_model->get_donors();
		$this->load->view('nurse/manage_blood_donor',$data);
	}
        
    // add blood donor
     public function add_donor()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
            $this->form_validation->set_rules('name', 'name', 'required');           
            $this->form_validation->set_rules('email','email','trim|required|valid_email');
            $this->form_validation->set_rules('address','address','trim');
            $this->form_validation->set_rules('phone','phone','trim|required');
            $this->form_validation->set_rules('gender', 'gender', 'required');
            $this->form_validation->set_rules('age', 'age', 'required|numeric');
            $this->form_validation->set_rules('donationdate', 'donationdate', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            
            if($this->form_validation->run()==FALSE){
                $this->load->view('nurse/manage_blood_donor');
            }
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
               
                
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
                if($this->nurse_model->add_donor($data_to_store)){
                    $data['flash_message'] = TRUE; 
                    redirect('welcome/blood_donors',$data);
                }else{
                    $data['flash_message'] = FALSE; 
                    redirect('welcome/blood_donors',$data);
                }
            }
            }

        }
    
        
    
        
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */