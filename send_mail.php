<?php
require_once "Mail.php";
	function envia_mail($from,$to,$subject,$body,$host,$port,$username,$password){
		#$from = "...@gmail.com";
		#$to = "...@gmail.com";
		#$subject = "Hi!";
		#$body = "Hi,\n\nHow are you?";

		#$host = "smtp.gmail.com";
		#$port = "587";
		#$username = "...@gmail.com";
		#$password = "...";

		$headers = array ('From' => $from,
		  'To' => $to,
		  'Subject' => $subject);
		$smtp = Mail::factory('smtp',
		  array ('host' => $host,
			'port' => $port,
			'auth' => true,
			'username' => $username,
			'password' => $password));

		$mail = $smtp->send($to, $headers, $body);
	
	if (PEAR::isError($mail)) {
	  echo("<p>" . $mail->getMessage() . "</p>");
	} 
	else {
	  echo("<p>Message successfully sent!</p>");
	}
	}
	
	envia_mail("bataover9000@gmail.com","bia-6@hotmail.com","ola","Tudo bem?","smtp.gmail.com","587","bataover9000@gmail.com","consolaPS3")
?>
