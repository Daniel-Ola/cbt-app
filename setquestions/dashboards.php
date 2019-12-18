<?php
session_start() ;
require_once("../handler/dbconnect.php") ;
//require_once("../handler/actionmanager.php") ;
require_once("../handler/dbfunctions.php") ;
$dataRead = new DataRead() ;
$connect = dbconnect() ;

if(!isset($_SESSION['user_id']) || !isset($_SESSION['access_id']))
{	
	header("location:login.php") ;
}
else if(isset($_SESSION['user_id']) && isset($_SESSION['access_id'])) {
	$user_id = $_SESSION['user_id'] ;
	$access_id = $_SESSION['access_id'] ;
}

/*if($access_id == 1)
{
	header("location:adminpage.php") ;
}
*/
$get_userdetails = $dataRead->get_userdetails($connect , $user_id) ;
if($get_userdetails)
{
	while($fetch = mysqli_fetch_assoc($get_userdetails))
	{
		$name = $fetch['user_name'] ;
		$contact = $fetch['contact'] ;
	}
}
$get_subjects = $dataRead->get_subjects($connect) ;


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title><?php echo "Welcome Tutor ".$name." - UBC CBT"; ?></title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="assets/plugins/morris/morris.css">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body>


        <!-- Navigation Bar-->
        <?php include("header.php") ; ?>
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-group pull-right m-t-15">
                            <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                        <p class="text-muted page-title-alt">Welcome to UBC CBT admin panel</p>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="widget-bg-color-icon card-box fadeInDown animated">
                            <!-- <div class="bg-icon bg-icon-info pull-left">
                                <i class="md md-attach-money text-info"></i>
                            </div> -->
                            <div class="text-right">
                                <h3 class="text-dark"><b class="">General Mathematics</b></h3>
                                <p class="text-muted">Course Title</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="widget-bg-color-icon card-box">
                            <!-- <div class="bg-icon bg-icon-pink pull-left">
                                <i class="md md-add-shopping-cart text-pink"></i>
                            </div> -->
                            <div class="text-right">
                                <h3 class="text-dark"><b class="">MTH101</b></h3>
                                <p class="text-muted">Course Code</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="widget-bg-color-icon card-box">
                            <div class="bg-icon bg-icon-purple pull-left">
                                <i class="md md-equalizer text-purple"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b class="counter">0.16</b></h3>
                                <p class="text-muted">Total Questions</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="widget-bg-color-icon card-box">
                            <div class="bg-icon bg-icon-success pull-left">
                                <i class="md md-remove-red-eye text-success"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b class="counter">64,570</b></h3>
                                <p class="text-muted">Today's Visits</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-4">
                        <div class="card-box">
                            <h4 class="text-dark header-title m-t-0 m-b-30">Total Revenue</h4>

                            <div class="widget-chart text-center">
                                <input class="knob" data-width="150" data-height="150" data-linecap=round data-fgColor="#fb6d9d" value="80" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15"/>
                                <h5 class="text-muted m-t-20">Total sales made today</h5>
                                <h2 class="font-600">$75</h2>
                                <ul class="list-inline m-t-15">
                                    <li>
                                        <h5 class="text-muted m-t-20">Target</h5>
                                        <h4 class="m-b-0">$1000</h4>
                                    </li>
                                    <li>
                                        <h5 class="text-muted m-t-20">Last week</h5>
                                        <h4 class="m-b-0">$523</h4>
                                    </li>
                                    <li>
                                        <h5 class="text-muted m-t-20">Last Month</h5>
                                        <h4 class="m-b-0">$965</h4>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-8">
                        <div class="card-box">
                            <h4 class="text-dark header-title m-t-0">Sales Analytics</h4>
                            <div class="text-center">
                                <ul class="list-inline chart-detail-list">
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5" style="color: #5fbeaa;"></i>Desktops</h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5" style="color: #5d9cec;"></i>Tablets</h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5" style="color: #dcdcdc;"></i>Mobiles</h5>
                                    </li>
                                </ul>
                            </div>
                            <div id="morris-bar-stacked" style="height: 303px;"></div>
                        </div>
                    </div>



                </div>
                <!-- end row -->


                <div class="row">

                    <div class="col-lg-6">
                        <div class="card-box">
                            <h4 class="text-dark header-title m-t-0">Total Sales</h4>

                            <div class="text-center">
                                <ul class="list-inline chart-detail-list">
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5" style="color: #5fbeaa;"></i>Desktops</h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5" style="color: #5d9cec;"></i>Tablets</h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5" style="color: #ebeff2;"></i>Mobiles</h5>
                                    </li>
                                </ul>
                            </div>

                            <div id="morris-area-with-dotted" style="height: 300px;"></div>

                        </div>

                    </div>

                    <!-- col -->

                    <div class="col-lg-6">
                        <div class="card-box">
                            <a href="#" class="pull-right btn btn-default btn-sm waves-effect waves-light">View All</a>
                            <h4 class="text-dark header-title m-t-0">Recent Orders</h4>
                            <p class="text-muted m-b-30 font-13">
                                Use the button classes on an element.
                            </p>

                            <div class="table-responsive">
                                <table class="table table-actions-bar m-b-0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Item Name</th>
                                            <th>Up-Down</th>
                                            <th style="min-width: 80px;">Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span data-plugin="peity-bar" data-colors="#5fbeaa,#5fbeaa" data-width="80" data-height="30">5,3,9,6,5,9,7,3,5,2</span></td>
                                            <td><img src="assets/images/products/iphone.jpg" class="thumb-sm pull-left m-r-10" alt=""> Apple iPhone </td>
                                            <td><span class="text-custom">+$230</span></td>
                                            <td>
                                                <a href="#" class="table-action-btn"><i class="md md-edit"></i></a>
                                                <a href="#" class="table-action-btn"><i class="md md-close"></i></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><span data-plugin="peity-line" data-fill="#5fbeaa" data-stroke="#5fbeaa" data-width="80" data-height="30">0,-3,-6,-4,-5,-4,-7,-3,-5,-2</span></td>
                                            <td><img src="assets/images/products/samsung.jpg" class="thumb-sm pull-left m-r-10" alt=""> Samsung Phone </td>
                                            <td><span class="text-danger">-$154</span></td>
                                            <td>
                                                <a href="#" class="table-action-btn"><i class="md md-edit"></i></a>
                                                <a href="#" class="table-action-btn"><i class="md md-close"></i></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><span data-plugin="peity-line" data-fill="#fff" data-stroke="#5fbeaa" data-width="80" data-height="30">5,3,9,6,5,9,7,3,5,2</span>
                                            <td><img src="assets/images/products/imac.jpg" class="thumb-sm pull-left m-r-10" alt=""> Apple iPhone </td>
                                            <td><span class="text-custom">+$1850</span></td>
                                            <td>
                                                <a href="#" class="table-action-btn"><i class="md md-edit"></i></a>
                                                <a href="#" class="table-action-btn"><i class="md md-close"></i></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><span data-plugin="peity-pie" data-colors="#5fbeaa,#ebeff2" data-width="30" data-height="30">1/5</span></td>
                                            <td><img src="assets/images/products/macbook.jpg" class="thumb-sm pull-left m-r-10" alt=""> Apple iPhone </td>
                                            <td><span class="text-danger">-$560</span></td>
                                            <td>
                                                <a href="#" class="table-action-btn"><i class="md md-edit"></i></a>
                                                <a href="#" class="table-action-btn"><i class="md md-close"></i></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><span data-plugin="peity-bar" data-colors="#5fbeaa,#ebeff2" data-width="80" data-height="30">5,3,9,6,5,9,7,3,5,2</span></td>
                                            <td><img src="assets/images/products/lumia.jpg" class="thumb-sm pull-left m-r-10" alt=""> Lumia iPhone </td>
                                            <td><span class="text-custom">+$230</span></td>
                                            <td>
                                                <a href="#" class="table-action-btn"><i class="md md-edit"></i></a>
                                                <a href="#" class="table-action-btn"><i class="md md-close"></i></a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->


                <!-- Footer -->
                <?php include("footer.php") ; ?>
                <!-- End Footer -->

            </div>
        </div>



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

        <script src="assets/plugins/peity/jquery.peity.min.js"></script>

        <!-- jQuery  -->
        <script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>

        <script src="assets/plugins/morris/morris.min.js"></script>
        <script src="assets/plugins/raphael/raphael-min.js"></script>

        <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>

        <script src="assets/pages/jquery.dashboard.js"></script>

        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

            });
        </script>


    </body>
</html>