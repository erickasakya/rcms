<?php
 require 'header.php';
 ?>
    <div class="row">
      <div class="col-sm-12">
      <div class="graph-visual tables-main animated fadeInRight" id="formcontent">
      <div class="panel-heading">
      <div class="panel-title">Assign Lecturer to a Course Unit</div>
      </div>
      <div class="panel-body" >
      <table id="courseuinttable" class="table">
      <form class="form-inline" method="POST" role = "form">
       <tbody>
 <?php
      if (isset($_POST['program'])) {
      //The code to prevent sql injection
        $academicyear1=sqlInjections($_POST['academicyear']);
        $academicyear=$academicyear1."-".($academicyear1+1);
        $program=$_POST['program'];
        $lecturerID=$_POST['lecturer'];
        $courseunitID=$_POST['courseunit'];

        $num=0;
        $empty=0;
    //The start of the for each loop
   foreach( $program as $key=>$value) {

      if (!empty($academicyear) && !empty($program[$key]) && !empty($lecturerID[$key]) && !empty($courseunitID[$key]) && ($program !="Array") && ($program !="Choose program")) {

          $query ="INSERT INTO teaching VALUES(NULL,'".$lecturerID[$key]."','".$courseunitID[$key]."','".$academicyear."','".$program[$key]."')";

      //The query insertion into the database
          if (mysqli_query($link,$query)) {

            $num++;

              }else{
                echo "<tr><td colspan='3'><div class='alert alert-danger' id=''><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Course unit assignment failed, Please try again</div></td></tr>";
                break;
              }//The end of the query insertion into the database
        }else{
          $empty++;
        }//The end of the statement that tests that all values were filled in the form

  }//End of the foreach loop

      //Displaying the success message
      if ($num>=1) {
        echo "<tr><td colspan='3'><div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Successfully submited the first $num course unit(s)</div></td></tr>";
      }else if($empty>=1){
          echo "<tr><td colspan='3'><div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Please fill in all the fields for the course unit assignment in the $empty row(s)</div></td></tr>";
        }

      }
                  ?><!--End of the insertion script-->
       	<tr>
       		<td>
       			<label for = "semester">Semester</label>
			  <select class="form-control input-lg" name="semester" id="semester" onchange="changeFunc();">
			   <option>Please select the semester</option>
			   <option value="Semester I">Semester I</option>
			   <option value="Semester II">Semester II</option>
			   <option value="Recess">Recess</option>
			   <option value="Internship">Internship</option>
			  </select>
       		</td>
       		<td>
       			<label>Academic year</label>
			     <select class="form-control input-lg" name="academicyear" id="academicyear">
			         <option>Enter the academic year</option>
               <option value="2018">2018-2019</option>
               <option value="2017">2017-2018</option>
               <option value="2016">2016-2017</option>
               <option value="2015">2015-2016</option>
               <option value="2014">2014-2015</option>
               <option value="2013">2013-2014</option>
               <option value="2012">2012-2013</option>
               <option value="2011">2011-2012</option>
               <option value="2010">2010-2011</option>
               <option value="2009">2009-2010</option>
               <option value="2008">2008-2009</option>
               <option value="2007">2007-2008</option>
               <option value="2006">2006-2007</option>
               <option value="2005">2005-2006</option>
               <option value="2004">2004-2005</option>
               <option value="2003">2003-2004</option>
               <option value="2002">2002-2003</option>
               <option value="2001">2001-2002</option>
               <option value="2000">2000-2001</option>
               <option value="1999">1999-2000</option>
               <option value="1998">1998-1999</option>
               <option value="1997">1997-1998</option>
               <option value="1996">1996-1997</option>
               <option value="1995">1995-1996</option>
               <option value="1994">1994-1994</option>
              </select> 
			   
			  </select>
       		</td>
       		<td>
       			<label>Year of study</label>
			  <select class="form-control input-lg" name="yearofstudy" id="yearofstudy" onchange="changeFunc();">
			  <option >select the year of study</option>
			   <option value="Year I">Year I</option>
			   <option value="Year II">Year II</option>
			   <option value="Year III">Year III</option>
			   <option value="Year IV">Year IV</option>
			  </select>
       		</td>
       	</tr>
       	<tr>
       		<td>
       			<label>1<sup>st</sup> Course Unit</label>
			  <select class="form-control input-lg" name="courseunit[]" id="courseunit1">
			   <option>Please select course unit</option>
			  </select>
       		</td>
       		<td>
       			<label>Lecturer</label>
			  <select class="form-control input-lg" name="lecturer[]" id="lecturer1">
			  <option>Select lecturer</option>
			   <?php echo $returnfunction=selectLecture();?>
			  </select>
       		</td>
       		<td>
       			<label>Program</label>
			  <select class="form-control input-lg" name="program[]" id="program">
			  <option>Choose program</option>
			   <option value="Day">Day</option>
			   <option value="Evening">Evening</option>
			   <option value="Both">Both</option>
			  </select>
       		</td>
       	</tr>
       	<tr>
       		<td>
       			<label>2<sup>nd</sup> Course Unit</label>
			  <select class="form-control input-lg" name="courseunit[]" id="courseunit2">
			   <option>Please select course unit</option>
			  </select>
       		</td>
       		
          <td>
       			<label>Lecturer</label>
			  <select class="form-control input-lg" name="lecturer[]" id="lecturer2">
			   <option>Select lecturer</option>
			   <?php echo $returnfunction=selectLecture();?>
			  </select>
			  </select>
       		</td>
       		<td>
       			<label>Program</label>
			  <select class="form-control input-lg" name="program[]" id="program2">
			   <option>Choose program</option>
			   <option value="Day">Day</option>
			   <option value="Evening">Evening</option>
			   <option value="Both">Both</option>
			  </select>
       		</td>
       	</tr>
       	<tr>
       		<td>
       			<label >3<sup>rd</sup> Course Unit</label>
			  <select class="form-control input-lg" name="courseunit[]" id="courseunit3">
			   <option>Please select course unit</option>
			  </select>
       		</td>
       		<td>
       			<label>Lecturer</label>
			  <select class="form-control input-lg" name="lecturer[]" id="lecturer3">
			   <option>Select lecturer</option>
			   <?php echo $returnfunction=selectLecture();?>
			  </select>
			  </select>
       		</td>
       		<td>
       			<label>Program</label>
			  <select class="form-control input-lg" name="program[]" id="program3">
			  <option>Choose program</option>
			   <option value="Day">Day</option>
			   <option value="Evening">Evening</option>
			   <option value="Both">Both</option>
			  </select>
       		</td>
       	</tr>
       	<tr>
       		<td>
       			<label>4<sup>th</sup> Course Unit</label>
			  <select class="form-control input-lg" name="courseunit[]" id="courseunit1">
			   <option>Please select course unit</option>
			  </select>
       		</td>
       		<td>
       			<label>Lecturer</label>
			  <select class="form-control input-lg" name="lecturer[]" id="lecturer4">
			   <option>Select lecturer</option>
			   <?php echo $returnfunction=selectLecture();?>
			  </select>
			  </select>
       		</td>
       		<td>
       		  <label>Program</label>
			  <select class="form-control input-lg" name="program[]" id="program4">
			   <option>Choose program</option>
			   <option value="Day">Day</option>
			   <option value="Evening">Evening</option>
			   <option value="Both">Both</option>
			  </select>
       		</td>
       	</tr>
       	<tr>
       		<td>
       			<label>5<sup>th</sup> Course Unit</label>
			  <select class="form-control input-lg" name="courseunit[]" id="courseunit5">
			  <option>Please select course unit</option>
			  </select>
       		</td>
       		<td>
       			<label class="control-label">Lecturer</label>
			  <select class="form-control input-lg" name="lecturer[]" id="lecturer5">
			   <option>Select lecturer</option>
			   <?php echo $returnfunction=selectLecture();?>
			  </select>
			  </select>
       		</td>
       		<td>
       			<label class="control-label">Program</label>
			  <select class="form-control input-lg" name="program[]" id="program5">
			  <option>Choose program</option>
			   <option value="Day">Day</option>
			   <option value="Evening">Evening</option>
			   <option value="Both">Both</option>
			  </select>
       		</td>
       	</tr>
        <tr>
          <td colspan="3"><button type="submit" class="btn btn-success btn-fill pull-right" id="registercourseunit">Register</button>
          </td>
        </tr>
       </tbody>
       </form>
      </table>
	     </div>
      </div>

       </div>
</div>
<?php
require("../footer.php");
?>