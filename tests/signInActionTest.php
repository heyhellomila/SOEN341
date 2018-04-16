<?php
use PHPUnit\Framework\TestCase;

class signInActionTest extends TestCase{

    public function testValidationOk()
    {
        $input = array('username' => 'bob', 'password' => 'pass');
        $errorsArray = PostTableAction::authenticate($input);
        assertCount(0, $errorsArray);
    }




}

