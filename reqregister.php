
<?php
require_once("action/commonAction.php");
require_once("action/dba/MySQLrequests.php");

if(isset($_REQUEST['username']) && isset($_REQUEST['pwd1']) && isset($_REQUEST['email']) )
{
	$check =MySQLrequests::checkEmail($_REQUEST['email']);
	if($check-> rowCount() > 0)
	{ 
		echo "<script>
		alert('Sorry email already registered');
		window.location.href='registrationpage.php';
		</script>";
	}
	else {
		MySQLrequests::signup($_REQUEST['username'],$_REQUEST['email'],$_REQUEST['pwd1']);

		echo "<script>
		alert('Thank you for registration');
		window.location.href='signin.php';
		</script>";
	}
}

?>

