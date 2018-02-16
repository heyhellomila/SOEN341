<?php
require_once("dba/MySQLrequests.php");

class postTableAction extends commonAction{

	public function __construct() {
		parent::__construct(commonAction::$VISIBILITY_PUBLIC);
	}

	protected function executeAction() {
		if (isset($_GET["id"])) {
			$id=$_GET["id"];

			$this->post=MySQLrequests::getPostbyID($id);
			$this->postCreator=MySQLrequests::getPostCreatorByPostID($id);
			$this->comments=MySQLrequests::getCommentsByPostID($id);

		}
	}

	public function getUserByID($id){
		return MySQLrequests::getUserByID($id);
	}
}