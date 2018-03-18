<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_details extends CI_Controller {

	public function __construct(){

		parent::__construct();
		//Call model
		$this->load->model('product_details_model');
	}

	public function product_details_list()
	{
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
        // end for check user rights
		if((in_array("Product Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else
		{
			$data['product_details_list'] = $this->product_details_model->product_details_list();
			$this->load->view('product_details_list', $data);
		}
	}
	public function add_product_details()
	{
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
        // end for check user rights
		if((in_array("Product Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else
		{
			$this->load->view('add_product_details');
		}
	}
	// start add product details in table
    public function validate_product_details()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
        // end for check user rights
		if((in_array("Product Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
			$this->form_validation->set_rules('pro_name', 'Product Name', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('company', 'Product Company', 'trim|required|xss_clean');
			$this->form_validation->set_rules('b_price', 'Base Price', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('o_price', 'Our Price', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('vat', 'Product TAX', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('desc', 'Product Description', 'trim|required|xss_clean');

			if($this->form_validation->run() == FALSE)
	   		{
				$this->load->view('add_product_details');
			}
			else
			{
				if($query = $this->product_details_model->add_product_details())
				{
					$this->session->set_flashdata('success_msg', 'Product details added successfully!');
					redirect('product_details/add_product_details');
				}

			}
		}
    }
	// end add product details in table
	// start edit product details
    public function edit_product_details()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
        // end for check user rights
		if((in_array("Product Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
			$data['product_details_data'] = $this->product_details_model->get_product_details($this->input->get('id'));
			$this->load->view('edit_product_details', $data);
		}
    }
	// end edit product details

	// start validate_edit_product_details
    public function validate_edit_product_details()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
        // end for check user rights
		if((in_array("Product Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
			$this->form_validation->set_rules('pro_name', 'Product Name', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('company', 'Product Company', 'trim|required|xss_clean');
			$this->form_validation->set_rules('b_price', 'Base Price', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('o_price', 'Our Price', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('vat', 'Product TAX', 'trim|required|xss_clean');
	   		$this->form_validation->set_rules('desc', 'Product Description', 'trim|required|xss_clean');

			if($this->form_validation->run() == FALSE)
	   		{
				$data['product_details_data'] = $this->product_details_model->get_product_details($this->input->post('id'));
				$this->load->view('edit_product_details ', $data);
			}
			else
			{

				if($query = $this->product_details_model->edit_product_details($this->input->post('id')))
				{
					$this->load->helper(array('form', 'url', 'text','captcha','html'));
					$this->load->helper('text');
					$data['product_details_list'] = $this->product_details_model->product_details_list();
					$this->session->set_flashdata('success_msg', 'product details edited successfully!');
					$this->load->view('product_details_list', $data);
				}
			}
		}
    }
	// end validate_edit_customer_details



	// start delete customer details
	function delete()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
        // end for check user rights
		if((in_array("Product Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
			$this->load->model('product_details_model');
			if($this->product_details_model->delete())
			{
				$this->session->set_flashdata('success_msg', 'Product Status Changed successfully!');
			}
			redirect('product_details/product_details_list');
		}
    }
	// end delete customer details


	//start view customer details
	function view_product_details(){

		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
        // end for check user rights
		if((in_array("Product Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
		if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
			$data['view_product_details'] = $this->product_details_model->get_product_details($this->input->get('id'));
			$this->load->view('view_product_details', $data);
		}

	}

	//End view customer details
	// start add product details in table
    public function validate_stock_details()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
        // end for check user rights
		if((in_array("Product Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
	   		$this->form_validation->set_rules('stock', 'Stock', 'trim|required|xss_clean');

			if($this->form_validation->run() == FALSE)
	   		{
				$data['product_details_list'] = $this->product_details_model->product_details_list();
			$this->load->view('product_details_list', $data);
			}
			else
			{
				if($query = $this->product_details_model->new_stock())
				{
					$this->session->set_flashdata('success_msg', 'Stock details added successfully!');
					redirect('product_details/product_details_list');
				}

			}
		}
    }
	// end add customer details in table

	//get purchase details
	function get_pur_prd_details(){
		$data= $this->product_details_model->get_product_details($this->input->get('val'));
		$res = $data->result();
		echo  $res[0]->Product_prize;


	}
	//end get Purchase_details
	
	
	//get sales details
	function get_sal_prd_details(){
		$data= $this->product_details_model->get_product_details($this->input->get('val'));
		$res = $data->result();
		echo  $res[0]->Product_sales.'^'.$res[0]->Prd_stock_qty;


	}
	//end get sales

	//Start export product detais
	public function export()
	{
	  $this->load->view('view_pdf');
	}
	//end export product Details


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
