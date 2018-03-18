<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Emp_bank extends CI_controller{
	
	public function __construct(){
		
		parent::__construct();
		$this->load->model('emp_bank_model');
		$this->load->model('Employee_designation_model');
		$this->load->model('Employee_model');
		$this->load->model('Employee_department_model');
	}
	
	function emp_bank_details_list(){
		
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Bank Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			
			$data['employee_designation_details_list'] = $this->Employee_designation_model->employee_designation_details_list();
			$data['employee_details_list'] = $this->Employee_model->employee_details_list();
			$data['emp_bank_details_list'] = $this->emp_bank_model->emp_bank_details_list();
			$data['employee_department_details_list'] = $this->Employee_department_model->employee_department_details_list();

			$this->load->view('emp_bank_details_list', $data);
		}
	}
	//start add validate_emp_bank_details 
	function validate_emp_bank_details(){	
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Bank Details", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}	
		if(! $this->session->userdata('username'))
		{
			$this->check_isvalidated();
		}
		else{
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('designation', 'Designation name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('emp_name', 'Employee name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('bank_name', 'Bank name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('branch', 'Branch name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('bank_address', 'Bank address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('phone', 'Phone no', 'trim|required|xss_clean');
			$this->form_validation->set_rules('ifsc_code', 'IFSC code', 'trim|required|xss_clean');
			$this->form_validation->set_rules('ac_no', 'Account no', 'trim|required|xss_clean');
			if($this->form_validation->run() == FALSE){
				
				$data['employee_designation_details_list'] = $this->Employee_designation_model->employee_designation_details_list();
				$data['employee_details_list'] = $this->Employee_model->employee_details_list();
				$data['emp_bank_details_list'] = $this->emp_bank_model->emp_bank_details_list();
				$this->load->view('emp_bank_details_list', $data);
			}
			else{
				
				if($query = $this->emp_bank_model->add_bank_details()){
					
					$this->session->set_flashdata('success_msg', 'Bank Detailes Added successfully!');
					redirect('emp_bank/emp_bank_details_list');
				}
			}
		}
	}
	//end add validate_emp_bank_details 
	
	// start delete employee details
	public function delete()
	{
		// start for check user rights
        	$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));                    
        // end for check user rights
		if((in_array("Subject", $user_typ_ary)==false)&&($this->session->userdata('username')!='admin'))
		{
			$this->check_user_rights();
		}
		if(! $this->session->userdata('username')){
			/*$this->index();*/
			$this->check_isvalidated();
		}
		else
		{
			
			if($this->emp_bank_model->delete($this->input->get('id')))
			{				
				$this->session->set_flashdata('success_msg', 'Employee bank Detail Deleted Successfully!');
				
			}
			redirect('emp_bank/emp_bank_details_list');
									
		}
	}
	// start ajex bank details
	function ajax_check_emp_bank(){
		//echo "gggg";
		$data = $this->emp_bank_model->ajax_check_emp_bank($this->input->get('check_emp_id'));
		$cnt = count($data->result()); 
		$bank_details =''; $s=1;
		if($cnt>0){
			$bank_details .='<table class="table responsive table table-bordered table table-striped"><tbody>';
			foreach($data->result() as $emp){			
				$bank_details .= '
									<tr>
										<th><strong style="color:green;">Employee Account </strong> :</th>
										<td><strong style="color:green;">'.$s.'</strong></td> 
									</tr>
									<tr>
										<th >Bank :</th>
										<td>'.$emp->Employee_bank_name.'</td> 
									</tr>
									<tr>
										<th>Branch :</th>
										<td>'.$emp->Employee_bank_branch.'</td> 
									</tr>
									<tr>
										<th>Address :</th>
										<td>'.$emp->Employee_bank_address.'</td> 
									</tr> 
									<tr>
										<th>Account No:</th> 
										<td>'.$emp->Employee_bank_ac_no.'</td> 
									</tr>
									<tr>
										<th>IFSC Code :</th>
										<td>'.$emp->Employee_bank_ifsc.'</td> 
									</tr>
									<tr>
										<th >Phone No :</th>
										<td>'.$emp->Employee_bank_phone.'</td> 
									</tr>
									<tr>
										<th>DD Payable Address :</th> 
										<td>'.$emp->Employee_bank_dd_pay_address.'</td>    
									</tr>';
									$s++;
										
			}
			$bank_details .='</tbody></table>';
		}else{
			$bank_details .='<strong style="text-align:center; color:red">Sorry! no details Found...</strong>';
		}
		//echo "gggg";
		echo $bank_details; 
	}
	
	// end ajex bank details
	// start ajax bank details list
	function ajax_check_emp_bank_list(){
		//echo "gggg";
		$data = $this->emp_bank_model->ajax_check_emp_bank_list($this->input->get('sel_depart'));
		$cnt = count($data->result()); 
		$bank_details_lists =''; $s=1;
		if($cnt>0){
			$bank_details_lists .='<table class="table responsive table table-bordered table table-striped">
									<tr>
										<th>Sno</th>
										<th width="16.6%">Employee Code</th>
										<th width="16.7%">Employee Name</th>
										<th width="16.8%">Bank</th> 
										<th width="16.7%">Branch</th> 
										<th width="16.6%">Account No</th> 
										<th width="16.6%">IFSC Code</th>
										<th width="16.6%">Action</th> 
									</tr>
									</thead><tbody>';
			foreach($data->result() as $row){			
				$bank_details_lists .= '
										<tr>
											<td>'.$s.'</td>
											<td>'.$row->Employee_code.'</td>
											<td>'.$row->Employee_first_name.$row->Employee_middle_name.$row->Employee_last_name.'</td>
											<td>'.$row->Employee_bank_name.'</td>
											<td>'.$row->Employee_bank_branch.'</td> 
											<td>'.$row->Employee_bank_ac_no.'</td> 
											<td>'.$row->Employee_bank_ifsc.'</td>
											<td><a href="delete?id='.$row->Employee_bank_id.'"><i class="icon-trash"></i></a></td>
										</tr>';
									$s++;
										
			}
			$bank_details_lists .='</tbody></table>';
		}else{
			$bank_details_lists .='<strong style="text-align:center; color:red">Sorry! no details Found...</strong>';
		}

		echo $bank_details_lists; 
	}
	
	// end ajex bank details
	
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


?>