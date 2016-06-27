<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct(){
		parent::__construct();
		
	}

	public function index(){
		$this->home();
	}
	
	public function home()
	{
		
		$this->load->view('header');		
		$this->load->view('slider');
		//loading the data from the model...
		$data['products']=$this->user_model->getAll();
		$this->load->view('allproducts', $data);			
		$this->load->view('footer');
	}
	public function account(){
		 $this->load->view('header');
		 if($this->session->userdata('is_logged_in')){
		 	$this->load->view('logout_first');
		 }
		 else{
			$this->load->view('account');		 	
		 }
		$this->load->view('footer');
	}

	public function cart(){
		$this->load->view('header');		
		//loading the data from the model...
		$data['products']=$this->user_model->getAll();
		$this->load->view('wishlist');			
		$this->load->view('footer');
	}


	public function account_validation(){

		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('emailAddress', 'Email Address', 'trim|required|valid_email|callback_check_availability');
		$this->form_validation->set_rules('location', 'Location', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|md5|matches[password]');

		if ($this->form_validation->run()==FALSE) {

			$this->account();
		}
		else{
			$this->user_model->account_insert();
			redirect('main/login', 'refresh');
		}
		
	}

	public function check_availability(){
		//this checks whether the email being used is already taken or not.
		if($this->user_model->username_available()){
			return true;
		}
		else{
			$this->form_validation->set_message('check_availability', ' The email Address already exists');
			return false;
		}

	}

	public function account_valid(){
		//form validation
		$this->user_model->account_validate();
		if($this->user_model->account_validate()==FALSE){
			$this->account();
		}
		else{
			$this->user_model->account_insert();
			redirect('main/login', 'refresh');
		}
	}
	//loads the wishlist view 
	public function wishlist(){		
		$this->load->view('header');
		$this->load->view('wishlist');
		$this->load->view('footer');
	}
	//this gives the login screen
	public function login(){
	$this->load->view('header');
	$this->load->view('login');
	$this->load->view('footer');

	}

	//validates whether the inserted details are valid...

public function login_process(){
			$this->form_validation->set_rules('emailAddress', 'Email Address', 'trim|required|valid_email|callback_login_validate_credentials');
			$this->form_validation->set_rules('password', 'Password', 'required|trim');
			if($this->form_validation->run()){
				$data=array(
					'emailAddress'=>$this->input->post('emailAddress'), 
					'is_logged_in'=>1 
					);
				$this->session->set_userdata($data);				
				redirect('main/home', 'refresh');
			}
			else{
				$this->login();
			}

		}
	public function login_validate_credentials(){
		if($this->user_model->can_log_in()){
			return true;
		}
		else{
			$this->form_validation->set_message('login_validate_credentials', ' Incorrect username/password');
			return false;
		}

	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('main/home', 'refresh');

	}
	public function add(){
print_r($this->input->post());

		// $this->user_model->get($this->input->post('id'));
		// $insert=array(
		// 	'id'=>$this->input->post('id'), 
		// 	'qty'=>1,
		// 	'price'=>$product->price, 
		// 	'name'=>$product->name
		// 	);
		// if($product->option_name){
		// 	$insert['options']=array(
		// 		$product->option_name=>$product->option_values[$this->input->post($product->option_name)]
		// 		);
		// }
		// $this->cart->insert($insert);
		// redirect('main/cart');
	}



	public function login_pro(){
		$this->user_model->login_validate();
		if($this->user_model->login_validate()==false){
				$this->login();
		
		}
		else{
			redirect('main/home', 'refresh');
			}
		}



}
?>
