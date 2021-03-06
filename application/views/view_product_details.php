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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - View Product Details</h4>
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
                  <div class="panel panel-white">
						<div class="panel-heading">
							<h6 class="panel-title">View Product Details</h6>
							<div class="heading-elements">
								<button type="button" class="btn btn-default btn-xs heading-btn"><i class="icon-file-check position-left"></i> Save</button>
								<button type="button" class="btn btn-default btn-xs heading-btn"><i class="icon-printer position-left"></i> Print</button>
		                	</div>
						</div>

						<div class="panel-body no-padding-bottom">
                        <?php foreach($view_product_details->result() as $row){ ?>							
                        <div class="row">
                        
								<div class="col-sm-6 content-group">
                                 <h5><strong>Product Details</strong>:-</h5>
                                <div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th><strong>Product Name</strong></th>
											<th><strong>:</strong>&nbsp;&nbsp;<?php echo $row->Product_name; ?></th>
										</tr>
									</thead>
									<tbody>
                                        <tr>
											<td><strong>Company</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Product_comp; ?></td>
										</tr>
										 <tr>
											<td><strong>Current Status</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php if($row->Product_status=="A"){
												echo '<strong style="color:green;">Active</strong>'; }
												else{ echo '<strong style="color:red;">Deactive</strong>'; } ?></td>
										</tr>
                                         <tr>
											<td><strong>Create Date</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo date('d-m-Y', strtotime($row->Product_create_dt)); ?></td>
										</tr>
									
                                        
									</tbody>
								</table>
							</div> 
                                </div>
                                
                                <div class="col-sm-6 content-group">
                                 <h5><strong>Other Details</strong>:-</h5>
                                <div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th><strong>Base Price</strong></th>
											<th><strong>:</strong>&nbsp;&nbsp;<?php echo $row->Product_prize; ?></th>
										</tr>
									</thead>
									<tbody>
                                        <tr>
											<td><strong>Our Price</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Product_sales; ?></td>
										</tr>
										
										<tr>
											<td><strong>VAT</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Product_vat; ?></td>
										</tr>
                                        <tr>
											<td><strong>Description</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Product_desc; ?></td>
										</tr>
									</tbody>
								</table>
							</div> 
                           </div>
                              
						</div>
                      
                        
                    <?php } ?>
					</div>
                    
                    
                <!--End Table--> 

<?php 
include("include/main_js.php");
include("include/footer.php");
?>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_responsive.js"></script>
