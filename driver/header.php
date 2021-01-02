<?php
include('config.php');

?>

<nav class="navbar navbar-expand-lg navbar-light bg-white">
	<button class="navbar-toggler sideMenuToggler" type="button">
      		<span class="navbar-toggler-icon"  onclick="openNav()">
      			
      		</span>
  </button>
  <a class="navbar-brand mx-auto" href="#">Driver</a>
  <a href="logout.php">
     Logout
	</a>
   
  <div class="sidebar_nav" style="display:hidden;">
     
  </div>
    

  
</nav>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="dashboard.php">
     <i class="fa fa-tachometer" aria-hidden="true"></i>
      <span class="text">Dashboard</span>
   </a>
  <a href="profile.php">
      <i class="fa fa-user-circle" aria-hidden="true"></i>
		<span class="text">Profile</span>
  </a>
  <a href="completed.php">
      <i class="fa fa-check" aria-hidden="true"></i>
      <span class="text">Completed</span>
   </a>
  
</div>

<!-- Use any element to open the sidenav -->


<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->

<script src="script.js">
  
</script>