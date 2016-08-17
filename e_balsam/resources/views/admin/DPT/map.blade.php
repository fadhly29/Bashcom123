<div id="map_canvas"></div>
<style>
html, body, #map-canvas {
    height: 100%;
    margin: 0px;
    padding: 0px
}
  }
</style>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<div id="map-canvas"></div>
<!-- <script src="GeoJSON.js"></script> -->
<script>

var editedPolygons = <?php echo $loc ?>;
// var editedPolygons = 
// [
//   [
    
//     {"lat" : -6.1212034, "lng" : 106.6990554, "url" : "toruz-corp.com", 'status' : 'paid'},
//     {"lat" : -6.1334924, "lng" : 106.9826399, "url" : "toruz-corp.com", 'status' : 'paid'},
//     {"lat" : -6.3212056, "lng" : 106.9798934, "url" : "toruz-corp.com", 'status' : 'paid'},
//     {"lat" : -6.3184758, "lng" : 106.7347609, "url" : "toruz-corp.com", 'status' : 'paid'},
//     {"lat" : -6.1212034, "lng" : 106.6990554, "url" : "toruz-corp.com", 'status' : 'paid'}
//   ],
//   [
//     {"lat" : -6.5213382, "lng" : 106.5018615, "url" : "ebalsam.com", 'status' : 'unpaid'},
//     {"lat" : -6.5281602, "lng" : 106.76828, "url" : "ebalsam.com", 'status' : 'unpaid'},
//     {"lat" : -6.8132346, "lng" : 106.76828, "url" : "ebalsam.com", 'status' : 'unpaid'},
//     {"lat" : -6.8923165, "lng" : 106.1654052, "url" : "ebalsam.com", 'status' : 'unpaid'},
//     {"lat" : -6.5213382, "lng" : 106.5018615, "url" : "ebalsam.com", 'status' : 'unpaid'}
//   ],
// ];
// console.log( editedPolygons );


var map;
var infoWindow;

function initialize() {
    var mapOptions = {
        zoom: 10,
        center: new google.maps.LatLng(-6.1212034, 106.6990554),
        mapTypeId: google.maps.MapTypeId.TERRAIN
    };

    // These are declared outside of the init function, so I
    // initialized them together at the top of the function..
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
        // Here's the behavior handler..
        google.maps.event.addListener(poly, 'click', showArrays);
    }

    infoWindow = new google.maps.InfoWindow();


}

// The only differnece here is that I changed "name" to this.name,
// becuase "this" (the object that fired the event), now carries around 
// that "name" property we gave it..
function showArrays(event) {

    var vertices = this.getPath();

    var contentString = '<b>' + this.name + '</b><br>' +
        '<a href ="http://'+this.name+'" target="_blank">Show Detail</a><br>'+
        'Clicked location: <br>' + event.latLng.lat() + ',' + event.latLng.lng() +
        '<br>';

    for (var i = 0; i < vertices.getLength(); i++) {
        var xy = vertices.getAt(i);
        contentString += '<br>' + 'Coordinate ' + i + ':<br>' + xy.lat() + ',' + xy.lng();
    }

    infoWindow.setContent(contentString);
    infoWindow.setPosition(event.latLng);

    infoWindow.open(map);
}

initialize();
    
</script>