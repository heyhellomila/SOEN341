<?php
require_once("action/CommonAction.php");
require_once("dba/MySQLrequests.php");


class ProfilePageAction extends CommonAction{


	public function __construct() {
		parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		$this->wrong_old_pass = false;
		$this->password_not_matching = false;
		$this->password_updated = false;
	}

	protected function executeAction() {

		if (isset($_SESSION["user_id"])) {
			$user_id=$_SESSION["user_id"];
			if (isset($_POST['submit'])){
				
				MySQLrequests::updateProfilePicture($_POST['profile_picture'],$user_id);

				if ($this->checkFields(array('password', 'new_password','new_password_confirm'))) {
					$old_pass = $_POST['password'];
					$new_pass = $_POST['new_password'];
					$new_pass_confirm = $_POST['new_password_confirm'];

					$check_old_pass =MySQLrequests::checkPassword($user_id, $old_pass);
					$this->wrong_old_pass = false;
					$this->password_not_matching = false;
					$this->password_updated = false;
					if (!empty($check_old_pass)) {
						if (strcmp($new_pass,$new_pass_confirm) == 0) {
							MySQLrequests::updatePassword($user_id,$new_pass);
							$this->password_updated=true;
						}
						else{
							$this->password_not_matching=true;
						}
					}
					else {
						$this->wrong_old_pass = true;
					}
				}
				$_SESSION["user_info"]=MySQLrequests::getUserByID($_SESSION["user_id"]);
			}
		}
		else{
			header("location:SignIn.php"); 
		}

	}

	public function checkFields($array){
		foreach($array as $field) {
			if(!isset($_POST[$field]) || empty($_POST[$field])) {
				return false;
			}
		}
		return true;
	}

	public function getNumberPosts($id){
		return MySQLrequests::getNumberPosts($id);
	}

}

