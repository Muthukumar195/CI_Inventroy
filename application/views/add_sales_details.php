<?php include("include/header.php"); ?>

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<?php include("include/sidebar.php"); ?>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Add Sales order</h4>
						</div>

						<!--<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div>-->
					</div>

				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

                		<!--start Form-->
                        <div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title"><i class="icon-add"></i>&nbsp;<strong>Add Sales Details</strong></h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
                               <?php if($this->session->flashdata('failear_msg')){?>
                                    <div class="alert alert-danger alert-styled-left alert-bordered">
										<button type="button" class="close" data-dismiss="alert"><span>Ã?</span><span class="sr-only">Close</span></button>
										<span class="text-semibold"><?php echo $this->session->flashdata('failear_msg'); ?></span>
                                    </div>
                                <?php } ?>
                                <?php if($this->session->flashdata('success_msg')){?>
                                   <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
										<button type="button" class="close" data-dismiss="alert"><span>Ã?</span><span class="sr-only">Close</span></button>
										<span class="text-semibold"> <?php echo $this->session->flashdata('success_msg'); ?></span>
								    </div>
                                <?php } ?>
							 <?php echo form_open_multipart('sales_details/validate_sales_details', array('class'=>'')); ?>
                             <span style="color:red; "><?php echo validation_errors(); ?></span>
                             <div class="panel-body">
									<div class="tabbable">

										<div class="tab-content" >
											<div class="tab-pane active" id="justified-right-icon-tab1">
												<div class="row">
                            <div class="row"> <div class="col-md-3"> </div>
                                  <div class="col-md-6">
                                     <div class="form-group ">
                                         <span id="cus_type" class="InputGroup">
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <label >
											           <input type="radio" name="cus_type" id="Retailer" value="Retailer" >
												         Retailer
										            	</label>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <label>
											           <input type="radio" name="cus_type" id="Customer"  value="Customer" >
												         Customer
										            	</label>
                                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                           <label>
											           <input type="radio" name="cus_type" id="Wholesaler"  value="Wholesaler" >
												         Wholesaler
		      	</label>
		                               </span>
		                                  </div>
		                                </div>

		                             <div class="col-md-3"><a href="#" id="add_cust" >Add customer</a> </div>
		                          </div>
		                        <div class="row">
		                            <div class="col-md-4">
		                             <div class="form-group" id="cust" style="display:none;">
																	 <label >Customer Name <span class="req">*</span></label>

			  												 <?php
		                                      $data1 = array(
		                                      'name'   => 'new_cust_name',
		                                      'id'     => 'new_cust_name',
		                                      'value'  => '',
		                                      'class'  => 'form-control',
		                                      'placeholder' => 'Enter a Name'
		                                      );
		                                      echo form_input($data1);
		                                      ?>

		   														</div>
		                                  <div class="form-group" id="cont">
		                                      <label>Customer Name:</label>
		                                      <select name="cust_name" id="customer_list" class="form-control" > </select>

		                                  </div>
		                              </div>

		                             <div class="col-md-4">
		                                  <div class="form-group">
		                                      <label>Company Name:</label>
		                                      <?php
		                                      $data2 = array(
		                                      'name'   => 'company',
		                                      'id'     => 'company',
		                                      'value'  => '',
		                                      'class'  => 'form-control',
		                                      'placeholder' => 'Enter a Company'
		                                      );
		                                      echo form_input($data2);
		                                      ?>
		                                  </div>
		                              </div>
		                              <div class="col-md-4">
		                                  <div class="form-group">
		                                      <label>Invoice Number:</label>
		                                      <?php
		                                      $data0 = array(
		                                      'name'   => 'invoice',
		                                      'id'     => 'invoice',
		                                      'value'  =>  $genrate_invoice_no,
		                                      'class'  => 'form-control',
		                                      'placeholder' => 'Enter a invoice Number',
																					'readonly' => 'readonly'
		                                      );
		                                      echo form_input($data0);
		                                      ?>
		                                  </div>
		                              </div>
		                          </div>

													 </div>
															<div class="row">
		                              <div class="col-md-12">
		                                  <div class="form-group">
		                                      <label>Address:</label>
		                                       <?php
		                                      $data3 = array(
		                                      'name'   => 'address',
		                                      'id'     => 'address',
		                                      'value'  => '',
		                                      'class'  => 'form-control',
		                                      'placeholder' => 'Enter a Address',
		                                      'rows'   => '3'
		                                      );
		                                      echo form_textarea($data3);
		                                      ?>
		                                  </div>
		                              </div>


																</div>
		                        <div class="row">
		                              <div class="col-md-6">
		                                  <div class="form-group">
		                                      <label>Phone:</label>
		                                       <?php
		                                      $data6 = array(
		                                      'name'   => 'phone',
		                                      'id'     => 'phone',
		                                      'value'  => '',
		                                      'class'  => 'form-control',
		                                      'placeholder' => 'Enter a Phone No'
		                                      );
		                                      echo form_input($data6);
		                                      ?>
		                                  </div>
		                              </div>

		                              <div class="col-md-6">
		                                  <div class="form-group">
		                                      <label>Email:</label>
		                                      <?php
		                                      $data8 = array(
		                                      'name'   => 'email',
		                                      'id'     => 'email',
		                                      'value'  => '',
		                                      'class'  => 'form-control',
		                                      'placeholder' => 'Enter a Email'
		                                      );
		                                      echo form_input($data8);
		                                      ?>
		                                  </div>
		                              </div>
		                          </div>
		                          <div class="row">
		                              <div class="col-md-12">
		                         	<table class="table table-bordered table-hover table-striped ser" >
																	<thead class="bordered">
																		<tr role="row">
																			<th>
																				<div class="checkbox">
																					<label>
																						<input type="checkbox" class="colored-blue check_all">
																						<span class="text"></span>
																					</label>
																				</div>
																			</th>
																			<th>Product</th>
																			<th>Description</th>
																			<th>Quantity</th>
																			<th>Rate</th>
																			<th>Amount</th>
																		</tr>
																	    </thead>

																			<tr>
																				<td>
																					<div class="checkbox">
																						<label>
																							<input type="checkbox" class="colored-blue case chk">
																							<span class="text"></span>
																						</label>
																					</div>
																				</td>
																				<td>
																					<select class="form-control" name="product_id[]" id="product_id[]" onChange="get_sales_val(this.value,0);">
																						<option value="0" >Select</option>
																						<?php foreach($product_name_list->result() as $pdt){ ?>
																						    <option value="<?php echo $pdt->Product_id; ?>"><?php echo $pdt->Product_name; ?></option>
																						<?php  } ?>

																					</select>

																				</td>
																				<td><textarea class="form-control" rows="1" name="description[]" id="description0"></textarea></td>
																				<td>
																					<input type="text" class="form-control" name="quantity[]" id="quantity0" onBlur="cal_amount(0);" value=""/>
																					<input type="hidden" class="form-control" name="stock[]" id="stock0"  onblur="cal_amount(0);"/>
																				</td>
																				<td><input type="text" class="form-control" name="rate[]" id="rate0" onBlur="cal_amount(0);" value="" readonly/></td>


																				<td><input type="text" class="form-control amt" name="amount[]"  id="amount0" value="" readonly/></td>
																			</tr>
																</table>
		                              </div>
		                          </div>
		                       <br>
		                        <button type="button" class='addmore btn btn-xs btn-danger'>+ Add More</button>
														<button type="button" class='delete btn btn-xs btn-info'>- Delete</button>
														<input type="text" name="tot_salse" class="form-control" id="tot_salse" style="float: right; width: 20%; " readonly>
		                      <br> <br>
													<div onMouseOver="calculate();">
		                      <div class="row">
		                              <div class="col-md-6">
		                                <div class="form-group">
		                                      <label>Tax:</label>
																					<select name="tax" class='form-control' id="tax">
																						<option value="">Select tax</option>
																						<?php
																						foreach ($tax_details_list->result() as $tax) {
																					    	echo '<option value="'.$tax->Tax_id.'">'.$tax->Tax_name.'</option>';
																						}

																						 ?>
																					</select>

		                                  </div>
		                              </div>

		                              <div class="col-md-4">
		                                  <div class="form-group">
		                                      <label>Tax Type:</label>
		                                      <?php
		                                      $data8 = array(
		                                      'name'   => 'tax_type',
		                                      'id'     => 'tax_type',
		                                      'value'  => '',
		                                      'class'  => 'form-control',
																					'readonly' => 'readonly'
		                                      );
		                                      echo form_input($data8);
		                                      ?>
		                                  </div>
		                              </div>
                                <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Tax amount:</label>
                                            <?php
                                            $data8 = array(
                                            'name'   => 'tax_amount',
                                            'id'     => 'tax_amount',
                                            'value'  => '',
                                            'class'  => 'form-control',
                                            'readonly' => 'readonly',

                                            );
                                            echo form_input($data8);
                                            ?>
                                        </div>
                                </div>
		                          </div>
		                      <div class="row">
		                              <div class="col-md-6">
		                               <label>Discount Type:</label>
		                                <div class="form-group ">
		                                   <span id="dis_type" class="InputGroup">
		                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		                                    <label >
		                                     <input type="radio" name="dis_type" id="F" value="Fixed" >
		                                       Fixed
		                                      </label>
		                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		                                      <label>
		                                     <input type="radio" name="dis_type" id="P"  value="Persentage" >
		                                       Persentage
		                                      </label>

		                                  </span>
		                                  </div>
		                              </div>

		                              <div class="col-md-6">
		                                  <div class="form-group">
		                                      <label>Discount Amount/Persentage:</label>
		                                      <?php
		                                      $data8 = array(
		                                      'name'   => 'dis_amt',
		                                      'id'     => 'dis_amt',
		                                      'value'  => '',
		                                      'class'  => 'form-control',
		                                      'placeholder' => 'Enter a discount'
		                                      );
		                                      echo form_input($data8);
		                                      ?>
		                                  </div>
		                              </div>
		                          </div>

																<div class="row">
		                            <div class="col-md-6">
		                                <div class="form-group">
		                                      <label>Description:</label>
		                                      <?php
		                                      $data3 = array(
		                                      'name'   => 'description1',
		                                      'id'     => 'description1',
		                                      'value'  => '',
		                                      'class'  => 'form-control',
		                                      'placeholder' => 'Enter a Description',
		                                      'rows'   => '3'
		                                      );
		                                      echo form_textarea($data3);
		                                      ?>
		                                  </div>
		                              </div>
																	
																	<div class="col-md-6">
																			<div class="form-group">
																						<label>Advance:</label>
																						<?php
																						$data3 = array(
																						'name'   => 'advance',
																						'id'     => 'advance',
																						'value'  => '',
																						'class'  => 'form-control',
																						'placeholder' => 'Enter a Advance',
																						'rows'   => '3'
																						);
																						echo form_input($data3);
																						?>
																				</div>

																				<div class="form-group">
																							<?php
																							$data3 = array(
																							'name'   => 'balance_paid',
																							'id'     => 'balance_paid',
																							'value'  => '',
																							'class'  => 'form-control',
																							'placeholder' => 'Balance paid amount',
																							'readonly' => 'readonly'
																							);
																							echo form_input($data3);
																							?>
																					</div>
																		</div>
		                          </div>
		                       <div class="text-center">
														 <p>Sum of numbers in array: <span id="demo"></span></p>
		  								 		<button type="submit" class="btn bg-teal-400">Save</button>
		                        <input type="reset" class="btn btn-default" value="Cancel" onClick="javascript: document.location.href='customer_details_list'">
									       </div>
											 </div>
											</div>
										</div>
									</div>
								</div>

							</form>
						</div>
					</div>
					<!--End form-->

