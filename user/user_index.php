<html>
	<head>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="style.css">
		<link href="https://fonts.googleapis.com/css2?family=Lora:wght@500;600&family=Merriweather:wght@300;400&display=swap" rel="stylesheet">
	</head>
	<?php include('header.php');?>
	<body onload="getLocation();">
		
		<div class="header">
			<div class="header_content">
				<span>Ambulance Tracking System</span><br><br><br>
				<div class="header_btns">
					<a class="about_btn" href="#about" style="color:white;">About Us</a><a href="#contact"class="about_btn" style="color:white;">Contact Us</a> 
				</div>
			</div>
		</div>
		<div class="steps" >
			<div class="step">
				<img src="images/reg.svg"><br>
				<span class="step_head">User</span><br><br>
				<span class="step_body">Enter you details to help us find you.</span><br><br>
				<br><br><a><?php if (isset($_SESSION['u_name'])){ echo $_SESSION['u_name'];} ?></a>
			</div>

			<div class="step">
				<!-- <form action="map.php" method="POST">
	            	<input type="hidden" name="lats" id="lats">
	            	<input type="hidden" name="longs" id="longs">
	            	<button class="button" type="submit" name="mapSubmit" id="mapSubmit">Find nearest ambulance</button> -->
	        	<!-- </form>  -->
        		<?php
	        		if(isset($_POST['mapSubmit'])){
	            		$lat=$_POST['lats'];
						$long=$_POST['longs'];
						$_SESSION['lat']=$lat;
						$_SESSION['long']=$long;
	            		header("Location: nearest_driver.php");
	        		}
	        	?>
				<img src="images/ambulance.svg"><br>
				<span class="step_head">Select ambulance</span><br><br>
				<span class="step_body">Select ambulance close to you</span><br><br>
				<br>
				<form action="user_index.php" method="POST">
	            	<input type="hidden" name="lats" id="lats">
	            	<input type="hidden" name="longs" id="longs">
	            	<button type="submit" name="mapSubmit">Select</button>
	            </form>
			</div>
			<div class="step">
				<img src="images/call.svg"><br>
				<span class="step_head">Track the ambulance</span><br><br>
				<span class="step_body">You will have your ambulance driver's contact number for efficiency</span><br><br>
				<br><a>Call</a>
			</div>
			<div class="step">
				<img src="images/hosp.svg"><br>
				<span class="step_head">Select Nearest hospital </span><br><br>
				<span class="step_body">You will get information about the nearest hospital and health center</span><br><br>
				<br><a>Hospital</a>
			</div>
			
		</div>
		
        
        
        
		<div class="about" id="about">
			<!-- <div class="about_img">
				<img src="images/amb.png">
			</div> -->
			<div class="about_content">
				<span class="about_content_head">About Us</span><span><br><br>
				<span class="about_content_body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><br><br>
				<a>Know more</a><br><br><br>
			</div>
			<!-- <div class="about_img">
				<img src="images/amb.png">
			</div> -->
			
		</div>
		<div class="contact_icons">
			<i class="fa fa-instagram" aria-hidden="true"></i>
			<i class="fa fa-facebook-official" aria-hidden="true"></i>
			<i class="fa fa-whatsapp" aria-hidden="true"></i>
			<i class="fa fa-twitter-square" aria-hidden="true"></i>
		</div>
		<div class="contact" id="contact">
			<div class="terms">
				<span>Terms & conditions</span>
				<ul>
					<li>lorem</li>
					<li>lorem</li>
					<li>lorem</li>
					<li>lorem</li>
					<li>lorem</li>
				</ul>
			</div>
			<div class="phone">
				<span>Contact</span>
				<ul>
					<li><i class="fa fa-map-marker" aria-hidden="true"></i><span >Mumbai</span><br></li>
					<li><i class="fa fa-phone-square" aria-hidden="true"></i><span>+91 987654321</span><br></li>
					<li><i class="fa fa-envelope" aria-hidden="true"></i><span>abs@gmail.com</span><br></li>
				</ul>
				
				
			</div>
			<div class="help">
				<span>Help & FAQs</span>
				<ul>
					<li>lorem</li>
					<li>lorem</li>
					<li>lorem</li>
					<li>lorem</li>
					<li>lorem</li>
				</ul>
			</div>
			
		</div>
		<script src="script.js">
            
        </script>
	</body>
</html>