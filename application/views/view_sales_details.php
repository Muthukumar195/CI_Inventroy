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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - View Sales Details</h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_payment"><b><i class="fa fa-plus"></i></b> Add Payment</button>
							</div>
						</div>
					</div>

				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">
					<!-- Invoice template -->
		<div class="panel panel-white">
			<div class="panel-heading">
				<h6 class="panel-title">Sales Invoice</h6>
				<div class="heading-elements">
					<button type="button" class="btn btn-default btn-xs heading-btn"><i class="icon-file-check position-left"></i> Save</button>
					<button type="button" class="btn btn-default btn-xs heading-btn"><i class="icon-printer position-left"></i> Print</button>
								</div>
			</div>

			<div class="panel-body no-padding-bottom">
				<?php foreach ($view_sales_details->result() as $row) { ?>
				<div class="row">
					<div class="col-sm-4 content-group">
						<h2><?php $p_id = $row->Sales_id; $p_cus_id = $row->Customer_id; echo $row->Customer_name.'('.$row->Customer_comp.')'; ?></h2>
						<ul class="list-condensed list-unstyled">
							<li><?php echo $row->Customer_address; ?></li>
							<li><?php echo $row->Customer_city.'-'.$row->Customer_pincode; ?></li>
							<li><?php echo $row->Customer_state.','.$row->Customer_country; ?></li>
							<li><?php echo $row->Customer_phone; ?></li>
							<li><a href="#"><?php echo $row->Customer_email; ?></a></li>
						</ul>
					</div>

					<div class="col-sm-5 content-group">
						<h2>SRI DIVYA PRAKASH PHARMACY</h2>
						<ul class="list-condensed list-unstyled">
							<li>73-1, SUBBAMMAL LAYOUT,</li>
							<li>DL NO: CBE/6452/20-21</li>
							<li>MOB: 9940717697</li>
							<div><div class="col-sm-2"><li style="margin-left: -10px;">TIN: 00</li></div><div class="col-sm-10"><li>ROUTE: K.K.PUDUR</li></div></div>
							
						</ul>
					</div>

					<div class="col-sm-3 content-group">
						<div class="invoice-details">
							<h5 class="text-uppercase text-semibold">Invoice #<?php echo $p_invoice=$row->Sales_invoice_no; ?></h5>
							<ul class="list-condensed list-unstyled">
								<li>Bill Date: <span class="text-semibold"><?php echo date('d-M-Y', strtotime($row->Sales_date)) ?></span></li>
								<li>Bill No:<span>12345678</span></li>
							</ul>
							<?php if($row->Sales_pay_status=="PP"){ ?>
							<span class="label label-flat label-rounded border-orange text-orange-800">Partially Paid</span>
							<?php }elseif($row->Sales_pay_status=="P"){ ?>
								<span class="label label-flat label-rounded border-success text-success-600">Paid</span>
							<?php }else{ ?>
								<span class="label label-flat label-rounded border-danger text-danger-600">Unpaid</span>
								<?php } ?>
						</div>
					</div>
				</div>

			<div class="table-responsive ">
					<table class="table table-lg table-striped table-bordered">
							<thead>
									<tr>
											<th>Products</th>
											<th class="col-sm-1">Quantity</th>
											<th class="col-sm-2">Rate</th>
											<th class="col-sm-2">Total</th>
									</tr>
							</thead>
							<tbody>
								<?php  $subtotal=''; $tax_amt=''; $discount_amt='';?>
								<?php foreach ($sales_order_details->result() as $ord) {?>
									<tr>
											<td>
												<h6 class="no-margin"><?php echo $ord->Product_name.'('.$ord->Product_comp.')'; ?></h6>
												<span class="text-muted"><?php echo $ord->Product_desc; ?></span>
											</td>
											<td><?php echo $ord->Sales_order_qty; ?></td>
											<td><i class="fa fa-inr"></i>&nbsp;<?php echo $ord->Sales_order_rate; ?></td>
											<td><i class="fa fa-inr"></i>&nbsp;<?php $subtotal +=$ord->Sales_order_amount; echo $ord->Sales_order_amount; ?></td>
									</tr>
										<?php } ?>
							</tbody>
					</table>
			</div>

			<div class="panel-body">
				<div class="row invoice-payment">
				 <h6>Total due</h6>
					<table class="table table-lg table-striped table-bordered">
							<thead>
									<tr>
											<th class="col-sm-2">Subtotal</th>
											<th class="col-sm-2">Tax<span class="text-regular"><?php if($row->Sales_tax_type=="Persentage"){ echo '('.$row->Sales_tax_amount.'%)'; }else{ echo '(Fixed)';} ?></span></th>
											<th class="col-sm-2">Discount<span class="text-regular"><?php if($row->Sales_dis_type=="Persentage"){ echo '('.$row->Sales_dis_amt.'%)'; }else{ echo '(Fixed)';} ?></span></th>
											<th class="col-sm-2">Total</th>
											<th class="col-sm-2">Paid (include advance amount <i class="fa fa-inr"></i>&nbsp;<?php  echo $row->Sales_advance; ?>):</th>
											<th class="col-sm-2">Balance Paid</th>
									</tr>
							</thead>
							<tbody>
							        <tr>
											<td class="text-left"><i class="fa fa-inr"></i>&nbsp;<?php echo  $subtotal; ?></td>
											<td><?php if($row->Sales_tax_type=="Fixed"){?><i class="fa fa-inr"></i>&nbsp;<?php echo $tax_amt = $row->Sales_tax_amount; }else{ echo '<i class="fa fa-inr"></i>&nbsp;'.$tax_amt = $subtotal*($row->Sales_tax_amount/100);}?></td>
											<td><?php if($row->Sales_dis_type=="Fixed"){?><i class="fa fa-inr"></i>&nbsp;<?php echo  $row->Sales_dis_amt; }else{ $discount_amt = $tax_amt+$subtotal; echo '<i class="fa fa-inr"></i>&nbsp;'.$discount_amt*($row->Sales_dis_amt/100);}?></td>
											<td><h5 class="text-semibold"><i class="fa fa-inr"></i>&nbsp;<?php echo $p_total = $row->Sales_total; ?></h5></td>
											<td><span class="text-regular"><i class="fa fa-inr"></i>&nbsp;<?php echo $p_paid = $row->Sales_paid; ?></span></td>
											<td><h5 class="text-semibold"><i class="fa fa-inr"></i>&nbsp;<?php echo $p_balance = $row->Sales_balance; ?></h5></td>
									</tr>
                           </tbody>
					       </table>

							<div class="text-right" style="margin-top: 10px">
								<button type="button" class="btn btn-primary btn-labeled" data-toggle="modal" data-target="#add_payment"><b><i class="icon-paperplane"></i></b> Pay bill</button>
							</div>
			 
				</div>

				<?php } ?>
			</div>
		</div>
		<!-- /invoice template -->




