<!DOCTYPE html>
<html>
<head>

<title>RCMS</title>

<!-- Meta-Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link rel="stylesheet" href="css/home.css" type="text/css" media="all">
<link rel="stylesheet" href="Assets/css/icon-font.min.css" type='text/css' />
<link rel="stylesheet" href="Assets/css/animate.css" type='text/css' />
<!-- Fonts -->
<link href="Assets/css/fontsgoogleapis.css" rel="stylesheet">
<script type="text/javascript" src="Assets/jquery/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="Assets/jquery/validator.min.js"></script>
<!-- //Fonts -->

</head>
<!-- //Head -->

<!-- Body -->
<body>

	<h1 class="animated fadeInRight">RESULTS COMPLAINT MONITORING SYSTEM</h1>
			<?php
     // echo md5('BErnice2017'); die;
              require("login_system/dbconnection.php");
              require("login_system/core.inc.php");
              if (loggedin()) {
                /*The conditional statement determines where to direct a user depending on his usertype*/ 
                if($usertype=="student") {
                  header("Location: Student/home.php");
                  }else if ($usertype=="lecturer"){
                  header("Location: Lecturer/home.php");
                   }else if ($usertype=="H.O.D"){
                  header("Location: HOD/home.php");
                   }else if ($usertype=="Admin"){
                  header("Location: Administrator/home.php");
                   }else{
                    die();
                   }//The end of the usertype check
              }else if(!loggedin()){
                include("login_system/loginform.inc.php");
              }
            ?>

	<div class="w3footeragile">
		<p>Copyright &copy; 2016-2018 CoCIS Makerere University</p>
	</div>
		
	<script type="text/javascript" src="assets/jquery/jquery-3.1.1.min.js"></script>
	 <!--  Notifications Plugin    -->

    	<script type="text/javascript">
    	$(document).ready(function(){
        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Results Complaint Management System</b> <br/> Please Login with your email/RegNo(username) and staffID/studentNo(password)."

            },{
                type: 'success',
                timer: 4000
            });

    	});
	</script>

</body>
<!-- //Body -->

</html>