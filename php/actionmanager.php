<?php
require_once("dbconnect.php") ;
require_once("dbfunctions.php") ;
require_once("config.php") ;
$actionmanager = new Actionmanager() ;


if(isset($_POST['command']) && $_POST['command'] == 'add_examiner')
{
	$actionmanager->add_examiner() ;
}
elseif(isset($_POST['command']) && $_POST['command'] == 'cr8xam')
{
	$actionmanager->xam_create() ;
}
elseif (isset($_POST['command']) && $_POST['command'] == 'regUser') {
	$actionmanager->regUser() ;
}
elseif (isset($_POST['command']) && $_POST['command'] == 'solved') {
	$actionmanager->solved() ;
}
elseif (isset($_POST['command']) && $_POST['command'] == 'enterQuestions') {
	$actionmanager->enterQuestions() ;
}
elseif (isset($_POST['command']) && $_POST['command'] == 'setQues') {
	$actionmanager->setQues() ;
}
elseif (isset($_POST['command']) && $_POST['command'] == 'Login') {
	$actionmanager->Login() ;
}
elseif (isset($_POST['command']) && $_POST['command'] == 'checkAvailable') {
	$actionmanager->checkAvailable() ;
}
elseif (isset($_POST['command']) && $_POST['command'] == 'saveCode') {
	$actionmanager->saveCode() ;
}


//begin of actionmanager class
class Actionmanager
{
	function add_examiner()
	{
		$connect = dbconnect() ;
		$dataRead = new DataRead ;
		$dataWrite = new DataWrite ;
		
		$contact = $_POST['contact'] ;
		$fname = $_POST['fname'] ;
		$error_check = isset($contact) && $contact !== "" && isset($fname) && $fname !== "" ;
		if($error_check)
		{
			$password = passwordHash("password") ;//hash("sha256" , "password1234") ;
			$do_job = $dataWrite->add_examiner($connect , $contact , $fname  , $password) ;
			if($do_job)
			{
				echo $do_job ;
			}
			else{
				echo $do_job ;//"Could not regiser examiner ".$fname." seems this email is already in use" ;
			}
		}
		else
		{
			echo "Some fields seems to be empty" ;
		}
	}
	
	function xam_create()
	{
		$connect = dbconnect() ;
		$dataWrite = new DataWrite ;
		
		$subject = $_POST['subject'] ;
		$klass = $_POST['klass'] ;
		$type = $_POST['type'] ;
		$pword = passwordHash($_POST['pword']) ;
		
		$do_job = $dataWrite->xam_create($connect , $subject , $klass , $type , $pword) ;
		if($do_job)
		{
			// echo ;
		}
	}

	function regUser()
	{
		$dataWrite = new DataWrite() ;
		$connect = dbconnect() ;
		$username = $_POST['username'] ;
		$course = $_POST['course'] ;
		$examCode = $_POST['examCode'] ;
		$matricNo = $_POST['matricNo'] ;
		$started = time() ;
		$do = $dataWrite->regUser($connect , $username , $course , $matricNo , $started) ;
		if($do != 0)
		{
			$query = mysqli_query($connect , "SELECT * FROM settings WHERE exam_code = '$examCode' LIMIT 1") ;
			if(numQuery($query) == 1)
			{
				session_start() ;
				$_SESSION['user_id'] = $do ;
				$_SESSION['examCode'] = mysqli_fetch_assoc($query) ;
				echo $do;
				// print_r(mysqli_fetch_assoc($query));
			}
			else
			{
				echo -1 ;
			}
			
		}
		else
		{
			echo $do;
		}
		
	}

	function solved()
	{
		$dataWrite = new DataWrite() ;
		$connect = dbconnect() ;
		$answers = $_POST['answers'] ;
		$correctAnswers = $_POST['correctAnswers'] ;
		$course = $_POST['course'] ;
		$user = $_POST['user'] ;
		$key = $_POST['key'] ;
		$ans_arr = explode($key, $answers) ;
		$corans_arr = explode($key, $correctAnswers) ;
		$score = 0 ;
		$total = count($ans_arr) - 1 ;
		// echo $ans_arr[6];
		for ($i=1; $i <= $total ; $i++) { 
			if (trim(passwordHash($ans_arr[$i])) == trim($corans_arr[$i])) {
				$score += 1 ;
			}
		}
		$percent = round(($score/$total)*100) ;
		$do = $dataWrite->solved($connect , $answers , $correctAnswers , $user , $score , $percent , $course) ;
		if($do = 1)
		{
			echo $score."et".$percent."%";
		}
		else
		{
			echo $do;
		}
	}

