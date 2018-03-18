<?php
class Product_details_model extends CI_Model
{
 	function product_details_list()
	{
		$this->db->select('product.*, product_stock.Prd_stock_prd_id, product_stock.Prd_stock_qty');
    $this->db->from('product');
		$this->db->join('product_stock','product.Product_id=product_stock.Prd_stock_prd_id',"Left");
		$this->db->where("Product_status","A");
		$this->db->order_by("Product_id", "DESC");
        $query = $this->db->get();
        return $query;
	}

	function add_product_details()
	{
		$user_data = array(
		    'Product_name' => $this->input->post('pro_name'),
			'Product_comp' => $this->input->post('company'),
			'Product_prize' => $this->input->post('b_price'),
			'Product_sales' => $this->input->post('o_price'),
			'Product_vat' => $this->input->post('vat'),
			'Product_desc' => $this->input->post('desc')
		);
		$this->db->set('Product_create_dt', 'NOW()', FALSE);
		$insert=$this->db->insert('product', $user_data);

		return true;
	}
	function get_product_details($id)
	{
		$this->db->select('product.*,product_stock.Prd_stock_prd_id,product_stock.Prd_stock_qty');
        $this->db->from('product');
  		 $this->db->join('product_stock', 'product_stock.Prd_stock_prd_id = product.Product_id','Left');
		$this->db->where('Product_id',$id);
   		 $query = $this->db->get();
  		  return $query;
	}

	function product_count(){

		$this->db->select('Product_id');
		$this->db->from('product');
		$query = $this->db->get();
		return $query->num_rows();
	}

	function edit_product_details($id)
	{
		$data=array('Product_name' => $this->input->post('pro_name'),'Product_comp' => $this->input->post('company'),'Product_prize' => $this->input->post('b_price'),'Product_sales' => $this->input->post('o_price'),'Product_vat' => $this->input->post('vat'),'Product_desc' => $this->input->post('desc'));
		$this->db->set('Product_create_dt', 'NOW()', FALSE);
		$this->db->where('Product_id',$id);
		$this->db->update('product',$data);
		//echo $this->db->last_query(); exit;
		return true;
	}

	function delete()
	{
		$data=array('Product_status'=>'D');
		$this->db->where('Product_id',$this->input->get('id'));
		$this->db->update('product',$data);
		return true;
	}

	function product_name_list(){

		$this->db->select('Product_id, Product_name, Product_status');
		$this->db->from('product');
		$this->db->where('Product_status', "A");
		$query = $this->db->get();
		return $query;
	}

	function new_stock()
	{ $num='';
		$this->db->select('*');
		$this->db->from('product_stock');
		$this->db->where('Prd_stock_prd_id',$this->input->post('prod_id'));
		$query = $this->db->get();
		$num = $query->num_rows();
		$result = $query->result();
		$stock_qty = $result[0]->Prd_stock_qty;

		if($num==1){
			$qty = $stock_qty+$this->input->post('stock');
			$data=array(
			'Prd_stock_qty'=>$qty,
			'Prd_stock_prd_id'=>$this->input->post('prod_id')
			);
		$this->db->set('Prd_stock_create_dt', 'NOW()', FALSE);
		$this->db->where('Prd_stock_prd_id',$this->input->post('prod_id'));
		$update=$this->db->update('product_stock',$data);
		return true;
		}else{
			$data=array(
			'Prd_stock_qty'=>$this->input->post('stock'),
			'Prd_stock_prd_id'=>$this->input->post('prod_id')
			);
		$this->db->set('Prd_stock_create_dt', 'NOW()', FALSE);
		$insert=$this->db->insert('product_stock',$data);
		return true;
		}
	}



}
?>
