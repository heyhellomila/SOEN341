<?php 

require_once("action/PostTableAction.php");
    $action = new postTableAction();
    $action->execute();

require_once("partial/Header.php") 
?>


<?php

require_once("PostTable.php");
?>

<?php
require_once("partial/Footer.php");
?>
