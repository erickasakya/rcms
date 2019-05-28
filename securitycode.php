<?php
require("login_system/dbconnection.php");
require("login_system/core.inc.php");
if (isset($_GET['action'])) {
	if ($_GET['action']=="submitcode") {
		$secretcode=sqlInjections($_POST['code']);
		$unused="1111";
		if (!empty($secretcode)) {
			$code1=md5($secretcode);
			$query="SELECT secret_code FROM users WHERE userID='".$_SESSION['RCMS_user_id']."' LIMIT 1";
			$query_run=mysqli_query($link,$query);
			$row=mysqli_fetch_row($query_run);
			$code2=$row[0];
			$code=md5($unused);
			if ($code!=$code2) {
				
				if($code2==$code1){
					echo "1";
				  }else{
					echo "Incorrect secret code. Try again";
				}
			}else{
				echo "Please change your secret code, Your still using the default";
			}
		}else{
			echo "Please Enter a secret Code";
		}


}
}
?>