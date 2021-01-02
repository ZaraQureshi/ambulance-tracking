<?php
include('gconfig.php');
if(isset($_GET['access_token'])){
    $google_client=setAccessToken($_SESSION['access_token']);
}
else if(isset($_GET['code'])){
    $token=$google_client->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token']=$token;
}else{
    header("Location: login.php");
}

$oAuth=new Google_Service_Oauth2($google_client);
$userData=$oAuth->userinfo_v2_me->get();
include('config.php');

echo '<pre>';
var_dump($userData);
$name=$userData['name'];
$email=$userData['email'];
$id=$userData['id'];
$sql="INSERT INTO user(google_id,u_name,u_email) VALUES ('{$id}','{$name}','{$email}');";
$sql.="SELECT u_id FROM user WHERE google_id='{$id}'";
$query=mysqli_multi_query($conn,$sql) or die('Unsuccessfull');
while($row=mysqli_fetch_assoc($query)){
	$u_id=$row['u_id'];
}
$_SESSION['u_name']=$name;
$_SESSION['u_email']=$email;
$_SESSION['u_id']=$u_id;
echo $_SESSION['u_id'];
echo $userData['id'];
// header("Location: http://localhost:8080/project/php/user/user_index.php");
?>