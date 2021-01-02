
<?php 
    include('header.php');
    $v1=doubleval($_SESSION['lat']);
    $v2=doubleval($_SESSION['long']);
    $sql="SELECT id,h_name,(1.60934 *( 3959 * acos((cos(radians($v1)) ) * (cos(radians(h_latitude))) * (cos(radians(h_longitude) - radians($v2)) )+ ((sin(radians($v1))) * (sin(radians(h_latitude)))) ) )) AS distance FROM hospitals HAVING distance < 10 ORDER BY distance LIMIT 0,10";
    $result=mysqli_query($conn,$sql);
    echo ''.mysqli_error($conn);
            ?>
            <body>
                <div class="hosp_table">
                    <table style="width:100%;text-align:center;">
                        <tr>
                            <th>Name</th>
                            <th>Distance</th> 
                            <th>Get </th>
				
                        </tr>
                        <?php 
                        if(mysqli_num_rows($result)>0){
                            while($row=mysqli_fetch_assoc($result)){?>
                        <tr>

                            <td><?php echo $row['h_name']; ?></td>
                            <td><?php echo $row['distance'].'km'; ?></td>
                            <td><a href="show_hosp.php?id=<?php echo $row['id'];?>">Select</a></td>
                        </tr>
                        <?php
                                }
                            }
                        ?>
                    </table>
                </div>
            </body>
            