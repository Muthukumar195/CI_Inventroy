<?php
class Sales_details_model extends CI_Model
{
 	function sales_details_list()
	{
		$this->db->select('sales.*, customer_details.customer_id, customer_details.Customer_name');
    $this->db->from('sales');
    $this->db->join('customer_details', 'customer_details.customer_id = sales.Sales_cus_id','Left');
		$this->db->order_by("Sales_id", "DESC");
    $query = $this->db->get();
    //echo $this->db->last_query(); exit;
    return $query;
	}
  function genrate_invoice_no(){

    $this->db->select_max('Sales_id');
    $this->db->from('sales');
    $query =  $this->db->get();
    $result = $query->result();
    $max_id =  $result[0]->Sales_id;
    $genrate_no =  $max_id+1;
    return $genrate_no;

  }
	function add_sales_details()
	{ $today = date('Y-m-d'); $num=''; $tax_amt='';  $dis_amt=''; $dis_type=''; $tax_type=''; $amt=''; $tax=''; $advance='';
    $tax = $this->input->post('tax');
    $tax_amt =  $this->input->post('tax_amount');
    $tax_type =  $this->input->post('tax_type');
    $dis_amt =  $this->input->post('dis_amt');
    $dis_type =  $this->input->post('dis_type');
    $advance = $this->input->post('advance');
      if($this->input->post('new_cust_name')!=""){

        //new customer details added
        $new_cust_data = array('Customer_type' => $this->input->post('cus_type'),'Customer_name' => $this->input->post('new_cust_name'),'Customer_comp' => $this->input->post('company'),'Customer_address' => $this->input->post('address'),'Customer_phone' => $this->input->post('phone'),'Customer_email' => $this->input->post('email'));
        $this->db->set('Customer_create_dt_time', 'NOW()', FALSE);
        $this->db->insert('customer_details', $new_cust_data);
        $cus_insert_id = $this->db->insert_id();
        //new sales details added
        $new_sales_data = array(
          'Sales_cus_id' =>   $cus_insert_id,
          'Sales_cus_type'=>$this->input->post('cus_type'),
          'Sales_invoice_no'=>$this->input->post('invoice'),
          'Sales_desc'=>$this->input->post('description1'),
          'Sales_dis_amt'=>$dis_amt,
          'Sales_dis_type'=>$dis_type,
          'Sales_tax_id'=>$this->input->post('tax'),
          'Sales_tax_type'=>$this->input->post('tax_type'),
          'Sales_tax_amount'=>$tax_amt,
           'Sales_date'=>$today
         );
        $this->db->set('Sales_cus_id', $cus_insert_id, FALSE);
        $this->db->set('Sales_create_dt', 'NOW()', FALSE);
        $this->db->insert('sales', $new_sales_data);
        $sales_insert_id = $this->db->insert_id();

      }else{
        //update Customer details
        $update_cust_data = array('Customer_comp' => $this->input->post('company'),'Customer_address' => $this->input->post('address'),'Customer_phone' => $this->input->post('phone'),'Customer_email' => $this->input->post('email'));
        $this->db->set('Customer_create_dt_time', 'NOW()', FALSE);
        $this->db->update('customer_details', $update_cust_data);
        //new purchse details added
        $new_sales_data = array(
          'Sales_cus_id' =>   $this->input->post('cust_name'),
          'Sales_cus_type'=>$this->input->post('cus_type'),
          'Sales_invoice_no'=>$this->input->post('invoice'),
          'Sales_desc'=>$this->input->post('description1'),
          'Sales_dis_amt'=>$dis_amt,
          'Sales_dis_type'=>$dis_type,
          'Sales_tax_id'=>$this->input->post('tax'),
          'Sales_tax_type'=>$this->input->post('tax_type'),
          'Sales_tax_amount'=>$tax_amt,
           'Sales_date'=>$today
         );
        $this->db->set('Sales_create_dt', 'NOW()', FALSE);
        $this->db->insert('sales', $new_sales_data);
        $sales_insert_id = $this->db->insert_id();
      }
    //product post values
    $products = $this->input->post('product_id'); $prd_desc = $this->input->post('description'); $prd_rate = $this->input->post('rate'); $prd_qty = $this->input->post('quantity'); $prd_amount = $this->input->post('amount');
      for($i=0;$i<count($products);$i++){
        //product amount
        $amt += $prd_amount[$i];
      //sales product details added
        $sales_order_prd = array('Sales_order_sal_id'=>$sales_insert_id, 'Sales_order_pro'=>$products[$i], 'Sales_order_qty'=>$prd_qty[$i], 'Sales_order_rate'=>$prd_rate[$i], 'Sales_order_amount'=>$prd_amount[$i],'Sales_order_desc'=>$prd_desc[$i]);
        $this->db->set('Sales_order_create_dt', 'NOW()', FALSE);
        $this->db->insert('sales_order',$sales_order_prd);
        //stock details
        $this->db->select('*');
        $this->db->from('product_stock');
        $this->db->where('Prd_stock_prd_id',$products[$i]);
        $query = $this->db->get();
        $num = $query->num_rows();
        $result = $query->result();
        $stock_qty = $result[0]->Prd_stock_qty;
          if($num==1){
            $qty = $stock_qty-$prd_qty[$i];
            $stock_update=array(
            'Prd_stock_qty'=>$qty,
            );
          $this->db->set('Prd_stock_create_dt', 'NOW()', FALSE);
          $this->db->where('Prd_stock_prd_id',$products[$i]);
          $update=$this->db->update('product_stock',$stock_update);
        //  echo $this->db->last_query(); exit;
          }else{
            $new_stock=array(
            'Prd_stock_qty'=>$prd_qty[$i],
            'Prd_stock_prd_id'=>$products[$i]
            );
          $this->db->set('Prd_stock_create_dt', 'NOW()', FALSE);
          $insert=$this->db->insert('product_stock',$new_stock);
         }
     }

    //tax calculation added
       if($tax!=""){
         if($tax_type=="Fixed"){
           $amt = $amt+$tax_amt;
         }
         elseif($tax_type=="Persentage"){
           $amt = $amt+($amt*($tax_amt/100));
         }
       }
    //Discount calculation added
    if($dis_amt!=""){
      if($dis_type=="Fixed"){
        $amt = $amt-$dis_amt;
      }
      elseif($dis_type=="Persentage"){
        $amt = $amt-($amt*($dis_amt/100));
      }
    }
    //Advance calculation
    if($advance!=""){
        $balance = $amt-$advance;
      }
      else{
        $balance = $amt;
      }
        //payment status
      if($balance=="0"){
        $status = "P";
      }
      elseif($advance==""){

        $status = "U";
      }else{
          $status = "PP";
      }
    //update sales details
     $update_sales_data = array('Sales_paid'=>$advance,'Sales_advance'=>$advance,'Sales_balance'=>$balance,'Sales_total'=>$amt,'Sales_pay_status'=>$status);
     $this->db->where('Sales_id', $sales_insert_id);
     $this->db->update('sales', $update_sales_data);
 //echo $this->db->last_query(); exit;
  return true;
	}
	function delete($id)
	{
    //sales order Details
    $this->db->select('*');
    $this->db->from('sales_order');
    $this->db->where('Sales_order_sal_id', $id);
    $query = $this->db->get();
    $result = $query->result();
    foreach($result as $ord){
     $pro_id =   $ord->Sales_order_pro;
     $pro_qty =   $ord->Sales_order_qty;
        //stock details
          $this->db->select('*');
          $this->db->from('product_stock');
          $this->db->where('Prd_stock_prd_id',$pro_id);
          $query = $this->db->get();
          $result = $query->result();
          $stock_qty = $result[0]->Prd_stock_qty;
        $update_qty = $stock_qty+$pro_qty;

      $update_stock = array('Prd_stock_qty'=>$update_qty);
      $this->db->where('Prd_stock_prd_id',$pro_id);
      $this->db->update('product_stock',$update_stock);
    }

    //sales order Deleted
    $this->db->where('Sales_order_sal_id',$id);
    $this->db->delete('sales_order');
    //sales details Deleted
		 $this->db->where('Sales_id',$id);
		 $this->db->delete('sales');
		return true;
	}

