<?php

//make connection
$conn=mysqli_connect('localhost','root','');
//select db
mysqli_select_db($conn,'341');
$sql="SELECT * FROM post ORDER BY post_nb_likes DESC LIMIT 3";
$sql2="SELECT * FROM post ORDER BY post_id DESC LIMIT 3";
$sql3="SELECT * FROM post ORDER BY post_id ASC LIMIT 3";

$liked=$conn->query($sql);
$newest=$conn->query($sql2);
$unpopular=$conn->query($sql3);
//call fetch_assoc() method of result object
//fetch_assoc() will automatically keep fetching next row when called again


?>
<div id="accordion">
<div class="container bg-white px-0" style="line-height: 0.5 !important;" `>
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li class="nav-item bg-light">
			<a class="nav-link active font-weight-bold text-info" data-toggle="collapse" href="#activetab">Active</a>
		</li>
		<li class="nav-item bg-light">
			<a class="nav-link font-weight-bold text-info" data-toggle="collapse" href="#newtab">New</a>
		</li>
		<li class="nav-item bg-light">
			<a class="nav-link font-weight-bold text-success" data-toggle="collapse" href="#unansweredtab">Unanswered</a>
		</li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div id="activetab" class="container collapse" data-parent="#accordion"><br>
			<div class="container">
				<!-- Table of posts -->
				<div >
					<!-- Single post that is added to the homepage starts here -->
					<?php while ($post = $liked->fetch_assoc()): ?>
					<div class="row border-bottom border-gray">    
						<div class="col">
							<h5 class="row my-1"><?=$post["post_title"]?></h5>
							<div class="my-1 text-muted small row">
								<p class="m-0">
									<strong class="text-gray-dark">From: <?=$post["post_creator"]?><span style="color: green;">&emsp;Answers: 70&emsp;</span><span style="color: blue;">Likes: <?=$post["post_nb_likes"]?></span>&emsp;Posted: <?=$post["post_creation_time"]?></strong>
								</p>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
					<!-- End of single post -->
					
					</div>
				</div>
			</div>
			<div id="newtab" class="container collapse" data-parent="#accordion"><br>
				<div class="container">
					<!-- Table of posts -->
					<div>
						<!-- Single post that is added to the homepage starts here -->
						<?php while ($post = $newest->fetch_assoc()): ?>
						<div class="row border-bottom border-gray">
							<div class="col">
								<h5 class="row"><?=$post["post_title"]?></h5>
								<div class="my-1 text-muted row">
									<p class="small m-0">
										<strong class="d-block text-gray-dark">From: <?=$post["post_creator"]?><span style="color: green;">&emsp;Answers: 2&emsp;</span><span style="color: blue;">Likes: <?=$post["post_nb_likes"]?></span>&emsp;Posted:<?=$post["post_creation_time"]?></strong>
									</p>
								</div></div>
							</div>
							<?php endwhile; ?>
							<!-- End of single post -->
						</div>
					</div>
				</div>
				<div id="unansweredtab" class="container collapse" data-parent="#accordion"><br>
					<div class="container">
						<!-- Table of posts -->
						<div>
							<!-- Single post that is added to the homepage starts here -->
							<?php while ($post = $unpopular->fetch_assoc()): ?>
							<div class="row border-bottom border-gray"><div class="col">
								<h5 class="row"><?=$post["post_title"]?></h5>
								<div class="my-1 text-muted row">
									<p class="small m-0">
										<strong class="d-block text-gray-dark">From: <?=$post["post_creator"]?><span style="color: green;">&emsp;Answers: 0&emsp;</span><span style="color: blue;">Likes: <?=$post["post_nb_likes"]?></span>&emsp;Posted: <?=$post["post_creation_time"]?></strong>
									</p>
								</div></div>
							</div>
							<?php endwhile; ?>

							<!-- End of single post -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>