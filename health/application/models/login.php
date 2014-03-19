<?php
class Login extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
    }


public function validate(){
        // grab user inpu
    
        $username = $this->security->xss_clean($this->input->post('email'));
        $password = $this->security->xss_clean($this->input->post('pass'));
        $account_type = $this->security->xss_clean($this->input->post('login_type'));
        
        // Prep the query
        $this->db->where('email', $username);
        $this->db->where('password', $password);
        $this->db->where('type',  $account_type);
       
        // Run the query
        $query = $this->db->get('users');
        
        return $query->result(); 
}
//public function validate($user_category) {
//
//        $email = $this->input->post('email');
//        $pass = $this->input->post('pass');
//      
//
//        switch ($user_category) {
//            case 1:
//                //building the necessary query for the admin table
//                $this->db->where('email', $email);
//                $this->db->where('password', $pass);
//                $this->db->where('id', 1);
//                $query = $this->db->get('users');
//                return $query;
//                break;
//            case 2:
//                //building the necessary query for the financiers table
//                $this->db->where('email', $email);
//                $this->db->where('password', $pass); 
//                $this->db->where('id', 2);
//                $query = $this->db->get('users');
//                return $query;
//                break;
//            case 3:
//                //building the necessary query for the sellers table
//                $this->db->where('email', $email);
//                $this->db->where('password', $pass);
//                 $this->db->where('id', 3);
//                $query = $this->db->get('users');
//                return $query;
//                break;
//            case 4:
//                //building the necessary query for the sellers table
//                $this->db->where('email', $email);
//                $this->db->where('password', $pass);
//                 $this->db->where('id', 4);
//                $query = $this->db->get('users');
//                return $query;
//                break;
//              case 5:
//                //building the necessary query for the sellers table
//                $this->db->where('email', $email);
//                $this->db->where('password', $pass);
//                 $this->db->where('id', 5);
//                $query = $this->db->get('users');
//                return $query;
//                break;
//              case 6:
//                //building the necessary query for the sellers table
//                $this->db->where('email', $email);
//                $this->db->where('password', $pass);
//                $this->db->where('id', 6);
//                $query = $this->db->get('users');
//                return $query;
//                break;
//        }
//    }
}