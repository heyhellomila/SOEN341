<?php
use PHPUnit\Framework\TestCase;
use action\SignInAction;

class signInActionTest extends TestCase{

        public function testLoginSuccess(){
        //create a user
        create([
            'password' => 'pass',
            'email' => 'bob@bob.com',
        ]);
        $this->visit('SignIn.php')
            ->type('bob@bob.com', 'email')
            ->type('pass', 'password')
            ->press('Sign in')
            ->seePageIs('http://localhost/soen341/index.php');
    }
    
        public function testLoginFailure(){
        //create a user
        create([
            'password' => 'bob',
            'email' => 'bob@bob.com',
        ]);
        $this->visit->('SignIn.php')
            ->type('bob@bob.com', 'email')
            ->type('asdasd', 'password') //enter a wrong password
            ->press('Sign in')
            ->seePageIs('http://localhost/soen341/SignIn.php');
    }


    }
  