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

		<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 justified">
			<div class="panel panel-default">
				<div class="panel-body">
					<h1 class="panel-title justified" style="font-size:30px;"><i class="fa fa-cogs" aria-hidden="true"></i> Edit Profile</h1>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">

					<form class="form-horizontal">
						<label for="User_name">Username</label>
						<input type="text" class="form-control" id="User_name" placeholder="John" value="John" >
					</form>
				</div>
			</div>
			<br>
			<div class="panel panel-default">
				<div class="panel-body">
					<div align="center">
						<div class="col-lg-12 col-md-12">
							<img class="img-thumbnail img-responsive" id="profile-image1" src="images/captain.png" style="width: 120px; height: 120px;">
						</div>
						<div class="col-lg-12 col-md-12">
							<input id="profile-image-upload" type="file" class="btn btn-primary btn-sm"><i class="fa fa-upload" aria-hidden="true"></i> Upload a new profile picture 
						</div>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-body">
					<button class="btn btn-default btn-sm"><i class="fa fa-fw fa-times" aria-hidden="true"></i> Cancel</button>
					<button class="btn btn-primary btn-sm"><i class="fa fa-fw fa-check" aria-hidden="true"></i> Update Profile</button>
				</div>
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
