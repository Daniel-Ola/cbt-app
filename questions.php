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

        <link rel="shortcut icon" href="http://ore-oluwadaniel/ubc/assets/images/favicon_1.ico">

        <title>UBC CBT</title>
        
        <link href="http://ore-oluwadaniel/ubc/assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
        <link href="http://ore-oluwadaniel/ubc/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="http://ore-oluwadaniel/ubc/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="http://ore-oluwadaniel/ubc/assets/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
        <link href="http://ore-oluwadaniel/ubc/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <!--Form Wizard-->
        <link rel="stylesheet" type="text/css" href="http://ore-oluwadaniel/ubc/assets/plugins/jquery.steps/css/jquery.steps.css" />

        <link href="http://ore-oluwadaniel/ubc/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="http://ore-oluwadaniel/ubc/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="http://ore-oluwadaniel/ubc/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="http://ore-oluwadaniel/ubc/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="http://ore-oluwadaniel/ubc/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="http://ore-oluwadaniel/ubc/assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="http://ore-oluwadaniel/ubc/css/style.css">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="http://ore-oluwadaniel/ubc/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="http://ore-oluwadaniel/ubc/https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="http://ore-oluwadaniel/ubc/assets/js/modernizr.min.js"></script>


    </head>


    <body class="fixed-left" oncontextmenu="return false" onload="getTIming()">

        <!-- Begin page -->
        <!-- Top Bar Start -->
    
    
  <?php include_once("inc_header.php") ; ?>




            <!-- Top Bar End -->

            <!--Side Bar Begins-->
    <div id="wrapper">
        <div class="container"><div class="clearfix" style="margin-top: 70px ;"></div>
            

