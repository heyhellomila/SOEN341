<?php

require_once("action/CommonAction.php");
require_once("action/dba/MySQLrequests.php");

class SignUpAction extends CommonAction {

	public $wrong_sign_Up;
	public $good_sign_Up;

	public function __construct() {
		parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		
	}

	protected function executeAction() {
		$this->wrong_sign_Up = false;
		$this->good_sign_Up = false;


		if(isset($_REQUEST['username']) && isset($_REQUEST['password']) && isset($_REQUEST['email']) )
		{
			$check =MySQLrequests::checkEmail($_REQUEST['email']);
			if($check-> rowCount() > 0)
			{ 
				$this->wrong_sign_Up = true;
			}
			else {
				MySQLrequests::signUp($_REQUEST['username'],$_REQUEST['email'],$_REQUEST['password']);
				$this->good_sign_Up = true;
			}
		}
	}
}
