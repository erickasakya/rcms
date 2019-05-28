<?php
 ob_start();
 session_start();
 error_reporting(0);
//To get the current path of the file
 $current_file=$_SERVER['SCRIPT_NAME'];
 if (isset($_SESSION['RCMS_user_id']) && !empty($_SESSION['RCMS_user_id'])){
	 
	 $query1="SELECT usertype FROM users WHERE userID=".$_SESSION['RCMS_user_id'];
	 $query1_run=mysqli_query($link,$query1);
	 $row=mysqli_fetch_row($query1_run);
	 $usertype=$row[0];
 }
 //This function checks whether the user is logged in or not.
  function loggedin() {
  	  if (isset($_SESSION['RCMS_user_id']) && !empty($_SESSION['RCMS_user_id'])) {

  	  	if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
			    // last request was more than 30 minutes ago
  	  		    $query="UPDATE users SET last_logon='".$_SESSION['LAST_ACTIVITY']."' WHERE userID=".$_SESSION['RCMS_user_id'];
				mysqli_query($GLOBALS['link'],$query);
			    session_unset();     // unset $_SESSION variable for the run-time 
			    session_destroy();   // destroy session data in storage
			    return 0;
			}else{
				$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
			    return 1;
			}
 	  }else{
 	  	return 0;
 	  	
 	  }
 }//This is the end of the function

//The function that accesses the user details
 function getuserfield($field){
  	$query="SELECT $field FROM users WHERE userID=".$_SESSION['RCMS_user_id'];
 	if ($query_run=mysqli_query($GLOBALS['link'],$query)) {
 		if ($query_result=mysqli_fetch_row($query_run)) {
 			return $query_result[0];
 		}
 	}
 }//This is the end of the function

//A function that selects any column from any table
function getuserInfo($field,$table,$uniquefield,$uniquefieldvalue){
  	$query="SELECT $field FROM $table WHERE $uniquefield='".$uniquefieldvalue."'";
 	if ($query_run=mysqli_query($GLOBALS['link'],$query)) {
 		if ($query_result=mysqli_fetch_row($query_run)) {
 			return $query_result[0];
 		}
 	}
 }//This is the end of the function

// A function to prevent from sql injection
function sqlInjections($data){
	$value1=mysqli_real_escape_string($GLOBALS['link'],$data);
	$value1=trim($value1);
	return $value1;
	}//This is the end of the function


// A function email notification
function emailNotification($email,$emailcontent){
		   //This is the email address which will be sent to
		   $address=$email;
			//The content that will be sent to specific user account
			$bodycontent=$emailcontent;
			//Including the PHPMailer as plugin for sending email
			require_once '../Assets/PHPMailer-master/PHPMailerAutoload.php';

			$mail = new PHPMailer;

			$mail->isSMTP();                            
			$mail->Host = 'smtp.gmail.com';             
			$mail->SMTPAuth = true;                     
			$mail->Username = 'erickasakya@gmail.com';          
			$mail->Password = 'Eric1win&'; 
			$mail->SMTPSecure = 'tls';          
			$mail->Port = 587;                         

			$mail->setFrom('rcms2017@cit4.mak.ac.ug', 'BIT17-2 Group');
			$mail->addReplyTo('erickasakya@gmail.com', 'BIT17-2 Group');
			$mail->addAddress($address); 

			$mail->isHTML(true); 

			$bodyContent = '<h1>The Complaint Notification from RCMS2017</h1>';
			$bodyContent .= '<p>'.$bodycontent.'<br><br> <strong>From BIT17-2 Final year project<br>Eric Kasakya Tel +256 750538391 Group Leader<br>Amuron Ruth +256 754006150<br>Lahat John +256 700605540<br> Nakayuki Mildred +256 701662622</strong></p>';

			$mail->Subject = 'Complaint Notification from RCMS2017_CoCIS';
			$mail->Body    = $bodyContent;

			if(!$mail->send()) {
			    $message=0;
			} else {
			    $message=1;
			}
		return $message;
	}// End of the emailNotification function


