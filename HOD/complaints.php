<?php
 require 'header.php';
?>
    <div class="graph-visual tables-main animated fadeInRight" id="formcontent">
     <h2 class="inner-tittle">Complaints from Students</h2>
        <div class="graph">
            <div class="block-page">
            <div  id="staffOptions"></div>
                <?php
            $userID=$_SESSION['RCMS_user_id'];
            $hodID=getuserInfo('staffID','staff','userID',$userID);
            $query="SELECT complaint.complaint_type,courseunit.courseunitName,staff.fName,staff.lName,student.regNo,complaint.complaintDate,complaint.complaintNo,complaint.lecturerID 
            FROM complaint 
            INNER JOIN student ON(complaint.studentNo=student.studentNo) 
            INNER JOIN staff ON(complaint.LecturerID=staff.staffID) 
            INNER JOIN courseunit ON(complaint.course_id=courseunit.id) 
            WHERE complaint.hodID='".$hodID."' AND complaint.status = 'pending' AND complaint.approval_status != 'forwarded' ORDER BY complaint.complaintDate desc";
            if ($query_run=mysqli_query($link,$query)) {

                ?>
                <table class="table table-striped  display" id="table2" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Complaint Type</th>
                        <th>Course Unit</th>
                        <th>Lecturer Name</th>
                        <th>Student's RegNo</th>
                        <th>Complaint Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>                    
                <tbody>
                <?php

                $numrows=mysqli_num_rows($query_run);
                if ($numrows>0) {
                    $i=1;
                    while ($row=mysqli_fetch_array($query_run)) {
                            echo "<tr>";
                            echo "<td>".$row[0]."</td>";
                            echo "<td>".$row[1]."</td>";
                            echo "<td>".$row[2]."".$row[3]."</td>";
                            echo "<td>".$row[4]."</td>";
                            echo "<td>".$row[5]."</td>";?>                            
                            <td><a href='forward.php?complaint_type=<?php echo $row[0];?>&complaintNo=<?php echo $row[6];?> &fname=<?php echo $row[2];?>&lname=<?php echo $row[3];?>&regNo=<?php echo $row[4];?>&LecturerID=<?php echo $row[7];?>'><button type='button' style='margin:0px; padding=0px;' class='btn btn-default btn-sm successicons confirm' data-toggle='modal' data-target='ecretcode' ><span class='glyphicon glyphicon-check'></span>Forward</button></a></td>
                            </tr><?php
                           }
                }else{
                    $queryError="No complaint is pending Approval, This is becuase either your Department lecturers are not responding to complaints or All complaints have been responded to and approved. Thanks";
                }
            }else{
                $queryError="Error: 403 Sorry we are unable to show the content of this page!<br/> Please Contact the system Admin";
            }

            if (isset($queryError)) {
                // echo '<tr><td colspan=7><div class="alert alert-danger alert-dismissible">
                //       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                //       <strong>'.$queryError.'</strong>.
                //     </div></td></tr>';
            }
            ?>

            </tbody>
        </table>
             </div>
        </div>
    </div>
<?php
require("../footer.php");
?>