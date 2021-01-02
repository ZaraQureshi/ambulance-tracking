<?php
include('header.php');
$id=$_GET['id'];
$lat=doubleval($_SESSION['lat']);
$long=doubleval($_SESSION['long']);
$sql="INSERT INTO booking (b_uid,b_did,u_lat,u_long,u_contact,u_name) VALUES ('{$_SESSION['u_id']}','{$id}','{$lat}','{$long}','{$_SESSION['u_contact']}','{$_SESSION['u_name']}');";
$sql.="UPDATE `drivers` SET `status` = '1', `user` = '{$_SESSION['u_id']}' WHERE `drivers`.`id` = '{$id}' ";

$result=mysqli_multi_query($conn,$sql) or die(mysqli_error($conn));

if($result){
	echo "dome";
}else{
	echo"no";
}
echo ' '.mysqli_error($conn);
header("Location: get_driver.php?id=$id");
?>