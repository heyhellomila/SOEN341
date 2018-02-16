<?php
	require_once("action/commonAction.php");
	require_once("action/dba/connection.php");

	class MySQLRequests {

		private static $connection;

		//remove weird characters created by HTML
		public static function clearString($badStr){		
			$goodStr = htmlspecialchars ($badStr);
			return $goodStr;
		}

		
		public static function template($desc,$id,$ext,$title,$main) {
			//clean strings

			$desc=MySQLRequests::clearString($desc);
			$title=MySQLRequests::clearString($title);

			//open connection
			$connection = Connection::getConnection();
			//prepare your request and put "?" instead ov the variables
			$statement = $connection->prepare("INSERT into j_realisation(ID_PROFIL,INFORMATION,IMG_EXT,NOM,MAIN) Values (?,?,?,?,?)");

			// assign the "?" to variables
			$statement->bindParam(1, $id);
			$statement->bindParam(2, $desc);
			$statement->bindParam(3, $ext);
			$statement->bindParam(4, $title);
			$statement->bindParam(5, $main);
			//execute your request
			$statement->execute();

			//PDO::FETCH_ASSOC: returns an array indexed by column name as returned in your result set 
			$statement->setFetchMode(PDO::FETCH_ASSOC);

			//get the results and put them in a variable
			$info = $statement->fetchAll();
			//close connection
			Connection::closeConnection();
			//return your variable
			return $info;
		}


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


		public static function getPostbyID($id) {
			$connection = Connection::getConnection();

			$statement = $connection->prepare("SELECT * from post where post_id=?;");
			
			$statement->bindParam(1, $id);
			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$info = $statement->fetch();

			Connection::closeConnection();
			return $info;
		}

		public static function getPostCreatorByPostID($id) {
			$connection = Connection::getConnection();

			$statement = $connection->prepare("SELECT user.* from user left JOIN  post ON (user_id = post.post_creator) where post.post_id=?;");
			
			$statement->bindParam(1, $id);
			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$info = $statement->fetch();
			
			Connection::closeConnection();
			return $info;
		
		}

		public static function getCommentsByPostID($id) {
			$connection = Connection::getConnection();

			$statement = $connection->prepare("SELECT comment.* from comment,post_comment_ass where comment.comment_id=post_comment_ass.comment_id and post_comment_ass.post_id=?;");
			
			$statement->bindParam(1, $id);
			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$info = $statement->fetchAll();
			
			Connection::closeConnection();
			return $info;
		
		}

		public static function getCommentsByCommentsID($id) {
			$connection = Connection::getConnection();

			$statement = $connection->prepare("SELECT comment.* from comment,comment_comment_ass where comment.comment_id=comment_comment_ass.child_id and comment_comment_ass.parent_id=?;");
			
			$statement->bindParam(1, $id);
			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$info = $statement->fetchAll();
			
			Connection::closeConnection();
			return $info;
		
		}

		public static function getUserByID($id) {
			$connection = Connection::getConnection();

			$statement = $connection->prepare("SELECT * from user  where user_id=?;");
			
			$statement->bindParam(1, $id);
			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$info = $statement->fetch();
			
			Connection::closeConnection();
			return $info;
		
		}

		public static function addComment($creator,$parent,$content)  {
			$connection = Connection::getConnection();

			$statement = $connection->prepare("INSERT INTO post_comment_ass(post_id,comment_id) VALUES(?,?);");
			$id=MySQLRequests::insertComment($creator,$content);
echo $id;
			$statement->bindParam(1, $parent);
			$statement->bindParam(2, $id);
			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$info = $statement->fetch();
			
			Connection::closeConnection();
			return ;
		
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
		

		public static function addSubComments($creator,$parent,$content) {
			$connection = Connection::getConnection();

			$statement = $connection->prepare("INSERT INTO comment_comment_ass(parent_id,child_id) VALUES(?,?);");
			
			$id=MySQLRequests::insertComment($creator,$content);
			
			$statement->bindParam(1, $parent);
			$statement->bindParam(2, $id);
			$statement->execute();

			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$info = $statement->fetch();
			
			Connection::closeConnection();
			return $info;
		
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

	}