<?php
require_once("action/CommonAction.php");
require_once("dba/MySQLrequests.php");



class PostQuestionAction extends CommonAction {

	public function __construct() {

	}
	protected function executeAction() {
		if (CommonAction::isLoggedIn()) {
			if (isset($_POST['question_topic']) && isset($_POST['content'])){
				$post_title=$_POST['question_topic']; 
				$post_content=$_POST['content'];
				$post_creator = $_SESSION["user_id"];
				$new_post = MySQLrequests::addPost($post_title, $post_content, $post_creator);
				$_SESSION["post_id"]=$new_post;

				header("location:ViewPost.php");
			}
		}
		else
			header("location:SignIn.php");	
	}
}
