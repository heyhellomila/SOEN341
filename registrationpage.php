<?php

require_once("partial/header.php");

?>



<div class="container-fluid"  align="justify">
	<div class="row" >
		<h2 class="center-block border-info">Create Account </h2>
	</div>
</div>
<br>
<br>

<div class="row border-0">
<div class="col-md-4 col-md-offset-4">
<div class="form-body">
  
        
      
    
    <div class="tab-content">
        <div id="sectionA" class="tab-pane fade in active">
        <div class="innter-form">
            <form class="sa-innate-form" method="post">
            
            <input type="text" name="username" placeholder="UserName" id="user">
            <input type="text" name="emailaddress" placeholder="Email@example.com" id="email">
            <input type="password" name="password" placeholder="Password" id="pas"><br>
            <input type="text" name="interest" placeholder="Area Of Interest" id="Int">
            <button type="submit" class="center-block btn-danger"  >Join Us</button>
            
            </form>
            </div>
            <div class="social-login">
            <p>- - - - - - - - - - - - - Join Us With - - - - - - - - - - - - - </p>
    		<ul>
            <li><a href="" class="btn-primary"><i class="fa fa-facebook" ></i> Facebook</a></li>
            <li><a href=""><i class="fa fa-google-plus"></i> Google+</a></li>
            <li><a href=""><i class="fa fa-twitter"></i> Twitter</a></li>
            </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    
    </div>
    </div>
    </div>
    </div>
    </div>

<?php

require_once("partial/footer.php");

?>
