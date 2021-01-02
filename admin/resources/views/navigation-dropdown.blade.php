<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<script src="{{ asset('js/script.js') }}"></script>
<nav class="navbar navbar-expand-lg navbar-light bg-white">
	<button class="navbar-toggler sideMenuToggler" type="button">
      		<span class="navbar-toggler-icon"  onclick="openNav()">
      			
      		</span>
  </button>
  <a class="navbar-brand mx-auto" href="#">Admin Panel</a>
  <div class="sidebar_nav" style="display:hidden;">
     <?php ?>
  </div>
    

  
</nav>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="dashboard">
     <i class="fa fa-tachometer" aria-hidden="true"></i>
      <span class="text">Dashboard</span>
   </a>
  <a href="driver_show">
      <i class="fa fa-user-circle" aria-hidden="true"></i>
		<span class="text">Driver</span>
  </a>
  <a href="hospital_show">
      <i class="fa fa-check" aria-hidden="true"></i>
      <span class="text">Hospital</span>
   </a>
  
</div>
