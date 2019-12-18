<?php
//session_start() ;     not sure if it should be here
require_once("dbconnect.php") ;
require_once("dbfunctions.php") ;
$connect = dbconnect() ;
$actionmanager = new Actionmanager ;
$dataRead = new DataRead ;
$dataWrite = new DataWrite ;

if(isset($_POST['command']) && $_POST['command'] == 'select_class')
{
	$actionmanager->getall_students() ;
}
elseif(isset($_POST['command']) && $_POST['command'] == 'change_event')
{
	$actionmanager->change_event() ;
}


//begin of actionmanager class
class Actionmanager
{
	function getall_students()
	{
		$connect = dbconnect() ;
		$dataRead = new DataRead ;
		$dataWrite = new DataWrite ;
		
		$class = $_POST['classid'] ;
		$classof = "" ;
		switch ($class) 
		{

			case '1':
				$classof = "JSS 1" ;
				break;
			case '2':
				$classof = "JSS 2" ;
				break;
			case '3':
				$classof = "JSS 3" ;
				break;
			case '4':
				$classof = "SSS 1" ;
				break;
			case '5':
				$classof = "SSS 2" ;
				break;
			case '6':
				$classof = "SSS 3" ;
				break;
			default:
				exit() ;
				break;
		}
		$getstudents = $dataRead->getall_students($connect , $class) ;
		if(!$getstudents)
		{
			echo "Could not complete your request ".$getstudents;
		}
		else //if($getstudents)
		{
			// print_r($getstudents) ;
			// echo "Success" ;
			$num = mysqli_num_rows($getstudents) ;
			if($num == 0)
			{
				echo "<div class='alert alert-success alert-dismissible' style='width:400px;'>There are no students in class ".$classof."</div>"; ?>
				<div class="col-lg-12 col-md-12 col-sm-12 card-box">
					<h5>Please Select a class</h5>
						<form id="selectclass" method="post" action="../handler/actionmanager.php">
					<div class="input-group mb-15">
						<select type="email" name="classselect" class="form-control" placeholder="Email">
							<option value="0">Select a class</option>
							<option value="0"></option>
							<optgroup label="Junior Class">
								<option value="0"></option>
								<option value="1">JSS 1</option>
								<option value="2">JSS 2</option>
								<option value="3">JSS 3</option>
								<option value="0"></option>
							</optgroup>
							<optgroup label="Senior Class">
								<option value="0"></option>
								<option value="4">SSS 1</option>
								<option value="5">SSS 2</option>
								<option value="6">SSS 3</option>
								<option value="0"></option>
							</optgroup>
							
						</select>
						<span class="input-group-btn">
						<button type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">Go</span></button>
						</span>
					</div>
					<span class="help-block text-danger" id="classerror"></span>
						</form> 
				</div>	<script type='text/javascript' src='js/custom.js'></script> 
<?php
			}
			else
			{
				$sn = 0 ;
				while($fetchstuds = mysqli_fetch_assoc($getstudents))
				{
					$fname = $fetchstuds['firstname'] ;
					$lname = $fetchstuds['lastname'] ;
					$mname = $fetchstuds['othernames'] ;
					$fullname = ucfirst($fname)." ".ucfirst($mname).", ".ucwords($lname) ;
					$photo = $fetchstuds['passport'] ;
					$adno = $fetchstuds['admission_no'] ;
					$dob = $fetchstuds['dob'] ;
					$age = $fetchstuds['cand_age'] ;
					$address = $fetchstuds['cand_address'] ;
					$year = $fetchstuds['admission_year'] ;
					$adclass = $fetchstuds['admission_class'] ;
					$mail = $fetchstuds['email'] ;
					$phone = $fetchstuds['phone_no'] ;
					$parent_name = $fetchstuds['parent_name'] ;
					$parent_address = $fetchstuds['parent_address'] ;
					$parent_contact = $fetchstuds['parent_contact'] ;
					$sn = $sn + 1 ;
			?>
				<div class="col-lg-12 col-md-12 col-sm-12 card-box">
					<h5>Please Select a class</h5>
						<form id="selectclass" method="post" action="../handler/actionmanager.php">
					<div class="input-group mb-15">
						<select type="email" name="classselect" class="form-control" placeholder="Email">
							<option value="0">Select a class</option>
							<option value="0"></option>
							<optgroup label="Junior Class">
								<option value="0"></option>
								<option value="1">JSS 1</option>
								<option value="2">JSS 2</option>
								<option value="3">JSS 3</option>
								<option value="0"></option>
							</optgroup>
							<optgroup label="Senior Class">
								<option value="0"></option>
								<option value="4">SSS 1</option>
								<option value="5">SSS 3</option>
								<option value="6">SSS 3</option>
								<option value="0"></option>
							</optgroup>
							
						</select>
						<span class="input-group-btn">
						<button type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">Go</span></button>
						</span>
					</div>
					<span class="help-block text-danger" id="classerror"></span>
						</form> 
				</div>
				<div class="col-sm-12">
					<div class="panel panel-default card-view">
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark"><?php echo $classof." students"; ?></h6>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="panel-wrapper collapse in">
							<div class="panel-body">
								<div class="table-wrap">
									<div class="table-responsive">
										<table id="datable_1" class="table table-hover display  pb-30" >
											<thead>
												<tr>
													<th>S/N</th>
													<th>Name</th>
													<th>Admission number</th>
													<th>Year of admission</th>
													<th>Contact</th>
													<th>Age</th>
													<th>View profile</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>S/N</th>
													<th>Name</th>
													<th>Admission number</th>
													<th>Year of admission</th>
													<th>Contact</th>
													<th>Age</th>
													<th>Salary</th>
												</tr>
											</tfoot>
											<tbody>
												<tr>
													<td><?php echo $sn; ?></td>
													<td><?php echo $fullname; ?></td>
													<td><?php echo $adno; ?></td>
													<td><?php echo $year." (".$adclass.")"; ?></td>
													<td><?php echo "Mail: ".$mail."<br>Tel.:".$phone; ?></td>
													<td><?php echo $dob." (".$age." years)"; ?></td>
													<td><button class="btn btn-default btn-outline btn-anim" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i><span class="btn-text">view profile</span></button></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>	
				</div>

	<script type='text/javascript' src='js/custom.js'></script> 
			<!-- </div> -->
			<?php
				}
			}
		}
	}

	//to change event
	function change_event()
	{
		$connect = dbconnect() ;
		$dataRead = new DataRead ;
		$dataWrite = new DataWrite ;

		$event_id = $_POST['event_id'] ;
		$stat = $_POST['stat'] ;
		$change = $dataWrite->change_event($connect , $event_id , $stat) ;
		if($change = 1)
		{
			if($stat == 0)
			{
				$stat = 1 ;
			}
			elseif($stat == 1)
			{
				$stat = 0 ;
			}
			echo $stat.",".$event_id;
		}
		else
		{
			echo $change;
		}
	}
}
//end of actionmanager class


?>


