<?php
 require 'header.php';
 ?>
    <div class="row">
      <div class="col-sm-12">
      <div class="panel panel-info animated fadeInRight" id="formcontent">
      <div class="panel-heading">
      <div class="panel-title">Edit Teaching</div>
      </div>
      <div class="panel-body" >
      <table id="courseuinttable" class="table">
      <form class="form-inline" method="POST" role = "form">
       <tbody>
 <?php

 if (isset($_GET['teachingID'])) {
   $teachingID=sqlInjections($_GET['teachingID']);
   $courseunit=sqlInjections($_GET['courseunit']);
   $yearofstudy=sqlInjections($_GET['yearofstudy']);
   $program=sqlInjections($_GET['program']);
   $lecturer=sqlInjections($_GET['lecturer']);
   $academicyear=sqlInjections($_GET['academicyear']);
   $staffID=sqlInjections($_GET['staffID']);
   $course_id=sqlInjections($_GET['course_id']);
 }
  
if (isset($_POST['program'])) {
      //The code to prevent sql injection
       $teachingID=sqlInjections($_POST['teachingID']);
       $courseunit=sqlInjections($_POST['courseunit']);
       $yearofstudy=sqlInjections($_POST['yearofstudy']);
       $program=sqlInjections($_POST['program']);
       $lecturer=sqlInjections($_POST['lecturer']);
       $academicyear=sqlInjections($_POST['academicyear']);

      if (!empty($teachingID) && !empty($courseunit) && !empty($yearofstudy) && !empty($program) && !empty($lecturer) && !empty($academicyear) ) {

          $query ="UPDATE teaching SET staffID='".$lecturer."',course_id='".$courseunit."',academicYear='".$academicyear."',program='".$program."' WHERE teachingID='".$teachingID."'";

      //The query insertion into the database
          if (mysqli_query($link,$query)) {

            $Message="Teaching Successfully updated";
            header('Refresh: 2; url=teachings.php');
              }else{
                $queryError="Error: 403 Update was unsuccessful!<br/> Please Contact the system Admin";
             }//The end of the query insertion into the database

      }else{
        $queryError="Please select all the fields in the Edit form";
      }
    }
      
        if (isset($errorMessage)) {
              ?>
              <tr><td colspan='2'><div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $errorMessage;?></div></td></tr>
              <?php                    
             }elseif(isset($Message)) {
               ?>
              <tr><td colspan='2'><div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $Message;?></div></td></tr>
              <?php
             }
          ?>
        <tr>
          <td>
            <label>Year of Study</label>
            <select class="form-control input-lg" name="yearofstudy" id="yearofstudy" onchange="changeFunc();">
              <option value="<?php echo$yearofstudy; ?>"><?php echo $yearofstudy;?></option>
              <option value="Year I">Year I</option>
              <option value="Year II">Year II</option>
              <option value="Year III">Year III</option>
              <option value="Year IV">Year IV</option>
            </select>
          </td>
          <td>
            <label>Semester</label>
            <select class="form-control input-lg" name="semester" id="semester" onchange="changeFunc();">
           <option value="Semester I">Semester I</option>
           <option value="Semester II">Semester II</option>
           <option value="Recess">Recess</option>
           <option value="Internship">Internship</option>
        </select>
          </td>
        </tr>
        <tr>
       	<tr>
       		<td>
       			<label>Academic year</label>
            <input type="text" name="academicyear" class="form-control input-lg" value='<?php echo $academicyear;?>'>
       		</td>
          <td>
            <label>Program</label>
            <select class="form-control input-lg" name="program" id="program">
            <option value="<?php echo $program; ?>"><?php echo $program;?></option>
            <option value="Day">Day</option>
            <option value="Evening">Evening</option>
            <option value="Both">Both</option>
            </select>
          </td>
       	</tr>
       	<tr>
       		<td>
       			<label>Course Unit</label>
			  <select class="form-control input-lg" name="courseunit" id="courseunit">
			   <option value="<?php echo $course_id;?>"><?php echo $courseunit;?></option>
			  </select>
       		</td>
       		<td>
       			<label>Lecturer</label>
			      <select class="form-control input-lg" name="lecturer" id="lecturer">
			      <option value="<?php echo $staffID;?>"><?php echo $lecturer;?></option>
			      <?php echo $returnfunction=selectLecture();?>
			      </select>
       		</td>
       	</tr>
        <tr>
        <td>
          <input type="hidden" name="teachingID" value="<?php echo $teachingID;?>">
        </td>
          <td><button class="btn btn-success sendbtn" id="sendbtn">Update<i class="fa fa-check-square-o" style="font-size:18px;color:#FFF"></i></button></td>
        </tr>
       </tbody>
       </form>
      </table>
	     </div>
      </div>

       </div>
</div>
<?php
require("../footer.php");
?>