 <!DOCTYPE html>
<html>
<head>
<title>Map</title>

<style type="text/css">
	#map{
		width:100%;
		height: 400px;
	}

</style>

</head>
<body>

<h1>My map</h1>

<div id="map"></div>

<script type="text/javascript">
	function initMap(){

		var options ={
			zoom:14,
			center: {lat: 17.399073,lng:78.560405}
		}

		var map =new google.maps.Map(document.getElementById('map'),options);

		var marker =new google.maps.Marker({
			position: {lat: 17.399073,lng:78.560405},
			map:map
		});

		var infoWindow=new google.maps.InfoWindow({
			content:'<h2>Samuha Creations</h2><p>4th Floor, RC Reddy Complex, Uppal Ring Road, <br>Beside Metro, Uppal, Medchal, Telangana - 500 039</p>'
		});
		marker.addListener('click',function(){
			infoWindow.open(map,marker);
		})



		var request = {
		    location: pyrmont,
		    radius: '500',
		    type: ['restaurant']
		  };
		function callback(results, status) {
		  /*if (status == google.maps.places.PlacesServiceStatus.OK) {
		    for (var i = 0; i < results.length; i++) {
		      var place = results[i];
		      createMarker(results[i]);
		    }
		  }*/

		  console.log(results);
		}

		service = new google.maps.places.PlacesService(map);
		service.nearbySearch(request, callback);
	

	}
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=
AIzaSyBYK-tCn8KAZw0cFKbAkO_nNpkbBgjel8k
&callback=initMap&libraries=places">
</script>

</body>
</html> 