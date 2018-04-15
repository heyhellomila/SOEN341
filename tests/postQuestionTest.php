<?php
use PHPUnit\Framework\TestCase;
use action\postQuestionAction;

class postQuestiontest extends TestCase {


    public function testPostQuestion(){
    	$this->visit("postQuestion.php")
    	->type('this is my quesiton','questiontopic')
    	->type('this is the content','content')
    	->press('Submit')
    	->seePageIs('http://localhost/soen341/viewPost.php')
    	->seeInDatabase('post',['post_title'=>'this is my question'])
    	->seeInDatatbase('post',['post_content'=>'this is the content']);
    }
