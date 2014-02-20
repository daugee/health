<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login controller class
 */
class Login extends CI_Controller{
    
    function __construct(){
        parent::__construct();
    }
    
    
    public function login($msg= NULL)
	{
                 $data['msg'] = $msg;
                $this->load->view('welcome_message', $data);
		

	}
    
    public function process(){
        
                $this->load->library('form_validation');
                $this->form_validation->set_rules('email', 'Email Address?', 'trim|required|valid_email');
                $this->form_validation->set_rules('pass', 'Password?', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
           
            redirect('login/login'); //redirecting to the login view
         
        }
        else{
        // Load the model
        $this->load->model('login');
        // Validate the user can login
        $result = $this->login_model->validate();
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
            $msg = '<font color=red>Invalid username and/or password.</font><br />';
            $this->index($msg);
        }else{
            // If user did validate, 
            // Send them to members area
            redirect('home');
        }        
    }
    }
}
?>