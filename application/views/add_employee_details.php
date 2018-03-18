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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Add Employee Details</h4>
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
							<h5 class="panel-title"><i class="icon-add"></i>&nbsp;<strong>Add Employee Details</strong></h5>
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
							 <?php echo form_open_multipart('employee/validate_employee_details', array('class'=>'form-horizontal')); ?>
                             <span style="color:red; "><?php echo validation_errors(); ?></span> 
								<fieldset class="content-group">
									<div class="form-group">
										<label class="control-label col-lg-2">Employee Code :</label>
										<div class="col-lg-10">
                                            <?php 
											$data1 = array(
												'name'        => 'employee_code',
												'id'          => 'employee_code',
												'value'       => '',
												'class'       => 'form-control text-capitalize text-semibold',
												'placeholder' => 'Enter Employee Code',											
											);
											echo form_input($data1);
											?>
                                            <span id="alert_emp_code" style="color:#F00;"></span>
										</div>
									</div>
                                    
                                    <div class="form-group">
										<label class="control-label col-lg-2">joining Date :</label>
										<div class="col-lg-10">
                                        <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
											 <?php 
											$data1 = array(
												'name'        => 'emp_joining_date',
												'id'          => 'emp_joining_date',
												'value'       => set_value('emp_joining_date'),
												'class'       => 'form-control pickadate-accessibility text-semibold datepicker-example1',
												'placeholder' => 'Enter Joining date',											
											);
											echo form_input($data1);
											?>
                                            </div>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Department :</label>
										<div class="col-lg-10">
											 <?php 
											$depart[''] = "Select Department";
											foreach($emp_department_name_list->result() as $department){
												
												$depart[$department->Employee_department_id] = $department->Employee_department_name;
											}
											echo form_dropdown('department_name',$depart,'','class="form-control" id="department_name"');
											?>
                                         
										</div>
									</div>
                                    
                                    <div class="form-group">
										<label class="control-label col-lg-2">Designation :</label>
										<div class="col-lg-10">
                                           <?php 
											$design[''] = "Select Designation";
											foreach($emp_designation_name_list->result() as $designation){
												
												$design[$designation->Employee_designation_id] = $designation->Employee_designation_name;
											}
											echo form_dropdown('designation_name',$design,'','class="form-control" id="designation_name"');
											?>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Qualification</label>
										<div class="col-lg-10">
											<?php 
											$data1 = array(
												'name'        => 'qualification',
												'id'          => 'qualification',
												'class'       => 'form-control text-semibold',
												'placeholder' => 'Enter Qualification',											
											);
											echo form_input($data1);
											?>
										</div>
									</div>
                                    
                                    <div class="form-group">
										<label class="control-label col-lg-2">Total experiences :</label>
										<div class="col-lg-10">
											<?php 
											$data1 = array(
												'name'        => 'experiences',
												'id'          => 'experiences',
												'maxlength'   => '20',
												'class'       => 'form-control text-semibold',
												'placeholder' => 'Enter experiences',											
											);
											echo form_input($data1);
											?>
										</div>
                                      
									</div>
                                    
                                     <div class="form-group">
										<label class="control-label col-lg-2">Experiences Details :</label>
										<div class="col-lg-10">
											<?php 
											$data1 = array(
												'name'        => 'ex_details',
												'id'          => 'ex_details',
												'rows'         => '4',
												'class'       => 'form-control text-semibold',
												'placeholder' => 'Enter Experiences Details',											
											);
											echo form_textarea($data1);
											?>
										</div>
									</div>
                            <!-- Default grid -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="panel panel-flat">
                                            <div class="panel-heading">
                                                <h6 class="panel-title"><strong>Personal Details:-</strong></h6>
                                                <div class="heading-elements">
                                                    <ul class="icons-list">
                                                        <!--<li><a data-action="collapse"></a></li>
                                                        <li><a data-action="reload"></a></li>
                                                        <li><a data-action="close"></a></li>-->
                                                    </ul>
                                                </div>
                                            </div>
            
                                            <div class="panel-body">
                                            <div class="form-group">
											<label>First Name :</label>
                                            <?php
											$data4 = array(
											'name'    => 'first_name',
											'id'	  => 'first_name',
											'value'   => '',
											'placeholder' => 'Enter First name',
											'class'   => 'form-control text-capitalize text-semibold'
											);
											echo form_input($data4);
											 ?>
		                                    </div>
                                            
                                            <div class="form-group">
											<label>Middle Name :</label>
                                            <?php
											$data5 = array(
											'name'    => 'middle_name',
											'id'	  => 'middle_name',
											'value'   => '',
											'placeholder' => 'Enter Middle name',
											'class'   => 'form-control text-capitalize text-semibold'
											);
											echo form_input($data5);
											 ?>
	                                      </div>
                                        
                                            <div class="form-group">
                                                <label>Last Name :</label>
                                                <?php
                                                $data6 = array(
                                                'name'    => 'last_name',
                                                'id'	  => 'last_name',
                                                'value'   => '',
                                                'placeholder' => 'Enter Last name',
                                                'class'   => 'form-control text-capitalize text-semibold'
                                                );
                                                echo form_input($data6);
                                                 ?>
                                            </div>
                                            <div class="form-group">
											<label>Date Of Birth :</label>
                                                <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                <?php
                                                $data7 = array(
                                                'name'    => 'dob',
                                                'id'	  => 'dob',
                                                'value'   => '',
                                                'placeholder' => 'Date of birth',
                                                'class'   => 'form-control pickadate-accessibility text-semibold datepicker-example10'
                                                );
                                                echo form_input($data7);
                                                 ?>
										    </div>
                                            </div>
                                            
                                            <div class="form-group">
											<label>Gender :</label>
                                            <?php
											$option = array(
											''      => "Select Gender",
											'Male'    => 'Male',
											'Female'  => 'Female',
											);
											echo form_dropdown('gender', $option, '', 'class="select form-control" id="gender_id"');
											 ?>
										   </div>
                                           <div class="form-group">
											<label>Marital :</label>
                                            <?php
											$option = array(
											''      => "Select Marital",
											'S'    => 'Single',
											'M'  => 'Married',
											'D'  => 'Divorced',
											);
											echo form_dropdown('marital', $option, '', 'class="select form-control" id="gender_id"');
											 ?>
										   </div>
                                           <div class="form-group">
											<label>Father name :</label>
                                            <?php
											$data11 = array(
											'name'    => 'father_name',
											'id'	  => 'father_name',
											'value'   => '',
											'placeholder' => 'Enter Father name',
											'class'   => 'form-control text-capitalize text-semibold'
											);
											echo form_input($data11);
											 ?>
		                                </div>
                                        <div class="form-group">
											<label>Mother name :</label>
                                            <?php
											$data11 = array(
											'name'    => 'mother_name',
											'id'	  => 'mother_name',
											'value'   => '',
											'placeholder' => 'Enter Mother name',
											'class'   => 'form-control text-capitalize text-semibold'
											);
											echo form_input($data11);
											 ?>
		                                </div>
                                        
                                        <div class="form-group">
										<label class="control-label">Employee Photo :</label>
										<input type="file" name="employee_profile" id="employee_profile" class="form-control">						
									     </div>
                                            
                                                
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="col-lg-6">
                                        <div class="panel panel-flat">
                                            <div class="panel-heading">
                                                <h6 class="panel-title"><strong>Contact Details:-</strong></h6>
                                                <div class="heading-elements">
                                                    <ul class="icons-list">
                                                       <!-- <li><a data-action="collapse"></a></li>
                                                        <li><a data-action="reload"></a></li>
                                                        <li><a data-action="close"></a></li>-->
                                                    </ul>
                                                </div>
                                            </div>
            
                                            <div class="panel-body">
                                                <div class="form-group">
                                                <label>Present Address :</label>
                                                <?php
                                                $data13 = array(
                                                'name'    => 'present_address',
                                                'id'	  => 'present_address',
                                                'value'   => '',
                                                'placeholder' => 'Enter Present Address',
                                                'class'   => 'form-control text-capitalize text-semibold',
                                                'rows'   => '4'
                                                );
                                                echo form_textarea($data13);
                                                 ?>
                                               </div>
                                               
                                               <div class="form-group">
                                                <label>Permanent Address :</label>
                                                <?php
                                                $data14 = array(
                                                'name'    => 'permanent_address',
                                                'id'	  => 'permanent_address',
                                                'value'   => '',
                                                'placeholder' => 'Enter Permanent Address',
                                                'class'   => 'form-control text-capitalize text-semibold',
                                                'rows'   => '4'
                                                );
                                                echo form_textarea($data14);
                                                 ?>
                                               </div>
                                             
                                                <div class="form-group">
                                                <label>Mobile :</label>
                                                <?php
                                                $data15 = array(
                                                'name'    => 'con_mobile',
                                                'id'	  => 'con_mobile',
                                                'value'   => '',
                                                'placeholder' => 'Enter Mobile',
                                                'class'   => 'form-control text-capitalize text-semibold'
                                                );
                                                echo form_input($data15);
                                                 ?>
                                               </div>
                                               
                                                <div class="form-group">
                                                <label>E-mail :</label>
                                                <?php
                                                $data16 = array(
                                                'name'    => 'con_email',
                                                'id'	  => 'con_email',
                                                'value'   => '',
                                                'placeholder' => 'Enter E-mail',
                                                'class'   => 'form-control  text-semibold'
                                                );
                                                echo form_input($data16);
                                                 ?>
                                               </div>
                                               
                                               <div class="form-group">
                                                <label>City:</label>
                                                <?php
                                                $data17 = array(
                                                'name'    => 'con_city',
                                                'id'	  => 'con_city',
                                                'value'   => '',
                                                'placeholder' => 'Enter City',
                                                'class'   => 'form-control text-capitalize text-semibold'
                                                );
                                                echo form_input($data17);
                                                 ?>
                                               </div>
                                               
                                               <div class="form-group">
											    <label>Pin:</label>
												<?php
                                                $data18 = array(
                                                'name'    => 'con_pin',
                                                'id'	  => 'con_pin',
                                                'value'   => '',
                                                'placeholder' => 'Enter Pin no',
                                                'class'   => 'form-control text-capitalize text-semibold'
                                                );
                                                echo form_input($data18);
                                                 ?>
                                                </div>
                                        
                                                <div class="form-group">
                                                <span id="con">
                                                    <label>Country:</label>
                                                    <?php
                                                    echo form_dropdown('country', '','','class="form-control" id="country"');
                                                     ?>
                                                </span>     
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>State:</label>
                                                   <?php
                                                    echo form_dropdown('state', '','','id="state" class="form-control"');
                                                     ?>
                                                </div>
                                    
                                    
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /default grid -->
                                 <div class="text-center">
											<button type="submit" class="btn bg-teal-400">Save</button>
                                            <input type="reset" class="btn btn-default" value="Cancel" onClick="javascript: document.location.href='user_details_list'" >
									</div>
                    
                          </form>  
						</div>
					</div>
                    
					<!--End form-->
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/country.js"></script>
<script language="javascript">
 populateCountries("country", "state");
 populateCountries("country2");
</script>
                    
<?php
include("include/main_js.php");
include("validation/validate_add_employee_details.php"); 
include("include/footer.php");
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#employee_code').change(function(){
			var employee_code = $('#employee_code').val();
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url(); ?>/index.php/employee/ajax_check_employee_code",
				data :{"employee_code" : employee_code},
				success : function(data){
					jQuery("#alert_emp_code").html(data);					
				}
			});
			
		});	
	});
</script>
