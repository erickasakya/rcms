<!DOCTYPE html>
<html>
<head>
	<title>Sending Text</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head>
<body>
   <div class="container">
   	<form method="POST" action="sendingemail.php" class="form-inline">
   	<div class="form-group">
   		<label for="recipients">To:</label>
   		<input type="text" name="recipients" class="form-control" placeholder="+256750538391">
   	</div>
   	<div class="form-group">
   		<label for="Message">Message</label>
   		<textarea class="form-control" name="Message">
   			
   		</textarea>
   	</div>
   	<div class="form-group">
   		<button type="submit"  class="btn btn-primary btn-lg">Send</button>
   	</div>

   </form>
   </div>

<?php

if (isset($_POST['Message'])) {
require '../PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'erickasakya@gmail.com';          // SMTP username
$mail->Password = 'Eric1win&'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('RCMS2017@CocisMakerere.com', 'BIT17-2 Group');
$mail->addReplyTo('erickasakya@gmail.com', 'BIT17-2 Group');
$mail->addAddress('katende85@gmail.com');   // Add a recipient
//$mail->addCC('amuronruth@gmail.com');
//$mail->addBCC('mildredcax@gmail.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>The Email notification in testing</h1>';
$bodyContent .= '<p>When you receive this email please text me and let me know <b>Eric Kasakya 0784240163</b></p>';

$mail->Subject = 'Email Notification by RCMS2017_Makerere University';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
}
?>
<script type="text/javascript" src="../jquery/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>