<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_details extends CI_Controller {
	
	public function __construct(){
		
		parent::__construct();
		//Call model
		$this->load->model('user_rights_details_model');
		$this->load->model('user_details_model');
	}
 
	public function user_details_list()
	{	
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("User", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else
		{
			$this->load->model('user_details_model');
			$data['user_details_list'] = $this->user_details_model->user_details_list(); 
			$this->load->view('user_details_list', $data);
		}
	}
	public function add_user_details()
	{
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("User", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
			$this->load->view('add_user_details',$data);
		}
	}
	// start add user details in table
    public function validate_user_details()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("User", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else
		{
	   		$this->load->library('form_validation');
	   		$this->form_validation->set_rules('fullname', 'Full Name', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('username', 'User Name', 'trim|required|callback_ajax_check_username|xss_clean');
			$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('user_rights', 'User Rights', 'trim|required|xss_clean');

			if($this->form_validation->run() == FALSE)
	   		{ 			    $data['user_rights_details_list'] = $this->user_rights_details_model->user_rights_details_list();	 				
				$this->load->view('add_user_details',$data); 	
			}
			else
			{ 
				$this->load->helper('inflector');
				$config = array(
				/*'file_name'=>'ssssssssssss',*/
				'upload_path' => "./uploads/admin_profile/",
				'allowed_types' => "gif|jpg|png|jpeg|pdf",
				'overwrite' => FALSE,
				'max_size' => "2048000" // Can be set to particular file size , here it is 2 MB(2048 Kb)
				/*'max_height' => "768",
				'max_width' => "1024"*/
				);
				$this->load->library('upload', $config); 
				if($this->upload->do_upload())
				{
					if($query = $this->user_details_model->add_user_details())
					{
						$res = $this->upload->data();
						$file_path     = $res['file_path'];
						$file         = $res['full_path'];
						$file_ext     = $res['file_ext'];
						$final_file_name = $this->user_details_model->upload_file($file_ext); 
						rename($file, $file_path . $final_file_name); 
						$this->session->set_flashdata('success_msg', 'User details added successfully!');					
						redirect('user_details/add_user_details');		
					}	
				}
			}
		}
    }
	// end add user details in table
	// start edit user details
    public function edit_user_details()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("User", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{ 
			$data['user_details_data'] = $this->user_details_model->get_user_details($this->input->get('id'));
			$data['user_rights_details_list'] = $this->user_rights_details_model->user_rights_details_list();
			$this->load->view('edit_user_details', $data);	
		}
    }
	// end edit user details

	// start validate_edit_user_details 
    public function validate_edit_user_details()
    { 
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("User", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else
		{			
			$this->load->library('form_validation');
	   		$this->form_validation->set_rules('fullname', 'Username', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('username', 'User Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|callback_ajax_check_password|xss_clean');
			$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('user_rights', 'User Rights', 'trim|required|xss_clean');
			if($this->form_validation->run() == FALSE)
	   		{
				$data['user_details_data'] = $this->user_details_model->get_user_details($this->input->post('id')); 
				$data['user_rights_details_list'] = $this->user_rights_details_model->user_rights_details_list();
				$this->load->view('edit_user_details', $data);	
			}
			else
			{
				$this->load->helper('inflector');
				$config = array(
				/*'file_name'=>'ssssssssssss',*/
				'upload_path' => "./uploads/admin_profile/",
				'allowed_types' => "gif|jpg|png|jpeg|pdf",
				'overwrite' => FALSE,
				'max_size' => "2048000" // Can be set to particular file size , here it is 2 MB(2048 Kb)
				/*'max_height' => "768",
				'max_width' => "1024"*/
				);
				$this->load->library('upload', $config); 
				if($this->upload->do_upload())
				{					    
						$res = $this->upload->data();
						if(($file_ext     = $res['file_ext'])!="")
						{  
							$path="".base_url()."/uploads/admin_profie/".$this->input->post('file_name')."";
							//unlink($path);							
							//delete_files($path);
							@unlink(base_url().'uploads/admin_profie/'.$this->input->post('file_name'));
							$file_path     = $res['file_path'];
							$file         = $res['full_path'];
							$file_ext     = $res['file_ext'];
							$final_file_name = $this->user_details_model->edit_upload_file($file_ext); 
							rename($file, $file_path . $final_file_name);  		
						}			
				}
						
				if($query = $this->user_details_model->edit_user_details($this->input->post('id')))
				{	
					$this->load->helper(array('form', 'url', 'text','captcha','html'));
					$this->load->helper('text');
					$data['user_details_list'] = $this->user_details_model->user_details_list(); 
					$this->session->set_flashdata('success_msg', 'User details edited successfully!');	
					$this->load->view('user_details_list', $data);					
				}
			}		
		}
    }
	// end validate_edit_user_details

	// start approve user
    function approve()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("User", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
			$this->load->model('user_details_model'); 
			if($this->user_details_model->approve())
			{				
				$this->session->set_flashdata('success_msg', 'User Status Changed successfully!');
			}
			$data['user_details_list'] = $this->user_details_model->user_details_list(); 
			
			redirect('user_details/user_details_list', $data);						
		}
    }
	// end approver user

	// start deny user
    function deny()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("User", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
			$this->load->model('user_details_model'); 
			if($this->user_details_model->deny())
			{				
				$this->session->set_flashdata('success_msg', 'User Status Changed successfully!');
			}
			$data['user_details_list'] = $this->user_details_model->user_details_list(); 
			
			redirect('user_details/user_details_list', $data);						
		}
    }
	// end deny user

	// start delete user details
	public function delete()
	{
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("User", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
			$this->load->model('user_details_model');
			// start delete file			
			@unlink(base_url().'uploads/admin_profie/'.$this->input->get('file_name'));
			// end delete file 
			if($this->user_details_model->delete($this->input->get('id')))
			{				
				$this->session->set_flashdata('success_msg', 'User Details Deleted Successfully!');
				$data['user_details_list'] = $this->user_details_model->user_details_list(); 
				
			    redirect('user_details/user_details_list', $data);
			}
									
		}
	}
	// end delete user details

	 // start check user username exist
    function ajax_check_username($key)
    {    	 
		$this->load->model('user_details_model');        
        $is_exist = $this->user_details_model->ajax_check_username($key); 

        if ($is_exist==1) 
		{
        	$this->form_validation->set_message('ajax_check_username', 'User Name already Exist');  
        	return false;
    	} 
		else 
		{
        	return true;
    	}

    }
    // end check user username exist

    // start check user password exist
    function ajax_check_password($key)
    {    	 
		$this->load->model('user_details_model');        
        $is_exist = $this->user_details_model->ajax_check_password($key); 

        if ($is_exist==0) 
		{
        	$this->form_validation->set_message('ajax_check_password', 'Old Password not match');  
        	return false;
    	} 
		else 
		{
        	return true;
    	}

    }
    // end check user password exist

    // start view user details
    public function view_user_details()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("User", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
						
			$this->load->model('user_details_model');
			$this->load->model('edit_admin_profile_model'); 
			$data['get_admin_profile'] = $this->edit_admin_profile_model->get_admin_profile(); 
			$data['view_user_details'] = $this->user_details_model->get_user_details($this->input->get('id')); 
			
			$this->load->view('view_user_details', $data);	
		}
    } 
    // end view user details

    function check_user_rights()
    {
        $this->session->set_flashdata('failear_msg', 'Access Denied');		
		redirect('project_main');			
    }
	
	
	function check_isvalidated()
	{
        if(! $this->session->userdata('username'))
        {	
        	$this->session->set_flashdata('failear_msg', 'Login Required');		
			redirect('tranport_main');			
        }		
		
    }

}
