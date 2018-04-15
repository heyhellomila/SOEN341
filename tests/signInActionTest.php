<?php
use PHPUnit\Framework\TestCase;
use action\SignInAction;

class signInActionTest extends TestCase{
 	private $wrongSignIn
	public function __construct()
    {
        $this->wrongSignIn = new SignInAction();
        parent::__construct();
    }

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
  