<?php 

require_once("action/SignInAction.php");

$action = new SignInAction();
$action->execute();
require_once("partial/Header.php") ;
?>
<div  class="text-center">
	<form class="form-sign-in" method="post">
		<h1 class="h3 mb-3 font-weight-normal">Please sign in.</h1>
		<?php 
		if ($action->wrongSignIn) 
			echo '<div class="alert alert-danger"><strong> Error! </strong> Wrong username or password entered. </div>';
		?>
		<label for="input_email" class="sr-only">E-mail Address</label>
		<input type="email" id="input_email" class="form-control" name= "username" placeholder="E-mail Address">
		<label for="input_password" class="sr-only">Password</label>
		<input type="password" id="input_password" name="password" class="form-control" placeholder="Password" >
		<div class="checkbox mb-3">
			<label>
				<input type="checkbox" value="remember-me"> Remember Me
			</label>
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit">
			Sign In
		</button>
		<hr>
		
	</form>
</div>
<?php 
require_once("partial/Footer.php") 
?>
