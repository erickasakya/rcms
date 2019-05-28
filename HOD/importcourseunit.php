<?php
 require 'header.php';
 ?>

 <div class="graph-visual tables-main animated fadeInRight" id="formcontent">
 <?php 
if(isset($_POST["Import"]))
{
  if (!empty($_POST['dept_name']) && $_POST['dept_name'] !="select the department") {

    $filetype = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');

    $dept_ID=$_POST['dept_name'];

    $filename=$_FILES["file"]["tmp_name"];

    if($_FILES["file"]["size"] > 0 && in_array($_FILES['file']['type'],$filetype)){

        $file = fopen($filename, "r");
        //$sql_data = "SELECT * FROM prod_list_1 ";
        $count = 0; 
        $num =0; 
                                               // add this line
      while(($filesop = fgetcsv($file, 1000, ",")) !== false)
        {
          $course_code = $filesop[0];
          $courseunitName = $filesop[1];
          $semester = $filesop[2];
          $yearofstudy = $filesop[3];
          // exit();
          $count++;                                      // add this line

          if($count>1){                                  // add this line
            $sql = "INSERT into courseunit(course_code,courseunitName,semester,yearofstudy,dept_ID) values ('$course_code','$courseunitName','$semester','$yearofstudy','$dept_ID')";
            if (mysqli_query($link,$sql)) {
                     $num++;
                  }else{
                      $errorMessage="Error: 403 Import was unsuccessful!<br/> Please Contact the system Admin";
                  }
          }                                              // add this line
      }
        fclose($file);
        
        if ($num>0) {
            $Message='CSV File has been successfully Imported having '.$num." course unit";
        }else{
             $errorMessage='No importation was done';
        }
        //header('Refresh: 2; url=teachings.php');
    }
    else{
        $errorMessage='Invalid File:Please Upload CSV File';
    }
  }else{
    $errorMessage='Please Choose the department for these course units';
  }
}
?>
     <h2 class="inner-tittle">Import Course units</h2>
        <div class="graph">
           <form action="" enctype="multipart/form-data" method="POST" class="form-horizontal" role="form">
                       <div class="form-group">
                           <legend>Import Course Units for a Department from an Excel sheet</legend>
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
                    <label class="inputDept_name" class="col-sm-2 control-label">Department Name</label>
                         <select name="dept_name" id="inputDept_name" class="col-sm-2 control-label form-control" required="required">
                           <option>select the department</option>
                   <?php
                     $query="SELECT * FROM department";
                     $query_run=mysqli_query($link,$query);
                     while($row=mysqli_fetch_row($query_run)){
                    echo "<option value=".$row[0].">".$row[1]."</option>";
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
