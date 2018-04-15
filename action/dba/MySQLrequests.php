<?php
require_once("action/CommonAction.php");
require_once("action/dba/Connection.php");

class MySQLRequests {

	private static $connection;

	public static function authenticate($username, $password) {
		$connection = connection::getConnection();
		$pass = sha1($password);

		$statement = $connection->prepare("SELECT *from user where user_pass = ? and user_email = ?");

		$statement->bindParam(1, $pass);
		$statement->bindParam(2, $username);

		$statement->setFetchMode(PDO::FETCH_ASSOC);

		$statement->execute();

		$info = $statement->fetch();
		connection::closeConnection();
		return $info;
	}

	public static function signUp($user_name,$user_email,$user_pass)
	{
		$connection = Connection::getConnection();

		$statement = $connection->prepare("INSERT into user (user_name, user_email, user_pass) Values (?,?,?)");

		$pass = sha1($user_pass);

		$statement->bindParam(1, $user_name);

		$statement->bindParam(3, $pass);

		$statement->bindParam(2, $user_email);


		$statement->execute();
		Connection::closeConnection();


	}

	public static function checkEmail($email) {
		$connection = Connection::getConnection();

		$check= $connection->prepare("SELECT user_email FROM user WHERE user_email = ?");
		$check->bindParam(1,$email);
		$check->execute();

		Connection::closeConnection();
		return $check;
	}

	public static function getPostById($id) {
		$connection = Connection::getConnection();

		$statement = $connection->prepare("SELECT * from post where post_id=?;");

		$statement->bindParam(1, $id);
		$statement->execute();

		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$info = $statement->fetch();

		Connection::closeConnection();
		return $info;
	}

	public static function getPostCreatorByPostId($id) {
		$connection = Connection::getConnection();

		$statement = $connection->prepare("SELECT user.* from user left JOIN  post ON (user_id = post.post_creator) where post.post_id=?;");

		$statement->bindParam(1, $id);
		$statement->execute();

		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$info = $statement->fetch();

		Connection::closeConnection();
		return $info;
		

	}
	
	public static function getCommentCreatorByCommentId($id) {
		$connection = Connection::getConnection();

		$statement = $connection->prepare("SELECT user.* from user left JOIN  comment ON (user_id = comment.comment_creator) where comment.comment_id=?;");
		
		$statement->bindParam(1, $id);
		$statement->execute();

		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$info = $statement->fetch();
		
		Connection::closeConnection();
		return $info;
		
	}


	public static function getCommentsByPostId($id) {
		$connection = Connection::getConnection();

		$statement = $connection->prepare("SELECT comment.* from comment,post_comment_ass where comment.comment_id=post_comment_ass.comment_id and post_comment_ass.post_id=?;");

		$statement->bindParam(1, $id);
		$statement->execute();

		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$info = $statement->fetchAll();

		Connection::closeConnection();
		return $info;
		
	}

	public static function getCommentsByCommentsId($id) {
		$connection = Connection::getConnection();

		$statement = $connection->prepare("SELECT comment.* from comment,comment_comment_ass where comment.comment_id=comment_comment_ass.child_id and comment_comment_ass.parent_id=?;");

		$statement->bindParam(1, $id);
		$statement->execute();

		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$info = $statement->fetchAll();

		Connection::closeConnection();
		return $info;
		
	}

	public static function getUserById($id) {
		$connection = Connection::getConnection();

		$statement = $connection->prepare("SELECT * from user  where user_id=?;");

		$statement->bindParam(1, $id);
		$statement->execute();

		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$info = $statement->fetch();

		Connection::closeConnection();
		return $info;
		
	}

	public static function insertComment($creator,$content) {
		$connection = Connection::getConnection();

		$statement = $connection->prepare("INSERT INTO comment(comment_content,comment_creator) values(?,?);");

		$statement->bindParam(1, $content);
		$statement->bindParam(2, $creator);
		$statement->execute();

		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$info = $statement->fetch();

		Connection::closeConnection();
		return $connection->LastInsertId();;
	}

	public static function getLastPosts($limit,$offset) {
		$connection = Connection::getConnection();

		$statement = $connection->prepare("SELECT * from post limit ? offset ?");

		$statement->bindParam(1, $limit);
		$statement->bindParam(2, $offset);
		$statement->execute();

		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$info = $statement->fetchAll();

		Connection::closeConnection();
		return $info;
	}

	public static function updatePostLike($post_id, $new_likes) {
		$connection = Connection::getConnection();

		$statement = $connection->prepare("UPDATE post SET post_nb_likes=? WHERE post_id=?");
		
		$statement->bindParam(1, $new_likes);
		$statement->bindParam(2, $post_id);
		$statement->execute();

		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$info = $statement->fetch();

		Connection::closeConnection();
		return $info;
	}

