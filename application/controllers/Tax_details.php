<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Tax_details extends CI_Controller{

	public function __construct(){

		parent::__construct();
		//call model
		$this->load->model('tax_details_model');
	}
	//start dtax deatils list
	function tax_details_list(){
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
			$data['tax_details_list'] = $this->tax_details_model->tax_details_list();
			$this->load->view('tax_details_list', $data);
		}
	}
	//end tax deatils list
	//start validation tax details
	function validate_tax_details(){

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
			$this->form_validation->set_rules('tax_type', 'Tax Type', 'trim|required|xss_clean');
			$this->form_validation->set_rules('tax_name', 'Tax Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('tax_amt', 'Tax amount', 'trim|required|xss_clean');

			if($this->form_validation->run() == FALSE){
				$data['tax_details_list'] = $this->tax_details_model->tax_details_list();
				$this->load->view('tax_details_list');
			}
			else{

				if($query = $this->tax_details_model->add_tax_details()){

					$this->session->set_flashdata('success_msg', 'Tax details added successfully!');
					$data['tax_details_list'] = $this->tax_details_model->tax_details_list();
					$this->load->view('tax_details_list',$data);
				}

			 }
		}
	}

	//end validation tax details
	// start edit tax details
    public function edit_tax_details()
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
			$data['tax_details_data'] = $this->tax_details_model->get_tax_details($this->input->get('id'));
			$this->load->view('edit_tax_details', $data);
		}
    }
	// end edit tax details
	// start validate_edit_tax_details
    public function validate_edit_tax_details()
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
			$this->form_validation->set_rules('tax_type', 'Tax Type', 'trim|required|xss_clean');
			$this->form_validation->set_rules('tax_name', 'Tax Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('tax_amt', 'Tax amount', 'trim|required|xss_clean');

			if($this->form_validation->run() == FALSE)
	   		{
				$data['tax_details_data'] = $this->tax_details_model->get_tax_details($this->input->post('id'));
				$this->load->view('edit_tax_details', $data);
			}
			else
			{

				if($query = $this->tax_details_model->edit_tax_details($this->input->post('id')))
				{
					$this->load->helper(array('form', 'url', 'text','captcha','html'));
					$this->load->helper('text');
					$data['tax_details_list'] = $this->tax_details_model->tax_details_list();
					$this->session->set_flashdata('success_msg', 'Tax details edited successfully!');
					$this->load->view('tax_details_list', $data);
				}
			}
		}
    }
	// end validate_edit_tax_details
	// start delete tax details
	function delete()
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
			$this->load->model('tax_details_model');
			if($this->tax_details_model->delete())
			{
				$this->session->set_flashdata('success_msg', 'Tax details deleted successfully!');
			}
			redirect('tax_details/tax_details_list');
		}
    }
	// end delete tax details

	//get tax amount
	function get_tax_amount(){
		$data = $this->tax_details_model->get_tax_amount($this->input->get('tax_id'));

		echo $data[0]->Tax_amount.'^'.$data[0]->Tax_type;

	}
	//end get tax amount

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
