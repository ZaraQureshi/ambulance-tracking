<?php
include('config.php');


?>
<link rel="stylesheet" href="style.css">
<!-- <div class="navbar">
			<ul>Ambulance Booking System</ul>
			<div class="nav_content">
				<ul>
					<li >Home</li>

					<li>About</li>
					<li>Contact</li>
					<li><
        				<a href="logout.php">Hello,
        			</li>
					
				</ul>
				<div class="burger"><i class="fa fa-bars" aria-hidden="true"></i></div>
			</div>
		</div> -->
		<nav class="navbar">
			<label class="navbar-toggle" id="js-navbar-toggle" for="chkToggle">
					<i class="fa fa-bars"></i>
				</label>
			<a href="#" class="logo">Ambulance Tracking System</a>
			<input type="checkbox" id="chkToggle"></input>
			<ul class="main-nav" id="js-menu">
			
			
			<li>
			<?php ?>
			<?php 
								echo 'Hello,';
								if (isset($_SESSION['u_name'])){ 
									echo $_SESSION['u_name'];
								}
								else{ 
									header("Location: login.php");
								} 
							?>
        				<a href="logout.php" style="padding-left:4px;">
							    Logout
							
						</a>
			</li>
			
			</ul>
		</nav>