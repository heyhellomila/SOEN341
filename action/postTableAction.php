<?php

require_once("action/CommonAction.php");
require_once("dba/MySQLrequests.php");

class PostTableAction extends CommonAction{

	public function __construct() {
		parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
	}

	protected function executeAction() {
		if (isset($_REQUEST["post_id"])) {
			$_SESSION["post_id"]=$_REQUEST["post_id"];
			
			header("location:ViewPost.php");
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
			$post_id = $_POST['post_id'];
			$post = $this->getPostByID($post_id);
			$new_like = $post["post_nb_likes"]+1;
			MySQLrequests::updatePostLike($post_id, $new_like);
			echo $new_like;
		}
	}	

	public function addPostDisike(){
		if (isset($_POST['post_disliked'])) {
			$post_id = $_POST['post_id'];
			$post = $this->getPostByID($post_id);
			$new_like = $post["post_nb_likes"]-1;
			MySQLrequests::updatePostLike($post_id, $new_like);
			echo $new_like;
		}

	}
}
