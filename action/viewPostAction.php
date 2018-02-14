<?php
require_once("action/CommonAction.php");

class viewPostAction extends CommonAction{

	public function __construct() {
		parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
	}

	protected function executeAction() {
		if (isset($_GET["id"])) {
			$id=$_GET["id"];



			$this->post=MySQLrequests::getPostbyID($id);
			$this->postCreator=MySQLrequests::getPostCreatorByPostID($id)
			$this->comments=MySQLrequests::getCommentsByPostID($id);
			$this->subComments[];

		}
		else{
			header("location:error404.php");	
		}
	}

}