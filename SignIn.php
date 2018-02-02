<<?php 
require_once("partial/header.php") 
?>
	<div  class="text-center">
	<form class="form-signin">
		<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
		<label for="inputEmail" class="sr-only">Email address</label>
		<input type="email" id="inputEmail" class="form-control" placeholder="Username/Email address" required autofocus>
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
		<div class="checkbox mb-3">
			<label>
				<input type="checkbox" value="remember-me"> Remember me
			</label>
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit">
		Sign in
		</button>
		<button class="btn btn-lg btn-primary btn-block" type="submit">
			<i class="fa fa-facebook"></i>
			Sign in with Facebook
			
		</button>


		<hr>

			<div class="form-group">
				<a href="#forgot" data-toggle="modal"> Forgot Password? </a>
			</div>

			<button class="btn btn-lg btn-block google-button-colour"  type="submit">
			<i class="fa fa-google"></i>
			Sign in with Google
			
		</button>
		
	</form>
</div>
<<?php 
require_once("partial/footer.php") 
?>