	public static function updateCommentLike($comment_id, $new_likes) {
		$connection = Connection::getConnection();
		$statement = $connection->prepare("UPDATE comment SET comment_nb_likes=? WHERE comment_id=?");
		
		$statement->bindParam(1, $new_likes);
		$statement->bindParam(2, $comment_id);
		$statement->execute();
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$info = $statement->fetch();
		Connection::closeConnection();
		return $info;
	}


	public static function addComment($creator,$post_id,$content)  {
		$connection = Connection::getConnection();

		$statement = $connection->prepare("INSERT INTO post_comment_ass(post_id,comment_id) VALUES(?,?);");
		$id=MySQLRequests::insertComment($creator,$content);

		$statement->bindParam(1, $post_id);
		$statement->bindParam(2, $id);
		$statement->execute();

		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$info = $statement->fetch();
		
		Connection::closeConnection();
		
		$post_creator_id = MySQLRequests::getPostCreatorByPostId($post_id)["user_id"];
		if ($post_creator_id != $creator) {
			MySQLRequests::addNotification($post_id,$post_creator_id,$creator);
		}
		
		
		return ;
		
	}

	public static function addSubComments($creator,$post_id,$parent,$content) {
		$connection = Connection::getConnection();

		$statement = $connection->prepare("INSERT INTO comment_comment_ass(parent_id,child_id) VALUES(?,?);");
		
		$id=MySQLRequests::insertComment($creator,$content);
		
		$statement->bindParam(1, $parent);
		$statement->bindParam(2, $id);
		$statement->execute();

		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$info = $statement->fetch();
		
		Connection::closeConnection();
		
		$comment_creator_id = MySQLRequests::getCommentCreatorByCommentId($parent)["user_id"];
		if ($comment_creator_id != $creator) {
			MySQLRequests::addNotification($post_id,$comment_creator_id,$creator);
		}
		

		return $info;
		
	}


	public static function updateBio($id, $bio) {
		$connection = Connection::getConnection();

		$statement = $connection->prepare("UPDATE user SET user_bio=? WHERE user_id=?");

		$statement->bindParam(1, $bio);
		$statement->bindParam(2, $id);
		$statement->execute();

		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$info = $statement->fetch();

		Connection::closeConnection();
		return $info;
	}


	public static function updatePassword($user_id,$password){
		$connection = Connection::getConnection();
		$hashPassword = sha1($password);
		$statement = $connection->prepare("UPDATE user SET user_pass=? WHERE user_id=?");

		$statement->bindParam(1, $hashPassword);
		$statement->bindParam(2, $user_id);
		$statement->execute();

		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$info = $statement->fetch();

		Connection::closeConnection();
		return $info;
		

	}
	public static function checkPassword($user_id,$password){
		$connection = connection::getConnection();
		$pass = sha1($password);

		$statement = $connection->prepare("SELECT *from user where user_pass = ? and user_id = ?");

		$statement->bindParam(1, $pass);
		$statement->bindParam(2, $user_id);

		$statement->setFetchMode(PDO::FETCH_ASSOC);

		$statement->execute();

		$info = $statement->fetch();
		connection::closeConnection();
		return $info;
		

	}
	public static function getPopularPost(){
		$connection=connection::getConnection();
		$statement = $connection->prepare("SELECT * FROM post ORDER BY post_nb_likes DESC LIMIT 3");
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$statement->execute();
		$info = $statement->fetchAll();
		connection::closeConnection();
		return $info;
	}

	public static  function getNewestPost(){
		$connection=connection::getConnection();
		
		$statement = $connection->prepare("SELECT * FROM post ORDER BY post_id DESC LIMIT 3");
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$statement->execute();
		$info = $statement->fetchAll();
		connection::closeConnection();
		return $info;
	}

	public static function getUnpopularPost(){
		$connection=connection::getConnection();
		$statement = $connection->prepare("SELECT * FROM post ORDER BY post_nb_answers ASC LIMIT 3");
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$statement->execute();
		$info = $statement->fetchAll();
		connection::closeConnection();
		return $info;
	}

	public static function getNumberPosts($id){
		$connection=connection::getConnection();
		$statement= $connection->prepare("SELECT * FROM post WHERE post_creator=?");
		$statement->bindParam(1, $id);
		$statement->execute();
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$info=count($statement->fetchall());
		connection::closeConnection();

		return $info;

	}


	public static function updateProfilePicture($new_user_img,$user_id){
		$connection=connection::getConnection();
		$statement= $connection->prepare("UPDATE user set user_img=? WHERE user_id=?");
		$statement->bindParam(1, $new_user_img);
		$statement->bindParam(2, $user_id);
		$statement->execute();
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$info=count($statement->fetchall());
		connection::closeConnection();

		return $info;

	}
	

