<?php
  $link= mysqli_connect("localhost","root","","testAjax");

  if (!$link) {
  	die("Couldn't connect to the database ".mysqli_connect_error());
  }


?>