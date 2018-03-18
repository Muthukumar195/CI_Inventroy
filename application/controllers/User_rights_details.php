<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_rights_details extends CI_Controller {
	
	public function __construct(){
		
		parent::__construct();
		$this->load->model('user_rights_details_model');
	}
    
	public function user_rights_details_list()
	{	
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("User Rights", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}

		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else
		{
			$data['user_rights_details_list'] = $this->user_rights_details_model->user_rights_details_list(); 			
			$this->load->view('user_rights_details_list', $data);
		}
	}
	public function add_user_rights_details()
	{
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("User Rights", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}

		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else
		{	
			$this->load->view('add_user_rights_details');
		}
	}
	// start add user_rights_details in table
    public function validate_user_rights_details()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("User Rights", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else
		{			
			$this->load->library('session');
			$this->load->helper(array('form', 'url'));
			$this->load->library('javascript');
	   		$this->load->library('form_validation');
	   		$this->form_validation->set_rules('user_type', 'User Type', 'trim|required|callback_ajax_check_user_type|xss_clean');
	   		$this->form_validation->set_rules('user_rights[]','User Rights','trim|required|xss_clean');
	   		

			if($this->form_validation->run() == FALSE)
	   		{	
				$this->load->view('add_user_rights_details'); 	
			}
			else
			{ 
				if($query = $this->user_rights_details_model->add_user_rights_details())
				{
					$this->session->set_flashdata('success_msg', 'User Rights details added successfully!');					
					redirect('user_rights_details/add_user_rights_details');	
				}
			}
		}
    }
	// end add admin_user_rights_details in table
	// start edit user_rights_details
    public function edit_user_rights_details()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("User Rights", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
			
			$this->load->helper(array('form', 'url', 'text','captcha','html'));
			$data['user_rights_details_data'] = $this->user_rights_details_model->get_user_rights_details($this->input->get('id')); 
			$this->load->view('edit_user_rights_details', $data);	
		}
    }
	// end edit driver details

	// start admin_user_rights 
    public function validate_edit_user_rights_details()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("User Rights", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else
		{			
			$this->load->library('session');
			$this->load->helper(array('form', 'url'));
			$this->load->library('javascript');
	   		$this->load->library('form_validation');
	   		$this->form_validation->set_rules('user_type', 'User Type', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('user_rights[]','User Rights','trim|required|xss_clean');
	   		
			if($this->form_validation->run() == FALSE)
	   		{
				$data['user_rights_details_data'] = $this->admin_user_rights_details_model->get_admin_user_rights_details($this->input->post('id')); 
				$this->load->view('edit_user_rights_details', $data); 	
			}
			else
			{		
				if($query = $this->user_rights_details_model->edit_user_rights_details($this->input->post('id')))
				{
					$data['user_rights_details_list'] = $this->user_rights_details_model->user_rights_details_list(); 
					$this->session->set_flashdata('success_msg', 'User Rights details edited successfully!');	
					$this->load->view('user_rights_details_list', $data);					
				}
			}		
		}
    }
	// end admin_user_rights

	// start approve admin_user_rights
    function approve()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("User Rights", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
			if($this->user_rights_details_model->approve())
			{				
				$this->session->set_flashdata('success_msg', 'User Rights Status Changed successfully!');
			}
			redirect('user_rights_details/user_rights_details_list');						
		}
    }
	// end approver admin_user_rights

	// start deny admin_user_rights
    function deny()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("User Rights", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
			
			if($this->user_rights_details_model->deny())
			{				
				$this->session->set_flashdata('success_msg', 'User Rights Status Changed successfully!');
			}
			redirect('user_rights_details/user_rights_details_list');				
		}
    }
	// end deny admin_user_rights

	// start delete admin_user_rights details
	public function delete()
	{
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("User Rights", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
		if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
			$this->load->helper(array('form', 'url', 'text','captcha','html'));	
			if($this->user_rights_details_model->delete($this->input->get('id')))
			{				
				$this->session->set_flashdata('success_msg', 'User Rights Details Deleted Successfully!');
			}
			else
			{
				$this->session->set_flashdata('failear_msg', 'User Name Is Used By Other Module');
			}
			redirect('user_rights_details/user_rights_details_list');						
		}
	}
	// end delete admin_user_rights details

	function check_isvalidated()
	{
        if(! $this->session->userdata('username'))
        {	
        	$this->session->set_flashdata('failear_msg', 'Login Required');		
			redirect('tranport_main');			
        }		
		
    }

    // start check dmin_user_rightsexist
    function ajax_check_user_type($key)
    {       
        $is_exist = $this->user_rights_details_model->ajax_check_user_type($key); 

        if ($is_exist==1) 
		{
        	$this->form_validation->set_message('ajax_check_user_type', 'User Type already exist');  
        	return false;
    	} 
		else 
		{
        	return true;
    	}

    }
    // end check admin_user_rights  exist

    // start view admin_user_rights details
    public function view_admin_user_rights_details()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Admin User Rights", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
						
			$this->load->model('admin_user_rights_details_model');
			$this->load->model('edit_admin_profile_model'); 
			
			$data['get_admin_profile'] = $this->edit_admin_profile_model->get_admin_profile(); 
			$data['view_admin_user_rights'] = $this->admin_user_rights_details_model->get_admin_user_rights($this->input->get('id')); 
			$this->load->view('view_admin_user_rights_details', $data);	
		}
    } 
    // end view admin_user_rights details

    function check_user_rights()
    {
        $this->session->set_flashdata('failear_msg', 'Access Denied');		
		redirect('project_main');			
    }

}
