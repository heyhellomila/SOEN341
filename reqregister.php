<?php 

error_reporting(0);

require_once("action/dba/connection.php");

require_once("action/dba/MySQLrequests.php");
 

 $connection = Connection::getConnection();

$statement = $connection->prepare("INSERT into user (user_name, user_email, user_pass)   Values (?,?,?)");
// Escape user inputs for security
if(isset($_REQUEST['username']) && isset($_REQUEST['pwd1']) && isset($_REQUEST['email']) )
{
$user_name =$_REQUEST['username'];
 
  $check= $connection->prepare("SELECT user_name FROM user WHERE user_name = :name");
  $check->bindParam(':name',$user_name);
  $check->execute();
  
  if($check-> rowCount() > 0)
{ 
    
    
    
    
    echo "<script> alert('Sorry user name already exist');</script>";
    header("refresh:1; url=registrationpage.php");
}
 else {



//if(isset($_REQUEST['pwd1']))

$user_pass=$_REQUEST['pwd1'];
$pass = sha1($user_pass);

//if(isset($_REQUEST['email']))

$user_email=$_REQUEST['email'];



                   

                        $statement->bindParam(1, $user_name);

			$statement->bindParam(3, $pass);

			$statement->bindParam(2, $user_email);
 
// attempt insert query execution
//$sql = "INSERT INTO user (user_name, user_pass, user_email) VALUES ($user_name,$user_email,$user_pass)";
 
// close connection
//closeConnection();
$statement->execute();
 echo "<script> alert('Thank you for registration');</script>";
    header("refresh:1; url=SignIn.php");
}
}

			//PDO::FETCH_ASSOC: returns an array indexed by column name as returned in your result set 

			//$statement->setFetchMode(PDO::FETCH_ASSOC);



			//get the results and put them in a variable

			//$info = $statement->fetchAll();

			//close connection
                       
			Connection::closeConnection()

?>
