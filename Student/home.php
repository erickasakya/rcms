<?php
 require 'header.php';
?>
<div class="graph-visual tables-main animated fadeInRight" id="formcontent">
     <h2 class="inner-tittle">Complaints pending Response</h2>
        <div class="graph">
            <div class="block-page">
            <?php
            $regNo=getuserfield('username');
            $studentNo=getuserInfo('studentNo','student','regNo',$regNo);
            $query="SELECT Complaint.complaintNo, complaint.complaint_type,courseunit.courseunitName,staff.fName,staff.lName,complaint.complaintDate,complaint.status  FROM staff,complaint,courseunit WHERE complaint.studentNo='".$studentNo."' AND complaint.status !='workedon' AND complaint.lecturerID=staff.staffID AND complaint.course_id=courseunit.id ORDER BY complaint.complaintDate desc";
            if ($query_run=mysqli_query($link,$query)) {

                ?>
                <table class="table table-striped  display" id="table2">
                <thead>
                    <tr>
                    <th>Complaint type</th>
                    <th>Course Uint</th>
                    <th>Lecturer's Name</th>
                    <th>Complaint Date</th>
                    <th>Status</th>
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
                            echo "<td> <span class='time'>".$row[5]."</span></td>";
                            if ($row[6]=="pending") {
                                echo "<td><span class='text-warning'>".$row[6]."</span></td>";
                            }else{
                                 echo "<td><span class='text-primary'>".$row[6]."</span></td>";
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