<?php

require_once("action/viewPostAction.php");

$action = new viewPostAction();
$action->execute();
require_once("partial/header.php");

  if (isset($_POST['post_liked'])) {
    $postid = $_POST['postid'];
    $likes = $action->getPostByID($postid);
    $action->updateLike($postid, $likes["post_likes"]);
    echo $likes["post_likes"]+1;
    exit(); }

  if (isset($_POST['post_disliked'])) {
    $postid = $_POST['postid'];
    $likes = $action->getPostByID($postid);
    $action->updateDislike($postid, $likes["post_likes"]);
    echo $likes["post_likes"]-1;
    exit(); }

   if (isset($_POST['comment_liked'])) {
    $commentid = $_POST['commentid'];
    $likes = $action->getCommentByID($commentid);
    $action->updateCommentLike($commentid, $likes["comment_likes"]);
    echo $likes["comment_likes"]+1;
    exit(); }

  if (isset($_POST['comment_disliked'])) {
    $commentid = $_POST['commentid'];
    $likes = $action->getCommentByID($commentid);
    $action->updateCommentDislike($commentid, $likes["comment_likes"]);
    echo $likes["comment_likes"]-1;
    exit(); }
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
										<strong id="likes" class="d-block" style="margin-left: 30px; padding: 10px;"><span class="post_likes_count">Likes: <?=$action->post["post_likes"]?></span></strong>
            							<span class="post_like fa fa-thumbs-up" data-id="<?=$action->post["post_id"]?>"></span>
            							<span class="post_dislike fa fa-thumbs-down" data-id="<?=$action->post["post_id"]?>"></span>
            						</div>
								</div>							
								<!--<div class="col">
									<a href="https://facebook.com/" target="_blank" class="button pull-right"><i class="fa fa-facebook" aria-hidden="true"></i></a>
									<a href="https://google.com/" target="_blank" class="button pull-right"><i class="fa fa-google" aria-hidden="true"></i></a>
									<a href="https://twitter.com/" target="_blank" class="button pull-right"><i class="fa fa-twitter" aria-hidden="true"></i></a>
								</div>-->
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
			foreach ($action->comments as $v) {
				$answers++;
				$subcomments=$action->getSubComments($v["comment_id"]);
				$commentCreator=$action->getUserByID($v["comment_creator"]);
				?>
				<div class="row ">
					<div class="media "><div class="col">
						<img class="d-flex mr-3 user-icon" src="images/captain.png" alt="Generic placeholder image">
						<img class="d-flex mr-3 no1-icon" src="images/no1.png" alt="Generic placeholder image">
						
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<strong><?=$commentCreator["user_name"]?></strong> <span class="text-muted">commented on <?=$v["comment_creation_time"]?></span>

						</div>
						<div class="media-body">
							<?=$v["comment_content"]?>
							<div class="col secondaryLikes">
								<span class="comment_likes_count" style="margin-right: 20px;">Likes: <?=$v["comment_likes"]?></span>
            					<span class="comment_like fa fa-thumbs-up" data-id="<?=$v["comment_id"]?>"></span>
            					<span class="comment_dislike fa fa-thumbs-down" data-id="<?=$v["comment_id"]?>"></span>
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
													<span class="comment_likes_count" style="margin-right: 20px;">Likes: <?=$subC["comment_likes"]?></span>
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
									<input type="hidden" name="parent_id" value="<?=$v["comment_id"]?>"></input>
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
  });
</script>

<?php
require_once("partial/footer.php");
?>
