<?php
require_once("partial/header.php");
?>
<?php
require_once('connect.php');
require_once('config.php');
require('PHPMailer/PHPMailerAutoload.php');

if(isset($_POST) & !empty($_POST)){


$email = $_POST['email'];
$name = $_POST['name'];
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
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true;
	$mail->Username = "elvisnonang@gmail.com";
	$mail->Password = "pilote87";
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 587;

	$mail->setFrom('info@pixelw3.com', 'PixelW3 Technologies');
	$mail->addReplyTo('info@example.com', 'CodexWorld');
	$mail->addAddress('ericnonang@gmail.com', 'Vivek Vengala'); 

	$mail->Subject = $subject;
	$mail->Body    = $message . " Name : " . $name . ". E-Mail : " . $email;

	/*if(!$mail->send()) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {*/
	
	$sql = "INSERT INTO contactus_email (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
	mysqli_query($connection, $sql);
	/*if(mysqli_query($connection, $sql)){
	    	echo 'Message has been sent, we will get back to you soon';
	}*/

	
	/*}*/
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

<div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">Contact us </h1>
                <p class="bd-lead">Your message has been sent, we will get back to you soon</p>
            </div>
        </div>
    </div>

<?php
require_once("partial/footer.php");
?>


