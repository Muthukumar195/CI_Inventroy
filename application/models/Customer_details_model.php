<?php
class Customer_details_model extends CI_Model
{
 	function customer_details_list()
	{
		$this->db->select('*');
        $this->db->from('customer_details');
		$this->db->order_by("Customer_id", "DESC");
        $query = $this->db->get();
        return $query;
	}

	function add_customer_details()
	{
		$user_data = array(
		    'Customer_type' => $this->input->post('cus_type'),
			'Customer_name' => $this->input->post('cus_name'),
			'Customer_comp' => $this->input->post('company'),
			'Customer_address' => $this->input->post('address'),
			'Customer_phone' => $this->input->post('phone'),
			'Customer_email' => $this->input->post('email'),
			'Customer_city' => $this->input->post('city'),
			'Customer_state' => $this->input->post('state'),
			'Customer_country' => $this->input->post('country')
		);
		$this->db->set('Customer_create_dt_time', 'NOW()', FALSE);
		$insert=$this->db->insert('customer_details', $user_data);

		return true;
	}
	function get_customer_details($id)
	{
		$this->db->select('*');
        $this->db->from('customer_details');
		$this->db->where('Customer_id',$id);
        $query = $this->db->get();
        $this->db->last_query();
        return $query;
	}

	function customer_count(){

		$this->db->select('Customer_id');
		$this->db->from('customer_details');
		$query = $this->db->get();
		return $query->num_rows();
	}

	function edit_customer_details($id)
	{

		$data=array('Customer_type' => $this->input->post('cus_type'),'Customer_name' => $this->input->post('cus_name'),'Customer_comp' => $this->input->post('company'),'Customer_address' => $this->input->post('address'),'Customer_phone' => $this->input->post('phone'),'Customer_email' => $this->input->post('email'),			'Customer_city' => $this->input->post('city'),'Customer_state' => $this->input->post('state'),'Customer_country' => $this->input->post('country'));
		$this->db->set('Customer_create_dt_time', 'NOW()', FALSE);
		$this->db->where('Customer_id',$id);
		$this->db->update('customer_details',$data);
		//echo $this->db->last_query(); exit;
		return true;
	}
	function approve()
	{
		$data=array('Customer_status'=>'A');
		$this->db->where('Customer_id',$this->input->get('id'));
		$this->db->update('customer_details',$data);
		return true;
	}
	function deny()
	{
		$data=array('Customer_status'=>'D');
		$this->db->where('Customer_id',$this->input->get('id'));
		$this->db->update('customer_details',$data);
		return true;
	}
	function delete($id)
	{
		 $this->db->where('Customer_id',$id);
		 $this->db->delete('customer_details');
		 return true;

	}
	function get_cus_type_list($type){
		$this->db->select('Customer_id, Customer_name, Customer_type');
		$this->db->from('customer_details');
		$this->db->where('Customer_type', $type);
		$this->db->where('Customer_status', "A");
		$query = $this->db->get();
		return $query;
	}
	function get_cus_deatils($cus_id){
		$this->db->select('Customer_id, Customer_comp, Customer_address, Customer_phone, Customer_email');
		$this->db->from('customer_details');
		$this->db->where('Customer_id', $cus_id);
		$this->db->where('Customer_status', "A");
		$query = $this->db->get();
		return $query;
	}
	function total_customer(){
		$this->db->select('Customer_id, Customer_type');
		$this->db->from('customer_details');
		$this->db->where('Customer_type', "Customer");
		$query = $this->db->get();
		$num = $query->num_rows();
		return $num;
	}
	function total_retailer(){
		$this->db->select('Customer_id, Customer_type');
		$this->db->from('customer_details');
		$this->db->where('Customer_type', "Retailer");
		$query = $this->db->get();
		$num = $query->num_rows();
		return $num;
	}
	function total_wholesaler(){
		$this->db->select('Customer_id, Customer_type');
		$this->db->from('customer_details');
		$this->db->where('Customer_type', "Wholesaler");
		$query = $this->db->get();
		$num = $query->num_rows();
		return $num;
	}

}
?>
