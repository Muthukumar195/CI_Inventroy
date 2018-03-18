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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Tax Details</h4>
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
                		<div class="row">
                              <div class="col-md-6"> 
                		<!--start Form-->
                        <div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title"><i class="icon-add"></i>&nbsp;<strong>Edit Tax Details</strong></h5>
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
							 <?php echo form_open_multipart('tax_details/validate_edit_tax_details', array('class'=>''));
							 foreach($tax_details_data->result() as $row) {?>
                             <span style="color:red; "><?php echo validation_errors(); ?></span> 
                             <div class="panel-body">
									<div class="tabbable">								

										<div class="tab-content">
											<div class="tab-pane active" id="justified-right-icon-tab1">
												<div class="row">
                                                    <div class="form-group">
                                                            <label>Tax Type:</label>
                                                          <div class="form-group ">
                                                             <span id="cus_type" class="InputGroup">
                                                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                              <label >
                                                               <input type="radio" name="tax_type" id="Fixed" value="Fixed" >
                                                                 Fixed
                                                                </label>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <label>
                                                               <input type="radio" name="tax_type" id="Persentage"  value="Persentage" >
                                                                 Persentage
                                                                </label>
                                                                 
                                                            </span>
                                                            </div>                                                 
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tax Name:</label>
                                                            <?php 
                                                            $data1 = array(
                                                            'name'   => 'tax_name',
                                                            'id'     => 'tax_name',
                                                            'value'  => $row->Tax_name,
                                                            'class'  => 'form-control',
                                                            'placeholder' => 'Enter a tax'														
                                                            );
                                                            echo form_input($data1);
                                                            ?>  
                                                            <input type="hidden" value="<?php echo $row->Tax_id; ?>" name="id">                                          
                                                        </div>
                                                         
                                                         <div class="form-group">
                                                            <label>Tax amount:</label>
                                                            <?php 
                                                            $data1 = array(
                                                            'name'   => 'tax_amt',
                                                            'id'     => 'tax_amt',
                                                            'value'  => $row->Tax_amount,
                                                            'class'  => 'form-control',
                                                            'placeholder' => 'Enter a amount'														
                                                            );
                                                            echo form_input($data1);
                                                            ?>                                                      
                                                        </div>
                                                  </div>
                                    
                                                     
                                                 <div class="text-center">
											      <button type="submit" class="btn bg-teal-400">Save</button>
                                                  <input type="reset" class="btn btn-default" value="Cancel" onClick="javascript: document.location.href='tax_details_list'">
									            </div>
											</div>
										</div>
									</div>
								</div>								
                                <?php } ?>   
							</form>
						</div>
					</div>
					<!--End form-->
                 </div>
                  <div class="col-md-6"> 
                	<!--Start Table--> 
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Tax Details List</h5>
							<div class="heading-elements">
								<ul class="icons-list">
                            
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>
                        <div class="modal-content">
						<table class="table datatable-responsive">
							<thead>
								<tr>
                                	<th>Sno</th>
					                <th>Type</th>
                                    <th>Name</th>
					                <th>Amount</th>
					                <th class="text-center">Actions</th>
					            </tr>
							</thead>
							<tbody>
                            <?php 
							$sno=1;
							foreach($tax_details_data->result() as $row){ ?>
								<tr>
                                	<td><?php echo $sno; ?></td>
					                <td><?php echo $row->Tax_type; ?></td>
                                     <td><?php echo $row->Tax_name; ?></td>
					                <td><?php echo $row->Tax_amount; ?></td>
									<td class="text-center">
                                        <ul class="my-list list-inline">
                                            <li><a href="delete?id=<?php echo $row->Tax_id; ?>" onclick="return confirm('Are you sure you want to delete?')"><span style="padding: 2px 6px;" class="label label-danger"> DELETE</span></a></li>
                                            <li><a href="edit_tax_details?id=<?php echo $row->Tax_id; ?>"><span style="padding: 2px 6px;" class="label label-info"> EDIT</span></a></li>       
                                        </ul>
									</td>
					            </tr>
					            <?php $sno++; } ?>
							</tbody>
							<tfoot>
								<th>Sno</th>
					                <th>Type</th>
                                    <th>Name</th>
					                <th>Amount</th>
					                <th class="text-center">Actions</th>
							</tfoot>
						</table>
					</div>
                    
                <!--End Table--> 
                 </div>
               </div>	<!--End row-->
                    
<?php
include("include/main_js.php");
//include("validation/add_product_details.php"); 
include("include/footer.php");
?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_responsive.js"></script>
<script type="text/javascript">
	function onclick_validtion(){
		
		alert('javascript');
	}
</script>
