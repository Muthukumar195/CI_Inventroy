<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//session_start();
class Expences_details extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('expences_model');
    }
 // start Expences master details CI_Controller
	public function expences_master_details()
	{
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
        // end for check user rights
		if((in_array("Expences details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else
		{
			$data['expences_master_details'] = $this->expences_model->expences_master_details();
			$this->load->view('expences_master_details', $data);
		}
	}
  // start add expences master details table
    public function validate_expences_master_details()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
        // end for check user rights
		if((in_array("Expences details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
	   		$this->form_validation->set_rules('exp_mas_name', 'Expences Type', 'trim|required|xss_clean');
			if($this->form_validation->run() == FALSE)
	   		{
					$data['expences_master_details'] = $this->expences_model->expences_master_details();
					$this->load->view('expences_master_details', $data);
			}
			else
			{
					if($query = $this->expences_model->add_expences_master_details())
					{
						$this->session->set_flashdata('success_msg', 'Expences Master details added successfully!');
						$data['expences_master_details'] = $this->expences_model->expences_master_details();
						$this->load->view('expences_master_details', $data);
					}
			}
		}
    }
	// end add expences master details table

	// start edit  expences_master_details
    public function edit_expences_master_details()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
        // end for check user rights
		if((in_array("Expences details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
    	if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
			$data['expences_data'] = $this->expences_model->get_expences_master_details($this->input->get('id'));
			$this->load->view('edit_expences_master_details', $data);
		}
    }
	// end edit expences master details


	// start validate_edit_expences_master
    public function validate_edit_expences_master()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
        // end for check user rights
		if((in_array("Expences details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
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
	    	$this->form_validation->set_rules('exp_mas_name', 'Expences Type', 'trim|required|xss_clean');
			if($this->form_validation->run() == FALSE)
	   		{
					$data['expences_data'] = $this->expences_model->get_expences_master_details($this->input->get('id'));
					$this->load->view('edit_expences_master_details', $data);
			}
			else
			{
				if($query = $this->expences_model->edit_expences_master_details($this->input->post('id')))
				{
					$this->session->set_flashdata('success_msg', 'Expences master details edited successfully!');
					redirect('expences_details/expences_master_details');

				}
			}
		}
    }
	// end validate_edit_expences_master

	// start deny
    function deny()
    {
    	// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
        // end for check user rights
			if((in_array("Expences details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
			{
				$this->check_user_rights();
			}
	    	if(! $this->session->userdata('username')){
				/*$this->index();*/
				$this->check_isvalidated();
			}
			else
			{
				if($this->expences_model->deny())
				{
					$this->session->set_flashdata('success_msg', 'Expences Status Changed successfully!');
				}
				redirect('expences_details/expences_master_details');
			}
    }
	// end deny
 // end Expences master details CI_Controller
// start Expences  details CI_Controller
public function expences_details_list()
{
	// start for check user rights
		$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
	// end for check user rights
	if((in_array("Expences details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
	{
		$this->check_user_rights();
	}
	if(! $this->session->userdata('username'))
	{
		$this->check_isvalidated();
	}
	else
	{
		$data['expences_details_list'] = $this->expences_model->expences_details_list();
		$data['expences_master_name_list'] = $this->expences_model->expences_master_name_list();
		$this->load->view('expences_details_list', $data);
	}
}

// end Expences  details CI_Controller

//start expences validation
	function validate_expences_details(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('ex_date','Expences Date','trim|required|xss_clean');
		$this->form_validation->set_rules('ex_mas','Expences Type','trim|required|xss_clean');
		$this->form_validation->set_rules('expences_amount','Expences Amount','trim|required|xss_clean');
		$this->form_validation->set_rules('description','description','trim|required|xss_clean');
		if($this->form_validation->run() == FALSE){
				$data['expences_details_list'] = $this->expences_model->expences_details_list();
				$data['expences_master_name_list'] = $this->expences_model->expences_master_name_list();
				$this->load->view('expences_details_list', $data);
		}
		else{
			if($this->expences_model->add_expences_details()){
					$this->session->set_flashdata('success_msg', 'Expences details Added successfully!');
					$data['expences_details_list'] = $this->expences_model->expences_details_list();
					$data['expences_master_name_list'] = $this->expences_model->expences_master_name_list();
					$this->load->view('expences_details_list', $data);
			}
		}
	}
//End expences validation

// start edit  expences_details
	public function edit_expences_details()
	{
		// start for check user rights
				$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
			// end for check user rights
	if((in_array("Expences details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
	{
		$this->check_user_rights();
	}
		if(! $this->session->userdata('username')){
		/*$this->index();*/
		$this->check_isvalidated();
	}
	else
	{
		$data['expences_master_name_list'] = $this->expences_model->expences_master_name_list();
		$data['ex_details_data'] = $this->expences_model->get_expences_details($this->input->get('id'));
		$this->load->view('edit_expences_details', $data);
	}
	}
// end edit expences details

//start expences validation
	function validate_edit_expences(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('ex_date','Expences Date','trim|required|xss_clean');
		$this->form_validation->set_rules('Exp_master_id','Expences Type','trim|required|xss_clean');
		$this->form_validation->set_rules('expences_amount','Expences Amount','trim|required|xss_clean');
		$this->form_validation->set_rules('description','description','trim|required|xss_clean');
		if($this->form_validation->run() == FALSE){
			$data['expences_details_list'] = $this->expences_model->expences_details_list();
			$data['expences_master_name_list'] = $this->expences_model->expences_master_name_list();
			$this->load->view('expences_details_list', $data);
		}
		else{
				if($this->expences_model->edit_expences_details($this->input->post('id'))){
					$this->session->set_flashdata('success_msg', 'Expences details Edited successfully!');
					$data['expences_details_list'] = $this->expences_model->expences_details_list();
					$data['expences_master_name_list'] = $this->expences_model->expences_master_name_list();
					$this->load->view('expences_details_list', $data);
				}
		}
	}
//End  expences validation
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
