<?php
require_once("action/commonAction.php");
require_once("dba/MySQLrequests.php");



class postQuestionAction extends commonAction {

	public function __construct() {

	}
	protected function executeAction() {
		if (commonAction::isLoggedIn()) {
			

			

			if (isset($_POST['questiontopic']) && isset($_POST['content'])){
				$post_title=$_POST['questiontopic']; 
				$post_content=$_POST['content'];
				$post_creator = $_SESSION["user_id"];
				$newpost = MySQLrequests::addPost($post_title, $post_content, $post_creator);
				$_SESSION["post_id"]=$newpost;

				header("location:viewPost.php");
			}
		}
		else
			header("location:signIn.php");
		
	}
}
