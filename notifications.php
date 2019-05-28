<?php
require("login_system/dbconnection.php");
require("login_system/core.inc.php");
if (isset($_GET['action'])) {
	if ($_GET['action']=="staff") {
			$hodemail=getuserfield('username');
            $id=getuserInfo('staffID','staff','email',$hodemail);
		    $query="UPDATE notification SET flag='0' WHERE flag='1' AND staffID='".$id."'";
		   if ($query_run=mysqli_query($link,$query)) {
		   	return 1;
		   }else{
		   	return 0;
		   }
			
    }elseif ($_GET['action']=="student") {
	       
	       $regNo=getuserfield('username');
           $id=getuserInfo('studentNo','student','regNo',$regNo);
		   $query="UPDATE notification SET flag='0' WHERE flag='1' AND studentNo='".$id."'";
		   if ($query_run=mysqli_query($link,$query)) {
		   	echo "1"; 
		   }else{
		   	echo "0";
		   }
    
    }
}
?>