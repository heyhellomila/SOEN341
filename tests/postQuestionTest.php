<?php
use PHPUnit\Framework\TestCase;

class postQuestiontest extends TestCase {


    public function testPostQuestion(){
    	$this->visit("postQuestion.php")
    	->type('this is my quesiton','questiontopic')
    	->type('this is the content','content')
    	->press('Submit')
    	->seePageIs('http://localhost/soen341/viewPost.php');
    }
}
