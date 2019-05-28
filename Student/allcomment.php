<?php
 require 'header.php';
?>
<div class="graph-visual tables-main animated fadeInRight" id="formcontent">
     <h2 class="inner-tittle">Complaints pending Response</h2>
        <div class="graph">
            <div class="block-page">
            <?php
          $regNo=getuserfield('username');
          $id=getuserInfo('studentNo','student','regNo',$regNo);
          $query="SELECT content, commentDate FROM comment INNER JOIN complaint ON(comment.complaintNo=complaint.complaintNo) WHERE complaint.studentNo='".$id."' ORDER BY comment.commentDate desc";

            
            if ($query_run=mysqli_query($link,$query)) {

                ?>
                <table class="table table-striped" id="">
                <thead>
                    <tr>
                    <th>Comment</th>
                    </tr>
                </thead>                    
                <tbody>
                <?php

                $numrows=mysqli_num_rows($query_run);
                if ($numrows>0) {
                    $i=1;
                    while ($row=mysqli_fetch_array($query_run)) {
                            echo "<tr>";
                            echo "<td>".$row[0]." <p><span>".time_since($row[1])."</span></p></td>";                           
                            echo "</tr>";
                            $i++;
                        }
                }else{
                    $queryError="No comment has been received yet";
                }
            }else{
                $queryError="Error: 403 Sorry we are unable to show the content of this page!<br/> Please Contact the system Admin";
            }

            if (isset($queryError)) {
                echo '<tr><td><div class="alert alert-success alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>'.$queryError.'</strong>.
                    </div></td></tr>';
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