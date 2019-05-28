<?php
 require 'header.php';
 $complaintNo=$_GET['complaintNo'];
 $mark=$_GET['mark'];
 $regNo=$_GET['regNo'];
 $coursecode=$_GET['coursecode'];
 ?>

<div class="graph-visual tables-main animated fadeInRight" id="formcontent">

<?php

	if (isset($_POST['mark'])) {
		
		$complaintNo=$_POST['complaintNo'];
		$Regno=$_POST['regNo'];
		$mark=$_POST['mark'];
		$code=$_POST['coursecode'];
		$query="UPDATE complaint SET confirmation='updated',confirmation_date=now() WHERE complaintNo=".$complaintNo;

		if (mysqli_query($link,$query)) {
			
			   $Message="Confirmation has been successfully received";

			    $adminemail=getuserfield('username');
				$studentemail=getuserInfo('email','student','regNo',$Regno);
				$adminfname=getuserInfo('fName','staff','email',$adminemail);
                $adminlname=getuserInfo('lName','staff','email',$adminemail);

	             //The text notification to a student
				$studentcontact=getuserInfo('contact','student','regNo',$Regno);
				$message="The Academic Registrar ".$adminfname." ".$adminlname." of your college has confirmed that your mark ".$mark."% given to resolve your complaint on course unit ".$code;
				//Calling the function to send the notification
				$result=textNotification($studentcontact,$message);
			
				//Account Notification with email notification
				$adminID=getuserInfo('staffID','staff','email',$adminemail);
				$hodID=getuserInfo('hodID','complaint','complaintNo',$complaintNo);
				$studentNo=getuserInfo('studentNo','student','regNo',$Regno);

				$email[0]=$studentemail; $email[1]=$adminemail;
                $userUniqueNo[0]=$studentNo; $userUniqueNo[1]=$adminID; $userUniqueNo[2]=$hodID;
                $messagecontent[0]=$message;

                $messagecontent[2]="The mark ".$mark."%  you approved for student with Reg no<strong> ".$Regno."</strong> has reflected on the Results, done by the Academic Registrar ".$adminfname." ".$adminlname;

                $messagecontent[1]="You have just confirmed that update of the Results system with mark<strong> ".$mark."% for student with Reg No ".$Regno." was done";

                //calling the function to send the two notifications
                $result=accountNotification($email,$messagecontent,$userUniqueNo);
			header('Refresh: 3; url=confirmed.php');
		}else{
			$errorMessage="Confirmation failed ".mysqli_error($link);
		}
	}
	?>

    <h2 class="inner-tittle">Confirm update of Marks on Result System</h2>
    <div class="graph">
    <?php
                if (isset($errorMessage)) {
              ?>
              <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $errorMessage;?>
              </div>

              <?php                    
                  }elseif(isset($Message)) {
               ?>
                  <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $Message;?>
                  </div>
                 <?php }?>

       <div class="block-page">
	     <form class="form-horizontal" method="POST"> 
		
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
           <div class="form-group">
	     <label for="coursecode" class="col-sm-2 control-label">Course Code</label> 
	     <div class="col-sm-9"> 
	       <input type="text" class="form-control" id="coursecode" name="coursecode" placeholder="BIT 3211" value="<?php echo $coursecode;?>"> 
	     </div>
	     </div> 
	     </div>

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
           <div class="form-group">
	     <label for="mark" class="col-sm-2 control-label">Mark</label> 
	     <div class="col-sm-9"> 
	       <input type="text" class="form-control" id="mark" name="mark" placeholder="80%" value="<?php echo $mark;?>"> 
	     </div>
	     </div> </div>

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
           <div class="form-group">
	      <label for="regNo" class="col-sm-2 control-label">Student RegNo</label> 
	       <div class="col-sm-9"> 
	        <input type="text" class="form-control" name="regNo" id="regNo" placeholder="14/U/4342/ps" value="<?php echo $regNo;?>">
	       </div>
	       </div>
	       </div>

	       <div class="form-group">
	          <div class=" col-sm-10 col-sm-offset-2"> 
	          <button type="submit" class="btn btn-success">Confirm</button> 
	          <button type="reset" class="btn " id="registerstaff">Reset</button>
	          </div> 
	          <input type="hidden" name="complaintNo" value="<?php echo $complaintNo;?>">
	          </div>
	      </form> 
</div>

	</div>
<?php
require("../footer.php");
?>