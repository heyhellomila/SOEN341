<?php 

require_once("action/dba/connection.php");

require_once("action/dba/MySQLrequests.php");


$connection = Connection::getConnection();

$statement = $connection->prepare("INSERT into user (user_name, user_email, user_pass)   Values (?,?,?)");
// Escape user inputs for security
if(isset($_REQUEST['username']) && isset($_REQUEST['pwd1']) && isset($_REQUEST['email']) )
{
	$mail =$_REQUEST['email'];

	$check= $connection->prepare("SELECT user_email FROM user WHERE user_email = ?");
	$check->bindParam(1,$mail);
	$check->execute();

	if($check-> rowCount() > 0)
	{ 
		Connection::closeConnection();
		echo "<script>
		alert('Sorry user name already exist');
		window.location.href='registrationpage.php';
		</script>";
	}
	else {

		$user_pass=$_REQUEST['pwd1'];
		$pass = sha1($user_pass);

		$user_email=$_REQUEST['email'];

		$statement->bindParam(1, $user_name);

		$statement->bindParam(3, $pass);

		$statement->bindParam(2, $user_email);


		$statement->execute();
		Connection::closeConnection();

		echo "<script>
		alert('Thank you for registration');
		window.location.href='signin.php';
		</script>";
	}
}




?>
