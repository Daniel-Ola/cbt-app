<?php
require_once("dbconnect.php") ;
require_once("actionmanager.php") ;

$dataRead = new DataRead() ;
$dataWrite = new DataWrite() ;
$connect = dbconnect() ;

class DataWrite
{
	function change_event($connect , $event_id , $stat)
	{
		if($stat == 0)
		{
			$stat = 1 ;
		}
		elseif($stat == 1)
		{
			$stat = 0 ;
		}
		$query = mysqli_query($connect , "UPDATE settings SET setting_stat = '$stat' WHERE setting_id = '$event_id' ") ;
		if($query)
		{
			return true ;
		}
		else
		{
			return mysqli_error($query) ;
		}
	}
}

class DataRead
{
	function getallstaff($connect , $limit)
	{
		$query = mysqli_query($connect , "SELECT * FROM staffs") ;
		if($query)
		{
			return $query ;
		}
		else
		{
			return false ;		}
	}

	//get all students with class $class
	function getall_students($connect , $class)
	{
		$query = mysqli_query($connect , "SELECT * FROM portal_reg p JOIN admissionform a ON(p.admission_no = a.admission_no) WHERE p.current_class = '$class' ") ;
		if($query)
		{
			return $query ;
		}
		else
		{
			return false ;
		}
	}

	//to get staff roles
	function getrole($connect , $role)
	{
		$query = mysqli_query($connect , "SELECT * FROM staff_role WHERE role_id = '$role' ") ;
		if($query)
		{
			$fetch = mysqli_fetch_assoc($query) ;
			$return = $fetch['role_name'] ;
			return $return ;
		}
	}

	//to get various events for the settings section
	function getevents($connect)
	{
		$query = mysqli_query($connect , "SELECT * FROM settings") ;
		if($query)
		{
			return $query ;
		}
		else
		{
			return false ;
		}
	}

	//to check for application status
	function check_application($connect)
	{
		$query = mysqli_query($connect , "SELECT * FROM settings WHERE setting_id = '1' LIMIT 1 ") ;
		if($query)
		{
			$fetch = mysqli_fetch_assoc($query) ;
			$stat = $fetch['setting_stat'] ;
			return $stat ;
		}
		else
		{
			return false ;
		}
	}

	
}
//end of dataRead class
?>