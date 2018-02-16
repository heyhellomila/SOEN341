<?php
require_once("action/commonAction.php");
require_once("dba/MySQLrequests.php");

class viewPostAction extends commonAction{

	public function __construct() {
		parent::__construct(commonAction::$VISIBILITY_PUBLIC);
		$_SESSION["post_id"]=1;
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

		if (isset($_POST["commentPost"]) && isset($_POST["commentPostContent"])) {
			addComment();
		}
	}

	public function getSubComments($id){
		return MySQLrequests::getCommentsByCommentsID($id);
	}
	public function getUserByID($id){
		return MySQLrequests::getUserByID($id);
	
	}

	public function addSubComments($id,$content){
		return MySQLrequests::addCommentComment($id);
	}
	public function addComment($id,$content){
		return MySQLrequests::addComment($id,$content);
	}
}