<?php 
require_once("action/profilePageAction.php");

$action = new profilePageAction();
$action->execute();
require_once("partial/header.php")

?>
<div class="mainbody container">
	<div class="row">
		<div style="padding-top:50px;"> 
		</div>

		<div class="card col-lg-9 col-md-9 col-sm-12 col-xs-12 mt-2 justified">
			<div class="panel panel-default">
				<div class="panel-body">
					<h1 class="panel-title justified" style="font-size:30px;"><i class="fa fa-cogs" aria-hidden="true"></i> Edit Profile</h1>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<?php
					if ($action->wrongOldPass) 
						echo '<div class="alert alert-danger"><strong>Error : Wrong password entered!</strong></div>';
					if ($action->passwordNotMatching) 
						echo '<div class="alert alert-danger"><strong>Error: New password dont match</strong></div>';
					if ($action->passwordUpdated) 
						echo '<div class="alert alert-success"><strong>Success: New password updated</strong></div>';
					?>
					<form action="editProfilePage.php" class="form-horizontal" method="POST">
						<h3><label for="User_name">Username</label></h3>
						<?=$action->userInfo["user_name"]?>
						<br>	<br>
						<h3><label for="password">Password</label></h3>
						<input type="password" class="form-control" id="password" name="password" placeholder="Write your old password here">
						<input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Write your new password here">
						<input type="password" class="form-control" id="newpasswordConfirm" name="newpasswordConfirm" placeholder="Confirm your new password here">
						<div class="panel panel-default">
							<div class="panel-body">
								<div align="center">
									<div class="col-lg-12 col-md-12">
										<img class="img-thumbnail img-responsive" id="profile-image1" src="images/captain.png" style="width: 120px; height: 120px;">
									</div>
									<div class="col-lg-12 col-md-12">
										<input classid="profile-image-upload" type="file">

										<i class="fa fa-upload" aria-hidden="true"></i> Change Profile Picture
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-body">
								<h5 class="panel-title pull-left">My User Bio</h5>
								<br><br>
								<input class="form-control" placeholder="<?=$action->userInfo["user_bio"]?>" value="<?=$action->userInfo["user_bio"]?>" rows="3" name="userbio">
								<br><br>
								<div class="panel panel-default mb-2">
									<div class="panel-body">
										<button class="btn btn-default btn-sm"><i class="fa fa-fw fa-times" aria-hidden="true"></i> Cancel</button>
										<button type="submit" name="submit" id="update" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-check" aria-hidden="true"></i> Update Profile</button>


									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<br><br>
			</div>

		</div>
	</div>
</div>
<?php
require_once("partial/footer.php");
?>
