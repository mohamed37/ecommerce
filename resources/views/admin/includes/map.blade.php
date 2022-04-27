 <div id="map">
  </div>
  <div id="info"></div>
 <div class="row">

    <div class="col-sm-6">
        <div class="form-group">
            <label asp-for="PROJ_LONGITUDE" class="control-label" style="text-size-adjust:auto ;color:blue ; font-weight: bold ">
                خط الطول
            </label>

            <input asp-for="PROJ_LONGITUDE" class="form-control" />
            <span asp-validation-for="PROJ_LONGITUDE" class="text-danger"></span>


        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label asp-for="PROJ_LATITUDE" class="control-label" style="text-size-adjust:auto ;color:blue ; font-weight: bold ">
                خط العرض
            </label>

            <input asp-for="PROJ_LATITUDE" class="form-control" />
            <span asp-validation-for="PROJ_LATITUDE" class="text-danger"></span>


        </div>
    </div>

</div>

<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.51.0/mapbox-gl.css' rel='stylesheet' />
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.51.0/mapbox-gl.js'></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body { margin:0; padding:0; }
        #map {
      height:100rem;
      min-height: 100%;
      min-width: 100%;
      display: block; }
      .fill
  {
      min-height: 100%;
      height: 100%;
      width: 100%;
      min-width: 100%;
  }
     </style>
    <!-- CSS Files -->
    <script>

        var lastUpdate = Date.now();
          var dt = 0;
          //var bounds = [
          //    [31.552008814669875, 29.916600413028007], // Southwest coordinates 31.552008814669875, 29.916600413028007
          //    [31.93576692033264, 30.169058054215455] // Northeast coordinates   32.14683966743894, 30.34308951682219
          //];
          mapboxgl.accessToken = 'pk.eyJ1IjoibW9oYW1lZGVsbWVsZWVoIiwiYSI6ImNreXd2dDh6dTBjbGEybm14NTlhajl5YW4ifQ.x1h23fSGMyTjxvKpuC791w';
          mapboxgl.setRTLTextPlugin(
              'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js',
              null,
              true // Lazy load the plugin
          );
          var map = new mapboxgl.Map({
              container: 'map',
              style: {
                  version: 8,
                  sources: {
                      osm: {
                          type: 'raster',
                          tiles: ["https://tile.openstreetmap.org/{z}/{x}/{y}.png"],
                          tileSize: 256,
                          attribution: 'Map tiles by <a target="_top" rel="noopener" href="https://tile.openstreetmap.org/">OpenStreetMap tile servers</a>, under the <a target="_top" rel="noopener" href="https://operations.osmfoundation.org/policies/tiles/">tile usage policy</a>. Data by <a target="_top" rel="noopener" href="http://openstreetmap.org">OpenStreetMap</a>'
                      }
                  },
                  layers: [{
                      id: 'osm',
                      type: 'raster',
                      source: 'osm',
                  }],
              },
              center: [31.233334, 30.033333],
              zoom:6,
              ////maxBounds: bounds,
              //pitch:20,
              attributionControl: true,
              logoView: false,
              hash: true
          });
      
      
      
          //fly
      
      
          function Flying(lng, lat, zoom) {
      
              map.flyTo({
                  center: [lng, lat],
                  zoom: zoom,
                  essential: true // this animation is considered essential with respect to prefers-reduced-motion
              });
          }
      
          // Add the control to the map.
          map.addControl(
              new MapboxGeocoder({
                  accessToken: mapboxgl.accessToken,
                  mapboxgl: mapboxgl
              })
          );
      
          var hoveredStateId = null;
          //var rotate =true;
          //function rotateCamera(timestamp,angle) {
          //	if (rotate) {
          //// clamp the rotation between 0 -360 degrees
          //// Divide timestamp by 100 to slow rotation to ~10 degrees / sec
          //map.rotateTo((timestamp / 100) % 360, { duration: 0 });
          //// Request the next frame of the animation.
          //requestAnimationFrame(rotateCamera);
          //}
          //}
      
          map.on('load', function () {
              //rotateCamera(1);
      
      
              map.on('click', function (e) {
                  //document.getElementById('info').innerHTML =
                  //    // e.point is the x, y coordinates of the mousemove event relative
                  //    // to the top-left corner of the map
      
                  //    // e.lngLat is the longitude, latitude geographical position of the event
                  //    JSON.stringify(e.lngLat.wrap());
      
         
                  var data = e.lngLat.wrap();
      
               $("#PROJ_LONGITUDE").val(data.lng);
                  $("#PROJ_LATITUDE").val(data.lat);
              });
      
      
              map.setLayoutProperty('country-label', 'text-field', [
                  'get',
                  `name_${arabic}`
              ]);
    
          });
    
      
    </script>