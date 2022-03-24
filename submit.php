<?php
	
	
	$email1 = $_POST['email1'];
      
	
	$site_owners_email = 'YOUR HOSTING EMAIL ADDRESS'; // Replace this with your own hosting email address
	$site_owners_name = 'YOUR NAME'; // replace with your name
	
	
	
	if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email1)) {
		$error['email1'] = "Please enter a valid email address";	
	}
	
	
	
	if (!$error) {
		
		require_once('phpMailer/PHPMailerAutoload.php');
		$mail = new PHPMailer();
		
		$mail->From = $email1;
		
		$mail->AddAddress($site_owners_email, $site_owners_name);
		$mail->AddAddress('', '');
		$mail->Body = $email1;
		
		
		
		
		$mail->IsSMTP(); 
 		$mail->Host = "YOUR HOST ADDRESS";
		 $mail->Port = YOUR HOST PORT NUMBER;
		 $mail->SMTPSecure = "tls"; 
		
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->Username = "YOUR HOSTING EMAIL ADDRESS"; 
		$mail->Password = "YOUR HOSTING EMAIL PASSWORD"; 
		
		$mail->Send();
		
		echo "<li class='success'> We've received your email! </li>";
		
	} # end if no error
	else {

		
		$response1 .= (isset($error['email1'])) ? "<li class='error'>" . $error['email1'] . "</li> \n" : null;
               
		
		echo $response1;
	} # end if there was an error sending

?>