<?php

require_once("action/viewPostAction.php");

$action = new viewPostAction();
$action->execute();

require_once("partial/header.php");


?>

<div class="background container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<h2 style="margin-top: 25px;"><?=$action->post["post_title"]?></h2>
			<div class="row mainPost">
				<div class="media ">
					<img class="d-flex mr-3 col user-icon" src="images/captain.png" alt="Generic placeholder image">
					<div class="panel panel-default">
						<div class="panel-heading">
							<strong><?=$action->postCreator["user_name"]?></strong> <span class="text-muted">created on <?=$action->post["post_creation_time"]?></span>

						</div>
						<div class="media-body">

							<?=$action->post["post_content"]?>
							<div class="interuptLine"> </div>

							<div class="row">
								<div class="col">
									<div class="row">
										<strong id="likes" class="d-block" style="margin-left: 30px; padding: 10px;"><span class="post_likes_count">Likes: <?=$action->post["post_nb_likes"]?></span></strong>
										<span class="post_like fa fa-thumbs-up" data-id="<?=$action->post["post_id"]?>"></span>
										<span class="post_dislike fa fa-thumbs-down" data-id="<?=$action->post["post_id"]?>"></span>
									</div>
								</div>							

							</div>
							<div class="interuptLine"> </div>
							<div class="row">
								<div class="col-2">
									<img class="align-self-center mr-3 user-icon" src="images/captain.png" alt="Generic placeholder image">
								</div>
								<form class="form col" action="commentDBA.php" method="post">
									<input type="hidden" name="parent_id" value="post"></input>
									<div class="form-group ">
										<label for="commentContent"></label>
										<textarea class="form-control" name="commentContent"  rows="3" placeholder="Write comments..."></textarea>
									</div> 
									<button type="submit" class="btn btn-primary">Comment</button>
									`

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php


			
			$answers = 0;
			foreach ($action->comments as $comment) {
				$answers++;
				$subcomments=$action->getSubComments($comment["comment_id"]);
				$commentCreator=$action->getUserByID($comment["comment_creator"]);
				?>
				<div class="row ">
					<div class="media "><div class="col">
						<img class="d-flex mr-3 user-icon" src="images/captain.png" alt="Generic placeholder image">
						<?php
						if ($answers == 1) {?>
						<img class="d-flex mr-3 no1-icon" src="images/no1.png" alt="Generic placeholder image">
						<?php  
					}
					if ($action->isViewerCreator()) {
						if ($action->isFavorite($comment["comment_id"])) {
							?>

							<form action="viewPost.php" method="post">
								<input type="hidden" name="comment_id" value="<?=$comment["comment_id"]?>"></input>
								<img onclick="$(this).parent('form').submit();" class="favorite d-flex mr-3 no1-icon" data-id="<?=$comment["comment_id"]?>" src="images/favorite.png" alt="Generic placeholder image">
							</form>

							<?php
						}
						else{
							?>
							<form action="viewPost.php" method="post">
								<input type="hidden" name="comment_id" value="<?=$comment["comment_id"]?>"></input>
								<img onclick="$(this).parent('form').submit();" class="unfavorite d-flex mr-3 no1-icon" data-id="<?=$comment["comment_id"]?>" src="images/unfavorite.png" alt="Generic placeholder image">
							</form>
							<?php
						}
					}
					else{
						if ($action->isFavorite($comment["comment_id"])) {
							?>
							<img class="d-flex mr-3 no1-icon" src="images/favorite.png" alt="Generic placeholder image">
							<?php
						}
						else{
							?>
							<img class="d-flex mr-3 no1-icon" src="images/unfavorite.png" alt="Generic placeholder image">
							<?php
						}
					}
					?>

				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong><?=$commentCreator["user_name"]?></strong> <span class="text-muted">commented on <?=$comment["comment_creation_time"]?></span>

					</div>
					<div class="media-body">
						<?=$comment["comment_content"]?>
						<div class="col secondaryLikes">
							<span class="comment_likes_count" style="margin-right: 20px;">Likes: <?=$comment["comment_nb_likes"]?></span>
							<span class="comment_like fa fa-thumbs-up" data-id="<?=$comment["comment_id"]?>"></span>
							<span class="comment_dislike fa fa-thumbs-down" data-id="<?=$comment["comment_id"]?>"></span>
						</div>	
						<?php 
						foreach ($subcomments as $subC) {
							$subCommentCreator = $action->getUserByID($subC["comment_creator"]);
							?>

							<div class="row">
								<div class="media no-border">
									<img class="d-flex mr-3" src="images/captain.png" alt="Generic placeholder image">
									<div class="panel panel-default">
										<div class="panel-heading">
											<strong><?=$subCommentCreator["user_name"]?></strong> <span class="text-muted">commented on <?=$subC["comment_creation_time"]?></span>
										</div>
										<div class="media-body">
											<?=$subC["comment_content"]?>

											<div class="col secondaryLikes">					
												<span class="comment_likes_count" style="margin-right: 20px;">Likes: <?=$subC["comment_nb_likes"]?></span>
												<span class="comment_like fa fa-thumbs-up" data-id="<?=$subC["comment_id"]?>"></span>
												<span class="comment_dislike fa fa-thumbs-down" data-id="<?=$subC["comment_id"]?>"></span>
											</div>	
										</div>
									</div>
								</div>
							</div>
							<?php
						}

						$post_id = $action->post["post_id"];
						$action->getAnswers($post_id, $answers);

						?>
						<div class="interuptLine"> </div>
						<div class="row">
							<div class="col-2">
								<img class="align-self-center mr-3 user-icon" src="images/captain.png" alt="Generic placeholder image">
							</div>
							<form class="form col" action="commentDBA.php" method="post">
								<input type="hidden" name="parent_id" value="<?=$comment["comment_id"]?>"></input>
								<div class="form-group ">
									<label for="commentContent"></label>
									<textarea class="form-control" name="commentContent" rows="3" placeholder="Write comments..."></textarea>
								</div> 
								<button type="submit" class="btn btn-primary">Comment</button>
							</form>
						</div>
					</div>



				</div>
			</div>
		</div>
		<?php 
	}
	?>

</div>
</div>
</div>
<div class="col-md-2"></div>

<script src="js/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		$('.post_like').on('click', function(){
			var postid = $(this).data('id');
			$post = $(this);

			$.ajax({
				url: 'viewPost.php',
				type: 'post',
				data: {
					'post_liked': 1,
					'postid': postid
				},
				success: function(response){
					$post.parent().find('span.post_likes_count').text("Likes: " + response);
				}
			});
			//location.reload();
		});


		$('.post_dislike').on('click', function(){
			var postid = $(this).data('id');
			$post = $(this);

			$.ajax({
				url: 'viewPost.php',
				type: 'post',
				data: {
					'post_disliked': 1,
					'postid': postid
				},
				success: function(response){
					$post.parent().find('span.post_likes_count').text("Likes: " + response);
				}
			});
			//location.reload();
		}); 

		$('.comment_like').on('click', function(){
			var commentid = $(this).data('id');
			$comment = $(this);

			$.ajax({
				url: 'viewPost.php',
				type: 'post',
				data: {
					'comment_liked': 1,
					'commentid': commentid
				},
				success: function(response){
					$comment.parent().find('span.comment_likes_count').text("Likes: " + response);
				}
			});
			//location.reload();
		});

		$('.comment_dislike').on('click', function(){
			var commentid = $(this).data('id');
			$comment = $(this);

			$.ajax({
				url: 'viewPost.php',
				type: 'post',
				data: {
					'comment_disliked': 1,
					'commentid': commentid
				},
				success: function(response){
					$comment.parent().find('span.comment_likes_count').text("Likes: " + response);
				}
			});
			//location.reload();
		});
	});
</script>

<?php
require_once("partial/footer.php");
?>
