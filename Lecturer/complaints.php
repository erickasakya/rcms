<?php
 require 'header.php';
?>
   <div class="graph-visual tables-main animated fadeInRight" id="formcontent">
     <h2 class="inner-tittle">Complaints from Students for each course unit taught</h2>
        <div class="graph">
            <div class="block-page">
      <div  id="staffOptions"></div>
            <?php
            $userID=$_SESSION['RCMS_user_id'];
            $lecturerID=getuserInfo('staffID','staff','userID',$userID);
            $query="SELECT complaint.complaintNo,complaint.complaint_type,courseunit.courseunitName,student.regNo,complaint.complaintDate 
            FROM complaint 
            INNER JOIN student ON(complaint.studentNo=student.studentNo)
            INNER JOIN courseunit ON(complaint.course_id=courseunit.id)
            WHERE complaint.lecturerID='".$lecturerID."' AND complaint.status='forwarded'  ORDER BY complaint.complaintDate desc";
            if ($query_run=mysqli_query($link,$query)) {
                ?>
                <table class="table table-striped" id="table2">
                <thead class="thead-default">
                    <tr>
                    <th>Complaint type</th>
                    <th>Course Unit</th>
                    <th>Student's RegNo</th>
                    <th>Complaint Date</th>
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
                        <td><?php echo $row[1];?></td>
                        <td><?php echo $row[2];?></td>
                        <td><?php echo $row[3];?></td>
                        <td><?php echo $row[4];?></td>
                        <td><a href='comment.php?complaintNo=<?php echo $row[0];?> &complainttype=<?php echo $row[1];?> &regNo=<?php echo$row[3];?>'> <button type='button' style='margin:0px; padding=0px;' class='btn btn-default btn-sm'><span class="glyphicon glyphicon-comment"></span>Comment</button> </a>  
                        <button href='entermark.php?complaintNo=<?php echo $row[0];?> &complainttype=<?php echo $row[1];?> &regNo=<?php echo $row[3];?>' type='button' style='margin:0px; padding=0px;' class='btn btn-default btn-sm successicons confirm' data-toggle="modal" data-target="#secretcode"><span class='glyphicon glyphicon-edit'></span>Enter Mark</button></td>
                    </tr>
                    <?php
                        }
                }else{
                    $queryError="No complaint is pending response";
                }
            }else{
                $queryError="Error: 403 Sorry we are unable to show the content of this page!<br/> Please Contact the system Admin";
            }

            if (isset($queryError)) {
                // echo '<tr><td colspan=5><div class="alert alert-danger alert-dismissible">
                //       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                //       <strong>'.$queryError.'</strong>.
                //        </div></td>
                //     </tr>';
            }
            ?>

            </tbody>
        </table>
        </div>
<?php
require("../footer.php");
?>
