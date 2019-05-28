<?php
 require 'header.php';
 $complaintNo=$_GET['complaintNo'];
 $mark=$_GET['mark'];
 $regNo=$_GET['regNo'];
 $fname=$_GET['fname'];
 $lname=$_GET['lname'];
 $leturername= $fname." ".$lname;
 $comment=$_GET['comment'];
 ?>
<div class="graph-visual tables-main animated fadeInRight" id="formcontent">
	<h3 class="inner-tittle two">Approve Mark from the Lecturer</h3>
	 <div class="graph">

	<form class="form-horizontal" method="POST"> 
	<?php

	if (isset($_POST['mark'])) {
		
		$complaintNo=$_POST['complaintNo'];
		$Regno=$_POST['regNo'];
		$mark=$_POST['mark'];
		$lecturer=$_POST['leturername'];
		$query="UPDATE complaint SET approvalDate=now(),approval_status='approved' WHERE complaintNo=".$complaintNo;

		if (mysqli_query($link,$query)) {
			
			$Message="Approval done successfully";

			    $hodemail=getuserfield('username');
				$studentemail=getuserInfo('email','student','regNo',$Regno);
				$hodfname=getuserInfo('fName','staff','email',$hodemail);
                $hodlname=getuserInfo('lName','staff','email',$hodemail);
                

	             //The text notification to a student
				$studentcontact=getuserInfo('contact','student','regNo',$Regno);
				$message="The Head of Department ".$hodfname." ".$hodlname." has approved your mark ".$mark."% given by lecturer ".$lecturer;
				//Calling the function to send the notification
				$result=textNotification($studentcontact,$message);
			
				//Account Notification with email notification
				$hodID=getuserInfo('staffID','staff','email',$hodemail);
				$lecturerID=getuserInfo('lecturerID','complaint','complaintNo',$complaintNo);
				$studentNo=getuserInfo('studentNo','student','regNo',$Regno);

				$email[0]=$studentemail; $email[1]=$hodemail;
                $userUniqueNo[0]=$studentNo; $userUniqueNo[2]=$lecturerID; $userUniqueNo[1]=$hodID;
                $messagecontent[0]="The head of Department <strong> ".$hodfname." ".$hodlname."</strong> has approved the Mark ".$mark."% you were given by Lecturer <strong>".$lecturer."</strong>";

                $messagecontent[2]="The mark you gave student with <strong> ".$Regno."</strong> has been approved by the Head of Department";

                $messagecontent[1]="You have just approved <strong>".$mark."% of student with Reg No ".$Regno." which Lecturer ".$lecturer." had given";

                //calling the function to send the two notifications
                $result=accountNotification($email,$messagecontent,$userUniqueNo);
			    //header('Refresh: 2; url=approved.php');
		}else{
			$errorMessage="Approval failed ".mysqli_error($link);
		}
	}
	?>
	 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	  <?php
             if (isset($errorMessage) && $errorMessage != "") {
              ?>
              <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $errorMessage;?></div>
              <?php                    
             }elseif(isset($Message)) {
               ?>
              <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $Message;?></div>
              <?php
             }
              ?>
                 <div class="form-group"> 
	     <label for="mark" class="col-sm-2 control-label">Mark</label> 
	     <div class="col-sm-9"> 
	       <input type="text" class="form-control" id="mark" name="mark" placeholder="80%" value="<?php echo $mark;?>"> 
	     </div>
	     </div> 
	     </div>
	     
	     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
           <div class="form-group">
	     <label for="mark" class="col-sm-2 control-label">Lecturer's Name</label> 
	     <div class="col-sm-9"> 
	       <input type="text" class="form-control" id="leturername" name="leturername" placeholder="Mr Emmanuel Mugejjera" value="<?php echo $leturername;?>"> 
	     </div>
	     </div> 
	     </div>

	     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <div class="form-group"> 
	      <label for="regNo" class="col-sm-2 control-label">For</label> 
	       <div class="col-sm-9"> 
	        <input type="text" class="form-control" name="regNo" id="regNo" placeholder="14/U/4342/ps" value="<?php echo $regNo;?>">
	       </div>
	       </div>
	       </div>

	       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="form-group"> 
	        <label for="comment" class="col-sm-2 control-label">Lecturer's comment</label> 
	       <div class="col-sm-9"> 
	        <input type="text" class="form-control" name="comment" id="comment" value="<?php echo $comment;?>"/>
	        <div class="help-block with-errors"></div>
	       </div>
	       </div></div>
      <div class="form-group">
           <div class="col-sm-10 col-sm-offset-2">
            <button type="submit" class="btn btn-success">Approve</button> <button type="reset" class="btn " >Reset</button></div> 
	          <input type="hidden" name="complaintNo" value="<?php echo $complaintNo;?>">
	          </div>
	      </form> 
	</div>
	</div>
<?php
require("../footer.php");
?>
