
<?php
include('header.php');
$id=$_GET['id'];
$uid=$_SESSION['u_id'];

echo mysqli_error($conn);
$sql="SELECT id,d_name,d_contact,d_latitude,d_longitude,user FROM drivers WHERE id='{$id}'";

$query=mysqli_query($conn,$sql);
echo mysqli_error($conn);
while($row=mysqli_fetch_assoc($query)){
	?>
	<div class="container">
	<div class="driver">
		<p>Name: <?php echo $row['d_name'];?></p>
		<p>Contact: <?php echo $row['d_contact'];?></p>
		<iframe id="location" width="70%" height="300" src="https://maps.google.com/maps?q=<?php echo $row['d_latitude'];?>,<?php echo $row['d_longitude'];?>&output=embed"></iframe>
	</div>
<?php $d_id=$row['id'];
	$user=$row['user'];

}?>
<body onload="getLocation();">
	
	
		
			
			<a href="nearest_hosp.php?lat=<?php echo $_SESSION['lat'];?>&long=<?php echo $_SESSION['long'];?>"name="mapSubmit" type="submit" class="driver_info_btn">View nearest hospitals</a> 
			
		
		<?php $color="#000000";
                        
                        if ($user==$_SESSION['u_id']){
                            $color = "#32CD32";
                        	$value="Hired";
                        }else{
                            $color = "#6C63FF";
                        	$value="Hire";}?>
		<a href="hire.php?id=<?php echo $d_id; ?>" name="hire" style="padding:7px 20px;background:<?php echo $color ?>;width:100%;color:white;text-align:center;border-radius:60px" ><?php echo $value;?></a></div>
	<script src="script.js"></script>
</body>