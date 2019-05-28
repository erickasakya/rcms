<?php
 require 'header.php';
 if (isset($_POST['fname'])) {


   if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['DOB']) && !empty($_POST['gender']) && !empty($_POST['email']) && !empty($_POST['course_id'])){
           
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
              $errorMessage = "Invalid email address"; 
            }else{
                   $fname=sqlInjections($_POST['fname']);
                   $lname=sqlInjections($_POST['lname']);
                   $DOB=sqlInjections($_POST['DOB']);
                   $country="Uganda";
                   $tel="+256750538391";
                   $email=sqlInjections($_POST['email']);
                   $gender=sqlInjections($_POST['gender']);
                   $studentType="student";
                   $year=sqlInjections($_POST['yearOfEntry']);
                   $course_id=sqlInjections($_POST['course_id']);
                   $program=sqlInjections($_POST['program']);
                   $regNo=sqlInjections($_POST['regNo']);
                   $studentNo=sqlInjections($_POST['studentNo']);

                   $year2=$year+1;
                   $yearOfEntry=$year."-".$year2;


                   $query="INSERT INTO users(username,password,usertype) VALUES('".$regNo."','".md5($studentNo)."','".$studentType."')";
                  
                  if (mysqli_query($link,$query)) {
                    
                    $query1="SELECT MAX(userID) FROM users";
                    $query1run=mysqli_query($link,$query1);
                    $row=mysqli_fetch_row($query1run);
                    $userID=$row[0];

                    $query = "INSERT INTO student(studentNo,regNo,fname,lname,program,gender,DOB,yearOfEntry,nationality,contact,email,course_id,userID) VALUES('".$studentNo."','".$regNo."','".$fname."','".$lname."','".$program."','".$gender."','".$DOB."','".$yearOfEntry."','".$country."','".$tel."','".$email."','".$course_id."','".$userID."')";
                   

                    if (mysqli_query($link,$query)) {
                      $Message= "Student ".$fname." ".$lname." has successfully been registered";
                     }else{
                      $errorMessage= "Could not register student ".$fname." ".$lname." ".mysqli_error($link);
                     }
                     
                  }else{
                    $errorMessage= "Student could not become a user-- Please contact the system Admin".mysqli_error($link);
                  }
             }
                        
  	 }else{
             	$errorMessage= "Please Enter all details";
             }
  }
?>
      <div class="row">
      <div class="col-sm-12">
      <div class="panel panel-info animated fadeInRight" id="formcontent">
      <div class="panel-heading">
      <div class="panel-title">Register student of your college</div>
      </div>
      <div class="panel-body" >
      <table id="stafftable" class="table">
	      <form method="post" action="" class="form-inline" id="formsubmit">
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
        <tr><td>
		      <div class="alert alert-success" id="loginsuccess" animated fadeInLeft" style="display:none;"></div></td><td>
		      <div class="alert alert-danger" id="loginfailure" animated fadeInLeft" style="display:none;"></div></td>
		      </tr>
		      <tr>
		      <td>
		      <div class="input-group inputgroups" >
		      <span class="input-group-addon">First name</span>
		      <input id="fname" type="text" class="form-control input-lg" name="fname" autofocus placeholder="Eric" value="<?php if (isset($fname)) {
                                          echo $fname;
                                        }?>"></div></td>
		      <td><div class="input-group inputgroups">
		      <span class="input-group-addon">Last name</span>
		      <input id="lname" type="text" class="form-control input-lg" name="lname" placeholder="Kasakya" value="<?php if (isset($lname)) {
                                          echo $lname;
                                        }?>"> </div></td></tr>
          <tr>
            <td><div class="input-group inputgroups" >
              <span class="input-group-addon">Student No</span>
               <input id="studentNo" type="text" class="form-control input-lg" name="studentNo" placeholder="214000120" value="<?php if (isset($studentNo)) {
                                          echo $studentNo;
                                        }?>"></div>
            </td>
            <td><div class="input-group inputgroups">
               <span class="input-group-addon">Reg No</span>
               <input id="regNo" type="text" class="form-control input-lg" name="regNo" placeholder="14/U/375" value="<?php if (isset($regNo)) {
                                          echo $regNo;
                                        }?>"> </div></td>
          </tr>
          <tr>
            <td><label>Course</label>
              <select class="form-control input-lg" name="course_id" id="course">
              <option>select course</option>
               <?php
                     $query="SELECT * FROM course";
                     $query_run=mysqli_query($link,$query);
                     while($row=mysqli_fetch_row($query_run)){
                    echo "<option value=".$row[0].">".$row[2]."</option>";
                  }?>
              </select>
            </td>
            <td><label>Program</label>
              <select class="form-control input-lg" name="program" id="program">
              <option>Choose program</option>
               <option value="Day">Day</option>
               <option value="Evening">Evening</option>
              </select>
            </td>
          </tr>
          <tr><td>
          <div class="form-group input-group">
        <span class="input-group-addon">Country</span>
        <select class="form-control input-lg" name="listcountry" id="studentlistcountry">
         <input type="hidden" name="country" id="studentcountry" />
        </select>
        </div></td><td>
        <div class="input-group inputgroups">
          <input id="studenttel" type="text" class="form-control input-lg" name="studenttel"><input type="hidden" name="studenttelfull" id="studenttelfull" /></div></td>
          </tr>
		      <tr><td>
		      <div class="input-group inputgroups">
		      <span class="input-group-addon">Email Address</span>
		      <input type="email" data-validation-email-message="This email is invalid" id="email"  class="form-control input-lg" name="email" placeholder="er@gmail.com" value="<?php if (isset($pass)) {
                                          echo $pass;
                                        }?>"><p class="help-block"></p></div></td><td>
		      <div class="input-group inputgroups">
		      <span class="input-group-addon">Date of Birth</span>
		      <input id="DOB" type="text" class="form-control input-lg" name="DOB" placeholder=""></div></td></tr>
		      <tr>
          <td>
          <label>Year of Entry</label>
              <select class="form-control input-lg" name="yearOfEntry" id="yearOfEntry">
              <option>Choose year of entry</option>
               <option value="2017">2017</option>
               <option value="2016">2016</option>
               <option value="2015">2015</option>
               <option value="2014">2014</option>
               <option value="2013">2013</option>
               <option value="2012">2012</option>
               <option value="2011">2011</option>
               <option value="2010">2010</option>
               <option value="2009">2009</option>
               <option value="2008">2008</option>
               <option value="2007">2007</option>
               <option value="2006">2006</option>
               <option value="2005">2005</option>
               <option value="2004">2004</option>
               <option value="2003">2003</option>
               <option value="2002">2002</option>
               <option value="2001">2001</option>
               <option value="2000">2000</option>
               <option value="1999">1999</option>
               <option value="1998">1998</option>
               <option value="1997">1997</option>
               <option value="1996">1996</option>
               <option value="1995">1995</option>
               <option value="1994">1994</option>
              </select>
           
          </td>
          <td>
          <label>Gender</label><br/>
            <label class="radio-inline"><input type="radio" name="gender" value="M" id="gender" checked > Male</label>
              <label class="radio-inline"><input type="radio" name="gender" value="F" id="gender"> Female</label>
          </td>
          </tr>
          <tr><td colspan="1">
            
          </td>
		      <td>
               <button type="submit" class="btn btn-success" id="registerstudent">Register</button><button type="reset" class="btn">Reset</button>
          </td>
        </tr>
	      </form></table>
	     </div>
      </div>

       </div>
</div>
<?php
require("../footer.php");
?>