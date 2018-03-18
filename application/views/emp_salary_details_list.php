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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Salary Details</h4>
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
						<div class="col-md-12">
                        	<!--start Form-->
                        <div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title"><i class="icon-add"></i>&nbsp;<strong>Add Salary Details</strong></h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

                        <div class="panel-body">
                        <div class="tabbable">
                            <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                <li class="active"><a href="#bottom-justified-tab1" data-toggle="tab"><b>Salary Details</b></a></li>
                                <li><a href="#bottom-justified-tab2" data-toggle="tab"><b>List</b></a></li>
                                <li class="dropdown">
                                    <a href="#bottom-justified-tab3" data-toggle="tab"><b>List All</b></a></li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="bottom-justified-tab1">
                                        <div class="row">
                                           <div class="col-lg-12">
                                             <div class="panel panel-flat">


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
							 <?php echo form_open_multipart('emp_bank/validate_emp_bank_details', array('class'=>'form-horizontal')); ?>
                             <strong class="text-danger"><?php echo validation_errors(); ?></strong>
								<fieldset class="content-group">


                                   <div class="form-group">
										<label class="control-label col-lg-2">Designation<span class="req">*</span>:</label>
                                        <div class="col-lg-10">
										 <?php
                                         $option_designation[''] = "Select Employee Designation";
                                        foreach($employee_designation_details_list->result() as $designation){

                                            $option_designation[$designation->Employee_designation_id] = $designation->Employee_designation_name;
                                        }
                                        echo form_dropdown('designation', $option_designation, '', 'class="form-control" id="designation"');
                                        ?>
                                        </div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-lg-2">Employee Name<span class="req">*</span>:</label>
                                        <div class="col-lg-10">
										 <?php
                                         $option_emp_name[''] = "Select Employee Name";
                                        foreach($employee_details_list->result() as $emp_name){

                                            $option_emp_name[$emp_name->Employee_id] = $emp_name->Employee_first_name.$emp_name->Employee_middle_name.$emp_name->Employee_last_name;
                                        }
                                        echo form_dropdown('emp_name', $option_emp_name, '', 'class="form-control" id="emp_name"');
                                        ?>
                                        <p id="emp_department"></p>
                                      
                                        </div>
																			</div>


                                    <div class="form-group">
                                        <label class="control-label col-lg-2"> Branch<span class="req">*</span> :</label>
                                        <div class="col-lg-10">
                                        <?php
                                        $data1 = array(
                                        'name'        => 'branch',
                                        'id'          => 'branch',
                                        'value'       => '',
                                        'class'       => 'form-control',
                                        'placeholder' => 'Bank Branch',
                                        );
                                        echo form_input($data1);
                                         ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Bank Address<span class="req">*</span> :</label>
                                        <div class="col-lg-10">
                                        <?php
                                        $data2 = array(
                                        'name'        => 'bank_address',
                                        'id'          =>  'bank_address',
                                        'value'       => '',
                                        'class'       => 'form-control',
                                        'placeholder' => 'Bank Address',
                                        'rows'        => '3'
                                        );
                                        echo form_textarea($data2);
                                         ?>
                                        </div>
                                     </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"> Phone<span class="req">*</span> :</label>
                                        <div class="col-lg-10">
                                        <?php
                                        $data3 = array(
                                        'name' => 'phone',
                                        'id'   => 'phone',
                                        'value'=> '',
                                        'placeholder'=>'Phone',
                                        'class' => 'form-control',
                                        'maxlength' => '13'
                                        );
                                        echo form_input($data3);
                                        ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"> IFSC Code<span class="req">*</span> :</label>
                                        <div class="col-lg-10">
                                        <?php
                                        $data4 = array(
                                        'name' => 'ifsc_code',
                                        'id'   => 'ifsc_code',
                                        'value'=>'',
                                        'class'=> 'form-control',
                                        'placeholder'=> 'Enter IFSC code'
                                        );
                                        echo form_input($data4);
                                        ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"> Account No<span class="req">*</span> :</label>
                                        <div class="col-lg-10">
                                        <?php
                                        $data5 = array(
                                        'name' => 'ac_no',
                                        'id'   => 'ac_no',
                                        'value'=> '',
                                        'class'=> 'form-control',
                                        'placeholder'=> 'Enter Account Number'
                                        );
                                        echo form_input($data5);
                                        ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2"> DD Payable Address :</label>
                                        <div class="col-lg-10">
                                        <?php
                                        $data6 = array(
                                        'name' => 'dd_address',
                                        'id'   => 'dd_address',
                                        'value'=> '',
                                        'class'=> 'form-control',
                                        'placeholder'=> 'Enter DD Payable Address',
										'rows' => '3'
                                        );
                                        echo form_textarea($data6);
                                        ?>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn bg-teal-400">Save</button>
                                        <input type="reset" class="btn btn-default" value="Cancel" onClick="javascript: document.location.href='emp_bank_details_list'" >
                                       </div>
                                       </fieldset>
									</div>
						        </div>
								</div>
							</div>
                        	</form>
                            </div>
					<!--End form-->
                        <div class="tab-pane" id="bottom-justified-tab2">
                           <div class="row">
                            <div class="col-md-4">
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h6 class="panel-title"><strong>List:-</strong></h6>
                                    </div>
                                    <div class="panel-body">
									<form>
                                        <div class="form-group">
                                            <label for="reg_input">Designation</label>
                                            <?php
											$option_designation2[''] = "Select Employee Designation";
											foreach($employee_designation_details_list->result() as $designation2){
												$option_designation2[$designation2->Employee_designation_id] = $designation2->Employee_designation_name;
											}
											echo form_dropdown('emp_designation', $option_designation2, '', 'class="form-control" id="designation2"' );
											?>
										</div>
                                        <div class="form-group">
                                            <label for="reg_input">Employee Name</label>
                                            <?php
											$option_emp_name2['']= "Select Employee Name";
											foreach($employee_details_list->result() as $emp){
											$option_emp_name2[$emp->Employee_id] = $emp->Employee_first_name.$emp->Employee_middle_name.$emp->Employee_last_name;
											}
											echo form_dropdown('emp_name2', $option_emp_name2, '', 'class="form-control" id="emp_name2"');
											?>
                                        </div>
                                         <div class="text-center">
                                         <!--<button type="submit" class="btn bg-teal-400">Search</button>-->

                                        </div>
                              		</form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-8">
                                <div class="panel panel-flat" id="bankdetails" style="display:none">
                                    <div class="panel-heading">
                                        <h6 class="panel-title"><strong>Bank Details:-</strong></h6>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-sm-8">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <div id="showdetails" >
                                                            <div class="table-responsive" id="banklistalldetails">
                                                        	</div>
                                                    	</div>
                                               		</div>
                                            	</div>
                                        	</div>
                                    	</div>
                                	</div>
                           		</div>

                        	 </div>
                          </div>
                          <div class="tab-pane" id="bottom-justified-tab3">
                          <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h6 class="panel-title"><strong>List:-</strong></h6>
                                    </div>
                                    <div class="panel-body">
									<form>
                                            <div class="form-group col-sm-4">
                                            <label for="reg_input">Department</label>
                                            <?php
											$option_dep['']= "Select a Depatment";
											foreach($employee_department_details_list->result() as $dep){
												$option_dep[$dep->Employee_department_id] =$dep->Employee_department_name;
											}
											echo form_dropdown('sel_dep', $option_dep, '', 'class="form-control" id="sel_dep"');
											?>
											</div>
                                        	<div valign="top" align="center">
                                            <br/><br/>
                                            <input type="button" onclick="printDiv('print')" value="Print Report" class="btn btn-danger"/>
                                        </div>
                                	</form>
                                    </div>
                                </div>
                            </div>
                        <br />

                        <div class="row" id="emp_bank_list_print" style="display:none;">
                            <div class="col-sm-12">
                                <div class="panel panel-flat"  id="listall" >
                                    <div class="panel-heading">
                                        <h6 class="panel-title"><strong>Bank Details:-</strong></h6>
                                    </div>
                                   <div class="table-responsive" id="bank_details_list">

                                   </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
						</div>
					</div>
                <!--End Table-->

