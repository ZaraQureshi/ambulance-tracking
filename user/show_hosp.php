<?php 
if(isset($_GET['id'])){
    $id=$_GET['id'];
    include('header.php');
    $sql="SELECT h_name,h_latitude,h_longitude FROM hospitals WHERE id='{$id}'";

    $result=mysqli_query($conn,$sql);
     
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            ?>
            <div class="hosp_info" >
                <p>Name: <?php echo $row['h_name'];?></p>
                
                <iframe id="location" width="70%" height="300" src="https://maps.google.com/maps?q=<?php echo $row['h_latitude'];?>,<?php echo $row['h_longitude'];?>&output=embed"></iframe>
            </div>
        <?php 
        $lat=$row['h_latitude'];
        $long=$row['h_longitude'];
        $name=$row['h_name'];
        }
        
        $sql1="UPDATE booking SET h_lat='{$lat}' , h_long='{$long}',h_name='{$name}' WHERE b_uid='{$_SESSION['u_id']}'";
        mysqli_query($conn,$sql1) or die(mysqli_error($conn));?>
        <a href="ticket.php" class="driver_info_btn">Get details</a>
<?php
    }
}
session_abort();
?>

<link rel="stylesheet" href="style.css">