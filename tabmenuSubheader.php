<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sub header tabs</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<div class="tab-select" style="margin: 20px;">
  <!-- tabs -->
  <ul class="nav nav-tabs" style="position:relative; left:10%;">
   <li class="tab item"><a data-toggle="tab" href="#active">Active</a></li>
   <li><a data-toggle="tab" href="#new">New</a></li>
   <li><a data-toggle="tab" href="#unanswered">Unanswered</a></li>
 </ul>


 <div class="tab-content">
  <div id="active" class="tab-pane fade">
    <div class="container">
      <!-- Table of posts -->
      <div class="my-3 p-3 bg-white">
        <!-- Single post that is added to the homepage starts here -->
        <h5>Question 1</h5>
        <div class="media text-muted pt-2 mb-3 border-bottom border-gray">
          <img alt="32x32" class="mr-2 rounded" style="width: 48px; height: 48px;" src="images/captain.png">
          <p class="media-body pb-2 mb-3 small lh-125">
            <strong class="d-block text-gray-dark">From: Username<span style="color: green;">&emsp;Answers: 48&emsp;</span><span style="color: blue;">Likes: 89</span></strong>
            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
          </p>
        </div>
        <!-- End of single post -->
        <h5>Question 2</h5>
        <div class="media text-muted pt-2 mb-3 border-bottom border-gray">
          <img alt="32x32" class="mr-2 rounded" style="width: 48px; height: 48px;" src="images/dog.png">
          <p class="media-body pb-2 mb-3 small lh-125">
            <strong class="d-block text-gray-dark">From: Username<span style="color: green;">&emsp;Answers: 17&emsp;</span><span style="color: blue;">Likes: 168</span></strong>
            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
          </p>
          <p></p>
        </div>
        <h5>Question 3</h5>
        <div class="media text-muted pt-2 mb-3 border-bottom border-gray">
          <img alt="32x32" class="mr-2 rounded" style="width: 48px; height: 48px;" src="images/sakura.png">
          <p class="media-body pb-2 mb-3 small lh-125">
            <strong class="d-block text-gray-dark">From: Username<span style="color: green;">&emsp;Answers: 9&emsp;</span><span style="color: blue;">Likes: 10</span></strong>
            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
          </p>
        </div>
      </div>
    </div>
  </div>
    <div id="new" class="tab-pane fade">
     <div class="container">
      <!-- Table of posts -->
      <div class="my-3 p-3 bg-white">
        <!-- Single post that is added to the homepage starts here -->
        <h5>Question 1</h5>
        <div class="media text-muted pt-2 mb-3 border-bottom border-gray">
          <img alt="32x32" class="mr-2 rounded" style="width: 48px; height: 48px;" src="images/captain.png">
          <p class="media-body pb-2 mb-3 small lh-125">
            <strong class="d-block text-gray-dark">From: Username<span style="color: green;">&emsp;Answers: 2&emsp;</span><span style="color: blue;">Likes: 5</span></strong>
            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
          </p>
        </div>
        <!-- End of single post -->
        <h5>Question 2</h5>
        <div class="media text-muted pt-2 mb-3 border-bottom border-gray">
          <img alt="32x32" class="mr-2 rounded" style="width: 48px; height: 48px;" src="images/dog.png">
          <p class="media-body pb-2 mb-3 small lh-125">
            <strong class="d-block text-gray-dark">From: Username<span style="color: green;">&emsp;Answers: 6&emsp;</span><span style="color: blue;">Likes: 20</span></strong>
            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
          </p>
          <p></p>
        </div>
        <h5>Question 3</h5>
        <div class="media text-muted pt-2 mb-3 border-bottom border-gray">
          <img alt="32x32" class="mr-2 rounded" style="width: 48px; height: 48px;" src="images/sakura.png">
          <p class="media-body pb-2 mb-3 small lh-125">
            <strong class="d-block text-gray-dark">From: Username<span style="color: green;">&emsp;Answers: 18&emsp;</span><span style="color: blue;">Likes: 43</span></strong>
            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
          </p>
        </div>
      </div>
    </div>
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
  </div>
</div>
</div>
</html>
