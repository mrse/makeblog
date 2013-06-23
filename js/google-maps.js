var geocoder;
var map;

// Load our map and center it on San Francisco
function initialize() {

   // initialize the Geocoder function
   geocoder = new google.maps.Geocoder();
   var latlng = new google.maps.LatLng(39.8282, -98.5795);
   var mapOptions = {
      zoom: 4,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
   };

   // Loop through each object
   jQuery.each( JSON.parse( makercamp.addresses ), function( key, value ) {

      // Run the geocoding
      geocoder.geocode({
         'address':  value['Work City'] + ' ' + value['Work State'] + ' ' + value['Work Zip'] + ' ' + value['Work Country']
      }, function( results, status ) {

         // Make sure our geocode went well
         if ( status === google.maps.GeocoderStatus.OK ) {

            // map.setCenter( results[0].geometry.location );
            var marker = new google.maps.Marker({
               map: map,
               animation: google.maps.Animation.DROP,
               position: results[0].geometry.location
            });

            var infowindow = new google.maps.InfoWindow({
               content: value['First Name']
            });
            google.maps.event.addListener(marker, 'click', function() {
               infowindow.open(map,marker);
            });

         } else {
            console.log( status );
         }

      });

   });

   // Initialize the map with our markers
   map = new google.maps.Map( document.getElementById( 'map-canvas' ), mapOptions );
}

// Load our initialize function on window load
google.maps.event.addDomListener( window, 'load', initialize );