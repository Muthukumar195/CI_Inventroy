<?php
Class Expences_model extends CI_Model
{
 	function expences_master_details()
	{
		$this->db->select('*');
    $this->db->from('expences_master');
    $this->db->where('Exp_mas_status', "A");
		$this->db->order_by("Exp_mas_id", "DESC");
    $query = $this->db->get();
    return $query;
	}

	function add_expences_master_details()
	{
		$data = array(
			'Exp_mas_name' => $this->input->post('exp_mas_name')
		);
		$this->db->set('Exp_mas_create_dt	', 'NOW()', FALSE);
		$insert=$this->db->insert('expences_master', $data);
		return true;
	}
	function get_expences_master_details($id)
	{
		$this->db->select('*');
    $this->db->from('expences_master');
		$this->db->where('Exp_mas_id',$id);
    $query = $this->db->get();
    echo $this->db->last_query(); exit;
    return $query;
	}
	function edit_expences_master_details($id)
	{
    $data = array('Exp_mas_name' => $this->input->post('exp_mas_name'));
		$this->db->set('Exp_mas_create_dt	', 'NOW()', FALSE);
		$this->db->where('Exp_mas_id',$id);
		$this->db->update('expences_master',$data);
		return true;
	}

	function deny()
	{
		$data=array('Exp_mas_status'=>'D');
		$this->db->where('Exp_mas_id',$this->input->get('id'));
		$this->db->update('expences_master',$data);
		return true;
	}

	function expences_master_name_list()
	{
		$this->db->select('Exp_mas_id, Exp_mas_name');
		$this->db->from('expences_master');
		$this->db->where('Exp_mas_status', 'A');
		$query=$this->db->get();
		return $query;
	}
  function expences_details_list()
	{
		$this->db->select('expenses_details.*, expences_master.Exp_mas_id, expences_master.Exp_mas_name');
    $this->db->from('expenses_details');
    $this->db->join('expences_master', 'expences_master.Exp_mas_id = Exp_master_id','Left');
    $this->db->where('Exp_status', "A");
		$this->db->order_by("Exp_id", "DESC");
    $query = $this->db->get();
    return $query;
	}
  function add_expences_details(){
    $data =  array(
      'Exp_master_id' => $this->input->post('ex_mas'),
      'Exp_date' => $this->input->post('ex_date'),
      'Exp_desc' => $this->input->post('description'),
      'Exp_amount' => $this->input->post('expences_amount'),
      'Exp_method' => $this->input->post('methods'),
      'Exp_ref'   => $this->input->post('ref')
    );
    $this->db->set('Exp_create_dt', 'NOW()', FALSE);
    $this->db->insert('expenses_details', $data);
    //echo $this->db->last_query(); exit;
    return true;
  }
  function get_expences_details($id)
	{
    $this->db->select('expenses_details.*, expences_master.Exp_mas_id, expences_master.Exp_mas_name');
    $this->db->from('expenses_details');
    $this->db->join('expences_master', 'expences_master.Exp_mas_id = Exp_master_id','Left');
		$this->db->where('Exp_id',$id);
    $query = $this->db->get();
    //$this->db->last_query();
    return $query;
	}
  function edit_expences_details($id){
    $data = array(
      'Exp_master_id' => $this->input->post('Exp_master_id'),
      'Exp_date' => $this->input->post('ex_date'),
      'Exp_desc' => $this->input->post('description'),
      'Exp_amount' => $this->input->post('expences_amount'),
      'Exp_method' => $this->input->post('methods'),
      'Exp_ref'   => $this->input->post('ref')
    );
    $this->db->set('Exp_create_dt', 'NOW()', FALSE);
    $this->db->where('Exp_id', $id);
    $this->db->update('expenses_details', $data);
//  echo   $this->db->last_query();  exit;
    return true;
  }


}
?>
