<style>
html, body, #map-canvas {
    height: 100%;
    margin: 0px;
    padding: 0px
}
</style>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<div id="map-canvas"></div>
<!-- <script src="GeoJSON.js"></script> -->
<script>
    var editedPolygons = 
    [
        [
            {"lat" : -6.293802, "lng" : 106.703640, "url" : "link_1.com", "status" : "paid"},
            {"lat" : -6.293826, "lng" : 106.703512, "url" : "link_1.com", "status" : "paid"},
            {"lat" : -6.293899, "lng" : 106.703534, "url" : "link_1.com", "status" : "paid"},
            {"lat" : -6.293868, "lng" : 106.703658, "url" : "link_1.com", "status" : "paid"},
            {"lat" : -6.293803, "lng" : 106.703639, "url" : "link_1.com", "status" : "paid"},   
        ],
        [
            {"lat" : -6.293869, "lng" : 106.703659, "url" : "link_2.com", "status" : "paid"},
            {"lat" : -6.293901, "lng" : 106.703535, "url" : "link_2.com", "status" : "paid"},
            {"lat" : -6.293961, "lng" : 106.703549, "url" : "link_2.com", "status" : "paid"},
            {"lat" : -6.293934, "lng" : 106.703673, "url" : "link_2.com", "status" : "paid"},
            {"lat" : -6.293871, "lng" : 106.703658, "url" : "link_2.com", "status" : "paid"},   
        ],
        [
            {"lat" : -6.293936, "lng" : 106.703675, "url" : "link_3.com", "status" : "paid"},
            {"lat" : -6.293963, "lng" : 106.703551, "url" : "link_3.com", "status" : "paid"},
            {"lat" : -6.294023, "lng" : 106.703565, "url" : "link_3.com", "status" : "paid"},
            {"lat" : -6.293993, "lng" : 106.703690, "url" : "link_3.com", "status" : "paid"},
            {"lat" : -6.293939, "lng" : 106.703675, "url" : "link_3.com", "status" : "paid"}
        ],
        [
            {"lat" : -6.293996, "lng" : 106.703690, "url" : "link_4.com", "status" : "paid"},
            {"lat" : -6.294026, "lng" : 106.703565, "url" : "link_4.com", "status" : "paid"},
            {"lat" : -6.294096, "lng" : 106.703583, "url" : "link_4.com", "status" : "paid"},
            {"lat" : -6.294066, "lng" : 106.703711, "url" : "link_4.com", "status" : "paid"},
            {"lat" : -6.293997, "lng" : 106.703690, "url" : "link_4.com", "status" : "paid"}
        ],
        [
            {"lat" : -6.294068, "lng" : 106.703711, "url" : "link_4.com", "status" : "paid"},
            {"lat" : -6.294101, "lng" : 106.703585, "url" : "link_4.com", "status" : "paid"},
            {"lat" : -6.294163, "lng" : 106.703602, "url" : "link_4.com", "status" : "paid"},
            {"lat" : -6.294132, "lng" : 106.703729, "url" : "link_4.com", "status" : "paid"},
            {"lat" : -6.294070, "lng" : 106.703711, "url" : "link_4.com", "status" : "paid"}
        ],
        [
            {"lat" : -6.294135, "lng" : 106.703730, "url" : "link_5.com", "status" : "paid"},
            {"lat" : -6.294166, "lng" : 106.703603, "url" : "link_5.com", "status" : "paid"},
            {"lat" : -6.294229, "lng" : 106.703618, "url" : "link_5.com", "status" : "paid"},
            {"lat" : -6.294204, "lng" : 106.703749, "url" : "link_5.com", "status" : "paid"},
            {"lat" : -6.294135, "lng" : 106.703730, "url" : "link_5.com", "status" : "paid"}
        ],
        [
            {"lat" : -6.294208, "lng" : 106.703750, "url" : "link_6.com", "status" : "paid"},
            {"lat" : -6.294233, "lng" : 106.703618, "url" : "link_6.com", "status" : "paid"},
            {"lat" : -6.294351, "lng" : 106.703643, "url" : "link_6.com", "status" : "paid"},
            {"lat" : -6.294319, "lng" : 106.703780, "url" : "link_6.com", "status" : "paid"},
            {"lat" : -6.294209, "lng" : 106.703750, "url" : "link_6.com", "status" : "paid"}
        ],
        [
            {"lat" : -6.294355, "lng" : 106.703644, "url" : "link_7.com", "status" : "unpaid"},
            {"lat" : -6.294323, "lng" : 106.703783, "url" : "link_7.com", "status" : "unpaid"},
            {"lat" : -6.294401, "lng" : 106.703801, "url" : "link_7.com", "status" : "unpaid"},
            {"lat" : -6.294436, "lng" : 106.703662, "url" : "link_7.com", "status" : "unpaid"},
            {"lat" : -6.294357, "lng" : 106.703644, "url" : "link_7.com", "status" : "unpaid"}
        ],
        [
            {"lat" : -6.293840, "lng" : 106.703505, "url" : "link_8.com", "status" : "unpaid"},
            {"lat" : -6.293881, "lng" : 106.703351, "url" : "link_8.com", "status" : "unpaid"},
            {"lat" : -6.293969, "lng" : 106.703359, "url" : "link_8.com", "status" : "unpaid"},
            {"lat" : -6.293912, "lng" : 106.703514, "url" : "link_8.com", "status" : "unpaid"},
            {"lat" : -6.293888, "lng" : 106.703522, "url" : "link_8.com", "status" : "unpaid"},
            {"lat" : -6.293845, "lng" : 106.703504, "url" : "link_8.com", "status" : "unpaid"}
        ],
        [
            {"lat" : -6.293913, "lng" : 106.703529, "url" : "link_9.com", "status" : "unpaid"},
            {"lat" : -6.293980, "lng" : 106.703360, "url" : "link_9.com", "status" : "unpaid"},
            {"lat" : -6.294084, "lng" : 106.703386, "url" : "link_9.com", "status" : "unpaid"},
            {"lat" : -6.294041, "lng" : 106.703551, "url" : "link_9.com", "status" : "unpaid"},
            {"lat" : -6.293919, "lng" : 106.703528, "url" : "link_9.com", "status" : "unpaid"}
        ],
        [
            {"lat" : -6.294048, "lng" : 106.703553, "url" : "link_10.com", "status" : "unpaid"},
            {"lat" : -6.294092, "lng" : 106.703390, "url" : "link_10.com", "status" : "unpaid"},
            {"lat" : -6.294179, "lng" : 106.703414, "url" : "link_10.com", "status" : "unpaid"},
            {"lat" : -6.294143, "lng" : 106.703569, "url" : "link_10.com", "status" : "unpaid"},
            {"lat" : -6.294112, "lng" : 106.703561, "url" : "link_10.com", "status" : "unpaid"},
            {"lat" : -6.294112, "lng" : 106.703577, "url" : "link_10.com", "status" : "unpaid"},
            {"lat" : -6.294048, "lng" : 106.703555, "url" : "link_10.com", "status" : "unpaid"}
        ],
        [
            {"lat" : -6.294145, "lng" : 106.703592, "url" : "link_11.com", "status" : "unpaid"},
            {"lat" : -6.294183, "lng" : 106.703418, "url" : "link_11.com", "status" : "unpaid"},
            {"lat" : -6.294280, "lng" : 106.703439, "url" : "link_11.com", "status" : "unpaid"},
            {"lat" : -6.294232, "lng" : 106.703608, "url" : "link_11.com", "status" : "unpaid"},
            {"lat" : -6.294145, "lng" : 106.703593, "url" : "link_11.com", "status" : "unpaid"}
        ],
        [
            {"lat" : -6.294239, "lng" : 106.703612, "url" : "link_12.com", "status" : "unpaid"},
            {"lat" : -6.294284, "lng" : 106.703445, "url" : "link_12.com", "status" : "unpaid"},
            {"lat" : -6.294411, "lng" : 106.703479, "url" : "link_12.com", "status" : "unpaid"},
            {"lat" : -6.294361, "lng" : 106.703631, "url" : "link_12.com", "status" : "unpaid"},
            {"lat" : -6.294240, "lng" : 106.703614, "url" : "link_12.com", "status" : "unpaid"} 
        ],
        [
            {"lat" : -6.294369, "lng" : 106.703634, "url" : "link_13.com", "status" : "unpaid"},
            {"lat" : -6.294471, "lng" : 106.703666, "url" : "link_13.com", "status" : "unpaid"},
            {"lat" : -6.294531, "lng" : 106.703514, "url" : "link_13.com", "status" : "unpaid"},
            {"lat" : -6.294417, "lng" : 106.703481, "url" : "link_13.com", "status" : "unpaid"},
            {"lat" : -6.294372, "lng" : 106.703628, "url" : "link_13.com", "status" : "unpaid"}
        ]
    ];

    var map;
    var infoWindow;

    function initialize() {
        var mapOptions = {
            zoom: 18,
            center: new google.maps.LatLng(-6.294372, 106.703628),
            mapTypeId: google.maps.MapTypeId.TERRAIN
            // mapTypeId: google.maps.MapTypeId.SATELLITE
        };

        map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
        for (var i = 0; i < editedPolygons.length; i++) {
            for (var l = 0; l < editedPolygons[i].length; l++) {
                if (editedPolygons[i][l]["status"] == 'paid') {
                    var color = '#008700';
                } else {
                    var color = '#FF0000';
                }
                var poly = new google.maps.Polygon({
                    path: editedPolygons[i],
                    map: map,
                    strokeColor: '##0000FF',
                    strokeOpacity: 0.8,
                    strokeWeight: 1,
                    fillColor: color,
                    fillOpacity: 0.35,
                    // name: editedPolygons[i][l]["url"]
                    name: editedPolygons[i][l]["url"]
                  });
            }
            google.maps.event.addListener(poly, 'click', showArrays);
        }
        infoWindow = new google.maps.InfoWindow();
    }

    function showArrays(event) {

        var vertices = this.getPath();

        var contentString = '<b>' + this.name + '</b><br>' +
            '<a href ="http://'+this.name+'" target="_blank">Show Detail</a><br>';//+
            // 'Clicked location: <br>' + event.latLng.lat() + ',' + event.latLng.lng() +
            // '<br>';

        // for (var i = 0; i < vertices.getLength(); i++) {
        //     var xy = vertices.getAt(i);
        //     contentString += '<br>' + 'Coordinate ' + i + ':<br>' + xy.lat() + ',' + xy.lng();
        // }

        infoWindow.setContent(contentString);
        infoWindow.setPosition(event.latLng);

        infoWindow.open(map);
    }
    initialize();
</script>