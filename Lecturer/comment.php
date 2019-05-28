<?php
 require 'header.php';
?>
    <div class="graph-visual tables-main animated fadeInRight" id="formcontent">
     <?php
    
	    if (isset($_GET['complaintNo'])) {

	    	$complaintNo=$_GET['complaintNo'];
	    	$regNo=$_GET['regNo'];
	    	$complainttype=$_GET['complainttype'];
	    	
	    }
	    if (isset($_POST['content'])) {
	    	$Regno=sqlInjections($_POST['regNo']);
			$content=sqlInjections($_POST['content']);
			$complaintNo=sqlInjections($_POST['complaintNo']);
			$Lectureremail=getuserfield('username');
			$lecturerID=getuserInfo('staffID','staff','email',$Lectureremail);

			$message="Lecturer ".$lecturerfname." ".$lecturerlname." has commented on your complaint that, ".$content;
			$query="INSERT INTO comment(content,commentDate,complaintNo,staffID) 
			VALUES('".$message."',now(),'".$complaintNo."','".$lecturerID."')";
			if ($query_run=mysqli_query($link,$query)) {
				
				$Message="You have commented on complaint by student with Reg No <strong>".$Regno."</strong> ";
				$query="UPDATE complaint SET status='commented' WHERE complaintNo='".$complaintNo."'";
				mysqli_query($link,"$query");
				
				$studentemail=getuserInfo('email','student','regNo',$Regno);
				$dept_ID=getuserInfo('dept_ID','staff','email',$Lectureremail);
				$lecturerfname=getuserInfo('fName','staff','email',$Lectureremail);
                $lecturerlname=getuserInfo('lName','staff','email',$Lectureremail);
                $hodID=getuserInfo('hodID','complaint','complaintNo',$complaintNo);

	             //The text notification to a student
				$studentcontact=getuserInfo('contact','student','regNo',$Regno);
				
				//Calling the function to send the notification
				$result=textNotification($studentcontact,$message);
			
				//Account Notification with email notification
				
				$studentNo=getuserInfo('studentNo','student','regNo',$Regno);
				$email[0]=$studentemail; $email[1]=$Lectureremail;
                $userUniqueNo[0]=$studentNo; $userUniqueNo[1]=$lecturerID; $userUniqueNo[2]=$hodID;
                $messagecontent[0]="Your lecturer<strong> ".$lecturerfname." ".$lecturerlname."</strong> has commented on your complaint that, ".$content;
                $messagecontent[1]="You have just commented on a complaint from student with a Reg No <strong> ".$Regno."</strong> that,".$content;

                $messagecontent[2]="Lecturer <strong> ".$lecturerfname." ".$lecturerlname."</strong> has commented on a complaint from a student with a Reg No of <strong> ".$Regno."</strong> as a response";

                //calling the function to send the two notifications
                $result=accountNotification($email,$messagecontent,$userUniqueNo);
               

			}else{
				$errorMessage="Comment failed to be sent, Try again later ".mysqli_error($link);
			}
	        }
    ?>
        <h2 class="inner-tittle">Comment on the Complaint</h2>
        <div class="graph">
        <div class="block-page">
	    <table id="table" class="table">
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
	    </table>
		<form class="form-horizontal" data-toggle="validator" id="formsubmit" method="POST" role = "form">
	    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
           <div class="form-group">
		      <label for="staffID" class="col-sm-2 control-label">Compliant Type</label>
		      <div class="col-sm-9">
		      <input type="text" required id="complainttype" class="form-control input-lg" name="complainttype" value="<?php if (isset($_GET['complainttype'])) { echo $complainttype;}?>" >
		      <input type="hidden" required id="complaintNo" name="complaintNo" value="<?php if (isset($_GET['complaintNo'])) { echo $complaintNo;}?>" >
		      <div class="help-block with-errors"></div>
            </div>
	     </div> 
	     </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
             <div class="form-group">
		      <label for="staffID" class="col-sm-2 control-label">Student Reg No</label>
		      <div class="col-sm-9">
		      <input type="text" required id="regNo" class="form-control input-lg" name="regNo" value="<?php if (isset($_GET['regNo'])) { echo $regNo=$_GET['regNo'];}?>" >
		      <div class="help-block with-errors"></div>
           </div>
	     </div> 
	     </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
		      <label for="content" class="col-sm-2 control-label">Comment</label>
		      <div class="col-sm-9">
		      <textarea required class = "form-control" rows = "3" name="content"></textarea>
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