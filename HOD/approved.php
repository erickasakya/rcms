<?php
 require 'header.php';
?>
    <div class="graph-visual tables-main animated fadeInRight" id="formcontent">
     <h2 class="inner-tittle">Approved Complaint's Response from Lecturer</h2>
        <div class="graph">
            <div class="block-page">
            <div  id="staffOptions"></div>
                <?php
            $userID=$_SESSION['RCMS_user_id'];
            $hodID=getuserInfo('staffID','staff','userID',$userID);
            $query="SELECT complaint.complaint_type,courseunit.courseunitName,staff.fName,staff.lName,student.regNo,complaint.approvalDate,mark.mark,mark.markName 
            FROM complaint 
            INNER JOIN student ON(complaint.studentNo=student.studentNo) 
            INNER JOIN staff ON(complaint.LecturerID=staff.staffID) 
            INNER JOIN courseunit ON(complaint.course_id=courseunit.id) 
            INNER JOIN mark ON(complaint.complaintNo=mark.complaintNo) 
            WHERE complaint.hodID='".$hodID."' AND complaint.status = 'workedon' AND complaint.approval_status = 'approved' ORDER BY complaint.approvalDate desc";
            if ($query_run=mysqli_query($link,$query)) {

                ?>
                <table class="table table-striped  display" id="table2" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Course Unit</th>
                        <th>Lecturer Name</th>
                        <th>Student's RegNo</th>
                        <th>Mark Name</th>
                        <th>Mark</th>
                        <th>Approval Date</th>
                    </tr>
                </thead>                    
                <tbody>
                <?php

                $numrows=mysqli_num_rows($query_run);
                if ($numrows>0) {
                    $i=1;
                    while ($row=mysqli_fetch_array($query_run)) {
                            echo "<tr>";
                            echo "<td>".$row[1]."</td>";
                            echo "<td>".$row[2]." ".$row[3]."</td>";
                            echo "<td>".$row[4]."</td>";
                            echo "<td>".$row[7]."</td>";
                            echo "<td>".$row[6]."%</td>";
                            echo "<td>".$row[5]."</td>";
                            echo "</tr>";
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