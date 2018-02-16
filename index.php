<?php 
require_once("action/indexAction.php");
	$action = new indexAction();
	$action->execute();
require_once("partial/header.php") 
?>


<?php
require_once("action/postTableAction.php");
    $action = new postTableAction();
    $action->execute();
require_once("Post Table.php");
?>

<?php
require_once("partial/footer.php");
?>
