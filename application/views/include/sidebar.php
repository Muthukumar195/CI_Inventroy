<div class="sidebar sidebar-main sidebar-fixed">
				<div class="sidebar-content">
					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="<?php echo base_url(); ?>uploads/admin_profile/<?php echo $this->session->userdata('profile'); ?>" class="img-circle img-sm" alt="<?php echo $this->session->userdata('profile'); ?>"></a>
								<div class="media-body">
									<h5 class="media-heading text-semibold"><?php echo $this->session->userdata('user_full_name'); ?></h5>
									<div class="text-size-mini text-muted">
										 &nbsp; Daffodills India
                                   </div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->
					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">
                               <?php
								// start for check user rights
								$user_typ_ary=explode(',', $this->session->userdata('user_rights_dtl'));
								$ses_username = $this->session->userdata('username');
								// end for check user rights
							   ?>
								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li <?php if($page_name=="dashboard"){ echo 'class="active"'; } ?>><?php echo anchor('project_main/dashboard', '<i class="icon-home4"></i> <span>Dashboard</span>'); ?></li>

                               <?php if((in_array('Customer Details',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
								<li>
									<a href="#"><i class="icon-users2"></i> <span>Customers</span></a>
									<ul>
										<li <?php if(($page_name=='customer_details_list')||($page_name=='edit_customer_details')||($page_name=='validate_edit_customer_details')||($page_name=='view_customer_details')){ echo 'class="active"'; }?>>
										<?php echo anchor('customer_details/customer_details_list', 'Customer Details', ''); ?>
                                         </li>


										<li <?php if(($page_name=='add_customer_details')||($page_name=="validate_customer_details")){ echo 'class="active"'; }?>>
										<?php echo anchor('customer_details/add_customer_details', 'Add Customer', ''); ?>
                                         </li>


									</ul>

								</li>
                   <?php } //check for Customer Details ?>
                   <li>
										 	<a href="#"><i class="icon-cash"></i> <span>Inventroy</span></a>
											<ul>
                       <!-- Product details -->
                          <li>
                              <a href="#"><!--<i class=" icon-user"></i>--> <span>Product</span></a>
                              <ul>
                               <?php if((in_array('Product Details',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
                                  <li <?php if(($page_name=='product_details_list')||($page_name=='edit_product_details')||($page_name=='validate_edit_product_details')||($page_name=='view_product_details')){ echo 'class="active"'; }?>>
                                  <?php echo anchor('product_details/product_details_list', 'Product Details', ''); ?>
                                   </li>
                                  <li <?php if(($page_name=='validate_product_details')||($page_name=="add_product_details")){ echo 'class="active"'; }?>>
                                   <?php echo anchor('product_details/add_product_details', 'Add Product'); ?>
                                   </li>
                               <?php } //check for user rights ?>
                              </ul>
                          </li>
                          <!-- /Product details -->
													<!-- Sales details -->
												 <li>
														 <a href="#"><!--<i class=" icon-user"></i>--> <span>Sales</span></a>
														 <ul>
															<?php if((in_array('Sales Details',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
																 <li <?php if(($page_name=='sales_details_list')||($page_name=='validate_sales_details')){ echo 'class="active"'; }?>>
																 <?php echo anchor('sales_details/sales_details_list', 'Manage Sales Details', ''); ?>
																	</li>
																	<li <?php if(($page_name=='validate_sales_details')||($page_name=="add_sales_details")){ echo 'class="active"'; }?>>
																 <?php echo anchor('sales_details/add_sales_details', 'New Invoice'); ?>
																 </li>
															<?php } //check for Sales ?>


														 </ul>
												 </li>
													<!-- /Sales details -->
                           <!-- Purchase details -->
                          <li>
                              <a href="#"><!--<i class=" icon-user"></i>--> <span>Purchase</span></a>
                              <ul>
                               <?php if((in_array('Purchase Details',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
                                  <li <?php if(($page_name=='purchase_details_list')||($page_name=='edit_purchase_details')||($page_name=="view_purchase_details")){ echo 'class="active"'; }?>>
                                  <?php echo anchor('purchase_details/purchase_details_list', 'Manage Purchase Details', ''); ?>
                                   </li>
                                    <li <?php if(($page_name=='validate_purchse_details')||($page_name=="add_purchase_details")){ echo 'class="active"'; }?>>
                                   <?php echo anchor('purchase_details/add_purchase_details', 'Add purchase'); ?>
                                   </li>
                               <?php } //check for Purchase ?>


                              </ul>
                          </li>
                           <!-- /Purchase details -->
                           <!-- Tax details -->
                          <li>
                              <a href="#"><!--<i class=" icon-user"></i>--> <span>Tax</span></a>
                              <ul>
                               <?php if((in_array('Tax Details',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
                                  <li <?php if(($page_name=='tax_details_list')||($page_name=='validate_tax_details')){ echo 'class="active"'; }?>>
                                  <?php echo anchor('tax_details/tax_details_list', 'Tax Details', ''); ?>
                                   </li>
                               <?php } //check for Tax ?>


                              </ul>
                          </li>
                           <!-- /Tax details -->
                            <!-- expences_master -->
                          <li>
                              <a href="#"><!--<i class=" icon-user"></i>--> <span>Expences</span></a>
                              <ul>
                               <?php if((in_array('Expences Details',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
                                  <li <?php if(($page_name=='expences_master_details')||($page_name=='validate_expences_master_details')||($page_name == "edit_expences_master_details")){ echo 'class="active"'; }?>>
                                  <?php echo anchor('expences_details/expences_master_details', 'Expences Master', ''); ?>
                                   </li>
                               <?php } //check for Tax ?>
															 <?php if((in_array('Expences Details',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
																	<li <?php if(($page_name=='expences_details_list')||($page_name=='validate_expences_details')||($page_name == "edit_expences_details")||$page_name=="validate_edit_expences"){ echo 'class="active"'; }?>>
																	<?php echo anchor('expences_details/expences_details_list', 'Expences Details', ''); ?>
																	 </li>
															 <?php } //check for Tax ?>

                              </ul>
                          </li>
                           <!-- /expences_master -->
									</ul>
								</li>
								<!-- /finance -->
                                <!--Employee-->
                                <li>
									<a href="#"><i class="icon-users"></i> <span>Employee Management</span></a>
									<ul>
                                     <?php if((in_array('Employee Department',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
										<li <?php if(($page_name=='employee_department_details_list')||($page_name=="edit_employee_department_details")||($page_name=="validate_employee_department_details")||($page_name=="validate_edit_employee_department")){ echo 'class="active"'; }?>>
										<?php echo anchor('employee_department/employee_department_details_list', 'Add Department', ''); ?>
                                         </li>
                                     <?php } //check for employee_department?>
                                     <?php if((in_array('Employee Designation',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
										<li <?php if(($page_name=='employee_designation_details_list')||($page_name=="edit_employee_designation_details")||($page_name=="validate_employee_designation_details")||($page_name=="validate_edit_employee_designation")){ echo 'class="active"'; }?>>
										<?php echo anchor('employee_designation/employee_designation_details_list', 'Add Designation', ''); ?>
                                         </li>
                                     <?php } //check for employee_Designation?>
                                     <?php if((in_array('Add Employee',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
										<li <?php if(($page_name=='add_employee_details')||($page_name=="edit_employee_details")||($page_name=="validate_employee_details")||($page_name=="validate_edit_employee_details")){ echo 'class="active"'; }?>>
										<?php echo anchor('employee/add_employee_details', 'Add Employee', ''); ?>
                                         </li>
                                     <?php } //check for employee_Details?>
                                     <?php if((in_array('Employee Details',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
										<li <?php if(($page_name=='employee_details_list')||($page_name=="edit_employee_details")||($page_name=="validate_edit_employee_details")){ echo 'class="active"'; }?>>
										<?php echo anchor('employee/employee_details_list', 'Employee List', ''); ?>
                       </li>
                   <?php } //check for employee_Details?>
                   <?php if((in_array('Bank Details',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
										<li <?php if(($page_name=='emp_bank_details_list')||($page_name=="validate_emp_bank_details")){ echo 'class="active"'; }?>>
										<?php echo anchor('emp_bank/emp_bank_details_list', 'Add Bank Details', ''); ?>
                       </li>
											 <?php } //check for employee salary  Details?>
									 <?php if((in_array('Salary Details',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
									 <li <?php if(($page_name=='emp_salary_details_list')||($page_name=="validate_emp_salary_details")){ echo 'class="active"'; }?>>
									 <?php echo anchor('emp_salary/emp_salary_details_list', 'Add Salary Details', ''); ?>
										</li>
									 <?php } //check for employee  salary _Details?>
									</ul>
								</li>
                                <!--Employee-->
								<!-- Forms -->
								<!--<li class="navigation-header"><span>User Details</span> <i class="icon-menu" title="Users"></i></li>-->
								<li>
									<a href="#"><i class="icon-cog52"></i> <span>Settings</span></a>
									<ul>
					       <!-- user details -->
					          <li>
					              <a href="#"><!--<i class=" icon-user"></i>--> <span>User Details</span></a>
					              <ul>
					               <?php if((in_array('User Rights',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
					                  <li <?php if(($page_name=='user_rights_details_list')||($page_name=='add_user_rights_details')||($page_name=='edit_user_rights_details')){ echo 'class="active"'; }?>>
					                  <?php echo anchor('user_rights_details/user_rights_details_list', 'User Rights', ''); ?>
					                   </li>
					               <?php } //check for user rights ?>

					               <?php if((in_array('User',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
					                  <li <?php if(($page_name=='user_details_list')||($page_name=="add_user_details")||($page_name=="edit_user_details")){ echo 'class="active"'; }?>>
					                   <?php echo anchor('user_details/user_details_list', 'User'); ?>
					                   </li>
					               <?php } //check for user rights ?>
					              </ul>
					          </li>
					          <!-- /user details -->
									</ul>

								</li>
								<!-- /forms -->
								<!-- Reports -->
								<li>
									<a href="#"><i class="icon-cog52"></i> <span>Reports</span></a>
									<ul>
					       <!-- Report Details -->
					              <ul>
					               <?php if((in_array('Report',$user_typ_ary)==true)||$ses_username=="admin"){ ?>
					                  <li <?php if(($page_name=='sales_report_details')||$page_name=='search_sales_report'){ echo 'class="active"'; }?>>
					                  <?php echo anchor('reports_details/sales_report_details', 'Sales Report', ''); ?>
					                   </li>
                                         <li <?php if(($page_name=='product_report_details')||$page_name=='search_product_report'){ echo 'class="active"'; }?>>
					                  <?php echo anchor('reports_details/product_report_details', 'Product Report', ''); ?>
					                   </li>
					               <?php } //check for Report Details ?>
					              </ul>
					          <!-- Report details -->
									</ul>
								</li>
								<!-- /forms -->



							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
