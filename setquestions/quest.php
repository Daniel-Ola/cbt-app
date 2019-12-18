
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

                            <!-- <div class="col-sm-7">
                                <a href="#" id="inline-comments" data-type="textarea" data-pk="1" data-placeholder="Your comments here..." data-title="Enter comments" class="editable editable-pre-wrapped editable-click editable-open" style="display: none;">awesome user!</a><span class="editable-container editable-inline"><div><div class="editableform-loading" style="display: none;"></div><form class="form-inline editableform" style=""><div class="control-group form-group"><div><div class="editable-input"><textarea class="form-control input-large" placeholder="Your comments here..." rows="7"></textarea></div><div class="editable-buttons editable-buttons-bottom"><button type="submit" class="btn btn-primary editable-submit btn-sm waves-effect waves-light"><i class="md md-done"></i></button><button type="button" class="btn btn-white editable-cancel btn-sm waves-effect"><i class="md md-clear"></i></button></div></div><div class="editable-error-block help-block" style="display: none;"></div></div></form></div></span>
                            </div> -->
                            
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box">
                                            <h4 class="m-t-0 header-title"><b>MTH 101 Questions</b></h4>
                                            <p class="text-muted font-13">
                                                Double click to edit.
                                            </p>

                                            <div>
                                                <ol>
                                                <?php 
                                                    $query = mysqli_query($connect , "SELECT * FROM phy101 ") ;
                                                    if($query)
                                                    {
                                                        while($fetch = mysqli_fetch_assoc($query))
                                                        {
                                                            echo "<li>".$fetch['question']." <br>Answer is ".$fetch['answer']."</li>" ;
                                                        }
                                                    }
                                                ?>
                                            </ol>
                                            </div>
                                            
                                            <table class="hidden" data-toggle="table"
                                                   data-show-columns="false"
                                                   data-page-list="[5, 10, 20]"
                                                   data-page-size="5"
                                                   data-pagination="true" data-show-pagination-switch="true" class="table-bordered ">
                                                <thead>
                                                    <tr>
                                                        <th data-field="id" data-switchable="false">First Name</th>
                                                        <th data-field="name">Last Name</th>
                                                        <th data-field="date">Job Title</th>
                                                        <th data-field="amount">DOB</th>
                                                        <th data-field="user-status" class="text-center">Status</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <label class="col-sm-5 control-label"></i></label>
                                                                <div class="col-sm-7">
                                                                    <a href="#" id="inline-comments" data-type="textarea" data-pk="1" data-placeholder="Your comments here..." data-title="Enter comments">awesome user!</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>Boudreaux</td>
                                                        <td>Traffic Court Referee</td>
                                                        <td>22 Jun 1972</td>
                                                        <td><span class="label label-table label-success">Active</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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

        <script src="assets/plugins/bootstrap-table/js/bootstrap-table.min.js"></script>

        <script src="assets/pages/jquery.bs-table.js"></script>


        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>


        <!-- XEditable Plugin -->
        <script src="assets/plugins/moment/moment.js"></script>
        <script type="text/javascript" src="assets/plugins/x-editable/js/bootstrap-editable.min.js"></script>
        <script type="text/javascript" src="assets/pages/jquery.xeditable.js"></script>

        <script>
            $(document).ready(function(){
                $(".fixed-table-loading").hide() ;
                $("button[name='paginationSwitch']").hide() ;
            }) ;
        </script>


	
	</body>
</html>