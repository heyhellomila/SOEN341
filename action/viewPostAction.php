<?php
require_once("action/commonAction.php");
require_once("dba/MySQLrequests.php");

class viewPostAction extends commonAction{

	public function __construct() {
		parent::__construct(commonAction::$VISIBILITY_PUBLIC);
	}

	protected function executeAction() {
		if (isset($_SESSION["post_id"])) {
			$id=$_SESSION["post_id"];



			$this->post=MySQLrequests::getPostbyID($id);
			$this->postCreator=MySQLrequests::getPostCreatorByPostID($id);
			$this->comments=MySQLrequests::getCommentsByPostID($id);

		}
		else{
			header("location:error404.php");	
		}
	}

	public function getSubComments($id){
		return MySQLrequests::getCommentsByCommentsID($id);
	}

	public function getUserByID($id){
		return MySQLrequests::getUserByID($id);
	}

	public function getPostByID($id){
		return MySQLrequests::getPostByID($id);
	}

	public function getCommentByID($id){
		return MySQLrequests::getCommentByID($id);
	}

	public function updateLike($id, $likes){
		return MySQLrequests::updateLike($id, $likes);
	}	

	public function updateDislike($id, $likes){
		return MySQLrequests::updateDislike($id, $likes);
	}

	public function updateCommentLike($id, $likes){
		return MySQLrequests::updateCommentLike($id, $likes);
	}	

	public function updateCommentDislike($id, $likes){
		return MySQLrequests::updateCommentDislike($id, $likes);
	}

	public function getAnswers($id, $answers){
		return MySQLrequests::getAnswers($id, $answers);
	}

}