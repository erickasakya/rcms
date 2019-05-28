<?php 
  require("../login_system/dbconnection.php");
  require("../login_system/core.inc.php");
  if (loggedin()) {
    /*The conditional statement determines where to direct a user depending on his usertype*/ 
    if($usertype=="Admin") {
      //proceed
      }else if ($usertype=="lecturer"){
      header("Location: ../Lecturer/home.php");
       }else if ($usertype=="H.O.D"){
      header("Location: ../HOD/home.php");
       }else if ($usertype=="student"){
      header("Location: ../Student/home.php");
       }else{
        die();
       }//The end of the usertype check
  }else if(!loggedin()){
    header("Location: ../index.php");
          }
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>RCMS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <!-- Bootstrap Core CSS -->
<link href="../Assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- icon CSS -->
<link href="../Assets/css/font-awesome.css" rel="stylesheet" /> 
<!-- animation css -->
<link href="../Assets/css/animate.css" type='text/css' rel="stylesheet" />
<!-- jQuery -->
<link href='../Assets/css/fontsgoogleapis.css' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link href="../Assets/css/icon-font.min.css" rel="stylesheet" type='text/css' />
<!-- intlTelInput-flags and international code -->
<link href="../Assets/css/intlTelInput.css" rel='stylesheet' type='text/css' />
<link href="../Assets/css/dataTables.bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="../Assets/css/buttons.bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="../Assets/css/jquery.dataTables.min.css" rel='stylesheet' type='text/css' />
<link href="../Assets/css/buttons.dataTables.min.css" rel='stylesheet' type='text/css' />
<!-- jQuery min.css -->
<script type="text/javascript" src="../Assets/jquery/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="../Assets/jquery/validator.min.js"></script>

<!--  Light Bootstrap Table core CSS    -->
<link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
<!-- Custom CSS -->
<link href="../Assets/css/style.css" rel='stylesheet' type='text/css' />
<!--//skycons-icons-->
</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->
	<div class="left-content">
	   <div class="inner-content">
		<!-- header-starts -->
			<div class="header-section">
						<!--menu-right-->
						<div class="top_menu">
							<!--/profile_details-->
								<div class="profile_details_left">
									<ul class="nofitications-dropdown">
											<li class="dropdown note dra-down">
