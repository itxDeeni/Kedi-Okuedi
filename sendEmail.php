<?php
	
	$name = trim($_POST['name']);
	$email = $_POST['email'];
  $subject = $_POST['subject'];
	$comments = $_POST['comments'];
	
	$site_owners_email = 'YOUR HOSTING EMAIL ADDRESS'; // Replace this with your own hosting email address
	$site_owners_name = 'YOUR NAME'; // replace with your name
	
	if (strlen($name) < 2) {
		$error['name'] = "Please enter your name";	
	}
	
	if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
		$error['email'] = "Please enter a valid email address";	
	}
	
	if (strlen($comments) < 3) {
		$error['comments'] = "Please leave a comment.";
	}

        if (strlen($subject) < 2) {
		$error['subject'] = "Please enter subject.";
	}

	if (!$error) {
		
		require_once('phpMailer/PHPMailerAutoload.php');
		$mail = new PHPMailer();
		
		$mail->From = $email;
		$mail->FromName = $name;
		$mail->Subject = $subject;
		$mail->AddAddress($site_owners_email, $site_owners_name);
		$mail->AddAddress('', '');
		$mail->Body = $comments;
		
		
		
		$mail->IsSMTP(); 
 		$mail->Host = "YOUR HOST ADDRESS";
		$mail->Port = YOUR HOST PORT NUMBER;
		$mail->SMTPSecure = "tls"; 
		
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->Username = "YOUR HOSTING EMAIL ADDRESS"; 
		$mail->Password = "YOUR HOSTING EMAIL PASSWORD"; 
		
		$mail->Send();
		
		echo "<li class='success'> Congratulations, " . $name . ". We've received your email. We'll be in touch as soon as we possibly can! </li>";
		
	} # end if no error
	else {

		$response = (isset($error['name'])) ? "<li class='error'>" . $error['name'] . "</li> \n" : null;
		$response .= (isset($error['email'])) ? "<li class='error'>" . $error['email'] . "</li> \n" : null;
    $response .= (isset($error['subject'])) ? "<li class='error'>" . $error['subject'] . "</li> \n" : null;
		$response .= (isset($error['comments'])) ? "<li class='error'>" . $error['comments'] . "</li>" : null;
		
		echo $response;
	} # end if there was an error sending

?>