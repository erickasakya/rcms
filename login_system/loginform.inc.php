	<?php
		if (isset($_POST['username']) && isset($_POST['password'])) {
		    
		    $username=$_POST['username'];
		    $pass=$_POST['password'];

		      if (!empty($username) && !empty($pass)) {
			    $pass1=md5($pass);

			    if ($query=mysqli_query($link,"SELECT userID,usertype FROM users WHERE username='$username' AND password='$pass1'")) {
			           
			           $numrows=mysqli_num_rows($query);
				       if ($numrows==1) {
				       	  $row=mysqli_fetch_row($query);
					        $_SESSION['RCMS_user_id']=$row[0];
                            $_SESSION['LAST_ACTIVITY'] = time();
					        $usertype=$row[1];
					       /*The conditional statement determines where to direct a user depending on his usertype*/	
								if($usertype=="student") {
									header("Location: Student/home.php");
								  }else if ($usertype=="lecturer"){
									header("Location: Lecturer/home.php");
								   }else if ($usertype=="H.O.D"){
									header("Location: HOD/home.php");
								   }else if ($usertype=="Admin"){
									header("Location: Administrator/home.php");
								   }else{
								   	die();
								   }
				
			   }else{
			   	$errorMessage= "Wrong Username or Password <br> Please contact System Admin for Assistance";
			   }		
	        
             }else{
             	$errorMessage="Wrong input";
         }
			
 }else{
	$errorMessage="Please Enter both the Username and Password";
     }

}	
?>
<div class="w3layoutscontaineragileits animated fadeInRight">
	<h2>Login here</h2>
		<form action="" class="login" role="form" method="post">
			<?php
            if (isset($errorMessage)) {
            ?>
            
            <script type="text/javascript">
            	if (errorMessage) {
            		demo.showNotification('bottom','left');;
            	}
            </script>

            <div class="alert alert-error"><?php echo $errorMessage;?></div>
                          <?php                    
                         }
                          ?>
             <div class="form-control">
			<input type="text" class="form-group input-lg" name="username" placeholder="REG NO or EMAIL" required="" value="<?php if (isset($username)) {echo $username;}?>">
			<input type="password" name="password" placeholder="STUDENT NO or STAFFID" required="" value="<?php if (isset($pass)) {echo $pass;}?>">
			</div>
			<div class="aitssendbuttonw3ls">
				<input type="submit" class="login" value="LOGIN"><i class="fa fa-check"></i>
			</div>
		</form>
	</div>