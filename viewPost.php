<?php 
require_once("action/viewPostAction.php");

	$action = new viewPostAction();
	$action->execute();
require_once("partial/header.php");
?>

<div class="background container">
	<div class="row">
		<div class="col-md-2"></div>

		<div class="col-md-8">
			<div class="row mainPost">
				<div class="media ">
					<img class="d-flex mr-3 col user-icon" src="images/captain.png" alt="Generic placeholder image">
					<div class="panel panel-default">
						<div class="panel-heading">
							<strong>myusername</strong> <span class="text-muted">commented 5 days ago</span>

						</div>
						<div class="media-body">

							Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
							<div class="interuptLine"> </div>

							<div class="row">
								<div class="col">
									<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-thumbs-up"></i>Like | 1234</button>
									<button type="button" class="btn btn-secondary btn-sm"><i class="fa fa-thumbs-down"></i> </button>
								</div>							
								<div class="col">

									<a href="https://facebook.com/" target="_blank" class="button pull-right"><i class="fa fa-facebook" aria-hidden="true"></i></a>
									<a href="https://google.com/" target="_blank" class="button pull-right"><i class="fa fa-google" aria-hidden="true"></i></a>
									<a href="https://twitter.com/" target="_blank" class="button pull-right"><i class="fa fa-twitter" aria-hidden="true"></i></a>
								</div>
							</div>
							<div class="interuptLine"> </div>
							<div class="row">
								<div class="col-2">
									<img class="align-self-center mr-3 user-icon" src="images/captain.png" alt="Generic placeholder image">
								</div>
								<form class="form col">
									<div class="form-group ">
										<label for="exampleFormControlTextarea1"></label>
										<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Write comments..."></textarea>
									</div> <button type="submit" class="btn btn-primary">Comment</button>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row ">
				<div class="media "><div class="col">
					<img class="d-flex mr-3 user-icon" src="images/captain.png" alt="Generic placeholder image">
					<img class="d-flex mr-3 no1-icon" src="images/no1.png" alt="Generic placeholder image">
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>myusername</strong> <span class="text-muted">commented 5 days ago</span>

					</div>
					<div class="media-body">

						Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
						<div class="col secondaryLikes">
							<button type="button" class="btn btn-primary btn-sm "><i class="fa fa-thumbs-up "></i>Like | 44213</button>
							<button type="button" class="btn btn-secondary btn-sm "><i class="fa fa-thumbs-down "></i> </button>
						</div>	

						<div class="row">
							<div class="media no-border">
								<img class="d-flex mr-3" src="images/captain.png" alt="Generic placeholder image">
								<div class="panel panel-default">
									<div class="panel-heading">
										<strong>myusername</strong> <span class="text-muted">commented 5 days ago</span>
									</div>
									<div class="media-body">

										Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

										<div class="col secondaryLikes">
											<button type="button" class="btn btn-primary btn-sm "><i class="fa fa-thumbs-up "></i>Like | 44213</button>
											<button type="button" class="btn btn-secondary btn-sm "><i class="fa fa-thumbs-down "></i> </button>
										</div>	
									</div>
								</div>
							</div>
						</div>
						<div class="interuptLine"> </div>
						<div class="row">
							<div class="col-2">
								<img class="align-self-center mr-3 user-icon" src="images/captain.png" alt="Generic placeholder image">
							</div>
							<form class="form col">
								<div class="form-group ">
									<label for="exampleFormControlTextarea1"></label>
									<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Write comments..."></textarea>
								</div> <button type="submit" class="btn btn-primary">Comment</button>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row ">
			<div class="media ">
				<img class="d-flex mr-3" src="images/captain.png" alt="Generic placeholder image">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>myusername</strong> <span class="text-muted">commented 5 days ago</span>

					</div>
					<div class="media-body">

						Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.						
						<div class="col secondaryLikes">
							<button type="button" class="btn btn-primary btn-sm "><i class="fa fa-thumbs-up "></i>Like | 44213</button>
							<button type="button" class="btn btn-secondary btn-sm "><i class="fa fa-thumbs-down "></i> </button>
						</div>	
						<div class="interuptLine"> </div>
						<div class="row">
							<div class="col-2">
								<img class="align-self-center mr-3" src="images/captain.png" alt="Generic placeholder image">
							</div>
							<form class="form col">
								<div class="form-group ">
									<label for="exampleFormControlTextarea1"></label>
									<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Write comments..."></textarea>
								</div> <button type="submit" class="btn btn-primary">Comment</button>

							</form>
						</div>
						
					</div>
				</div>
			</div>
		</div>


	</div>
</div>
</div>
<div class="col-md-2"></div>

<?php
require_once("partial/footer.php");
