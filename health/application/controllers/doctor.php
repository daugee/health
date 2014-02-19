<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Doctor extends CI_Controller {
public function __construct()
       {
       parent::__construct();
             $this->load->helper('url');
            $this->load->library('session');
            $this->load->library('form_validation');
             $this->load->library('pagination');
       
       }
       public function index(){
           $this->load->model('nurse_model');
           $data['query']=$this->nurse_model->get_patient();
           $this->load->view('doctor/index',$data);
       }
       public function new_patient()
	{
		$this->load->view('doctor/new_patient');
	}
         public function patient_list()
	{
                $this->load->model('nurse_model');
                 $data['query']=$this->nurse_model->get_patient();
		$this->load->view('doctor/patient_list',$data);
	}
        
        public function appointment()
	{
                $this->load->model('nurse_model');
                $data['result']=$this->nurse_model->get_patient();
		$this->load->view('doctor/manage_appointment',$data);
	}
        
        public function add()
    {
            $this->load->model('nurse_model');
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
                $this->load->view('doctor/new_patient');
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
                    redirect('doctor/patient_list',$data);
                }else{
                    $data['flash_message'] = FALSE; 
                    redirect('doctor/patient_list',$data);
                }

            }

        }
    }
        
}