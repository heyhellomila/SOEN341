<?php
use PHPUnit\Framework\TestCase;
use signin.php;

class viewPostTest extends TestCase
{
    
    public function testLoginSuccess(){
        //create a user
        factory(User::class)->create([
            'name' => 'bill',
            'title' => 'student',
            'email' => 'bill@bill.com',
        ]);
        $this->visit('login')
            ->type('bill@bill.com', 'email')
            ->type('secret', 'password')
            ->press('Login')
            ->seePageIs('http://localhost/wizard/title');
    }
}
?>