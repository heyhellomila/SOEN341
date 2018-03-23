<?php

require_once("action/commonAction.php");
require_once("dba/MySQLrequests.php");

class postTableAction extends commonAction{

	public function __construct() {
		parent::__construct(commonAction::$VISIBILITY_PUBLIC);
	}

	protected function executeAction() {
		if (isset($_REQUEST["post_id"])) {
			$_SESSION["post_id"]=$_REQUEST["post_id"];
			
			header("location:viewPost.php");
		}

			$this->posts=MySQLrequests::getLastPosts(255,0);
	}

	public function getPostByID($id){
		return MySQLrequests::getPostByID($id);
	}

	public function getUserByID($id){
		return MySQLrequests::getUserByID($id);
	}

	public function addPostLike(){
		if (isset($_POST['post_liked'])) {
			$post_id = $_POST['postid'];
			$post = $this->getPostByID($post_id);
			$newLike = $post["post_nb_likes"]+1;
			MySQLrequests::updatePostLike($post_id, $newLike);
			echo $newLike;
			exit(); 
		}
	}	

	public function addPostDisike(){
		if (isset($_POST['post_disliked'])) {
			$post_id = $_POST['postid'];
			$post = $this->getPostByID($post_id);
			$newLike = $post["post_nb_likes"]-1;
			MySQLrequests::updatePostLike($post_id, $newLike);
			echo $newLike;
			exit(); 
		}

	}
}
