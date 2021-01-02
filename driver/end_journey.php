<?php

include('config.php');
$sql="UPDATE drivers SET status=0,user=0 WHERE id='{$_SESSION['id']}';";
$sql.="DELETE FROM booking WHERE b_did='{$_SESSION['id']}';";
$sql.="INSERT INTO success (money,distance,date,d_id) VALUES ('{$_SESSION['money']}','{$_SESSION['distance']}','{$_SESSION['date']}','{$_SESSION['id']}')";
echo $_SESSION['id'];
$query=mysqli_multi_query($conn,$sql);
echo mysqli_error($conn);
header("Location: dashboard.php");

?>