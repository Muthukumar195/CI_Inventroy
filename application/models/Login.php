<?php 
class Login extends CI_Model
{
	
	public function validate($username,$password){
		
		if($username !="admin"){
			
			$this->db->select("admin.*, admin_user_rights_details.User_rights_type_value");
			$this->db->from('admin');
			$this->db->join('admin_user_rights_details', 'admin_user_rights_details.User_rights_id=admin.Admin_user_rights', 'left');
			$this->db->where('Admin_username',$username);
		    $this->db->where('Admin_password',$password);
			$this->db->where('admin.Admin_status', 'A');
			$this->db->limit(1);
			$query = $this->db->get();
		}
		else{
			
			$this->db->where('Admin_username',$username);
			$this->db->where('Admin_password',$password);
			$this->db->where('admin.Admin_status', 'A');
			$this->db->limit(1);
			$query = $this->db->get('admin');
		}
		if($query->num_rows() == 1){
			
			return $query->result();
		}
		else{
			return FALSE;
		}
	}
}
	