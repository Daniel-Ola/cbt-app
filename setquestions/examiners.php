
		
		<?php 
			include_once("adminheader.php") ;
		?>
       
		<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark">Examiners</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="index.html">Dashboard</a></li>
							<li><a href="#"><span>Examiners</span></a></li>
							<li class="active"><span>Add and view examiners</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title  content goes right after this-->
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-6 col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Examiners</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<p class="text-muted">Control activities about examiners</p>
									<div  class="tab-struct custom-tab-2 mt-40">
										<ul role="tablist" class="nav nav-tabs" id="myTabs_15">
											<li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_15" href="#home_15">active</a></li>
											<li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_15" role="tab" href="#profile_15" aria-expanded="false">inactive</a></li>
											<li class="dropdown" role="presentation">
												<a data-toggle="dropdown" class="dropdown-toggle" id="myTabDrop_15" href="#" aria-expanded="false">Dropdown <span class="caret"></span></a>
												<ul id="myTabDrop_15_contents"  class="dropdown-menu">
													<li class=""><a data-toggle="tab" id="dropdown_29_tab" role="tab" href="#dropdown_29" aria-expanded="true">@fat</a></li>
													<li class=""><a data-toggle="tab" id="dropdown_30_tab" role="tab" href="#dropdown_30" aria-expanded="false">@mdo</a></li>
												</ul>
											</li>
										</ul>
										<div class="tab-content" id="myTabContent_15">
										
										
				<!-- return modal -->
				<!-- The Modal -->
				<div id="retModal" class="retModal">

				  <!-- Modal content -->
				  <div class="retModal-content">
					<div class="retModalheading"><h5><span id="retModaltitle">something</span> <span class="close">x</span></h5></div>
					<hr />
					<p id="retModaltext"></p>
				  </div>

				</div>
										
										<!-- SECTION TO ADD EXAMINERS -->
											<div  id="home_15" class="tab-pane fade active in" role="tabpanel">
					
					<!-- Row -->
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form id="addexaminer" method="post">
												<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>Add examiner and subject</h6>
												<hr class="light-grey-hr"/>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Examiner's Name</label>
															<input type="text" id="fullname" name="fullname" class="form-control" placeholder="Examiner's full name">
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Email</label>
															<div class="input-group">
																<div class="input-group-addon"><i class="ti-email"></i></div>
																<input type="text" class="form-control" id="exampleInputuname" name="contact" placeholder="examinermail@anymail.com">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="form-actions row">
													<div class="col-sm-6">
														<button type="button" id="addexaminerbtn" onclick="addexaminer()" class="btn btn-success btn-icon left-icon mr-10 pull-left"> <i class="fa fa-check"></i> <span>save</span></button>
														<button type="button" class="btn btn-success btn-icon left-icon mr-10 pull-left loadingbtn"> <div class="loader"></div> </button>
														<button type="reset" class="btn btn-warning btn-icon left-icon mr-10 pull-left"> <i class="fa fa-mail-reply-all"></i> <span>reset</span></button>
														<div class="clearfix"></div>
													</div>
													<div id="reply" class="col-sm-6"></div>
												</div>
											</form>
												<div class="seprator-block"></div>
											<form action="../handler/actionmanager" method="post">
												<h6 class="txt-dark capitalize-font">Add new subject</h6>
												<hr class="light-grey-hr"/>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">class</label>
															<select class="form-control" data-placeholder="Choose a Class" tabindex="1">
																<option value="1" name="JSS1">Category 1</option>
																<option value="2" name="JSS2">Category 2</option>
																<option value="3" name="JSS3">Category 5</option>
																<option value="4" name="SSS1">Category 4</option>
																<option value="5" name="SSS2">Category 4</option>
																<option value="6" name="SSS3">Category 4</option>
															</select>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Subject</label>
															<input type="text" class="form-control">
														</div>
													</div>
												</div>
												<div class="form-actions">
													<button class="btn btn-success btn-icon left-icon mr-10 pull-left"> <i class="fa fa-check"></i> <span>save</span></button>
													<button type="button" class="btn btn-warning pull-left">Cancel</button>
													<div class="clearfix"></div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->
											</div>
											
											
											<!-- SECTION TO VIEW AND DELETE EXAMINERS -->
											<div  id="profile_15" class="tab-pane fade" role="tabpanel">
												<p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->
				
				
				<?php include_once("adminfooter.php") ; ?>
				
			</div>
		</div>
        <!-- /Main Content -->

    </div> <!-- opening tag in adminheader.php -->
    <!-- /#wrapper -->
	
	
	
</body>

</html>
