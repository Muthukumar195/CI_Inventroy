<?php
class Tax_details_model extends CI_Model{

	public function tax_details_list(){

		$this->db->select('*');
		$this->db->from('tax_details');
		$this->db->where('Tax_status', "A");
		$query = $this->db->get();
		return $query;
	}


	public function add_tax_details(){

		$tax_data= array(
		'Tax_type' => $this->input->post('tax_type'),
		'Tax_name' => $this->input->post('tax_name'),
		'Tax_amount' => $this->input->post('tax_amt')
		);
		$this->db->set('Tax_create_dt', 'NOW()', FALSE);
		$insert = $this->db->insert('tax_details', $tax_data);
		return true;
		}

	function get_tax_details($id)
	{
		    $this->db->select('*');
        $this->db->from('tax_details');
		    $this->db->where('Tax_id',$id);
        $query = $this->db->get();
        //$this->db->last_query();
        return $query;
	}

	function tax_count(){

		$this->db->select('Tax_id');
		$this->db->from('tax_details');
		$query = $this->db->get();
		return $query->num_rows();
	}

	function edit_tax_details($id)
	{
		$data=array('Tax_type' => $this->input->post('tax_type'),'Tax_name' => $this->input->post('tax_name'),'Tax_amount' => $this->input->post('tax_amt'));
		$this->db->set('Tax_create_dt', 'NOW()', FALSE);
		$this->db->where('Tax_id',$id);
		$this->db->update('tax_details',$data);
		//echo $this->db->last_query(); exit;
		return true;
	}

	function delete()
	{
		$data=array('Tax_status'=>'D');
		$this->db->where('Tax_id',$this->input->get('id'));
		$this->db->update('tax_details',$data);
		return true;
	}
	public function get_tax_amount($id){
		$this->db->select('Tax_id,Tax_type,Tax_amount');
		$this->db->from('tax_details');
		$this->db->where('Tax_id', $id);
		$query = $this->db->get();
		return $query->result();
	}
}
