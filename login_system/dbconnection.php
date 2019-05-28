<?php
      $link= mysqli_connect("localhost","root","","rcms_database");

      if (!$link) {
        die("Couldn't connect to the database ".mysqli_connect_error());
         }
?>