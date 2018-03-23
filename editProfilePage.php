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
						<?=$_SESSION["userInfo"]["user_name"]?>
						<br>	<br>
						<h3><label for="password">Password</label></h3>
						<input type="password" class="form-control" id="password" name="password" placeholder="Write your old password here">
						<input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Write your new password here">
						<input type="password" class="form-control" id="newpasswordConfirm" name="newpasswordConfirm" placeholder="Confirm your new password here">
						<div class="panel panel-default">
							<div class="panel-body">
								<div align="center">
									
									<div class="cc-selector">
											<input <?php if($_SESSION["userInfo"]["user_img"] == "captain.png") echo "checked"; ?> id="captain" type="radio" name="profilePicture" value="captain.png" />
											<label class="profileimage-cc img_captain" for="captain"></label>
											<input <?php if($_SESSION["userInfo"]["user_img"] == "astronaut.png") echo "checked"; ?> id="astronaut" type="radio" name="profilePicture" value="astronaut.png" />
											<label class="profileimage-cc img_astronaut" for="astronaut"></label>
											<input <?php if($_SESSION["userInfo"]["user_img"] == "concierge.png") echo "checked"; ?> id="concierge" type="radio" name="profilePicture" value="concierge.png" />
											<label class="profileimage-cc img_concierge" for="concierge"></label>
											<input <?php if($_SESSION["userInfo"]["user_img"] == "cooker.png") echo "checked"; ?> id="cooker" type="radio" name="profilePicture" value="cooker.png" />
											<label class="profileimage-cc img_cooker" for="cooker"></label>
											<input <?php if($_SESSION["userInfo"]["user_img"] == "firefighter.png") echo "checked"; ?> id="firefighter" type="radio" name="profilePicture" value="firefighter.png" />
											<label class="profileimage-cc img_firefighter" for="firefighter"></label>
											<input <?php if($_SESSION["userInfo"]["user_img"] == "judge.png") echo "checked"; ?> id="judge" type="radio" name="profilePicture" value="judge.png" />
											<label class="profileimage-cc img_judge" for="judge"></label>
											<input <?php if($_SESSION["userInfo"]["user_img"] == "maid.png") echo "checked"; ?> id="maid" type="radio" name="profilePicture" value="maid.png" />
											<label class="profileimage-cc img_maid" for="maid"></label>
											<input <?php if($_SESSION["userInfo"]["user_img"] == "writer.png") echo "checked"; ?> id="writer" type="radio" name="profilePicture" value="writer.png" />
											<label class="profileimage-cc img_writer" for="writer"></label>
										</div>


								
								</div>
							</div>
						</div>

						<div class="panel panel-default mb-2">
							<div class="panel-body">
								<button class="btn btn-default btn-sm"><i class="fa fa-fw fa-times" aria-hidden="true"></i> Cancel</button>
								<button type="submit" name="submit" id="update" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-check" aria-hidden="true"></i> Update Profile</button>


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
