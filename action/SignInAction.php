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
			$user =MySQLrequests::authenticate($_POST["username"], $_POST["password"]);
			$this->wrongSignin = false;
			if (!empty($user)) {
				$_SESSION["visibility"] = commonAction::$VISIBILITY_MEMBER;
				$_SESSION["user_id"] = $user["user_id"];

				header("location:index.php");
				exit;
			}
			else {
				$this->wrongSignin = true;
			}
		}
	}
}
/* Include FB config file && User class
require_once ("action/fbConfig.php");

if(isset($accessToken)){
	if(isset($_SESSION['facebook_access_token'])){
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}else{
        // Put short-lived access token in session
		$_SESSION['facebook_access_token'] = (string) $accessToken;

          // OAuth 2.0 client handler helps to manage access tokens
		$oAuth2Client = $fb->getOAuth2Client();

        // Exchanges a short-lived access token for a long-lived one
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
		$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;

        // Set default access token to be used in script
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}

    // Redirect the user back to the same page if url has "code" parameter in query string
	if(isset($_GET['code'])){
		header('Location: ./');
	}

    // Getting user facebook profile info
	try {
		$profileRequest = $fb->get('/me?fields=name,first_name,last_name,email,link,gender,locale,cover,picture');
		$fbUserProfile = $profileRequest->getGraphNode()->asArray();
	} catch(FacebookResponseException $e) {
		echo 'Graph returned an error: ' . $e->getMessage();
		session_destroy();
        // Redirect user back to app login page
		header("Location: ./");
		exit;
	} catch(FacebookSDKException $e) {
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}

    // Initialize User class
	$user =MySQLrequests::authenticate($_POST["username"], $_POST["password"]);
	$this->wrongSignin = false;
	if (!empty($user)) {
		$_SESSION["visibility"] = commonAction::$VISIBILITY_MEMBER;
		$_SESSION["user_id"] = $user["user_id"];

		header("location:index.php");
		exit;}
		else{
			MySQLrequests::signup($fbUserProfile['first_name'],$fbUserProfile['email'],$fbUserProfile['id']);
			$_SESSION["visibility"] = commonAction::$VISIBILITY_MEMBER;
			$user =MySQLrequests::authenticate($fbUserProfile["first_name"], $fbUserProfile["id"]);
			$_SESSION["user_id"] = $user["user_id"];


		}

    // Insert or update user data to the database


    // Get logout url
		$logoutURL = $helper->getLogoutUrl($accessToken, $redirectURL.'logout.php');

    // Render facebook profile data
		if(!empty($userData)){ 
			$output = '<h3 style="color:green">all good problem occurred, please try again.</h3>';
		}else{
			$output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
		}

	}else{
    // Get login url
		$loginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);

    // Render facebook login button
  //  $output = '<a href="'.htmlspecialchars($loginURL).'"><img src="images/fblogin-btn.png"></a>';
	}*/