<?php
include("include/main_js.php");
include("include/footer.php");
?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_responsive.js"></script>
<div id="add_payment" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header bg-success">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h6 class="modal-title">Add payment</h6>
								</div>
									<?php echo form_open_multipart('sales_details/induvidual_payment', array('name'=>'induvidual_payment')); ?>
								<div class="modal-body">

										<div class="form-group">
											<div class="row">
												<div class="col-sm-4">
													<label>Date</label>
													<div class="input-group">
                           <span class="input-group-addon"><i class="icon-calendar22"></i></span>
 											      <input type="text" name="pay_date"  id="" class="form-control pickadate-accessibility datepicker-example1" value="<?php echo date('Y-m-d'); ?>" />
                           </div>
												</div>

												<div class="col-sm-4">
													<label>Invoice No</label>
													<input type="text" value="<?php echo $p_invoice; ?>" class="form-control" readonly>
													<input type="hidden" name="cus_id" value="<?php echo $p_cus_id; ?>" class="form-control">
													<input type="hidden" name="sales_id" value="<?php echo $p_id; ?>"  class="form-control">
												</div>
												<div class="col-sm-4">
													<label>Total</label>
													<input type="text" name="total" value="<?php echo $p_total; ?>" class="form-control" readonly>
												</div>
											</div>
										</div>


										<div class="form-group">
											<div class="row">
												<div class="col-sm-6">
													<label>Paid Amount</label>
													<input type="text" name="paid_amt" value="<?php echo $p_paid; ?>" class="form-control"  readonly>
												</div>

												<div class="col-sm-6">
													<label>Pay amount</label>
													<input type="text" name="pay_amount" value="<?php echo $p_balance; ?>" class="form-control">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-sm-12">
													<label>Description </label>
											<textarea name="pay_desc" class="form-control"></textarea>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-sm-6">
													<label>Payment Method</label>
												<select name="pay_method" class="form-control">
													<option value="Cash">Cash</option>
													<option value="Card">Card</option>
													<option value="DD">DD</option>
													<option value="Cheque">Cheque</option>
												</select>
												</div>

												<div class="col-sm-6">
													<label>Reference No</label>
													<input type="text" name="pay_ref" placeholder="XXX-XXX" class="form-control">
												</div>
											</div>
										</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-success">Save changes</button>
								</div>
							</form>
							</div>
						</div>
					</div>
					<!-- /success modal -->
