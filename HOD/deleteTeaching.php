<?php
//This is the database connection
require("../login_system/dbconnection.php");    
     
     echo $teachingID=$_POST['teachingID'];
      $query= "DELETE FROM teaching WHERE teachingID=".$teachingID;
      //running the query for selecting and checking whether it has run successfully
      if($result=mysqli_query($link,$query)){
        //header("Location: teachings.php");
        echo "deleted";
      }else{
      	echo "Deletion failed ".mysqli_error($link);
      }

?>