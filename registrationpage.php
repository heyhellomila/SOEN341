<?php

require_once("partial/header.php");

?>

<div class="container-fluid"  align="justify">
	
	<section class="hero"><div class="mt-2 text-center">
                                    <h2>Create Your Account</h2>
                                </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-8 mx-auto">
                        <div class="card border-none">
                            <div class="card-body">
                                
                                
                                <div class="mt-4">
                                    <form  id="myform" ><div class="form-group">
                                           <label for='username'></label>
                                            <input type="text" class="form-control" name="username" value="" placeholder="UserName" id="username">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" value="" placeholder="Example@gmail.com" id="Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email2" value="" placeholder="Confirm email address" id="Email2">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="pwd1" value="" placeholder="Password" id="pwd1">
                                            
										</div>
                                           <div class="form-group">
                                            <input type="password" class="form-control" name="pwd2" value="" placeholder="Confirm Password" id="pwd2">

                                        </div> <div class="form-group">
                                            <input type="text" class="form-control" name="Interest" value="" placeholder="Area Of Interest">
                                        </div>
                                        <div class="text-center">
                                        <button type="submit" class="btn btn-danger">Join Us </button>
										</div>
                                    </form>
                                    <div class="clearfix"></div>
                                    <div class="social-login">
                                   	
                                   <p>- - - - - - - - - - - - - Join Us With - - - - - - - - - - - - - </p>
                                  
                                  		<ul>
                                <li><a href="" class="btn-primary"><i class="fa fa-facebook" ></i> Facebook</a></li>
                                <li><a href=""><i class="fa fa-google-plus"></i> Google+</a></li>
                                <li><a href=""><i class="fa fa-twitter"></i> Twitter</a></li>
                                </ul>
                                 </div><div class="clearfix"></div>
                                  </div>
    
                                   </div>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    
                </div>
            </div>
        </section>


         

  


<?php

require_once("partial/footer.php");

?>
