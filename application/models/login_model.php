<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    public function validate(){
    	//gettin the user input

        $username=$this->input->post('emailAddress');
        $password=$this->input->post('password');

        echo $password;
        echo $username;

        // $this->form_validation->set_rules('emailAddress', 'Email Address', 'trim|required|valid_email');
        // $this->form_validation->set_rules('password', 'Password', 'trim|required');

      

                        	//prepping the query
                        	// $this->db->where('emailAddress', $emailAddress);
                        	// $this->db->where('password', $password);

                        	//running the query
                        	// $query=$this->db->get('tblaccount');

                        	//now checking whether there are any results
                        	// if($query->num_rows==1){

                        	// 	//if there is a user, create the session data
                        	// 	$row=$query->row();
                        	// 	$data=array(
                        	// 		'id'=>$row->id,
                        	// 		'firstname'=>$row->firstname,
                        	// 		'lastname'=>$row->lastname,
                        	// 		'location'=>$row->location
                        	// 		);
                        	// 	$this->session->set_userdata($data);
                        	// 	return true;
    	}
    	//if the previous process did not validate, return false
        

    }
?>