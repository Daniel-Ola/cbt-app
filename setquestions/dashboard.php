
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="assets/images/favicon_1.ico">

    <title>CBT Admin - Set Questions</title>

<!-- Ladda buttons css -->
        <link href="assets/plugins/ladda-buttons/css/ladda-themeless.min.css" rel="stylesheet" type="text/css" />

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
              
              <div class="btn-group pull-right m-t-15">
                                    <a href="editor.php" class="btn btn-default waves-effect waves-light">Use another Editor <span class="m-l-5"><i class="fa fa-pencil"></i></span></a>
                                </div>
                               

                <h4 class="page-title">Welcome <?php echo $username; ?></h4>
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

              <div class="col-md-12">
                <div class="card-box">
                  <form method="post" id="submitQue" action="../php/actionmanager.php">
                    <!-- <input type="number" value="1" id="user_id" name="user_id">  -->
                    <div class="row">
                      <div class="col-md-4">
                        <label>Select a course</label>
                        <select name="course" class="form-control" id="course" required="required">
                            <option value="0">Select a course</option>
                            <optgroup label="First Semester Courses">
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
                                <option value="faa102">FAA102</option>
                                <option value="chm102">CHM102</option>
                                <option value="phy102">PHY102</option>
                                <option value="bio102">BIO102</option>
                                <option value="lib102">LIB102</option>
                                <option disabled=""></option>
                            </optgroup>
                            
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label>Select a type of test</label>
                        <select name="test" class="form-control" id="test" required="required">
                            <option value="0">Select a type of test</option>
                            <option disabled="disabled"></option>
                            <option value="test">Pre-Test</option>
                            <option value="exam">Pre-Exam</option> 
                        </select>
                      </div>
                      <div class="col-md-8">&nbsp;</div>
                      <div class="col-md-12"><br>
                        <textarea id="questions" name="questions" class="form-control" rows="12"></textarea><br>
                        <button type="button" class="btn btn-primary btn-md" name="saveQue" id="saveQue">Save</button>
                      </div>
                    </div>
                    <p> </p><div class="row">
                    <div class="progress active progress-lg" style="display: none;">
                      <div class="progress-bar progress-bar-primary progress-bar-striped" id="myProgressBar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"><span class="display_percent">0% Complete</span>
                      </div>
                    </div>
                    <div class="col-md-6 col-md-offset-3 text-center" id="returnLeg">0 Questions processed</div></div>
                    <p>&nbsp;</p>

                  </form>
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


        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript" src="js/custom.js?dkjsfsdk"></script>


  
  </body>
</html>