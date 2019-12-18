<?php
	//session_start() ; first on every page
   //all these comes after all other connect
   $id = $_SESSION['client_id'] ;
   if(!isset($id))
   {
	   //echo "string" ;
	   header("location:login.php") ;
   }
?>