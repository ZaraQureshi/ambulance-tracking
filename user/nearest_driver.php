<?php
include('header.php');
$v1=doubleval($_SESSION['lat']);
$v2=doubleval($_SESSION['long']);
// echo $v1."<br></br>";
// echo $v2;
// echo $_SESSION['u_id'];
$sql="SELECT status,id,d_name,(1.60934 *( 3959 * acos((cos(radians($v1)) ) * (cos(radians(d_latitude))) * (cos(radians(d_longitude) - radians($v2)) )+ ((sin(radians($v1))) * (sin(radians(d_latitude)))) ) )) AS distance FROM drivers HAVING distance < 20 ORDER BY distance LIMIT 0,10";


$result=mysqli_query($conn,$sql);
echo mysqli_error($conn);?>
<body onload="getLocation();">
	
	<div class="driver_table">
		<table style="width:100%;text-align: center;">
		<br>
			<tr style="height:15px;">
				
				
				<th>Name</th>
				
				<th>Distance</th>  
				<th>Get </th>
				
			</tr>
			<?php
				if(mysqli_num_rows($result)>0){
				while($row=mysqli_fetch_assoc($result)){
					if($row['status'] == 0 ){
			?>
			<tr style="height:15px;">
				
				<td ><?php echo $row['d_name'];?></td>
				
				<td ><?php echo $row['distance'].'km';?></td>
				
				<td><a href="get_driver.php?id=<?php echo $row['id'];?>" >GET</a></td>
				
			</tr>
			<?php
				}}}

			?>
		</table>

	</div>
	<?php
	
	// echo $_SESSION['u_id'];
	// echo $_SESSION['u_contact'];
	if(!isset($_SESSION['u_contact'])){
		if(isset($_POST['contactSub'])){
		$contact=mysqli_real_escape_string($conn,$_POST['contact']);
		$sql_con="UPDATE user SET u_contact='{$contact}' WHERE u_id='{$_SESSION['u_id']}' ";
		$con_query=mysqli_query($conn,$sql_con) or die("Unsuccessfull");
		$_SESSION['u_contact']=$contact;
		echo' '.mysqli_error($conn);}?>
		<form method="POST">
			<input type="text" name="contact" placeholder="Contact">
			<input type="submit" name="contactSub">
		</form>
	<?php }?>
</body>


