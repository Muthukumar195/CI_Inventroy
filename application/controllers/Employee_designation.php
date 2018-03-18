<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//session_start();
class Employee_designation extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
    {
        parent::__construct();
        $this->load->model('employee_designation_model');
    }

	public function employee_designation_details_list()
	{
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
        // end for check user rights
		if((in_array("Employee Designation", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else
		{
			$data['employee_designation_details_list'] = $this->employee_designation_model->employee_designation_details_list();
			$this->load->view('employee_designation_details_list', $data);
		}
	}

    public function validate_employee_designation_details()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
        // end for check user rights
		if((in_array("Employee Designation", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
	   		$this->form_validation->set_rules('employee_designation_name', 'designation Name', 'trim|required|xss_clean|callback_ajax_check_designation_name');
			if($this->form_validation->run() == FALSE)
	   		{
				$data['employee_designation_details_list'] = $this->employee_designation_model->employee_designation_details_list();
				$this->load->view('employee_designation_details_list',$data);
			}
			else
			{
					if($query = $this->employee_designation_model->add_employee_designation_details())
					{
						$this->session->set_flashdata('success_msg', 'Employee designation details added successfully!');
						redirect('employee_designation/employee_designation_details_list');
					}
			}
		}
    }
	// end add employee designation details table

	// start edit edit_employee_designation_details
    public function edit_employee_designation_details()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
        // end for check user rights
		if((in_array("Employee Designation", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
			$this->load->helper('text');
			$data['employee_designation_data'] = $this->employee_designation_model->get_employee_designation_details($this->input->get('id'));
			$this->load->view('edit_employee_designation_details', $data);
		}
    }
	// end edit edit_employee_designation_details


	// start validate_edit_employee_designation
    public function validate_edit_employee_designation()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
        // end for check user rights
		if((in_array("Employee Designation", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
	   		$this->form_validation->set_rules('employee_designation_name', 'designation Name', 'trim|required|xss_clean');
			if($this->form_validation->run() == FALSE)
	   		{
				$this->load->helper(array('form', 'url', 'text','captcha','html'));
				$this->load->helper('text');
				$data['employee_designation_data'] = $this->employee_designation_model->get_employee_designation_details($this->input->post('id'));
				$this->load->view('edit_employee_designation_details', $data);
			}
			else
			{
				if($query = $this->employee_designation_model->edit_employee_designation_details($this->input->post('id')))
				{
					$this->load->helper(array('form', 'url', 'text','captcha','html'));
					$this->load->helper('text');
					$data['employee_designation_details_list'] = $this->employee_designation_model->employee_designation_details_list();
					$this->session->set_flashdata('success_msg', 'Employee designation details edited successfully!');
					$this->load->view('employee_designation_details_list', $data);
        
				}
			}
		}
    }
	// end validate_edit_employee_designation
	// start approve
    function approve()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
        // end for check user rights
		if((in_array("Employee Designation", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
			if($this->employee_designation_model->approve())
			{
				$this->session->set_flashdata('success_msg', 'Employee designation Status Changed successfully!');
			}
			$data['employee_designation_details_list'] = $this->employee_designation_model->employee_designation_details_list();
			redirect('employee_designation/employee_designation_details_list', $data);
		}
    }
	// end approver

	// start deny
    function deny()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
        // end for check user rights
		if((in_array("Employee Designation", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
			if($this->employee_designation_model->deny())
			{
				$this->session->set_flashdata('success_msg', 'Employee designation Status Changed successfully!');
			}
			$data['employee_designation_details_list'] = $this->employee_designation_model->employee_designation_details_list();
			redirect('employee_designation/employee_designation_details_list', $data);
		}
    }
	// end deny

	// start delete
	public function delete()
	{
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
        // end for check user rights
		if((in_array("Employee Designation", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
		if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
			if($this->employee_designation_model->delete($this->input->get('id')))
			{
				$this->session->set_flashdata('success_msg', 'Employee designation Details Deleted Successfully!');
				$data['employee_designation_details_list'] = $this->employee_designation_model->employee_designation_details_list();
			    redirect('employee_designation/employee_designation_details_list', $data);
			}
		}
	}
	// end delete

	// start check employee designation name exist check
    function ajax_check_designation_name($key)
    {
        $is_exist = $this->employee_designation_model->ajax_check_designation_name($key);
        if ($is_exist==1)
		{
        	$this->form_validation->set_message('ajax_check_designation_name', 'designation Name already Exist');
        	return false;
    	}
		else
		{
        	return true;
    	}
    }
    // end check employee designation name exist check

	function check_isvalidated()
	{
        if(! $this->session->userdata('username'))
        {
        	$this->session->set_flashdata('failear_msg', 'Login Required');
			redirect('project_main');
        }

    }

    function check_user_rights()
    {
        $this->session->set_flashdata('failear_msg', 'Access Denied');
		redirect('project_main');
    }
}
