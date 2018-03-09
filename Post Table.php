<?php

  $con = mysqli_connect('localhost', '341DBAuser', '', '341');

  if (isset($_POST['liked'])) {
    $postid = $_POST['postid'];
    $result = mysqli_query($con, "SELECT * FROM post WHERE post_id=$postid");
    $row = mysqli_fetch_array($result);
    $n = $row['post_nb_likes'];

    mysqli_query($con, "UPDATE post SET post_nb_likes=$n+1 WHERE post_id=$postid");

    echo $n+1;
    exit(); }

  if (isset($_POST['disliked'])) {
    $postid = $_POST['postid'];
    $result = mysqli_query($con, "SELECT * FROM post WHERE post_id=$postid");
    $row = mysqli_fetch_array($result);
    $n = $row['post_nb_likes'];

    mysqli_query($con, "UPDATE post SET post_nb_likes=$n-1 WHERE post_id=$postid");
    
    echo $n-1;
    exit(); }

?>

<div class="my-3">
<?php
foreach ($action->posts as $post) {
 $postCreator = $action->getUserByID($post["post_creator"]);
?>
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <div class="container">
      <div>
        <!-- Single post starts here -->
        <form name="title" action="index.php" method="post">
          <input type="hidden" name="post_id" value="<?=$post["post_id"]?>"></input>           
          <button type="submit" class="notButton"><?=$post["post_title"]?></button>
        </form>
                
        <div class="media text-muted pt-0 mb-3 border-bottom border-gray">
          <table>
          <tr>
            <td>
            <strong class="d-block text-gray-dark">From: <?=$postCreator["user_name"]?></strong>
            <strong class="d-block text-gray-dark">Posted: <?=$post["post_creation_time"]?></strong>
            <strong class="d-block">Answers: <?=$post["post_nb_answers"]?></strong>
            <strong id="likes" class="d-block"><span class="likes_count">Likes: <?=$post["post_nb_likes"]?></span></strong>
            <span class="like fa fa-thumbs-up" data-id="<?=$post["post_id"]?>"></span>
            <span class="dislike fa fa-thumbs-down" data-id="<?=$post["post_id"]?>"></span>
            </td>
            <td style="padding: 5px;"><?=$post["post_content"]?></td>
          </tr>
          </table>
        <!-- End of single post -->
        </div>
      </div>
    </div>
  </div>
</div>
<?php
}
?>
</div>

<script src="js/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $('.like').on('click', function(){
      var postid = $(this).data('id');
          $post = $(this);

      $.ajax({
        url: 'Post Table.php',
        type: 'post',
        data: {
          'liked': 1,
          'postid': postid
        },
        success: function(response){
          $post.parent().find('span.likes_count').text("Likes: " + response);
        }
      });
    });

    $('.dislike').on('click', function(){
      var postid = $(this).data('id');
        $post = $(this);

      $.ajax({
        url: 'Post Table.php',
        type: 'post',
        data: {
          'disliked': 1,
          'postid': postid
        },
        success: function(response){
          $post.parent().find('span.likes_count').text("Likes: " + response);
        }
      });
    });
  });
</script>
