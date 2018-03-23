<?php

require_once("action/commonAction.php");
require_once("action/dba/MySQLrequests.php");

class SignUpAction extends commonAction {

	public $wrongSignUp;
	public $GoodSignUp;

	public function __construct() {
		parent::__construct(commonAction::$VISIBILITY_PUBLIC);
		
	}

	protected function executeAction() {
		$this->wrongSignUp = false;
		$this->GoodSignUp = false;


		if(isset($_REQUEST['username']) && isset($_REQUEST['pwd1']) && isset($_REQUEST['email']) )
		{
			$check =MySQLrequests::checkEmail($_REQUEST['email']);
			if($check-> rowCount() > 0)
			{ 
				$this->wrongSignUp = true;
			}
			else {
				MySQLrequests::signup($_REQUEST['username'],$_REQUEST['email'],$_REQUEST['pwd1']);

				$this->GoodSignUp = true;
			}
		}








	}
}
