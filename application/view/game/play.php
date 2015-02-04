<!DOCTYPE html>
<html>
  <head>
      <style type="text/css">
          #map_canvas {height:600px;width:800px;margin-bottom:20px;}
      </style>
      <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

      <script type="text/javascript">
          var map;
          var markersArray = [];

          function initMap()
          {
              var latlng = new google.maps.LatLng(52, 4.35);
              var myOptions = {
                  zoom: 7,
                  center: latlng,
                  mapTypeId: google.maps.MapTypeId.ROADMAP
              };
              map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

              // add a click event handler to the map object
              google.maps.event.addListener(map, "click", function(event)
              {
                  // place a marker
                  placeMarker(event.latLng);

                  // display the lat/lng in your form's lat/lng fields
                  document.getElementById("latFld").value = event.latLng.lat();
                  document.getElementById("lngFld").value = event.latLng.lng();
              });
          }
          function placeMarker(location) {
              // first remove all markers if there are any
              deleteOverlays();

              var marker = new google.maps.Marker({
                  position: location, 
                  map: map
              });

              // add marker in markers array
              markersArray.push(marker);

              //map.setCenter(location);
          }

          // Deletes all markers in the array by removing references to them
          function deleteOverlays() {
              if (markersArray) {
                  for (i in markersArray) {
                      markersArray[i].setMap(null);
                  }
              markersArray.length = 0;
              }
          }
      </script>
  </head>

  <body onload="initMap()">
    <div class="container">
      <?php foreach ($this->game as $game) {
        if (isset($game->name)) $name = $game->name;
          echo '<img src="'. URL . 'public/img/'. $name .'" alt="Foto" height="300px" width="300px" class="game">';
      }
      ?>
      <div id="map_canvas"></div>
        <?php
          echo '<form action="' . URL . 'game/score">';
        ?>
          <input type="hidden" id="latFld" name="latFld">
          <input type="hidden" id="lngFld" name="lngFld">
          <?php
            echo '<input type="hidden" name="id" value="' . $_GET['id'] . '">';
          ?>
          <input type="submit" value="SUBMIT MARKER" class="login-submit-button">
      </form>
  </div>
</body>
</html>