  function view_sales_details($id){

    $this->db->select('sales.*,customer_details.*');
    $this->db->from('sales');
    $this->db->join('sales_order', 'sales_order.Sales_order_sal_id = sales.Sales_id', 'Left');
    $this->db->join('customer_details', 'customer_details.Customer_id = sales.Sales_cus_id', 'Left');
    $this->db->where('Sales_id', $id);
    $this->db->group_by('Sales_order_sal_id');
    $query = $this->db->get();
  //  echo $this->db->last_query(); exit;
    return $query;
  }
  function sales_order_details($id){

    $this->db->select('sales_order.*,product.Product_id,product.Product_name, product.Product_comp,product.Product_desc');
    $this->db->from('sales_order');
    $this->db->join('product', 'product.Product_id = sales_order.Sales_order_pro', 'Left');
    $this->db->where('Sales_order_sal_id', $id);
    $query = $this->db->get();
    //echo $this->db->last_query(); exit;
    return $query;
  }
  //start induvidual_payment sales order
  function induvidual_payment(){
    $id = $this->input->post('sales_id');
    $paid = $this->input->post('paid_amt');
    $pay_amt = $this->input->post('pay_amount');
    $total = $this->input->post('total');
    $i_pay = array(
      'Sales_payment_cust_id'=>$this->input->post('cus_id'),
      'Sales_payment_sales_id'=>$id,
      'Sales_payment_amount'=>$pay_amt,
      'Sales_payment_desc'=>$this->input->post('pay_desc'),
      'Sales_payment_method'=>$this->input->post('pay_method'),
      'Sales_payment_ref'=>$this->input->post('pay_ref'),
      'Sales_payment_date'=>$this->input->post('pay_date')
    );
    $this->db->set('Sales_payment_create_dt','NOW()', FALSE);
    $this->db->insert('sales_payment',$i_pay);
    //echo $this->db->last_query(); exit;
    $up_paid = $paid+$pay_amt;
    $balance = $total-$up_paid;
    if($balance=="0"){
      $status = "P";
    }
    elseif($paid=="0"){
        $status = "U";
    }else{
      $status = "PP";
    }
  //  echo $status; exit;
   $update_sales = array('Sales_paid'=>$up_paid,'Sales_balance'=>$balance,'Sales_pay_status'=>$status);
   $this->db->where('Sales_id', $id);
   $this->db->update('sales', $update_sales);
  // echo $this->db->last->query; exit;
   return true;
  }
  //end induvidual_payment Sales order

