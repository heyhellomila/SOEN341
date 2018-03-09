<?php
namespace Notification\Comment;
?>
<!doctype html>
<html>

<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<link rel="stylesheet" type="text/css" href="css/viewPost.css">
	<link rel="stylesheet" type="text/css" href="css/reg.css">
	<link rel="stylesheet" type="text/css" href="css/SignIn.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/gen_validatorv4.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript">
$(function() 
{
$(".view_comments").click(function() 
{

var ID = $(this).attr("id");

$.ajax({
type: "POST",
url: "viewajax.php",
data: "msg_id="+ ID, 
cache: false,
success: function(html){
$("#view_comments"+ID).prepend(html);
$("#view"+ID).remove();
$("#two_comments"+ID).remove();
}
});

return false;
});
});
</script>

<style type="text/css">
* {
	margin: 0;
	padding: 0;
}

body {
	font-family: "Trebuchet MS", Helvetica, Sans-Serif;
	font-size: 14px;
}

a {
	text-decoration: none;
	color: #838383;
}

a:hover {
	color: black;
}

#menu {
	position: relative;
	margin-left: 30px;
}

#menu a {
	display: block;
	width: 140px;
}

#menu ul {
	list-style-type: none;
}

#menu li {
	float: left;
	position: relative;
	text-align: center;
}

#menu ul.sub-menu {
	position: absolute;
	left: -10px;
	z-index: 90;
	display:none;
}

#menu ul.sub-menu li {
	text-align: left;
}

#menu li:hover ul.sub-menu {
	display: block;
}
a
{	text-decoration:none; }
	

.egg{
position:relative;
box-shadow: 0 3px 8px rgba(0, 0, 0, 0.25);
background-color:#fff;
border-radius: 3px 3px 3px 3px;
border: 1px solid rgba(100, 100, 100, 0.4);
}
.egg_Body{border-top:1px solid #D1D8E7;color:#808080;}
.egg_Message{font-size:13px !important;font-weight:normal;overflow:hidden}

h3{font-size:13px;color:#333;margin:0;padding:0}
.comment_ui
{
border-bottom:1px solid #e5eaf1;clear:left;float:none;overflow:hidden;padding:6px 4px 3px 6px;width:431px; cursor:pointer;
}
.comment_ui:hover{
background-color: #F7F7F7;
}
.dddd
{
background-color:#f2f2f2;border-bottom:1px solid #e5eaf1;clear:left;float:none;overflow:hidden;margin-bottom:2px;padding:6px 4px 3px 6px;width:431px; 
}
.comment_text{padding:2px 0 4px; color:#333333}
.comment_actual_text{display:inline;padding-left:.4em}

ol { 
	list-style:none;
	margin:0 auto;
	width:500px;
	margin-top: 20px;
}
#mes{
	padding: 0px 3px;
	border-radius: 2px 2px 2px 2px;
	background-color: rgb(240, 61, 37);
	font-size: 9px;
	font-weight: bold;
	color: #fff;
	position: absolute;
	top: 5px;
	left: 73px;
}
.toppointer{
background-image:url(top.png);
    background-position: -82px 0;
    background-repeat: no-repeat;
    height: 11px;
    position: absolute;
    top: -11px;
    width: 20px;
	right: 354px;
}
.clean { display:none}

</style>

</head>

<body>
	<nav class="navbar sticky-top navbar-dark bg-dark justify-content-between">
		<a class="navbar-brand col pt-0" href="index.php">
			<img class="navbar-brand " src="images/site_logo.png" height="60">
		</a>

		<form class="form-inline col-8" method="post">
			<input class="form-control mr-sm-3 col" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-success" type="submit">Search</button>
			
		</form>

		<?php
			if ($action->isLoggedIn())
			{
				if(false)
				{
		?>
			<div class="dropdown">
				<button class = "btn btn-dark" type ="button" id ="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img alt="32x32" class="mr-2 rounded" style="width: 30px; height: 30px;" src="images/notificationbell2.png">
				</button>
			</div>
			
			<div class="dropdown">
				<button class = "btn btn-dark dropdown-toggle" type ="button" id ="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img alt="32x32" class="mr-2 rounded" style="width: 48px; height: 48px;" src="images/captain.png">
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="#">Profile</a>
					<a class="dropdown-item" href="./?logout=true">Sign Out</a>
				</div>
			</div>
			<!--	<div id="menu">
	<ul>
		<li>
			<a href="#" style="padding:10px 0;">
			<img src="images.png" style="width: 21px;" />
			<?php
			/*include("headertest.php");
				$sql=mysql_query("select * from comments");
				$comment_count=mysql_num_rows($sql);
				if($comment_count!=0)
				{
				echo '<span id="mes">'.$comment_count.'</span>';
				}*/
			?>
			</a>
		<ul class="sub-menu">
		
			<?php
			
			/*$msql=mysql_query("select * from messages order by msg_id desc");
			while($messagecount=mysql_fetch_array($msql))
			$id=$messagecount['msg_id'];
			$msgcontent=$messagecount['message'];*/
			?>
			<li class="egg">
			<div class="toppointer"><img src="top.png" /></div>
				<?php 

				/*$sql=mysql_query("select * from comments where msg_id_fk='$id' order by com_id");
				$comment_count=mysql_num_rows($sql);

				if($comment_count>2)
				{
				$second_count=$comment_count-2;
				} 
				else 
				{
				$second_count=0;
				}*/
				?>

				<div id="view_comments<?php echo $id; ?>"></div>

				<div id="two_comments<?php echo $id; ?>">
				<?php
				/*$listsql=mysql_query("select * from comments where msg_id_fk='$id' order by com_id limit $second_count,2 ");
				while($rowsmall=mysql_fetch_array($listsql))
				{ 
				$c_id=$rowsmall['com_id'];
				$comment=$rowsmall['comments'];*/
				?>

				<div class="comment_ui">

				<div class="comment_text">
				<div  class="comment_actual_text"><?php echo $comment; ?></div>
				</div>

				</div>
				
				<div class="bbbbbbb" id="view<?php echo $id; ?>">
					<div style="background-color: #F7F7F7; border-bottom-left-radius: 3px; border-bottom-right-radius: 3px; position: relative; z-index: 100; padding:8px; cursor:pointer;">
					<a href="#" class="view_comments" id="<?php echo $id; ?>">View all <?php echo $comment_count; ?> comments</a>
					</div>
				</div>
			</li>
		</ul>
		</li>
	</ul>
</div> -->
		<?php
				}
				else
				{
		?>		
				
			<div class="dropdown">
				<button class = "btn btn-dark" type ="button" id ="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img alt="32x32" class="mr-2 rounded" style="width: 30px; height: 30px;" src="images/notificationbell.png">
				</button>
			</div>
			
			<div class="dropdown">
				<button class = "btn btn-dark dropdown-toggle" type ="button" id ="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img alt="32x32" class="mr-2 rounded" style="width: 48px; height: 48px;" src="images/captain.png">
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="#">Profile</a>
					<a class="dropdown-item" href="./?logout=true">Sign Out</a>
				</div>
			</div>
		
		<?php
				}
			}
			else
			{		
		?>		
			<div class="col">
				<form class="form-inline row" method="post">
					<a class="mr-2" href="SignIn.php"><button class="btn btn-secondary " type="button">Sign In</button></a>
					<a class="mr-2" href="registrationpage.php"><button class="btn btn-primary" type="button">Sign Up</button></a>
				</form>
			</div>
		<?php
			}
		?>
	</nav>
	<div class="contentWrap">
		
	<?php 
	require_once("tabmenu.php");
	?>
