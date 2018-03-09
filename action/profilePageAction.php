<?php
require_once("action/commonAction.php");
require_once("dba/MySQLrequests.php");


class profilePageAction extends commonAction{


	public function __construct() {
		parent::__construct(commonAction::$VISIBILITY_PUBLIC);
	}

	protected function executeAction() {


		if (isset($_REQUEST["user"])) {
			$id=$_POST["user"];
			header("location:profilePage.php");
			$this->userInfo=MySQLrequests::getPostCreatorByPostID($id);

		}
		elseif (isset($_SESSION["user_id"])) {
			$id=$_SESSION["user_id"];



			$this->userInfo=MySQLrequests::getUserByID($id);
		}

		else {
			header("location:error404.php");
		}
		function getUserByID($id){
			return MySQLrequests::getUserByID($id);

		}	
	}
}

