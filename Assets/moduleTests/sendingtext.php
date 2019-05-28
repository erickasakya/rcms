<!DOCTYPE html>
<html>
<head>
	<title>Sending Text</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
   <div class="container">
   	<form method="POST" action="sendingtext.php" class="form-inline">
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
// Be sure to include the file you've just downloaded
require_once('AfricasTalkingGateway.php');

// Specify your login credentials
$username   = "eri";
$apikey     = "10d5aad7a81ba1563d57b2fac85e0d2c8fa4756969181a9a1f3612db0c33e319";

// NOTE: If connecting to the sandbox, please use your sandbox login credentials

// Specify the numbers that you want to send to in a comma-separated list
// Please ensure you include the country code (+256 for Uganda in this case)
$recipients = "+256784240163,+256781698818,+256789530269,+256788969735";

// And of course we want our recipients to know what we really do
$message    = "Eric the Developer testing";

// Create a new instance of our awesome gateway class
$gateway    = new AfricasTalkingGateway($username, $apikey);

// NOTE: If connecting to the sandbox, please add the sandbox flag to the constructor:
/*************************************************************************************
             ****SANDBOX****
$gateway    = new AfricasTalkingGateway($username, $apiKey, "sandbox");
**************************************************************************************/

// Any gateway error will be captured by our custom Exception class below, 
// so wrap the call in a try-catch block

try 
{ 
  // Thats it, hit send and we'll take care of the rest. 
  $results = $gateway->sendMessage($recipients, $message);
			
  foreach($results as $result) {
    // status is either "Success" or "error message"
    echo " Number: " .$result->number;
    echo " Status: " .$result->status;
    echo " MessageId: " .$result->messageId;
    echo " Cost: "   .$result->cost."\n";
  }
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while sending: ".$e->getMessage();
}

// DONE!!! 

?>
<script type="text/javascript" src="jquery/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>