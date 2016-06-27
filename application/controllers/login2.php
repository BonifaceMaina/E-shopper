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
	$result=$this->login_model->validate();
	//verifying the result
	if(!$result){
		//if the user did not validate, show them the login page again
		$this->index();
	}
	else{
		//if the user validated, send them to some page...
		redirect('account');
	}
}	

}

?>