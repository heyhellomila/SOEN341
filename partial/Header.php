
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/Global.css">
<link rel="stylesheet" type="text/css" href="css/ViewPost.css">
<link rel="stylesheet" type="text/css" href="css/Reg.css">
<link rel="stylesheet" type="text/css" href="css/SignIn.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/global.css">


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/gen_validatorv4.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>

<nav class="navbar sticky-top navbar-dark bg-dark justify-content-between">
	<a class="navbar-brand col pt-0" href="index.php">
		<img class="navbar-brand " src="images/site_logo.png" height="60">
	</a>

	<form class="form-inline col-8" action="Search.php" method="POST">
		<input class="form-control mr-sm-3 col" type="text" placeholder="Search" aria-label="Search" name="query">
		<button class="btn btn-outline-success" type="submit" value="Search">Search</button>
	</form>
	<?php
	if ($action->isLoggedIn())
	{
		?>
		<div class="dropdown">
			<button class = " btn btn-dark" type ="button" id ="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				
				<?php
				if(!empty($action->notifications)) {
					?>
					<img alt="32x32" class="mr-2 rounded" style="width: 30px; height: 30px;" src="images/notificationbell2.png">
				</button>
				<div class="dropdown-menu dropdown-menu-right">
					<?php
					foreach ($action->notifications as $notif) {
						?>
						<form name="title" action="Index.php" method="post">
							<input type="hidden" name="post_id" value="<?= $notif["notification_post_id"]?>"></input>    
							<input type="hidden" name="remove_notif" value="<?= $notif["notification_id"]?>"></input>           
							<a class="dropdown-item" href="#"  onclick="$(this).closest('form').submit();"><?=$action->getName($notif["notification_notifier_id"])?> has commented on your stuff</a>
							
						</form>
						<?php
					}
					?>
				</div>
				<?php
			}
			else
			{
				?>
				<img alt="32x32" class="mr-2 rounded" style="width: 30px; height: 30px;" src="images/notificationbell.png">
			</button>
			<?php } ?>


		</div>

		<div class="dropdown mr-5">
			<button class = "btn btn-dark dropdown-toggle" type ="button" id ="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<img alt="32x32" class="rounded" style="width: 48px; height: 48px;" src="images/icons/<?=$_SESSION["user_info"]["user_img"]?>">
			</button>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
				<p class="text-center"><?=$_SESSION["userInfo"]["user_name"]?></p>
				<a href="EditProfilePage.php" class="dropdown-item btn btn-default btn-sm"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Modify Profile</a>
				<a href="ProfilePage.php" class="dropdown-item btn btn-default btn-sm"><i class="fa fa-unlock-alt" aria-hidden="true"></i> View Profile</a>
				
				<a href="./?logout=true" class="dropdown-item btn btn-default btn-sm"><i class="fa fa-power-off" aria-hidden="true" ></i> Sign Out</a>

			</div>
		</div>
		<?php
	} 
	else
	{		
		?>		
		<div class="col">
			<form class="form-inline row" method="post">
				<a class="mr-2" href="SignIn.php"><button class="btn btn-secondary " type="button">Sign In</button></a>
				<a class="mr-2" href="RegistrationPage.php"><button class="btn btn-primary" type="button">Sign Up</button></a>
			</form>
		</div>
		<?php
	}
	?>
</nav>

<?php 
require_once("TabMenu.php");
?>
