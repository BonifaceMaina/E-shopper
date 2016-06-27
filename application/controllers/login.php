<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	}
public function index($msg=NULL){
	//this will load the view to be displayed to the user
	//$this->load->library('../controllers/main');
	$data['msg']=$msg;	
	//$this->main->login();
}
public function process(){
	//loading the model
	$this->load->model('login_model');
	//validating that the user can log in
	$this->form_validation->set_rules('emailAddress', 'Email Address', 'trim|required|valid_email');
	$this->form_validation->set_rules('password', 'Password', 'trim|required');

	if ($this->form_validation->run()==FALSE) {
		echo validation_errors();
		
		$this->load->view('header');
	}
	else{
		$this->load->view('account');

	}
	
}	

}

?>