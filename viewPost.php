<?php

require_once("action/viewPostAction.php");

$action = new viewPostAction();
$action->execute();
require_once("partial/header.php");
if (isset($_POST['post_liked'])) {
	$postid = $_POST['postid'];
	$n = $action->getPostByID($postid);
	$action->updateLike($postid, $n["post_nb_likes"]);
	echo $n["post_nb_likes"]+1;
	exit(); 
}

if (isset($_POST['post_disliked'])) {
	$postid = $_POST['postid'];
	$n = $action->getPostByID($postid);
	$action->updateDislike($postid, $n["post_nb_likes"]);
	echo $n["post_nb_likes"]-1;
	exit(); 
}

if (isset($_POST['comment_liked'])) {
	$commentid = $_POST['commentid'];
	$n = $action->getCommentByID($commentid);
	$action->updateCommentLike($commentid, $n["comment_nb_likes"]);
	echo $n["comment_nb_likes"]+1;
	exit(); 
}

if (isset($_POST['comment_disliked'])) {
	$commentid = $_POST['commentid'];
	$n = $action->getCommentByID($commentid);
	$action->updateCommentDislike($commentid, $n["comment_nb_likes"]);
	echo $n["comment_nb_likes"]-1;
	exit(); 
}

if (isset($_POST['favorite'])) {
	$comment_id = $_POST['comment_id'];
	$action->favoriteComment($comment_id);
	exit(); 
}

if (isset($_POST['unfavorite'])) {
	$comment_id = $_POST['comment_id'];
	$action->unfavoriteComment($comment_id);
	exit(); 
}

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
					if ($action->isViewerCreator($commentCreator)) {
						if ($action->isFavorite($comment["comment_id"])) {
							?>
							<img class="favorite-comment d-flex mr-3 no1-icon" data-id="<?=$comment["comment_id"]?>" src="images/favorite.png" alt="Generic placeholder image" >
							<?php
						}
						else{
							?>
							<img class="unfavorite-comment d-flex mr-3 no1-icon" onclick="window.reload()" data-id="<?=$comment["comment_id"]?>" src="images/unfavorite.png" alt="Generic placeholder image">
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
						<?=$v["comment_content"]?>
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
			location.reload();
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
			location.reload();
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
					$post.parent().find('span.comment_likes_count').text("Likes: " + response);
				}
			});
			location.reload();
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
					$post.parent().find('span.comment_likes_count').text("Likes: " + response);
				}
			});
			location.reload();
		});
		$('.favorite-comment').addEventListener('click', function(){
			var comment_id = $(this).data('id');

			$.ajax({
				url: 'viewPost.php',
				type: 'post',
				data: {
					'favorite': 1,
					'comment_id': comment_id
				}
			});
			location.reload();
		}); 
		$('.unfavorite-comment').addEventListener('click', function(){
			var comment_id = $(this).data('id');

			$.ajax({
				url: 'viewPost.php',
				type: 'post',
				data: {
					'unfavorite': 1,
					'comment_id': comment_id
				}
			});
			location.reload();
		}); 
	});
</script>

<?php
require_once("partial/footer.php");
?>
