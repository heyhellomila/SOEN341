<?php
require_once("partial/header.php");
?>

 <a href="contactUS.php">contact page</a> 
 <a href="registrationpage.php">reg page</a> 
 <a href="viewPost.php">view post</a> 

<div class="tab-select" style=" margin:20px;">
    	<ul class="nav nav-tabs">

   		<li class="tab"><a data-toggle="tab" href="activetab.php">Active</a></li>
        	<li><a data-toggle="tab" href="newquestiontab.php">New</a></li>
        	<li><a data-toggle="tab" href=""#unanswered</a></li>
    	</ul>
</div>
<div id="unanswered" class="tab-pane fade">
    <div class="container">
      <!-- Table of posts -->
      <div class="my-3 p-3 bg-white">
        <!-- Single post that is added to the homepage starts here -->
        <h5>Question 1</h5>
        <div class="media text-muted pt-2 mb-3 border-bottom border-gray">
          <img alt="32x32" class="mr-2 rounded" style="width: 48px; height: 48px;" src="images/sakura.png">
          <p class="media-body pb-2 mb-3 small lh-125">
            <strong class="d-block text-gray-dark">From: flower<span style="color: green;">&emsp;Answers: 0&emsp;</span><span style="color: blue;">Likes: 125</span></strong>
            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
          </p>
        </div>
        <!-- End of single post -->
        <h5>Question 2</h5>
        <div class="media text-muted pt-2 mb-3 border-bottom border-gray">
          <img alt="32x32" class="mr-2 rounded" style="width: 48px; height: 48px;" src="images/dog.png">
          <p class="media-body pb-2 mb-3 small lh-125">
            <strong class="d-block text-gray-dark">From: amazingtrainer<span style="color: green;">&emsp;Answers: 0&emsp;</span><span style="color: blue;">Likes: 125</span></strong>
            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
          </p>
          <p></p>
        </div>
        <h5>Question 3</h5>
        <div class="media text-muted pt-2 mb-3 border-bottom border-gray">
          <img alt="32x32" class="mr-2 rounded" style="width: 48px; height: 48px;" src="images/captain.png">
          <p class="media-body pb-2 mb-3 small lh-125">
            <strong class="d-block text-gray-dark">From: Username<span style="color: green;">&emsp;Answers: 0&emsp;</span><span style="color: blue;">Likes: 125</span></strong>
            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
          </p>
        </div>
      </div>
    </div>
    <!-- End of table -->
</div>   
<?php
require_once("partial/footer.php");
?>