	public static function addNotification($notification_post_id,$notification_notificant_id,$notification_notifier_id){
		$connection = Connection::getConnection();
		
		$statement = $connection->prepare("INSERT INTO notifications(notification_post_id,notification_notificant_id,notification_notifier_id) 
			VALUES(?,?,?);");

		$statement->bindParam(1, $notification_post_id);
		$statement->bindParam(2, $notification_notificant_id);
		$statement->bindParam(3, $notification_notifier_id);
		
		$statement->execute();
		$info = $statement->fetchAll();
		Connection::closeConnection();
		
		return $info;	
	}
	
	public static function getNotification($notification_notificant_id){
		$connection = Connection::getConnection();
		
		$statement = $connection->prepare("SELECT * FROM notifications WHERE notification_notificant_id=? and notification_status=? order by notification_id desc;");
		$temp = 1;
		$statement->bindParam(1, $notification_notificant_id);
		$statement->bindParam(2,$temp);
		$statement->execute();
		
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$info = $statement->fetchAll();
		Connection::closeConnection();
		
		return $info;	
	}
	public static function checkSeeNotifById($notification_id){
		$connection = Connection::getConnection();
		
		$statement = $connection->prepare("UPDATE notifications set notification_status=0 where notification_id=?;
			");
		$temp = 1;
		$statement->bindParam(1, $notification_id);
		$statement->execute();
		
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$info = $statement->fetchAll();
		Connection::closeConnection();
		
		return $info;	
	}

	public static function getPostIdbyCommentId($comment_id){
		$connection = Connection::getConnection();
		
		$statement = $connection->prepare("SELECT post_id from post_comment_ass  where comment_id=?");

		$statement->bindParam(1, $comment_id);
		$statement->execute();
		
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$info = $statement->fetch();
		Connection::closeConnection();
		
		return $info;	
	}
	public static function getCommentById($id) {
		$connection = Connection::getConnection();

		$statement = $connection->prepare("SELECT * from comment where comment_id=?");

		$statement->bindParam(1, $id);
		$statement->execute();

		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$info = $statement->fetch();

		Connection::closeConnection();
		return $info;
	}

	public static function getAnswers($id, $answers) {
		$connection = Connection::getConnection();

		$statement = $connection->prepare("UPDATE post SET post_nb_answers=? WHERE post_id=?");
		
		$statement->bindParam(1, $answers);
		$statement->bindParam(2, $id);
		$statement->execute();

		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$info = $statement->fetch();

		Connection::closeConnection();
		return $info;
	}
	public static function getBestAnswerByPostId($post_id) {
		$connection = Connection::getConnection();

		$statement = $connection->prepare("SELECT * from post  WHERE post_id=?");
		
		$statement->bindParam(1, $post_id);
		$statement->execute();

		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$info = $statement->fetch();

		Connection::closeConnection();
		return $info;
	}
	public static function getIsFavorite($comment_id) {
		$connection = Connection::getConnection();

		$statement = $connection->prepare("SELECT comment.* from post_comment_ass left JOIN  comment ON (comment.comment_id = post_comment_ass.comment_id) where post_comment_ass.comment_id=? and favorite=1;;
			");
		
		$statement->bindParam(1, $comment_id);
		$statement->execute();

		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$info = $statement->fetch();

		Connection::closeConnection();
		return $info;
	}
	public static function invertFavorite($comment_id,$temp) {
		$connection = Connection::getConnection();

		$statement = $connection->prepare("UPDATE post_comment_ass SET favorite=? WHERE comment_id=?");
		
		$statement->bindParam(1, $temp);
		$statement->bindParam(2, $comment_id);
		$statement->execute();

		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$info = $statement->fetch();

		Connection::closeConnection();
		return $info;
	}
	public static function getFavoriteStatus($comment_id) {
		$connection = Connection::getConnection();

		$statement = $connection->prepare("SELECT * from post_comment_ass where comment_id=?");

		$statement->bindParam(1, $comment_id);
		$statement->execute();

		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$info = $statement->fetch();

		Connection::closeConnection();
		return $info;
	}	



	public static function addPost($post_title, $post_content, $post_creator){
		$connection=connection::getConnection();

		$statement = $connection->prepare("INSERT INTO post(post_title, post_content, post_creator) VALUES(?,?,?)");

		$statement->bindParam(1, $post_title);
		$statement->bindParam(2, $post_content);
		$statement->bindParam(3, $post_creator);

		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$statement->execute();
		$info = $statement->fetchAll();

		connection::closeConnection();
		return $connection->LastInsertId();;
	}
}
