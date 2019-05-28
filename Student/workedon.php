<?php
 require 'header.php';
?>
    <div class="graph-visual tables-main animated fadeInRight" id="formcontent">
     <h2 class="inner-tittle">Worked on Complaints</h2>
        <div class="graph">
            <div class="block-page">
            <?php
            $regNo=getuserfield('username');
            $studentNo=getuserInfo('studentNo','student','regNo',$regNo);
            $query="SELECT Complaint.complaintNo, complaint.complaint_type,courseunit.courseunitName,staff.fName,staff.lName,mark.mark,complaint.approvalDate,mark.markname FROM 
            complaint LEFT JOIN staff ON(complaint.lecturerID=staff.staffID) LEFT JOIN  courseunit ON(complaint.course_id=courseunit.id) LEFT JOIN mark ON(complaint.complaintNo=mark.complaintNo) WHERE complaint.studentNo='".$studentNo."' AND complaint.status='workedon' ORDER BY complaint.complaintDate desc";

            if ($query_run=mysqli_query($link,$query)) {

                ?>
                <table class="table table-striped  display" id="table2">
                <thead>
                    <tr>
                    <th>Complaint type</th>
                    <th>Course Uint</th>
                    <th>Lecturer's Name</th>
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
                            echo "<td>".$row[2]."</td>";
                            echo "<td>".$row[3]." ".$row[4]."</td>";
                            echo "<td>".$row[7]."</td>";
                            echo "<td>".$row[5]."%</td>";
                            if ($row[6]=="0000-00-00 00:00:00") {
                                echo "<td><span class='text-warning'>Pending Approval</span></td>";
                            }else{
                                 echo "<td> <span class='text-success'>". $row[6]."</span></td>";
                            }
                            
                            echo "</tr>";
                            $i++;
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