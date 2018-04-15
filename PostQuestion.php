<?php 
require_once("action/PostQuestionAction.php");

$action = new PostQuestionAction();
$action->execute();
require_once("partial/Header.php")

?>

<div class="container text-justified mt-3 p">
  <form method="post" action="PostQuestion.php">
    <div class="align-self-center form-group" >
      <label for="questiontopic" class="font-weight-bold">Question Title</label>
      <input type="text" class="form-control" id="question_topic" name="question_topic" placeholder="Write your question here.">
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
require_once("partial/Footer.php");
?>
