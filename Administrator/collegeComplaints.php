<?php
 require 'header.php';
?>
   <div class="graph-visual tables-main animated fadeInRight" id="formcontent">
     <h2 class="inner-tittle">Approved complaint Response from Heads of  Department</h2>
        <div class="graph">
            <?php
            $query="SELECT complaint.complaint_type,courseunit.course_code,staff.fName,staff.lName,student.regNo,complaint.approvalDate,mark.mark,complaint.complaintNo,mark.markName FROM complaint 
                INNER JOIN student ON(complaint.studentNo=student.studentNo) 
                INNER JOIN staff ON(complaint.LecturerID=staff.staffID) 
                INNER JOIN courseunit ON(complaint.course_id=courseunit.id) 
                INNER JOIN mark ON(complaint.complaintNo=mark.complaintNo) 
                WHERE complaint.approval_status='approved' AND complaint.confirmation='pending'  ORDER BY complaint.approvalDate desc";
            if ($query_run=mysqli_query($link,$query)) {

                ?>
                <table class="table table-striped display" id="table">
                <thead>
                    <tr>
                    <th>Course Code</th>
                    <th>Lecturer Name</th>
                    <th>Student's RegNo</th>
                    <th>Approval Date</th>
                    <th>Mark Name</th>
                    <th>Mark</th>
                    <th>Actions</th>
                    </tr>
                </thead>                    
                <tbody>
                <?php

                $numrows=mysqli_num_rows($query_run);
                if ($numrows>0) {
                    while ($row=mysqli_fetch_array($query_run)) {
                            ?>
                        <tr class="table-row">
                        <td><?php echo $row[1];?></td>
                        <td><?php echo $row[2]." ".$row[3];?></td>
                        <td><?php echo $row[4];?></td>
                        <td><?php echo $row[5];?></td>
                         <td><?php echo $row[8];?></td>
                        <td><?php echo $row[6]."%";?></td>
                        <td><button href='confirm.php?complaintNo=<?php echo $row[7];?> &regNo=<?php echo$row[4];?> &coursecode=<?php echo$row[1];?> &mark=<?php echo$row[6];?>' type="button" style='margin:0px; padding=0px;' class="btn btn-default btn-sm successicons confirm" data-toggle="modal" data-target="#secretcode"><span class="glyphicon glyphicon-check"></span> Confirm</button> 
                        </td>
                        </tr>
                    <?php
                        }
                }else{
                    $queryError="No complaint approval is pending confirmation";
                }
            }else{
                $queryError="Error: 403 Sorry we are unable to show the content of this page!<br/> Please Contact the system Admin";
            }
            if (isset($queryError)) {
                echo '<tr><td colspan=5><div class="alert alert-danger alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>'.$queryError.'</strong>.
                    </div></td></tr>';
            }
            ?>

            </tbody>
        </table>
        </div>
<?php
require("../footer.php");
?>