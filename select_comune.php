<?php
if(isset($_POST['submit'])){
if(!empty($_POST['Comuni'])) {
echo "<span>COMUNE SELEZIONATO:</span><br/>";
// As output of $_POST['Color'] is an array we have to use Foreach Loop to display individual value
foreach ($_POST['Comuni'] as $select)
{
echo "<span><b>".$select."</b></span><br/>";
    ?>
<script>
    function initMap() {
	   var infowindow = new google.maps.InfoWindow;
	   var geocoder = new google.maps.Geocoder();
	   var location = {lat:45.9464112,lng:13.5245551}
	   var map = new google.maps.Map(document.getElementById("map"),{
	   zoom: 9,
	   center: location
	});
	geocoder.geocode({ 'address':<?PHP echo("'".$select."'");?>}, function(results, status) {
             
			if (status == google.maps.GeocoderStatus.OK) {
				  //window.alert('Geocode was not successful for the following reason: ' + status);
                  //alert ("inside disp loc");
                var marker = new google.maps.Marker({
                    position: results[0].geometry.location,
					map: map
                });
				 //marker.setMap(map);
                 //alert(results[0].geometry.location);
                 /*google.maps.event.addListener(marker, 'click', function() {
                    infowindow.setContent(content);
                    infowindow.open(map,marker);
                });*/
            }
            
        });
        
	}
    
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUx3WSwFInfsKY30-ovvfjVDVpCAi5xJA&callback=initMap"> </script>
 
 <?PHP    
}
}
else { echo "<span>Prego selezionare un comnune</span><br/>";
}



 } ?>