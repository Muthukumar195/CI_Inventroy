<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_details extends CI_Controller {

	public function __construct(){

		parent::__construct();
		//Call model
		$this->load->model('sales_details_model');
		$this->load->model('product_details_model');
		$this->load->model('tax_details_model');

	}

	public function sales_details_list()
	{
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
        // end for check user rights
		if((in_array("Sales Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else
		{
			$data['sales_details_list'] = $this->sales_details_model->sales_details_list();
			$data['customer_payment_list'] = $this->sales_details_model->customer_payment_list();
			$this->load->view('sales_details_list', $data);
		}
	}
	public function add_sales_details()
	{
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
        // end for check user rights
		if((in_array("Sales Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else
		{
			$data['product_name_list']=$this->product_details_model->product_name_list();
			$data['tax_details_list']=$this->tax_details_model->tax_details_list();
			$data['genrate_invoice_no'] = $this->sales_details_model->genrate_invoice_no(); 
			$this->load->view('add_sales_details', $data);
		}
	}
	// start validation sales details in table
    public function validate_sales_details()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
        // end for check user rights
		if((in_array("Sales Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
				$this->form_validation->set_rules('cus_type', 'Customer Type','trim|required|xss_clean');
				if(($this->input->post('cust_name')=="")&&($this->input->post('new_cust_name')=="")){
					$this->form_validation->set_rules('cust_name', 'Customer Name','trim|required|xss_clean');
				}
				$this->form_validation->set_rules('invoice', 'Invoice No','trim|required|xss_clean');
				$this->form_validation->set_rules('company', 'company','trim|required|xss_clean');
				$this->form_validation->set_rules('address', 'Address','trim|required|xss_clean');
				$this->form_validation->set_rules('phone', 'Phone','trim|required|xss_clean');
				$this->form_validation->set_rules('email', 'Email','trim|required|xss_clean');
				$this->form_validation->set_rules('product_id[]', 'Product_name','trim|required|xss_clean');
				$this->form_validation->set_rules('quantity[]', 'Quantity','trim|required|xss_clean');
				$this->form_validation->set_rules('rate[]', 'Rate','trim|required|xss_clean');
				$this->form_validation->set_rules('amount[]', 'Amount','trim|required|xss_clean');
			if($this->form_validation->run() == FALSE)
	   		{
					$data['product_name_list']=$this->product_details_model->product_name_list();
					$data['tax_details_list']=$this->tax_details_model->tax_details_list();
					$this->load->view('add_sales_details', $data);
			 }
			else
			{
				if($query = $this->sales_details_model->add_sales_details())
				{
					$this->session->set_flashdata('success_msg', 'Sales details added successfully!');
					redirect('sales_details/add_sales_details');
				}

			}
		}
  }
	// end validation sales details in table

	// start delete sales details
	public function delete()
	{
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
        // end for check user rights
		if((in_array("Sales Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
		if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
			if($this->sales_details_model->delete($this->input->get('id')))
			{
				$this->session->set_flashdata('success_msg', 'Sales Detail Deleted Successfully!');
				 redirect('sales_details/sales_details_list');
			}
		}
	}
	// end delete Sales details

	//start view Sales details
	function view_sales_details(){

		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
        // end for check user rights
		if((in_array("Sales Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
		if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
			$data['view_sales_details'] = $this->sales_details_model->view_sales_details($this->input->get('id'));
			$data['sales_order_details'] = $this->sales_details_model->sales_order_details($this->input->get('id'));
			$this->load->view('view_sales_details', $data);
		}

	}
	//End view Sales details
	//start induvidual_payment
	function induvidual_payment(){
			if($query = $this->sales_details_model->induvidual_payment()){
				$this->session->set_flashdata('success_msg','Payment Detail added Successfully!');
				redirect('sales_details/sales_details_list');
			}
	}
	//End induvidual_payment

	//start get customer payment details]
	function get_cus_payment_details(){
		//echo 'sdfsdf'; exit;
		if($query = $this->sales_details_model->get_cus_payment_details($this->input->get('customer'))){
			//print_r($query);
		echo $query[0]->Sales_total.'^'.$query[0]->Sales_paid.'^'.$query[0]->Sales_balance;
		}
	}
	// end get customer Payment deatils
	//start customer payment
	function customer_payment(){

		if($query = $this->sales_details_model->customer_payment()){
			redirect('sales_details/sales_details_list');
		}
	}
	//end customer payment

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
