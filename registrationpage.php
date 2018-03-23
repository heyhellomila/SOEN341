<?php

require_once("action/registerAction.php");

$action= new SignUpAction();
$action->execute();

require_once("partial/header.php");



require_once ("formvalidator.php");
$show_form=true;
if(isset($_POST['Submit']))
{
             $validator = new FormValidator();
    $validator->addValidation("username","req","Please enter your username");
     $validator->addValidation("username","maxlen=25","Max length for FirstName is 25");

     $validator->addValidation("Email","maxlen=50");
    $validator->addValidation("Email","email", "The input for Email should be a valid email value");
    $validator->addValidation("Email","req","Please fill in Email");
    $validator->addValidation("Email2","maxlen=50");
    $validator->addValidation("Email2","email", "The input for Email should be a valid email value");
    $validator->addValidation("Email2","req","Please fill in Email");
    $validator->addValidation("Email2","eqelmnt=Email", "The confirmed email  is not same as email address");

    $validator->addValidation("pwd1","req","Please enter your password");
    $validator->addValidation("pwd1","regexp=^[A-Za-z]{4,8}$","please enter valid password ");
    $validator->addValidation("pwd2","req","Please confirm password");
    $validator->addValidation("pwd2","eqelmnt=pwd1","The confirmed password is not same as password");
    
    if($validator->ValidateForm())
    {
        
        $show_form=false;
    }
    else
    {
        echo "<B>Validation Errors:</B>";

       
    }
}


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
                                <?php 
					if ($action->wrongSignUp) 
						{echo "<script>
		alert('Sorry user name already exist');
		window.location.href='registrationpage.php';
		</script>";}
                          if($action->GoodSignUp){
                echo "<script>
		alert('Thank you for registration');
		window.location.href='signin.php';
		</script>";



}


				?>

                                
                                <div class="mt-4">
                                    <form  id="myform" action="registrationpage.php" method="post" ><div class="form-group">
                                           <label for='username'></label>
                                            <input type="text" class="form-control" name="username" value="" placeholder="Username" id="username">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" value="" placeholder="example@gmail.com" id="Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email2" value="" placeholder="example@gmail.com" id="Email2">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="pwd1" value="" placeholder="Password" id="pwd1">
                                            
										</div>
                                           <div class="form-group">
                                            <input type="password" class="form-control" name="pwd2" value="" placeholder="Password" id="pwd2">
                                        <div class="text-center">
                                        <button type="submit" class="btn btn-success" >Sign Up </button>
										</div>
                                    </form>
                                    
                                    <div class="clearfix"></div>
                                    <div class="clearfix"></div>
                                  </div>
    
                                   </div>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    
                </div>
            </div>
        </section>

     
<script type="text/javascript">

 var frmvalidator = new Validator("myform");
	  frmvalidator.addValidation("username","req","Please enter your username");
 frmvalidator.addValidation("username","maxlen=25",
        "Max length for FirstName is 25");
 
 frmvalidator.addValidation("Email","maxlen=50");
 frmvalidator.addValidation("Email","req");
 frmvalidator.addValidation("Email","email");
		 frmvalidator.addValidation("Email2","maxlen=50");
 frmvalidator.addValidation("Email2","req");
 frmvalidator.addValidation("Email2","email")
		   frmvalidator.addValidation("Email2","eqelmnt=Email", "The confirmed email  is not same as email address");
		 
		 
		 frmvalidator.addValidation("pwd1","req","Please enter your password");
		 frmvalidator.addValidation("pwd1","regexp=^[A-Za-z]{4,8}$","please enter valid password ");
         frmvalidator.addValidation("pwd2","req","Please confirm password");
     frmvalidator.addValidation("pwd2","eqelmnt=pwd1","The confirmed password is not same as password");

		 
		 
		 

 
 
 
</script>

  


<?php

require_once("partial/footer.php");

?>
