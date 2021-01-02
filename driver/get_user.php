<?php

include('header.php');
$id=$_GET['id'];

// $sql1="SELECT u_lat,u_long FROM booking WHERE b_uid='{$id}' ";
// $query1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));

// while($row=mysqli_fetch_assoc($query1)){
//     $v1=$row['u_lat'];
//     $v2=$row['u_long'];
// }
// echo $v1;
// $lat=$_SESSION['d_latitude'];
// $long=$_SESSION['d_longitude'];
// echo $_SESSION['d_latitude'];
// $sql="SELECT b_uid,u_contact,u_name,date,distance,(1.60934 *( 3959 * acos((cos(radians($v1)) ) * (cos(radians('{$lat}'))) * (cos(radians('{$long}') - radians($v2)) )+ ((sin(radians($v1))) * (sin(radians('{$lat}')))) ) )) AS distance FROM booking WHERE b_uid='{$id}' HAVING distance < 10 ORDER BY distance LIMIT 0,1 ";
$sql="SELECT b_uid,u_contact,u_name,u_lat,u_long,h_lat,h_long,date FROM booking WHERE b_uid='{$id}'";
// $sql="SELECT address,status,d_id,d_name,(1.60934 *( 3959 * acos((cos(radians($v1)) ) * (cos(radians(d_latitude))) * (cos(radians(d_longitude) - radians($v2)) )+ ((sin(radians($v1))) * (sin(radians(d_latitude)))) ) )) AS distance FROM driver HAVING distance < 10 ORDER BY distance LIMIT 0,10";

$query=mysqli_query($conn,$sql) or die(mysqli_error($conn));

if(mysqli_num_rows($query)>0){
    while($row=mysqli_fetch_assoc($query)){
        ?>
        <div class="row">
          <div class="col-md-2">
            <?php include('sidebar.php');?>
          </div>
          <div class="col-md-10">
            <div class="wrapper d-flex">
              <div class="content">
                <div class="user_info">
                    
                    <p><?php echo'User name: '. $row['u_name'];?></p>
                    <p><?php echo'User contact: '. $row['u_contact'];?></p>
                    
                    
                    <iframe id="location" width="70%" height="300" src="https://maps.google.com/maps?q=<?php echo $row['u_lat'];?>,<?php echo $row['u_long'];?>&output=embed"></iframe>
                    <br><br>
                    <form method="POST">
                      <button class="btn btn-danger"><a style="color:white;"href="end_journey.php" name="endBtn" >End journey</a></button>
                    <!-- <button type="submit" name="sendSMS">Send SMS</button> -->
                    </form>
                </div>
                
              </div>

            </div>
          </div>
        </div>

        <?php

        $con=$row['u_contact'];
        $user=$row['u_name'];
        $_SESSION['date']=$row['date'];
        getDistanceBetweenPointsNew($row['u_lat'],$row['u_long'],$row['h_lat'],$row['h_long']);
        
    }
}
// if(isset($_POST['sendSMS'])){
//     $mobile='91'.$con;
//     $message='Hi '.$user.', your ambulance is at the location '.$addr;
//     // Account details
// 	$apiKey = urlencode('l+oZF00BDNU-yX1joH0GIlLoCmLqin8LlxRgQkmHe1');
	
// 	// Message details
// 	$numbers = array($mobile);
// 	$sender = urlencode('TXTLCL');
// 	$message = rawurlencode($message);
 
// 	$numbers = implode(',', $numbers);
 
// 	// Prepare data for POST request
// 	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
// 	// Send the POST request with cURL
// 	$ch = curl_init('https://api.textlocal.in/send/');
// 	curl_setopt($ch, CURLOPT_POST, true);
// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 	$response = curl_exec($ch);
// 	curl_close($ch);
	
// 	// Process your response here
// 	echo $response;
// }

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
$sql1="UPDATE user SET expense='{$_SESSION['money']}' WHERE u_id='{$id}'";
?>