<?php
include("include/main_js.php");
include("validation/add_sales_details.php");
include("include/footer.php");
?>
<script>
//customer details get
$(document).ready(function(){
	//customer type
	$('#cus_type').change(function(){
		if(document.getElementById('Retailer').checked==true)
			a=document.getElementById('Retailer').value;
		if(document.getElementById('Customer').checked==true)
			a=document.getElementById('Customer').value;
		if(document.getElementById('Wholesaler').checked==true)
			a=document.getElementById('Wholesaler').value;
		var type = a;
		$.ajax({
			type : "GET",
			url  : "<?php echo base_url(); ?>/index.php/customer_details/get_cus_type_list",
			data :{"type" : type},
			success : function(data){
				jQuery("#customer_list").html(data);
			}
		});

	});
	//check type and clean data
	$('input[type=radio][name=cus_type]').change(function() {
			if (this.value == 'Retailer'||this.value == 'Customer'||this.value == 'Wholesaler') {
				document.getElementById('company').value='';
				document.getElementById('address').value='';
				document.getElementById('phone').value='';
				document.getElementById('email').value='';
			}

		});

	//add customer
	var n=0;
	$('#add_cust').click(function(){
		if(n==0)
		{
			$('#cust').show();
			$('#cont').hide();
			document.getElementById('company').value='';
			document.getElementById('address').value='';
			document.getElementById('phone').value='';
			document.getElementById('email').value='';
			n=1;
		}
		else if(n==1){
			$('#cont').show();
			$('#cust').hide();
			n=0;
		}
	});

	//customer deatils data
	$('#customer_list').change(function(){
		var cust_id = $('#customer_list').val();

		$.ajax({
			type : "GET",
			url  : "<?php echo base_url(); ?>/index.php/customer_details/get_cus_deatils",
			data :{"cust_id" : cust_id},
			success : function(result){
				var data=result.split('^');
				document.getElementById('company').value=data[0];
				document.getElementById('address').value=data[1];
				document.getElementById('phone').value=data[2];
				document.getElementById('email').value=data[3];
			}
		});
	});
});