<input type="" id="user_id" class="hidden" name="" value="<?php echo $userDet['user_id'] ; ?>">
<input type="" id="set_time" class="hidden" name="" value="<?php echo $examCode['set_time'] ; ?>">

                        <!-- Wizard with Validation -->
                        
                        <div class="row">
                                <center><h3><u><i id="whichCourse"><?php echo strtoupper($userDet['course']); ?></i></u></h3></center>
                            <div class="col-sm-12 col-lg-3" style="*border:2px solid red ;">
                                <div class="card-box">
                                    <input type="number" style="display: none;" id="totalPage" value="<?php echo $totalQue; ?>" name="">
                                    <ul style="list-style: none; margin:5px ;">
                                        <script type="text/javascript">
                                            for (var i = 1; i <= <?php echo $totalQue; ?>; i++) {
                                                document.writeln("<li getThis='1' class='badge badge-warning btn btn-link locateDiv' whichOne='"+i+"' id='todiv"+i+"'> &nbsp;"+i+" &nbsp;</li>") ;
                                            }
                                            
                                        </script>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-7">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title pull-right"><b><i><?php echo $userDet['username']; ?></i></b></h4>
                                    
                                    <form id="wizard-validation-form" action="php/actionmanager.php" method="post" enctype="multipart/form-data">
                                        <?php
                                        $page = 1 ;
                                        echo '<input type="number" id="page" value="'.$page.'" name="" style="display: none;">';
                                            // for ($i=1; $i < 4; $i++) {
                                        $i = 1 ;
                                            foreach ($questions as $row) {
                                                if($i == 1)
                                                {
                                                    $visibility = "" ;
                                                }
                                                else{
                                                    $visibility = 'style="display: none;"' ;
                                                }
                                                $optgrp = $row['a'].",".$row['b'].",".$row['c'].",".$row['d'] ;
                                                $optgrp_arr = explode(",", $optgrp) ;
                                                $rand_opt = array_rand($optgrp_arr , 3) ;
                                        ?>
                                        <div class="quediv" id="que_<?php echo $i ?>" <?php echo $visibility; ?>>
                                            <section>
                                            <!-- <h4>Personal information</h4> -->
                                            <div class="form-group clearfix">
                                                    <label class="col-lg-12 control-label ">Question <?php echo $i ?> out of <?php echo $totalQue; ?></label>
                                                </div>
                                                <div class="alert alert-info text-danger" style="color: white !important ; background-color: transparent; border-color: white !important ;">
                                                    <p><?php echo $row['question']; ?></p><p>&nbsp;</p>
                                                    <!-- if image -->
                                                    <?php
                                                        $img = $row['img'] ;
                                                        $len = strlen($img) ;
                                                        // if($len != 0 || $img != "0"){echo "string";}else{echo "no string";}
                                                        if($len == "0" || $img == "0")
                                                        {
                                                            echo "";
                                                        }
                                                        else{
                                                            echo $img;
                                                    ?>
                                                        <p class='btn btn-default btn-sm showImg' id='viewImg<?php echo $i ; ?>' goto='img<?php echo $i ; ?>'>View Image</p>
                                                        <a href="#" data-toggle="modal" data-target="#myModal<?php echo $i ; ?>" style="display: none;" id="img<?php echo $i ; ?>"><img class="img img-responsive img-thumbnail" src="http://ore-oluwadaniel/ubc/images/q_img/<?php echo $row['img'] ?>" alt="image for question <?php echo $i ; ?>"><caption>Click image to get a larger view</caption></a>

                                                        <!-- sample modal content -->
                                    <div id="myModal<?php echo $i ; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel">Image for question <?php echo $i ; ?></h4>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img class="img img-responsive img-thumbnail" src="http://ore-oluwadaniel/ubc/images/q_img/<?php echo $row['img'] ?>" alt="image for question <?php echo $i ; ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->


                                                    <?php
                                                        }
                                                    ?>
                                                    <!-- end of image -->
                                                    <div class="form-group hidden">
                                                        <div class="radio radio-primary">
                                                            <input checked="true" id="radio<?php echo $i ?>_not" type="radio" class="radios radio<?php echo $i ?>" name="radio<?php echo $i ?>" valu="Not Answered">
                                                            <label for="radio<?php echo $i ?>_not" id="labelradio<?php echo $i ?>_not">
                                                                Not Answered
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="radio radio-primary">
                                                            <input id="radio<?php echo $i ?>_a" type="radio" class="radios radio<?php echo $i ?>" name="radio<?php echo $i ?>" valu="<?php echo trim($optgrp_arr[$rand_opt[0]]); ?>">
                                                            <label for="radio<?php echo $i ?>_a" id="labelradio<?php echo $i ?>_a">
                                                                <?php echo trim($optgrp_arr[$rand_opt[0]]); ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="radio radio-primary">
                                                            <input id="radio<?php echo $i ?>_b" type="radio" class="radios radio<?php echo $i ?>" name="radio<?php echo $i ?>" valu="<?php echo trim($optgrp_arr[$rand_opt[1]]); ?>">
                                                            <label for="radio<?php echo $i ?>_b" id="labelradio<?php echo $i ?>_b">
                                                                <?php echo trim($optgrp_arr[$rand_opt[1]]); ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="radio radio-primary">
                                                            <input id="radio<?php echo $i ?>_c" type="radio" class="radios radio<?php echo $i ?>" name="radio<?php echo $i ?>" valu="<?php echo trim($optgrp_arr[$rand_opt[2]]); ?>">
                                                            <label for="radio<?php echo $i ?>_c" id="labelradio<?php echo $i ?>_c">
                                                                <?php echo trim($optgrp_arr[$rand_opt[2]]); ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="radio radio-primary">
                                                            <input id="radio<?php echo $i ?>_d" type="radio" class="radios radio<?php echo $i ?>" name="radio<?php echo $i ?>" valu="<?php echo trim(getRest($rand_opt , $optgrp_arr)) ; ?>">
                                                            <label for="radio<?php echo $i ?>_d" id="labelradio<?php echo $i ?>_d">
                                                                <?php
                                                                    echo trim(getRest($rand_opt , $optgrp_arr)) ;
                                                                ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group hidden">
                                                        <div class="radio radio-primary">
                                                            <input id="radio<?php echo $i ?>_ans" type="radio" class="radios radio<?php echo $i ?>_ans" name="radio<?php echo $i ?>_ans" valu="<?php echo passwordHash(trim($row['answer'])) ; ?>">
                                                            <label for="radio<?php echo $i ?>_ans" id="labelradio<?php echo $i ?>_ans">
                                                                <?php echo passwordHash(trim($row['answer'])) ; ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                        <!-- <p class="text-white" style="color: white !important ;">Your admission number will be sent to your Email if you meet the exam requirements. You'll then use this to create your portal. This is important and compulsory for you to be recognized as a full 
                                                        member of the school.<br>Thanks.</p> -->
                                                </div>
                                            </section>
                                        </div>
                                        <?php
                                        $i++ ;
                                            }
                                        ?>
                                        <div class="navBtn">
                                            <input type="button" id="prevBtn" class="btn btn-md btn-purple prevBtn" value="Previous" disabled="true" >
                                            <input type="button" id="nextBtn" class="btn btn-md btn-purple nextBtn" value="Next">
                                            <input type="button" id="finishBtn" class="btn btn-md btn-purple pull-right" name="appform" value="Finish">
                                        </div>
                                        
                                    </form>

                                   <!--  <div class="row">
                                        <div class="col-lg-6 col-lg-offset-3 col-sm-12"> -->
                                            <div class="panel panel-color panel-custom" id="testFinished" style="display: none;">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">End Exam</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div id="confirm">
                                                        <p class="text-custom">Are you sure you want to quit? You have successfully answered <span id="answered"></span> out of <?php echo $totalQue; ?> <span class="btn btn-sm btn-custom" id="yes">Yes</span> / <span class="btn btn-sm btn-danger" id="no">No</span></p>
                                                    </div>
                                                    <div id="aftConf" style="display: none;">
                                                        <p class="hidden"><?php echo $userDet['username']; ?>: <span><span id="score"></span> out of <?php echo $totalQue; ?></span></p>
                                                        <p class="hidden">percentage score: <span id="percent"></span></p>
                                                    </div>
                                                    
                                                </div>
                                                <div class="panel-footer" style="display: none;">
                                                    <a href="../logout.php">Logout</a>
                                                </div>
                                            </div>
                                        <!-- </div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-2">
                                <div class="card-box">
                                    <!-- <h4 class="m-t-0 header-title pull-right"><b>Application form</b></h4> -->
                                    <p class="text-danger h5 hidden"><b id="started"><?php echo $started ?></b></p>
                                    <p class="text-danger h5 hidden"><b id="used"><?php echo time() ?></b></p>
                                    <!-- <p class="text-danger h5"><b>Time used: 132</b></p> -->
                                    <!-- <p class="text-danger" style="font-family: 'Impact' ; font-size: 100px;"><span>10</span>:<span>00</span></p> -->
                                    <p class="text-danger h5 text-center" style="font-family: 'Impact' ; font-size: 90px;"><b><span id="min"></span>:<span id="sec"></span></b></p>
                                    <p class="text-danger text-center" style="font-size: 17px;">Time Remaining</p>
                                </div>
                            </div>
                        <!-- <div class="row"> -->
                        <!-- </div> -->
                            <div class="col-sm-12 col-lg-6 col-md-offset-3">
                                <!-- <iframe src="http://ore-oluwadaniel/ubc/clock-master/index.html" width="100%" style="height: inherit;"></iframe> -->
                                <?php include_once("clock-master/index.html") ; ?>
                            </div>
                        </div>

                        

                       <!-- Footer -->
            <!-- End Footer -->
        
        </div><!--End of container-->
    </div><!--End of wrapper-->

            <?php include_once("inc_footer.php") ; ?>
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="http://ore-oluwadaniel/ubc/assets/js/jquery.min.js"></script>
        <script src="http://ore-oluwadaniel/ubc/assets/js/bootstrap.min.js"></script>
        <script src="http://ore-oluwadaniel/ubc/assets/js/detect.js"></script>
        <script src="http://ore-oluwadaniel/ubc/assets/js/fastclick.js"></script>
        <script type="text/javascript" src="http://ore-oluwadaniel/ubc/js/datebdate.js"></script>


        <script src="http://ore-oluwadaniel/ubc/assets/js/jquery.slimscroll.js"></script>
        <script src="http://ore-oluwadaniel/ubc/assets/js/jquery.blockUI.js"></script>
        <script src="http://ore-oluwadaniel/ubc/assets/js/waves.js"></script>
        <script src="http://ore-oluwadaniel/ubc/assets/js/wow.min.js"></script>
        <script src="http://ore-oluwadaniel/ubc/assets/js/jquery.nicescroll.js"></script>
        <script src="http://ore-oluwadaniel/ubc/assets/js/jquery.scrollTo.min.js"></script>

        <script src="http://ore-oluwadaniel/ubc/assets/plugins/peity/jquery.peity.min.js"></script>

        <!-- jQuery  -->
        <script src="http://ore-oluwadaniel/ubc/assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="http://ore-oluwadaniel/ubc/assets/plugins/counterup/jquery.counterup.min.js"></script>

        <!--Form Wizard-->
        <script type="text/javascript" src="http://ore-oluwadaniel/ubc/assets/plugins/jquery-validation/js/jquery.validate.min.js"></script>

        <script src="http://ore-oluwadaniel/ubc/assets/pages/jquery.form-pickers.init.js"></script>



        <script src="http://ore-oluwadaniel/ubc/assets/js/jquery.core.js"></script>
        <script src="http://ore-oluwadaniel/ubc/assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

            });
        </script>

        <script type="text/javascript" src="http://ore-oluwadaniel/ubc/js/jquery-3.2.1.min.js?v=1.10"></script>
        <script type="text/javascript" src="http://ore-oluwadaniel/ubc/js/pagination.js?lissfd"></script>
        <script type="text/javascript" src="http://ore-oluwadaniel/ubc/js/tweaks.js?lissfd"></script>

      <!--   <script>

            // window.history.pushState(null, null, "./user-login.php") ;hide view source

// disable shortcut keys
            document.onkeydown = function(e) {
    if(e.keyCode == 123) {
     return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
     return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
     return false;
    }
    if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
     return false;
    }

    if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
     return false;
    }      
 }
        </script> -->


    </body>
</html>