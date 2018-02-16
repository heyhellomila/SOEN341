<?php
require_once("dba/MySQLrequests.php");

class postTableAction extends commonAction{

	public function __construct() {
		parent::__construct(commonAction::$VISIBILITY_PUBLIC);
	}

	protected function executeAction() {
			$this->posts=MySQLrequests::getLastPosts(10,0);
	}

	public function getUserByID($id){
		return MySQLrequests::getUserByID($id);
	}
}
