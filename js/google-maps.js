
var geocoder;
var map;
var addresses = {
   '1' : {
      'Date'           : '6/7/2013',
      'Last Name'      : 'Kaneko',
      'First Name'     : 'Jean',
      'Email'          : 'jean.kaneko@gmail.com',
      'Job Title'      : 'Chief Tinkerer',
      'Program Name'   : '',
      'Company'        : 'The Exploratory',
      'Work Address 1' : '11840 Jefferson Blvd',
      'Work Address 2' : '',
      'Work City'      : 'Sonoma',
      'Work State'     : 'CA',
      'Work Zip'       : '90230',
      'Work Country'   : 'US',
      'Website'        : 'www.thekidworkshop.com'
   },
   '2' : {
      'Date'           : '6/7/2013',
      'Last Name'      : 'Avitabile',
      'First Name'     : 'Carla',
      'Email'          : 'cavitabile@marincouty.org',
      'Job Title'      : 'Teen Librarian',
      'Program Name'   : '',
      'Company'        : 'Marin County Free Library',
      'Work Address 1' : '1720 Novato Blvd',
      'Work Address 2' : '',
      'Work City'      : 'Novato',
      'Work State'     : 'CA',
      'Work Zip'       : '94947',
      'Work Country'   : 'US',
      'Website'        : 'http://www.marinlibrary.org/'
   }
};

// The function to go and get our geolocations
function get_lat_long( address ) {

   // Run the geo
   geocoder.geocode({
      'address': address
   }, function( results, status ) {

      // Make sure our geocode went well
      if ( status === google.maps.GeocoderStatus.OK ) {

         // map.setCenter( results[0].geometry.location );
         var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location
         });

      }

   });
}

// Load our map and center it on San Francisco
function initialize() {
   geocoder = new google.maps.Geocoder();
   var latlng = new google.maps.LatLng(37.774929, -122.419416);
   var mapOptions = {
      zoom: 8,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
   };

   // Loop through each object
   jQuery.each( addresses, function( key, value ) {

      // Create a variable for each of our addresses
      var address = value['Work Address 1'] + ' ' + value['Work City'] + ', ' + value['Work State'] + ' ' + value['Work Zip'];
      var address2 = value['Work Address 2'] + ' ' + value['Work City'] + ', ' + value['Work State'] + ' ' + value['Work Zip'];

      // Check if our address starts with a number by checking the first character in the variable
      if ( ! isNaN( address.charAt(0) ) ) {

         // Go and process our address into lat and long
         get_lat_long( address );

      } else if ( ! isNaN( address2.charAt(0) ) ) {

         // If we hit here it's because the first address wasn't a valid address
         get_lat_long( address2 );
      }

   });

   // Initialize the map with our markers
   map = new google.maps.Map( document.getElementById( 'map-canvas' ), mapOptions );
}

// Load our initialize function on window load
google.maps.event.addDomListener( window, 'load', initialize );