  function customer_payment_list(){
    $this->db->select('sales.Sales_cus_id, customer_details.Customer_id,customer_details.Customer_name');
    $this->db->from('sales');
    $this->db->join('customer_details','customer_details.Customer_id = sales.Sales_cus_id', 'Left');
    $this->db->group_by('customer_details.Customer_name');
    $query = $this->db->get();
    //echo $this->db->last_query(); exit;
    return $query;
  }
  function get_cus_payment_details($id){

    $this->db->select_sum('Sales_total');
    $this->db->select_sum('Sales_paid');
    $this->db->select_sum('Sales_balance');
    $this->db->from('sales');
    $this->db->where('Sales_balance !=', 0);
    $this->db->where('Sales_cus_id', $id);
    $query = $this->db->get();
    //echo $this->db->last_query(); exit;
    return $query->result();
  }

  function customer_payment(){
  $cus_id = $this->input->post('cus_id');
    $pay_amt = $this->input->post('pay_amount');
    $today = date('Y-m-d');
    //purchase_details_list
    $this->db->select('Sales_id, Sales_cus_id, Sales_paid, Sales_paid, Sales_balance');
    $this->db->from('sales');
    $this->db->where('Sales_cus_id', $cus_id);
    $this->db->order_by('Sales_id',"ASC");
    $query = $this->db->get();
    $result = $query->result();
    $count = count($result);
  //print_r($result); exit;
  $sal_id="";
        foreach($result as $p){
            $pay_amt;
          if($p->Sales_balance<=$pay_amt){
             $paid = $p->Sales_balance+$p->Sales_paid;
              $update_sales = array('Sales_paid'=>$paid,'Sales_balance'=>'0','Sales_pay_status'=>"P");
              $this->db->where('Sales_id',$p->Sales_id);
              $this->db->update('sales',$update_sales);
              $pay_amt =  $pay_amt-$p->Sales_balance;
            $sal_id[] = $p->Sales_id;
          }
          elseif($p->Sales_balance>$pay_amt){
            $balance = $p->Sales_balance-$pay_amt;
            $paid = $p->Sales_paid+$pay_amt;
            $update_sales = array('Sales_paid'=>$paid,'Sales_balance'=>$balance,'Sales_pay_status'=>"PP");
            $this->db->where('Sales_id',$p->Sales_id);
            $this->db->update('sales',$update_sales);
            $pay_amt=0;
          }
        }
        $count = count($pur_id);
        if($count>1){
         $paid_id =  implode(',',$pur_id);
       }else{
         $paid_id =  $p->Sales_id;
       }
      $insert_payment = array(
        'Sales_payment_cust_id'=>$cus_id,
        'Sales_payment_sales_id'=>$paid_id,
        'Sales_payment_date'=>$today,
        'Sales_payment_amount' =>$this->input->post('pay_amount'),
        'Sales_payment_desc' =>$this->input->post('pay_desc'),
        'Sales_payment_method' =>$this->input->post('pay_method'),
        'Sales_payment_ref'=>$this->input->post('pay_ref')
      );
      $this->db->set('Sales_payment_create_dt','NOW()',FALSE);
      $this->db->insert('sales_payment', $insert_payment);
    //echo $this->db->last_query(); exit;
     return true;
    }

}
?>
