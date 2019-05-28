<?php
 require 'header.php';
?>
    <div class="graph-visual tables-main animated fadeInRight" id="formcontent">
     <h2 class="inner-tittle">System Logs</h2>
        <div class="graph">
            <div class="block-page">
            <?php
            $query="SELECT staff_logs.mark_name,staff_logs.new_mark,staff_logs.old_complaint_status, staff_logs.new_complaint_status,staff_logs.operation_type,staff_logs.operation_date,staff_logs.staff_id FROM staff_logs ORDER BY staff_logs.operation_date desc";
            if ($query_run=mysqli_query($link,$query)) {
                ?>
                <table class="table table-striped" id="table2">
                <thead class="thead-default">
                    <tr>
                    <th>Mark Name</th>
                    <th>Mark</th>
                    <th>Old Status</th>
                    <th>New Status</th>
                    <th>Operation Type</th>
                    <th>Operation Date</th>
                    <th>Staff ID</th>
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
                        <td><?php echo $row[1]."%";?></td>
                        <td><?php echo $row[2];?></td>
                        <td><?php echo $row[3];?></td>
                        <td><?php echo $row[4];?></td>
                        <td><?php echo $row[5];?></td>
                        <td><?php  echo $row[6];?></td>
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