// A function for text notification
 function textNotification($contact,$textcontent){

		//Include the Africas Talking Gateway plugin for sending text
		require_once('../Assets/AfricasTalkingGateway.php');

		// Specify your login credentials
		$username   = "";//erickasakya
		$apikey     = "";//10d5aad7a81ba1563d57b2fac85e0d2c8fa4756969181a9a1f3612db0c33e319
		// Please ensure you include the country code (+256 for Uganda in this case)
		$recipients = $contact;

		// Here is the text message which is going to be sent
		$message    = $textcontent;

		// Creating a new instance of our awesome gateway class
		$gateway    = new AfricasTalkingGateway($username, $apikey);

		try 
		{ 
		  // Thats it, hit send and we'll take care of the rest. 
		  $results = $gateway->sendMessage($recipients, $message);
					
		  foreach($results as $result) {
		    // status is either "Success" or "error message"
		    /*echo " Number: " .$result->number;
		    echo " Status: " .$result->status;
		    echo " MessageId: " .$result->messageId;
		    echo " Cost: "   .$result->cost."\n";*/
		  }
		}
		catch ( AfricasTalkingGatewayException $e )
		{
		  echo "Encountered an error while sending: ".$e->getMessage();
		}
  	
}//End of the textNotification function
 	

//The function for system account(tab) notifications
 function accountNotification($email,$messagecontent,$userUniqueNo){

$i=1;
foreach ($messagecontent as $key => $value) {
   
   if ($i==1) {
   	//For student notification
      $query="INSERT INTO notification(content,notificationDate,studentNo,staffID) VALUES('".$messagecontent[$key]."',now(),'".$userUniqueNo[$key]."',NULL) ";

      if ($query_run=mysqli_query($GLOBALS['link'],$query)) {
        $Message=$messagecontent[$key];
          $notify=emailNotification($email[$key],$messagecontent[$key]);

          if ($notify) {
            $Message.=" <br>Notification has been sent to your email <strong>".$email[$key]."</strong>";
          }else{
            $errorMessage="Wrong email address <strong>".$email[$key]."</strong>";
          }

      }else{
        $errorMessage="Couldn't Notify the responsible stakeholders, please contact the system admin ".mysqli_error($GLOBALS['link']);
      }

   }else{//staff notification
      $query="INSERT INTO notification(content,notificationDate,studentNo,staffID) VALUES('".$messagecontent[$key]."',now(),NULL,'".$userUniqueNo[$key]."') ";

      if ($query_run=mysqli_query($GLOBALS['link'],$query)) {

        if ($i==2) {
        $notify=emailNotification($email[$key],$messagecontent[$key]);
        }
        
      }else{
            if ($i==2) {
              $errorMessage.=" And Couldn't Notify your Lecturer and HOD too ".mysqli_error($link);
            }
          }
   }//end of staff notification else

$i++;
}//the end of the foreach loop
           if (isset($Message)) {
           	return $Message;
           }else{
           	return $errorMessage;
       }

 }//The end of the function

function notifyPasswordchange($email,$messagecontent,$userUniqueNo,$usertype){
  if ($usertype=="student") {
    //For student notification
      $query="INSERT INTO notification(content,notificationDate,studentNo,staffID) VALUES('".$messagecontent."',now(),'".$userUniqueNo."',NULL) ";

      if ($query_run=mysqli_query($GLOBALS['link'],$query)) {
        
          $notify=emailNotification($email,$messagecontent);

          if ($notify) {
            $Message=" Notification has been sent to your email <strong>".$email."</strong>";
          }else{
            $errorMessage="Wrong email address <strong>".$email."</strong>";
          }

      }else{
        $errorMessage="Couldn't Notify the responsible stakeholders, please contact the system admin of the RCMS ".mysqli_error($GLOBALS['link']);
      }

   }else{//staff notification
      $query="INSERT INTO notification(content,notificationDate,studentNo,staffID) VALUES('".$messagecontent."',now(),NULL,'".$userUniqueNo."') ";

      if ($query_run=mysqli_query($GLOBALS['link'],$query)) {
        $notify=emailNotification($email,$messagecontent);

        if ($notify) {
            $Message=" Notification has been sent to your email <strong>".$email."</strong>";
          }else{
            $errorMessage="Wrong email address <strong>".$email."</strong>";
          }
        }else{
        $errorMessage="Couldn't Notify the responsible stakeholders, please contact the system admin of the RCMS ".mysqli_error($GLOBALS['link']);
      }
   }//end of staff notification else

           if (isset($Message)) {
            return $Message;
           }else{
            return $errorMessage;
       }

}//End of the password notification function


 //A function that selects lecturer's details
