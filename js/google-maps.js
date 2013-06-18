
var geocoder;
var map;
// var makercamp = {
//    "addresses" : [
//       {
//          "Date": "6/7/2013",
//          "Last Name": "Kaneko",
//          "First Name": "Jean",
//          "Email": "jean.kaneko@gmail.com",
//          "Program Name": "The Exploratory",
//          "Job Title": "Chief Tinkerer",
//          "Company": "The Exploratory",
//          "Work Address 1": "11840 Jefferson Blvd",
//          "Work Address 2": "",
//          "Work City": "Culver City",
//          "Work State": "CA",
//          "Work Zip": "90230",
//          "Work Country": "US",
//          "Website": "www.theexploratory.com"
//       },
//       {
//          "Date": "6/7/2013",
//          "Last Name": "Avitabile",
//          "First Name": "Carla",
//          "Email": "cavitabile@marincouty.org",
//          "Program Name": "Maker Camp",
//          "Job Title": "Teen Librarian",
//          "Company": "Marin County Free Library",
//          "Work Address 1": "1720 Novato Blvd",
//          "Work Address 2": "",
//          "Work City": "Novato",
//          "Work State": "CA",
//          "Work Zip": "94947",
//          "Work Country": "US",
//          "Website": "http://www.marinlibrary.org/"
//       },
//       {
//          "Date": "6/7/2013",
//          "Last Name": "Creger",
//          "First Name": "Amber",
//          "Email": "acreger@ahml.info",
//          "Program Name": "Make It: Read, Discover, Create",
//          "Job Title": "Kids' World Manager",
//          "Company": "Arlington Heights",
//          "Work Address 1": "Arlington Heights Memorial Library",
//          "Work Address 2": "500 N. Dunton Ave.",
//          "Work City": "Arlington Heights",
//          "Work State": "IL",
//          "Work Zip": "60004",
//          "Work Country": "US",
//          "Website": "http://ahml.info/"
//       },
//       {
//          "Date": "6/7/2013",
//          "Last Name": "Gonzales",
//          "First Name": "Rudy",
//          "Email": "rudy@thekidworkshop.com",
//          "Program Name": "Build It Workshops Summer Camp",
//          "Job Title": "Creative Director",
//          "Company": "Build It Workshops",
//          "Work Address 1": "1818 Marron Rd. Suite 103",
//          "Work Address 2": "",
//          "Work City": "Carlsbad",
//          "Work State": "CA",
//          "Work Zip": "92008",
//          "Work Country": "US",
//          "Website": "http://www.kidworkshop.com"
//       },
//       {
//          "Date": "6/7/2013",
//          "Last Name": "O'Brien",
//          "First Name": "Annika",
//          "Email": "annikaobrien@gmail.com",
//          "Program Name": "LA Robotics Club",
//          "Job Title": "Robotics Engineer",
//          "Company": "LA Robotics Club",
//          "Work Address 1": "4518 Nagle Ave.",
//          "Work Address 2": "",
//          "Work City": "Sherman Oaks",
//          "Work State": "CA",
//          "Work Zip": "91423",
//          "Work Country": "US",
//          "Website": "http://www.laroboticsclub.org"
//       },
//       {
//          "Date": "6/7/2013",
//          "Last Name": "Hansen",
//          "First Name": "Sarah",
//          "Email": "sarahryanhansen@gmail.com",
//          "Program Name": "Station082 Summer Camp",
//          "Job Title": "Manager",
//          "Company": "Station082",
//          "Work Address 1": "43 Mall Way, Suite 12",
//          "Work Address 2": "PO Box 255",
//          "Work City": "West Sand Lake",
//          "Work State": "NY",
//          "Work Zip": "12196",
//          "Work Country": "US",
//          "Website": "http://station082.com"
//       },
//       {
//          "Date": "6/7/2013",
//          "Last Name": "Wright",
//          "First Name": "Randall",
//          "Email": "hello@mobilemakerspace.com",
//          "Program Name": "Mobile Makerspace",
//          "Job Title": "Forms Developler",
//          "Company": "Mobile Makerspace",
//          "Work Address 1": "121 - 3868 Shelbourne Street",
//          "Work Address 2": "",
//          "Work City": "Victoria",
//          "Work State": "BC",
//          "Work Zip": "V8P5J1",
//          "Work Country": "CA",
//          "Website": "http://www.robotforms.com"
//       },
//       {
//          "Date": "6/7/2013",
//          "Last Name": "Sample",
//          "First Name": "Kurt",
//          "Email": "ksample@pierce.ctc.edu",
//          "Program Name": "Young Maker Clubs",
//          "Job Title": "Clubhouse Coordinator",
//          "Company": "Lakewood Computer Clubhouse",
//          "Work Address 1": "Pierce College",
//          "Work Address 2": "9401 Farwest Dr SW",
//          "Work City": "Lakewood",
//          "Work State": "WA",
//          "Work Zip": "98498",
//          "Work Country": "US",
//          "Website": "http://lakewoodclubhouse.us"
//       },
//       {
//          "Date": "6/7/2013",
//          "Last Name": "Ulibarri",
//          "First Name": "Mariano",
//          "Email": "info@parachutefactory.org",
//          "Program Name": "Hacker Scouts",
//          "Job Title": "Director",
//          "Company": "Parachute Factory",
//          "Work Address 1": "166 Bridge",
//          "Work Address 2": "",
//          "Work City": "Las Vegas",
//          "Work State": "NM",
//          "Work Zip": "87701",
//          "Work Country": "US",
//          "Website": "http://parachutefactory.org"
//       },
//       {
//          "Date": "6/7/2013",
//          "Last Name": "Baldwin",
//          "First Name": "Doug",
//          "Email": "dbaldwin@piscatawaylibrary.org",
//          "Program Name": "Summer of MAKE",
//          "Job Title": "Emerging Technologies Librarian",
//          "Company": "Piscataway Library",
//          "Work Address 1": "Piscataway Public Library",
//          "Work Address 2": "500 Hoes Lane",
//          "Work City": "Piscataway",
//          "Work State": "NJ",
//          "Work Zip": "08854",
//          "Work Country": "US",
//          "Website": "http://piscatawaylibrary.org/"
//       },
//       {
//          "Date": "6/8/2013",
//          "Last Name": "Neral",
//          "First Name": "Amy",
//          "Email": "amy@beyond-books.org",
//          "Program Name": "YAC@HPL",
//          "Job Title": "Coordinator of Teen and Virtual Services",
//          "Company": "Hubbard Public Library",
//          "Work Address 1": "436 West Liberty Street",
//          "Work Address 2": "",
//          "Work City": "Hubbard",
//          "Work State": "OH",
//          "Work Zip": "44425",
//          "Work Country": "US",
//          "Website": "www.beyond-books.org"
//       },
//       {
//          "Date": "6/8/2013",
//          "Last Name": "kruse",
//          "First Name": "jennifer",
//          "Email": "jkruse1354@gmail.com",
//          "Program Name": "Station082 \"\"Summer camp\"\"",
//          "Job Title": "Manager",
//          "Company": "Station082",
//          "Work Address 1": "1522 Cole st",
//          "Work Address 2": "43116 284th ave se",
//          "Work City": "enumclaw",
//          "Work State": "WA",
//          "Work Zip": "98022",
//          "Work Country": "US",
//          "Website": "http://www.station082.com"
//       },
//       {
//          "Date": "6/8/2013",
//          "Last Name": "Douglas",
//          "First Name": "Etienne",
//          "Email": "edouglas@marincounty.org",
//          "Program Name": "Marin Webstars",
//          "Job Title": "Webstar Coordinator",
//          "Company": "Marin City Library",
//          "Work Address 1": "164 Donahue St.",
//          "Work Address 2": "",
//          "Work City": "Marin City",
//          "Work State": "CA",
//          "Work Zip": "94965",
//          "Work Country": "US",
//          "Website": "http://www.marinwebstars.org"
//       },
//       {
//          "Date": "6/8/2013",
//          "Last Name": "Strbo",
//          "First Name": "Ellie",
//          "Email": "estrbo@mtpl.org",
//          "Program Name": "Maker Mondays",
//          "Job Title": "Teen and Adult Reference Librarian",
//          "Company": "Middletown Public Library",
//          "Work Address 1": "55 New Monmouth Road",
//          "Work Address 2": "",
//          "Work City": "Middletown",
//          "Work State": "NJ",
//          "Work Zip": "07748",
//          "Work Country": "US",
//          "Website": "http://www.mtpl.org"
//       },
//       {
//          "Date": "6/9/2013",
//          "Last Name": "Fox",
//          "First Name": "Claire",
//          "Email": "hopefoxmama@gmail.com",
//          "Program Name": "Ithaca Generator Maker Camp",
//          "Job Title": "Education Coordinator",
//          "Company": "Ithaca Generator makerspace",
//          "Work Address 1": "116 W Green St",
//          "Work Address 2": "116 W Green St",
//          "Work City": "Ithaca",
//          "Work State": "NY",
//          "Work Zip": "14850",
//          "Work Country": "US",
//          "Website": "http://ithacagenerator.org"
//       },
//       {
//          "Date": "6/10/2013",
//          "Last Name": "Fowler",
//          "First Name": "Ron",
//          "Email": "rfowler@petoskeylibrary.org",
//          "Program Name": "Beneath the Surface",
//          "Job Title": "Youth Services Librarian",
//          "Company": "Petoskey District Library",
//          "Work Address 1": "",
//          "Work Address 2": "500 E. Mitchell St",
//          "Work City": "Petoskey",
//          "Work State": "MI",
//          "Work Zip": "49770",
//          "Work Country": "US",
//          "Website": "http://www.petoskeylibrary.org"
//       },
//       {
//          "Date": "6/10/2013",
//          "Last Name": "Diener",
//          "First Name": "Thomas",
//          "Email": "tdiener@gmail.com",
//          "Program Name": "STEP",
//          "Job Title": "STEP Coordinator",
//          "Company": "New York Institute of Technology",
//          "Work Address 1": "300 Carleton Ave.",
//          "Work Address 2": "",
//          "Work City": "Central Islip",
//          "Work State": "NY",
//          "Work Zip": "11722",
//          "Work Country": "US",
//          "Website": "http://nyit.edu"
//       },
//       {
//          "Date": "6/10/2013",
//          "Last Name": "martin",
//          "First Name": "marla",
//          "Email": "mmartin@biblio.org",
//          "Program Name": "Beneath the Surface 2013 Teen Summer Reading Program",
//          "Job Title": "Teen Librarian",
//          "Company": "woodbury public library",
//          "Work Address 1": "269 Main Street South",
//          "Work Address 2": "woodbury public library",
//          "Work City": "woodbury",
//          "Work State": "CT",
//          "Work Zip": "06798",
//          "Work Country": "US",
//          "Website": "http://woodburylibraryct.org"
//       },
//       {
//          "Date": "6/10/2013",
//          "Last Name": "Scampavia",
//          "First Name": "Louis",
//          "Email": "scamp58@hotmail.com",
//          "Program Name": "",
//          "Job Title": "Assoc. Prof. & Senior Eng.",
//          "Company": "Palm Beach LED Makerspace",
//          "Work Address 1": "PO Box 1673",
//          "Work Address 2": "709 Ardmore Rd",
//          "Work City": "West Palm Beach",
//          "Work State": "FL",
//          "Work Zip": "33401",
//          "Work Country": "US",
//          "Website": "http://www.pbled.org"
//       },
//       {
//          "Date": "6/11/2013",
//          "Last Name": "Trinkle",
//          "First Name": "Diane",
//          "Email": "dtrinkle@nortonvillelibrary.org",
//          "Program Name": "",
//          "Job Title": "Library Director",
//          "Company": "Nortonville Public Library",
//          "Work Address 1": "407 Main",
//          "Work Address 2": "PO Box 179",
//          "Work City": "Nortonville",
//          "Work State": "KS",
//          "Work Zip": "66060",
//          "Work Country": "US",
//          "Website": "http://nortonvillelibrary.org"
//       },
//       {
//          "Date": "6/12/2013",
//          "Last Name": "Eastewrood",
//          "First Name": "Lori",
//          "Email": "leasterwood@saclibrary.org",
//          "Program Name": "",
//          "Job Title": "Programming and Partnerships Coordinator",
//          "Company": "Sacramento Public Library",
//          "Work Address 1": "828 I St",
//          "Work Address 2": "",
//          "Work City": "Sacramento",
//          "Work State": "CA",
//          "Work Zip": "95814",
//          "Work Country": "US",
//          "Website": "http://www.saclibrary.org"
//       }
//    ]
// };

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

   // initialize the Geocoder function
   geocoder = new google.maps.Geocoder();
   var latlng = new google.maps.LatLng(39.8282, -98.5795);
   var mapOptions = {
      zoom: 4,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
   };

   // Loop through each object
   jQuery.each( JSON.parse(makercamp.addresses), function( key, value ) {

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
