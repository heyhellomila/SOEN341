<?php
require_once("action/CommonAction.php");
require_once("dba/MySQLrequests.php");

class ViewPostAction extends CommonAction{

	public function __construct() {
		parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
	}

	protected function executeAction() {
		if (isset($_SESSION["post_id"])) {
			$post_id=$_SESSION["post_id"];


			$this->post=MySQLrequests::getPostbyID($post_id);
			$this->post_creator=MySQLrequests::getPostCreatorByPostID($post_id);
			$this->comments=MySQLrequests::getCommentsByPostID($post_id);

			$this->invertFavorite();
			$this->addPostLike();
			$this->addPostDisike();
			$this->addCommentLike();
			$this->addCommentDisike();
			
		}
	}
	

	public function isViewerCreator(){
		if ($this->isLoggedIn() && $this->postCreator["user_id"] == $_SESSION["user_id"]) {
			return true;
		}
		return false;
	}
	public function isFavorite($comment_id){
		if (!empty(MySQLrequests::getIsFavorite($comment_id))) {
			return true;
		}
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


	public function invertFavorite(){
		if (isset($_POST["comment_id"])){
			$comment_id = $_POST["comment_id"];			
			$invert_favorite = abs(MySQLRequests::getFavoriteStatus($comment_id)["favorite"]-1);
			MySQLrequests::invertFavorite($comment_id,$invert_favorite);
		}
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
	public function addCommentLike(){
		if (isset($_POST['comment_liked'])) {
			$comment_id = $_POST['comment_id'];
			$comment = $this->getCommentByID($comment_id);
			$new_like = $comment["comment_nb_likes"]+1;
			MySQLrequests::updateCommentlike($comment_id, $new_like);
			echo $new_like;
		}
	}	
	public function addCommentDisike(){
		if (isset($_POST['comment_disliked'])) {
			$comment_id = $_POST['comment_id'];
			$comment = $this->getCommentByID($comment_id);
			$new_like = $comment["comment_nb_likes"]-1;
			MySQLrequests::updateCommentlike($comment_id, $new_like);
			echo $new_like;
		}
	}	

	public function getAnswers($id, $answers){
		return MySQLrequests::getAnswers($id, $answers);
	}

}