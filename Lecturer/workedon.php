<?php
 require 'header.php';
?>
   <div class="graph-visual tables-main animated fadeInRight" id="formcontent">
     <h2 class="inner-tittle">Worked On Complaints</h2>
        <div class="graph">
            <div class="block-page">
      <div  id="staffOptions"></div>
            <?php
            $userID=$_SESSION['RCMS_user_id'];
            $lecturerID=getuserInfo('staffID','staff','userID',$userID);
            $query="SELECT complaint.complaintNo,complaint.complaint_type,courseunit.courseunitName,student.regNo,mark.mark,mark.entryDate,mark.markName 
            FROM complaint 
            LEFT JOIN student ON(complaint.studentNo=student.studentNo)
            LEFT JOIN courseunit ON(complaint.course_id=courseunit.id)
            LEFT JOIN mark ON(complaint.complaintNo=mark.complaintNo)
            WHERE complaint.lecturerID='".$lecturerID."' AND complaint.status !='pending' AND complaint.status !='forwarded' ORDER BY mark.entryDate desc";
            if ($query_run=mysqli_query($link,$query)) {
                ?>
                <table class="table table-striped" id="table2">
                <thead class="thead-default">
                    <tr>
                    <th>Course Unit</th>
                    <th>Student's RegNo</th>
                    <th>Mark Name</th>
                    <th>Mark</th>
                    <th>Response Date</th>
                    <th>Actions</th>
                    </tr>
                </thead>                    
                <tbody>
                <?php
                $i=0;
                $numrows=mysqli_num_rows($query_run);
                if ($numrows>0) {
                    while ($row=mysqli_fetch_array($query_run)) {
                        ?>
                     <tr>
                        <td><?php echo $row[2];?></td>
                        <td><?php echo $row[3];?></td>
                        <td><?php echo $row[6];?></td>
                        <td><?php 
                        if (empty($row[4])) {
                            echo "Commented";
                        }else{echo $row[4]."%";}?></td>
                        <td><?php echo $row[5];?></td>
                        <td>

                    <?php
                    if (empty($row[4])){
                    echo "<button href='entermark.php?complaintNo=$row[0]&complainttype=$row[1]&regNo=$row[3]' type='button' style='margin:0px; padding=0px;' class='btn btn-default btn-sm successicons confirm' data-toggle='modal' data-target='#secretcode'><span class='glyphicon glyphicon-edit'></span>Enter Mark</button>";
                        
                        }else{
                            echo "Resolved";}?>

                        </td>
                    </tr>
                    <?php
                    $i++;
                }
        }else{
                    $queryError="No complaint is has got any response or You have never received any Complaint";
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
