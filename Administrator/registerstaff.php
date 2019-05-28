<?php
 require 'header.php';

if (isset($_POST['fname'])) {

   if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['DOB']) && !empty($_POST['gender']) && !empty($_POST['email']) && !empty($_POST['staffID'])){
          $errorMessage = "";
            $errorMessage; 
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
              $errorMessage = "Invalid email address"; 
            }
          if ($errorMessage != "") {
                
              }else{
                   $fname=sqlInjections($_POST['fname']);
                   $lname=sqlInjections($_POST['lname']);
                   $DOB=sqlInjections($_POST['DOB']);
                   $country="Uganda";
                   $tel="+256772765489";
                   $email=sqlInjections($_POST['email']);
                   $gender=sqlInjections($_POST['gender']);
                   $staffType="lecturer";
                   $staffID=sqlInjections($_POST['staffID']);
                   $dept_ID=sqlInjections($_POST['department']);
                   
                   $query="INSERT INTO users(username,password,usertype) VALUES('".$email."','".md5($staffID)."','".$staffType."')";
                  
                  if (mysqli_query($link,$query)) {
                    
                    $query1="SELECT MAX(userID) FROM users";
                    $query1run=mysqli_query($link,$query1);
                    $row=mysqli_fetch_row($query1run);
                    $userID=$row[0];

                    $query = "INSERT INTO staff(staffID,fname,lname,DOB,gender,nationality,contact,email,staffType,dept_ID,userID) VALUES('".$staffID."','".$fname."','".$lname."','".$DOB."','".$gender."','".$country."','".$tel."','".$email."','".$staffType."','".$dept_ID."','".$userID."')";
                   

                    if (mysqli_query($link,$query)) {

                        $Message= "Staff ".$fname." ".$lname." has successfully been registered, User account has been created too";
                      
                     }else{
                      $errorMessage= "Could not register staff ".$fname." ".$lname." ".mysqli_error($link);
                     }
                     
                  }else{
                    $errorMessage= "Staff could not become a user-- Please contact the system Admin".mysqli_error($link);
                  }
             }
                        
  	 }else{
             	$errorMessage= "Please Enter all the staff details";
             }
  }
?>
      <div class="row">
<div class="col-sm-12">
      <div class="panel panel-info animated fadeInRight" >
      <div class="panel-heading">
      <div class="panel-title">Register Staff</div>
      </div>
      <div class="panel-body" >
      <table class="table">
	      <form method="post" data-toggle="validator" action="" class="form-inline">
         <?php
             if (isset($errorMessage) && $errorMessage != "") {
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
		      <div class="input-group form-group" >
		      <span class="input-group-addon">First name</span>
		      <input  type="text" class="form-control input-lg" required id="fname"  name="fname" autofocus placeholder="Eric">
          <div class="help-block with-errors"></div></div>
          
          </td>
		      <td>
          <div class="form-group input-group">
		      <span class="input-group-addon">Last name</span>
		      <input type="text" class="form-control input-lg" id="lname" name="lname" placeholder="Kasakya" data-toggle="validator" required><div class="help-block with-errors"></div> </div>
          </td></tr>
		      <tr><td>
		      <div class="form-group input-group">
			  <span class="input-group-addon">Country</span>
			  <select class="form-control input-lg" name="listcountry" id="listcountry" required>
        <div class="help-block with-errors"></div>
			   <input type="hidden" name="country" id="country" />
			  </select>
			  </div></td><td>
			  <div class="input-group inputgroups">
		      <input id="tel" type="text" class="form-control input-lg" name="tel" required>
          <div class="help-block with-errors"></div>
          <input type="hidden" name="telfull" id="telfull" /></div></td>
		      </tr>
		      <tr><td>
		      <div class="input-group inputgroups">
		      <span class="input-group-addon">Email Address</span>
		      <input type="email" data-toggle="validator" required id="email"  class="form-control input-lg" name="email" placeholder="er@gmail.com"><div class="help-block with-errors"></div></div></td><td>
		      <div class="input-group inputgroups">
		      <span class="input-group-addon">Date of Birth</span>
		      <input id="DOB" type="text" class="form-control input-lg" name="DOB" placeholder="" data-toggle="validator" required></div><div class="help-block with-errors"></div></td></tr>

		      <tr>
		      <td>
              <div class="input-group inputgroups">
		      <span class="input-group-addon">Staff ID</span>
		      <input type="text" id="staffID" class="form-control input-lg" name="staffID" placeholder="SCIT01" required ><div class="help-block with-errors"></div>
            </div>
		      </td>
		      <td>
		      <label class="radio-inline">
          <input type="radio" name="gender" value="M" id="gender" checked > Male</label>
              <label class="radio-inline">
              <input type="radio" name="gender" required value="F" id="gender"> Female</label></td>
            </tr>
            <td>
              <label>Department</label>
              <select required class="form-control input-lg" name="department" id="department">
              <option>select the department</option>
              <?php
                  $query="SELECT * FROM department";
                  $query_run=mysqli_query($link,$query);
                  while($row=mysqli_fetch_row($query_run)){
                    echo "<option value=".$row[0].">".$row[1]."</option>";
                  }?>
              </select>
            </td>
              <td>
               <button type="submit" class="btn btn-success" id="registerstaff">Register</button>
               <button type="reset" class="btn">Reset</button>
               </td></tr>
	      </form>
        </table>
	     </div>
      </div>

       </div>
</div>
<?php
require("../footer.php");
?>