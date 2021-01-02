<head><?php include('config.php');?></head>
<?php
if(isset($_POST['loginBtn'])){
	
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$password=md5($_POST['password']);
	$sql="SELECT d_email,id,d_name,status,user,d_contact FROM drivers WHERE d_email='{$email}' AND d_password='{$password}'";
	$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_assoc($result)){
			$_SESSION['id']=$row['id'];
			echo $_SESSION['id'];
			$_SESSION['d_name']=$row['d_name'];
			$_SESSION['d_email']=$row['d_email'];
			$_SESSION['d_contact']=$row['d_contact'];
			$_SESSION['status']=$row['status'];
			$_SESSION['d_latitude']=$row['d_latitude'];
			$_SESSION['d_longitude']=$row['d_longitude'];

			header("Location: dashboard.php");
		}
	}else{
		echo '<div class="alert alert-danger mt-5 mx-5" role="alert">
	  				Invalid credentials
			</div>';
	}

}
?>
<div class="login">
	<h1>Login Driver</h1>
	<form method="POST" action="login_driver.php">
		<input type="email" placeholder="Email" name="email" required><br><br>
		<input type="password" placeholder="Password" name="password" required><br><br>
		<button type="submit" name="loginBtn">Login</button>
		<br><br>OR<br><br>
		<a href="register_driver.php">SignUp</a>
	</form>
</div>
