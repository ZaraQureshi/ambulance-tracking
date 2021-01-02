const getLocation=()=> {
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

            window.onload = function(){getLocation()}
jQuery(window).on('load', getLocation);

