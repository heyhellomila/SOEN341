<?php
require_once("action/commonAction.php");
require_once("dba/MySQLrequests.php");
require_once("connect.php");


class postQuestionAction extends commonAction {

	public function __construct() {

	}
	protected function executeAction() {
		// check if user is logged in
	//	if(isloggedIn()){
		// get data sent from form
		$a=$_POST['questiontopic']; 
		$b=$_POST['content'];
		$name = '2';
		// checks if data are set
		if (isset($a) && isset($b)){

		$sql="INSERT INTO post(post_title, post_content, post_creator) VALUES('$a','$b','$name')";	
		$conn = new mysqli('localhost','root','');
		mysqli_select_db($conn,'341');
	}
		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		mysqli_close($conn);	

			//header("location:index.php");
			//exit;
	//	}



	

	}
}
