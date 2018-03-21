<?php
require_once("action/commonAction.php");
require_once("dba/MySQLrequests.php");

class viewPostAction extends commonAction{

	public function __construct() {
		parent::__construct(commonAction::$VISIBILITY_PUBLIC);
	}

	protected function executeAction() {
		if (isset($_SESSION["post_id"])) {
			$id=$_SESSION["post_id"];


			$this->post=MySQLrequests::getPostbyID($id);
			$this->postCreator=MySQLrequests::getPostCreatorByPostID($id);
			$this->comments=MySQLrequests::getCommentsByPostID($id);
			

		}
		else{
			header("location:error404.php");	
		}
	}
	public function favoriteComment($comment_id){
		return MySQLrequests::favoriteComment($comment_id);
		

	}
	public function unfavoriteComment($comment_id){

			$wrongSignin=true;
		return MySQLrequests::unfavoriteComment($comment_id);
		
	}

	public function isViewerCreator(){
		if ($this->postCreator["user_id"] == $_SESSION["user_id"]) 
			return true;
		return false;
	}
	public function isFavorite($comment_id){
		if (!empty(MySQLrequests::getIsFavorite($comment_id))) 
			return true;
			return false;
		}

		public function getSubComments($id){
			return MySQLrequests::getCommentsByCommentsID($id);
		}

		public function getUserByID($id){
			return MySQLrequests::getUserByID($id);
		}

		public function getPostByID($id){
			return MySQLrequests::getPostByID($id);
		}

		public function getCommentByID($id){
			return MySQLrequests::getCommentByID($id);
		}

		public function updateLike($id, $n){
			return MySQLrequests::updateLike($id, $n);
		}	

		public function updateDislike($id, $n){
			return MySQLrequests::updateDislike($id, $n);
		}

		public function updateCommentLike($id, $n){
			return MySQLrequests::updateCommentLike($id, $n);
		}	

		public function updateCommentDislike($id, $n){
			return MySQLrequests::updateCommentDislike($id, $n);
		}

		public function getAnswers($id, $answers){
			return MySQLrequests::getAnswers($id, $answers);
		}

	}