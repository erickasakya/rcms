<?php
require("dbconnection.php");
require("core.inc.php");

$query="UPDATE users SET last_logon=now() WHERE userID=".$_SESSION['RCMS_user_id'];
mysqli_query($link,$query);
session_destroy();
header("Location: ../index.php");
?>