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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Product Details</h4>
						</div>

					<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="export" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Export</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
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
							<h5 class="panel-title">Product Details List</h5>
							<div class="heading-elements">
								<ul class="icons-list">
                                <a href="add_product_details"><button type="button" class=" text-right btn bg-violet btn-labeled"><b><i class="icon-add"></i></b> Add Product Details</button></a>

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
					      <th>Name</th>
                <th>Company</th>
					      <th>Base Price</th>
					      <th>Our Price</th>
					      <th>VAT</th>
								<th>Stock</th>
					      <th class="text-center">Actions</th>

							</thead>
							<tbody>
                            <?php
							$sno=1;
							foreach($product_details_list->result() as $row){ ?>
								<tr>
                    <td><?php echo $sno; ?></td>
					          <td><?php echo $row->Product_name; ?></td>
                    <td><?php echo $row->Product_comp; ?></td>
					          <td><?php echo $row->Product_prize; ?></td>
					          <td><?php echo $row->Product_sales; ?></td>
					          <td><?php echo $row->Product_vat; ?></td>
                    <td><?php if(empty($row->Prd_stock_qty)){echo '0'; }else{ echo $row->Prd_stock_qty; }?></td>
									  <td class="text-center">
                    <ul class="my-list list-inline">
                        <li><a href="delete?id=<?php echo $row->Product_id; ?>" onclick="return confirm('Are you sure you want to delete?')"><span style="padding: 2px 6px;" class="label label-danger"> DELETE</span></a></li>
                        <li><a href="edit_product_details?id=<?php echo $row->Product_id; ?>"><span style="padding: 2px 6px;" class="label label-info"> EDIT</span></a></li>
                        <li><a data-toggle="modal" data-target="#add_stock"  onclick="stock_details(<?php echo $row->Product_id; ?>,'<?php echo $row->Product_name; ?>')" ><span style="padding: 2px 6px;" class="label label-success">ADD STOCK</span></a></li>
                    </ul>
									</td>
					            </tr>
					            <?php $sno++; } ?>
							</tbody>
							<tfoot>
								<th>Sno</th>
					      <th>Name</th>
                <th>Company</th>
					      <th>Base Price</th>
					      <th>Our Price</th>
					      <th>VAT</th>
								<th>Stock</th>
					      <th class="text-center">Actions</th>
							</tfoot>
						</table>
					</div>

                <!--End Table-->

<?php
include("include/main_js.php");
include("include/footer.php");
?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_responsive.js"></script>

<div class="modal" id="add_stock" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog" >
		<div class="modal-content">
        	<?php echo form_open_multipart('product_details/validate_stock_details', array('class'=>'')); ?>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">
				<span id="proname"></span> &nbsp;&nbsp; Add Stock Details</h4>
			</div>
			<div class="modal-body" id="view_stock">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<div class="col-md-1"></div>
							<div class="col-md-9">
								<label class="control-label col-md-3">Stock</label>
								<div class="col-md-6">
									<input type="text" name="stock" id="stock" class="form-control"/>
									<input type="hidden" name="prod_id" id="prod_id"  class="form-control"/>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm pull-right" data-dismiss="modal">Close</button>
				<button type="submit"  class="btn btn-primary btn-sm pull-right">Save</button>
			</div></form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
	</div>

<script>
	function stock_details(id,name)
	{
		document.getElementById("proname").innerHTML=name;
		$('#prod_id').val(id);
	}
</script>
