<script src="js/postTable.js"></script>
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
            <strong class="d-block">Answers: 0</strong>
            <strong id="likes" class="d-block">Likes: <?=$post["post_nb_likes"]?></strong>
            <button type="button" id="button1" class="btn btn-primary btn-sm"><i class="fa fa-thumbs-up"></i></button>
            <button type="button" id="button2" class="btn btn-secondary btn-sm"><i class="fa fa-thumbs-down"></i> </button>
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
