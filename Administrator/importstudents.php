<?php
 require 'header.php';
 ?>

 <div class="graph-visual tables-main animated fadeInRight" id="formcontent">
 <?php 
if(isset($_POST["Import"])){

  if (!empty($_POST['course_name']) && $_POST['course_name'] !="select the course") {

    $filetype = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
     
    $course_id=$_POST['course_name'];

    $filename=$_FILES["file"]["tmp_name"];

    if($_FILES["file"]["size"] > 0 && in_array($_FILES['file']['type'],$filetype)){

        $file = fopen($filename, "r");
        //$sql_data = "SELECT * FROM prod_list_1 ";
        $count = 0; 
        $num =0; 
        $ok=true;   
        $error=0;                 
      while(($filesop = fgetcsv($file, 1000, ",")) !== false)
        {
          $studentNo = $filesop[0];
          $regNo = $filesop[1];
          $fname = $filesop[2];
          $lname = $filesop[3];
          $program = $filesop[4];
          $gender = $filesop[5];
          $DOB = $filesop[6];
          $yearOfEntry = $filesop[7];
          $country = $filesop[8];
          $tel = "+".$filesop[9];
          $email = $filesop[10];
          $studentType="student";
          // exit();
          $count++;                                      // add this line
          if($count>1){  

              //   if ( strlen($email) && preg_match("/^[a-z0-9._+-]{1,64}@(?:[a-z0-9-]{1,63}\.){1,125}[a-z]{2,63}$/", $email) > 0) {

              //   if (! check_email($email)) {
              //     $ok = false;
              //     $errorMessage ="E-mail address is not correct.";
              //   }
              // }
                  if ($ok) {

                    $query="INSERT INTO users(username,password,usertype,last_logOn) VALUES('".$regNo."','".md5($studentNo)."','".$studentType."',now())";
                  
                  if (mysqli_query($link,$query)) {
                    
                    $query1="SELECT MAX(userID) FROM users";
                    $query1run=mysqli_query($link,$query1);
                    $row=mysqli_fetch_row($query1run);
                    $userID=$row[0];

                    $query = "INSERT INTO student(studentNo,regNo,fname,lname,program,gender,DOB,yearOfEntry,nationality,contact,email,course_id,userID) VALUES('".$studentNo."','".$regNo."','".$fname."','".$lname."','".$program."','".$gender."','".$DOB."','".$yearOfEntry."','".$country."','".$tel."','".$email."','".$course_id."','".$userID."')";
                   
                    if (mysqli_query($link,$query)) {
                     $num++;
                     }else{
                      $error++;
                     }
                     
                  }else{
                    $error++;
                    $errorMessage=$error." Students failed to Import successfully!<br/> Please Contact the system Admin";
                  }
                }
            
        } 
      }
        fclose($file);
        
        if ($num>0) {
            $Message='CSV File has been successfully Imported having '.$num." students";
        }
        //header('Refresh: 2; url=teachings.php');
    }else{
        $errorMessage='Invalid File:Please Upload CSV File';
    }
  }else{
    $errorMessage='Please Choose the course for these Students';
  }
}
?>
     <h2 class="inner-tittle">Import Students</h2>
        <div class="graph">
           <form action="" enctype="multipart/form-data" method="POST" class="form-horizontal" role="form">
                       <div class="form-group">
                           <legend>Import students for a Department from an Excel sheet</legend>
                       </div>
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

                 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                 <div class="form-group">
                    <label class="inputCourse_name" class="col-sm-2 control-label">Course Name</label>
                         <select name="course_name" id="inputCourse_name" class="col-sm-2 control-label form-control" required="required">
                           <option>select the course</option>
                   <?php
                     $query="SELECT * FROM course";
                     $query_run=mysqli_query($link,$query);
                     while($row=mysqli_fetch_row($query_run)){
                    echo "<option value=".$row[0].">".$row[2]."</option>";
                  }?>
                         </select>
                   </div>
                 </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                       <div class="form-group">
                           <label class="file" class="col-sm-2 control-label">File Name</label>
                           <br/>
                           <div class="col-sm-10">
                               <input type="file" name="file" id="file" value="" required="required" title="">
                           </div>
                       </div>
               </div>
               
                       <div class="form-group">
                           <div class="col-sm-10 col-sm-offset-2">
                               <button type="submit" class="btn btn-success" name="Import">Import</button>
                           </div>
                       </div>
               </form>
</div>

	</div>
<?php
require("../footer.php");
?>
