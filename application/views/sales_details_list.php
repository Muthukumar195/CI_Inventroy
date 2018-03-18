<?php include("include/header.php"); ?>

<style>
.my-list>li {
    padding-left: 0;
    padding-right: 5px;
    font-size: 14px;
}
</style>
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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Sales Details</h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a  class="btn btn-link btn-float has-text" data-toggle="modal" data-target="#sales_payment"><i class="icon-bars-alt text-primary"></i><span>Payments</span></a>
								<a href="add_purchase_details" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Purchase</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div>

					</div>

				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">
						<!--Start Table-->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Sales Details List</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<!--<div class="panel-body">!-->
                             <?php if($this->session->flashdata('failear_msg')){?>
                                    <div class="alert alert-danger alert-styled-left alert-bordered">
										<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
										<span class="text-semibold"><?php echo $this->session->flashdata('failear_msg'); ?></span>
                                    </div>
                                <?php } ?>
                                <?php if($this->session->flashdata('success_msg')){?>
                                   <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
										<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
										<span class="text-semibold"> <?php echo $this->session->flashdata('success_msg'); ?></span>
								    </div>
                                <?php } ?>
                                 <span style="color:red; "><?php echo validation_errors(); ?></span>
						<!--</div>-->
            <div class="modal-content">
						<table class="table datatable-responsive">
							<thead>
                <th>Sno</th>
					      <th>Date</th>
                <th>Customers</th>
					      <th>Type</th>
					      <th>Invoice</th>
					      <th class="alpha-green">Paid</th>
						  <th  class="alpha-orange">Balance</th>
                          <th class="alpha-blue">Total</th>
					      <th class="text-center">Actions</th>

							</thead>
							<tbody>
              <?php
							$sno=1; $paid=''; $balance=''; $total='';
 							foreach($sales_details_list->result() as $row){ ?>
								<tr>
                    <td><?php echo $sno; ?></td>
					          <td><?php echo date('d-m-Y', strtotime($row->Sales_date)); ?></td>
                    <td><?php echo $row->Customer_name; ?></td>
					          <td><?php echo $row->Sales_cus_type; ?></td>
					          <td><?php echo $row->Sales_invoice_no; ?></td>
					          <td class="alpha-green"><?php $paid += $row->Sales_paid; if($row->Sales_paid!="") { echo  number_format($row->Sales_paid); } ?></td>
                    <td  class="alpha-orange"><?php  $balance += $row->Sales_balance; if($row->Sales_balance!="") { echo number_format($row->Sales_balance); } ?></td>
                    <td class="alpha-blue"><?php $total +=$row->Sales_total;  if($row->Sales_total!="") { echo  number_format($row->Sales_total); } ?></td>
									  <td class="text-center">
                    <ul class="my-list list-inline">
                        <li><a href="view_sales_details?id=<?php echo $row->Sales_id; ?>"><span style="padding: 2px 6px;" class="label label-success"> View</span></a></li>
                        <li><a href="delete?id=<?php echo $row->Sales_id; ?>" onclick="return confirm('Are you sure you want to delete?')"><span style="padding: 2px 6px;" class="label label-danger"> DELETE</span></a></li>

                    </ul>
									</td>
					            </tr>
					            <?php $sno++; } ?>
							</tbody>
							<tfoot>
                <th>Sno</th>
					      <th>Date</th>
                <th>Customers</th>
					      <th>Type</th>
					      <th>Invoice</th>
					      <th class="bg-green-400"><strong><i class="fa fa-inr"></i>&nbsp;<?php if($paid!="") { echo number_format($paid); }?></strong></th>
						  <th class="bg-orange-400"><strong><i class="fa fa-inr"></i>&nbsp;<?php if($balance!="") { echo number_format($balance); }?></strong></th>
                          <th class="bg-blue-400"><strong><i class="fa fa-inr"></i>&nbsp;<?php if($total!="") { echo number_format($total); }?></strong></th>
					      <th class="text-center">Actions</th>

							</tfoot>
						</table>
					</div>

                <!--End Table-->

<?php
include("include/main_js.php");
include("include/footer.php");
?>
<script>
  //Customer Pay bill Details
  $(document).ready(function(){
    $('#cus_id').change(function(){
      var customer = $('#cus_id').val();

      $.ajax({
        type : "GET",
        url  : "<?php echo base_url(); ?>/index.php/sales_details/get_cus_payment_details",
        data : {"customer": customer},
        success : function(data){
          var result = data.split('^');

          document.getElementById("total").value=result[0];
          document.getElementById("paid").value=result[1];
          document.getElementById("balance").value=result[2];
        }
      });
    });
  });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_responsive.js"></script>
<div id="sales_payment" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header bg-success">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h6 class="modal-title">Add payment</h6>
								</div>
									<?php echo form_open_multipart('sales_details/customer_payment', array('name'=>'sales_payment')); ?>
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
													<label>Customer</label>
                          <select name="cus_id" id="cus_id" class="form-control">
                            <option value="">Select Customer</option>
                            <?php foreach($customer_payment_list->result() as $cus){ ?>
                                <option value="<?php echo $cus->Customer_id; ?>"><?php echo $cus->Customer_name; ?></option>
                            <?php  } ?>
                          </select>
												</div>
												<div class="col-sm-4">
													<label>Total</label>
													<input type="text" name="total" id="total" class="form-control" readonly>
												</div>
											</div>
										</div>


										<div class="form-group">
											<div class="row">
												<div class="col-sm-6">
													<label>Paid Amount</label>
													<input type="text" name="paid_amt" id="paid" class="form-control"  readonly>
												</div>

												<div class="col-sm-6">
													<label>Pay amount</label>
													<input type="text" name="pay_amount" id="balance" class="form-control">
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
