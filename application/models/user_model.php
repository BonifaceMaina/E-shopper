<?php 
	Class User_model extends CI_Model{



		

		public function login_validate(){
			$this->form_validation->set_rules('emailAddress', 'Email Address', 'trim|required|valid_email|callback_login_validate_credentials');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if($this->form_validation->run()==FALSE){
				return FALSE;
			}
			else{
				return true;
			}

		}

		public function can_log_in(){
			$this->db->where('emailAddress', $this->input->post('emailAddress'));
			$this->db->where('password', $this->input->post('password'));
			$query=$this->db->get('tblaccount');

			if($query->num_rows()==1){
				return true;
			}else{
				return false;
			}
		}

		public function username_available(){
			$this->db->where('emailAddress', $this->input->post('emailAddress'));
			$query=$this->db->get('tblaccount');

			if($query->num_rows()==1){
				return false;
			}else{
				return true;
			}

		}

		function account_validate(){
			$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('emailAddress', 'Email Address', 'trim|required|valid_email');
			$this->form_validation->set_rules('location', 'Location', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|matches[password]');

			if ($this->form_validation->run()==FALSE) {

				return FALSE;
			}
			else{
				return true;
			}
			
		}

		function account_insert(){
			$firstname=$this->input->post('firstname');
			$lastname=$this->input->post('lastname');
			$emailAddress=$this->input->post('emailAddress');
			$location=$this->input->post('location');
			$password=$this->input->post('password');

			$data=array(
				'firstname'=>$firstname,
				'lastname'=>$lastname,
				'emailAddress'=>$emailAddress,
				'location'=>$location,
				'password'=>$password);
			$this->db->insert('tblaccount', $data);


		}
		function getAll(){
			$results=$this->db->get('products')->result();
			foreach ($results as $result) {
				if($result->option_values){
					$result->option_values=explode(',', $result->option_values);
				}
				
			}
			return $results;
		}
		
		 function get($id){
			$results=$this->db->get_where('products', array('id'=>$id))->result();
			$result=$results[0];	

			if($result->option_values){
					$result->option_values=explode(',', $result->option_values);
				}		
				return $result;

		}
	}
 ?>