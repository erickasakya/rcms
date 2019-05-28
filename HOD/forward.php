<?php
 require 'header.php';
 $complaintNo=$_GET['complaintNo'];
 $complainttype=$_GET['complaint_type'];
 $regNo=$_GET['regNo'];
 $fName=$_GET['fname'];
 $lName=$_GET['lname'];
 $LecturerID=$_GET['LecturerID'];
 ?>

<div class="graph-visual tables-main animated fadeInRight" id="formcontent">

<?php

	if (isset($_POST['mark'])) {
		
		$complaintNo=$_POST['complaintNo'];
		$Regno=$_POST['regNo'];
		$lecturer=$_POST['lecturer'];
		$LecturerID=$_POST['LecturerID'];
		$query="UPDATE complaint SET approval_status='forwarded',status='forwarded' WHERE complaintNo=".$complaintNo;

		if (mysqli_query($link,$query)) {
			
			   $Message="Complaint has been forwarded successfully";

			    $hodemail=getuserfield('username');
			    $lectureremail=getuserInfo('email','staff','staffID',$LecturerID);
				$studentemail=getuserInfo('email','student','regNo',$Regno);
				$hodfname=getuserInfo('fName','staff','email',$hodemail);
                $hodlname=getuserInfo('lName','staff','email',$hodemail);

	   //           //The text notification to a student
				// $studentcontact=getuserInfo('contact','student','regNo',$Regno);
				// $message="The Academic Registrar ".$adminfname." ".$adminlname." of your college has confirmed that your mark ".$mark."% given to resolve your complaint on course unit ".$code;
				// //Calling the function to send the notification
				// $result=textNotification($studentcontact,$message);
			
				//Account Notification with email notification
				$hodID=getuserInfo('staffID','staff','email',$hodemail);
				$studentNo=getuserInfo('studentNo','student','regNo',$Regno);

				$email[0]=$studentemail; $email[1]=$lectureremail;
                $userUniqueNo[0]=$studentNo; $userUniqueNo[1]=$LecturerID; $userUniqueNo[2]=$hodID;
                $messagecontent[0]="The Head of Department ".$hodfname." ".$hodlname." at your college has forwarded your complaint to lecturer ".$lecturer." waiting for response";

                $messagecontent[1]="Your Head of Department ".$hodfname." ".$hodlname." at your college has forwarded to you a Compliant for student with Reg no<strong> ".$Regno."</strong> waiting for your response soon";

                $messagecontent[2]="You have just forwarded a complaint for student with Reg no<strong> ".$Regno."</strong> to lecturer ".$lecturer.". Thanks";

                //calling the function to send the two notifications
                $result=accountNotification($email,$messagecontent,$userUniqueNo);
                //header('Refresh: 3; url=confirmed.php');
			
		}else{
			$errorMessage="Confirmation failed ".mysqli_error($link);
		}
	}
	?>

    <h2 class="inner-tittle">Forward Complaint to Lecturer</h2>
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
	     <form class="form-horizontal"  data-toggle="validator" method="POST"> 
	     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
           <div class="form-group">
		      <label for="staffID" class="col-sm-2 control-label">Compliant Type</label>
		      <div class="col-sm-9">
		      <input type="text" required id="complainttype" class="form-control input-lg" name="complainttype" value="<?php if (isset($_GET['complaint_type'])) { echo $complainttype;}?>" >
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
	     <label for="lecturer" class="col-sm-2 control-label">Lecturer</label> 
	     <div class="col-sm-9"> 
	       <input type="text" class="form-control input-lg" id="lecturer" name="lecturer" placeholder="Eric Kasakya" value="<?php echo $fName.' '.$lName?>"> 
	       <input type="hidden" id="LecturerID" name="LecturerID" value="<?php echo $LecturerID?>"> 
	     </div>
	     </div> 
	     </div>

	       <div class="form-group">
	          <div class=" col-sm-10 col-sm-offset-2"> 
	          <button type="submit" class="btn btn-success">Forward</button> 
	          <button type="reset" class="btn ">Reset</button>
	          </div> 
	          </div>
	      </form> 
</div>

	</div>
<?php
require("../footer.php");
?>