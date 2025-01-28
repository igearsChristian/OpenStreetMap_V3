<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Map</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="leaflet-routing-machine-3.2.12\leaflet-routing-machine-3.2.12\dist\leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="leaflet-routing-machine-3.2.12\leaflet-routing-machine-3.2.12\dist\leaflet-routing-machine.js"></script>
    
    <style>
      :root {
          --map-top: 8%;
          --control_panel-width: 350px;
          --control_panel-height: 100vh;
      }

      #map {
        height: var(--control_panel-height); 
        width: 100%;
        margin: 0;
        padding: 0;
        position: fixed;
        top: var(--map-top); 
      }
      .info-panel {
        position: fixed;
        top: 0;
        right: -350px; 
        width: 300px;
        height: 100%;
        background: rgba(255, 255, 255, 0.9);
        border-left: 1px solid #ccc;
        box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5);
        transition: right 0.3s ease; /* Sliding effect */
        padding: 20px;
      }
      .info-panel.active {
        right: 0; /* Slide in */
      }
      .info-image {
        width: 100%; /* Responsive width */
        height: auto; /* Maintain aspect ratio */
        margin-bottom: 10px; /* Spacing below the image */
      }
      .control-panel {
          position: fixed;  /* Keep it fixed on the left side */
          top: var(--map-top);         /* Align to the top */
          left: 0;         /* Align to the left */
          height: var(--control_panel-height);  /* Full height of the viewport */
          width: var(--control_panel-width);   /* Set a width for the control panel */
          padding: 20px;
          background-color: #fff;
          box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
          transition: left 0.3s ease; /* Sliding effect */
      }
      .control-panel.active {
        left: calc(-0.98 * var(--control_panel-width)); 
      }
      .toggle-button {
          position: absolute; /* Position relative to the control panel */
          top: calc(var(--control_panel-height) * 0.3 + var(--map-top)); 
          right: -30px; /* Position outside the panel */
          background-color: #c00; /* Example button color */
          color: white;
          border: none;
          border-radius: 5px;
          padding: 100px 10px;
          cursor: pointer;
          transition: right 0.3s ease; /* Smooth transition */
      }
      .leaflet-control-layers {
          display: none; /* Hides the control */
      }
    </style>
</head>
<?php 
    include("header.php");
    include("DB.php");
?>

