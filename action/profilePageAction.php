<?php
require_once("action/commonAction.php");
require_once("dba/MySQLrequests.php");


class profilePageAction extends commonAction{


	public function __construct() {
		parent::__construct(commonAction::$VISIBILITY_PUBLIC);
		$this->wrongOldPass = false;
		$this->passwordNotMatching = false;
		$this->passwordUpdated = false;
	}

	protected function executeAction() {

		if (isset($_SESSION["user_id"])) {
			$user_id=$_SESSION["user_id"];
			if (isset($_POST['submit'])){
				MySQLrequests::updateProfilePicture($_POST['profilePicture'],$user_id);

				if ($this->checkFields(array('password', 'newpassword','newpasswordConfirm'))) {
					$oldPass = $_POST['password'];
					$newPass = $_POST['newpassword'];
					$newPassConfiorm = $_POST['newpasswordConfirm'];

					$checkOldPass =MySQLrequests::checkPassword($user_id, $oldPass);
					$this->wrongOldPass = false;
					$this->passwordNotMatching = false;
					$this->passwordUpdated = false;
					if (!empty($checkOldPass)) {
						if (strcmp($newPass,$newPassConfiorm) == 0) {
							MySQLrequests::updatePassword($user_id,$newPass);
							$this->passwordUpdated=true;
						}
						else{
							$this->passwordNotMatching=true;
						}
					}
					else {
						$this->wrongOldPass = true;
					}
				}
				$_SESSION["userInfo"]=MySQLrequests::getUserByID($_SESSION["user_id"]);
			}
		}
		else{
			header("location:signin.php"); 
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

