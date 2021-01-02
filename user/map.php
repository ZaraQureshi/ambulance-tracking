<html>
    <body onload="getLocation()">
        <script>
            function getLocation() {
              if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
              // } else {
              //   x.innerHTML = "Geolocation is not supported by this browser.";
              // }
            }
         }
            function showPosition(position) {
                document.getElementById("lats").value+=position.coords.latitude;
                document.getElementById("longs").value+=position.coords.longitude;
              
            }
        </script>
        <?php session_start();?>
        <a href="logout.php">Hello<?php if (isset($_SESSION['u_name'])){ echo $_SESSION['u_name'];} echo 'Logout';?></a>
        <?php
        include('config.php');
        
        ?>
        <form action="map.php" method="POST">
            <input type="text" name="lats" id="lats">
            <input type="text" name="longs" id="longs">
            <button class="button" type="submit" name="mapSubmit" id="mapSubmit">Find nearest ambulance</button>
        </form>
        <?php
        if(isset($_POST['mapSubmit'])){
            $lat=$_POST['lats'];
            $long=$_POST['longs'];
            header("Location: nearest_driver.php?lat=$lat&long=$long");
        }
        ?>
    </body>
</html>