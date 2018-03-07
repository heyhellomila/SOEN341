<!doctype html>
<html>

<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<link rel="stylesheet" type="text/css" href="css/viewPost.css">
	<link rel="stylesheet" type="text/css" href="css/reg.css">
	<link rel="stylesheet" type="text/css" href="css/SignIn.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/gen_validatorv4.js"></script>
	
	<script type="text/javascript" src="js/main.js"></script>



</head>

<body>
	<nav class="navbar sticky-top navbar-dark bg-dark justify-content-between">
		<a class="navbar-brand col pt-0" href="index.php">
			<img class="navbar-brand " src="images/site_logo.png" height="60">
		</a>

		<form class="form-inline col-8" method="post">
			<input class="form-control mr-sm-3 col" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-success" type="submit">Search</button>
			
		</form>

		<?php
			if ($action->isLoggedIn())
			{
		?>
			<div class="dropdown">
				<button class = "btn btn-dark dropdown-toggle" type ="button" id ="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img alt="32x32" class="mr-2 rounded" style="width: 48px; height: 48px;" src="images/captain.png">
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="#">Profile</a>
					<a class="dropdown-item" href="./?logout=true">Sign Out</a>
				</div>
			</div>
		
		<?php
			}
			else
			{		
		?>		
			<div class="col">
				<form class="form-inline row" method="post">
					<a class="mr-2" href="SignIn.php"><button class="btn btn-secondary " type="button">Sign In</button></a>
					<a class="mr-2" href="registrationpage.php"><button class="btn btn-primary" type="button">Sign Up</button></a>
				</form>
			</div>
		<?php
			}
		?>
	</nav>
	<div class="contentWrap">
	
	<?php
		
	abstract class Notification
	{
		protected $recipient;
		protected $sender;
		protected $unread;
		protected $type;
		protected $parameters;
		protected $referenceId;
		protected $createdAt;
		
		public function messageForNotification(Notification $notification) : string;
		public function messageForNotifications(array $notifications) : string;

		public function message() : string
		{
			return $this->messageForNotification($this);
		}
	}
	
	class NotificationManager
	{
		protected $notificationAdapter;

		public function add(Notification $notification);

		public function markRead(array $notifications);

		public function get(User $user, $limit = 20, $offset = 0) : array;
	}
	
	public function add(Notification $notification)
	{
		if (!$this->notificationAdapter->isDoublicate($notification))
		{
			$this->notificationAdapter->add([
				'recipient_id' => $notification->recipient->getId(),
				'sender_id' => $notification->sender->getId()
				'unread' => 1,
				'type' => $notification->type,
				'parameters' => $notification->parameters,
				'reference_id' => $notification->reference->getId(),
				'created_at' => time(),
			]);
		}
	}
	
	namespace Notification\Comment;

	class CommentLikedNotification extends \Notification
	{
		public function messageForNotification(Notification $notification) : string 
		{
			return $this->sender->getName() . 'has commented on your post: ' . substr($this->reference->text, 0, 10) . '...'; 
		}

   
		public function messageForNotifications(array $notifications, int $realCount = 0) : string 
		{
			if ($realCount === 0) {
				$realCount = count($notifications);
			}

			if ($realCount === 2) {
				$names = $this->messageForTwoNotifications($notifications);
			}
			
			elseif ($realCount < 5) {
				$names = $this->messageForManyNotifications($notifications);
			}
        
			else {
				$names = $this->messageForManyManyNotifications($notifications, $realCount);
			}

			return $names . 'have commented on your post: ' . substr($this->reference->text, 0, 10) . '...'; 
		}


		protected function messageForTwoNotifications(array $notifications) : string 
		{
			list($first, $second) = $notifications;
			return $first->getName() . ' and ' . $second->getName(); // John and Jane
		}

   
		protected function messageForManyNotifications(array $notifications) : string 
		{
			$last = array_pop($notifications);
		
			foreach($notifications as $notification) {
				$names .= $notification->getName() . ', ';
			}

			return substr($names, 0, -2) . ' and ' . $last->getName(); // Jane, Johnny, James and Jenny
		}

		protected function messageForManyManyNotifications(array $notifications, int $realCount) : string 
		{
			list($first, $second) = array_slice($notifications, 0, 2);
	
			return $first->getName() . ', ' . $second->getName() . ' and ' .  $realCount . ' others'; // Jonny, James and 12 other
		}
	}
	?>
		
	<?php 
	require_once("tabmenu.php");
	?>