<script type="text/javascript">

	function DropDown(el) {
		this.dd = el;
		this.placeholder = this.dd.children('span');
		this.opts = this.dd.find('ul.dropdown > li');
		this.val = '';
		this.index = -1;
		this.initEvents();
	}
	DropDown.prototype = {
		initEvents : function() {
			var obj = this;

			obj.dd.on('click', function(event){
				$(this).toggleClass('active');
				return false;
			});

			obj.opts.on('click',function(){
				var opt = $(this);
				obj.val = opt.text();
				obj.index = opt.index();
				obj.placeholder.text(obj.val);
			});
		},
		getValue : function() {
			return this.val;
		},
		getIndex : function() {
			return this.index;
		}
	}

	$(function() {

		var dd = new DropDown( $('#dd') );

		$(document).click(function() {
			// all dropdowns
			$('.wrapper-dropdown-3').removeClass('active');
		});

	});

	</script>
			   </li>
			
	<li class="dropdown note">
	<a href="#" id="change" type="staff" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell-o"></i> <div id="num">	<?php 
	$num=notificationaccess();
	if(empty($num)){

	}else{
		echo "<span class='badge' style='background-color: #F36A5A;'>";
		echo $num."</span>";
	}
		?></div></a>

		<ul class="dropdown-menu two">
		<li>
				<div class="notification_header">
					<h3>You have <?php echo notificationaccess();?> new notification</h3>
				</div>
			</li>
		<?php  
		$adminemail=getuserfield('username');
        $id=getuserInfo('staffID','staff','email',$adminemail);
		$query="SELECT content, notificationDate FROM notification WHERE flag='1' AND staffID='".$id."' LIMIT 4";
		$query_run=mysqli_query($link,$query);

		while ($row=mysqli_fetch_row($query_run)) {
       ?>
			<li><a  href="allnotifications.php">
				<div class="user_img"><img src="../images/in.jpg" alt=""></div>
			   <div class="notification_desc">
				<p><?php echo substr($row[0], 0, 50).".."; ?></p>
				<p><span><?php echo time_since($row[1]);?></span></p>
				</div>
			  <div class="clearfix"></div>	
			 </a></li>
			<?php
		}

		?>
				<div class="notification_bottom">
					<a href="allnotifications.php">See all notification</a>
				</div> 
			</li>
		</ul>
	</li>
	<li class="dropdown note">
	<span class="dropdown-toggle" aria-expanded="false">
	<a href="../login_system/logout.php" class="logout">
	<i class="lnr lnr-power-switch"></i>&nbsp;Logout
	</a>
	</span>
	</li>		   							   		
	<div class="clearfix"></div>	
	</ul>
	</div>
	<div class="clearfix"></div>	
	<!--//profile_details-->
	</div>
	<!--//menu-right-->
	<div class="clearfix"></div>
	</div>
	<!-- //header-ends -->

	<!--/sidebar-menu-->
	<div class="sidebar-menu">
	<header class="logo">
	<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="index.html"> <span id="logo"> <h1>RCMS</h1></span> 
	<!--<img id="logo" src="" alt="Logo"/>--> 
	</a> 
	</header>
	<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
	<!--/down-->
	<div class="down">	
	<div class="card ">
	<?php $profilepic=getuserfield('profilepic'); ?>
		  <a href="#"><img class="avatar border-gray down" src="<?php if(!empty($profilepic)){ echo $profilepic=getuserfield('profilepic');}else{ echo '../images/tim_vector.jpe';}?>"></a>
		  <a href="index.html"><span class=" name-caret"><?PHP if(isset($usertype)){
	$Adminemail=getuserfield('username');
	$Adminfname=getuserInfo('fName','staff','email',$Adminemail);
	$Adminlname=getuserInfo('lName','staff','email',$Adminemail);
	echo ucfirst($Adminfname." ".$Adminlname);}?></span></a></div>
		 <p><?PHP if(isset($usertype)){
		 	echo ucfirst($usertype);}?></p>
		<ul>
		<li><a class="tooltips" href="userprofile.php"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
			<li><a class="tooltips" href="changesecretcode.php"><span>Settings</span><i class="lnr lnr-cog"></i></a></li>
			<li><a class="tooltips" href="../login_system/logout.php"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
			</ul>
		</div>
	<!--//down-->
	<div class="menu">
		<ul id="menu" >
			<li><a href="home.php"><i class="lnr lnr-chart-bars"></i>  <span>Dashboard</span></a></li>
			<li id="menu-academico" ><a href="collegeComplaints.php"><span class="glyphicon glyphicon-envelope"></span> <span>Complaints</span></span></a></li>
			 <li id="menu-academico" ><a href="confirmed.php"><i class="lnr lnr-book"></i> <span>Confirmed</span></a></li>
			 <li id="menu-academico" ><a href="staffs.php"><i class="lnr lnr-book"></i> <span>Staffs</span><span class="fa fa-angle-right" style="float: right"></span></a>
			 <ul>
			  <li id="menu-academico" ><a href="registerstaff.php"><span>Register Staff</span></a></li>
			 	<li id="menu-academico" ><a href="importstaffs.php"><span>Import Staff</span></a></li>
			 </ul></li>

			 <li><a href="student.php"><span class="glyphicon glyphicon-education"></span> <span>Students</span><span class="fa fa-angle-right" style="float: right"></span></a>
			   <ul>
				<li><a href="registerstudent.php"> <span>Register Student</span></a></li>
				<li><a href="importstudents.php"><span class="glyphicon glyphicon-education"></span>Import Students</a></li>			
			  </ul></li>
			<li id="menu-academico" ><a href="collegeLogs.php"><span class="glyphicon glyphicon-education"></span></i> <span>System Logs</span></a></li>
	  </ul>
	</div>
	</div>
	<div class="clearfix"></div>		
	</div>
	<script>
	var toggle = true;
			
	$(".sidebar-icon").click(function() {                
	if (toggle)
	{
	$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
	$("#menu span").css({"position":"absolute"});
	}
	else
	{
	$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
	setTimeout(function() {
	  $("#menu span").css({"position":"relative"});
	}, 400);
	}
		toggle = !toggle;
			});
	</script>
	<div class="outter-wp">