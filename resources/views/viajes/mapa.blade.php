
<!DOCTYPE html>
<html>
    <head>
        <title>MAPS</title>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
              <script async defer
           src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0ohvgkNO-FoDiwSVnhg0_VYZGDxF6IGc&callback=initMap">
        </script>
      <script>

function initMap() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                    

          // Display a map on the web page
            map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
            map.setTilt(50);
            
            
    // Multiple markers location, latitude, and longitude
        var markers = [
            <?php 
                foreach($viajes as $viaje){
                    echo '["'.$viaje->tiempo.'", '.$viaje->latitud.', '.$viaje->longitud.'],';
                }
            
            ?>
        ];
                            
        // Info window content
        var infoWindowContent = [
            <?php 
                foreach($viajes as $viaje){ ?>
                    ['<div class="info_content">' +
                    '<h3><?php echo $viaje->tiempo; ?></h3>' +
                    '<h3>Medio </h3>   <p><?php echo $viaje->medio; ?></p>'+
                    '<h3>Propósito </h3> <p><?php echo $viaje->proposito; ?></p></div>'],
            <?php 
                    
                }
            
            ?>
        ];     
        
            
    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Place each marker on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });
        
        // Add info window to marker    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Center the map to fit all markers on the screen
        map.fitBounds(bounds);
    }

    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(14);
        google.maps.event.removeListener(boundsListener);
    });
    
}

    // Load initialize function
    google.maps.event.addDomListener(window, 'load', initMap);
                
      </script>
        
      
      <style type="text/css">
                  #mapCanvas {
                width: 100%;
                height: 650px;
            }
      </style>
      
      
      </head>
      
   <body>
       <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link active" href="http://18.191.148.84:8000/viajes">Estudio de </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://18.191.148.84:8000/viajes">Movilidad Urbana</a>
          </li>
        </ul>
       
       <h4>Participante con imei <?php echo   $viajes[0]->imei;?>  </h4>
       <h5>Identificador del viaje <?php echo  $viajes[0]->llave_viaje;?>  </h5>
       
      
       
        <div id="mapContainer">
          <div id="mapCanvas"></div>
        </div>
    </body>

    
</html>
