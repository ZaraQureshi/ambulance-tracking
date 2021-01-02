<head><?php include('config.php');?></head>
<?php
 
$sql="SELECT user.u_id,driver.d_id,driver.status,driver.user,user.u_name FROM driver LEFT JOIN user ON driver.user=user.u_id WHERE d_id='{$_SESSION['d_id']}'";

$query=mysqli_query($conn,$sql);

?>
        <div class="driver_table_info">
            <table style="width:100%;">
            <?php
            if(mysqli_num_rows($query)>0){
                while($row=mysqli_fetch_assoc($query)){
                    if($_SESSION['d_id']==$row['d_id']){
                        if($row['status']==1){ 

                        
                        ?>
                    TIMELINE of service
                <tr>
                  <?php $color="#000000";
                        $var=$row['status'];
                        if ($var==1)
                            $color = "#32CD32";
                        else
                            $color = "#6C63FF";?>
                    <td style="background:<?php echo $color ?>;width:100px;text-align:center;border-radius:60px">Pending</td>
                    <td><a href="get_user.php?id=<?php echo $row['u_id']; ?>"><?php echo $row['u_name'];?></a></td>
                   
                    
                    
                </tr>
                <?php
                    }}}
                }
                ?>
            </table>
            <?php
            
            if($_SESSION['d_id']==1){?>
            <h2>Current</h2>
            <?php } ?>

        </div>
        