<?php 
    session_start() ;
    if(isset($_SESSION['user_id']))
    {
        include_once("php/dbfunctions.php") ;
        $dataRead = new DataRead() ;
        $user_id = $_SESSION['user_id'] ;
        $examCode = $_SESSION['examCode'] ;
        $userDet = $dataRead->getUserDet($user_id) ;
        $sub = $userDet['course'] ;
        // redirect('$sub./') ;
        $limit = $examCode['no_que'] ;
        $type = $examCode['exam_type'] ;
        $questions = $dataRead->getQuestions($sub , $limit , $type) ;
        $totalQue = numQuery($questions) ;
        $started = $userDet['started'] ;
        // echo $questions ;
    }
    else
    {
        include_once("php/config.php") ;
        // $a = $_SERVER['PHP_SELF'] ;
        if($_SERVER['PHP_SELF'] == "/ubc/questions.php")
        {
            redirect("index.php") ;
        }
    }
?>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    <nav class="navbar navbar-default" style="background-color:#0F1B29 ;">
        <div class="container" style="background-color:#1A3048 ;">
            <div class="navbar-header">
                <a class="navbar-brand"  href="">
                        <div class="topbar-left">
                    <div class="text-center">
                        <div class="logo pull-right"><img src="http://ore-oluwadaniel/ubc/images/ubc_logo.png" style="width: 100px !important ; height: 100px !important ; margin-top: -70% ; margin-left: -10px ;" class="img img-responsive img-circle" />
                        <a href="index.php" class=""><span></span></a></div>
                        <!-- Image Logo here -->
                        <!--<a href="index.html" class="logo">-->
                            <!--<i class="icon-c-logo"> <img src="assets/images/logo_sm.png" height="42"/> </i>-->
                            <!--<span><img src="assets/images/logo_light.png" height="20"/></span>-->
                        <!--</a>-->
                    </div>
                </div>
                    <button type="button" class="navbar-toggle btn-primary" data-toggle="collapse" data-target="#saabe">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
            </div> <div style="width: 500px; height: 100px" class="pull-right"><?php include_once("clock-master/index.html") ; ?></div>
            <div style="*border: 2px solid red ;">
                <h3 class="m-t-10 link text-white"><span style="text-transform: uppercase;">University Baptist Church, Ogbomoso</span><br>The Academic Unit Arm<br>2019 CBT Exam</h3>
            </div>
        
           <!--  <div class="collapse navbar-collapse" id="saabe">
                <ul class="nav navbar-nav navbar">
                    <li id="homelink"><a href="index.php" class="headlink"><span class="link">University Baptist Church, Ogbomoso</span></a></li>
                    <li id="facilitylink"><a href="facilities.php" class="headlink"><span class="link">Facilities</span></a></li>
                    <li id="aboutlink"><a href="about.php" class="headlink"><span class="link">About Us</span></a></li>
                    <li id="contactlink"><a href="contact.php" class="headlink"><span class="link">Contact</span></a></li>
                    <li id="bloglink"><a href="schoolblog.php" class="headlink"><span class="link">Blog</span></a></li>
                    <li id="gallerylink"><a href="gallery.php" class="headlink"><span class="link">Hall of Fame</span></a></li>
                    <li><a href="student.portal/index.php" class="headlink waves-effect waves-light"><span class="link">Student Portal</span></a></li>
                    <li><a href="#" class="headlink"><span class="link">Admin</span></a></li>
                </ul>
            </div>  -->
           
        </div>
    </nav>



        <!-- <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script> -->
<!-- <script type="text/javascript">
    $(document).ready(function(){
        // alert("con") ;
        $(".headlink").mouseover(function(){
            $(this).addClass("hoverlink") ;
        }) ;
    }) ;
</script> -->