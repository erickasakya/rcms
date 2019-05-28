<?php
 require 'header.php';
?>
    <div class="panel panel-info animated fadeInRight" id="formcontent">
      <div class="panel-heading">
      <div class="panel-title">Resolve the complaint</div>
      </div>
      <div class="panel-body" >
     <?php
        
        $complainttype=sqlInjections($_GET['complainttype']);
	    if (isset($complainttype) && ($complainttype !="Missing all")) {
	    	$complaintNo=sqlInjections($_GET['complaintNo']);
	    	$complainttype=sqlInjections($_GET['complainttype']);
	    	$regNo=sqlInjections($_GET['regNo']);
	    }else{
	    	$complaintNo=sqlInjections($_GET['complaintNo']);
	    	$complainttype=sqlInjections($_GET['complainttype']);
	    	$regNo=sqlInjections($_GET['regNo']);
	    	$url="complainttype=$complainttype&complaintNo=$complaintNo&regNo=$regNo";
	    	header("Location: missingall.php?".$url);
	    }
	    if (isset($_POST['mark'])) {
	    	
	    if (!empty($_POST['mark']) && !empty($_POST['markName'])) {
	    	$Regno=sqlInjections($_POST['regNo']);
	    	$markName=sqlInjections($_POST['markName']);
			$Mark=sqlInjections($_POST['mark']);
			$complaintNo=sqlInjections($_POST['complaintNo']);
			$content=sqlInjections($_POST['content']);
			$Lectureremail=getuserfield('username');
			$lecturerID=getuserInfo('staffID','staff','email',$Lectureremail);

			$query="INSERT INTO mark(markName,mark,entryDate,complaintNo,staffID,Comment) 
			VALUES('".$markName."','".$Mark."',now(),'".$complaintNo."','".$lecturerID."','".$content."')";
			if ($query_run=mysqli_query($link,$query)) {
				$Message="You have given ".$Mark." as the ".$markName." on complaint made by student with Reg No <strong>".$Regno."</strong> ";
				$query="UPDATE complaint SET status='workedon' WHERE complaintNo='".$complaintNo."'";
				mysqli_query($link,"$query"); 
				
				$studentemail=getuserInfo('email','student','regNo',$Regno);
				$dept_ID=getuserInfo('dept_ID','staff','email',$Lectureremail);
				$lecturerfname=getuserInfo('fName','staff','email',$Lectureremail);
                $lecturerlname=getuserInfo('lName','staff','email',$Lectureremail);
                $hodID=getuserInfo('hodID','complaint','complaintNo',$complaintNo);
	             //The text notification to a student
				$studentcontact=getuserInfo('contact','student','regNo',$Regno);
				$message="Lecturer ".$lecturerfname." ".$lecturerlname." has given You ".$Mark." as the ".$markName." for your complaint, Please check up on the RCMS for confirmation";
				//Calling the function to send the notification
				$result=textNotification($studentcontact,$message);
			
				//Account Notification with email notification
				
				$studentNo=getuserInfo('studentNo','student','regNo',$Regno);

				$email[0]=$studentemail; $email[1]=$Lectureremail;

                $userUniqueNo[0]=$studentNo;$userUniqueNo[1]=$lecturerID;$userUniqueNo[2]=$hodID;
                $messagecontent[0]="Your lecturer<strong> ".$lecturerfname." ".$lecturerlname."</strong> has given you ".$Mark." as the ".$markName."on your complaint please check it out.";
                $messagecontent[1]="You have just given you ".$Mark."% as the ".$markName." on a complaint from student with a Reg No <strong> ".$Regno."</strong>";

                $messagecontent[2]="Lecturer <strong> ".$lecturerfname." ".$lecturerlname."</strong> has given ".$Mark." as the ".$markName." on a complaint from a student with a Reg No of <strong> ".$Regno."</strong>";

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
		<form class="form-horizontal" data-toggle="validator"  method="POST" role = "form">
	    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
		      <label for="staffID" class="col-sm-2 control-label">Compliant Type</label>
		      <div class="col-sm-9">
		      <input type="text" required id="complainttype" class="form-control input-lg" name="complainttype" value="<?php if (isset($_GET['complainttype'])) { echo $complainttype;}?>"  >
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
		      <label for="content" class="col-sm-2 control-label">Mark Name</label>
		      <div class="col-sm-9">
		      <input type="text" required name="markName" id="markName" placeholder="Exam mark" class = "form-control input-lg">
		      <div class="help-block with-errors"></div>
		   </div>
		    </div> 
	     </div>

		   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
           <div class="form-group">
		      <label for="content" class="col-sm-2 control-label">Enter mark</label>
		      <div class="col-sm-9">
		      <input type="number" required name="mark" id="mark" placeholder="80" class = "form-control input-lg">
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