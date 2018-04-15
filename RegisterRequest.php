
<?php
require_once("action/CommonAction.php");
require_once("action/dba/MySQLrequests.php");

if(isset($_REQUEST['username']) && isset($_REQUEST['password']) && isset($_REQUEST['email']) )
{
	$check =MySQLrequests::checkEmail($_REQUEST['email']);
	if($check->row_count() > 0)
	{ 
		echo "<script>
		alert('Sorry, e-mail has already been used.');
		window.location.href='RegistrationPage.php';
		</script>";
	}
	else {
		MySQLrequests::signUp($_REQUEST['username'],$_REQUEST['email'],$_REQUEST['password']);

		echo "<script>
		alert('Thank you for registering!');
		window.location.href='SignIn.php';
		</script>";
	}
}

?>

