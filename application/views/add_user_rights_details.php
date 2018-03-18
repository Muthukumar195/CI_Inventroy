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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Add User Rights</h4>
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
							<h5 class="panel-title"><i class="icon-add"></i>&nbsp;<strong>Add User Rights Details</strong></h5>
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
							 <?php echo form_open_multipart('user_rights_details/validate_user_rights_details', array('class'=>'form-horizontal')); ?>
                             <span style="color:red; "><?php echo validation_errors(); ?></span> 
								<fieldset class="content-group">
									<div class="form-group">
										<label class="control-label col-lg-2">User Category Name:</label>
										<div class="col-lg-10">
                                            <?php 
											$data1 = array(
												'name'        => 'user_type',
												'id'          => 'user_type',
												'value'       => set_value('user_type'),
												'class'       => 'form-control text-capitalize text-semibold',
												'placeholder' => 'Enter Category Name',											
											);
											echo form_input($data1);
											?>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-2">User Rights</label>
										<div class="col-lg-10">
										  <div class="input-group">
                                            <div class="multi-select-full">
                                            <?php 
											$option = array(
											"Student"  => "Student",
											"User Rights"  => "User Rights",
											);
											$class = 'class="multiselect-toggle-selection" multiple="multiple"';
											echo form_dropdown('user_rights[]', $option, set_value('user_rights'), $class);
											?>
                                            </div>
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-info multiselect-toggle-selection-button">Select All</button>
                                            </div>
                                        </div>
									   </div>
									</div>
                                    
                                    <div class="text-center">
											<button type="submit" class="btn bg-teal-400">Save</button>
                                            <input type="reset" class="btn btn-default" value="Cancel" onClick="javascript: document.location.href='user_rights_details_list'" >
									</div>
							</form>
						</div>
					</div>
					<!--End form-->
                    
<?php
include("include/main_js.php");
include("validation/add_user_details.php"); 
include("include/footer.php");
?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_multiselect.js"></script>