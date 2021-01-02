<?php

if(isset($_POST['regBtn'])){
	include('header.php');
	$created_at=date("d M, Y");
	$name=mysqli_real_escape_string($conn,$_POST['name']);
	echo $name;
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$contact=mysqli_real_escape_string($conn,$_POST['num']);
	$password=md5($_POST['password']);
	// md5($_POST['password']);
	echo $created_at;
	echo $email;
	echo $contact;
	echo $password;
	$sql="SELECT u_email from user WHERE u_email='{$email}'";
	$result=mysqli_query($conn,$sql) or die('unsuccessfull');
	if(mysqli_num_rows($result)>0){
		echo'<p>Email already exits.</p>';
	}else{
		$query="INSERT INTO `user`(`u_name`, `u_email`, `u_contact`, `u_password`,`created_at`) VALUES ('$name','$email','$contact','$password','$created_at')";
		
		
		$result1=mysqli_query($conn,$query) or die('Unsuccessfull'); 
		
		echo ' '.mysqli_error($conn);
		header("Location: login.php"); 
	}
}
?> 

<html>
	<head>
		
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

	<!-- JS, Popper.js, and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="style.css">

	</head>
	<body style="text-align:center;">
		
		<div class="register">
			<!-- <img src="user.png"> -->
			
			<h2 class="py-4">Register</h2>
			<form method="POST" action="register.php">
			<div class="input-row">
				<label for="name">Name: </label><br>
				<input id="name" name="name" type="text" required>
				<i class="fa fa-check complete" aria-hidden="true"></i><br>
				<small id="alert-name"></small>
			</div>
			<div class="input-row">
				<label id="email-label" for="email">E-mail adress: </label><br>
				<input id="email" name="email" type="text" required>
				<i class="fa fa-check complete" aria-hidden="true"></i><br>
				<small id="alert-email"></small>
			</div>
			<div class="input-row">
				<label id="password-label" for="password">Password: </label><br>
				<input id="password" name="password" type="password" required>
				<i class="fa fa-check complete" aria-hidden="true"></i><br>
				<small id="alert-password"></small>
			</div>
			
			<div class="input-row">
				<label id="num-label" for="num">Contact: </label><br>
				<input id="num" name="num" type="number" required>
				<i class="fa fa-check complete" aria-hidden="true"></i><br>
				<small id="alert-numbers"></small>
			</div><br>
				<button type="submit" name="regBtn" style="padding:8px 40px;">Register</button>
			</form>
		</div>
		<script src="app.js"></script>
	</body>
</html>