<body>

    <div id="map"></div>
    <div class="leaflet-control info-panel" id="infoPanel">
      <h3>Marker Information</h3>
      <img id="infoImage" class="info-image" src="" alt="Marker Image" />
      <p id="infoText">Click on a marker to see details.</p>
    </div>

    <div class="leaflet-control control-panel" id="controlPanel">
        <h2>User View Panel</h2> </br>
        <button id="toggleButton" class="toggle-button">→</button>

        <h3>Select a Map:</h3>
        <form id="mapSelector">
            <div>
                <input
                    type="radio"
                    id="streetMap"
                    name="options"
                    value="street"
                    checked
                />
                <label for="streetMap">Street Map</label>
            </div>
            <div>
                <input
                    type="radio"
                    id="satelliteMap"
                    name="options"
                    value="satellite"
                />
                <label for="satelliteMap">Satellite Map</label>
            </div>
        </form>

        </br><h3>Select Marker Group:</h3>
        <h4>Industry</h4>
        <form id="markerSelector">
            <div>
                <div>
                    <input type="checkbox" id="toggleIT" checked />
                    <label for="toggleIT">Show IT companies</label>
                </div>
                <div>
                    <input type="checkbox" id="toggleCommerical" checked />
                    <label for="toggleCommerical">Show Commercial buildings</label>
                </div>
                <div>
                    <input type="checkbox" id="toggleArt" checked />
                    <label for="toggleArt">Show Artworks</label>
                </div>
            </div>
        </form>


        <!-- 4th child on the control panel -->
        </br><h3>Select Distincts:</h3>
        <form id="districtSelector">
            <div>
                <div>
                    <input type="checkbox" id="toggleKowloon" checked />
                    <label for="toggleKowloon">Kowloon</label>
                </div>
                <div>
                    <input type="checkbox" id="toggleNT" checked />
                    <label for="toggleNT">New Territories</label>
                </div>
                <div>
                    <input type="checkbox" id="toggleHKI" checked />
                    <label for="toggleHKI">Hong Kong Island</label>
                </div>
            </div>
        </form>
        
        </br>
        </br>

    <script src="logic.js"></script>
    <script src="icon.js"></script>
    <script>
        var map = L.map('map', {
        center: [22.31380306893066, 114.1755544938077],
        zoom: 13,
        zoomControl: false
        })

        var streetLayer = L.tileLayer(
        "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
        {
            maxZoom: 19,
            attribution: "© OpenStreetMap contributors",
        }
        );

        var satelliteLayer = L.tileLayer(
        "https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png",
        {
            maxZoom: 17,
            attribution: "© OpenTopoMap contributors",
        }
        );

        streetLayer.addTo(map);

        var baseLayers = {
        "Street Map": streetLayer,
        "Satellite Map": satelliteLayer,
        };

        //marker groups
        
        // location_district
        var IT_group = L.layerGroup().addTo(map);
        var Commerical_group = L.layerGroup().addTo(map);
        var Art_group = L.layerGroup().addTo(map);

        var IT_K = L.layerGroup().addTo(map);
        var IT_NT = L.layerGroup().addTo(map);
        var IT_H = L.layerGroup().addTo(map);

        var Com_K = L.layerGroup().addTo(map);
        var Com_NT = L.layerGroup().addTo(map);
        var Com_H = L.layerGroup().addTo(map);

        var Art_K = L.layerGroup().addTo(map);
        var Art_NT = L.layerGroup().addTo(map);
        var Art_H = L.layerGroup().addTo(map);

        // district_location
        var Kowloon_group = L.layerGroup().addTo(map);
        var NT_group = L.layerGroup().addTo(map);
        var HKI_group = L.layerGroup().addTo(map);

        var K_IT = L.layerGroup().addTo(map);
        var K_Com = L.layerGroup().addTo(map);
        var K_Art = L.layerGroup().addTo(map);

        var NT_IT = L.layerGroup().addTo(map);
        var NT_Com = L.layerGroup().addTo(map);
        var NT_Art = L.layerGroup().addTo(map);

        var H_IT = L.layerGroup().addTo(map);
        var H_Com = L.layerGroup().addTo(map);
        var H_Art = L.layerGroup().addTo(map);




        var overlays = {
        "IT Companies": IT_group,
        Commercial: Commerical_group,
        Art: Art_group,
        };

        L.control.layers(baseLayers, overlays).addTo(map);

    </script>
    
    <?php
        include("display.php");
    ?>


    <!-- routing -->
    <script>
        var route_exist = false;
        var control;
        var prev_loc_group = L.layerGroup();

        var start_dest = [22.29460786024226, 114.17209740582692];   //HK Museum of Art
        var middle_dest = [22.29713708287615, 114.17398255163656];  //K11 Artmall
        var middle_dest2 = [22.30084275382905, 114.17785026394402];    //HK Science Museum
        var final_dest = [22.301657689684326, 114.15612488012529];

        var final_dest_display = [final_dest[0], final_dest[1] - 0.0003];
        
        
        
        var way_points = [
            L.latLng(start_dest),
            L.latLng(middle_dest), L.latLng(middle_dest2),
            L.latLng(final_dest)
        ];
        
        var end_marker = L.marker(final_dest_display, { icon: artIcon }).addTo(Art_K).bindPopup("<h6>Van Gogh's painting</h6> <img src=img/artwork.jpg style=\"max-width: 80%; height: auto;\">");
        var end_marker2 = L.marker(final_dest_display, { icon: artIcon }).addTo(K_Art).bindPopup("<h6>Van Gogh's painting</h6> <img src=img/artwork.jpg style=\"max-width: 80%; height: auto;\">");
        end_marker.on('click', function ()  {
            if (!route_exist) {
                control = L.Routing.control({
                waypoints: way_points,
                customText: "VG"
                    
            }).addTo(map);
            map.addLayer(prev_loc_group);
            end_marker.openPopup();
            route_exist = true;
            }
            else {
                //remove the route 
                map.removeControl(control);
                map.removeLayer(prev_loc_group);
                route_exist = false;
                end_marker.closePopup();
            }
            });
        end_marker.addTo(map);
        var dest_marker = L.marker(final_dest, { icon: flagIcon }).addTo(prev_loc_group).bindPopup("<h6>current location: Hong Kong Palace Museum</h6> <img src=img/HKPM.jpg style=\"max-width: 120px; height: auto;\">");

        var marker2 = L.marker(start_dest, { icon: flagIcon }).addTo(prev_loc_group).bindPopup("<h6>start: HK Museum of Art</h6> <img src=img/HKMA.jpg style=\"max-width: 120px; height: auto;\">");
        var marker3 = L.marker(middle_dest, { icon: flagIcon }).addTo(prev_loc_group).bindPopup("<h6>via K11 Artmall</h6> <img src=img/K11.png style=\"max-width: 120px; height: auto;\">");
        var marker4 = L.marker(middle_dest2, { icon: flagIcon }).addTo(prev_loc_group).bindPopup("<h6>via HK Science Museum</h6> <img src=img/HKSM.jpg style=\"max-width: 120px; height: auto;\">");

        map.on('click', function() {
        dest_marker.closePopup();
        marker2.closePopup();
        marker3.closePopup();
        marker4.closePopup();
        });

     </script>
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>



