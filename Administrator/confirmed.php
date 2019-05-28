<?php
 require 'header.php';
?>
   <div class="graph-visual tables-main animated fadeInRight" id="formcontent">
     <h2 class="inner-tittle">Confirmed complaint Response Update from  Heads of  Department</h2>
        <div class="graph">
            <div class="block-page">
            <?php
            $query="SELECT complaint.complaint_type,courseunit.course_code,staff.fName,staff.lName,student.regNo,complaint.approvalDate,mark.mark,complaint.confirmation_Date,mark.markName FROM complaint 
                INNER JOIN student ON(complaint.studentNo=student.studentNo) 
                INNER JOIN staff ON(complaint.LecturerID=staff.staffID) 
                INNER JOIN courseunit ON(complaint.course_id=courseunit.id) 
                INNER JOIN mark ON(complaint.complaintNo=mark.complaintNo) 
                where complaint.confirmation='updated' ORDER BY complaint.approvalDate desc";
            if ($query_run=mysqli_query($link,$query)) {

                ?>
                <table class="table table-striped display" id="table2">
                <thead>
                    <tr>
                    <th>Course Code</th>
                    <th>Lecturer Name</th>
                    <th>Student's RegNo</th>
                    <th>Approval Date</th>
                    <th>Mark Name</th>
                    <th>Mark</th>
                    <th>Confirm Date</th>
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
                        <td><?php echo $row[2]." ".$row[3];?></td>
                        <td><?php echo $row[4];?></td>
                        <td><?php echo $row[5];?></td>
                        <td><?php echo $row[8];?></td>
                        <td><?php echo $row[6]."%";?></td>
                        <td><?php echo $row[7];?></td>
                        </tr>
                    <?php
                        }
                }else{
                    $queryError="No complaint approval has been confirmed yet";
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
<?php
require("../footer.php");
?>