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
				<!-- Content area -->
				<div class="content">


					<!-- Dashboard content -->
					<div class="row">
						<div class="col-lg-8">
							<!-- Quick stats boxes -->
							<div class="row">
                            	<!-- Traffic sources -->
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title">Dashboard Details</h6>
									<div class="heading-elements">
										<form class="heading-form" action="#">
											<div class="form-group">
												<label class="checkbox-inline checkbox-switchery checkbox-right switchery-xs">
													<input type="checkbox" class="switch" checked="checked">
													Live update:
												</label>
											</div>
										</form>
									</div>
								</div>

								<div class="container-fluid">
									<div class="row">
										<div class="col-lg-3">
											<ul class="list-inline text-center">
												<li>
													<a href="#" class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class=" icon-people"></i></a>
												</li>
												<li class="text-left">
													<div class="text-semibold">Customers</div>
													<div class="text-teal" style="font-size:20px;"><?php echo $total_customer; ?></div>
												</li>
											</ul>
										</div>

										<div class="col-lg-3">
											<ul class="list-inline text-center">
												<li>
													<a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class=" icon-users2"></i></a>
												</li>
												<li class="text-left">
													<div class="text-semibold">Retailers</div>
													<div class="text-warning"  style="font-size:20px;"><?php echo $total_retailer; ?></div>
												</li>
											</ul>

										</div>

										<div class="col-lg-3">
											<ul class="list-inline text-center">
												<li>
													<a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-users4"></i></a>
												</li>
												<li class="text-left">
													<div class="text-semibold">wholesaler</div>
													<div class="text-indigo"  style="font-size:20px;"> <?php echo $total_wholesaler; ?></div>
												</li>
											</ul>
										</div>
                                        <div class="col-lg-3">
											<ul class="list-inline text-center">
												<li>
													<a href="#" class="btn border-pink-400 text-pink-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-user"></i></a>
												</li>
												<li class="text-left">
													<div class="text-semibold">Employee</div>
													<div class="text-pink"  style="font-size:20px;"> <?php echo $total_employee; ?></div>
												</li>
											</ul>
										</div>
									</div>
								</div>

								<div class="position-relative" id="traffic-sources"></div>
							</div>
							<!-- /traffic sources -->
							</div>
							<!-- /quick stats boxes -->
						</div>
<!--
						<div class="col-lg-4">


						</div>-->
					</div>
					<!-- /dashboard content -->
                

<?php 
include("include/main_js.php");
include("include/footer.php");?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/dashboard.js"></script>