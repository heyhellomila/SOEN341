<?php 
require_once("action/ProfilePageAction.php");

$action = new ProfilePageAction();
$action->execute();

require_once("partial/Header.php")
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
					if ($action->wrong_old_pass) 
						echo '<div class="alert alert-danger"><strong>Error: Wrong password entered!</strong></div>';
					if ($action->password_not_matching) 
						echo '<div class="alert alert-danger"><strong>Error: New password does not match.</strong></div>';
					if ($action->password_updated) 
						echo '<div class="alert alert-success"><strong>Success: New password updated.</strong></div>';
					?>
					<form action="EditProfilePage.php" class="form-horizontal" method="POST">
						<h3><label for="user_name">Username</label></h3>
						<?=$_SESSION["user_info"]["user_name"]?>
						<br>	<br>
						<h3><label for="password">Password</label></h3>
						<input type="password" class="form-control" id="password" name="password" placeholder="Write your old password here">
						<input type="password" class="form-control" id="new_password" name="new_password" placeholder="Write your new password here">
						<input type="password" class="form-control" id="new_password_confirm" name="new_password_confirm" placeholder="Confirm your new password here">
						<div class="panel panel-default">
							<div class="panel-body">
								<div align="center">
									
									<div class="cc-selector">
											<input <?php if($_SESSION["user_info"]["user_img"] == "captain.png") echo "checked"; ?> id="captain" type="radio" name="profile_picture" value="captain.png" />
											<label class="profileimage-cc img_captain" for="captain"></label>
											<input <?php if($_SESSION["user_info"]["user_img"] == "astronaut.png") echo "checked"; ?> id="astronaut" type="radio" name="profile_picture" value="astronaut.png" />
											<label class="profileimage-cc img_astronaut" for="astronaut"></label>
											<input <?php if($_SESSION["user_info"]["user_img"] == "concierge.png") echo "checked"; ?> id="concierge" type="radio" name="profile_picture" value="concierge.png" />
											<label class="profileimage-cc img_concierge" for="concierge"></label>
											<input <?php if($_SESSION["user_info"]["user_img"] == "cooker.png") echo "checked"; ?> id="cooker" type="radio" name="profile_picture" value="cooker.png" />
											<label class="profileimage-cc img_cooker" for="cooker"></label>
											<input <?php if($_SESSION["user_info"]["user_img"] == "firefighter.png") echo "checked"; ?> id="firefighter" type="radio" name="profile_picture" value="firefighter.png" />
											<label class="profileimage-cc img_firefighter" for="firefighter"></label>
											<input <?php if($_SESSION["user_info"]["user_img"] == "judge.png") echo "checked"; ?> id="judge" type="radio" name="profile_picture" value="judge.png" />
											<label class="profileimage-cc img_judge" for="judge"></label>
											<input <?php if($_SESSION["user_info"]["user_img"] == "maid.png") echo "checked"; ?> id="maid" type="radio" name="profile_picture" value="maid.png" />
											<label class="profileimage-cc img_maid" for="maid"></label>
											<input <?php if($_SESSION["user_info"]["user_img"] == "writer.png") echo "checked"; ?> id="writer" type="radio" name="profile_picture" value="writer.png" />
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
require_once("partial/Footer.php");
?>