<?php
include("include/main_js.php");
include("validation/validation_bank_details.php");
include("include/footer.php");
?>
<script type="text/javascript">
	<!--add form designation to get employee name-->
	$(document).ready(function(){
		$('#designation').change(function(){
			var emp_depar_id = $('#designation').val();
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url(); ?>/index.php/employee/ajax_check_employee_name",
				data :{"emp_depar_id" : emp_depar_id},
				success : function(data){
					jQuery("#emp_name").html(data);

				}
			});

		});
	});
	<!--add form employee name to get employee department -->
	$(document).ready(function(){
		$('#emp_name').change(function(){
			var emp_id = $('#emp_name').val();
				/*alert(emp_id);	*/
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url(); ?>/index.php/employee/ajax_check_employee_depart",
				data :{"emp_id" : emp_id},
				success : function(data){
					alert(data);
					jQuery("#emp_department").html(data);

				}
			});

		});
	});
	<!--search form designation2 to get employee name -->
	$(document).ready(function(){
		$('#designation2').change(function(){
			var emp_depar_id = $('#designation2').val();
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url(); ?>/index.php/employee/ajax_check_employee_name",
				data :{"emp_depar_id" : emp_depar_id},
				success : function(data){
					jQuery("#emp_name2").html(data);
				}
			});

		});
	});
	<!--search form  employee name  to get employee bank details hide and show -->
	$(document).ready(function() {
		$('#emp_name2').change(function(){
		var bank_det = $('#emp_name2').val();
		var bank_det2 = $('#designation2').val();

		if((bank_det !='')&&(bank_det2 !='')){

			$("#bankdetails").show("slow");
		}
		if((bank_det =='')&&(bank_det2 =='')){
			$("#bankdetails").hide("slow");
		}
		});

    });
	<!--search form  employee name  to get employee bank details -->
	$(document).ready(function(){
		$('#emp_name2').change(function(){
			var check_emp_id = $('#emp_name2').val();
			<!--alert(check_emp_id);-->
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url(); ?>/index.php/emp_bank/ajax_check_emp_bank",
				data :{"check_emp_id" : check_emp_id},
				success : function(data){
				<!--alert(data);-->
					jQuery("#banklistalldetails").html(data);
				}
			});

		});
	});
	<!--search form  employee department  to get employee bank details list hide or show -->
	$(document).ready(function() {
		$('#sel_dep').change(function(){
		var bank_det = $('#sel_dep').val();
		if(sel_dep !=''){

			$("#emp_bank_list_print").show("slow");
		}
		if(sel_dep ==''){
			$("#emp_bank_list_print").hide("slow");
		}
		});

    });
	<!--search form  employee department  to get employee bank details list -->
	$(document).ready(function(){
		$('#sel_dep').change(function(){
			var sel_depart = $('#sel_dep').val();
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url(); ?>/index.php/emp_bank/ajax_check_emp_bank_list",
				data :{"sel_depart" : sel_depart},
				success : function(data){

					jQuery("#bank_details_list").html(data);
				}
			});

		});
	});
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_responsive.js"></script>
