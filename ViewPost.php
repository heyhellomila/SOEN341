<?php

require_once("action/ViewPostAction.php");

$action = new ViewPostAction();
$action->execute();

require_once("partial/Header.php");
?>
<div class="background container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<h2 style="margin-top: 25px;"><?=$action->post["post_title"]?></h2>
			<div class="row mainPost">
				<div class="media ">
					<img class=" mr-3 user-icon" src="images/icons/<?=$action->post_creator["user_img"]?>" alt="Generic placeholder image" style"height:64px;width:64px";>
					<div class="panel panel-default">
						<div class="panel-heading">
							<strong><?=$action->post_creator["user_name"]?></strong> <span class="text-muted">created on <?=$action->post["post_creation_time"]?></span>

						</div>
						<div class="media-body">

							<?=$action->post["post_content"]?>
							<div class="interrupt_line"> </div>

							<div class="row">
								<div class="col">
									<div class="row">
										<strong id="likes" class="d-block" style="margin-left: 30px; padding: 10px;"><span class="post_likes_count">Likes: <?=$action->post["post_nb_likes"]?></span></strong>
										<span class="post_like fa fa-thumbs-up" data-id="<?=$action->post["post_id"]?>"></span>
										<span class="post_dislike fa fa-thumbs-down" data-id="<?=$action->post["post_id"]?>"></span>
									</div>
								</div>							
							</div>
							<div class="interrupt_line"> </div>
							<div class="row">
								
								<form class="form col" action="CommentDBA.php" method="post">
									<input type="hidden" name="parent_id" value="post"></input>
									<div class="form-group ">
										<label for="comment_content"></label>
										<textarea class="form-control" name="comment_content"  rows="3" placeholder="Write comments..."></textarea>
									</div> 
									<button type="submit" class="btn btn-primary">Comment</button>

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
				$sub_comments=$action->getSubComments($comment["comment_id"]);
				$comment_creator=$action->getUserByID($comment["comment_creator"]);
				?>
				<div class="row ">
					<div class="media "><div class="col">
						<img class="d-flex mr-3 user-icon" src="images/icons/<?=$comment_creator["user_img"]?>" alt="Generic placeholder image">

						<?php
						if ($answers == 1) {?>
						<img class="d-flex mr-3 no1-icon" src="images/no1.png" alt="Generic placeholder image">
						<?php  
					}
					if ($action->isViewerCreator()) {
						if ($action->isFavorite($comment["comment_id"])) {
							?>

							<form action="ViewPost.php" method="post">
								<input type="hidden" name="comment_id" value="<?=$comment["comment_id"]?>"></input>
								<img onclick="$(this).parent('form').submit();" class="favorite d-flex mr-3 no1-icon" data-id="<?=$comment["comment_id"]?>" src="images/favorite.png" alt="Generic placeholder image">
							</form>

							<?php
						}
						else{
							?>
							<form action="ViewPost.php" method="post">
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
						<strong><?=$comment_creator["user_name"]?></strong> <span class="text-muted">commented on <?=$comment["comment_creation_time"]?></span>

					</div>
					<div class="media-body">
						<?=$comment["comment_content"]?>
						<div class="col secondaryLikes">
							<span class="comment_likes_count" style="margin-right: 20px;">Likes: <?=$comment["comment_nb_likes"]?></span>
							<span class="comment_like fa fa-thumbs-up" data-id="<?=$comment["comment_id"]?>"></span>
							<span class="comment_dislike fa fa-thumbs-down" data-id="<?=$comment["comment_id"]?>"></span>
						</div>	
						<?php 
						foreach ($sub_comments as $sub_comments) {
							$sub_comment_creator = $action->getUserByID($sub_comments["comment_creator"]);
							?>
							<div class="row">
								<div class="media no-border">
									<img class="d-flex mr-3" src="images/icons/<?=$sub_comment_creator["user_img"]?>" alt="Generic placeholder image">
									<div class="panel panel-default">
										<div class="panel-heading">
											<strong><?=$sub_comment_creator["user_name"]?></strong> <span class="text-muted">commented on <?=$sub_comments["comment_creation_time"]?></span>
										</div>
										<div class="media-body">
											<?=$sub_comments["comment_content"]?>
											<div class="col secondaryLikes">					
												<span class="comment_likes_count" style="margin-right: 20px;">Likes: <?=$sub_comments["comment_nb_likes"]?></span>
												<span class="comment_like fa fa-thumbs-up" data-id="<?=$sub_comments["comment_id"]?>"></span>
												<span class="comment_dislike fa fa-thumbs-down" data-id="<?=$sub_comments["comment_id"]?>"></span>
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
							<div class="interrupt_line"> </div>
							<div class="row">
								
								<form class="form col" action="CommentDBA.php" method="post">
									<input type="hidden" name="parent_id" value="<?=$comment["comment_id"]?>"></input>
    								<div class="form-group ">
										<label for="comment_content"></label>
										<textarea class="form-control" name="comment_content" rows="3" placeholder="Write comments..."></textarea>
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
			var post_id = $(this).data('id');
			$post = $(this);

			$.ajax({
				url: 'ViewPost.php',
				type: 'post',
				data: {
					'post_liked': 1,
					'post_id': post_id
				},
				success: function(response){
					$post.parent().find('span.post_likes_count').text("Likes: " + response);
				}
			});
			location.reload();
		});


		$('.post_dislike').on('click', function(){
			var post_id = $(this).data('id');
			$post = $(this);

			$.ajax({
				url: 'ViewPost.php',
				type: 'post',
				data: {
					'post_disliked': 1,
					'post_id': post_id
				},
				success: function(response){
					$post.parent().find('span.post_likes_count').text("Likes: " + response);
				}
			});
			location.reload();
		}); 

		$('.comment_like').on('click', function(){
			var comment_id = $(this).data('id');
			$comment = $(this);

			$.ajax({
				url: 'ViewPost.php',
				type: 'post',
				data: {
					'comment_liked': 1,
					'comment_id': comment_id
				},
				success: function(response){
					$comment.parent().find('span.comment_likes_count').text("Likes: " + response);
				}
			});
			location.reload();
		});

		$('.comment_dislike').on('click', function(){
			var comment_id = $(this).data('id');
			$comment = $(this);

			$.ajax({
				url: 'ViewPost.php',
				type: 'post',
				data: {
					'comment_disliked': 1,
					'comment_id': comment_id
				},
				success: function(response){
					$comment.parent().find('span.comment_likes_count').text("Likes: " + response);
				}
			});
			location.reload();
		});
	});
</script>

<?php
require_once("partial/Footer.php");
?>
