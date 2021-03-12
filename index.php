<?php
//require_once("library/dbconnect.php") ;
// require_once("_actionmanager.php") ;


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="./assets/images/favicon_1.ico">

        <title>UBC - Computer Based Test</title>
        
        <link href="./assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
        <link href="./assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="./assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="./assets/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
        <link href="./assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <!--Form Wizard-->
        <link rel="stylesheet" type="text/css" href="./assets/plugins/jquery.steps/css/jquery.steps.css" />

        <link href="./assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="./assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="./assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="./assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="./assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="./assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="./assets/js/modernizr.min.js"></script>


    </head>


    <body class="fixed-left" oncontextmenu="return false">

        <!-- Begin page -->
        <!-- Top Bar Start -->
    
    
  <?php include_once("inc_header.php") ; ?>




            <!-- Top Bar End -->

            <!--Side Bar Begins-->
    <div id="wrapper">
        <div class="container"><div class="clearfix" style="margin-top: 70px ;"></div>
            



                        <!-- Wizard with Validation -->
                        
                        <div class="row">
                            <div class="col-sm-12 col-lg-3" style="*border:2px solid red ;">
                                <div class="card-box">
                                    <p style="text-align: justify-all !important;">
                                        <p class="text-info"><b style="font-weight: bolder;" class="h4">Please read the Instructions Below Before You Start.</b></p>
<span class="text-info h5" style="font-weight: bold;line-height: 22px;text-align: justify-all !important;">Enter Your Full Name And Matric Number, the given exam code and select which course you are to take, then Press The Button "Continue" To Start. 
If you wish to go back to the previously answered questions, press the button "Previous" which is located on each page of your question.
You can move to the next question by clicking on the button "Next" located on each page of your question.
You can submit your answer anytime you wish to by pressing the button "Finish" located on each page of your questions.
Make sure you logout after you finish the test else your results will not be saved.
When the time is up, The test submits itself then you can logout. Adhere strictly to the above rules and regulation concerning this exam. 
For any further complain, seek any of the tutor available for assistance. 
Your result will be immediately displayed after submitting your anwers.
<em>NB: YOUR TEST TIME IS DISPLAYED AT THE RIGHT HAND SIDE OF YOUR QUESTION, NOT AT THE TOP RIGHT CONNER.</em>
Attempt all questions. 
BEST OF GOD.</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-7">
                                <div class="card-box">
                                    <!-- <h4 class="m-t-0 header-title"><b>Application form</b></h4> -->
                                    
                                    <form id="wizard-validation-form-index" action="./php/actionmanager.php" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                        	<!-- <h3 class="text-center h2 btn btn-">Sign In</h3> -->
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label>Please enter your name</label>
                                                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter your name here" required="required">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Please enter your matric number</label>
                                                    <input type="text" name="matricNo" id="matricNo" class="form-control" placeholder="Enter your Matric Number here" required="required">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label>Please enter code</label>
                                                    <input type="text" value="cbt1" name="examCode" id="examCode" class="form-control" placeholder="Enter exam code here" required="required">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Select a course</label>
                                                    <select name="course" class="form-control" id="course" required="required">
                                                        <option value="0">Select a course</option>
                                                        <optgroup label="First Semester Courses" disabled hidden="">
                                                            <option disabled=""></option>
                                                            <option value="mth101">MTH101</option>
                                                            <option value="gns101">GNS101</option>
                                                            <option value="faa101">FAA101</option>
                                                            <option value="chm101">CHM101</option>
                                                            <option value="phy101">PHY101</option>
                                                            <option value="bio101">BIO101</option>
                                                            <option value="lib101">LIB101</option>
                                                            <option disabled=""></option>
                                                        </optgroup>
                                                        <optgroup label="Second Semester Courses">
                                                            <option disabled=""></option>
                                                            <option value="mth102">MTH102</option>
                                                            <option value="gns102">GNS102</option>
                                                            <option value="chm102">CHM102</option>
                                                            <option value="phy102">PHY102</option>
                                                            <option value="bio102">BIO102</option>
                                                            <option disabled=""></option>
                                                        </optgroup>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class=" col-md-offset-3 col-md-6 text-center">
                                                <div class="alert alert-danger" id="retDiv" style="display: none;"></div>
                                                <br><button class="btn btn-info" id="cont" type="submit">Continue</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6 col-md-offset-3 hidden">
                                <!-- <iframe src="clock-master/index.html" width="100%" style="height: inherit;"></iframe> -->
                                <?php include_once("./clock-master/index.html") ; ?>
                            </div>
                        </div>

                       <!-- Footer -->
            <!-- End Footer -->
        
        </div><!--End of container-->
    </div><!--End of wrapper-->

            <?php include_once("./inc_footer.php") ; ?>
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="./assets/js/jquery.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
        <script src="./assets/js/detect.js"></script>
        <script src="./assets/js/fastclick.js"></script>
        <script type="text/javascript" src="js/datebdate.js"></script>


        <script src="./assets/js/jquery.slimscroll.js"></script>
        <script src="./assets/js/jquery.blockUI.js"></script>
        <script src="./assets/js/waves.js"></script>
        <script src="./assets/js/wow.min.js"></script>
        <script src="./assets/js/jquery.nicescroll.js"></script>
        <script src="./assets/js/jquery.scrollTo.min.js"></script>

        <script src="./assets/plugins/peity/jquery.peity.min.js"></script>

        <!-- jQuery  -->
        <script src="./assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="./assets/plugins/counterup/jquery.counterup.min.js"></script>

        <!--Form Wizard-->
        <script type="text/javascript" src="./assets/plugins/jquery-validation/js/jquery.validate.min.js"></script>

        <script src="./assets/pages/jquery.form-pickers.init.js"></script>



        <script src="./assets/js/jquery.core.js"></script>
        <script src="./assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

            });
        </script>

        <script type="text/javascript" src="./js/jquery-3.2.1.min.js?v=1.sg10"></script>
        <script type="text/javascript" src="./js/pagination.js?v=<?php rand(1000, 10000) ?>"></script>

        <!-- <script type="text/javascript" src="js/tweaks.js?gdfgh"></script> -->



</script>  

    </body>
</html>