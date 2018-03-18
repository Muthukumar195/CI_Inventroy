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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Edit User</h4>
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
							<h5 class="panel-title"><i class="icon-pencil6"></i>&nbsp;<strong>Edit User Details</strong></h5>
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
							 <?php echo form_open_multipart('user_details/validate_edit_user_details', array('class'=>'form-horizontal')); ?>
                             <span style="color:red; "><?php echo validation_errors(); ?></span> 
                             <?php foreach($user_details_data->result() as $row){?>
								<fieldset class="content-group">
									<div class="form-group">
										<label class="control-label col-lg-2">Fullname</label>
										<div class="col-lg-10">
                                            <?php 
											$data1 = array(
												'name'        => 'fullname',
												'id'          => 'fullname',
												'value'       => $row->Admin_fullname,
												'class'       => 'form-control text-capitalize text-semibold',
												'placeholder' => 'Enter Full Name',											
											);
											echo form_input($data1);
											?>
                                            <input type="hidden" name="id" value="<?php echo $row->Admin_id; ?>">
										</div>
									</div>
                                    
                                    <div class="form-group">
										<label class="control-label col-lg-2">Email</label>
										<div class="col-lg-10">
											 <?php 
											$data1 = array(
												'name'        => 'email',
												'id'          => 'email',
												'value'       => $row->Admin_email,
												'class'       => 'form-control text-semibold',
												'placeholder' => 'Enter Email',											
											);
											echo form_input($data1);
											?>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">phone</label>
										<div class="col-lg-10">
											 <?php 
											$data1 = array(
												'name'        => 'phone',
												'id'          => 'phone',
												'value'       => $row->Admin_phone,
												'class'       => 'form-control text-semibold',
												'placeholder' => 'Enter phone',											
											);
											echo form_input($data1);
											?>
                                         
										</div>
									</div>
                                    
                                    <div class="form-group">
										<label class="control-label col-lg-2">Username</label>
										<div class="col-lg-10">
                                            <?php 
											$data1 = array(
												'name'        => 'username',
												'id'          => 'username',
												'value'       => $row->Admin_username,
                                                'maxlength'   => '20',
												'class'       => 'form-control text-capitalize text-semibold',
												'placeholder' => 'Enter Username',											
											);
											echo form_input($data1);
											?>
										</div>
									</div>
                                    
                                    <div class="form-group">
										<label class="control-label col-lg-2">Old Password</label>
										<div class="col-lg-10">
											<?php 
											$data1 = array(
												'name'        => 'old_password',
												'id'          => 'old_password',
												'maxlength'   => '20',
												'class'       => 'form-control text-semibold',
												'placeholder' => 'Enter Old Password',											
											);
											echo form_password($data1);
											?>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-2">Password</label>
										<div class="col-lg-10">
											<?php 
											$data1 = array(
												'name'        => 'password',
												'id'          => 'password',
												'maxlength'   => '20',
												'class'       => 'form-control text-semibold',
												'placeholder' => 'Enter Password',											
											);
											echo form_password($data1);
											?>
										</div>
									</div>
                                    
                                    <div class="form-group">
										<label class="control-label col-lg-2">Confirm Password</label>
										<div class="col-lg-10">
											<?php 
											$data1 = array(
												'name'        => 'con_password',
												'id'          => 'con_password',
												'maxlength'   => '20',
												'class'       => 'form-control text-semibold',
												'placeholder' => 'Enter Confirm Password',											
											);
											echo form_password($data1);
											?>
										</div>
									</div>
                                    
                                    <div class="form-group">
										<label class="control-label col-lg-2">Photo</label>
										<div class="col-lg-10">
                                        <a href="<?php echo base_url(); ?>uploads/admin_profile/<?php echo $row->Admin_profile; ?>" data-popup="lightbox">
					                        <img src="<?php echo base_url(); ?>uploads/admin_profile/<?php echo $row->Admin_profile; ?>" alt="" class="img-rounded img-preview">
				                        </a>
											<input type="file" name="userfile" id="userfile" value="<?php echo $row->Admin_profile; ?>" size = "20" class="form-control">
										</div>
									</div>
                                    
                                     <div class="form-group">
			                        	<label class="control-label col-lg-2">User rights</label>
			                        	<div class="col-lg-10">
                                            <?php 
												$options_user['']='Select User Rights';
												foreach($user_rights_details_list->result() as $user_rights)
												{                  
												  $options_user[$user_rights->User_rights_id] = $user_rights->User_rights_name;
																  
												} 
												echo form_dropdown('user_rights', $options_user, $row->Admin_user_rights, 'class="form-control" id="user_rights"');
											  ?>
			                            </div>
			                        </div>
                                    <div class="text-center">
											<button type="submit" class="btn bg-teal-400">Save</button>
                                            <input type="reset" class="btn btn-default" value="Cancel" onClick="javascript: document.location.href='user_details_list'" >
									</div>
                                    <?php } ?>
							</form>
						</div>
					</div>
					<!--End form-->
                    
<?php
include("include/main_js.php");
include("validation/edit_user_details.php"); 
include("include/footer.php");
?>
