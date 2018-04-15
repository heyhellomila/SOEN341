<div id="accordion">
	<div class="container bg-white px-0" style="line-height: 0.5 !important;" `>
		<ul class="nav nav-tabs" role="tablist">
			<li class="nav-item bg-light">
				<a class="nav-link active font-weight-bold text-info" data-toggle="collapse" href="#active_tab">Popular</a>
			</li>
			<li class="nav-item bg-light">
				<a class="nav-link font-weight-bold text-info" data-toggle="collapse" href="#new_tab">New</a>
			</li>
			<li class="nav-item bg-light">
				<a class="nav-link font-weight-bold text-success" data-toggle="collapse" href="#unanswered_tab">Unanswered</a>
			</li>
		</ul>
		<div class="tab-content">
			<div id="active_tab" class="container collapse" data-parent="#accordion"><br>
				<div class="container">
					<div >
						<?php $liked=MySQLrequests::getPopularPost();
						foreach ($liked as $post) {
							$post_creator=MySQLrequests::getPostCreatorByPostID($post["post_creator"]);
							?>
							<div class="row border-bottom border-gray">    
								<div class="col">
									<h5 class="row">
										<form name="title" action="index.php" method="post">
          								<input type="hidden" name="post_id" value="<?=$post["post_id"]?>">           
          								<button type="submit" class="notButton"><?=$post["post_title"]?></button>
        								</form>
        							</h5>
									<div class="my-1 text-muted small row">
										<p class="m-0">
											<strong class="text-gray-dark">&emsp;From: <?=$post_creator["user_name"]?><span style="color: green;">&emsp;Answers: <?=$post["post_nb_answers"]?>&emsp;</span><span style="color: blue;">Likes: <?=$post["post_nb_likes"]?></span>&emsp;Posted: <?=$post["post_creation_time"]?></strong>
										</p>
									</div>
								</div>
							</div>
							<?php 	
						}  ?>
					</div>
				</div>
			</div>
			<div id="new_tab" class="container collapse" data-parent="#accordion"><br>
				<div class="container">
					<div>
						<?php $newest=MySQLrequests::getNewestPost();
						foreach ($newest as $post) {
							$post_creator=MySQLrequests::getPostCreatorByPostID($post["post_creator"]);
							?>
								<div class="row border-bottom border-gray">
									<div class="col">
										<h5 class="row">
											<form name="title" action="index.php" method="post">
          									<input type="hidden" name="post_id" value="<?=$post["post_id"]?>">          
          									<button type="submit" class="notButton"><?=$post["post_title"]?></button>
        									</form>
        								</h5>
										<div class="my-1 text-muted row">
											<p class="small m-0">
												<strong class="d-block text-gray-dark">&emsp;From: <?=$post_creator["user_name"]?><span style="color: green;">&emsp;Answers: <?=$post["post_nb_answers"]?>&emsp;</span><span style="color: blue;">Likes: <?=$post["post_nb_likes"]?></span>&emsp;Posted:<?=$post["post_creation_time"]?></strong>
											</p>
										</div></div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div id="unanswered_tab" class="container collapse" data-parent="#accordion"><br>
						<div class="container">
							<div>
								<?php $unpopular=MySQLrequests::getUnpopularPost(); 
								foreach ($unpopular as $post) {
									$post_creator=MySQLrequests::getPostCreatorByPostID($post["post_creator"]);
							?>
									<div class="row border-bottom border-gray"><div class="col">
										<h5 class="row">
											<form name="title" action="index.php" method="post">
          									<input type="hidden" name="post_id" value="<?=$post["post_id"]?>">           
          									<button type="submit" class="notButton"><?=$post["post_title"]?></button>
        									</form>
        								</h5>
										<div class="my-1 text-muted row">
											<p class="small m-0">
												<strong class="d-block text-gray-dark">&emsp;From: <?=$post_creator["user_name"]?><span style="color: green;">&emsp;Answers: <?=$post["post_nb_answers"]?>&emsp;</span><span style="color: blue;">Likes: <?=$post["post_nb_likes"]?></span>&emsp;Posted: <?=$post["post_creation_time"]?></strong>
											</p>
										</div></div>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
