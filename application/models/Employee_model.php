<?php 
class Employee_model extends CI_Model{
	
	public function __construct(){
		
		parent:: __construct();
		
	}
	public function employee_details_list(){
		
		$this->db->select('employee_details.*, employee_department_details.Employee_department_id, employee_department_details.Employee_department_name, employee_designation_details.Employee_designation_id, employee_designation_details.Employee_designation_name');
		$this->db->from('employee_details');
		$this->db->join('employee_department_details', 'employee_department_details.Employee_department_id = employee_details.Employee_department_id', 'Left');
		$this->db->join('employee_designation_details', 'employee_designation_details.Employee_designation_id = employee_details.Employee_designation_id', 'Left');
		$this->db->order_by('Employee_id', 'DESC');
		$query = $this->db->get();
		return $query;
		
	}
	
	public function employee_list(){
		
		$this->db->select('Employee_id, Employee_first_name, Employee_middle_name, Employee_last_name');
		$this->db->from('employee_details');
		$this->db->where('Employee_status', 'A');
		$query = $this->db->get();
		return $query;
	}
	
	public function get_employee_details($id){
		
		$this->db->select('employee_details.*, employee_department_details.Employee_department_id, employee_department_details.Employee_department_name, employee_designation_details.Employee_designation_id, employee_designation_details.Employee_designation_name');
		$this->db->from('employee_details');
		$this->db->join('employee_department_details', 'employee_department_details.Employee_department_id = employee_details.Employee_department_id', 'Left');
		$this->db->join('employee_designation_details', 'employee_designation_details.Employee_designation_id = employee_details.Employee_designation_id', 'Left');
		$this->db->where('Employee_id', $id);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query;
	}
	
	
	function add_employee_details()
	{
		$experiences=''; $ex_details=''; $middle_name=''; $last_name=''; $permanent_address=''; $father_name=''; $mother_name='';
		if($this->input->post('experiences')!=null){ $experiences = $this->input->post('experiences'); } 
		if($this->input->post('ex_details')!=null){ $ex_details = $this->input->post('ex_details'); }
		if($this->input->post('middle_name')!=null){ $middle_name = $this->input->post('middle_name'); }
		if($this->input->post('last_name')!=null){ $last_name = $this->input->post('last_name'); }
		if($this->input->post('permanent_address')!=null){ $permanent_address = $this->input->post('permanent_address'); }
		if($this->input->post('father_name')!=null){ $father_name = $this->input->post('father_name'); }
		if($this->input->post('mother_name')!=null){ $mother_name = $this->input->post('mother_name'); }
		$user_data = array(
			'Employee_code' => $this->input->post('employee_code'),
			'Employee_joining_date' => date('Y-m-d', strtotime($this->input->post('emp_joining_date'))),
			'Employee_department_id' => $this->input->post('department_name'),
			'Employee_designation_id' => $this->input->post('designation_name'),
			'Employee_qualification' => $this->input->post('qualification'),
			'Employee_total_experiences' => $experiences,
			'Employee_experiences_details' => $ex_details,
			'Employee_first_name' => $this->input->post('first_name'),
			'Employee_middle_name' => $middle_name,
			'Employee_last_name' => $last_name,
			'Employee_dob' =>  date('Y-m-d', strtotime($this->input->post('dob'))),
			'Employee_gender' => $this->input->post('gender'),
			'Employee_father_name' => $father_name,
			'Employee_mother_name' => $mother_name,
			'Employee_marital_status' => $this->input->post('marital'),
			'Employee_persent_address' => $this->input->post('present_address'),
			'Employee_premanent_address' => $permanent_address,
			'Employee_city' => $this->input->post('con_city'),
			'Employee_pin' => $this->input->post('con_pin'),
			'Employee_country' => $this->input->post('country'),
			'Employee_state' => $this->input->post('state'),
			'Employee_mobile' => $this->input->post('con_mobile'),
			'Employee_email' => $this->input->post('con_email'),
		);	
		$this->db->set('Employee_create_dt_time', 'NOW()', FALSE);	
		$insert=$this->db->insert('employee_details', $user_data);
		//echo $this->db->last_query();	exit;		
		return true;		
	}
	
	
	function upload_file($file_extension)
	{		
		$this->db->select_max('Employee_id', 'max_id');
		$query = $this->db->get('employee_details'); 
		$res2 = $query->result_array();
        $max_id = $res2[0]['max_id'];		
		
		$file_name='employee_pic'.$max_id.$file_extension;	

		$data=array('Employee_photo'=>$file_name);
		$this->db->where('Employee_id',$max_id);
		$this->db->update('employee_details',$data);
		//echo $this->db->last_query(); exit();
		return $file_name;
	}
	
