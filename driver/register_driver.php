<?php
// $ch=curl_init();
// curl_setopt($ch,CURLOPT_URL, 'http://ip-api.com/json/');
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// $loc=curl_exec($ch);
// $loc=json_decode($loc);

// if($loc->status=='success'){
// 	$lat=$loc->lat;
// 	$long=$loc->lon;
// }

// function get_lat_lng( $address ) {
// 	$address = rawurlencode( $address );
// 	$coord   = get_transient( 'geocode_' . $address );
// 	if( empty( $coord ) ) {
// 		$url  = 'http://nominatim.openstreetmap.org/?format=json&addressdetails=1&q=' . $address . '&format=json&limit=1';
// 		$json = wp_remote_get( $url );
// 		if ( 200 === (int) wp_remote_retrieve_response_code( $json ) ) {
// 			$body = wp_remote_retrieve_body( $json );
// 			$json = json_decode( $body, true );
// 		}

// 		$coord['lat']  = $json[0]['lat'];
// 		$coord['long'] = $json[0]['lon'];
// 		set_transient( 'geocode_' . $address, $coord, DAY_IN_SECONDS * 90 );
// 	}
// 	return $coord;

// }
include('config.php');
if(isset($_POST['regDriver'])){
	
	$lat=$long='';
	$name=mysqli_real_escape_string($conn,$_POST['name']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$contact=mysqli_real_escape_string($conn,$_POST['contact']);
	
	$password=md5($_POST['password']);
	$lat=mysqli_real_escape_string($conn,$_POST['lat']);
	$long=mysqli_real_escape_string($conn,$_POST['long']);
	// $address = $dlocation; // Google HQ
    // $geocode=file_get_contents('http://nominatim.openstreetmap.org/?format=json&addressdetails=1&q=' . $address . '&format=json&limit=2');
	// $geo= json_decode($geocode, true);
	// if (isset($geo['status']) && ($geo['status'] == 'OK')) {
	// 	$lat =$geo[0]['lat']; // Latitude
	// 	$long = $geo[0]['lon'];// Longitude
	//   }
    
	$sql="SELECT d_email FROM drivers WHERE d_email='{$email}'";
	$result=mysqli_query($conn,$sql) or die("Unsuccessfull");
	if(mysqli_num_rows($result)>0){
		echo '<div class="alert alert-danger mt-5 mx-5" role="alert">
	  				Email exists
			</div>';
	}else{

	$sql1="INSERT INTO drivers (d_name,d_email,d_contact,d_password,d_latitude,d_longitude) VALUES('{$name}','{$email}','{$contact}','{$password}','{$lat}','{$long}')";
	$result1=mysqli_query($conn,$sql1) or die('<div class="alert alert-danger mt-5 mx-5" role="alert">
	  				Invalid credentials
			</div>');
	header("Location: login_driver.php");
	}


}
?>
<head></head>
<div class="register">
	
	<h1>Register Driver</h1>
	<form method="POST" action="register_driver.php">
		<input type="text" placeholder="Name" name="name" required><br><br>
		<input type="email" placeholder="Email" name="email" required><br><br>
		<input type="text" placeholder="Contact" name="contact" required><br><br>
		<input type="text" placeholder="Latitude" name="lat" required><br><br>
		<input type="text" placeholder="Longitude" name="long" required><br><br>
		
		<input type="password" placeholder="Password" name="password" required><br><br>
		<button type="submit" name="regDriver">Register</button>
	</form>

</div>


