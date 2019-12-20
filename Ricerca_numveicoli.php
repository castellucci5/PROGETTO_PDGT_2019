
<!DOCTYPE html>
<html>
<head>
<title>FRIULI-VENEZIA-GIULIA </title> <!-- Inserimento del titolo-->
<link href="style.css" rel="stylesheet" type="text/css">
 <style>
	    #map {
	      height: 200px;
		  right: 15px;
		  width:110%;
		  
	    }
</style>
</head>
<body>
    

<div class="container">
<div class="main">
  <script>
    function initMap() {
	   var location = {lat:45.9464112,lng:13.5245551}
	   var map = new google.maps.Map(document.getElementById("map"),{
	   zoom: 9,
	   center: location
	});
	
	}
</script>
    
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUx3WSwFInfsKY30-ovvfjVDVpCAi5xJA&callback=initMap"> </script>     
   

<h2>RICERCA DEL NUMERO DI VEICOLI</h2>
<form action="Ricerca_numveicoli.php" method="post"> 
<div id="map"></div><!--creazione del form-->
<!----- Menu per selezionare il comune ----->
<label class="heading">SELEZIONARE UN COMUNE :</label>
<select multiple name="Comuni[]">
<?php include'campi_selezione.php';?> <!--esposiszione dei comuni presenti nel database-->
</select>
<?php include'select_comune.php'; ?>  <!--gestione del comune selezionato-->
<!----- Menu per selezionre l'anno ----->    
<label class="heading">SELEZIONA L'ANNO :</label>
<select multiple name="anno[]">
<?php include'campi_anno.php';?>      <!--esposizione dei campi anno presenti-->
</select>
<?php include'select_anno.php'; ?>    <!--gestione dell'anno selezionato-->
<input name="submit" type="submit" value="RICERCA NUMERO VEICOLI"> <!--creazione del bottone di invio-->
<?php include'richiesta_database.php'; ?> <!--ricerca dei dati selezionati nel database -->     
</form>
 

<a href=http://localhost/progetto/inserimento_rimozione_dati.php>PAGINA INSERIMENTO E RIMOZIONE</a>;
</div>
</div>

</body>
</html>