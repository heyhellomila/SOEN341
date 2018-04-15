<?php
	// start session must be the first line of code
session_start();

	// import the constant file and the database connection file.
require_once("action/Constants.php");
require_once("action/dba/Connection.php");


abstract class CommonAction {
	public static $VISIBILITY_PUBLIC = 0;
	public static $VISIBILITY_MEMBER=1;
	public static $VISIBILITY_ADMINISTRATOR = 10;


	private $page_visibility;

		// constructor
	public function __construct($page_visibility) {
		$this->page_visibility = $page_visibility;
	}

	public function execute() {
			// if the user clicked logout kill the current sessiona and start a new one
		if (!empty($_REQUEST["logout"])) {
			session_unset();
			session_destroy();
			session_start();
			header("location:Index.php");
		}
			//if its the first time someone goes to the website in a session. assign him the public visibility. this only execute once every session
		if (empty($_SESSION["visibility"])) {
			$_SESSION["visibility"] = CommonAction::$VISIBILITY_PUBLIC;
		}
			// if the visibility of this page is bigger than the session/viewer visibility redirect to index.php
		if ($_SESSION["visibility"] < $this->page_visibility) {
			header("location:Index.php");				
			exit;
		}
		$this->checkNotifications();
			// execute function is abastract and must be defined in all the action.php files
		$this->executeAction();
	}

	protected abstract function executeAction();

		// function checks if the session visibility is higher than public which means that someone is loged in cuz pupblic = 0 and member = 1
	public function isLoggedIn() {
		return $_SESSION["visibility"] > CommonAction::$VISIBILITY_PUBLIC;
	}
	public function checkNotifications() {
		if (isset($_SESSION["user_id"])) {
			$user_id=$_SESSION["user_id"];
			
			$this->notifications = MySQLrequests::getNotification($user_id);

		}
	}

	public function getName($user_id){
		return MySQLrequests::getUserById($user_id)["user_name"];

	}
}
