<?php
require("../login_system/dbconnection.php");
require("../login_system/core.inc.php");
   if (isset($_GET['action'])) {
  	if ($_GET['action']=="getoffering"){

    	 if (!empty($_POST['yearOfSitting']) && !empty($_POST['studentNo']) && !empty($_POST['semester'])) {
         
          $yearOfSitting=sqlInjections($_POST['yearOfSitting']);
          $studentNo=sqlInjections($_POST['studentNo']);
          $semester=sqlInjections($_POST['semester']);
          $query="SELECT offering.course_id,courseunit.courseunitName FROM offering INNER JOIN courseunit ON(offering.course_id=courseunit.id) WHERE courseunit.semester='".$semester."' AND offering.academicYear='".$yearOfSitting."' AND studentNo='".$studentNo."'";
			if ($query_run=mysqli_query($GLOBALS['link'],$query)) {

				$numrows=mysqli_num_rows($query_run);
				if ($numrows==0) {
					echo "<option>No course unit was offered in academic Year ".$yearOfSitting." and ".$semester." </option>";
				}else{
					while($query_result=mysqli_fetch_row($query_run)) {
					echo  "<option value='".$query_result[0]."'>".$query_result[1]."</option><br/>";
				       }
				}
				
			}else{
				echo "Couldn't get the courseunits contact the system admin".mysqli_error($GLOBALS['$link']);
			}
      }else{
          echo "<option>Empty field</option>";
        }
  	 
  	 }elseif ($_GET['action']=="registercourseunit") {

  	 	if (!empty($_POST['semester']) && !empty($_POST['yearofstudy']) && !empty($_POST['academicyear']) && !empty($_POST['program'])) {
          $semester=sqlInjections($_POST['semester']);
          $yearofstudy=sqlInjections($_POST['yearofstudy']);
          $program=sqlInjections($_POST['program']);
          $academicyear1=sqlInjections($_POST['academicyear']);
          $dept_ID=sqlInjections($_POST['dept_ID']);
          $academicyear=$academicyear1."-".($academicyear1+1);

          $regNo=getuserfield('username');
          $id=getuserInfo('studentNo','student','regNo',$regNo);
          $query="SELECT * FROM offering INNER JOIN courseunit ON(offering.course_id=courseunit.id) WHERE (offering.program='Day' OR offering.program='Evening') && offering.academicYear='".$academicyear."' && courseunit.semester='".$semester."' && courseunit.yearofstudy='".$yearofstudy."' && offering.studentNo='".$id."'";
          $query_run=mysqli_query($GLOBALS['link'],$query);
          $numrows=mysqli_num_rows($query_run);
          if ($numrows==0) {
          	$query="SELECT teaching.course_id,courseunit.courseunitName FROM teaching INNER JOIN courseunit ON(teaching.course_id=courseunit.id) WHERE (teaching.program='".$program."' OR teaching.program='Both') && teaching.academicYear='".$academicyear."' && courseunit.semester='".$semester."' && courseunit.yearofstudy='".$yearofstudy."' && courseunit.dept_ID='".$dept_ID."'";
			if ($query_run=mysqli_query($GLOBALS['link'],$query)) {

				$numrows=mysqli_num_rows($query_run);
				if ($numrows==0) {
					echo "<option>No course unit is taught in academic Year ".$academicyear."</option>";
				}else{
					while($query_result=mysqli_fetch_row($query_run)) {
					echo  "<option value='".$query_result[0]."'>".$query_result[1]."</option><br/>";
				       }
				}
				
			}else{
				echo "Couldn't get the courseunits contact the system admin".mysqli_error($GLOBALS['$link']);
			}
          }else{
          	echo "<option>You already registered for ".$semester." in academic Year ".$academicyear."</option>";
          }
      }else{
          echo "<option>Empty field for all</option>";
        }
  	 }elseif ($_GET['action']=="getLecturer"){

    	 if (!empty($_POST['yearOfSitting']) && !empty($_POST['studentNo']) && !empty($_POST['course_id'])) {
         
          $yearOfSitting=sqlInjections($_POST['yearOfSitting']);
          $studentNo=sqlInjections($_POST['studentNo']);
          $course_id=sqlInjections($_POST['course_id']);
          $query="SELECT teaching.staffID,staff.fName,staff.lName 
           FROM offering, teaching 
           INNER JOIN staff ON(teaching.staffID=staff.staffID)
           INNER JOIN courseunit ON(teaching.course_id=courseunit.id) 
           WHERE courseunit.id=offering.course_id AND teaching.course_id='".$course_id."' AND teaching.academicYear='".$yearOfSitting."' AND studentNo='".$studentNo."'";
			if ($query_run=mysqli_query($GLOBALS['link'],$query)) {

				$numrows=mysqli_num_rows($query_run);
				if ($numrows==0) {
					echo "<option>No lecturer taught that course unit in academic Year ".$yearOfSitting." and ".$semester." </option>";
				}else{
					while($query_result=mysqli_fetch_row($query_run)) {
					echo  "<option value='".$query_result[0]."'>".$query_result[1]." ".$query_result[2]."</option><br/>";
				       }
				}
				
			}else{
				echo "Couldn't get the lecturer contact the system admin".mysqli_error($GLOBALS['$link']);
			}
      }else{
          echo "<option>Empty field</option>";
        }
  	 
  	 }
  	}

?>