<?php 

require_once("action/ProfilePageAction.php");
$action = new ProfilePageAction();
$action->execute();
require_once("partial/Header.php")

?>
<div class="mainbody container">
	<div class="row">
		<div style="padding-top:50px;"></div>

		<div class="card col-lg-9 col-md-9 col-sm-12 col-xs-12 mt-2 justified">
			<div class="panel panel-default">
				<div class="panel-body">
					<h1 class="panel-title justified" style="font-size:30px;"><i class="fa fa-cogs" aria-hidden="true"></i>User Profile</h1>
				</div>
			</div>
			<div class="panel panel-default ml-2">

				<div class="row"><strong>Username: </strong>
					<?=$_SESSION["userInfo"]["user_name"]?>
				</div>
				<div class="row">
					<strong>Member Since: </strong>
					<?=$_SESSION["userInfo"]["user_creation_time"]?>
				</div>
				<div class="row"><strong>Number of Posts: </strong>
					<?=$action->getNumberPosts($_SESSION["user_id"])?>
				</div>


			</div>

			<div class="panel panel-default">
				<div class="panel-body">
					<div align="center">
						<div class="col-lg-12 col-md-12">
							<img class="img img-responsive" src="images/icons/<?=$_SESSION["userInfo"]["user_img"]?>" >
						</div>
					</div>
				</div>
			</div>
			<?php
		if ($action->isLoggedIn())
		?>
			<div class="panel panel-default mb-2">
				<div class="panel-body">
<br>
					<a href="editProfilePage.php"><button class="btn btn-primary btn-sm"> Edit Profile</button></a>
				</div>
			</div>
		</div>
		<hr>



	</div>
</div>
</div>

<?php
require_once("partial/Footer.php");
?>
