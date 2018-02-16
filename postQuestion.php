<?php 
//require_once("action/postQuestionAction.php");
//$action->execute();
require_once("partial/header.php") 
?>

<div class="container text-justified mt-3 p">
<form method="post" action="action/postQuestionAction.php">
  <div class="align-self-center form-group" >
    <label for="questiontopic" class="font-weight-bold">Question Title</label>
    <input type="text" class="form-control" id="questiontopic" name="questiontopic" placeholder="Question title goes here">
  </div>

  <div class="form-group">
    <label for="content" class="font-weight-bold">Text (optional)</label>
    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
  </div>
  <button class="btn btn-lg btn-primary" type="submit">
    Submit Question
    </button>
</form>
</div>
<?php
require_once("partial/footer.php");
?>
