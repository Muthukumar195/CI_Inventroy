<?php
class Report_model extends CI_Model
{
	//start sales Report details
	function sales_report_details(){
		
		$this->db->select('sales.*, customer_details.Customer_id, customer_details.Customer_name');
		$this->db->from('sales');
		$this->db->join('customer_details','customer_details.Customer_id = Sales_cus_id','Left');
		$this->db->order_by('Sales_date', 'DESC');
		$query = $this->db->get();
		return $query;
	}
	function search_sales_report(){
		
		$this->db->select('sales.*, customer_details.Customer_id, customer_details.Customer_name');
		$this->db->from('sales');
		$this->db->join('customer_details','customer_details.Customer_id = sales.Sales_cus_id','Left');
		$fnl_where = array();
			if($this->input->post('date')||$this->input->post('type')||$this->input->post('customer')){
				if($this->input->post('date')!=null){
					$date = '(sales.Sales_date ="'.date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('date')))).'")';
					$fnl_where[] = $date;
				}
				if($this->input->post('type')!=null){
					$type = '(sales.Sales_cus_type ="'.$this->input->post('type').'")';
					$fnl_where[] = $type;
				}
				if($this->input->post('name')!=null){
					$type = '(customer_details.Customer_name LIKE"%'.$this->input->post('name').'%")';
					$fnl_where[] = $type;
				}
				$fnl_count=0; $where_con='';
				foreach($fnl_where as $where){
					$where_con .=$where;
					if($fnl_count>=0&&$fnl_count<(count($fnl_where)-1)){
						$where_con .= 'AND';				
				   }
				   $fnl_count++;
			    }
				$this->db->where($where_con);
			}
		$query = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $query;
	}
	//End sales Report Details
	
	//start product Report details
	function product_report_details(){
		$this->db->select('sales_order.*, product.Product_id, product.Product_name,sales.Sales_id, sales.Sales_invoice_no');
		$this->db->from('sales_order');
		$this->db->join('product','product.Product_id = sales_order.Sales_order_pro','Left');
		$this->db->join('sales','sales.Sales_id = sales_order.Sales_order_sal_id','Left');
		$this->db->order_by('Sales_order_create_dt', 'DESC');
		$query = $this->db->get();
		return $query;
	}
	function search_product_report(){
		
		$this->db->select('sales_order.*, product.Product_id, product.Product_name,sales.Sales_id, sales.Sales_invoice_no');
		$this->db->from('sales_order');
		$this->db->join('product','product.Product_id = sales_order.Sales_order_pro','Left');
		$this->db->join('sales','sales.Sales_id = sales_order.Sales_order_sal_id','Left');
		$fnl_where = array();
			if($this->input->post('date')||$this->input->post('product')||$this->input->post('invoice')){
				if($this->input->post('date')!=null){
					$date = '(sales_order.Sales_order_create_dt LIKE"%'.date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('date')))).'%")';
					$fnl_where[] = $date;
				}
				if($this->input->post('product')!=null){
					$type = '(sales_order.Sales_order_pro ="'.$this->input->post('product').'")';
					$fnl_where[] = $type;
				}
				if($this->input->post('invoice')!=null){
					$type = '(sales.Sales_invoice_no LIKE"%'.$this->input->post('invoice').'%")';
					$fnl_where[] = $type;
				}
				$fnl_count=0; $where_con='';
				foreach($fnl_where as $where){
					$where_con .=$where;
					if($fnl_count>=0&&$fnl_count<(count($fnl_where)-1)){
						$where_con .= 'AND';				
				   }
				   $fnl_count++;
			    }
				$this->db->where($where_con);
			}
		$query = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $query;
	}
}
?>
