<?php

require_once("action/commonAction.php");
require_once("dba/MySQLrequests.php");

class notification_action extends commonAction{
	
	public function __construct() 
	{
		parent::__construct(commonAction::$VISIBILITY_PUBLIC);
	}
	
	protected function executeAction() {
		if (isset($_SESSION["user_id"])) {
			$id=$_SESSION["user_id"];
			
			$this->user=MySQLrequests::getUserbyID($id);
		}
	}
	
	public function get_notification_status($id){
		return MySQLrequests::get_notification_status($id);
	}
}