	function edit_employee_details($id)
	{
		$experiences=''; $ex_details=''; $middle_name=''; $last_name=''; $permanent_address=''; $father_name=''; $mother_name='';
		if($this->input->post('experiences')!=null){ $experiences = $this->input->post('experiences'); } 
		if($this->input->post('ex_details')!=null){ $ex_details = $this->input->post('ex_details'); }
		if($this->input->post('middle_name')!=null){ $middle_name = $this->input->post('middle_name'); }
		if($this->input->post('last_name')!=null){ $last_name = $this->input->post('last_name'); }
		if($this->input->post('permanent_address')!=null){ $permanent_address = $this->input->post('permanent_address'); }
		if($this->input->post('father_name')!=null){ $father_name = $this->input->post('father_name'); }
		if($this->input->post('mother_name')!=null){ $mother_name = $this->input->post('mother_name'); }
		$user_data = array(
			'Employee_code' => $this->input->post('employee_code'),
			'Employee_joining_date' => date('Y-m-d', strtotime($this->input->post('emp_joining_date'))),
			'Employee_department_id' => $this->input->post('department_name'),
			'Employee_designation_id' => $this->input->post('designation_name'),
			'Employee_qualification' => $this->input->post('qualification'),
			'Employee_total_experiences' => $experiences,
			'Employee_experiences_details' => $ex_details,
			'Employee_first_name' => $this->input->post('first_name'),
			'Employee_middle_name' => $middle_name,
			'Employee_last_name' => $last_name,
			'Employee_dob' =>  date('Y-m-d', strtotime($this->input->post('dob'))),
			'Employee_gender' => $this->input->post('gender'),
			'Employee_father_name' => $father_name,
			'Employee_mother_name' => $mother_name,
			'Employee_marital_status' => $this->input->post('marital'),
			'Employee_persent_address' => $this->input->post('present_address'),
			'Employee_premanent_address' => $permanent_address,
			'Employee_city' => $this->input->post('con_city'),
			'Employee_pin' => $this->input->post('con_pin'),
			'Employee_country' => $this->input->post('country'),
			'Employee_state' => $this->input->post('state'),
			'Employee_mobile' => $this->input->post('con_mobile'),
			'Employee_email' => $this->input->post('con_email'),
		);	
		$this->db->set('Employee_create_dt_time', 'NOW()', FALSE);	
		$this->db->where('Employee_id', $id);
		$insert=$this->db->update('employee_details', $user_data);
		//echo $this->db->last_query(); exit;			
		return true;		
	}
	
	function edit_upload_file($file_extension)
	{
		$this->db->select_max('Employee_id', 'max_id');
		$query = $this->db->get('employee_details'); 
		$res2 = $query->result_array();
        $max_id = $this->input->post('id');		
		
		$file_name='employee_pic'.$max_id.$file_extension;	

		$data=array('Employee_photo'=>$file_name);
		$this->db->where('Employee_id',$max_id);
		$this->db->update('employee_details',$data);
		//echo $this->db->last_query(); exit();
		return $file_name;
	}
	
	function approve()
	{
		$data=array('Employee_status'=>'A');
		$this->db->where('Employee_id',$this->input->get('id'));
		$this->db->update('employee_details',$data);
		return true;	 
	} 
	function deny()
	{
		$data=array('Employee_status'=>'D');
		$this->db->where('Employee_id',$this->input->get('id'));
		$this->db->update('employee_details',$data);
		return true;	 
	}
	function delete($id)
	{	
	  $this->db->where('Employee_id',$id);  
	  $this->db->delete('employee_details'); 
	  return true;
	}
	
	function check_employee_code($emp_code)
	{
		$this->db->select('Employee_code');
        $this->db->from('employee_details'); 		
		$this->db->where('Employee_code',$emp_code); 
        $query = $this->db->get(); 

        if ($query->num_rows() > 0) //if message exists
	   {
	   	return 1;
	   }
	   else
	   {
	   	 return 0;
	   }       	 
	}
	
	function ajax_check_employee_code($emp_code)
	{
		$this->db->select('Employee_code');
        $this->db->from('employee_details'); 		
		$this->db->where('Employee_code',$emp_code); 
        $query = $this->db->get();

        if ($query->num_rows() > 0) //if message exists
	   {
	   	return 1;
	   }
	   else
	   {
	   	 return 0;
	   }       	 
	}
	
	function ajax_check_employee_name($emp_depar_id){
		
		$this->db->select('Employee_id,Employee_first_name,Employee_middle_name,Employee_last_name');
		$this->db->from('employee_details');
		$this->db->where('Employee_department_id', $emp_depar_id);
		$query = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $query;
		
	}
	function ajax_check_employee_depart($id){
		
		$this->db->select('Employee_id, Employee_department_id');
		$this->db->from('employee_details');
		$this->db->where('Employee_id', $id);
		$query = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $query;
		
	}
	public function total_employee(){
		
		$this->db->select('Employee_id');
		$this->db->from('employee_details');
		$query = $this->db->get();
		$total = $query->num_rows();
		return $total;
	}
	
}