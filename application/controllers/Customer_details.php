<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_details extends CI_Controller {
	
	public function __construct(){
		
		parent::__construct();
		//Call model		
		$this->load->model('customer_details_model');
	}
 
	public function customer_details_list()
	{	
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Customer Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else
		{			
			$data['customer_details_list'] = $this->customer_details_model->customer_details_list(); 
			$this->load->view('customer_details_list', $data);
		}
	}
	public function add_customer_details()
	{
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Customer Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else
		{		
			$this->load->view('add_customer_details');
		}
	}
	// start add customer details in table
    public function validate_customer_details()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Customer Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
			$this->form_validation->set_rules('cus_type', 'Customer Type', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('cus_name', 'Customer Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('company', 'Company Name', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
			$this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('pincode', 'PinCode', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean');
			$this->form_validation->set_rules('country', 'country', 'trim|required|xss_clean');

			if($this->form_validation->run() == FALSE)
	   		{	 				
				$this->load->view('add_customer_details'); 	
			}
			else
			{ 
				if($query = $this->customer_details_model->add_customer_details())
				{
					$this->session->set_flashdata('success_msg', 'Customer details added successfully!');					
					redirect('customer_details/add_customer_details');		
				}	
				
			}
		}
    }
	// end add customer details in table
	// start edit customer details
    public function edit_customer_details()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Customer Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{ 
			$data['customer_details_data'] = $this->customer_details_model->get_customer_details($this->input->get('id'));
			$this->load->view('edit_customer_details', $data);	
		}
    }
	// end edit customer details

	// start validate_edit_customer_details 
    public function validate_edit_customer_details()
    { 
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Customer Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
	   		$this->form_validation->set_rules('cus_type', 'Customer Type', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('cus_name', 'Customer Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('company', 'Company Name', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
			$this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('pincode', 'PinCode', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean');
			$this->form_validation->set_rules('country', 'country', 'trim|required|xss_clean');
			
			if($this->form_validation->run() == FALSE)
	   		{
				$data['customer_details_data'] = $this->customer_details_model->get_customer_details($this->input->post('id')); 
				$this->load->view('edit_customer_details ', $data);	
			}
			else
			{
						
				if($query = $this->customer_details_model->edit_customer_details($this->input->post('id')))
				{	
					$this->load->helper(array('form', 'url', 'text','captcha','html'));
					$this->load->helper('text');
					$data['customer_details_list'] = $this->customer_details_model->customer_details_list(); 
					$this->session->set_flashdata('success_msg', 'customer details edited successfully!');	
					$this->load->view('customer_details_list', $data);					
				}
			}		
		}
    }
	// end validate_edit_customer_details

	// start approve customer
    function approve()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Customer Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
			$this->load->model('customer_details_model'); 
			if($this->customer_details_model->approve())
			{				
				$this->session->set_flashdata('success_msg', 'Customer Status Changed successfully!');
			}
			
			redirect('customer_details/customer_details_list');						
		}
    }
	// end approver customer

	// start deny customer
    function deny()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Customer Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
			$this->load->model('customer_details_model'); 
			if($this->customer_details_model->deny())
			{				
				$this->session->set_flashdata('success_msg', 'Customer Status Changed successfully!');
			}
			redirect('customer_details/customer_details_list');						
		}
    }
	// end deny customer

	// start delete customer details
	public function delete()
	{
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Customer Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
		if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{			
			if($this->customer_details_model->delete($this->input->get('id')))
			{				
				$this->session->set_flashdata('success_msg', 'Customer Details Deleted Successfully!');		
			   
			}
			else
			{
				$this->session->set_flashdata('failear_msg', 'Circuit number Is Used By Other Module');
			}
			 redirect('customer_details/customer_details_list', $data);						
		}
	}
	// end delete customer details	
	
	
	//start view customer details
	function view_customer_details(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Customer Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
		if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
			$data['view_customer_details'] = $this->customer_details_model->get_customer_details($this->input->get('id'));
			$this->load->view('view_customer_details', $data);
		}
		
	}
	
	//End view customer details
	
	//start get customer name list
	function get_cus_type_list(){
	
		$data = $this->customer_details_model->get_cus_type_list($this->input->get('type'));
		$cus_name ='<option value="">Select Customer Name</option>';
		foreach($data->result() as $cus){
			
			$cus_name .= '<option value="'.$cus->Customer_id.'">'.$cus->Customer_name.'</option>';
		}
		echo $cus_name; 
	}
	// end  get customer name list
	//start get customer name details
	function get_cus_deatils(){
	
		$data = $this->customer_details_model->get_cus_deatils($this->input->get('cust_id'));
		
		foreach($data->result() as $cus_d){
			
			$cus_details = $cus_d->Customer_comp.'^'.$cus_d->Customer_address.'^'.$cus_d->Customer_phone.'^'.$cus_d->Customer_email;
		}
		echo $cus_details; 
	}
	// end  get customer name details

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
