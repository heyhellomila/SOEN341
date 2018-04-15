<?php 

require_once("action/PostTableAction.php");
    $action = new PostTableAction();
    $action->execute();

require_once("partial/Header.php") 
?>


<?php
require_once("PostTable.php");
?>

<?php
require_once("partial/Footer.php");
?>
