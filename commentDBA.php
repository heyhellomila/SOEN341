<?php
require_once("action/dba/MySQLrequests.php");
if (!isset($_SESSION["user_id"])) {
	header("location:signIn.php");
}

if ($_POST["parent_id"]=="post") {
	addComment($_POST["commentContent"]);
}
else{
	addSubComments($_POST["parent_id"],$_POST["commentContent"]);

}

 function addSubComments($id,$content){
	MySQLrequests::addSubComments($_SESSION["user_id"],$_SESSION["post_id"],$id,$content);
}
 function addComment($content){
	MySQLrequests::addComment($_SESSION["user_id"],$_SESSION["post_id"],$content);
}
header("location:viewPost.php");	