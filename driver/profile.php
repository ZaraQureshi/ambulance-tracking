<?php

include('header.php');
$sql="SELECT d_name,d_contact,d_email FROM drivers WHERE id='{$_SESSION['id']}'";
$query=mysqli_query($conn,$sql) or die(mysqli_error($conn));
while($row=mysqli_fetch_assoc($query)){
?>
<div class="row">
<div class="col-lg-2">
	<?php include('sidebar.php');?>
</div>
<div class="col-md-10">
<div class="container">

	<form method="POST" >
	  <div class="form-group">
	    <label >Name</label>
	    <input type="text" class="form-control" id="name" name="name"value="<?php echo $row['d_name'];?>" required>
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Email address</label>
	    <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?php echo $row['d_email'];?>" required>
	    
	  </div>
	  <div class="form-group">
	    <label >Contact</label>
	    <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $row['d_contact'];}?>" required>
	  </div>
	  
	  <button type="submit" name="profileSubmit" class="btn btn-primary" >Submit</button>
	  <button  name="" class="btn btn-primary" ><a style="color:white;"href="dashboard.php">Back to dashboard</a></button>
	</form>

</div>
</div></div>
<?php
if(isset($_POST['profileSubmit'])){
	$name=mysqli_real_escape_string($conn,$_POST['name']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$contact=mysqli_real_escape_string($conn,$_POST['contact']);
	
	$sql1="UPDATE drivers SET d_name='{$name}',d_email='{$email}',d_contact='{$contact}' WHERE id='{$_SESSION['id']}'";
	$query1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
	echo '<script>
			alert("Updated");
		</script>';
	// header("Location: dashboard.php");
}

?>