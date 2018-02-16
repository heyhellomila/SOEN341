<?php
require_once("action/commonAction.php");
require_once("dba/MySQLrequests.php");

class postTableAction extends commonAction{

	public function __construct() {
		parent::__construct(commonAction::$VISIBILITY_PUBLIC);
	}

	protected function executeAction() {
		if (isset($_REQUEST["post_id"])) {
			$_SESSION["post_id"]=$_REQUEST["post_id"];
			header("location:viewPost.php");}

			$this->posts=MySQLrequests::getLastPosts(10,0);
	}

	public function getUserByID($id){
		return MySQLrequests::getUserByID($id);
	}
}