function selectLecture(){
	$userID=getuserfield('userID');
    $dept_ID=getuserInfo('dept_ID','staff','userID',$userID);
  	$query="SELECT staff.staffID,staff.fName,staff.lName FROM staff WHERE dept_ID='".$dept_ID."'";
 	if ($query_run=mysqli_query($GLOBALS['link'],$query)) {
 		$function_result="";
 		while($query_result=mysqli_fetch_row($query_run)) {
 			echo  "<option value='".$query_result[0]."'>".$query_result[1]." ".$query_result[2]."</option><br/>";
 			
 		}
 	}else{
 		echo "Couldn't get the Lecturer contact the system admin".mysqli_error($link);
 	}
 }//This is the end of the function

 //A function that selects lecturer's details
function selectCourseUnit($semester,$yearofstudy){
	$userID=getuserfield('userID');
    $dept_ID=getuserInfo('dept_ID','staff','userID',$userID);
  	$query="SELECT id,courseunitName FROM courseunit WHERE semester='".$semester."' AND dept_ID='".$dept_ID."' AND yearofstudy='".$yearofstudy."'";
 	if ($query_run=mysqli_query($GLOBALS['link'],$query)) {
 		$function_result="";
 		while($query_result=mysqli_fetch_row($query_run)) {
 			echo  "<option value='".$query_result[0]."'>".$query_result[1]."</option><br/>";
 			
 		}
 	}else{
 		echo "Couldn't get the Lecturer contact the system admin".mysqli_error($GLOBALS['$link']);
 	}
 }//This is the end of the function


//Calculating the since like 2minutes ago
function time_since($datetime, $full = false) {
    $now = new DateTime;
    //$now->format('Y-m-d H:i:s');
    $ago = new DateTime($datetime);
   // $ago->format('Y-m-d H:i:s');
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'min',
        's' => 'sec',
    );
    foreach ($string as $key => &$value) {
        if ($diff->$key) {
            $value = $diff->$key . ' ' . $value . ($diff->$key > 1 ? 's' : '');
        } else {
            unset($string[$key]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}


function notificationaccess(){
	$hodemail=getuserfield('username');
  $id=getuserInfo('staffID','staff','email',$hodemail);
	$query="SELECT count(flag) AS notifications FROM notification WHERE flag='1' AND staffID='".$id."'";
	if ($query_run=mysqli_query($GLOBALS['link'],$query)) {
		$row=mysqli_fetch_row($query_run);

    return $row[0];
	}
}

function notificationaccessstudent(){
  $regNo=getuserfield('username');
  $id=getuserInfo('studentNo','Student','regNo',$regNo);
  $query="SELECT count(flag) AS notifications FROM notification WHERE flag='1' AND studentNo='".$id."'";
  if ($query_run=mysqli_query($GLOBALS['link'],$query)) {
    $row=mysqli_fetch_row($query_run);

    return $row[0];
  }
}

function commentaccess(){
  $regNo=getuserfield('username');
  $id=getuserInfo('studentNo','student','regNo',$regNo);
  $query="SELECT count(comment.flag) FROM comment INNER JOIN complaint ON(comment.complaintNo=complaint.complaintNo) WHERE comment.flag='1' AND complaint.studentNo='".$id."'";
  if ($query_run=mysqli_query($GLOBALS['link'],$query)) {
    $row=mysqli_fetch_row($query_run);

    return $row[0];
  }
}
?>
