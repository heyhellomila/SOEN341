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

					<form class="form-horizontal" method="POST">
						<label for="User_name">Username</label>
						<input type="text" class="form-control" id="User_name" name="username" placeholder="<?=$action->userInfo["user_name"]?>">
						<br>
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Write your old password here">
						<input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Write your new password here">
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
									<input class="form-control" placeholder="<?=$action->userInfo["user_bio"]?>" value="<?=$action->userInfo["user_bio"]?>" rows="3" name="userbio"></input>
									<br><br>
									<div class="panel panel-default mb-2">
										<div class="panel-body">
											<button class="btn btn-default btn-sm"><i class="fa fa-fw fa-times" aria-hidden="true"></i> Cancel</button>
											<button type="submit" name="submit" id="update" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-check" aria-hidden="true"></i> Update Profile</button>
											<?php if(isset($_POST['submit'])) {
											$user_id = $action->userInfo["user_id"];
											$bio = $_POST['userbio'];
											$action->updateBio($user_id, $bio); 
											}
											//MySQLrequests::updateProfile($_POST['username'],$_POST['userbio'],$_POST['password'],$_POST['newpassword'],$_SESSION['user_id']); ?>

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
	<script>
		$(function() {
			$('#Profile-image1').on('click',function() {
				$('#profile-image-upload').click();
			});
		});
	</script>
	<?php
	require_once("partial/footer.php");
	?>
