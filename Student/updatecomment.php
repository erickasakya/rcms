<?php
require("../login_system/dbconnection.php");
require("../login_system/core.inc.php");
if (isset($_GET['action'])) {
	if ($_GET['action']=="student") {
	       $regNo=getuserfield('username');
           $id=getuserInfo('studentNo','student','regNo',$regNo);
		   $query="UPDATE comment INNER JOIN complaint ON(comment.complaintNo=comment.complaintNo) SET comment.flag='0' WHERE comment.flag='1' AND complaint.studentNo='".$id."'";
		   if ($query_run=mysqli_query($link,$query)) {
		   	echo "1"; 
		   }else{
		   	echo "0";
		   }
    
    }
}
?>