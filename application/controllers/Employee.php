<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Employee extends CI_controller{
	
	public function __construct(){
		
		parent::__construct();
		$this->load->model('employee_model');
		$this->load->model('employee_department_model');
		$this->load->model('employee_designation_model');
	}
	//employee Details list
	function employee_details_list(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Employee Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			
			$data['employee_details_list'] = $this->employee_model->employee_details_list();
			$this->load->view('employee_details_list', $data);
		}
	}
	
	//add employee details
	function add_employee_details(){
		 
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Add Employee", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			
			$data['emp_department_name_list'] = $this->employee_department_model->employee_department_name_list();
			$data['emp_designation_name_list'] = $this->employee_designation_model->employee_designation_name_list();
		    $this->load->view('add_employee_details', $data);
		}
	}
	
	// start validate_employee_details
    public function validate_employee_details()
    { 
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Student", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
	   		$this->form_validation->set_rules('employee_code', 'Employee Code', 'trim|required|callback_check_employee_code|xss_clean');
	   		$this->form_validation->set_rules('emp_joining_date', 'Joining Date', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('department_name', 'Department name', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('designation_name', 'Designation_name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('qualification', 'Qualification', 'trim|required|xss_clean');
			$this->form_validation->set_rules('first_name', 'First name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('last_name', 'Last name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('dob', 'Date of birth', 'trim|required|xss_clean');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
			$this->form_validation->set_rules('present_address', 'Present address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('con_mobile', 'Mobile', 'trim|required|xss_clean');
			$this->form_validation->set_rules('con_email', 'E-mail', 'trim|required|xss_clean');
			$this->form_validation->set_rules('con_city', 'City', 'trim|required|xss_clean');
			$this->form_validation->set_rules('con_pin', 'Pin', 'trim|required|xss_clean');
			$this->form_validation->set_rules('country', 'County', 'trim|required|xss_clean');
			$this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean');
			if($this->form_validation->run() == FALSE)
	   		{
				$data['emp_department_name_list'] = $this->employee_department_model->employee_department_name_list();
			    $data['emp_designation_name_list'] = $this->employee_designation_model->employee_designation_name_list(); 
				$this->load->view('add_employee_details', $data); 	
			}
			else
			{
				
				$this->load->helper('inflector');
				$config = array(
				/*'file_name'=>'ssssssssssss',*/
				'upload_path' => "./uploads/employee_profile/",
				'allowed_types' => "gif|jpg|png|jpeg|pdf",
				'overwrite' => FALSE,
				'max_size' => "2048000" // Can be set to particular file size , here it is 2 MB(2048 Kb)
				/*'max_height' => "768",
				'max_width' => "1024"*/
				);
				$this->load->library('upload', $config); 
					if($query = $this->employee_model->add_employee_details())
					{
						if($this->upload->do_upload('employee_profile'))
				         { 
						$res = $this->upload->data();
						$file_path     = $res['file_path'];
						$file         = $res['full_path'];
						$file_ext     = $res['file_ext'];
						$final_file_name = $this->employee_model->upload_file($file_ext); 
						rename($file, $file_path . $final_file_name); 
						$this->session->set_flashdata('success_msg', 'Employee details added successfully!');					
						redirect('employee/add_employee_details');		
					}
						
				}
			}
		}
    }
	// end validate_employee_details
	
	//start Edit employee Details
	function edit_employee_details(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Employee Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			
			$data['emp_department_name_list'] = $this->employee_department_model->employee_department_name_list();
			$data['emp_designation_name_list'] = $this->employee_designation_model->employee_designation_name_list();
			$data['get_employee_details']  = $this->employee_model->get_employee_details($this->input->get('id'));
		    $this->load->view('edit_employee_details', $data);
		}
		
	}
	//End Edit employee Details
	
	//start validate_edit_employee details
	 public function edit_validate_employee_details()
    { 
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Employee Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
	   		$this->form_validation->set_rules('employee_code', 'Employee Code', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('emp_joining_date', 'Joining Date', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('department_name', 'Department name', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('designation_name', 'Designation_name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('qualification', 'Qualification', 'trim|required|xss_clean');
			$this->form_validation->set_rules('first_name', 'First name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('last_name', 'Last name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('dob', 'Date of birth', 'trim|required|xss_clean');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
			$this->form_validation->set_rules('present_address', 'Present address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('con_mobile', 'Mobile', 'trim|required|xss_clean');
			$this->form_validation->set_rules('con_email', 'E-mail', 'trim|required|xss_clean');
			$this->form_validation->set_rules('con_city', 'City', 'trim|required|xss_clean');
			$this->form_validation->set_rules('con_pin', 'Pin', 'trim|required|xss_clean');
			$this->form_validation->set_rules('country', 'County', 'trim|required|xss_clean');
			$this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean');
			if($this->form_validation->run() == FALSE)
	   		{
				$data['emp_department_name_list'] = $this->employee_department_model->employee_department_name_list();
			    $data['emp_designation_name_list'] = $this->employee_designation_model->employee_designation_name_list();
			    $data['get_employee_details']  = $this->employee_model->get_employee_details($this->input->post('id'));
				$this->load->view('edit_employee_details', $data); 	
			}
			else
			{ 
				$this->load->helper('inflector');
				$config = array(
				/*'file_name'=>'ssssssssssss',*/
				'upload_path' => "./uploads/employee_profile/",
				'allowed_types' => "gif|jpg|png|jpeg|pdf",
				'overwrite' => FALSE,
				'max_size' => "2048000" // Can be set to particular file size , here it is 2 MB(2048 Kb)
				/*'max_height' => "768",
				'max_width' => "1024"*/
				);
				$this->load->library('upload', $config);
				if($query = $this->employee_model->edit_employee_details($this->input->post('id')))
				{ 
					if($this->upload->do_upload('employee_profile'))
					{ 
						@unlink(base_url().'uploads/employee_profile/'.$this->input->post('employee_profile'));
						$res = $this->upload->data();
						$file_path     = $res['file_path'];
						$file         = $res['full_path'];
						$file_ext     = $res['file_ext'];
						$final_file_name = $this->employee_model->edit_upload_file($file_ext); 
						rename($file, $file_path . $final_file_name); 
					}
					$this->session->set_flashdata('success_msg', 'Employee details Edited successfully!');					
					redirect('employee/employee_details_list');
				}
			}
		}
    }
	
	//end validate_edit_employee_details
	
	// start approve employee
    function approve()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Employee Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username')){
			
			$this->check_isvalidated();
		}
		else
		{
			if($this->employee_model->approve())
			{				
				$this->session->set_flashdata('success_msg', 'Employee Status Changed successfully!');
			}
			$data['employee_details_list'] = $this->employee_model->employee_details_list();
			redirect('employee/employee_details_list', $data);						
		}
    }
	// end approver employee

	// start deny employee
    function deny()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Employee Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
			if($this->employee_model->deny())
			{				
				$this->session->set_flashdata('success_msg', 'Employee Status Changed successfully!');
			}
			$data['employee_details_list'] = $this->employee_model->employee_details_list();
			redirect('employee/employee_details_list', $data);						
		}
    }
	// end deny employee

	// start delete employee details
	public function delete()
	{
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Employee Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
		if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
			// start delete file			
			@unlink(base_url().'uploads/student_profile/'.$this->input->get('file_name'));
			// end delete file 
			if($this->employee_model->delete($this->input->get('id')))
			{				
				$this->session->set_flashdata('success_msg', 'Employee Details Deleted Successfully!');
				
			}
			$data['employee_details_list'] = $this->employee_model->employee_details_list();
			redirect('employee/employee_details_list', $data);	
									
		}
	}
	// end delete user details
	
	//start view employee details:
	function view_employee_details(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Employee Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
		if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
			$data['view_employee_details']  = $this->employee_model->get_employee_details($this->input->get('id'));
			$this->load->view('view_employee_details', $data);
			
		}
	}
	
	//end  view employee details:
	
	// start check employee code exist
    function check_employee_code($key)
    {    
        $is_exist = $this->employee_model->check_employee_code($key); 

        if ($is_exist==1) 
		{
        	$this->form_validation->set_message('check_employee_code', 'Employee Code already Exist');  
        	return false;
    	} 
		else 
		{
        	return true;
    	}

    }
    // end check  employee code exist
	
	
	//start ajax check employee code  alert
	function ajax_check_employee_code(){
		
		$data = $this->employee_model->ajax_check_employee_code($this->input->get('employee_code'));
		 if ($data==1) 
		{
		    echo 'Employee Code already Exist';
    	}
	}
	//end  ajax check employee code  alert
	//start ajax check employee name
	function ajax_check_employee_name(){
		
		$data = $this->employee_model->ajax_check_employee_name($this->input->get('emp_depar_id'));
		$emp_name ='<option value="">Select Employee Name</option>';
		foreach($data->result() as $emp){
			
			$emp_name .= '<option value="'.$emp->Employee_id.'">'.$emp->Employee_first_name.' '.$emp->Employee_middle_name.' '.$emp->Employee_last_name.'</option>';
		}
		echo $emp_name; 
	}
	// end  ajax check employee name
	//start ajax check employee department
	function ajax_check_employee_depart(){
		
		$data = $this->employee_model->ajax_check_employee_depart($this->input->get('emp_id'));
		$emp_depart ='';
		foreach($data->result() as $emp_d){
			$emp_depart .= '<input type="hidden" name="emp_department" value="'.$emp_d->Employee_department_id.'">';
		}
		echo $emp_depart; 
	}
	// end  ajax check employee department
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
			redirect('project_main');			
        }		
		
    }
}

