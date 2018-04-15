<?php

require_once("action/RegisterAction.php");

$action= new SignUpAction();
$action->execute();

require_once("partial/Header.php");

require_once ("FormValidator.php");
$show_form = true;
if(isset($_POST['Submit']))
{
    $validator = new FormValidator();
    $validator->addValidation("username","request","Please enter your username.");
    $validator->addValidation("username","max_length=25","Maximum length for username is 25 characters.");

    $validator->addValidation("e-mail","max_length=50");
    $validator->addValidation("e-mail","e-mail", "The input for e-mail should be a valid e-mail value.");
    $validator->addValidation("e-mail","request","Please enter your e-mail.");
    $validator->addValidation("confirm_e-mail","max_length=50");
    $validator->addValidation("confirm_e-mail","e-mail", "The input for e-mail should be a valid e-mail value.");
    $validator->addValidation("confirm_e-mail","request","Please confirm your e-mail.");
    $validator->addValidation("confirm_e-mail","equal_element=e-mail", "The confirmed e-mail is not same as e-mail address.");

    $validator->addValidation("password","request","Please enter your password.");
    $validator->addValidation("password","regular_expression=^[A-Za-z]{4,8}$","Please enter a valid password.");
    $validator->addValidation("confirm_password","request","Please confirm your password.");
    $validator->addValidation("confirm_password","equal_element=password","The confirmed password is not same as the entered password.");
    
    if($validator->validateForm())
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
		alert('Sorry, the username you have chosen is not available.');
		window.location.href='RegistrationPage.php';
		</script>";}
                          if($action->goodSignUp){
                echo "<script>
		alert('Thank you for registering!');
		window.location.href='SignIn.php';
		</script>";

}
				    
				?>

                                <div class="mt-4">
                                    <form  id="my_form" action="RegistrationPage.php" method="post" ><div class="form-group">
                                           <label for='username'></label>
                                            <input type="text" class="form-control" name="username" value="" placeholder="Username" id="username">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="e-mail" value="" placeholder="example@gmail.com" id="e-mail">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="confirm_email" value="" placeholder="example@gmail.com" id="confirm_e-mail">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" value="" placeholder="Password" id="password">
					</div>
                                        <div class="form-group">
                                        	<input type="password" class="form-control" name="confirm_password" value="" placeholder="Password" id="confirm_password">
                                        <div class="text-center">
                                        	<button type="submit" class="btn btn-success" >Sign Up</button>
					</div>
                                    </form>  
                                 <div class="clear_fix"></div>
                                 <div class="clear_fix"></div>
                                 </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="clear_fix"></div>
                </div>
            </div>
        </section>

<script type="text/javascript">

var form_validator = new Validator("my_form");
form_validator.addValidation
form_validator.addValidation("username","request","Please enter your username.");
form_validator.addValidation("username","max_length=25","Maximum length for username is 25 characters.");

form_validator.addValidation("e-mail","max_length=50");
form_validator.addValidation("e-mail","e-mail", "The input for e-mail should be a valid e-mail value.");
form_validator.addValidation("e-mail","request","Please enter your e-mail.");
form_validator.addValidation("confirm_e-mail","max_length=50");
form_validator.addValidation("confirm_e-mail","e-mail", "The input for e-mail should be a valid e-mail value.");
form_validator.addValidation("confirm_e-mail","request","Please confirm your e-mail.");
form_validator.addValidation("confirm_e-mail","equal_element=e-mail", "The confirmed e-mail is not same as e-mail address.");

form_validator.addValidation("password","request","Please enter your password.");
form_validator.addValidation("password","regular_expression=^[A-Za-z]{4,8}$","Please enter a valid password.");
form_validator.addValidation("confirm_password","request","Please confirm your password.");
form_validator.addValidation("confirm_password","equal_element=password","The confirmed password is not same as the entered password.");

</script>

<?php

require_once("partial/Footer.php");

?>
