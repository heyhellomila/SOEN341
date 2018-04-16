<?php
use PHPUnit\Framework\TestCase;

class signInActionTest extends TestCase{

    public function testValidationOk()
    {
        $input = array('username' => 'bob', 'password' => 'pass');
        $errorsArray = MyClass::validation($input);
        assertCount(0, $errorsArray);
    }




}

