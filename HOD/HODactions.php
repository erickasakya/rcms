<?php
require("../login_system/dbconnection.php");
require("../login_system/core.inc.php");
  if (isset($_GET['action'])) {
  	if ($_GET['action']=="getcourseunit") {

    	 	if (!empty($_POST['semester']) && !empty($_POST['yearofstudy']) ) {
          $semester=sqlInjections($_POST['semester']);
          $yearofstudy=sqlInjections($_POST['yearofstudy']);
          $result=selectCourseUnit($semester,$yearofstudy);
          echo $result;
      }else{
          echo "<option>Empty fileds</option>";
        }
  	 }elseif ($_GET['action']=="insertcourseunit") {
  	 	  
        if (!empty($_POST['semester']) && !empty($_POST['yearofstudy']) && !empty($_POST['semester']) && !empty($_POST['yearofstudy'])) {
         # code...
       }
  	 }elseif ($_GET['action']="notifications") {
  	 	# code...
  	 }elseif ($_GET['action']="profile") {
  	 	# code...
  	 }elseif ($_GET['action']="complaints") {
  	 	# code...
  	 }elseif ($_GET['action']="approved") {
  	 	# code...
  	 }elseif ($_GET['action']="approve") {
  	 	# code...
  	 }
  }else{
    echo "Is not set";
  }


?>