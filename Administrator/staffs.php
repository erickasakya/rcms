<?php
 require 'header.php';
?>
    <div class="graph-visual tables-main animated fadeInRight" id="formcontent">
     <h2 class="inner-tittle">College Staff</h2>
        <div class="graph">
            <div class="block-page"> 
            <?php
            $query="SELECT staff.staffID,staff.fName,staff.lName,department.dept_name FROM staff JOIN department ON(staff.dept_ID=department.dept_ID)  ORDER BY department.dept_name desc";
            if ($query_run=mysqli_query($link,$query)) {
                ?>
                <table class="table table-striped" id="table2">
                <thead class="thead-default">
                    <tr>
                    <th>Staff ID</th>
                    <th>Staff Name</th>
                    <th>Department Name</th>
                    <!-- <th>Actions</th> -->
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
                        <td><?php echo $row[1]." ".$row[2];?></td>
                        <td><?php echo $row[3];?></td>
                       <!--  <td><a href='comment.php?complaintNo="<?php echo $row[0];?>" &regNo="<?php echo$row[3];?>"'> <button type='button' style='margin:0px; padding=0px;' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-edit'></span>Edit</button> </a>  
                        </td> -->
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