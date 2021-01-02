<?php 

include('header.php');
$sql="SELECT * FROM success WHERE d_id='{$_SESSION['id']}'";
$query=mysqli_query($conn,$sql) or die(mysqli_error($conn));
?>
<div class="row">
<div class="col-lg-2">
	<?php include('sidebar.php');?>
</div>
<div class="col-md-10">
	<div class="container ">
		<table class="table table-striped ml-5">
		  <thead>
		    <tr>
		      <th scope="col">Date</th>
		      <th scope="col">Expense</th>
		      <th scope="col">Distance</th>
		      
		    </tr>
		  </thead>
		  <tbody>
		  	<?php while($row=mysqli_fetch_assoc($query)){?>
		    <tr>
		      <th scope="row"><?php echo $row['date'];?></th>
		      <td><?php echo $row['money'];?></td>
		      <td><?php echo $row['distance'];}?></td>
		      
		    </tr>
		    
		  </tbody>
		</table>
		<button class="btn btn-primary"><a href="dashboard.php" style="color:white;">Back</a></button>
	</div>
</div>
</div>