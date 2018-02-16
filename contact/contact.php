<?php
require_once('connect.php');
require_once('config.php');
require('PHPMailer/PHPMailerAutoload.php');

if(isset($_POST) & !empty($_POST)){

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

if(!isset($name) || empty($name)){
	$error[] = "Name is required";
}

if(!isset($email) || empty($email)){
	$error[] = "E-Mail is required";
}

if(!isset($subject) || empty($subject)){
	$error[] = "Subject is required";
}

if(!isset($message) || empty($message)){
	$error[] = "Message is required";
}

if(!isset($error) || empty($error)){
	$to = "vivek@codingcyber.com";
	$headers = "From : " . $email;

	$mail = new PHPMailer();

	$mail->isSMTP();
	$mail->Host = $smtphost;
	$mail->SMTPAuth = true;
	$mail->Username = $smtpuser;
	$mail->Password = $smtppass;
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;

	$mail->setFrom('info@pixelw3.com', 'PixelW3 Technologies');
	$mail->addAddress('vivek@codingcyber.com', 'Vivek Vengala'); 

	$mail->Subject = $subject;
	$mail->Body    = $message . " Name : " . $name . ". E-Mail : " . $email;

	if(!$mail->send()) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		$sql = "INSERT INTO `contact` (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
		if(mysqli_query($connection, $sql)){
	    	echo 'Message has been sent, we will get back to you soon';
		}
	}
	/*
	if(mail($to, $subject, $message, $headers)){
		$sql = "INSERT INTO `contact` (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
		if(mysqli_query($connection, $sql)){
			"Message Received, we will get back to you soon";
		}else{
			echo "Failed to send message, Try again";
		}
	}else{
		echo "Failed to send message, Try again";
	}
	*/
}


}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Simple Contact form in PHP & MySQL</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
</head>
<body>
<div class="container">
	<div class="row">
		<form class="col-md-6 col-md-offset-3" method="post">
			<h2>Contact Us</h2>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Name</label>
		    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Full Name" required="">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email address</label>
		    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Email" required="">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Subject</label>
		    <input type="text" name="subject" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Subject" required="">
		  </div>
		  <textarea class="form-control"  name="message" rows="3" placeholder="Enter Your Query Here" required=""></textarea>
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
</div>
</body>
</html>