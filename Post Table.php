<?php 
require_once("action/postTableAction.php");

$action = new postTableAction();
$action->execute();
?>  
<script type="text/javascript">
  var likes = 0;
  var dom;

  function getElementBtnIncrement() {
    var button = document.getElementById("button1");
    button.addEventListener("click", increment, false) }

  function increment() {
    likes++;
    dom = document.getElementById("likes");
    dom.innerHTML = "Likes: " + likes; }
    
  function getElementBtnDecrement() {
    var button = document.getElementById("button2");
    button.addEventListener("click", decrement, false) }

  function decrement() {
    likes--;
    dom = document.getElementById("likes");
    dom.innerHTML = "Likes: " + likes; }
 
  window.addEventListener("load", getElementBtnIncrement, false);
  window.addEventListener("load", getElementBtnDecrement, false);
</script>

<?php
//foreach ($action->post as $post) {
// $postCreator = $action->getUserByID($post["post_creator"]);
?>
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <div class="container">
      <div class="my-3 p-3 ">
        <!-- Single post that is added to the homepage starts here -->
        <h5><a href="viewPost.php">&emsp;<?=$action->post["post_title"]?></a></h5>
        <div class="media text-muted pt-2 mb-3 border-bottom border-gray">
          <table>
          <tr>
            <td style="padding: 5px;"><!--<img alt="48x48" class="rounded" style="width: 48px; height: 48px;" src="images/captain.png">-->
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
//}
?>