<?php
include('header.php');
?>
<link rel="stylesheet" href="style.css">
<div class="row">
    <div class="col-md-2">
		<?php include('sidebar.php');?>
    </div>
    <div class="col-md-10">
        <div class="row no-gutters" style="width:100%">
			<div class="col-md-12">
				<div class="card text-white bg-primary " style="width: 100%;">
					<div class="card-body">
                        <?php
                        $sql3="SELECT d_name,d_contact,d_email FROM drivers WHERE id='{$_SESSION['id']}'";
                        $res=mysqli_query($conn,$sql3);
                        while($row=mysqli_fetch_assoc($res)){
                        ?>
						<p class="card-text"><p>Welcome, <?php echo $row['d_name'];?></p>
						<p>Contact:<?php echo $row['d_contact'];?></p>
						<p>Email:<?php echo $row['d_email'];?></p>
                        <?php }?>
			        </div>
				</div>
			</div>
        </div>
        <div class="row ">
			
            <div class="col-sm-4 ">
                <div class="card  my-3" style="width:100%">
                <div class="card-header text-white bg-success">Assigned</div>
                <div class="card-body">
                    <?php 
                    $sql="SELECT user.u_id,drivers.id,drivers.d_name,drivers.status,drivers.user,user.u_name FROM drivers LEFT JOIN user ON drivers.user=user.u_id WHERE id='{$_SESSION['id']}'";
                    $query=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($query)>0){
                    while($row=mysqli_fetch_assoc($query)){
                        if($_SESSION['id']==$row['id']){
                            ?>
                            <td><a href="get_user.php?id=<?php echo $row['u_id']; ?>"><?php echo $row['u_name'];?></a></td>
                        
                            
                            
                        </tr>
                        <?php
                        $_SESSION['u_id']=$row['u_id']; }}}
                        
                        ?>

                
                    
                </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card  my-3" style="width:100%;">
                <div class="card-header bg-warning">Completed</div>
                <div class="card-body">
                    <?php
                    $sql1="SELECT money,distance,date,d_id FROM success WHERE d_id='{$_SESSION['id']}'";
                    $query1=mysqli_query($conn,$sql1);
                    if(mysqli_num_rows($query1)>0){
                        while($row=mysqli_fetch_assoc($query1)){
                            echo '<p style="text-align:center;"><a href="completed.php">'.$row['date'].'</a></p>';
                        }
                    }?>
                </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card  my-3" style="width:100%;">
                <div class="card-header bg-info">Profile</div>
                <div class="card-body">
                    <?php
                    $sql2="SELECT d_name from drivers where id='{$_SESSION['id']}'";
                    $query2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
                    while($row1=mysqli_fetch_assoc($query2)){
                    ?>
                    <a href="profile.php"><?php echo $row1['d_name'];}?> <i class="fa fa-pencil" aria-hidden="true"></i></a>
                </div>
                </div>
            </div>
        </div>
    </div>

    
</div>