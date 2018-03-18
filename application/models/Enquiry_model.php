<?php 
class Enquiry_model extends CI_Model{
	
	public function enquiry_details_list(){
		
		$this->db->select('enquiry_details.*, course_details.Course_id, course_details.Course_name');
		$this->db->from('enquiry_details');
		$this->db->join('course_details', 'course_details.Course_id = enquiry_details.Enq_student_Course_id', 'Left');
		$this->db->order_by('Enq_id', 'DESC');
		$query = $this->db->get();
		return $query;
	}
	
	public function enquiry_details_max_id(){
		
		$this->db->select_max('Enq_id');
		$this->db->from('enquiry_details');
		$query = $this->db->get();
		foreach($query->result() as $max){
		$max_id = $max->Enq_id;
		}
		return $max_id;
	}
	
	public function get_enquiry_details($id){
		
		$this->db->select('*');
		$this->db->from('enquiry_details');
		$this->db->where('Enq_id', $id);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query;
	}
	
	
	function add_enquiry_details()
	{
		$user_data = array(
			'Enq_no' => $this->input->post('enq_no'),
			'Enq_student_name' => $this->input->post('enq_st_name'),
			'Enq_student_course_id' => $this->input->post('course_id'),
			'Enq_student_gender' => $this->input->post('gender'),
			'Enq_student_dob' => date('Y-m-d', strtotime($this->input->post('enq_dob'))),
			'Enq_father_name' => $this->input->post('enq_father_name'),
			'Enq_address' => $this->input->post('enq_address'),
			'Enq_mobile' => $this->input->post('enq_mobile'),
			'Enq_email' => $this->input->post('enq_email'),
		);	
		$this->db->set('Enq_create_dt_time', 'NOW()', FALSE);	
		$insert=$this->db->insert('enquiry_details', $user_data);
		//echo $this->db->last_query();	exit;		
		return true;		
	}

	function edit_enquiry_details($id)
	{
		$user_data = array(
			'Enq_no' => $this->input->post('enq_no'),
			'Enq_student_name' => $this->input->post('enq_st_name'),
			'Enq_student_course_id' => $this->input->post('course_id'),
			'Enq_student_gender' => $this->input->post('gender'),
			'Enq_student_dob' => date('Y-m-d', strtotime($this->input->post('enq_dob'))),
			'Enq_father_name' => $this->input->post('enq_father_name'),
			'Enq_address' => $this->input->post('enq_address'),
			'Enq_mobile' => $this->input->post('enq_mobile'),
			'Enq_email' => $this->input->post('enq_email'),
		);	
		$this->db->set('Enq_create_dt_time', 'NOW()', FALSE);
		$this->db->where('Enq_id', $id);
		$insert=$this->db->update('enquiry_details', $user_data);
		//echo $this->db->last_query(); exit;			
		return true;		
	}
	
	function approve()
	{
		$data=array('Enq_status'=>'A');
		$this->db->where('Enq_id',$this->input->get('id'));
		$this->db->update('enquiry_details',$data);
		return true;	 
	} 
	function deny()
	{
		$data=array('Enq_status'=>'D');
		$this->db->where('Enq_id',$this->input->get('id'));
		$this->db->update('enquiry_details',$data);
		return true;	 
	}
	function delete($id)
	{	
	  $this->db->where('Enq_id',$id);  
	  $this->db->delete('enquiry_details'); 
	  return true;
	}
	
}