</script>
	<script>

			var i=1;
			$(".addmore").on('click',function(){
				var data="<tr><td><div class='checkbox'><label> <input type='checkbox' class='colored-blue case chk'> <span class='text'></span>  </label></div></td>";
				data +='<td class="col-md-2 form-group"><select class="form-control" name="product_id[]" id="product_id'+i+'"  onchange="get_sales_val(this.value,'+i+');"><option value="" >Select</option><?php foreach($product_name_list->result() as $pdt){ ?><option value="<?php echo $pdt->Product_id; ?>"><?php echo $pdt->Product_name; ?></option><?php } ?></select></td>';
				data +='<td><textarea class="form-control" rows="1" name="description[]" id="description'+i+'"></textarea></td>';
				data +='<td class="form-group"><input type="text" class="form-control" name="quantity[]" id="quantity'+i+'" onblur="cal_amount('+i+');"/><input type="hidden" class="form-control" name="stock[]" id="stock'+i+'" onblur="cal_amount('+i+');"/></td>';
				data +='<td><input type="text" class="form-control" name="rate[]" id="rate'+i+'" onblur="cal_amount('+i+');"/></td>';
				data +='<td><input type="text" class="form-control amt" name="amount[]" id="amount'+i+'" " /></td></tr>';
				//	ddatefor();
				$('.ser').append(data);
				i++;
				$('select').select2({
					width:"100%"
				});
			});
			$(".delete").on('click', function() {
				$('.case:checkbox:checked').parents("tr").remove();
				$('.check_all').prop('checked',false);
			});
			$(".check_all").on('click', function() {
				if($('.check_all').is(":checked")==false){
					$('.chk').prop('checked',false);
					}else{
					$('.chk').prop('checked',true);
				}
			});
			$(".chk").on('click', function() {
				if($('.chk').is(":checked")==true){
					$('.check_all').prop('checked',false);
				}
			});
			//salse rate get
			function get_sales_val(val,id){
				var value = val;
				if(value!=0){
					$.ajax({
						url: '<?php echo base_url(); ?>/index.php/product_details/get_sal_prd_details',
						type: 'GET',
						data: { val: val },
						success: function(result){
							var res = result.split('^');
							document.getElementById('rate'+id).value=res[0];
							document.getElementById('stock'+id).value=res[1];
							
						}
			   });
			 }else{ alert('select product name');
			 				document.getElementById('quantity'+id).value='';
			 				document.getElementById('rate'+id).value='';
							document.getElementById('amount'+id).value='';
			 			}
			}
			//calculate rate and quantity
			function cal_amount(id){
				var qty=parseInt(document.getElementById('quantity'+id).value);
				var stk=parseInt(document.getElementById('stock'+id).value);
				var rate=document.getElementById('rate'+id).value;
					if(stk<qty||isNaN(stk)){
						alert('Your stock is not sufficient for entered quantity');
						document.getElementById('quantity'+id).value='';
						document.getElementById('amount'+id).value='';
					}else{
							var amount=parseInt(qty)*parseInt(rate);
							if(qty>=1){
							document.getElementById('amount'+id).value=amount;
						  }
							else {
								alert("Please enter quantity");
								document.getElementById('quantity'+id).value='';
								return true;
							}
			   }
	     }
			// tax details get
			$(document).ready(function(){
				$('#tax').change(function(){
					var tax_id = $('#tax').val();

					$.ajax({
						type : "GET",
						url : "<?php echo base_url() ?>/index.php/tax_details/get_tax_amount",
						data : {"tax_id": tax_id},
						success: function(data){
							var res = data.split('^');
							document.getElementById('tax_amount').value=res[0];
							document.getElementById('tax_type').value=res[1];

							}
					});
				});
			});

			//amount caluculation

