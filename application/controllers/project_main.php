<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct(){
		 
		 parent ::__construct();
		 $this->load->model('login');
	 }
	public function index()
	{
		$this->load->view('login');
	}
	public function validation_login(){
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','trim|required|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean');
		if($this->form_validation->run() == FALSE){
			
			$this->load->view('login');
		}
		else{
			
		 $username = $this->input->post('username');
		 $password = $this->input->post('password');
		 $result = $this->login->validate($username,$password);
			 if($result){
				 foreach($result as $row){
					$user_id=$row->Admin_id;					
					$user_full_name=$row->Admin_fullname;
					$email=$row->Admin_email;
					$phone=$row->Admin_phone;
					$username=$row->Admin_username;
					$profile=$row->Admin_profile;
					$user_type=$row->Admin_type;
					$user_rights_dtl=$row->User_rights_type_value;
				 }
				$data = array(
						'username' => $this->input->post('username'),
						'user_id'=>$user_id,
						'is_logged_in' => true,					
						'user_full_name' => $user_full_name,
						'email' => $email,
						'phone' => $phone,
						'username' => $username,
						'profile' => $profile,
						'user_type' => $user_type,
						'user_rights_dtl' => $user_rights_dtl
					);
					$this->session->set_userdata($data);				
					redirect('project_main/dashboard');
			} 
			else // incorrect username or password
			{
				$this->session->set_flashdata('failear_msg', 'Invalid Username and Password');
				redirect('project_main');
			}
			
		}
		
	}
	
	public function dashboard(){
		
		if(! $this->session->userdata('username')){
			
			$this->check_isvalidated();
		}
		else{
			$this->load->model('customer_details_model');
			$this->load->model('employee_model');
			$data['total_customer'] = $this->customer_details_model->total_customer();
			$data['total_retailer'] = $this->customer_details_model->total_retailer();
			$data['total_wholesaler'] = $this->customer_details_model->total_wholesaler();
			$data['total_employee'] = $this->employee_model->total_employee();
		    $this->load->view('dashboard', $data);
		}
	}
	
	public function logout(){
		
		 $this->session->unset_userdata('logged_in');
         $this->session->sess_destroy();
		 $data['success_msg']='Logout Successfully!';
		 $this->load->view('login',$data);
	}
	
	public function check_isvalidated(){
		
		 if(! $this->session->userdata('username')){	
        	$this->session->set_flashdata('failear_msg', 'Login Required');		
			redirect('project_main');			
        }
	}
	
}
