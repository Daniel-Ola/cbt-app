<?php



function passwordHash($password)
{
	$pass = hash("sha256", md5($password)) ;
	return $pass ;
}

function numQuery($query)
{
	$num = mysqli_num_rows($query) ;
	return $num ;
}

function getGrade($percent)
{
  $percent = explode("%", $percent)[0] ; //substr($percent , -2) ;
  // $grade = "" ;
  switch ($percent) {
    case $percent >= 70:
      $grade = "A (Excellent)" ;
      break;
    case $percent >= 60 && $percent <= 69:
      $grade = "B (Very Good)" ;
      break;
    case $percent >= 50 && $percent <= 59:
      $grade = "C (Good)" ;
      break;
    case $percent >= 45 && $percent <= 49:
      $grade = "D (Satisfactory)" ;
      break;
    case $percent >= 40 && $percent <= 44:
      $grade = "E (Weak Pass)" ;
      break;
    case $percent >= 0 && $percent <= 39:
      $grade = "F (Failure)" ;
      break;
    
    default:
      $grade = "F" ;
      break;
  }
  if($percent == 0){ $grade = "F (Failure)" ; }
  return $grade ;
}

function over30($score , $tot)
{
  // $return = round(($score/$tot)*30) ;
  $return = ($score/$tot)*30 ;
  return $return ;
}

function getLastSeen($time , $now)
{
  // $time = $now-86300 ;
  $diff = $now - $time ;
  switch ($diff) {
    case $diff < 60:
      $return = $diff."secs" ;
      break;
    case $diff >= 60 && $diff < 3600:
      $min = floor($diff/60) ;
      $return = $min."mins" ;
      break;
    case $diff >= 3600 && $diff < 86400:
      $hr = floor($diff/3600) ;
      $return = $hr."hrs" ;
      break;
    case $diff >= 86400:
      $day = floor($diff/86400) ;
      $return = $day."days" ;
      break;
    
    default:
      $return = $diff."secs" ;
      break;
  }
  return $return ;
}

function cleanText($con , $txt)
{
  return mysqli_real_escape_string($con , trim($txt)) ;
}

function validateSignup()
{
  if(isset($_GET['status']))
  {
    $stat = $_GET['status'] ;
    switch ($stat) {
      case 'usernameerror':
        $reply = "* Username already exist." ;
        break;
      case 'mailerror':
        $reply = "* Email already exist." ;
        break;
      case 'passworderror':
        $reply = "* Password does not match." ;
        break;
      
      default:
        $reply = "" ;
        break;
    }
  }
  else
  {
    $reply = "" ;
  }
  return $reply ;
}

function validateLogin()
{
  if(isset($_GET['status']))
  {
    $stat = $_GET['status'] ;
    switch ($stat) {
      case 'usernameerror':
        $reply = "* Username does not exist." ;
        break;
      case 'passworderror':
        $reply = "* Incorrect Password." ;
        break;
      
      default:
        $reply = "" ;
        break;
    }
  }
  else
  {
    $reply = "" ;
  }
  return $reply ;
}

function fetcher($query)
{
	return mysqli_fetch_assoc($query) ;
}

function redirect($page)
{
	header("location:".$page) ;
}

function getRest($rand_opt , $optgrp_arr)
{
  switch ($rand_opt) {
    case !in_array(0, $rand_opt):
            $return = $optgrp_arr[0];
        break;
    case !in_array(1, $rand_opt):
            $return = $optgrp_arr[1];
        break;
    case !in_array(2, $rand_opt):
            $return = $optgrp_arr[2];
        break;
    case !in_array(3, $rand_opt):
            $return = $optgrp_arr[3];
        break;
    
    default:
        $return = "option e";
        break;
  }
  return $return ;
}

function sendSMS($sendto, $message)
{
    if(strlen($sendto) == 11 || strlen($sendto) == 10)
    {
        if(strpos("#".$sendto,"#0") !== FALSE && strlen($sendto) <= 11) $sendto = "234" . substr($sendto,1);
        if(strpos("#".$sendto,"#0") === FALSE && strlen($sendto) == 11) $sendto = "234" . substr($sendto,1);        
    }
/*	
    $url = "http://zoracom.smsrouter.gtsmessenger.com/ws/instant.php?action=sendSMS&login=admin&password=7f1b1592"
	. "&to=" . UrlEncode($sendto)
	. "&from=" . UrlEncode("33811")
	. "&message=" . UrlEncode($message);
*/    
 //http://www.smslive247.com/http/index.aspx?cmd=sendquickmsg&owneremail=xxx&subacct=xxx&subacctpwd=xxx&message=xxx&sender=xxx&sendto=xxx&msgtype=0
    $url = "http://www.smslive247.com/http/index.aspx?"
    . "cmd=sendquickmsg"
    . "&owneremail=" . UrlEncode("niofa141@gmail.com")
    . "&subacct=" . UrlEncode("OLORUNTOBA ALO")
    . "&subacctpwd=" . UrlEncode("CASES")
    . "&message=" . UrlEncode($message)
    . "&sender=" . UrlEncode("Student Disciplinary Council")
    . "&sendto=" . UrlEncode($sendto)
    . "&msgtype=0" ;
    
//echo $url;

//showAlert($url);

    $curl_handle=curl_init();
      curl_setopt($curl_handle,CURLOPT_URL,$url);
      curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
      curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
      $buffer = curl_exec($curl_handle);
      curl_close($curl_handle);
      if (empty($buffer)){
              print "Nothing returned from url.<p>";
          return false;
      }
      else{
              print $buffer;
          
          return true;
      }
}

function sendEmail($email,$subject,$message)
{
	$sender = "Student Disciplinary Council<noreply@sdcmail.com>";
	$sent = mail($email,$subject,$message,"From: $sender"."\r\n"."Content-type: text/html; charset=iso-8859-1","-fwebmaster@".$_SERVER["SERVER_NAME"]);
	if($sent) return true;
	return false;
}



?>