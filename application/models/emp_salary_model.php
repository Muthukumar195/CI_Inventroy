<?php
class Emp_salary_model extends CI_model{

	public function emp_salary_details_list(){

		$this->db->select('employee_salary.*, employee_designation_details.Employee_designation_id, employee_designation_details.Employee_designation_name, employee_details.Employee_id, employee_details.Employee_first_name, employee_details.Employee_middle_name, employee_details.Employee_last_name, employee_department_details.Employee_department_id, employee_department_details.Employee_department_name');
		$this->db->from('employee_salary');
		$this->db->join('employee_designation_details', 'employee_designation_details.Employee_designation_id = employee_bank_details.Employee_bank_designation_id', 'Left');
		$this->db->join('employee_details', 'employee_details.Employee_id = employee_bank_details.Employee_bank_emp_id', 'Left');
		$this->db->join('employee_department_details', 'employee_department_details.Employee_department_id = employee_bank_details.Employee_bank_department_id', 'Left');
		$this->db->order_by('Employee_bank_id', 'DESC');
		$query = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $query;
	}


	function add_bank_details()
	{ //echo 'sdaf'; exit;
		$user_data = array(
			'Employee_bank_department_id' => $this->input->post('emp_department'),
			'Employee_bank_designation_id' => $this->input->post('designation'),
			'Employee_bank_emp_id' => $this->input->post('emp_name'),
			'Employee_bank_name' => $this->input->post('bank_name'),
			'Employee_bank_branch' => $this->input->post('branch'),
			'Employee_bank_address' => $this->input->post('bank_address'),
			'Employee_bank_phone' => $this->input->post('phone'),
			'Employee_bank_ifsc' => $this->input->post('ifsc_code'),
			'Employee_bank_ac_no' => $this->input->post('ac_no'),
			'Employee_bank_dd_pay_address' => $this->input->post('dd_address'),
		);
		$this->db->set('Employee_bank_create_dt_time', 'NOW()', FALSE);
		$insert=$this->db->insert('employee_bank_details', $user_data);

		return true;
	}

	function delete($id)
	{
	  $this->db->where('Employee_bank_id',$id);
	  $this->db->delete('employee_bank_details');
	  return true;
	}

	function ajax_check_emp_bank($empbank_id){

		$this->db->select('*');
		$this->db->from('employee_bank_details');
		$this->db->where('Employee_bank_emp_id', $empbank_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query;

	}
	function ajax_check_emp_bank_list($empdepart_id){

		$this->db->select('employee_bank_details.*, employee_details.Employee_id, employee_details.Employee_code, employee_details.Employee_first_name,employee_details.Employee_middle_name,employee_details.Employee_last_name');
		$this->db->from('employee_bank_details');
		$this->db->join('employee_details','employee_details.Employee_id = employee_bank_details.Employee_bank_emp_id','Left');
		$this->db->where('Employee_bank_department_id', $empdepart_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query;

	}

}


?>
