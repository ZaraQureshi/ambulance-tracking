<?php
$email=$password='';
if(isset($_POST['loginBtn'])){
	include('config.php');
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$password=md5($_POST['password']);
	$sql="SELECT u_id,u_name,u_email,u_contact from user WHERE u_email='{$email}' AND u_password='{$password}'";
	$query=mysqli_query($conn,$sql) or die('Unsuccessfull login');
	if (mysqli_num_rows($query)>0){
		while($row=mysqli_fetch_assoc($query)){
			session_start();
			$_SESSION['u_id']=$row['u_id'];
			$_SESSION['u_name']=$row['u_name'];
			$_SESSION['u_contact']=$row['u_contact'];
			$_SESSION['u_email']=$row['u_email'];
			echo $_SESSION['u_email'] ;
			

			// $_SESSION['status']=$row['u_status'];
			header("Location: user_index.php");
		}
		
	}else{
		echo'<div  class="alert alert-danger mt-5 mx-5" role="alert">
	  	 			Invalid credentials
		 	</div>';
	}
}
?>

<head><!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style.css">
</head>
<div class="login" style="text-align:center;">
	<form method="POST" action="login.php" >
		<!-- <img src="user.png"><br> -->
		<h2 class="py-4">Login</h2>
		<input type="text" name="email" placeholder="Email"><br><br>
		<input type="password" name="password" placeholder="Password" required><br><br>
		<button type="submit" name="loginBtn" >Login</button>
		<br><br>OR<br><br>
		<a href="register.php" name="register" >SignUp</button>
	</form>
</div>

<script src="app.js"></script>
<!-- id:526187467134-329hhreqlliqkhe5jl7umk8o78sc6vu0.apps.googleusercontent.com
key:mZlIXxDpwQUR8QTaOmOy_vgp -->