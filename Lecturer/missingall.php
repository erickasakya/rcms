<?php
 require 'header.php';
?>
    <div class="panel panel-info animated fadeInRight" id="formcontent">
      <div class="panel-heading">
      <div class="panel-title">Resolve the complaint</div>
      </div>
      <div class="panel-body" >
     <?php
    
	    if (isset($_GET['complainttype']) && ($_GET['complainttype'] =="Missing all")) {
	    	$complaintNo=sqlInjections($_GET['complaintNo']);
	    	$complainttype=sqlInjections($_GET['complainttype']);
	    	$regNo=sqlInjections($_GET['regNo']);
	    }
	    if (isset($_POST['mark'])) {
	    	$i=0;
	    if (!empty($_POST['mark']) && $_POST['mark']!="Array") {

	    	$Regno=sqlInjections($_POST['regNo']);
	    	$complaintNo=sqlInjections($_POST['complaintNo']);
	    	$Lectureremail=getuserfield('username');
			$lecturerID=getuserInfo('staffID','staff','email',$Lectureremail);
	    	$Mark=$_POST['mark'];
	    	$markName[0]="coursework";
	    	$markName[1]="exam";
	    	foreach( $Mark as $key=>$value) {
		       $query="INSERT INTO mark(markName,mark,entryDate,complaintNo,staffID) 
				VALUES('".$markName[$key]."','".$Mark[$key]."',now(),'".$complaintNo."','".$lecturerID."')";
				$query_run=mysqli_query($link,$query);

				$finalmark[$i]=$Mark[$key];
				$i++;
	    	}			
			if ($query_run) {
				$Message="You have given ".$finalmark[0]." as the ".$markName[0]." and ".$finalmark[1]." as the ".$markName[1]." on complaint made by student with Reg No <strong>".$Regno."</strong> ";
				$query="UPDATE complaint SET status='workedon' WHERE complaintNo='".$complaintNo."'";
				mysqli_query($link,"$query"); 
				
				$studentemail=getuserInfo('email','student','regNo',$Regno);
				$dept_ID=getuserInfo('dept_ID','staff','email',$Lectureremail);
				$lecturerfname=getuserInfo('fName','staff','email',$Lectureremail);
                $lecturerlname=getuserInfo('lName','staff','email',$Lectureremail);
                $hodID=getuserInfo('hodID','complaint','complaintNo',$complaintNo);
	             //The text notification to a student
				$studentcontact=getuserInfo('contact','student','regNo',$Regno);
				$message="Lecturer ".$lecturerfname." ".$lecturerlname." has given You ".$finalmark[0]." as the ".$markName[0]." and ".$finalmark[1]." as the ".$markName[1]." for your complaint, Please check up on the RCMS for confirmation";
				//Calling the function to send the notification
				$result=textNotification($studentcontact,$message);
			
				//Account Notification with email notification
				
				$studentNo=getuserInfo('studentNo','student','regNo',$Regno);

				$email[0]=$studentemail; $email[1]=$Lectureremail;

                $userUniqueNo[0]=$studentNo;$userUniqueNo[1]=$lecturerID;$userUniqueNo[2]=$hodID;
                $messagecontent[0]="Lecturer ".$lecturerfname." ".$lecturerlname." has given You ".$finalmark[0]." as the ".$markName[0]." and ".$finalmark[1]." as the ".$markName[1]." for your complaint";
                $messagecontent[1]=$Message;

                $messagecontent[2]="Lecturer <strong> ".$lecturerfname." ".$lecturerlname."</strong> has given ".$finalmark[0]." as the ".$markName[0]." and ".$finalmark[1]." on a complaint from a student with a Reg No of <strong> ".$Regno."</strong>";

                //calling the function to send the two notifications
                $result=accountNotification($email,$messagecontent,$userUniqueNo);
               

			}else{
				$errorMessage="Mark failed to be given to complaint, Try again later ".mysqli_error($link);
			}
	    }else{
	    	$errorMessage="Please fill in all the fields for you to be able to resolve this complaint";
	    	}
	  
	  }
    ?>
	    <?php
	             if (isset($errorMessage)) {
	              ?>
	              <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $errorMessage;?></div>
	              <?php                    
	             }elseif(isset($Message)) {
	               ?>
	             <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $Message;?></div>
	              <?php
	             }
	              ?>
		<form class="form-horizontal" data-toggle="validator" method="POST" role = "form">
	    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
		      <label for="staffID" class="col-sm-2 control-label">Compliant Type</label>
		      <div class="col-sm-9">
		      <input type="text" required id="complainttype" class="form-control input-lg" name="complainttype" value="<?php if (isset($_GET['complainttype'])) { echo $complainttype;}?>" >
		      <div class="help-block with-errors"></div>
		      <input type="hidden" name="complaintNo" value="<?php if (isset($_GET['complaintNo'])) { echo $complaintNo;}?>">
            </div>
             </div> 
	     </div>
             
             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
             <div class="form-group">
		      <label for="staffID" class="col-sm-2 control-label">Student Reg No</label>
		      <div class="col-sm-9">
		      <input type="text" required id="regNo" class="form-control input-lg" name="regNo" value="<?php if (isset($_GET['regNo'])) { echo $regNo;}?>" >
		      <div class="help-block with-errors"></div>
            </div>
             </div> 
	     </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
           <div class="form-group">
		      <label for="content" class="col-sm-2 control-label">Coursework Mark</label>
		      <div class="col-sm-9">
		      <input type="number" required name="mark[]" id="courseworkmark" placeholder="90%" class = "form-control input-lg">
		      <div class="help-block with-errors"></div>
		   </div>
		    </div> 
	     </div>

		   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
           <div class="form-group">
		      <label for="content" class="col-sm-2 control-label">Exam Mark</label>
		      <div class="col-sm-9">
		      <input type="number" required name="mark[]" id="exammark" placeholder="56%" class = "form-control input-lg">
		      <div class="help-block with-errors"></div>
		   </div>
		    </div> 
	     </div>
	    	   
	     <br>
		   <br>
		   <button type="submit" class="btn btn-success" id="comment">Send<i class="fa fa-check-square-o" style="font-size:18px;color:#FFF"></i></button>
	    	</form> 
      </div>
    </div>

<?php
require("../footer.php");
?>