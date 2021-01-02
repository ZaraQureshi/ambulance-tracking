<body onload="map();">
<?php
include('header.php');

$sql="SELECT booking.b_uid,booking.u_lat,booking.u_long,booking.h_lat,booking.h_long,booking.date,drivers.id,drivers.d_name,drivers.d_contact,drivers.d_latitude,drivers.d_longitude,booking.h_name FROM booking LEFT JOIN drivers ON booking.b_did=drivers.id WHERE b_uid='{$_SESSION['u_id']}'";
$query=mysqli_query($conn,$sql) or die(mysqli_error($conn));

if(mysqli_num_rows($query)>0){
    while($row=mysqli_fetch_assoc($query)){?>
    	<div class="container">
    		<p>Driver name:<?php echo $row['d_name'];?></p>
    		<p>Driver contact:<?php echo $row['d_contact'];?></p>
    		<p>Hospital name:<?php echo $row['h_name'];?></p>


        
       
        
        <?php
        getDistanceBetweenPointsNew($row['u_lat'],$row['u_long'],$row['h_lat'],$row['h_long']);
        ?>
        <div class="maps" style="padding:5px 30px;">
	        <button class="driver_map_btn">Show ambulance </button>
	        <button class="hosp_map_btn"> Show hospital</button>
	    </div>
	    <div class="map">
		    <div class="driver_map">
		    	<h2>Ambulance</h2>
		    	<iframe id="location" width="70%" height="300" src="https://maps.google.com/maps?q=<?php echo $row['d_latitude'];?>,<?php echo $row['d_longitude'];?>&output=embed"></iframe>
			</div>
			<div class="hosp_map">
				<h2>Hospital</h2>
		    	<iframe id="location" width="70%" height="300" src="https://maps.google.com/maps?q=<?php echo $row['h_lat'];?>,<?php echo $row['h_long'];?>&output=embed"></iframe>
		    </div>
		</div>
        <?php
	}
}
function getDistanceBetweenPointsNew($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'kilometers') {
		  $theta = $longitude1 - $longitude2; 
		  $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta))); 
		  $distance = acos($distance); 
		  $distance = rad2deg($distance); 
		  $distance = $distance * 60 * 1.1515; 
		  switch($unit) { 
		    case 'miles': 
		      break; 
		    case 'kilometers' : 
		      $distance = $distance * 1.609344; 
		      
		  } 
		   
		  $_SESSION['distance']=round($distance,2);
		  $money=round($distance,2)*10;
		  echo'<p>Distance:'. $_SESSION['distance'].'</p>';
		  echo'<p>Money:'.$money .'</p>';
		  $_SESSION['money']=$money;

		  return (round($distance,2)); 
		}
?>
<script src="app.js"></script>
</body>