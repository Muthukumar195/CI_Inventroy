<?php
Class Employee_department_model extends CI_Model
{
 	function employee_department_details_list()
	{
		$this->db->select('*');
        $this->db->from('employee_department_details');					
		$this->db->order_by("Employee_department_id", "DESC");
        $query = $this->db->get();               
        return $query;		
	} 
	
	public function employee_department_list(){
		
		$this->db->select('Employee_department_id, Employee_department_name');
		$this->db->from('employee_department_details');
		$this->db->where('Employee_department_status', 'A');
		$query = $this->db->get();
		return $query;
	}
	
	function ajax_check_department_name($department_name)
	{
		$this->db->select('Employee_department_name');
        $this->db->from('employee_department_details'); 		
		$this->db->where('Employee_department_name',$department_name); 
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
	function add_employee_department_details()
	{
		$user_data = array(
			'Employee_department_name' => $this->input->post('employee_department_name')			
		);	
		$this->db->set('Employee_department_created_dt_time', 'NOW()', FALSE);	
		$insert=$this->db->insert('employee_department_details', $user_data);			
		return true;		
	} 
	function get_employee_department_details($id)
	{		
		$this->db->select('*');
        $this->db->from('employee_department_details');				
		$this->db->where('Employee_department_id',$id);
        $query = $this->db->get(); 
        $this->db->last_query(); 
        return $query;		 
	} 
	function edit_employee_department_details($id)
	{
		$data=array('Employee_department_name'=>$this->input->post('employee_department_name'));
		$this->db->set('Employee_department_created_dt_time', 'NOW()', FALSE);	
		$this->db->where('Employee_department_id',$id);
		$this->db->update('employee_department_details',$data);
		return true;
	}
	function approve()
	{
		$data=array('Employee_department_status'=>'A');
		$this->db->where('Employee_department_id',$this->input->get('id'));
		$this->db->update('employee_department_details',$data);
		return true;	 
	} 
	function deny()
	{
		$data=array('Employee_department_status'=>'D');
		$this->db->where('Employee_department_id',$this->input->get('id'));
		$this->db->update('employee_department_details',$data);
		return true;	 
	}
	function delete($id)
	{		
		  $this->db->where('Employee_department_id',$id);  
	      $this->db->delete('employee_department_details'); 
	      return true;
	}
	function employee_department_name_list()
	{
		$this->db->select('Employee_department_id, Employee_department_name');
		$this->db->from('employee_department_details');
		$this->db->where('Employee_department_status', 'A');
		$query=$this->db->get();
		return $query;
	}
}
?>