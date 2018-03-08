<?php
require_once("action/commonAction.php");
require_once("dba/MySQLrequests.php");


class profilePageAction extends commonAction{


	public function __construct() {
		parent::__construct(commonAction::$VISIBILITY_MEMBER);
	}

	protected function executeAction() {
		if (isset($_SESSION["user_id"])) {
			$id=$_SESSION["user_id"];



			$this->username=MySQLrequests::getUserByID($id);
	//		$this->postCreator=MySQLrequests::getPostCreatorByPostID($id);
	//		$this->comments=MySQLrequests::getCommentsByPostID($id);
		}
		else{
			header("location:error404.php");
	}
		 function getUserByID($id){
		return MySQLrequests::getUserByID($id);
	
	}	
}
}