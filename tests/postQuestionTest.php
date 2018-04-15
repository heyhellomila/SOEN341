<?php
use PHPUnit\Framework\TestCase;
use action/postQuestionAction;

class postQuestiontest extends TestCase {
	private $post
	public function __construct()
    {
        $this->post = new postQuestiontAction();
        parent::__construct();
    }

    public function testPostQuestion(){
    	$this->visit("postQuestion.php")
    	->type('this is my quesiton','questiontopic')
    	->type('this is the content','content')
    	->press('Submit')
    	->seePageIs('http://localhost/soen341/viewPost.php')
    	->seeInDatabase('post'['post_title'=>'this is my question'])
    	->seeInDatatbase('post'['post_content'=>'this is the content']);
    }
