
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
		<meta name="author" content="Coderthemes">

		<link rel="shortcut icon" href="assets/images/favicon_1.ico">

		<title>CBT</title>

		<!-- DataTables -->
    <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>


    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/core.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/components.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>

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
                                <?php
                                        $course = $_GET['sub'] ;
                                        $lim = $_GET['lim'] ;
                                        $dataRead = new DataRead() ;
                                        $getScores = $dataRead->getScores($course , $lim) ;
                                        // echo $getScores;
                                ?>
                                <div class="row">
                                    <form>
                                    <div class="col-md-4">
                                        <select class="form-control" id="getCourse">
                                            <option value="">Select a course to display</option>
                                            <option value="all">All</option>
                                            <option value="mth101">MTH101</option>
                                            <option value="gns101">GNS101</option>
                                            <option value="bio101">BIO101</option>
                                            <option value="phy101">PHY101</option>
                                            <option value="chm101">CHM101</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" id="lim" required="required" class="form-control" name="">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" id="getScores" class="btn btn-primary">Get score sheet</button>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="gp.php" class="btn btn-info pull-right">Get grade points</a>
                                    </div>
                                    </form>
                                    <p>&nbsp;</p>
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive">
                                            <h4 class="m-t-0 header-title"><b><?php echo strtoupper($course) ; ?> Score Sheet</b></h4>
                                            <p class="text-muted font-13 m-b-30">
                                                &nbsp;
                                                <!-- The Buttons extension for DataTables provides a common set of options, API methods and
                                                styling to display buttons on a page that will interact with a DataTable. The core
                                                library provides the based framework upon which plug-ins can built. -->
                                            </p>

                                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <!-- <th>Name</th> -->
                                                    <th>Matric No</th>
                                                    <th>CHM101</th>
                                                    <th>GNS101</th>
                                                    <th>MTH101</th>
                                                    <th>PHY101</th>
                                                    <th>BIO101</th>
                                                    <th>Total</th>
                                                    <th>Mark Obtainable</th>
                                                </tr>
                                                </thead>


                                                <tbody>
                        <?php 
                            $array = array() ;
                            $query = mysqli_query($connect , "SELECT matric FROM users WHERE course = 'mth101' AND checkif = '1' ") ;
                            while($fetch = mysqli_fetch_assoc($query)){
                                array_push($array, $fetch) ;
                            }
                            $num = count($array);
                            $percArr = array() ;
                                $dataRead = new DataRead() ;
                            for ($i=0; $i < $num ; $i++) {
                                $matricNo = $array[$i]['matric'] ;
                                $getEachScores = $dataRead->getEachScores($matricNo) ;
                                $singFetch = mysqli_fetch_assoc($getEachScores) ;
                                $scoreArr = array() ;
                                echo "<tr>" ;
                                // echo "<td>".$singFetch['username']."</td>";
                                echo "<td>".$matricNo."</td>";
                                while ($fetch = mysqli_fetch_assoc($getEachScores)) {
                                    // print_r($fetch['score']) ;
                                    /*$scoreArr = $fetch['score'].' , ';
                                    echo $scoreArr;*/
                                    // $ploded = explode(" , ", $scoreArr) ;
                                    $opt = $fetch['answers'] ;
                                    $tot = count(explode('+=+,_', $opt))-1 ;
                                    array_push($scoreArr, over30($fetch['score'] , $tot)) ;
                                    $score = over30($fetch['score'] , $tot) ;
                                    // echo "<td>".$score."</td>";
                                    // echo "<td>".$score."</td>";
                                }
                                $singTot = count(explode('+=+,_', $singFetch['answers']))-1 ;
                                array_push($scoreArr, over30($singFetch['score'] , $singTot)) ;
                                foreach ($scoreArr as $row) {
                                    echo "<td>".$row."</td>";
                                }
                                /*print_r($scoreArr) ;
                                echo "<td>".over30($singFetch['score'] , $singTot)."</td>";*/
                                echo "<td>".array_sum($scoreArr)."</td>";
                                echo "<td>150</td>";
                                echo "</tr>";
                            }
                        ?>
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

<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>

<script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables/buttons.bootstrap.min.js"></script>
<script src="assets/plugins/datatables/jszip.min.js"></script>
<script src="assets/plugins/datatables/pdfmake.min.js"></script>
<script src="assets/plugins/datatables/vfs_fonts.js"></script>
<script src="assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables/buttons.print.min.js"></script>
<script src="assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
<script src="assets/plugins/datatables/dataTables.keyTable.min.js"></script>
<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>
<script src="assets/plugins/datatables/dataTables.scroller.min.js"></script>
<script src="assets/plugins/datatables/dataTables.colVis.js"></script>
<script src="assets/plugins/datatables/dataTables.fixedColumns.min.js"></script>

<script src="assets/pages/datatables.init.js"></script>


<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>


<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({keys: true});
        $('#datatable-responsive').DataTable();
        $('#datatable-colvid').DataTable({
            "dom": 'C<"clear">lfrtip',
            "colVis": {
                "buttonText": "Change columns"
            }
        });
        $('#datatable-scroller').DataTable({
            ajax: "assets/plugins/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });
        var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
        var table = $('#datatable-fixed-col').DataTable({
            scrollY: "300px",
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            fixedColumns: {
                leftColumns: 1,
                rightColumns: 1
            }
        });
    });
    TableManageButtons.init();
</script>

<script type="text/javascript" src="js/custom.js"></script>

	
	</body>
</html>