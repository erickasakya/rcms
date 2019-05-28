<?php
 require 'header.php';
 if (isset($_POST['yearOfSitting'])) {

   if (!empty($_POST['semester']) && !empty($_POST['complaintType']) && !empty($_POST['courseunit']) && !empty($_POST['yearOfSitting']) && $_POST['courseunit'] !="Please select course unit" && $_POST['semester'] !="Choose semester of sitting" && !empty($_POST['lecturerID'])){
                   
                   $semester=sqlInjections($_POST['semester']);
                   $complaint=sqlInjections($_POST['complaintType']);
                   $courseid=sqlInjections($_POST['courseunit']);
                   $studentNo=sqlInjections($_POST['studentNo']);
                   $lecturerID=sqlInjections($_POST['lecturerID']);
                   $dept_ID=getuserInfo('dept_ID','staff','staffID',$lecturerID);

                   $query="SELECT staffID,email FROM staff WHERE staffType='HOD' AND dept_ID='".$dept_ID."' LIMIT 1";
                 if ($query_run=mysqli_query($link,$query)) {
                   $row=mysqli_fetch_array($query_run);
                   $hodID=$row[0];
                   $hodemail=$row[1];
                 }
                       
                     $query="INSERT INTO complaint(complaint_type,complaintDate,status,course_id,studentNo,lecturerID,hodID) VALUES('".$complaint."',now(),'pending','".$courseid."','".$studentNo."','".$lecturerID."','".$hodID."')";

                       if (mysqli_query($link,$query)) {

                        //Notification function in the complaint system
                        $studentemail=getuserInfo('email','student','studentNo',$studentNo);
                        $lectureremail=getuserInfo('email','staff','staffID',$lecturerID);
                        $lecturerfname=getuserInfo('fName','staff','staffID',$lecturerID);
                        $lecturerlname=getuserInfo('lName','staff','staffID',$lecturerID);
                         
                        $email[0]=$studentemail; $email[1]=$hodemail;

                        $userUniqueNo[0]=$studentNo;$userUniqueNo[1]=$lecturerID;$userUniqueNo[2]=$hodID;
                        $messagecontent[0]="Your complaint to lecturer<strong> ".$lecturerfname." ".$lecturerlname."</strong> has been received. Thanks, response is soon coming.";
                        $messagecontent[2]="A student with student No<strong> ".$studentNo."</strong> has complained about a course unit you taught in academic year <strong>".$taught."</strong>";
                        $messagecontent[1]="Your student with student No<strong> ".$studentNo."</strong> has complained about a course unit taught by lecturer<strong> ".$lecturerfname." ".$lecturerlname."</strong>"; 

                        $Message=accountNotification($email,$messagecontent,$userUniqueNo);                        
                       }else{
                        $errorMessage= " Could not send a complaint-> Please try again later ";
                       }
                                       
                        
  	 }else{
             	$errorMessage= "Please Enter all details and make sure you choose correctly to be able to complain";
             }
  }
?>
      <div class="row">
      <div class="col-sm-12">
      <div class="panel panel-info animated fadeInRight" id="formcontent">
      <div class="panel-heading">
      <div class="panel-title">Complain for a course unit</div>
      </div>
      <div class="panel-body" >
      <table id="stafftable" class="table">
	      <form method="post" data-toggle="validator" action="" class="form-inline" id="registerstaff">
         <?php
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
          <div class="form-group">
            <label>Academic Year of sitting</label>
              <select class="form-control input-lg" required name="yearOfSitting" id="yearOfSitting" onchange="complainCourseunit();">
              <option>Choose academic year of sitting</option>
               <option value="2017">2017-2018</option>
               <option value="2016">2016-2017</option>
               <option value="2015">2015-2016</option>
               <option value="2014">2014-2015</option>
               <option value="2013">2013-2014</option>
               <option value="2012">2012-2013</option>
               <option value="2011">2011-2012</option>
               <option value="2010">2010-2011</option>
               <option value="2009">2009-2010</option>
               <option value="2008">2008-2009</option>
               <option value="2007">2007-2008</option>
               <option value="2006">2006-2007</option>
               <option value="2005">2005-2006</option>
               <option value="2004">2004-2005</option>
               <option value="2003">2003-2004</option>
               <option value="2002">2002-2003</option>
               <option value="2001">2001-2002</option>
               <option value="2000">2000-2001</option>
               <option value="1999">1999-2000</option>
               <option value="1998">1998-1999</option>
               <option value="1997">1997-1998</option>
               <option value="1996">1996-1997</option>
               <option value="1995">1995-1996</option>
               <option value="1994">1994-1994</option>
              </select> 
               <div class="help-block with-errors"></div>          
          </td>
          </div>
          <td><div class="form-group">
              <label>Semester of sitting</label>
              <select class="form-control input-lg" name="semester" id="semester" onchange="complainCourseunit();">
              <option>Choose Semester of sitting</option>
               <option value="Semester I">Semester I</option>
               <option value="Semester II">Semester II</option>
               <option value="Recess">Recess</option>
               <option value="Internship">Internship</option>
              </select>
               <div class="help-block with-errors"></div>
               </div>
          </td>
          </tr>
          <tr>
          <td colspan="2">
            <h4>Nature of complaint</h4>
          </td>
          </tr>
          <tr>
		      <td>
          <label class="radio-inline">
               <input type="radio" class="hideit" name="complaintType" value="Missing all" id="complaintType" checked > Missing All
          </label>
              
          <label class="radio-inline">
              <input type="radio" class="hideit" name="complaintType" value="Missing exam" id="complaintType" > Missing exam
            </label>  
          </td>
          <td>
          <label class="radio-inline">
               <input type="radio" class="hideit" name="complaintType" value="Missing coursework" id="complaintType" > Missing coursework
          </label>
              
          <label class="radio-inline">
              <input type="radio" name="complaintType" id="others"> Others
            </label>  
            <div class="col-md-12">
            <div class="form-group" id="enter">
                
            </div>
        </div>
          </td>
        </tr>
        <tr>
        <td>
        <div class="form-group">
            <label >Course Unit</label>
        <select class="form-control input-lg" name="courseunit" required id="courseunit" onchange="complainLecturer();"">
         <option>Please select course unit</option>
        </select>
         <div class="help-block with-errors"></div>
         </div>
          </td>
          <td>
        <div class="form-group">
            <label >Lecturer</label>
        <select class="form-control input-lg" name="lecturerID" required id="lecturerID">
         <option>Please select the Lecturer</option>
        </select>
         <div class="help-block with-errors"></div>
         </div>
          </td>
          </tr>
          <tr>
            <td><input type="hidden" name="studentNo" id="studentNo" value="<?php 
        $regNo=getuserfield('username');echo $studentNo=getuserInfo('studentNo','student','regNo',$regNo);?>">
            </td><td>
               <button type="submit" class="btn btn-success" id="complain">Complain</button>
               <button type="reset" class="btn">Cancel</button>
          </td>
	      </form></table>
	     </div>
      </div>

       </div>
</div>
<script type="text/javascript">
  document.getElementById("complain").onclick = function() {
    document.getElementById("others").value = $("#hiddenothers").val();
};
</script>
<?php
require("../footer.php");
?>