<?php
require_once("dbconnect.php") ;
require_once("actionmanager.php") ;
require_once("config.php") ;

/* $dataRead = new DataRead() ;
$dataWrite = new DataWrite() ; */

$connect = dbconnect() ;

class DataWrite
{
	function add_examiner($connect , $contact , $fname  , $password)
	{
		$query = mysqli_query($connect , "INSERT INTO examiners (user_name , password , contact) VALUES ('$fname' , '$password' , '$contact') ") ;
		if($query)
		{
			return true ;
		}
		else
		{
			return false ;
		}
	}
	
	function xam_create($connect , $subject , $klass , $type , $pword)
	{
		$dataRead = new DataRead() ;
/*		$getklasid = $dataRead->getklasid($connect , $klass) ;
		$getypeid = $dataRead->getypeid($connect , $type) ;
		$subject = $getsubid ;
		$klass = $getklasid ;
		$type = $getypeid ; */
		$klass_id = switchClass($klass) ;
		$trunc_sub = substr($subject , 0 , 3) ;
		$sub_code = $trunc_sub.$klass_id ;
		$getsubid = $dataRead->getsubid($connect , $subject , $klass_id) ;
	}

	function regUser($connect , $username , $course , $matricNo , $started)
	{
		$query = mysqli_query($connect , "INSERT INTO users (username , course , started , matric) VALUES ('$username' , '$course' , '$started' , '$matricNo') ") ;
		if($query)
		{
			$id = mysqli_insert_id($connect) ;
			/*$dataRead = new DataRead() ;
			$getStudDet = $dataRead->getStudDet($connect , $matricNo , $course , $username) ;
			if($getStudDet)
			{
				return $getStudDet['user_id'] ;
			}	
			else
			{
				return 0 ;
			}*/
			return $id ;
		}
		else
		{
			return 0 ; //mysqli_error($connect) ;
		}
	}

	function enterQuestions($connect , $user , $course , $que , $a , $b , $c , $d , $test , $ans , $img)
	{
		$query = mysqli_query($connect , "INSERT INTO ".$course." (sub_name , question , a,b,c,d,type,answer , xaminer_id , img) VALUES ('$course' , '$que' , '$a' , '$b' , '$c' , '$d' , '$test' , '$ans' , '$user' , '$img') ") ;
		if($query)
		{
			return 1 ;
		}
		else
		{
			return mysqli_error($connect)." ".$course ;
		}
	}

	function solved($connect , $answers , $correctAnswers , $user , $score , $percent , $course)
	{
		$percent = $percent."%" ;
		$query = mysqli_query($connect , "UPDATE users SET course = '$course' , answers = '$correctAnswers' , options = '$answers' , score = '$score' , percent = '$percent' , checkif = '1' WHERE user_id = '$user' ") ;
		if($query)
		{
			return 1 ;
		}
		else
		{
			return mysqli_error($connect) ;
		}
	}

	function saveCode($connect , $code , $xamTime , $xamQues , $test)
	{
		$query = mysqli_query($connect , "INSERT INTO settings (exam_code , set_time , no_que , exam_type) VALUES ('$code' , '$xamTime' , '$xamQues' , '$test') ") ;
		if($query)
		{
			return 1 ;
		}
		else
		{
			return 0 ;
		}
	}
}
//end of dataWrite class

class DataRead
{
	function get_userdetails($connect , $user_id)
	{
		$query = mysqli_query($connect , "SELECT * FROM examiners WHERE user_id = '$user_id' LIMIT 1 ") ;
		if($query)
		{
			//$query_array = mysqli_fetch_assoc($query) ;
			return $query ; //$query_array ;
		}
		else
		{
			return false ;
		}
	}

	function getUserDet($user_id)
	{
		$connect = dbconnect() ;	
		$query = mysqli_query($connect , "SELECT * FROM users WHERE user_id = '$user_id' LIMIT 1 ") ;
		if($query)
		{
			//$query_array = mysqli_fetch_assoc($query) ;
			// return mysqli_fetch_assoc($query) ; //$query_array ;
			return fetcher($query) ;
		}
		else
		{
			return false ;
		}
	}

