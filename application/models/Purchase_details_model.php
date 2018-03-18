<?php
class Purchase_details_model extends CI_Model
{
 	function purchase_details_list()
	{
	   	$this->db->select('purchase.*, customer_details.customer_id, customer_details.Customer_name');
    	$this->db->from('purchase');
   		$this->db->join('customer_details', 'customer_details.customer_id = purchase.Purchase_cus_id','Left');
		  $this->db->order_by("Purchase_id", "DESC");
   		 $query = $this->db->get();
      // echo $this->db->last_query(); exit;
   		 return $query;
	}

	function add_purchase_details()
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
        //new purchse details added
        $new_purchase_data = array(
          'Purchase_cus_id' =>   $cus_insert_id,
          'Purchase_cus_type'=>$this->input->post('cus_type'),
          'Purchase_invoice_no'=>$this->input->post('invoice'),
          'Purchase_desc'=>$this->input->post('description1'),
          'Purchase_dis_amt'=>$dis_amt,
          'Purchase_dis_type'=>$dis_type,
          'Purchase_tax_id'=>$this->input->post('tax'),
          'Purchase_tax_type'=>$this->input->post('tax_type'),
          'Purchase_tax_amount'=>$tax_amt,
           'Purchase_date'=>$today
         );
        $this->db->set('Purchase_cus_id', $cus_insert_id, FALSE);
        $this->db->set('Purchase_create_dt', 'NOW()', FALSE);
        $this->db->insert('purchase', $new_purchase_data);
        $purchase_insert_id = $this->db->insert_id();

      }else{
        //update Customer details
        $update_cust_data = array('Customer_comp' => $this->input->post('company'),'Customer_address' => $this->input->post('address'),'Customer_phone' => $this->input->post('phone'),'Customer_email' => $this->input->post('email'));
        $this->db->set('Customer_create_dt_time', 'NOW()', FALSE);
        $this->db->update('customer_details', $update_cust_data);
        //new purchse details added
        $new_purchase_data = array(
          'Purchase_cus_id' =>   $this->input->post('cust_name'),
          'Purchase_cus_type'=>$this->input->post('cus_type'),
          'Purchase_invoice_no'=>$this->input->post('invoice'),
          'Purchase_desc'=>$this->input->post('description1'),
          'Purchase_dis_amt'=>$dis_amt,
          'Purchase_dis_type'=>$dis_type,
          'Purchase_tax_id'=>$this->input->post('tax'),
          'Purchase_tax_type'=>$this->input->post('tax_type'),
          'Purchase_tax_amount'=>$tax_amt,
           'Purchase_date'=>$today
         );
        $this->db->set('Purchase_create_dt', 'NOW()', FALSE);
        $this->db->insert('purchase', $new_purchase_data);
        $purchase_insert_id = $this->db->insert_id();
      }
    //product post values
    $products = $this->input->post('product_id'); $prd_desc = $this->input->post('description'); $prd_rate = $this->input->post('rate'); $prd_qty = $this->input->post('quantity'); $prd_amount = $this->input->post('amount');
      for($i=0;$i<count($products);$i++){
        //product amount
        $amt += $prd_amount[$i];
      //purchase product details added
        $purchase_order_prd = array('Purchase_order_pur_id'=>$purchase_insert_id, 'Purchase_order_pro'=>$products[$i], 'Purchase_prd_qty'=>$prd_qty[$i], 'Purchase_prd_rate'=>$prd_rate[$i], 'Purchase_prd_amount'=>$prd_amount[$i],'Purchase_prd_desc'=>$prd_desc[$i]);
        $this->db->set('Purchase_prd_create_dt', 'NOW()', FALSE);
        $this->db->insert('purcahse_order',$purchase_order_prd);
        //stock details
        $this->db->select('*');
        $this->db->from('product_stock');
        $this->db->where('Prd_stock_prd_id',$products[$i]);
        $query = $this->db->get();
        $num = $query->num_rows();
        $result = $query->result();
        $stock_qty = $result[0]->Prd_stock_qty;
          if($num==1){
            $qty = $stock_qty+$prd_qty[$i];
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
    //update purchase details
     $update_purchase_data = array('Purchase_paid'=>$advance,'Purchase_advance'=>$advance,'Purchase_balance'=>$balance,'Purchase_total'=>$amt,'Purchase_pay_status'=>$status);
     $this->db->where('Purchase_id', $purchase_insert_id);
     $this->db->update('purchase', $update_purchase_data);
 //echo $this->db->last_query(); exit;
  return true;
	}
	function delete($id)
	{
    //purchase order Details
    $this->db->select('*');
    $this->db->from('purcahse_order');
    $this->db->where('Purchase_order_pur_id', $id);
    $query = $this->db->get();
    $result = $query->result();
    foreach($result as $ord){
     $pro_id =   $ord->Purchase_order_pro;
     $pro_qty =   $ord->Purchase_prd_qty;
        //stock details
          $this->db->select('*');
          $this->db->from('product_stock');
          $this->db->where('Prd_stock_prd_id',$pro_id);
          $query = $this->db->get();
          $result = $query->result();
          $stock_qty = $result[0]->Prd_stock_qty;
        $update_qty = $stock_qty-$pro_qty;

      $update_stock = array('Prd_stock_qty'=>$update_qty);
      $this->db->where('Prd_stock_prd_id',$pro_id);
      $this->db->update('product_stock',$update_stock);
    }

    //purchase order Deleted
    $this->db->where('Purchase_order_pur_id',$id);
    $this->db->delete('purcahse_order');
    //purchase details Deleted
		 $this->db->where('Purchase_id',$id);
		 $this->db->delete('purchase');
		return true;
	}

  function view_purchase_details($id){

    $this->db->select('purchase.*,customer_details.*');
    $this->db->from('purchase');
    $this->db->join('purcahse_order', 'purcahse_order.Purchase_order_pur_id = purchase.Purchase_id', 'Left');
    $this->db->join('customer_details', 'customer_details.Customer_id = purchase.Purchase_cus_id', 'Left');
    $this->db->where('Purchase_id', $id);
    $this->db->group_by('Purchase_order_pur_id');
    $query = $this->db->get();
  //  echo $this->db->last_query(); exit;
    return $query;
  }
  function purchase_order_details($id){

    $this->db->select('purcahse_order.*,product.Product_id,product.Product_name, product.Product_comp,product.Product_desc');
    $this->db->from('purcahse_order');
    $this->db->join('product', 'product.Product_id = purcahse_order.Purchase_order_pro', 'Left');
    $this->db->where('Purchase_order_pur_id', $id);
    $query = $this->db->get();
    //echo $this->db->last_query(); exit;
    return $query;
  }
  //start induvidual_payment purchase order
  function induvidual_payment(){
    $id = $this->input->post('purchase_id');
    $paid = $this->input->post('paid_amt');
    $pay_amt = $this->input->post('pay_amount');
    $total = $this->input->post('total');
    $i_pay = array(
      'Pur_payment_cust_id'=>$this->input->post('cus_id'),
      'Pur_payment_purchase_id'=>$id,
      'Pur_payment_amount'=>$pay_amt,
      'Pur_payment_desc'=>$this->input->post('pay_desc'),
      'Pur_payment_method'=>$this->input->post('pay_method'),
      'Pur_payment_ref'=>$this->input->post('pay_ref'),
      'Pur_payment_date'=>$this->input->post('pay_date')
    );
    $this->db->set('Pur_payment_create_dt','NOW()', FALSE);
    $this->db->insert('purchase_payment',$i_pay);
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
   $update_purchase = array('Purchase_paid'=>$up_paid,'Purchase_balance'=>$balance,'Purchase_pay_status'=>$status);
   $this->db->where('Purchase_id', $id);
   $this->db->update('purchase', $update_purchase);
  // echo $this->db->last->query; exit;
   return true;
  }
  //end induvidual_payment purachse order

  function customer_payment_list(){
    $this->db->select('purchase.Purchase_cus_id, customer_details.Customer_id,customer_details.Customer_name');
    $this->db->from('purchase');
    $this->db->join('customer_details','customer_details.Customer_id = purchase.Purchase_cus_id', 'Left');
    $this->db->group_by('customer_details.Customer_name');
    $query = $this->db->get();
    //echo $this->db->last_query(); exit;
    return $query;
  }
  function get_cus_payment_details($id){

    $this->db->select_sum('Purchase_total');
    $this->db->select_sum('Purchase_paid');
    $this->db->select_sum('Purchase_balance');
    $this->db->from('purchase');
    $this->db->where('Purchase_balance !=', 0);
    $this->db->where('Purchase_cus_id', $id);
    $query = $this->db->get();
    //echo $this->db->last_query(); exit;
    return $query->result();
  }

  function customer_payment(){
  $cus_id = $this->input->post('cus_id');
    $pay_amt = $this->input->post('pay_amount');
    $today = date('Y-m-d');
    //purchase_details_list
    $this->db->select('Purchase_id, Purchase_cus_id, Purchase_paid, Purchase_paid, Purchase_balance');
    $this->db->from('purchase');
    $this->db->where('Purchase_cus_id', $cus_id);
    $this->db->order_by('Purchase_id',"ASC");
    $query = $this->db->get();
    $result = $query->result();
    $count = count($result);
  //print_r($result); exit;
  $pur_id="";
        foreach($result as $p){
            $pay_amt;
          if($p->Purchase_balance<=$pay_amt){
             $paid = $p->Purchase_balance+$p->Purchase_paid;
              $update_purchase = array('Purchase_paid'=>$paid,'Purchase_balance'=>'0','Purchase_pay_status'=>"P");
              $this->db->where('Purchase_id',$p->Purchase_id);
              $this->db->update('purchase',$update_purchase);
              $pay_amt =  $pay_amt-$p->Purchase_balance;
            $pur_id[] = $p->Purchase_id;
          }
          elseif($p->Purchase_balance>$pay_amt){
            $balance = $p->Purchase_balance-$pay_amt;
            $paid = $p->Purchase_paid+$pay_amt;
            $update_purchase = array('Purchase_paid'=>$paid,'Purchase_balance'=>$balance,'Purchase_pay_status'=>"PP");
            $this->db->where('Purchase_id',$p->Purchase_id);
            $this->db->update('purchase',$update_purchase);
            $pay_amt=0;
          }
        }
        $count = count($pur_id);
        if($count>1){
         $paid_id =  implode(',',$pur_id);
       }else{
         $paid_id =  $p->Purchase_id;
       }
      $insert_payment = array(
        'Pur_payment_cust_id'=>$cus_id,
        'Pur_payment_purchase_id'=>$paid_id,
        'Pur_payment_date'=>$today,
        'Pur_payment_amount' =>$this->input->post('pay_amount'),
        'Pur_payment_desc' =>$this->input->post('pay_desc'),
        'Pur_payment_method' =>$this->input->post('pay_method'),
        'Pur_payment_ref'=>$this->input->post('pay_ref')
      );
      $this->db->set('Pur_payment_create_dt','NOW()',FALSE);
      $this->db->insert('purchase_payment', $insert_payment);
    //echo $this->db->last_query(); exit;
     return true;
    }

}
?>
