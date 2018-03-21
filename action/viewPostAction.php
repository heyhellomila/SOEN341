<?php
require_once("action/commonAction.php");
require_once("dba/MySQLrequests.php");

class viewPostAction extends commonAction{

	public function __construct() {
		parent::__construct(commonAction::$VISIBILITY_PUBLIC);
	}

	protected function executeAction() {
		if (isset($_SESSION["user_id"])) {
			$id=$_SESSION["user_id"];



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


}