
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="assets/images/favicon_1.ico">

    <title>CBT Admin - Set Questions</title>

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
                                    <a href="settings.php" class="btn btn-default waves-effect waves-light">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></a>
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
                  <form method="post" id="questionForm">
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
                    <div class="col-md-12">&nbsp;</div>
                    <div class="questions">
                      <div id="que1">
                        <div class="col-md-12">
                          <div><textarea id="elm1" name="area" class="mceEditor"></textarea></div>
                          <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-6">
                              <label>Option A</label>
                              <textarea class="form-control" id="opta" name="opta" placeholder="Option A"></textarea>
                            </div>
                            <div class="col-md-6">
                              <label>Option B</label>
                              <textarea class="form-control" id="optb" name="optb" placeholder="Option B"></textarea>
                            </div>
                            <div class="col-md-6">
                              <label>Option C</label>
                              <textarea class="form-control" id="optc" name="optc" placeholder="Option C"></textarea>
                            </div>
                            <div class="col-md-6">
                              <label>Option D</label>
                              <textarea class="form-control" id="optd" name="optd" placeholder="Option D"></textarea>
                            </div>
                            <!-- <div class="col-md-6">
                              <label>Option E</label>
                              <textarea class="form-control" id="opte" name="opte" placeholder="Option E"></textarea>
                            </div> -->
                            <div class="col-md-6 hidden">
                              <textarea class="form-control" name="answer" id="answer"></textarea>
                            </div>
                            <div class="col-md-6">
                              <!-- <br> -->
                              <label>Answer</label>
                              <select class="form-control" id="ans">
                                <option value="">Select the correct option</option>
                                <option value="opta">Option A</option>
                                <option value="optb">Option B</option>
                                <option value="optc">Option C</option>
                                <option value="optd">Option D</option>
                                <option value="opte">Option E</option>
                              </select>
                            </div>
                            <!-- <div class="col-md-12">&nbsp;</div> -->
                            <div class="col-md-6">
                              <label>Add an Image (Enter image name and extension only)</label>
                              <input type="text" class="form-control" id="imgName" placeholder="e.g. mth101settheory.jpg" name="img">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">&nbsp;</div>
                    <div class="col-md-6">
                      <button class="btn btn-md btn-primary" id="saveBtn">Save Question</button>
                      <div class="btn btn-md btn-primary ret" style="cursor: not-allowed; display: none;">Done <i class="fa fa-check"></i></div>
                    </div>
                  </div>
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

        <!--form validation init-->
        <script src="assets/plugins/tinymce/tinymce.min.js"></script>
        
        <script type="text/javascript">
          //.mce-textbox
          $(document).ready(function () {

            /*tinymce.init({
        selector: "#elm1",
        contextmenu: false,
        plugins: "textcolor link",
        font_formats: "Sans Serif = arial, helvetica, sans-serif;Serif = times new roman, serif;Fixed Width = monospace;Wide = arial black, sans-serif;Narrow = arial narrow, sans-serif;Comic Sans MS = comic sans ms, sans-serif;Garamond = garamond, serif;Georgia = georgia, serif;Tahoma = tahoma, sans-serif;Trebuchet MS = trebuchet ms, sans-serif;Verdana = verdana, sans-serif",
        toolbar: "fontselect | fontsizeselect | bold italic underline | forecolor | numlist bullist | alignleft aligncenter alignright alignjustify | outdent indent | link unlink | undo redo"
    });

    $('#btn1').click(function() {
        console.log(tinyMCE.activeEditor.getContent());
    });
    
    $('#btn2').click(function() {
        console.log(tinyMCE.editors[$('#ta').attr('id')].getContent());
    });
    
    $('#btn3').click(function() {
        alert('You should really NOT use this option');
        console.log($('#ta_ifr')[0].contentDocument.body.innerHTML);
    });*/

          if($("#elm1").length > 0){
              tinymce.init({
                  selector: "textarea#elm1",
                  theme: "modern",
                  height:300,
                  plugins: [
                      "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                      "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                      "save table contextmenu directionality emoticons template paste textcolor"
                  ],
                  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
                  style_formats: [
                      {title: 'Bold text', inline: 'b'},
                      {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                      {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                      {title: 'Example 1', inline: 'span', classes: 'example1'},
                      {title: 'Example 2', inline: 'span', classes: 'example2'},
                      {title: 'Table styles'},
                      {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                  ]
              });    
          }  
          // alert(312) ;
          /*$("body").click(function(){
var content =  tinyMCE.activeEditor.getContent();
            console.log(content) ;
          }) ;*/
            
      });
        </script>

        <script type="text/javascript" src="js/custom.js?v=I_give_myself_awa"></script>

  
  </body>
</html>