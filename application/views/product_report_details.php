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
			
				<!-- Content area -->
				<div class="content">
                <!-- Traffic sources -->
							<div class="panel panel-flat">
								<div class="container-fluid">
                                <h6>Search Report Details</h6>
									<div class="row">
                                    <?php echo form_open_multipart('reports_details/search_product_report',array('name'=>'search')); ?>
										<div class="col-lg-3">
                                         <div class="input-group">
                                          <span class="input-group-addon"><i class="icon-calendar22"></i></span>								   

											<?php 
											$data1 = array(
											'name' => 'date',
											'id'   => 'date',
											'value' => set_value('date'),
											'class' => 'form-control pickadate-accessibility text-semibold datepicker-example1',
											'placeholder' => 'Date'
											);
											echo form_input($data1);
											?>	
                                            </div>										
										</div>
                                        
                                        <div class="col-lg-3">
											<?php 
											$option[''] = "Select Product";
											foreach($product_name_list->result() as $prd){
												$option[$prd->Product_id] = $prd->Product_name;
											}
											echo form_dropdown('product',$option,set_value('product'),'class="form-control"')
											?>											
										</div>
                                        
                                        <div class="col-lg-3">
											<?php 
											$data1 = array(
											'name' => 'invoice',
											'id'   => 'invoice',
											'value' => set_value('invoice'),
											'class' => 'form-control text-semibold',
											'placeholder' => 'Invoice No'
											);
											echo form_input($data1);
											?>	
                                          							
										</div>
                                        
                                        <div class="col-lg-3 text-center">
										<button type="subit" class="btn text-brown-800 border-brown btn-flat"><i class="icon-search4 position-left"></i> Search</button>									
										</div>
                                        </form>
									</div>
                                    <hr>
								</div>

							</div>
							<!-- /traffic sources -->

						<!--Start Table-->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Product Report Details</h5>
							<div class="heading-elements">
								<ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

                        <div class="modal-content">
						<table class="table  datatable-button-html5-basic">
							<thead>
                            <th>Sno</th>
                            <th>Date</th>
                            <th>Invoice</th>
                            <th>Product</th>
					      	<th>Quantity</th>
                            <th>Rate</th>
							</thead>
							<tbody>
                            <?php
							$sno=1; $paid=''; $balance=''; $total='';
							foreach($product_report_details->result() as $row){ ?>
								<tr>
                   				 <td><?php echo $sno; ?></td>
					         	 <td><?php echo date('d-m-Y', strtotime($row->Sales_order_create_dt)); ?></td>
                   				 <td><?php echo $row->Sales_invoice_no; ?></td>
                                 <td><?php echo $row->Product_name; ?></td>
					             <td><?php echo $row->Sales_order_qty; ?></td>
                                 <td><?php echo $row->Sales_order_rate; ?></td>
					            </tr>
					            <?php $sno++; } ?>
							</tbody>
							<tfoot>
							 <th>Sno</th>
                            <th>Date</th>
                            <th>Invoice</th>
                            <th>Product</th>
					      	<th>Quantity</th>
                            <th>Rate</th>
							</tfoot>
						</table>
					</div>

                <!--End Table-->

<?php
include("include/main_js.php");
include("include/footer.php");
?>
<script type="text/javascript" src="assets/js/pages/datatables_responsive.js"></script>	
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_extension_buttons_html5.js"></script>

