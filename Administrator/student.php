<?php
 require 'header.php';
?>
    <div class="graph-visual tables-main animated fadeInRight" id="formcontent">
     <h2 class="inner-tittle">College Students</h2>
        <div class="graph">
            <div class="block-page">
            <?php
            $query="SELECT student.studentNo,student.fName,student.lName,course.short_name, student.yearOfEntry FROM student JOIN course ON(student.course_id=course.course_id)  ORDER BY course.short_name desc";
            if ($query_run=mysqli_query($link,$query)) {
                ?>
                <table class="table table-striped" id="table2">
                <thead class="thead-default">
                    <tr>
                    <th>Student No</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Year of Entry</th>
                    <th>Course Name</th>
                   <!--  <th>Actions</th> -->
                    </tr>
                </thead>                    
                <tbody>
                <?php

                $numrows=mysqli_num_rows($query_run);
                if ($numrows>0) {
                    while ($row=mysqli_fetch_array($query_run)) {
                        ?>
                        <tr>
                        <td><?php echo $row[0];?></td>
                        <td><?php echo $row[1];?></td>
                        <td><?php echo $row[2];?></td>
                        <td><?php echo $row[4];?></td>
                        <td><?php echo $row[3];?></td>
                        <!-- <td><a href='comment.php?complaintNo="<?php echo $row[0];?>" &regNo="<?php echo$row[3];?>"'> <button type='button' style='margin:0px; padding=0px;' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-edit'></span>Edit</button> </a>  
                        <a href='entermark.php?complaintNo="<?php echo $row[0];?>" &complainttype="<?php echo $row[1];?>" &regNo="<?php echo $row[3];?>"'><button type='button' style='margin:0px; padding=0px;' class='btn btn-default btn-sm'><i class="fa fa-trash-o">Delete</button></a></td> -->
                        </tr>
                          <?php
                        }
                }else{
                    $queryError="There are no students yet in your college";
                }
            }else{
                $queryError="Error: 403 Sorry we are unable to show the content of this page!<br/> Please Contact the system Admin";
            }

            if (isset($queryError)) {
                echo '<tr><td colspan=5><div class="alert alert-danger alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>'.$queryError.'</strong>.
                       </div></td>
                    </tr>';
            }
            ?>

            </tbody>
        </table>
        </div>
<?php
require("../footer.php");
?>