<?php

require_once("action/CommonAction.php");
require_once("dba/MySQLrequests.php");

class SignInAction extends CommonAction {

	public $wrong_signSin;

	public function __construct() {
		parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		$this->wrong_signSin = false;
	}

	protected function executeAction() {
		if (isset($_POST["username"])) {
			$user =MySQLrequests::authenticate($_POST["username"], $_POST["password"]);
			$this->wrong_sign_in = false;
			if (!empty($user)) {
				$_SESSION["visibility"] = CommonAction::$VISIBILITY_MEMBER;
				$_SESSION["user_id"] = $user["user_id"];
				$_SESSION["user_info"]=MySQLrequests::getUserById($_SESSION["user_id"]);

				header("location:Index.php");
			}
			else {
				$this->wrong_sign_in = true;
			}
		}
	}
}