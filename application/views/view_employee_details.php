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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - View Employee Details</h4>
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
							<h6 class="panel-title">View Employee Details</h6>
							<div class="heading-elements">
								<button type="button" class="btn btn-default btn-xs heading-btn"><i class="icon-file-check position-left"></i> Save</button>
								<button type="button" class="btn btn-default btn-xs heading-btn"><i class="icon-printer position-left"></i> Print</button>
		                	</div>
						</div>

						<div class="panel-body no-padding-bottom">
                        <?php foreach($view_employee_details->result() as $row){ ?>
							<div class="row">
								<div class="col-md-8">
                                <div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th><strong>Employee code</strong></th>
											<th><strong>:</strong>&nbsp;&nbsp;<?php echo $row->Employee_code; ?></th>
										</tr>
									</thead>
									<tbody>
                                        <tr>
											<td><strong>Joining date</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo date('d--m-Y', strtotime($row->Employee_joining_date)); ?></td>
										</tr>
										
										<tr>
											<td><strong>Department</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Employee_department_name; ?></td>
										</tr>
                                        <tr>
											<td><strong>Designation</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Employee_designation_name; ?></td>
										</tr>
                                         <tr>
											<td><strong>Qualification</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Employee_qualification; ?></td>
										</tr>
                                        <tr>
											<td><strong>Total Experiences</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Employee_total_experiences; ?></td>
										</tr>
                                         <tr>
											<td><strong>Experiences Details</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Employee_experiences_details; ?></td>
										</tr>
									</tbody>
								</table>
							</div> 
                                </div>
                                
                                
                                
								<div class="col-md-4">
									<div align="center">
                                    <img src="<?php echo base_url(); ?>uploads/employee_profile/<?php echo $row->Employee_photo; ?>" class="content-group mt-10" alt="" style="width: 320px;">	   							</div>
                                  
							</div>
						</div>
                       
                        <div class="row">
                        
								<div class="col-sm-6 content-group">
                                 <h5><strong>Personal Details</strong>:-</h5>
                                <div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th><strong>Name</strong></th>
											<th><strong>:</strong>&nbsp;&nbsp;<?php echo $row->Employee_first_name.$row->Employee_middle_name.$row->Employee_last_name; ?></th>
										</tr>
									</thead>
									<tbody>
										
                                        <tr>
											<th><strong>Date of Birth</strong></th>
											<th><strong>:</strong>&nbsp;&nbsp;<?php echo date('d-m-Y', strtotime($row->Employee_dob)); ?></th>
										</tr>
                                        <tr>
											<td><strong>Gender</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Employee_gender; ?></td>
										</tr>
                                         <tr>
											<td><strong>Marital status</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php 
											if($row->Employee_marital_status=="S"){ echo 'Single'; }
											elseif($row->Employee_marital_status=="M"){ echo 'Married'; } 
											else{ echo 'Diversed'; }
											?></td>
										</tr>
                                        <tr>
											<td><strong>Father name</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Employee_father_name; ?></td>
										</tr>
										<tr>
											<td><strong>Mother name</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Employee_mother_name; ?></td>
										</tr>
                                        
									</tbody>
								</table>
							</div> 
                                </div>
                                
                                <div class="col-sm-6 content-group">
                                 <h5><strong>Contact Details</strong>:-</h5>
                                <div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th><strong>Present address</strong></th>
											<th><strong>:</strong>&nbsp;&nbsp;<?php echo $row->Employee_persent_address; ?></th>
										</tr>
									</thead>
									<tbody>
                                        <tr>
											<td><strong>Permanent address </strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Employee_premanent_address; ?></td>
										</tr>
                                        <tr>
											<td><strong>E-mail</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Employee_email; ?></td>
										</tr>
                                         <tr>
											<td><strong>Mobile</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Employee_mobile; ?></td>
										</tr>
                                         <tr>
											<td><strong>City</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Employee_city; ?></td>
										</tr>
                                         <tr>
											<td><strong>pin</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Employee_pin; ?></td>
										</tr>
                                         <tr>
											<td><strong>State</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Employee_state; ?></td>
										</tr>
                                         <tr>
											<td><strong>Country</strong></td>
											<td><strong>:</strong>&nbsp;&nbsp; <?php echo $row->Employee_country; ?></td>
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
