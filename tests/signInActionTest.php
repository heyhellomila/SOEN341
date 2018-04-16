<?php
include_once("PostTableAction.php");

class signInActionTest extends \PHPUnit_Framework_TestCase {

    public function testValidationOk()
    {
        $input = array('username' => 'bob', 'password' => 'pass');
        $errorsArray = PostTableAction::authenticate($input);
        assertCount(0, $errorsArray);
    }




}

