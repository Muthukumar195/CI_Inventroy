<?php
Class Employee_designation_model extends CI_Model
{
 	function employee_designation_details_list()
	{
		$this->db->select('*');
        $this->db->from('employee_designation_details');					
		$this->db->order_by("Employee_designation_id", "DESC");	 
		//$this->db->limit(8);
        $query = $this->db->get();               
        return $query;		
	} 
	function ajax_check_designation_name($designation_name)
	{
		$this->db->select('Employee_designation_name');
        $this->db->from('employee_designation_details'); 		
		$this->db->where('Employee_designation_name',$designation_name); 
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
	function add_employee_designation_details()
	{
		$user_data = array(
			'Employee_designation_name' => $this->input->post('employee_designation_name')			
		);	
		$this->db->set('Employee_designation_created_dt_time', 'NOW()', FALSE);	
		$insert=$this->db->insert('employee_designation_details', $user_data);			
		return true;		
	} 
	function get_employee_designation_details($id)
	{		
		$this->db->select('*');
        $this->db->from('employee_designation_details');				
		$this->db->where('Employee_designation_id',$id);
        $query = $this->db->get(); 
        $this->db->last_query(); 
        return $query;		 
	} 
	function edit_employee_designation_details($id)
	{
		$data=array('Employee_designation_name'=>$this->input->post('employee_designation_name'));
		$this->db->set('Employee_designation_created_dt_time', 'NOW()', FALSE);	
		$this->db->where('Employee_designation_id',$id);
		$this->db->update('employee_designation_details',$data);
		return true;
	}
	function approve()
	{
		$data=array('Employee_designation_status'=>'A');
		$this->db->where('Employee_designation_id',$this->input->get('id'));
		$this->db->update('employee_designation_details',$data);
		return true;	 
	} 
	function deny()
	{
		$data=array('Employee_designation_status'=>'D');
		$this->db->where('Employee_designation_id',$this->input->get('id'));
		$this->db->update('employee_designation_details',$data);
		return true;	 
	}
	function delete($id)
	{		
		  $this->db->where('Employee_designation_id',$id);  
	      $this->db->delete('employee_designation_details'); 
	      return true;
	}
	function employee_designation_name_list()
	{
		$this->db->select('Employee_designation_id, Employee_designation_name');
		$this->db->from('employee_designation_details');
		$this->db->where('Employee_designation_status', 'A');
		$query=$this->db->get();
		return $query;
	}
}
?>