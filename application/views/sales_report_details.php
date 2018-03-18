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
                                    <?php echo form_open_multipart('reports_details/search_sales_report',array('name'=>'search')); ?>
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
											$types = array(
											'' => 'Select Customer type',
											'Customer' => 'Customer',
											'Retailer' => 'Retailer'
											);
											echo form_dropdown('type',$types,set_value('type'),'class="form-control"')
											?>											
										</div>
                                        <div class="col-lg-3">
											<?php 
											$data1 = array(
											'name' => 'name',
											'id'   => 'name',
											'value' => set_value('name'),
											'class' => 'form-control text-semibold',
											'placeholder' => 'Customer Name'
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
							<h5 class="panel-title">Sales Report Details</h5>
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
                            <th>Type</th>
					      	<th>Customer</th>
					      	<th>Invoice</th>
					      	 <th class="alpha-green">Paid</th>
						  <th  class="alpha-orange">Balance</th>
                          <th class="alpha-blue">Total</th>
							</thead>
							<tbody>
                            <?php
							$sno=1; $paid=''; $balance=''; $total='';
							foreach($sales_report_details->result() as $row){ ?>
								<tr>
                   				 <td><?php echo $sno; ?></td>
					         	 <td><?php echo date('d-m-Y', strtotime($row->Sales_date)); ?></td>
                   				 <td><?php echo $row->Sales_cus_type; ?></td>
					             <td><?php echo $row->Customer_name; ?></td>
					             <td><?php echo anchor('sales_details/view_sales_details?id='.$row->Sales_invoice_no.'',$row->Sales_invoice_no,'class="primary" data-popup="tooltip" title="" data-placement="bottom" data-original-title="Invoice Details" target="_blank"') ; ?></td>
					             <td class="alpha-green"><?php $paid += $row->Sales_paid; if($row->Sales_paid!="") { echo  number_format($row->Sales_paid); } ?></td>
                                 <td  class="alpha-orange"><?php  $balance += $row->Sales_balance; if($row->Sales_balance!="") { echo number_format($row->Sales_balance); } ?></td>
                                 <td class="alpha-blue"><?php $total +=$row->Sales_total;  if($row->Sales_total!="") { echo  number_format($row->Sales_total); } ?></td>
					            </tr>
					            <?php $sno++; } ?>
							</tbody>
							<tfoot>
							 <th>Sno</th>
                            <th>Date</th>
                            <th>Type</th>
					      	<th>Customer</th>
					      	<th>Invoice</th>
					      	 <th class="bg-green-400"><strong><i class="fa fa-inr"></i>&nbsp;<?php if($paid!="") { echo number_format($paid); }?></strong></th>
						  <th class="bg-orange-400"><strong><i class="fa fa-inr"></i>&nbsp;<?php if($balance!="") { echo number_format($balance); }?></strong></th>
                          <th class="bg-blue-400"><strong><i class="fa fa-inr"></i>&nbsp;<?php if($total!="") { echo number_format($total); }?></strong></th>
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

