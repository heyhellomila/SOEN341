<?php

require_once("action/commonAction.php");
require_once("dba/MySQLrequests.php");

class SignInAction extends commonAction {

	public $wrongSignin;

	public function __construct() {
		parent::__construct(commonAction::$VISIBILITY_PUBLIC);
		$this->wrongSignin = false;
	}

	protected function executeAction() {
		if (isset($_POST["username"])) {
			$user = $this->authenticate($_POST);
			$this->wrongSignin = false;
			if (!empty($user)) {
				$_SESSION["visibility"] = commonAction::$VISIBILITY_MEMBER;
				$_SESSION["user_id"] = $user["user_id"];
				$_SESSION["userInfo"]=MySQLrequests::getUserByID($_SESSION["user_id"]);

				header("location:index.php");
				exit;
			}
			else {
				$this->wrongSignin = true;
			}
		}
	}

	public function authenticate($user){
		return MySQLrequests::authenticate($user["username"], $user["password"]);
	}
}