	function getQuestions($sub , $limit , $type)
	{
		$connect = dbconnect() ;	
		$query = mysqli_query($connect , "SELECT * FROM ".$sub." WHERE type = '$type' ORDER BY RAND() LIMIT $limit ") ;
		if($query)
		{
			return $query ; //fetcher($query) ;
		}
		else
		{
			return mysqli_error($connect) ;
		}
	}

	function getStudDet($connect , $matricNo , $course , $username)
	{
		$query = mysqli_query($connect , "SELECT * FROM users WHERE matric = '$matricNo' AND course = '$course' AND username = '$username' ORDER BY user_id DESC LIMIT 1 ") ;
		if($query)
		{
			//$query_array = mysqli_fetch_assoc($query) ;
			return mysqli_fetch_assoc($query) ; //$query_array ;
			// return "true" ;
		}
		else
		{
			return mysqli_error($connect) ;
		}
	}
	
	function get_subjects($connect)
	{
		$query = mysqli_query($connect , "SELECT * FROM subjects") ;
		if($query)
		{
			return $query ;
		}
		else{
			return mysqli_error($query) ;
		}
	}
	
	function get_type($connect)
	{
		$query = mysqli_query($connect , "SELECT * FROM exam_type") ;
		if($query)
		{
			return $query ;
		}
		else{
			return mysqli_error($query) ;
		}
	}
	
	// function to get class ids
	function switchClass($klass)
	{
		switch ($klass) {
			case "JSS1": $klass_id = 1 ;
			break ;
			case "JSS2": $klass_id = 2 ;
			break ;
			case "JSS3": $klass_id = 3 ;
			break ;
			case "SSS1": $klass_id = 4 ;
			break ;
			case "SSS2": $klass_id = 5 ;
			break ;
			case "SSS3": $klass_id = 6 ;
			dafault: $klass_id = 1 ;
		}
		return $klass_id ;
	}

	function getScores($course , $lim)
	{
		$connect = dbconnect() ;
		if($course == "all")
		{
			if(strlen($lim) != 0)
			{
				$query = mysqli_query($connect , "SELECT * FROM users WHERE checkif = '1' ORDER BY user_id DESC  LIMIT $lim") ;
			}
			else
			{
				$query = mysqli_query($connect , "SELECT * FROM users WHERE checkif = '1' ORDER BY user_id DESC ") ;
			}
			
		}
		else
		{
			if(strlen($lim) != 0)
			{
				$query = mysqli_query($connect , "SELECT * FROM users WHERE course = '$course' AND checkif = '1' ORDER BY user_id DESC  LIMIT $lim") ;
			}
			else
			{
				$query = mysqli_query($connect , "SELECT * FROM users WHERE course = '$course' AND checkif = '1' ORDER BY user_id DESC ") ;
			}
		}
		// $query = mysqli_query($connect , "SELECT * FROM users WHERE course = '$course' AND checkif = '1' ORDER BY user_id DESC  LIMIT $lim") ;
		if($query)
		{
			return $query ;
		}
		else
		{
			return mysqli_error($connect) ;
		}
	}

	function getEachScores($matricNo)
	{
		$connect = dbconnect() ;
		$query = mysqli_query($connect , "SELECT * FROM users WHERE matric = '$matricNo' AND checkif = '1' ORDER BY course ") ;
		// return mysqli_fetch_assoc($query) ;
		return $query ;
	}

	function checkAvailable($connect , $val)
	{
		$query = mysqli_query($connect , "SELECT * FROM settings WHERE exam_code = '$val' ") ;
		$num = numQuery($query) ;
		if($num == 0)
		{
			$return = 2 ;
		}
		else
		{
			$return = 1 ;
		}
		return $return ;
	}
	
/* 	function getsubid($connect , $subject)
	function getklasid($connect , $klass) */
	// function getypeid($connect , $type)
}
//end of dataRead class


?>