<?php
require_once("action/dba/MySQLrequests.php");
if (!isset($_SESSION["user_id"])) {
	header("location:SignIn.php");
}

if ($_POST["parent_id"]=="post") {
	addComment($_POST["comment_content"]);
}
else{
	addSubComments($_POST["parent_id"],$_POST["comment_content"]);

}

 function addSubComments($id,$content){
	MySQLrequests::addSubComments($_SESSION["user_id"],$_SESSION["post_id"],$id,$content);
}
 function addComment($content){
	MySQLrequests::addComment($_SESSION["user_id"],$_SESSION["post_id"],$content);
}
header("location:ViewPost.php");	