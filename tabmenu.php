<?php

require_once("action/dba/MySQLrequests.php");
//make connection
$connection=connection::getConnection();

$statement = $connection->prepare("SELECT * FROM post ORDER BY post_nb_likes DESC LIMIT 3");
$statement->setFetchMode(PDO::FETCH_ASSOC);
$statement->execute();
$info = $statement->fetchAll();
$liked=$info;
$statement = $connection->prepare("SELECT * FROM post ORDER BY post_id DESC LIMIT 3");
$statement->setFetchMode(PDO::FETCH_ASSOC);
$statement->execute();
$info = $statement->fetchAll();
$newest=$info;
$statement = $connection->prepare("SELECT * FROM post ORDER BY post_id ASC LIMIT 3");
$statement->setFetchMode(PDO::FETCH_ASSOC);
$statement->execute();
$info = $statement->fetchAll();
$unpopular=$info;
connection::closeConnection();



?>
<div id="accordion">
	<div class="container bg-white px-0" style="line-height: 0.5 !important;" `>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li class="nav-item bg-light">
				<a class="nav-link active font-weight-bold text-info" data-toggle="collapse" href="#activetab">Popular</a>
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
						<?php foreach ($liked as $post) {
							$postCreator=MySQLrequests::getPostCreatorByPostID($post["post_creator"]);
							?>
							<div class="row border-bottom border-gray">    
								<div class="col">
									<h5 class="row">
										<form name="title" action="index.php" method="post">
          								<input type="hidden" name="post_id" value="<?=$post["post_id"]?>"></input>           
          								<button type="submit" class="notButton"><?=$post["post_title"]?></button>
        								</form>
        							</h5>
									<div class="my-1 text-muted small row">
										<p class="m-0">
											<strong class="text-gray-dark">&emsp;From: <?=$postCreator["user_name"]?><span style="color: green;">&emsp;Answers: <?=$post["post_nb_answers"]?>&emsp;</span><span style="color: blue;">Likes: <?=$post["post_nb_likes"]?></span>&emsp;Posted: <?=$post["post_creation_time"]?></strong>
										</p>
									</div>
								</div>
							</div>
							<?php 	
						}  ?>
						<!-- End of single post -->

					</div>
				</div>
			</div>
			<div id="newtab" class="container collapse" data-parent="#accordion"><br>
				<div class="container">
					<!-- Table of posts -->
					<div>
						<!-- Single post that is added to the homepage starts here -->
						<?php foreach ($newest as $post) {
							$postCreator=MySQLrequests::getPostCreatorByPostID($post["post_creator"]);
							
							?>
								<div class="row border-bottom border-gray">
									<div class="col">
										<h5 class="row">
											<form name="title" action="index.php" method="post">
          									<input type="hidden" name="post_id" value="<?=$post["post_id"]?>"></input>           
          									<button type="submit" class="notButton"><?=$post["post_title"]?></button>
        									</form>
        								</h5>
										<div class="my-1 text-muted row">
											<p class="small m-0">
												<strong class="d-block text-gray-dark">&emsp;From: <?=$postCreator["user_name"]?><span style="color: green;">&emsp;Answers: <?=$post["post_nb_answers"]?>&emsp;</span><span style="color: blue;">Likes: <?=$post["post_nb_likes"]?></span>&emsp;Posted:<?=$post["post_creation_time"]?></strong>
											</p>
										</div></div>
									</div>
								<?php } ?>
								<!-- End of single post -->
							</div>
						</div>
					</div>
					<div id="unansweredtab" class="container collapse" data-parent="#accordion"><br>
						<div class="container">
							<!-- Table of posts -->
							<div>
								<!-- Single post that is added to the homepage starts here -->
								<?php foreach ($unpopular as $post) {
									$postCreator=MySQLrequests::getPostCreatorByPostID($post["post_creator"]);
							?>
									<div class="row border-bottom border-gray"><div class="col">
										<h5 class="row">
											<form name="title" action="index.php" method="post">
          									<input type="hidden" name="post_id" value="<?=$post["post_id"]?>"></input>           
          									<button type="submit" class="notButton"><?=$post["post_title"]?></button>
        									</form>
        								</h5>
										<div class="my-1 text-muted row">
											<p class="small m-0">
												<strong class="d-block text-gray-dark">&emsp;From: <?=$postCreator["user_name"]?><span style="color: green;">&emsp;Answers: <?=$post["post_nb_answers"]?>&emsp;</span><span style="color: blue;">Likes: <?=$post["post_nb_likes"]?></span>&emsp;Posted: <?=$post["post_creation_time"]?></strong>
											</p>
										</div></div>
									</div>
								<?php } ?>

								<!-- End of single post -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>