
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
		<meta name="author" content="Coderthemes">

		<link rel="shortcut icon" href="assets/images/favicon_1.ico">

		<title>CBT</title>

		<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>

	</head>

	<body class="fixed-left">

		<!-- Begin page -->
		<div id="wrapper">

            <!-- Top Bar Start -->
            <?php include_once("header.php") ; ?>
			<!-- Left Sidebar End -->

			<!-- ============================================================== -->
			<!-- Start right Content here -->
			<!-- ============================================================== -->
			<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="container">

						<!-- Page-Title -->
						<div class="row">
							<div class="col-sm-12">
                                

								<h4 class="page-title">Welcome User</h4>
								<ol class="breadcrumb">
									<li>
										<a href="#">Admin</a>
									</li>
									<li class="active">Set Questions
									</li>
								</ol>
							</div>
						</div>

                        <div class="row">
                            <div class="card-box col-md-8 col-md-offset-2">
                                <h3 class="h4">Exam Settings</h3>
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2 ">
                                        <div class="portlet">
                                        <div class="portlet-heading bg-custom">
                                            <h3 class="portlet-title text-danger">Set exam codes</h3>
                                            <div class="portlet-widgets">
                                                <!-- <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                                <span class="divider"></span> -->
                                                <a data-toggle="collapse" data-parent="#accordion1" href="#bg-success"><i class="ion-minus-round"></i></a>
                                                <!-- <span class="divider"></span>
                                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a> -->
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div id="bg-success" class="panel-collapse collapse in">
                                            <div class="portlet-body">
                                                <div class="form-group">
                                                    <label for="xamCode">Exam Code</label>
                                                    <input type="text" id="xamCode" placeholder="code40" class="form-control" name="">
                                                    <span class="help-block text-danger" id="codeInUse" style="display: none;">This code is in use</span>
                                                    <span class="help-block text-success" id="available" style="display: none;">Good to go <i class="fa fa-check"></i></span>
                                                    <span class="help-block text-info" id="required" style="display: none;">This field is required</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Set Exam Type</label>
                                                    <select name="test" class="form-control" id="test" required="required">
                                                        <option value="0">Select a type of test</option>
                                                        <option disabled="disabled"></option>
                                                        <option value="test">Pre-Test</option>
                                                        <option value="exam">Pre-Exam</option> 
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Set Time</label>
                                                    <input type="text" id="xamTime" placeholder="Set time in minutes e.g 40" value="" name="demo3">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Total Questions</label>
                                                    <input type="text" id="xamQues" placeholder="40" value="" name="demo3">
                                                </div>
                                            </div>
                                            <div class="panel-footer">
                                                <p class="btn btn-default" id="saveCode">Save</p><p class="text-info" id="retSave"></p>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-box col-md-8 col-md-offset-2">
                                <h3 class="h4">Change Password</h3>
                                <div class="row">
                                    
                                </div>
                            </div>
                        </div>

                       


                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer">
                    © 2016. All rights reserved.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->



        </div>
        <!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>

        <script type="text/javascript" src="assets/pages/jquery.form-advanced.init.js"></script>


        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript" src="js/custom.js?fwfewf"></script>
	
	</body>
</html>