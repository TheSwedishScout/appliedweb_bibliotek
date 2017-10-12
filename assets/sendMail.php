<?php
	include("function.php");+9+99
	$to = "max@timje.se";
	$subject = test_input($_POST["Subject"]);
	$message = test_input($_POST["message"]);
	$from = test_input($_POST["email"]);
	$headers = "From: $from  \r\n".
				"Reply-To: $from \r\n".
				"X-Mailer: PHP/".phpversion();
	
	echo $to."<br>". $subject."<br>". $message."<br>". $headers; 
	//mail($to, $subject, $message, $headers); 
	header("location: http://localhost/labar/applied/lab1/Contact.php");
	exit();
?>
 