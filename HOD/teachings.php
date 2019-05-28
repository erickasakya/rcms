<?php
 require 'header.php';
?> <div class="graph-visual tables-main animated fadeInRight" id="formcontent">
     <h2 class="inner-tittle">Staff Teachings</h2>
        <div class="graph">
            <div class="block-page">
            <div  id="staffOptions"></div>
                <?php
            $query="SELECT staff.staffID,staff.fName,staff.lName,courseunit.courseunitName,teaching.academicyear,teaching.teachingID,teaching.program,courseunit.yearofstudy,teaching.course_id,courseunit.Semester
            FROM teaching 
            JOIN courseunit ON(teaching.course_id=courseunit.id) 
            JOIN staff ON(teaching.staffID=staff.staffID)  
            ORDER BY teaching.academicyear desc";
            if ($query_run=mysqli_query($link,$query)) {
                ?>
                <table class="table table-striped" id="table2">
                <thead class="thead-default">
                    <tr>
                    <th>Staff Name</th>
                    <th>Course Unit</th>
                    <th>Academic Year</th>
                    <th>Program</th>
                    <th>Year of study</th>
                    <th>Semester</th>
                    <th>Actions</th>
                    </tr>
                </thead>                    
                <tbody>
                <?php

                $numrows=mysqli_num_rows($query_run);
                if ($numrows>0) {
                    while ($row=mysqli_fetch_array($query_run)) {
                        ?>
                        <tr>
                        <td><?php echo $row[1]." ".$row[2];?></td>
                        <td><?php echo $row[3];?></td>
                        <td><?php echo $row[4];?></td>
                        <td><?php echo $row[6];?></td>
                        <td><?php echo $row[7];?></td>
                        <td><?php echo $row[9];?></td>
                        <td><a href='editTeaching.php?staffID=<?php echo $row[0];?>&course_id=<?php echo $row[8];?>&teachingID=<?php echo $row[5];?> &yearofstudy=<?php echo $row[7]; ?>&lecturer=<?php echo $row[1].$row[2]; ?> &academicyear=<?php echo $row[4]; ?> &courseunit=<?php echo $row[3]; ?>&program=<?php echo $row[6]; ?>'><button type='button' style='margin:0px; padding=0px;' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-edit'></span>Edit</button> </a>  
                        <button onclick="return confirmdelete('<?php echo $row[5]; ?>')" type='button' style='margin:0px; padding=0px;' class='btn btn-default btn-sm'><i class="fa fa-trash-o">Delete</button></td>
                        </tr>
                    <?php
                        }
                }else{
                    $queryError="No teaching records have been entered before, You can enter teaching records by Visiting the Register Teaching page above";
                }
            }else{
                $queryError="Error: 403 Sorry we are unable to show the content of this page!<br/> Please Contact the system Admin";
            }

            if (isset($queryError)) {
                echo '<tr><td colspan=7><div class="alert alert-danger alert-dismissible">
                      <strong>'.$queryError.'</strong>.
                       </div></td>
                    </tr>';
            }
            ?>

            </tbody>
        </table>
        </div>
        <?php include 'modals.php'; ?>
        <script>
           
        </script>
<?php
require("../footer.php");
?>