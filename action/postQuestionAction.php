<?php
require_once("action/commonAction.php");
require_once("dba/MySQLrequests.php");



class postQuestionAction extends commonAction {

	public function __construct() {

	}
	protected function executeAction() {
		if (commonAction::isLoggedIn()) {
			

			$a=$_POST['questiontopic']; 
			$b=$_POST['content'];
			$name = $_SESSION["user_id"];
			if (isset($a) && isset($b)){

				$connection=connection::getConnection();

				$statement = $connection->prepare("INSERT INTO post(post_title, post_content, post_creator) VALUES(?,?,?)");

				$statement->bindParam(1, $a);
				$statement->bindParam(2, $b);
				$statement->bindParam(3, $name);

				$statement->setFetchMode(PDO::FETCH_ASSOC);
				$statement->execute();
				$info = $statement->fetchAll();
				$liked=$info;

				connection::closeConnection();
			}
		}
		else
			header("location:signIn.php");
		
	}
}
