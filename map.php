<html>
<?php 
	$lat=$_GET['lat'];
	$lon=$_GET['lon'];
	$feat=$_GET['feat'];
?>
	<head>
	
   <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsmI0b9uNWLnRG2HgIG0ALjOiTvIMqLss&sensor=false">
    </script>
		    <script type="text/javascript">
	var map='';
	var maker='';
	var lat=<?php echo $lat?>;
	var lon=<?php echo $lon?>;
	
      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(lat,lon),
          zoom: 5,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map"),
            mapOptions);
			
		 marker= new google.maps.Marker({
			position:new google.maps.LatLng(lat,lon ),
			map:map,
			title:"<?php //echo $geon?>"
		
		});
		
		var contentMarker = '<?php echo $feat?>'
 
				var infoWindow = new google.maps.InfoWindow({
				content  : contentMarker,
				position : new google.maps.LatLng(lat,lon )
		});
google.maps.event.addListener(marker, 'click', function() {infoWindow.open(map,marker);});
      }
      google.maps.event.addDomListener(window, 'load', initialize);
	  
    </script>
	</head>
	
	
	<body>
		<div id="map" style="width:100%; height:100%;">
													
												</div>
	</body>

</html>