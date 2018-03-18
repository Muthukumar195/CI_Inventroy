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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Expences Details</h4>
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
							<h5 class="panel-title"><i class="icon-add"></i>&nbsp;<strong>Add Expences Details</strong></h5>
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
							 <?php echo form_open_multipart('expences_details/validate_expences_details', array('class'=>'form-horizontal')); ?>
                             <span style="color:red; "><?php echo validation_errors(); ?></span>
								<fieldset class="content-group">
									<div class="form-group">
											<label>joining Date :</label>

												<div class="input-group">
													<span class="input-group-addon"><i class="icon-calendar22"></i></span>
												 <?php
												$data1 = array(
													'name'        => 'ex_date',
													'id'          => 'ex_date',
													'value'       => set_value('ex_date'),
													'class'       => 'form-control pickadate-accessibility text-semibold datepicker-example1',
													'placeholder' => 'Select Expences date',
												);
												echo form_input($data1);
												?>
											</div>
										</div>
									<div class="form-group">
										<label>Expences Type</label>
										<div>
											<select name="ex_mas"  class="form-control">
												<option value="">Select Expences type</option>
		                  <?php
											foreach ($expences_master_name_list->result() as $ex_mas) {
												echo '<option value="'.$ex_mas->Exp_mas_id.'">'.$ex_mas->Exp_mas_name.'</option>';
											}
											?>
										</select>
										</div>
									</div>

									<div class="form-group">
										<label>Amount</label>
										<div>
											<?php
											$data2 = array(
											'name' => 'expences_amount',
											'id'   => 'expences_amount',
											'class' => 'form-control',
											'placeholder' => 'Enter a Amount'
											);
											echo form_input($data2);
											 ?>
										</div>
									</div>
									<div class="form-group">
												<label>Description:</label>
												<?php
												$data3 = array(
												'name'   => 'description',
												'id'     => 'description',
												'value'  => '',
												'class'  => 'form-control',
												'placeholder' => 'Enter a Description',
												'rows'   => '3'
												);
												echo form_textarea($data3);
												?>
										</div>
										<a href="#" id="adv" name="adv" onClick="adv_fun('adv');" ><i class="icon-add"></i>&nbsp;Advanced option</a>
										<a href="#" id="adv1" name="adv1" onClick="adv_fun('adv1');" style="display:none;"><i class="icon-subtract"></i>&nbsp;Advanced option</a>
											<div id="advance" style="display:none;">
												<div class="form-group">
													<label>Payment Method</label>
														<select id="methods" name="methods" class="form-control" style="width:100%;">
															<option value="">Select Payment Methods</option>
															<option value="cheque">cheque</option>
															<option value="DD">DD</option>
															<option value="card">card</option>
															<option value="cash">cash</option>
														</select>
												</div>
												<div class="form-group">
													<label>Ref#</label>
														<input type="text" name="ref"  id="ref" class="form-control" value="">
														<span class="text-primary">e.g. Transaction ID, Cheque No.</span>
												</div>
											</div>
									  <div class="text-center">
											<button type="submit" class="btn bg-teal-400">Save</button>
                      <input type="reset" class="btn btn-default" value="Cancel" onClick="javascript: document.location.href='expences_details_list'" >
									</div>
							</form>
						</div>
					</div>
					<!--End form-->
						</div>
                <div class="col-md-6">

                    <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Expences Details List</h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                            <!--<a href="add_user_details"><button type="button" class=" text-right btn bg-violet btn-labeled"><b><i class="icon-add"></i></b> Ad</button></a>-->

                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>

                   <!-- <div class="panel-body">
                    </div>-->

                    <table class="table datatable-responsive">
                        <thead>
                            <tr>
                               <th>Sno</th>
															 <th>Date</th>
                                <th>Expences</th>
																<th>Amount</th>
																<th>Description</th>
																<th>Method/Ref</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sno=1;
                        foreach($expences_details_list->result() as $row){ ?>
                            <tr>
                                <td><?php echo $sno; ?></td>
																<td><?php echo date('d-m-Y', strtotime($row->Exp_date)); ?></td>
                                <td><?php echo $row->Exp_mas_name; ?></td>
																<td><?php echo $row->Exp_amount; ?></td>
																<td><?php echo $row->Exp_desc; ?></td>
                              	<td><?php echo $row->Exp_method.'/'.$row->Exp_ref; ?></td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="edit_expences_details?id=<?php echo $row->Exp_id; ?>" class="text-info"><i class="icon-pen6"></i> Edit</a></li>

                                                <li><a href="deny?id=<?php echo $row->Exp_id; ?>" onclick="return confirm('Are you sure you want to delete?')"><i class="icon-trash"></i> Delete</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <?php $sno++; } ?>
                        </tbody>
                        <tfoot>
													 <th>Sno</th>
													<th>Date</th>
													 <th>Expences</th>
													 <th>Amount</th>
													 <th>Description</th>
													<th>Method/Ref</th>
                          <th class="text-center">Actions</th>
                        </tfoot>
                    </table>
                </div>

						</div>
					</div>


                <!--End Table-->

<?php
include("include/main_js.php");
//include("validation/add_employee_designation_details_list.php");
include("include/footer.php");
?>
<script>
	function adv_fun(val)
	{
		if(val=='adv')
		{
			$('#adv').hide();
			$('#advance').show();
			$('#adv1').show();
		}
		else
		{
			$('#adv1').show();
			$('#advance').hide();
			$('#adv').show();
			document.getElementById('adv1').style.display='none';
		}
	}
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_responsive.js"></script>
