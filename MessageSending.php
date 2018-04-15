<?php
require_once("action/SignInAction.php");

$action = new SignInAction();

$action->execute();
require_once("partial/Header.php");
?>

<div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <p><h1 class="h1">Contact Us</h1></p>
                <p class="bd-lead"><p>Your message has been sent, we will get back to you soon.</p></p>
            </div>
        </div>
    </div>

<?php
require_once("partial/Footer.php");
?>


