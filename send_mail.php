<?php
require_once "Mail.php";
	function envia_mail($from,$to,$subject,$body,$host,$port,$username,$password){
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
	
	envia_mail("...@gmail.com","...@hotmail.com","ola","Tudo bem?","smtp.gmail.com","587","...@gmail.com","***")
?>
