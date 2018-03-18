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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Edit Produc</h4>
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
							<h5 class="panel-title"><i class="icon-add"></i>&nbsp;<strong>Edit Product Details</strong></h5>
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
							 <?php echo form_open_multipart('product_details/validate_edit_product_details', array('class'=>''));
							 foreach ($product_details_data->result() as $row)
                              { 
							  ?>
                             <span style="color:red; "><?php echo validation_errors(); ?></span> 
                             <div class="panel-body">
									<div class="tabbable">								

										<div class="tab-content">
											<div class="tab-pane active" id="justified-right-icon-tab1">
												<div class="row">
                                                  <div class="row">
                                                      <div class="col-md-6"> 
                                                            <div class="form-group">
                                                                <label>Product Name:</label>
                                                                <?php 
                                                                $data1 = array(
                                                                'name'   => 'pro_name',
                                                                'id'     => 'pro_name',
                                                                'value'  => $row->Product_name,
                                                                'class'  => 'form-control',
                                                                'placeholder' => 'Enter a Name'														
                                                                );
                                                                echo form_input($data1);
                                                                ?> 
                                                                <input type="hidden" name="id" value="<?php echo $row->Product_id; ?>">                                                     
                                                            </div>
                                                        </div>
                                               
                                                       <div class="col-md-6"> 
                                                            <div class="form-group">
                                                                <label>Company Name:</label>
                                                                <?php 
                                                                $data2 = array(
                                                                'name'   => 'company',
                                                                'id'     => 'company',
                                                                'value'  => $row->Product_comp,
                                                                'class'  => 'form-control',
                                                                'placeholder' => 'Enter a Company'														
                                                                );
                                                                echo form_input($data2);
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
														
                                                    <div class="row">
                                                    	<div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Base Price:</label>
                                                                <?php 
                                                                $data8 = array(
                                                                'name'   => 'b_price',
                                                                'id'     => 'b_price',
                                                                'value'  => $row->Product_prize,
                                                                'class'  => 'form-control',
                                                                'placeholder' => 'Enter Base Price'														
                                                                );
                                                                echo form_input($data8);
                                                                ?>                                                       
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Our Price:</label>
                                                                 <?php 
                                                                $data10 = array(
                                                                'name'   => 'o_price',
                                                                'id'     => 'o_price',
                                                                'value'  => $row->Product_sales,
                                                                'class'  => 'form-control',
                                                                'placeholder' => 'Enter Our Price'														
                                                                );
                                                                echo form_input($data10);
                                                                ?> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                    	<div class="col-md-6"> 
                                                            <div class="form-group">
                                                                <label>VAT:</label>
                                                                 <?php 
                                                                $data3 = array(
                                                                'name'   => 'vat',
                                                                'id'     => 'vat',
                                                                'value'  => $row->Product_vat,
                                                                'class'  => 'form-control',
                                                                'placeholder' => 'Enter a Tax'									
                                                                );
                                                                echo form_input($data3);
                                                                ?>                                                       
                                                            </div>
                                                    	</div>
                                                        <div class="col-md-6"> 
                                                            <div class="form-group">
                                                                <label>Description:</label>
                                                                 <?php 
                                                                $data6 = array(
                                                                'name'   => 'desc',
                                                                'id'     => 'desc',
                                                                'value'  => $row->Product_desc,
                                                                'class'  => 'form-control',
                                                                'placeholder' => 'Enter a Description',
																'rows'   => '3'														
                                                                );
                                                                echo form_textarea($data6);
                                                                ?>                                                      
                                                            </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                    
                                                     
                                                 <div class="text-center">
											      <button type="submit" class="btn bg-teal-400">Save</button>
                                                  <input type="reset" class="btn btn-default" value="Cancel" onClick="javascript: document.location.href='product_details_list'">
									            </div>
											</div>
										</div>
									</div>
								</div>								
                                 <?php }?>  
							</form>
						</div>
					</div>
					<!--End form-->
                    
<?php
include("include/main_js.php");
//include("validation/add_product_details.php"); 
include("include/footer.php");
?>
<script type="text/javascript">
	function onclick_validtion(){
		
		alert('javascript');
	}
</script>