	function enterQuestions()
	{
		$connect = dbconnect() ;
		$dataWrite = new DataWrite() ;
		$question = $_POST['question'] ;
		$user = $_POST['user'] ;
		$course = $_POST['course'] ;
		$test = $_POST['test'] ;
		$key = $_POST['key'] ;
		$eachQue = explode($key, $question) ;
		$que = cleanText($connect , $eachQue[0]) ;
		$a = cleanText($connect , $eachQue[1]) ;
		$b = cleanText($connect , $eachQue[2]) ;
		$c = cleanText($connect , $eachQue[3]) ;
		$d = cleanText($connect , $eachQue[4]) ;
		// $e = cleanText($connect , $eachQue[5]) ;
		$ans = cleanText($connect , $eachQue[5]) ;
		$img = cleanText($connect , $eachQue[6]) ;
		// $check = substr_count($question, $ans) ;
		// if($ans == $a){echo "string ".$check;}else{echo "stringer ".$check;}
		// echo strlen($ans)." ".strlen($a) ;
		//echo $check; //print_r($eachQue) ; //echo $question ;//." <br> ".$eachQue;
		if($ans == $a || $ans == $b || $ans == $c || $ans == $d)
		{
			$do = $dataWrite->enterQuestions($connect , $user , $course , $que , $a , $b , $c , $d , $test , $ans , $img) ;
			echo $do;
		}
		else
		{
			echo 3;
			// return ;
		}
		//3 === ans error
		
		
	}

	function setQues()
	{
		$connect = dbconnect() ;
		$dataWrite = new DataWrite() ;
		$user = $_POST['user'] ;
		$course = $_POST['course'] ;
		$test = $_POST['test'] ;
		$que = cleanText($connect , $_POST['question']) ;
		$a = cleanText($connect , $_POST['opta']) ;
		$b = cleanText($connect , $_POST['optb']) ;
		$c = cleanText($connect , $_POST['optc']) ;
		$d = cleanText($connect , $_POST['optd']) ;
		// $e = cleanText($connect , $_POST['opte'])) ;
		$ans = cleanText($connect , $_POST['answer']) ;
		$img = cleanText($connect , $_POST['image']) ;
		if($ans == $a || $ans == $b || $ans == $c || $ans == $d)
		{
			$do = $dataWrite->enterQuestions($connect , $user , $course , $que , $a , $b , $c , $d , $test , $ans , $img) ;
			if($do)
			{
				echo $do;
			}
			else
			{
				echo $do;
			}
		}
		else
		{
			echo 3;
		}
		//3 === ans error	
	}

	function Login()
	{
		// when user logs in two things happen the login stat is updated and the temp_cart is created also but deleted on logout
		$connect = dbconnect() ;
		$dataWrite = new DataWrite() ;
		$dataRead = new DataRead() ;
		$username = $_POST['uname'] ;
		$password = passwordHash($_POST['pword']) ;
		$query = mysqli_query($connect , "SELECT * FROM examiners WHERE username = '$username' ") ;
		$num = numQuery($query) ;
		if($num == 1)
		{
			$fetch = mysqli_fetch_assoc($query) ;
			$pword = $fetch['password'] ;
			$user_id = $fetch['user_id'] ;
			$username = $fetch['username'] ;
			if($password === $pword)
			{
				session_start() ;
				$_SESSION['user_id'] = $user_id ;
				$_SESSION['username'] = $username ;
				$_SESSION['password'] = $password ;
				echo "1";
			}
			else
			{
				echo "2";
			}
		}
		else
		{
			echo "3";
		}
	}

	function checkAvailable()
	{
		$connect = dbconnect() ;
		$dataRead = new DataRead() ;
		$val = $_POST['val'] ;
		$do = $dataRead->checkAvailable($connect , $val) ;
		echo $do ;
	}

	function saveCode()
	{
		$connect = dbconnect() ;
		$dataWrite = new DataWrite() ;
		$code = $_POST['code'] ;
		$xamTime = $_POST['xamTime'] ;
		$xamQues = $_POST['xamQues'] ;
		$test = $_POST['test'] ;
		$do = $dataWrite->saveCode($connect , $code , $xamTime , $xamQues , $test) ;
		echo $do;
	}
}
//end of actionmanager class


?>