function calculate(){

	var inputs = document.getElementsByClassName('amt'),
		    names  = [].map.call(inputs, function( input ) {
		        return input.value;
		    });
		//alert(names);
		var nums = names;
		var sum = 0;
		for(var i=0; i < nums.length; i++){
		    sum += parseInt(nums[i]);
		}
		//	alert(sum);
		var prd_amt = sum;
		document.getElementById("tot_salse").value = prd_amt;
		var tax = document.getElementById("tax_amount").value;
		var tax_type = document.getElementById("tax_type").value;
		var tax_amount = document.getElementById("tax_amount").value;
		var dis_type = document.getElementById("dis_type").value;
		var dis_amount = document.getElementById("dis_amt").value;
		var advance_amt= document.getElementById("advance").value;		//alert(dis_type);
		//tax calculation added
			 if(tax!=""){
				 if(tax_type=="Fixed"){
					 prd_amt = parseInt(prd_amt)+parseInt(tax_amount);
				 }
			else if(tax_type=="Persentage"){
					 prd_amt = prd_amt+(prd_amt*(tax_amount/100));
				 }
			 }
			 //discount calculation added
			 if(document.getElementById('F').checked==true){
				 prd_amt = parseInt(prd_amt)-parseInt(dis_amount);
			 }
			 else if(document.getElementById('P').checked==true){
				 prd_amt = prd_amt-(prd_amt*(dis_amount/100));
			 }

			 //Advance amount calculation
			 if(advance_amt!=""){
				 prd_amt = parseInt(prd_amt)-parseInt(advance_amt);
			 }


      document.getElementById("balance_paid").value=prd_amt;

}
		</script>
